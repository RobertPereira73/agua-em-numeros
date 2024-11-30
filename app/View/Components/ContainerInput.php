<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ContainerInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name='',
        public string $class=''
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.container-input');
    }
}
