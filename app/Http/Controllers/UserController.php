<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.user.index', [
            'users' => $users,
        ]);
    }
    public function updateRole($id, $role)
    {
        // Znajdź użytkownika po ID
        $user = User::where('id', $id)->first();

        // Zaktualizuj rolę użytkownika
        $user->role = $role;
        $user->save();

        // Zwróć odpowiedź
        return response()->json([
            'message' => 'Rola użytkownika została zaktualizowana!',
            'role' => $user
        ]);
    }
}
