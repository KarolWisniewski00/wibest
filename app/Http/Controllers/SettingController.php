<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Pokazuje ustawień.
     */
    public function index()
    {
        $users = User::where('company_id', $this->get_company_id())->get();

        $user_id = auth()->id();
        return view('admin.setting.index', compact('users', 'user_id'));
    }

    /**
     * Pokazuje formularz tworzenia ustawień.
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Zapisuje dane ustawień.
     */
    public function store(StoreCompanyRequest $request)
    {
        $id = auth()->id();
        $user = User::where('id', $id)->first();
        $isExist = Company::where('vat_number', $request->vat_number)->first();
        if ($isExist) {
            $isSend = Invitation::where('user_id', $user->id)->where('company_id', $isExist->id)->first();
            if($isSend){
                return redirect()->route('setting')
                    ->with('fail', 'Firma o podanym numerze NIP już istnieje')
                    ->with('success', 'Oczekiwanie na akceptację');
            }else{
                            Invitation::create([
                'user_id' => $user->id,
                'company_id' => $isExist->id,
                'status' => 'oczekujący',
            ]);
            return redirect()->route('setting')
                ->with('fail', 'Firma o podanym numerze NIP już istnieje')
                ->with('success', 'Wysłano zaproszenie, po zaakceptowaniu automatycznie twoje konto dołączy do firmy');
            }

        }
        // Tworzenie nowej firmy
        $res = Company::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'vat_number' => $request->vat_number,
        ]);
        $user->update([
            'company_id' => $res->id,
            'role' => 'admin',
        ]);
        $user->save();

        // Przekierowanie z komunikatem
        if ($res) {
            return redirect()->route('setting')->with('success', 'Firma została dodana.');
        } else {
            return redirect()->route('setting')->with('fail', 'Coś poszło nie tak.');
        }
    }

    /**
     * Pokazuje formularz edytowania ustawień.
     */
    public function edit(Company $company)
    {
        return view('admin.setting.edit', compact('company'));
    }

    /**
     * Zaktualizuj dane ustawień.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        // Aktualizacja firmy
        $res = $company->update([
            'name' => $request->name,
            'adress' => $request->adress,
            'vat_number' => $request->vat_number,
        ]);

        // Przekierowanie z komunikatem
        if ($res) {
            return redirect()->route('setting')->with('success', 'Firma została zaktualizowana.');
        } else {
            return redirect()->route('setting')->with('fail', 'Coś poszło nie tak.');
        }
    }
    public function acceptInvitation($id)
    {
        $invitation = Invitation::where('user_id', $id)->first();

        if (!$invitation) {
            return redirect()->route('setting')->with('fail', 'Zaproszenie nie istnieje.');
        }

        if ($invitation->status !== 'oczekujący') {
            return redirect()->route('setting')->with('fail', 'Zaproszenie straciło ważność.');
        }

        // Accept the invitation
        $invitation->delete();

        // Assign the user to the company
        $user = $invitation->user;
        $user->company_id = $invitation->company_id;
        $user->role = 'użytkownik';
        $user->save();

        return redirect()->route('setting')->with('success', 'Zaakceptowano zaproszenie.');
    }
    public function rejectInvitation($id)
    {
        $invitation = Invitation::where('user_id', $id)->first();
        if (!$invitation) {
            return redirect()->route('setting')->with('fail', 'Zaproszenie nie istnieje.');
        }
        $invitation->delete();

        return redirect()->route('setting')->with('success', 'Odrzucono zaproszenie.');
    }
    public function disconnect(User $user){
        $user->company_id = null;
        $user->role = null;
        $user->save();
        return redirect()->route('setting')->with('success', 'Rozłączono.');
    }
}
