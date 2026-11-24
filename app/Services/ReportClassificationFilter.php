<?php

namespace App\Services;

use App\Models\WorkSession;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class ReportClassificationFilter
{
    public const CATEGORIES = ['under', 'normal', 'overtime', 'in_progress'];

    public function selected(Request $request): array
    {
        $data = $request->validate([
            'classification_filter' => ['nullable', 'boolean'],
            'classifications' => ['nullable', 'array'],
            'classifications.*' => [Rule::in(self::CATEGORIES)],
        ]);
        if ($request->boolean('classification_filter')) {
            $selected = array_values(array_unique($data['classifications'] ?? []));
            session(['rcp.filters.classifications' => $selected,
                'rcp.filters.active' => count($selected) !== 4 || session('rcp.filters.has_task', false) || session('rcp.filters.has_note', false)]);
        }

        return session('rcp.filters.classifications', self::CATEGORIES);
    }

    public function apply(Collection $users, array $selected): Collection
    {
        if (count($selected) === count(self::CATEGORIES)) return $users;
        $classifier = app(WorkSessionClassification::class);

        return $users->filter(function ($user) use ($selected, $classifier) {
            $dates = $user->dates;
            $objects = $user->objs;
            $matches = false;
            foreach ($dates as $date => $status) {
                $object = $objects[$date] ?? null;
                $category = $object instanceof WorkSession ? $classifier->details($object)['category'] : null;
                if (in_array($category, $selected, true)) {
                    $matches = true;
                } else {
                    $dates[$date] = null;
                    unset($objects[$date]);
                }
            }
            $user->dates = $dates;
            $user->objs = $objects;

            return $matches;
        })->values();
    }
}
