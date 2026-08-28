<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Mail::send('emails.contact', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'contactMessage' => $validated['message'],
        ], function ($mail) use ($validated) {
            $mail->to('biuro@wibest.pl')
                ->replyTo($validated['email'], $validated['name'])
                ->subject('Nowa wiadomość z formularza WIBEST');
        });

        return back()->with('success', 'Wiadomość została wysłana.');
    }
}
