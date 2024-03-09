<?php

namespace App\View\Components\Admin\FormComponents;

use Illuminate\View\Component;

class SelectCollageDepartment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $departmentId;
    public function __construct($departmentId=null)
    {
        $this->departmentId = $departmentId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-components.select-collage-department');
    }
}
