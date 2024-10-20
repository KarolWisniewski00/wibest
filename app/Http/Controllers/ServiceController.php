<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Pokazuje usługi.
     */
    public function index()
    {
        $services = Service::where('company_id', $this->get_company_id())->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.service.index', compact('services'));
    }

    /**
     * Pokazuje usługę.
     */
    public function show(Service $service)
    {
        return view('admin.service.show', compact('service'));
    }

    /**
     * Pokazuje formularz tworzenia nowej usługi.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Zapisuje formularz tworzenia nowej usługi.
     */
    public function store(ServiceRequest $request)
    {
        $user = User::where('id', auth()->id())->first();
    
        // Obliczanie wartości
        $quantity = $request->quantity ?? 1; // Ustal ilość, domyślnie 1, jeśli nie podano
        $unitPrice = $request->unit_price;
    
        $subtotal = $unitPrice * $quantity; // Obliczenie subtotal
        $vatAmount = $subtotal * ($request->vat_rate / 100); // Obliczenie kwoty VAT
        $total = $subtotal + $vatAmount; // Obliczenie wartości całkowitej
    
        // Tworzenie nowego produktu
        $res = Service::create([
            'name' => $request->name,
            'unit_price' => $unitPrice,
            'subtotal' => $subtotal,
            'vat_rate' => $request->vat_rate,
            'vat_amount' => $vatAmount,
            'total' => $total,
            'unit' => null,
            'description' => $request->description,
            'company_id' => $this->get_company_id(),
            'user_id' => $user->id,
        ]);
    
        // Przekierowanie z komunikatem
        if ($res) {
            return redirect()->route('service')->with('success', 'Usługa został dodany.');
        } else {
            return redirect()->route('service')->with('fail', 'Coś poszło nie tak.');
        }
    }
    

    /**
     * Pokazuje formularz edytowania usługi.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service')); // Widok formularza tworzenia
    }

    /**
     * Aktualizuje dane usługi.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        // Aktualizacja danych usługi
        $res = $service->update([
            'name' => $request->name,
            'unit_price' => $request->unit_price,
            'vat_rate' => $request->vat_rate,
            'description' => $request->description,
        ]);

        if ($res) {
            return redirect()->route('service')->with('success', 'Usługa została zaktualizowana.');
        } else {
            return redirect()->route('service')->with('fail', 'Coś poszło nie tak.');
        }
    }

    /**
     * Usuwa usługę.
     */
    public function delete(Service $service)
    {
        if ($service) {
            $service->delete();
            return redirect()->route('service')->with('success', 'Usługa została usunięta.');
        } else {
            return redirect()->route('service')->with('fail', 'Nie znaleziono usługi.');
        }
    }
}
