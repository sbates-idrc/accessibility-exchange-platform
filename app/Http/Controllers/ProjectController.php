<?php

namespace App\Http\Controllers;

use App\Enums\ProvinceOrTerritory;
use App\Http\Requests\DestroyProjectRequest;
use App\Http\Requests\StoreProjectContextRequest;
use App\Http\Requests\StoreProjectLanguagesRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\UpdateProjectTeamRequest;
use App\Models\Impact;
use App\Models\Individual;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelOptions\Options;

class ProjectController extends Controller
{
    public function showContextSelection(): View
    {
        $projectable = Auth::user()->projectable;

        return view('projects.show-context-selection', [
            'projectable' => $projectable,
            'ancestors' => Arr::sort(Options::forArray($projectable->projects->pluck('name', 'id')->toArray())->nullable(__('Choose a project…'))->toArray()),
        ]);
    }

    public function storeContext(StoreProjectContextRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($data['context'] === 'new') {
            session()->forget('ancestor');
        }

        if ($data['context'] === 'follow-up') {
            session()->put('ancestor', $data['ancestor']);
        }

        return redirect(localized_route('projects.show-language-selection'));
    }

    public function showLanguageSelection(): View
    {
        return view('projects.show-language-selection', [
            'languages' => Options::forArray(get_available_languages(true))->nullable(__('Choose a language…'))->toArray(),
        ]);
    }

    public function storeLanguages(StoreProjectLanguagesRequest $request): RedirectResponse
    {
        $data = $request->validated();

        session()->put('languages', $data['languages']);

        return redirect(localized_route('projects.create'));
    }

    public function create(): View
    {
        return view('projects.create', [
            'projectable' => Auth::user()->projectable,
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        $data['contact_person_name'] = $user->name;
        $data['contact_person_email'] = $user->email;
        $data['preferred_contact_method'] = 'email';

        $data['languages'] = session()->get('languages');

        $project = Project::create($data);

        session()->forget(['ancestor', 'languages']);

        flash(__('Your project has been created.'), 'success');

        return redirect(localized_route('projects.edit', ['project' => $project, 'step' => 1]));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(Project $project): View
    {
        $user = Auth::user();

        $language = request()->query('language');

        if (! in_array($language, $project->languages)) {
            $language = false;
        }

        return view('projects.show', [
            'language' => $language ?? locale(),
            'project' => $project,
            'engagements' => $user->can('manage', $project) || $user->isAdministrator() ? $project->allEngagements : $project->engagements,
        ]);
    }

    public function edit(Project $project): View
    {
        return view('projects.edit', [
            'project' => $project,
            'languages' => Options::forArray(get_available_languages(true))->nullable(__('Choose a language…'))->toArray(),
            'impacts' => Options::forModels(Impact::class)->toArray(),
            'consultants' => Options::forModels(Individual::class)->nullable(__('Choose an accessibility consultant…'))->toArray(), // TODO: Only select accessibility consultants
            'regions' => Options::forEnum(ProvinceOrTerritory::class)->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $data = $request->validated();

        $project->fill($data);
        $project->save();

        if (isset($data['impacts'])) {
            $project->impacts()->sync($data['impacts'] ?? []);
        }

        return $project->handleUpdateRequest($request, 1);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateTeam(UpdateProjectTeamRequest $request, Project $project): RedirectResponse
    {
        $data = $request->validated();

        $project->fill($data);
        $project->save();

        return $project->handleUpdateRequest($request, 2);
    }

    /**
     * Update the specified resource's status.
     */
    public function updatePublicationStatus(Request $request, Project $project): RedirectResponse
    {
        if ($request->input('unpublish')) {
            $project->unpublish();
        } elseif ($request->input('publish')) {
            $project->publish();
        }

        return redirect(localized_route('projects.show', $project));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyProjectRequest $request, Project $project): RedirectResponse
    {
        $project->delete();

        flash(__('Your project has been deleted.'), 'success');

        return redirect(localized_route('dashboard'));
    }

    /**
     * Display the management UI for the specified resource.
     */
    public function manage(Request $request, Project $project): View
    {
        return view('projects.manage', ['project' => $project]);
    }

    public function manageEstimatesAndAgreements(Project $project): View
    {
        return view('projects.manage-estimates-and-agreements', [
            'project' => $project,
            'engagements' => $project->allEngagements->filter(fn ($engagement) => $engagement->isPreviewable()),
        ]);
    }

    public function suggestedSteps(Request $request, Project $project): View
    {
        return view('projects.suggested-steps', ['project' => $project]);
    }
}
