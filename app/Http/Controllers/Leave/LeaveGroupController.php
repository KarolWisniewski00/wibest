<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class LeaveGroupController extends Controller
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
        // Używamy repozytorium, aby uzyskać ID użytkownika
        $userId = $this->userRepository->getAuthUserId();
       
        return view('admin.leave.index', compact('userId'));
    }
}
