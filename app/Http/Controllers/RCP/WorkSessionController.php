<?php

namespace App\Http\Controllers\RCP;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkSessionRequest;
use App\Jobs\SendDelayed;
use App\Jobs\SendNow;
use App\Models\Event;
use App\Models\Location;
use App\Models\User;
use App\Models\WorkBlock;
use App\Models\WorkSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WorkSessionController extends Controller
{
    // Funkcja do rozpoczęcia pracy
    public function startWork($user_id, Request $request)
    {
        $now = Carbon::now();
        Carbon::setLocale('pl');
        if ($request->input('lat') == '' || $request->input('lon') == '') {
        } else {
            try {
                $location = Location::create([
                    'name' => $request->input('name', ''),
                    'latitude' => $request->input('lat', null),
                    'longitude' => $request->input('lon', null),
                ]);
            } catch (\Exception $e) {
            }
        }
        // Tworzenie eventu startowego
        $event = Event::create([
            'time' => $now,
            'location_id' => isset($location) ? $location->id : null,
            'device' => '',
            'event_type' => 'start',
            'user_id' => $user_id,
            'company_id' => $this->get_company_id_by_user_id($user_id),
            'created_user_id' => $user_id,
        ]);

        // Tworzenie sesji pracy
        $workSession = WorkSession::create([
            'company_id' => $this->get_company_id_by_user_id($user_id),
            'user_id' => $user_id,
            'created_user_id' => $user_id,
            'event_start_id' => $event->id,
            'status' => 'W trakcie pracy',
            'time_in_work' => 0,
            'info' => 'Utworzono przez zegar',
        ]);

        $user = User::where('id', $user_id)->first();
        $status = $user->getToday();
        $seconds_in_work = $status['worked_time_seconds'];

        //STAŁY PLANING
        if ($user->working_hours_regular == 'stały planing') {
            if ($user->overtime == true) {
                $seconds_planned = ($user->working_hours_custom * 3600) + ($user->overtime_threshold * 60);
            }
        } else if ($user->working_hours_regular == 'zmienny planing') {
            if ($user->overtime == true) {
                $totalDayPlannedVar = WorkBlock::where('user_id', $user->id)
                    ->whereDate('starts_at', Carbon::now())
                    ->first();
                $seconds_planned = $totalDayPlannedVar->duration_seconds ?? 0;
                $seconds_planned += $user->overtime_threshold * 60;
            }
        }
        $seconds_remaining = max(0, $seconds_planned - $seconds_in_work);
        $seconds_worked = max(0, $seconds_remaining + $seconds_in_work);
        $workedTime = gmdate('H:i:s', $seconds_worked);
        if ($user->overtime_task) {
            $message = 'Start nadgodzin
Dzisiejsza norma:
' . $workedTime . '

Uzupełnij zadanie

wibest.pl/login';
        } else {
            $message = 'Start nadgodzin
Dzisiejsza norma:
' . $workedTime . '

wibest.pl/login';
        }

        SendDelayed::dispatch(
            $workSession->id,
            $message,
            'RCP',
            'Wiadomość o rozpoczęciu nadgodzin'
        )
            ->delay(now()->addSeconds($seconds_remaining));

        return response()->json([
            'message' => 'Praca rozpoczęta',
            'work_session_id' => intval($workSession->id),
            'work_session_status' => 'W trakcie pracy',
            'work_session_start_time' => $now,
        ], 200);
    }

    // Funkcja do zakończenia pracy
    public function stopWork($id, Request $request)
    {
        Carbon::setLocale('pl');
        $workSession = WorkSession::find($id);
        if ($workSession) {
            $endTime = Carbon::now();

            // Pobranie eventu startowego
            $startEvent = Event::find($workSession->event_start_id);
            if (!$startEvent) {
                return response()->json(['message' => 'Brak rozpoczęcia pracy'], 400);
            }

            // Obliczenie przepracowanego czasu
            $timeDifference = Carbon::parse($startEvent->time)->diffInSeconds($endTime);
            if ($timeDifference > 86400) { // 86400 seconds = 24 hours
                $endTime = Carbon::parse($startEvent->time)->addHours(24);
                $timeInWork = '24:00:00';
            } else {
                $timeInWork = Carbon::parse($startEvent->time)->diff($endTime)->format('%H:%I:%S');
            }
            if ($request->input('lat') == '' || $request->input('lon') == '') {
            } else {
                try {
                    $location = Location::create([
                        'name' => $request->input('name', ''),
                        'latitude' => $request->input('lat', null),
                        'longitude' => $request->input('lon', null),
                    ]);
                } catch (\Exception $e) {
                }
            }
            // Tworzenie eventu stop
            $stopEvent = Event::create([
                'time' => $endTime,
                'location_id' => isset($location) ? $location->id : null,
                'device' => '',
                'event_type' => 'stop',
                'user_id' => $workSession->user_id,
                'company_id' => $workSession->company_id,
                'created_user_id' => $workSession->created_user_id,
            ]);

            // Aktualizacja sesji pracy
            $workSession->update([
                'event_stop_id' => $stopEvent->id,
                'status' => 'Praca zakończona',
                'time_in_work' => $timeInWork,
            ]);

            $user = User::where('id', $workSession->user_id)->first();
            $status = $user->getToday();
            $seconds_in_work = $status['worked_time_seconds'];

            //STAŁY PLANING
            if ($user->working_hours_regular == 'stały planing') {
                $seconds_planned = $user->working_hours_custom * 3600;
            } elseif ($user->working_hours_regular == 'zmienny planing') {
                $totalDayPlannedVar = WorkBlock::where('user_id', $user->id)
                    ->whereDate('starts_at', Carbon::now())
                    ->first();
                $seconds_planned = $totalDayPlannedVar->duration_seconds ?? 0;
            }
            $seconds_remaining = max(0, $seconds_planned - $seconds_in_work);
            $workedTime = gmdate('H:i:s', $seconds_remaining);
            if ($seconds_in_work < $seconds_planned) {
                $message = 'Koniec pracy
Brak normy, pozostało:
' . $workedTime . '

wibest.pl/login';

                SendNow::dispatch(
                    $workSession->id,
                    $message,
                    'RCP',
                    'Wiadomość o braku normy'
                )
                    ->delay(now());
            } else {
                $message = 'Koniec pracy
Dzisiejsza norma:
' . $status['worked_time'] . '

wibest.pl/login';

                SendNow::dispatch(
                    $workSession->id,
                    $message,
                    'RCP',
                    'Wiadomość o zakończeniu pracy'
                )
                    ->delay(now());
            }
            return response()->json([
                'message' => 'Praca zakończona',
                'work_session_id' => intval($id),
                'work_session_status' => $workSession->status,
                'work_session_start_time' => $timeInWork,
            ], 200);
        }

        return response()->json([
            'message' => 'Błąd przy kończeniu pracy',
        ], 200);
    }

    // Funkcja do pobrania wszystkich sesji pracy użytkownika
    public function getWorkSession($user_id)
    {
        $latestWorkSession = WorkSession::where('user_id', $user_id)
            ->where('status', 'W trakcie pracy')
            ->with('eventStart')
            ->orderByDesc(Event::select('time')->whereColumn('events.id', 'work_sessions.event_start_id'))
            ->first();

        // Obliczenie przepracowanego czasu
        $endTime = Carbon::now();
        $timeDifference = Carbon::parse($latestWorkSession->eventStart->time)->diffInSeconds($endTime);
        if ($timeDifference > 86400) { // 86400 seconds = 24 hours
            $endTime = Carbon::parse($latestWorkSession->eventStart->time)->addHours(24);
            $timeInWork = '24:00:00';
            // Tworzenie eventu stop
            $stopEvent = Event::create([
                'time' => $endTime,
                'location' => '',
                'device' => '',
                'event_type' => 'stop',
                'user_id' => $latestWorkSession->user_id,
                'company_id' => $latestWorkSession->company_id,
                'created_user_id' => $latestWorkSession->created_user_id,
            ]);

            // Aktualizacja sesji pracy
            $latestWorkSession->update([
                'event_stop_id' => $stopEvent->id,
                'status' => 'Praca zakończona',
                'time_in_work' => $timeInWork,
            ]);
            return response()->json([
                'message' => 'Praca zakończona 24:00:00'
            ], 200);
        }

        if ($latestWorkSession->event_stop_id == null) {
            return response()->json([
                'message' => 'W trakcie pracy',
                'work_session_id' => intval($latestWorkSession->id),
                'work_session_status' => $latestWorkSession->status,
                'work_session_start_time' => optional($latestWorkSession->eventStart)->time,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Brak sesji pracy'
            ], 200);
        }
    }
}
