<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2019/4/4
 * Time: 11:29 PM
 */

namespace App\Modules\DynamicFormGenerator\Services\WidgetHandler;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FileInputHandler extends AbstractWidgetHandler
{

    const TYPE = 'file-input';

    public function process(Request $request)
    {

        // TODO
        $file = Input::file($this->name);

    }

}