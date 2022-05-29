<?php

namespace App\View\Components;

use Illuminate\View\Component;
use DB;

class Menu extends Component
{
    public $cats;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cats = DB::table('general')->select('category')->groupBy('category')->orderBy('category', 'ASC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu');
    }
}
