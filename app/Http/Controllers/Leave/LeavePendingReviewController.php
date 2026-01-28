<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Mail\LeaveMailAccept;
use App\Mail\LeaveMailReject;
use App\Mail\LeaveMailCancel;
use App\Models\Leave;
use App\Models\SentMessage;
use App\Models\WorkBlock;
use App\Services\FilterDateService;
use App\Services\LeaveService;
use App\Services\SmsApi;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class LeavePendingReviewController extends Controller
{
    protected FilterDateService $filterDateService;
    protected LeaveService $leaveService;

    public function __construct(
        FilterDateService $filterDateService,
        LeaveService $leaveService,
    ) {
        $this->filterDateService = $filterDateService;
        $this->leaveService = $leaveService;
    }

    /**
     * Wyświetla stronę z wnioskami do akceptacji.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $leaves = $this->leaveService->paginateByManagerId($request);
        $leavePending = $this->leaveService->countByUserId($request);
        return view('admin.leave-pending.index', compact('leaves', 'startDate', 'endDate', 'leavePending'));
    }
    /**
     *  Zwraca wnioski do rozpatrzenia dla menadżera w zakresie dat.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leaves = $this->leaveService->paginateByManagerId($request);
        $rows_table = [];
        $rows_list = [];
        foreach ($leaves as $leave) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-leave-pending', ['leave' => $leave])->render());
            array_push($rows_list, View::make('components.card-leave-pending', ['leave' => $leave])->render());
        }

        return response()->json([
            'data' => $leaves->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $leaves->nextPageUrl(),
        ]);
    }
    /**
     * Ustawia nową datę w filtrze zwraca wnioski do rozpatrzenia.
     *
     * @param DateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setDate(DateRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDate($request);
        $leaves = $this->leaveService->getByManagerId($request);

        $rows_table = [];
        $rows_list = [];
        foreach ($leaves as $leave) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-leave-pending', ['leave' => $leave])->render());
            array_push($rows_list, View::make('components.card-leave-pending', ['leave' => $leave])->render());
        }

        return response()->json([
            'table' => $rows_table,
            'list' => $rows_list,
        ]);
    }
    /**
     * Akceptuje wniosek.
     *
     * @param Leave $leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Leave $leave): \Illuminate\Http\RedirectResponse
    {
        if ($leave->user->working_hours_regular == 'zmienny planing') {

            $startDate = Carbon::parse($leave->start_date)->startOfDay();
            $endDate   = Carbon::parse($leave->end_date)->endOfDay();

            $currentDate = $startDate->copy();
            $working_days = 0;
            $non_working_days = 0;
            $has_working_day = false;

            while ($currentDate->lte($endDate)) {

                // sprawdzamy czy w danym dniu istnieje jakikolwiek workBlock
                $hasWorkBlock = WorkBlock::where('user_id', $leave->user_id)
                    ->whereDate('starts_at', $currentDate)
                    ->exists();

                if ($hasWorkBlock) {
                    $has_working_day = true;
                    $working_days++;
                }else{
                    $non_working_days++;
                }
                

                $currentDate->addDay();
            }
            if(!$has_working_day){
                return redirect()->route('leave.pending.index')->with('fail', 'Brak zaplanowanej pracy');
            }else{
                $leave->working_days = $working_days;
                $leave->non_working_days = $non_working_days;
            }
        }
        $leave->status = 'zaakceptowane';
        $leave->save();

        $leaveMail = new LeaveMailAccept($leave);
        try {
            Mail::to($leave->user->email)->send($leaveMail);
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $leave->user->email,
                'user_id'    => $leave->user_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Akceptacja wniosku przez ' . $leave->manager->name,
                'status'     => 'SENT',
                'price'      => 0.00,
            ]);
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $leave->user->email,
                'user_id'    => $leave->user_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Akceptacja wniosku przez ' . $leave->manager->name,
                'status'     => 'FAILED',
                'price'      => 0.00,
            ]);
        }
        $sms_api = new SmsApi();
        $phone_validated = $sms_api->normalizePhoneNumber($leave->user->phone);
        $startDate = Carbon::createFromFormat('Y-m-d', $leave->start_date)->format('d.m.Y');
        $endDate = Carbon::createFromFormat('Y-m-d', $leave->end_date)->format('d.m.Y');

        $message = 'Zaakceptowano wniosek
' . $leave->type . '
' . $leave->manager->name . '
' . $startDate . ' - ' . $endDate . '

wibest.pl/login';

        try {
            $smsResult = $sms_api->sendSms($phone_validated, $message);
            // 2. Analiza wyniku zwróconego przez sendSms()
            if ($smsResult['success'] === true) {
                // Odpowiedź API znajduje się w kluczu 'data'
                $responseData = $smsResult['data'];

                // Sprawdzenie, czy struktura odpowiedzi jest poprawna (jak w przykładzie)
                if (isset($responseData['list'][0])) {
                    $messageData = $responseData['list'][0];

                    // Użycie danych z API do zapisu
                    SentMessage::create([
                        'type'       => 'sms',
                        'recipient'  => $phone_validated,
                        'user_id'    => $leave->user_id,
                        'company_id' => $leave->company_id,
                        'subject'    => 'Wnioski',
                        'body'       => 'Akceptacja wniosku przez ' . $leave->manager->name,
                        'status'     => $messageData['status'] ?? 'SENT',
                        'price'      => $messageData['points'] ?? 0.00,
                    ]);
                } else {
                    // Logowanie: Success=true, ale brak danych wiadomości w liście
                    SentMessage::create([
                        'type'       => 'sms',
                        'recipient'  => $phone_validated,
                        'user_id'    => $leave->user_id,
                        'company_id' => $leave->company_id,
                        'subject'    => 'Wnioski',
                        'body'       => 'Akceptacja wniosku przez ' . $leave->manager->name,
                        'status'     => 'UNKNOW',
                        'price'      => $messageData['points'] ?? 0.00,
                    ]);
                }
            } else {
                // Wystąpił błąd HTTP, błąd połączenia lub błąd biznesowy z API (wg logiki w sendSms)
                SentMessage::create([
                    'type'       => 'sms',
                    'recipient'  => $phone_validated,
                    'user_id'    => $leave->user_id,
                    'company_id' => $leave->company_id,
                    'subject'    => 'Wnioski',
                    'body'       => 'Akceptacja wniosku przez ' . $leave->manager->name,
                    'status'     => 'FAILED',
                    'price'      => $messageData['points'] ?? 0.00,
                ]);

                // finalStatus pozostaje 'API_FAILED'
            }
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'sms',
                'recipient'  => $phone_validated,
                'user_id'    => $leave->user_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Akceptacja wniosku przez ' . $leave->manager->name,
                'status'     => 'FAILED',
                'price'      => $messageData['points'] ?? 0.00,
            ]);
        }

        if (auth()->user()->role == 'admin' || auth()->user()->role == 'menedżer' || auth()->user()->role == 'właściciel') {
            return redirect()->route('leave.pending.index')->with('success', 'Zaakceptowane.');
        } else {
            return redirect()->route('leave.single.index')->with('success', 'Zaakceptowane.');
        }
    }
    /**
     * Odrzuca wniosek.
     *
     * @param Leave $leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Leave $leave): \Illuminate\Http\RedirectResponse
    {
        $leave->status = 'odrzucone';
        $leave->save();

        $leaveMail = new LeaveMailReject($leave);
        try {
            Mail::to($leave->user->email)->send($leaveMail);
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $leave->user->email,
                'user_id'    => $leave->user_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Odrzucenie wniosku przez ' . $leave->manager->name,
                'status'     => 'SENT',
                'price'      => 0.00,
            ]);
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $leave->user->email,
                'user_id'    => $leave->user_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Odrzucenie wniosku przez ' . $leave->manager->name,
                'status'     => 'FAILED',
                'price'      => 0.00,
            ]);
        }
        $sms_api = new SmsApi();
        $phone_validated = $sms_api->normalizePhoneNumber($leave->user->phone);
        $startDate = Carbon::createFromFormat('Y-m-d', $leave->start_date)->format('d.m.Y');
        $endDate = Carbon::createFromFormat('Y-m-d', $leave->end_date)->format('d.m.Y');

        $message = 'Odrzucono wniosek
' . $leave->type . '
' . $leave->manager->name . '
' . $startDate . ' - ' . $endDate . '

wibest.pl/login';

        try {
            $smsResult = $sms_api->sendSms($phone_validated, $message);
            // 2. Analiza wyniku zwróconego przez sendSms()
            if ($smsResult['success'] === true) {
                // Odpowiedź API znajduje się w kluczu 'data'
                $responseData = $smsResult['data'];

                // Sprawdzenie, czy struktura odpowiedzi jest poprawna (jak w przykładzie)
                if (isset($responseData['list'][0])) {
                    $messageData = $responseData['list'][0];

                    // Użycie danych z API do zapisu
                    SentMessage::create([
                        'type'       => 'sms',
                        'recipient'  => $phone_validated,
                        'user_id'    => $leave->user_id,
                        'company_id' => $leave->company_id,
                        'subject'    => 'Wnioski',
                        'body'       => 'Odrzucenie wniosku przez ' . $leave->manager->name,
                        'status'     => $messageData['status'] ?? 'SENT',
                        'price'      => $messageData['points'] ?? 0.00,
                    ]);
                } else {
                    // Logowanie: Success=true, ale brak danych wiadomości w liście
                    SentMessage::create([
                        'type'       => 'sms',
                        'recipient'  => $phone_validated,
                        'user_id'    => $leave->user_id,
                        'company_id' => $leave->company_id,
                        'subject'    => 'Wnioski',
                        'body'       => 'Odrzucenie wniosku przez ' . $leave->manager->name,
                        'status'     => 'UNKNOW',
                        'price'      => $messageData['points'] ?? 0.00,
                    ]);
                }
            } else {
                // Wystąpił błąd HTTP, błąd połączenia lub błąd biznesowy z API (wg logiki w sendSms)
                SentMessage::create([
                    'type'       => 'sms',
                    'recipient'  => $phone_validated,
                    'user_id'    => $leave->user_id,
                    'company_id' => $leave->company_id,
                    'subject'    => 'Wnioski',
                    'body'       => 'Odrzucenie wniosku przez ' . $leave->manager->name,
                    'status'     => 'FAILED',
                    'price'      => $messageData['points'] ?? 0.00,
                ]);

                // finalStatus pozostaje 'API_FAILED'
            }
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'sms',
                'recipient'  => $phone_validated,
                'user_id'    => $leave->user_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Odrzucenie wniosku przez ' . $leave->manager->name,
                'status'     => 'FAILED',
                'price'      => $messageData['points'] ?? 0.00,
            ]);
        }
        return redirect()->route('leave.pending.index')->with('success', 'Odrzucone.');
    }
    /**
     * Anuluje wniosek.
     *
     * @param Leave $leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Leave $leave): \Illuminate\Http\RedirectResponse
    {
        $leave->status = 'anulowane';
        $leave->save();

        $leaveMail = new LeaveMailCancel($leave);
        try {
            Mail::to($leave->manager->email)->send($leaveMail);
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $leave->manager->email,
                'user_id'    => $leave->manager_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Anulowanie wniosku przez ' . $leave->user->name,
                'status'     => 'SENT',
                'price'      => 0.00,
            ]);
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $leave->manager->email,
                'user_id'    => $leave->manager_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Anulowanie wniosku przez ' . $leave->user->name,
                'status'     => 'FAILED',
                'price'      => 0.00,
            ]);
        }
        $sms_api = new SmsApi();
        $phone_validated = $sms_api->normalizePhoneNumber($leave->manager->phone);
        $startDate = Carbon::createFromFormat('Y-m-d', $leave->start_date)->format('d.m.Y');
        $endDate = Carbon::createFromFormat('Y-m-d', $leave->end_date)->format('d.m.Y');

        $message = 'Anulowano wniosek
' . $leave->type . '
' . $leave->user->name . '
' . $startDate . ' - ' . $endDate . '

wibest.pl/login';

        try {
            $smsResult = $sms_api->sendSms($phone_validated, $message);
            // 2. Analiza wyniku zwróconego przez sendSms()
            if ($smsResult['success'] === true) {
                // Odpowiedź API znajduje się w kluczu 'data'
                $responseData = $smsResult['data'];

                // Sprawdzenie, czy struktura odpowiedzi jest poprawna (jak w przykładzie)
                if (isset($responseData['list'][0])) {
                    $messageData = $responseData['list'][0];

                    // Użycie danych z API do zapisu
                    SentMessage::create([
                        'type'       => 'sms',
                        'recipient'  => $phone_validated,
                        'user_id'    => $leave->manager_id,
                        'company_id' => $leave->company_id,
                        'subject'    => 'Wnioski',
                        'body'       => 'Anulowanie wniosku przez ' . $leave->user->name,
                        'status'     => $messageData['status'] ?? 'SENT',
                        'price'      => $messageData['points'] ?? 0.00,
                    ]);
                } else {
                    // Logowanie: Success=true, ale brak danych wiadomości w liście
                    SentMessage::create([
                        'type'       => 'sms',
                        'recipient'  => $phone_validated,
                        'user_id'    => $leave->manager_id,
                        'company_id' => $leave->company_id,
                        'subject'    => 'Wnioski',
                        'body'       => 'Anulowanie wniosku przez ' . $leave->user->name,
                        'status'     => 'UNKNOW',
                        'price'      => $messageData['points'] ?? 0.00,
                    ]);
                }
            } else {
                // Wystąpił błąd HTTP, błąd połączenia lub błąd biznesowy z API (wg logiki w sendSms)
                SentMessage::create([
                    'type'       => 'sms',
                    'recipient'  => $phone_validated,
                    'user_id'    => $leave->manager_id,
                    'company_id' => $leave->company_id,
                    'subject'    => 'Wnioski',
                    'body'       => 'Anulowanie wniosku przez ' . $leave->user->name,
                    'status'     => 'FAILED',
                    'price'      => $messageData['points'] ?? 0.00,
                ]);

                // finalStatus pozostaje 'API_FAILED'
            }
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'sms',
                'recipient'  => $phone_validated,
                'user_id'    => $leave->manager_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Anulowanie wniosku przez ' . $leave->user->name,
                'status'     => 'FAILED',
                'price'      => $messageData['points'] ?? 0.00,
            ]);
        }
        return redirect()->route('leave.single.index')->with('success', 'Anulowane.');
    }
    /**
     * Zwraca widok do tworzenia nowego wniosku w imieniu użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leavePending = $this->leaveService->countByUserId($request);
        return view('admin.leave-pending.create', compact('leavePending'));
    }
    /**
     * Zwraca widok do edycji w imieniu użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function edit(Leave $leave, Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leave = $this->leaveService->getLeaveById($leave);
        $leavePending = $this->leaveService->countByUserId($request);
        return view('admin.leave-pending.edit', compact('leave', 'leavePending'));
    }
    /**
     * Usuwa wniosek.
     *
     * @param Leave $leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Leave $leave)
    {
        if ($leave->delete()) {
            return redirect()->route('leave.pending.index')->with('success', 'Operacja się powiodła.');
        }
        return redirect()->back()->with('fail', 'Wystąpił błąd.');
    }
    public function toggle(Leave $leave)
    {
        if ($leave->status == 'zaakceptowane' && $leave->is_used == false) {
            $leave->is_used = true;
            $leave->status = 'zrealizowane';
        } else {
            $leave->is_used = false;
            $leave->status = 'zaakceptowane';
        }

        $leave->save();

        // Zwróć odpowiedź do JavaScriptu
        return response()->json(['success' => true, 'new_status' => $leave->is_used]);
    }
}
