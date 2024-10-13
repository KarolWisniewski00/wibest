<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $userExisted = User::where('email', $user->email)->where('oauth_id', null)->first();
            if ($userExisted) {
                //pierwsze logowanie przez google gdy użytkownik w bazie istnieje
                $userExisted->update([
                    'oauth_id' => $user->id,
                    'avatar' => $userExisted->avatar == null ? $user->avatar : $userExisted->avatar,
                ]);
                Auth::login($userExisted);
                return redirect()->route('dashboard');
            }
            $userExisted2 = User::where('email', $user->email)->where('oauth_id', $user->id)->first();
            if ($userExisted2) {
                //każde następne logowanie przez google gdy użytkownik w bazie istnieje
                $userExisted2->update([
                    'avatar' => $userExisted2->avatar == null ? $user->avatar : $userExisted2->avatar,
                ]);
                Auth::login($userExisted2);
                return redirect()->route('dashboard');
            } else {
                //pierwsze logowanie przez google gdy użytkownik w bazie nie istnieje
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->getId,
                    'password' => bcrypt('password'),
                    'avatar' => $user->avatar,
                ]);
                Auth::login($newUser);
                return redirect()->route('dashboard');
            }
        } catch (Exception $e) {
            dd($e);
        }
        // Tutaj możesz obsłużyć użytkownika zalogowanego przez Google, np. zaktualizować rekord w bazie danych lub utworzyć nowego użytkownika.

        // Zaimplementuj logikę, która przetworzy informacje o użytkowniku

        return redirect()->route('dashboard');
    }
}
