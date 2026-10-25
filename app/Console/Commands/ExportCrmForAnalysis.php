<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExportCrmForAnalysis extends Command
{
    protected $signature = 'crm:export-analysis';

    protected $description = 'Eksportuje dane CRM do JSON do analizy sprzedaży';

    public function handle()
    {
        $this->info('Pobieranie danych CRM...');

        /*
         * DOSTOSUJ NAZWY TABEL:
         *
         * crm_activities -> tabela aktywności
         * companies      -> tabela firm
         * users          -> użytkownicy
         */

        $activities = DB::table('crm')
            ->orderBy('created_at')
            ->get();

        $companies = DB::table('companies')
            ->get();

        $users = DB::table('users')
            ->select('id', 'name', 'email')
            ->get();

        $data = [
            'exported_at' => now()->toDateTimeString(),

            'companies' => $companies->map(function ($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->name ?? null,
                    'nip' => $company->vat_number ?? null,
                    'location' => $company->adress ?? null,
                ];
            })->values(),

            'users' => $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ];
            })->values(),

            'activities' => $activities->map(function ($activity) {
                return [
                    'id' => $activity->id,
                    'company_id' => $activity->company_id,
                    'user_id' => $activity->user_id,
                    'type' => $activity->type,
                    'note' => $activity->notes,
                    'urgent' => (bool) $activity->important,
                    'done' => !is_null($activity->datetime_complete),
                    'created_at' => $activity->created_at,
                ];
            })->values(),
        ];

        $filename = 'crm-analysis-' . now()->format('Y-m-d-H-i-s') . '.json';

        Storage::disk('local')->put(
            $filename,
            json_encode(
                $data,
                JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            )
        );

        $path = storage_path('app/private/' . $filename);

        $this->info('Eksport zakończony.');
        $this->info("Plik: {$path}");

        return self::SUCCESS;
    }
}