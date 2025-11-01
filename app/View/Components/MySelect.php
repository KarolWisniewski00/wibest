<?php
namespace App\View\Components;

use WireUi\View\Components\Select as WireSelect;

class MySelect extends WireSelect
{
    protected function getView(): string
    {
        return 'components.my-select';
    }
}
