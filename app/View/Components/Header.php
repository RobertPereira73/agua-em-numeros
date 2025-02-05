<?php

namespace App\View\Components;

use App\Http\Class\Menu;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?Menu $actualMenu=null
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $userName = auth()->user()->name;
        return view('components.header', ['userName' => $userName]);
    }
}
