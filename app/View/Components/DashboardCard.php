<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCard extends Component
{

    public $title;
    public $count;
    public $url;
    public $icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $count, $url, $icon)
    {
        $this->title = $title;
        $this->count = $count;
        $this->url = $url;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-card');
    }
}
