<?php
namespace App\View\Components;

use WireUi\View\Components\Errors as WireErrors;

class MyErrors extends WireErrors
{
    function render()
    {
        return view('components.my-errors');
    }
}
