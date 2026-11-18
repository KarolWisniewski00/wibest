<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserEmailAvailability;
use Illuminate\Http\Request;

class UserEmailAvailabilityController extends Controller
{
    public function __invoke(Request $request)
    {
        $input = $request->validate([
            'email' => 'nullable|string|max:255',
            'company_id' => 'required_without:user_id|nullable|integer',
            'user_id' => 'nullable|integer',
        ]);

        if ($request->filled('user_id')) {
            abort_unless($request->user()?->role === 'właściciel', 403);
            $user = User::withoutGlobalScope('no_crm')->findOrFail($input['user_id']);
            return response()->json(app(UserEmailAvailability::class)->checkForUser($input['email'] ?? '', $user));
        }

        return response()->json(app(UserEmailAvailability::class)
            ->check($input['email'] ?? '', $input['company_id'], true));
    }
}
