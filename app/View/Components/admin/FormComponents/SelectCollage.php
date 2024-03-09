<?php

namespace App\View\Components\Admin\FormComponents;

use Illuminate\View\Component;

class SelectCollage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $collageId;
    public function __construct($collageId=null)
    {
        $this->collageId = $collageId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-components.select-collage');
    }
}
