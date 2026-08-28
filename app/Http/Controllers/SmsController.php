<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\SentMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmsController extends Controller
{
    /**
     * Pokazuje ustawień.
     */
    public function index(Request $request)
    {
        $companyId = $this->get_company_id();
        $client = Company::where('id', $companyId)->first();
        $user_id = auth()->id();
        $user = User::where('id', $user_id)->first();
        $msg_sms = SentMessage::where('company_id', $companyId)->where('type', 'sms')->orderByDesc('created_at')->get();
        if ($user->role == 'admin' || $user->role == 'menedżer' || $user->role == 'właściciel')
            $msg_paginate = SentMessage::where('company_id', $companyId)->where('type', 'sms')->orderByDesc('created_at')->paginate(10);
        else {
            $msg_paginate = SentMessage::where('company_id', $companyId)->where('type', 'sms')->where('user_id', $user_id)->orderByDesc('created_at')->paginate(10);
        }

        $month = $request->get('month', Carbon::now()->format('Y-m'));
        $start = Carbon::parse($month . '-01')->startOfMonth();
        $end = Carbon::parse($month . '-01')->endOfMonth();

        $query = SentMessage::where('company_id', $companyId)
            ->where('type', 'sms')
            ->where('status', 'QUEUE')
            ->whereBetween('created_at', [$start, $end]);

        // 📊 wykres (dni)
        $smsStats = $query->clone()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('date')
            ->pluck('count', 'date');

        // 🔢 suma SMS
        $totalSms = $query->count();

        // 💰 suma kwoty (zmień 'price' jeśli masz inną nazwę)
        $totalAmount = $query->sum('price');

        $labels = [];
        $data = [];

        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            $key = $date->format('Y-m-d');

            $labels[] = $date->format('d.m');
            $data[] = $smsStats[$key] ?? 0;
        }
        return view('admin.sms.index', compact('client', 'msg_paginate', 'msg_sms', 'labels', 'data', 'month', 'totalSms', 'totalAmount'));
    }
    public function smsStats(Request $request)
    {
        $companyId = $this->get_company_id();

        $month = $request->get('month');
        $start = Carbon::parse($month . '-01')->startOfMonth();
        $end = Carbon::parse($month . '-01')->endOfMonth();

        $query = SentMessage::where('company_id', $companyId)
            ->where('type', 'sms')
            ->where('status', 'QUEUE')
            ->whereBetween('created_at', [$start, $end]);

        // 📊 wykres (dni)
        $smsStats = $query->clone()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('date')
            ->pluck('count', 'date');

        // 🔢 suma SMS
        $totalSms = $query->count();

        // 💰 suma kwoty (zmień 'price' jeśli masz inną nazwę)
        $totalAmount = $query->sum('price');

        $labels = [];
        $data = [];

        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            $key = $date->format('Y-m-d');

            $labels[] = $date->format('d.m');
            $data[] = $smsStats[$key] ?? 0;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
            'totalSms' => $totalSms,
            'totalAmount' => $totalAmount,
        ]);
    }

}
