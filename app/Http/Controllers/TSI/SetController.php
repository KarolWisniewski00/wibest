<?php

namespace App\Http\Controllers;

use App\Models\Set;
use Illuminate\Http\Request;

class SetController extends Controller
{
    /**
     * Pokazuje Zestawy.
     */
    public function index()
    {
        $sets = Set::where('company_id', $this->get_company_id())->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.set.index', compact('sets'));
    }
    public function create()
    {
        return redirect()->route('set')->with('fail', 'Wkrótce dostępne.');
    }
}
