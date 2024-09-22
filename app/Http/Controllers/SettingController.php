<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Pokazuje ustawień.
     */
    public function index()
    {
        return view('admin.setting.index');
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
        // Tworzenie nowej firmy
        $res = Company::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'bank' => $request->bank,
            'vat_number' => $request->vat_number,
        ]);
        $user->update([
            'company_id' => $res->id
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
            'bank' => $request->bank,
            'vat_number' => $request->vat_number,
        ]);

        // Przekierowanie z komunikatem
        if ($res) {
            return redirect()->route('setting')->with('success', 'Firma została zaktualizowana.');
        } else {
            return redirect()->route('setting')->with('fail', 'Coś poszło nie tak.');
        }
    }
}
