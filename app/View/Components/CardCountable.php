<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CardCountable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $idCount,
        public string $title,
        public string $class = '',
        public string $events=''
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-countable');
    }
}
