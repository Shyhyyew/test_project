<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TreeList extends Component
{
    public mixed $item, $name;

    /**
     * Create a new component instance.
     */
    public function __construct($item, $name)
    {
        $this->item = $item;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tree-list');
    }
}
