<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Offer;
use App\Models\Project;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    /**
     * Pokazuje projektów.
     */
    public function index()
    {
        $projects = $this->get_projects();
        return view('admin.project.index', compact('projects'));
    }
    /**
     * Pokazuje projektów.
     */
    public function index_refresh()
    {
        $this->check_all_websites_and_update_status();
        $projects = $this->get_projects();
        return view('admin.project.index', compact('projects'));
    }
    /**
     * Pokazuje formularz tworzenia nowego projektu.
     */
    public function create(Client $client)
    {
        return view('admin.project.create', compact('client'));
    }

    /**
     * Przechowuje nowy projekt.
     */
    public function store(Request $request)
    {

        $user = User::where('id', auth()->id())->first();
        // Tworzenie nowego obiektu klienta
        $project = new Project();
        $project->name = $request->name;
        $project->client_id = $request->client_id;
        $project->sandbox_domain = $request->sandbox_domain;
        $project->production_domain = $request->production_domain;
        $project->shortcut = $request->shortcut;
        $project->technology = $request->technology;
        $project->user_id = $user->id;
        $project->company_id = $user->company_id;

        // Przechowywanie danych w bazie
        $res = $project->save();

        // Sprawdzanie, czy klient został zapisany pomyślnie
        if ($res) {
            return redirect()->route('project')->with('success', 'Projekt został pomyślnie dodany.');
        } else {
            return redirect()->route('project.create')->with('fail', 'Wystąpił błąd podczas dodawania projektu. Proszę spróbować ponownie.');
        }
    }
    public function show(Project $project)
    {
        $offers = Offer::where('client_id', $project->client_id)->get();
        $project = $this->check_website_and_update_status($project);
        return view('admin.project.show', compact('offers', 'project'));
    }
}
