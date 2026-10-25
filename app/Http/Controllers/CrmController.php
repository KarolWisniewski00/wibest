<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Crm;
use App\Services\CrmAnalysisService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CrmController extends Controller
{
    /**
     * Pokazuje stronę SEO.
     */
    public function index()
    {
        $crms = Crm::with('company')->with([
            'user' => function ($q) {
                $q->withoutGlobalScope('no_crm');
            }
        ])
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('admin.crm.index', [
            'crms' => $crms,
        ]);
    }
    public function create()
    {
        $companies = Company::select('id', 'name', 'vat_number')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->name,
                    'description' => $company->vat_number,
                ];
            });
        return view('admin.crm.create', compact('companies'));
    }
    public function edit(Crm $crm)
    {
        $companies = Company::select('id', 'name', 'vat_number')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->name,
                    'description' => $company->vat_number,
                ];
            });
        $crm->load('company')->load([
            'user' => function ($q) {
                $q->withoutGlobalScope('no_crm');
            }
        ]);
        return view('admin.crm.edit', compact('companies', 'crm'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|exists:companies,id',
            'user' => 'required|exists:users,id',
            'type' => 'required|string',
            'content' => 'nullable|string',
            'datetime_start' => 'required|string',
            'datetime_end' => 'required|string',
            'already_realized' => 'nullable',
            'important' => 'nullable'
        ]);

        // 🔥 konwersja daty
        $start = Carbon::createFromFormat('d.m.Y H:i', $validated['datetime_start']);
        $end = Carbon::createFromFormat('d.m.Y H:i', $validated['datetime_end']);

        // Jeżeli aktywność została od razu zrealizowana → analiza AI
        if ($request->has('already_realized')) {
            $crm = Crm::create([
                'company_id' => $validated['company'],
                'user_id' => $validated['user'],
                'type' => $validated['type'],
                'result' => $validated['content'],
                'datetime_start' => $start,
                'datetime_end' => $end,
                'datetime_complete' => $request->has('already_realized') ? now() : null, // aktualna data jeśli zaznaczone
                'important' => $request->has('important'), // checkbox
                'created_user_id' => Auth::id() // zapis twórcy
            ]);
            $analysis = app(CrmAnalysisService::class)->analyzeActivity($crm);

            $crm->update([
                'ai_analysis' => $analysis['summary'] ?? null,
                'ai_next_step' => $analysis['next_step'] ?? null,
                'ai_next_step_at' => $analysis['next_step_at'] ?? null,
                'ai_next_step_type' => $analysis['next_step_type'] ?? null,
                'ai_signals' => $analysis['signals'] ?? null,
                'ai_problem' => $analysis['problem'] ?? null,
                'ai_value' => $analysis['value'] ?? null,
                'ai_missing_information' => $analysis['missing_information'] ?? null,
                'ai_reason' => $analysis['reason'] ?? null,
                'ai_should_create_next_step' => $analysis['should_create_next_step'] ?? null,
                'ai_sales_stage' => $analysis['sales_stage'] ?? null,
            ]);
            $company = Company::where('id', $validated['company'])->first();

            $company->update([
                'ai_classification' => $analysis['classification'] ?? null,
                'ai_classification_reason' => $analysis['classification_reason'] ?? null,
                'ai_classification_updated_at' => now(),
            ]);
            
            return redirect()
                ->route('setting.crm.ai-analysis', $crm)
                ->with('success', 'Utworzono aktywność.');
        }else{
        $crm = Crm::create([
            'company_id' => $validated['company'],
            'user_id' => $validated['user'],
            'type' => $validated['type'],
            'plan' => $validated['content'],
            'datetime_start' => $start,
            'datetime_end' => $end,
            'datetime_complete' => $request->has('already_realized') ? now() : null, // aktualna data jeśli zaznaczone
            'important' => $request->has('important'), // checkbox
            'created_user_id' => Auth::id() // zapis twórcy
        ]);
        }

        return redirect()->route('setting.crm')->with('success', 'Utworzono aktywność.');
    }
    public function update(Crm $crm, Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|exists:companies,id',
            'user' => 'required|exists:users,id',
            'type' => 'required|string',
            'content' => 'nullable|string',
            'datetime_start' => 'required|string',
            'datetime_end' => 'required|string',
            'already_realized' => 'nullable',
            'important' => 'nullable'
        ]);

        // 🔥 konwersja daty
        $start = Carbon::createFromFormat('d.m.Y H:i', $validated['datetime_start']);
        $end = Carbon::createFromFormat('d.m.Y H:i', $validated['datetime_end']);

        $crm->update([
            'company_id' => $validated['company'],
            'user_id' => $validated['user'],
            'type' => $validated['type'],
            'result' => $validated['content'],
            'datetime_start' => $start,
            'datetime_end' => $end,
            'datetime_complete' => now(), // aktualna data jeśli zaznaczone
            'important' => null, // checkbox
        ]);
            $analysis = app(CrmAnalysisService::class)->analyzeActivity($crm);

            $crm->update([
                'ai_analysis' => $analysis['summary'] ?? null,
                'ai_next_step' => $analysis['next_step'] ?? null,
                'ai_next_step_at' => $analysis['next_step_at'] ?? null,
                'ai_next_step_type' => $analysis['next_step_type'] ?? null,
                'ai_signals' => $analysis['signals'] ?? null,
                'ai_problem' => $analysis['problem'] ?? null,
                'ai_value' => $analysis['value'] ?? null,
                'ai_missing_information' => $analysis['missing_information'] ?? null,
                'ai_reason' => $analysis['reason'] ?? null,
                'ai_should_create_next_step' => $analysis['should_create_next_step'] ?? null,
                'ai_sales_stage' => $analysis['sales_stage'] ?? null,
            ]);
            $company = Company::where('id', $validated['company'])->first();

            $company->update([
                'ai_classification' => $analysis['classification'] ?? null,
                'ai_classification_reason' => $analysis['classification_reason'] ?? null,
                'ai_classification_updated_at' => now(),
            ]);
            return redirect()
                ->route('setting.crm.ai-analysis', $crm)
                ->with('success', 'Zaktualizowano aktywność.');
    }
    public function aiNextStep(Crm $crm)
    {
    $crm->load([
        'company',
    ]);

    $crm->load([
        'user' => function ($query) {
            $query->withoutGlobalScope('no_crm');
        },
    ]);

        return view('admin.crm.ai-analysis', [
            'crm' => $crm,
        ]);
    }
    public function get(Request $request)
    {
        $crms = Crm::orderBy('created_at', 'desc')->with([
            'user' => function ($q) {
                $q->withoutGlobalScope('no_crm');
            }
        ])
            ->paginate(3);

        $rows_table = [];
        $rows_list = [];
        foreach ($crms as $crm) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-crm', ['crm' => $crm])->render());
        }

        return response()->json([
            'data' => $crms->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $crms->nextPageUrl(),
        ]);
    }
    public function delete(Crm $crm)
    {
        $crm->delete();

        return redirect()
            ->route('setting.crm')
            ->with('success', 'Aktywność usunięta!');
    }
}
