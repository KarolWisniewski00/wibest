<?php
namespace App\View\Components;

use WireUi\View\Components\Inputs\NumberInput as WireNumberInput;

class MyNumber extends WireNumberInput
{
    protected function getView(): string
    {
        return 'components.my-number';
    }
}
