<?php

namespace App\View\Components\Admin\FormComponents;

use Illuminate\View\Component;

class ImageLoader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $appendixes;
    public function __construct($appendixes=null)
    {
        $this->appendixes = $appendixes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-components.image-loader');
    }
}
