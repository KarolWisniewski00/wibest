<?php

namespace App\Http\Controllers;

use App\Livewire\Calendar;
use App\Repositories\WorkSessionRepository;
use App\Services\LeaveService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected LeaveService $leaveService;

    public function __construct(
        LeaveService $leaveService,
    ) {
        $this->leaveService = $leaveService;
    }
    /**
     * Wyświetla stronę główną.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }

    public function version()
    {
        return view('admin.version.index');
    }
}
