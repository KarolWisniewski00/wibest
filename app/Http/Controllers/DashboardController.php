<?php

namespace App\Http\Controllers;

use App\Services\LeaveService;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $leaves = $this->leaveService->getMainByManagerId($request);
        return view('dashboard', compact('leaves'));
    }

    public function version()
    {
        return view('admin.version.index');
    }
}
