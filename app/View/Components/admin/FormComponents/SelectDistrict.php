<?php

namespace App\View\Components\Admin\FormComponents;

use Illuminate\View\Component;

class SelectDistrict extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $districtId;
    public function __construct($districtId=null)
    {
        $this->districtId = $districtId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-components.select-district');
    }
}
