<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Master extends Component
{
    public $pageTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageTitle = 'Dynamic Time Table | Home')
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.master');
    }
}
