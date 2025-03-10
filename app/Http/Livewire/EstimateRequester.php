<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\User;
use App\Notifications\EstimateRequested;
use Illuminate\Support\Facades\Notification;

class EstimateRequester extends StatusUpdater
{
    public mixed $model;

    public function mount(Project $model)
    {
        $this->model = $model;
        $this->label = __('Send request');
        $this->statusAttribute = 'estimate_requested_at';
        $this->successMessage = __('You have successfully submitted an estimate request.');
        $this->redirectUrl = localized_route('projects.manage-estimates-and-agreements', $this->model);
    }

    public function render()
    {
        return view('livewire.status-updater');
    }

    public function notify(): void
    {
        flash($this->successMessage, 'success');

        $administrators = User::whereAdministrator()->get();
        Notification::send($administrators, new EstimateRequested($this->model));
    }
}
