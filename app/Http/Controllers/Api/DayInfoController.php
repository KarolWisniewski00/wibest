<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\User;
use App\Models\WorkBlock;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DayInfoController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $user = $request->user();
        $today = Carbon::today();
        $year = $today->year;
        $date = $today->toDateString();

        // 1. Ustalenie planu pracy na dzisiaj
        $workingSeconds = 0;
        $workingStart = null;
        $workingEnd = null;

        if ($user->working_hours_regular === 'stały planing') {
            $daysMap = [
                'poniedziałek' => 0,
                'wtorek' => 1,
                'środa' => 2,
                'czwartek' => 3,
                'piątek' => 4,
                'sobota' => 5,
                'niedziela' => 6,
            ];

            $dayNum = $today->dayOfWeekIso - 1;

            $startNum = $daysMap[$user->working_hours_start_day] ?? null;
            $stopNum = $daysMap[$user->working_hours_stop_day] ?? null;

            $inRange = false;

            if ($startNum !== null && $stopNum !== null) {
                $inRange = $startNum <= $stopNum
                    ? ($dayNum >= $startNum && $dayNum <= $stopNum)
                    : ($dayNum >= $startNum || $dayNum <= $stopNum);
            }

            if ($inRange) {
                $workingStart = $user->working_hours_from
                    ? Carbon::parse($date . ' ' . Carbon::parse($user->working_hours_from)->format('H:i:s'))
                    : null;

                $workingEnd = $user->working_hours_to
                    ? Carbon::parse($date . ' ' . Carbon::parse($user->working_hours_to)->format('H:i:s'))
                    : null;

                $workingSeconds = (int) $user->working_hours_custom * 3600;
            }
        } else {
            $workBlock = WorkBlock::where('user_id', $user->id)
                ->whereDate('starts_at', $date)
                ->first();

            if ($workBlock) {
                $workingStart = Carbon::parse($workBlock->starts_at);
                $workingEnd = Carbon::parse($workBlock->ends_at);

                $workingSeconds = max(
                    0,
                    $workingEnd->diffInSeconds($workingStart, false)
                );
            }
        }

        // 2. Sprawdzenie wniosku obejmującego dzisiejszą datę
        $leave = Leave::where('user_id', $user->id)
            ->whereDate('start_date', '<=', $date)
            ->whereDate('end_date', '>=', $date)
            ->whereIn('status', ['zaakceptowane', 'zrealizowane'])
            ->orderByDesc('start_date')
            ->first();

        // 3. Sprawdzenie święta ustawowo wolnego od pracy
        $holiday = $this->getPolishHoliday($today);

        // 4. Ustalenie głównego komunikatu
        if ($holiday !== null) {
            $type = 'holiday';
            $message = 'Dziś jest święto ustawowo wolne od pracy.';
        } elseif ($leave !== null) {
            $type = 'leave';
            $message = 'Dziś masz e-wniosek.';
        } elseif ($workingSeconds === 0) {
            $type = 'day_off';
            $message = 'Dziś masz wolne.';
        } else {
            $type = 'workday';
            $message = 'Dziś masz zaplanowaną pracę.';
        }

        return response()->json([
            'success' => true,
            'date' => $date,
            'type' => $type,
            'message' => $message,

            'plan' => [
                'working_seconds' => $workingSeconds,
                'start' => $workingStart?->format('H:i'),
                'end' => $workingEnd?->format('H:i'),
            ],

            'leave' => $leave ? [
                'type' => $leave->type,
                'status' => $leave->status,
                'start_date' => Carbon::parse($leave->start_date)->format('d.m.Y'),
                'end_date' => Carbon::parse($leave->end_date)->format('d.m.Y'),
            ] : null,

            'holiday' => $holiday ? [
                'name' => $holiday,
                'date' => Carbon::parse($date)->format('d.m.Y'),
            ] : null,
        ]);
    }

    private function getPolishHoliday(Carbon $date): ?string
    {
        return \App\Services\PolishHoliday::name($date);
    }
}
