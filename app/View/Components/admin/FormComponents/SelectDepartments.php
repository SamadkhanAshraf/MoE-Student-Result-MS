<?php

namespace App\View\Components\Admin\FormComponents;

use Illuminate\View\Component;

class SelectDepartments extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $departments;
    public function __construct($departments=null)
    {
        $this->departments = $departments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-components.select-departments');
    }
}
