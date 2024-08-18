<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownMenu extends Component
{
    public $items;
    public $title;
    public $includeDivider;

    public function __construct($items, $title = 'Menu', $includeDivider = true)
    {
        $this->items = $items;
        $this->title = $title;
        $this->includeDivider = $includeDivider;
    }

    public function render() 
    {
        return view('components.dropdown-menu');
    }
}
