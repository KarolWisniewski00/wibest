<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Pokazuje usług.
     */
    public function index()
    {
        // Paginate the services, e.g., 10 services per page
        $services = Service::paginate(10);

        // Pass paginated services to the view
        return view('admin.service.index', compact('services'));
    }
    public function show(Service $service)
    {
        // Pass the service object to the view
        return view('admin.service.show', compact('service'));
    }
    public function create()
    {
        return view('admin.service.create'); // Widok formularza tworzenia
    }

    public function store(ServiceRequest $request)
    {
        // Tworzenie nowej firmy
        $res = Service::create([
            'name' => $request->name,
            'unit_price' => $request->unit_price,
            'subtotal' => $request->subtotal,
            'vat_rate' => $request->vat_rate,
            'vat_amount' => $request->vat_amount,
            'total' => $request->total,
            'description' => $request->description,
        ]);

        // Przekierowanie z komunikatem
        if ($res) {
            return redirect()->route('service')->with('success', 'Usługa została dodana.');
        } else {
            return redirect()->route('service')->with('fail', 'Coś poszło nie tak.');
        }
    }
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service')); // Widok formularza tworzenia
    }
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
    public function delete(Service $service)
    {
        // Sprawdzenie, czy usługa istnieje
        if ($service) {
            // Usunięcie usługi
            $service->delete();

            // Przekierowanie z komunikatem sukcesu
            return redirect()->route('service')->with('success', 'Usługa została usunięta.');
        } else {
            // Przekierowanie z komunikatem o błędzie
            return redirect()->route('service')->with('fail', 'Nie znaleziono usługi.');
        }
    }
}
