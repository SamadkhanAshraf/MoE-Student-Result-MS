<?php

namespace App\View\Components\Admin\FormComponents;

use Illuminate\View\Component;

class SelectStudent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $students;
    public function __construct($students=null)
    {
        $this->students = $students;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-components.select-student');
    }
}
