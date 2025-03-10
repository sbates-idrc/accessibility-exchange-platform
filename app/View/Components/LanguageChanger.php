<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LanguageChanger extends Component
{
    public mixed $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(mixed $model)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.language-changer');
    }
}
