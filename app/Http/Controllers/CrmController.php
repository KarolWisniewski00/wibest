<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Crm;
use App\Services\CrmAnalysisService;
use Carbon\Carbon;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use OpenAI\Exceptions\ErrorException;
use OpenAI\Exceptions\RateLimitException;

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
            ->activityOrder()
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
        if ($request->boolean('already_realized')) {
            $crm = Crm::create([
                'company_id' => $validated['company'],
                'user_id' => $validated['user'],
                'type' => $validated['type'],
                'result' => $validated['content'] ?? null,
                'datetime_start' => $start,
                'datetime_end' => $end,
                'datetime_complete' => now(),
                'important' => $request->has('important'), // checkbox
                'created_user_id' => Auth::id() // zapis twórcy
            ]);
            $analysis = $this->analyzeActivity($crm);

            if ($analysis === null) {
                return $this->analysisRateLimitedResponse();
            }

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
            'plan' => $validated['content'] ?? null,
            'datetime_start' => $start,
            'datetime_end' => $end,
            'datetime_complete' => null,
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
            'plan' => 'nullable|string',
            'result' => 'nullable|string',
            'datetime_start' => 'required|string',
            'datetime_end' => 'required|string',
            'already_realized' => 'nullable',
            'important' => 'nullable'
        ]);

        // 🔥 konwersja daty
        $start = Carbon::createFromFormat('d.m.Y H:i', $validated['datetime_start']);
        $end = Carbon::createFromFormat('d.m.Y H:i', $validated['datetime_end']);

        $wasCompleted = $crm->datetime_complete !== null;
        $isCompleted = $wasCompleted || $request->boolean('already_realized');
        $content = [($isCompleted ? 'result' : 'plan') => $validated['content'] ?? null];

        if ($wasCompleted) {
            $content = [
                'plan' => array_key_exists('plan', $validated) ? $validated['plan'] : $crm->plan,
                'result' => array_key_exists('result', $validated)
                    ? $validated['result']
                    : ($validated['content'] ?? $crm->result),
            ];
        }

        $crm->update([
            'company_id' => $validated['company'],
            'user_id' => $validated['user'],
            'type' => $validated['type'],
            'datetime_start' => $start,
            'datetime_end' => $end,
            'datetime_complete' => $isCompleted ? ($crm->datetime_complete ?? now()) : null,
            'important' => $isCompleted ? null : $crm->important,
        ] + $content);

        if (!$isCompleted) {
            return redirect()->route('setting.crm')->with('success', 'Zaktualizowano aktywność.');
        }

            $analysis = $this->analyzeActivity($crm);

            if ($analysis === null) {
                return $this->analysisRateLimitedResponse();
            }

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
        $crms = Crm::activityOrder()->with('company')->with([
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

    private function analyzeActivity(Crm $crm): ?array
    {
        // Podstawowy zapis jest już wykonany. Przechwytujemy wyłącznie limit usługi AI.
        try {
            return app(CrmAnalysisService::class)->analyzeActivity($crm);
        } catch (\Exception $exception) {
            for ($error = $exception; $error !== null; $error = $error->getPrevious()) {
                if ($error instanceof RateLimitException
                    || ($error instanceof ErrorException && (
                        $error->getStatusCode() === 429
                        || $error->getErrorType() === 'rate_limit_exceeded'
                        || $error->getErrorCode() === 'rate_limit_exceeded'
                    ))
                    || ($error instanceof RequestException && $error->getResponse()?->getStatusCode() === 429)
                    || trim($error->getMessage()) === 'Request rate limit has been exceeded.') {
                    Log::warning('CRM AI analysis rate limit exceeded.', [
                        'crm_id' => $crm->id,
                        'company_id' => $crm->company_id,
                        'exception' => $exception,
                    ]);

                    return null;
                }
            }

            throw $exception;
        }
    }

    private function analysisRateLimitedResponse()
    {
        return redirect()->route('setting.crm')->with('warning',
            'Aktywność została zapisana, ale analiza AI chwilowo nie mogła zostać wykonana z powodu limitu usługi.');
    }
}
