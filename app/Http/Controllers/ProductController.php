<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Pokazuje Produkty.
     */
    public function index()
    {
        $products = Product::where('company_id', $this->get_company_id())->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Pokazuje Produkt.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Pokazuje formularz tworzenia nowego produktu.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Zapisuje nowego produkt w bazie danych.
     */
    public function store(Request $request)
    {
        $user = User::where('id', auth()->id())->first();

        // Obliczanie wartości
        $quantity = $request->quantity ?? 1; // Ustal ilość, domyślnie 1, jeśli nie podano
        $unitPrice = $request->unit_price;

        $subtotal = $unitPrice * $quantity; // Obliczenie subtotal
        $vatAmount = $subtotal * ($request->vat_rate / 100); // Obliczenie kwoty VAT
        $total = $subtotal + $vatAmount; // Obliczenie wartości całkowitej

        // Tworzenie nowego produktu
        $res = Product::create([
            'name' => $request->name,
            'unit_price' => $unitPrice,
            'subtotal' => $subtotal,
            'vat_rate' => $request->vat_rate,
            'magazine' => $request->magazine,
            'vat_amount' => $vatAmount,
            'total' => $total,
            'description' => $request->description,
            'company_id' => $this->get_company_id(),
            'user_id' => $user->id,
        ]);

        // Przekierowanie z komunikatem
        if ($res) {
            return redirect()->route('product')->with('success', 'Produkt został dodany.');
        } else {
            return redirect()->route('product')->with('fail', 'Coś poszło nie tak.');
        }
    }


    /**
     * Pokazuje formularz edycji produktu.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product')); // Widok formularza tworzenia
    }

    /**
     * Aktualizuje produkt w bazie danych.
     */
    public function update(Request $request, Product $product)
    {
        // Aktualizacja danych usługi
        $res = $product->update([
            'name' => $request->name,
            'unit_price' => $request->unit_price,
            'vat_rate' => $request->vat_rate,
            'description' => $request->description,
            'magazine' => $request->magazine,
        ]);

        if ($res) {
            return redirect()->route('product')->with('success', 'Produkt został zaktualizowany.');
        } else {
            return redirect()->route('product')->with('fail', 'Coś poszło nie tak.');
        }
    }

    /**
     * Usuwa produkt.
     */
    public function delete(Product $product)
    {
        // Sprawdzenie, czy usługa istnieje
        if ($product) {
            // Usunięcie usługi
            $product->delete();

            // Przekierowanie z komunikatem sukcesu
            return redirect()->route('product')->with('success', 'Produkt został usuniętay');
        } else {
            // Przekierowanie z komunikatem o błędzie
            return redirect()->route('product')->with('fail', 'Nie znaleziono produktu.');
        }
    }
}
