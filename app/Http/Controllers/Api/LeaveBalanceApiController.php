<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\LeaveBalance;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeaveBalanceApiController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $user = $request->user();
        $year = now()->year;

        // Saldo urlopu użytkownika w bieżącym roku.
        $leaveBalance = LeaveBalance::where('user_id', $user->id)
            ->where('company_id', $user->company_id)
            ->where('year', $year)
            ->first();

        $baseDays = (float) ($leaveBalance?->base_days ?? 0);
        $carriedOver = (float) ($leaveBalance?->carried_over ?? 0);
        $usedDays = (float) ($leaveBalance?->used_days ?? 0);

        $totalDays = $baseDays + $carriedOver;
        $remainingDays = max(0, $totalDays - $usedDays);

        // Wnioski zaakceptowane i zrealizowane w danym roku.
        $yearStart = Carbon::create($year, 1, 1)->startOfDay();
        $yearEnd = Carbon::create($year, 12, 31)->endOfDay();

        $leaves = Leave::query()
            ->selectRaw('
                type,
                status,
                SUM(days) as days,
                SUM(working_days) as working_days,
                SUM(non_working_days) as non_working_days
            ')
            ->where('user_id', $user->id)
            ->where('start_date', '<=', $yearEnd)
            ->where('end_date', '>=', $yearStart)
            ->whereIn('status', [
                'zaakceptowane',
                'zrealizowane',
            ])
            ->groupBy('type', 'status')
            ->get();

        $leavesByType = $leaves
            ->groupBy('type')
            ->map(function ($items) {
                $result = [];

                foreach (['zaakceptowane', 'zrealizowane'] as $status) {
                    $item = $items->firstWhere('status', $status);

                    $result[$status] = [
                        'days' => (float) ($item->days ?? 0),
                        'working_days' => (float) ($item->working_days ?? 0),
                        'non_working_days' => (float) ($item->non_working_days ?? 0),
                    ];
                }

                return $result;
            });

        return response()->json([
            'success' => true,
            'data' => [
                'year' => $year,
                'balance' => [
                    'base_days' => $baseDays,
                    'carried_over' => $carriedOver,
                    'total_days' => $totalDays,
                    'used_days' => $usedDays,
                    'remaining_days' => $remainingDays,
                ],
                'leaves_by_type' => $leavesByType,
            ],
        ]);
    }
}
