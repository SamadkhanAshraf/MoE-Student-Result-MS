<?php

namespace App\View\Components\Admin\FormComponents;

use Illuminate\View\Component;

class SelectProvince extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $provinceId;
    public function __construct($provinceId=null)
    {
        $this->provinceId = $provinceId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-components.select-province');
    }
}
