<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;

class ValidationError extends Component
{
    public string $field;

    public function __construct(string $field)
    {
        $this->field = $field;
    }

    public function render(): Application|View|Factory|Htmlable|string|Closure
    {
        return view('components.validation-error');
    }
}
