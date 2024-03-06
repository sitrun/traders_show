<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $count;
    public $posts;

    public function __construct($count = false, $posts = [])
    {
        //
		$this->count = $count;
		$this->posts = $posts;
    }

	//Метод из компонента
	public function test($str = '') {


        return "Метод из компонента! " . $str;
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
