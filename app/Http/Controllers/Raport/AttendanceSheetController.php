<?php

namespace App\Http\Controllers\Raport;


use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AttendanceSheetController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Wyświetla stronę kalendarza
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        
        return view('admin.attendance.index');
    }
}
