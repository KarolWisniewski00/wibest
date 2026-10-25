<?php

namespace App\Http\Controllers\Object;


use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\FilterDateService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    protected UserRepository $userRepository;
    protected FilterDateService $filterDateService;
    protected WorkSessionService $workSessionService;
    protected UserService $userService;

    public function __construct(
        UserRepository $userRepository,
        FilterDateService $filterDateService,
        WorkSessionService $workSessionService,
        UserService $userService,
    ) {
        $this->userRepository = $userRepository;
        $this->filterDateService = $filterDateService;
        $this->workSessionService = $workSessionService;
        $this->userService = $userService;
    }
    /**
     * Wyświetla stronę kalendarza
     *
     * @return \Illuminate\View\View
     */
    public function dashboard(Request $request): \Illuminate\View\View
    {
        return view('admin.object.dashboard');
    }
    public function create()
    {
        $locations = Location::query()
            ->orderBy('name')
            ->get();

        $users = User::query()
            ->orderBy('name')
            ->where('company_id', auth()->user()->company_id)
            ->get();

        return view('admin.object.create', compact(
            'locations',
            'users'
        ));
    }
}
