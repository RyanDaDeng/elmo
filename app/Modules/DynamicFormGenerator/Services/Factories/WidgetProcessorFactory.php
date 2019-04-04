<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2019/4/4
 * Time: 11:30 PM
 */

namespace App\Modules\DynamicFormGenerator\Services\Factories;


use App\Modules\DynamicFormGenerator\Services\DynamicFormGenerator;

use App\Modules\DynamicFormGenerator\Services\WidgetHandler\FileInputHandler;
use Illuminate\Http\Request;


class WidgetProcessorFactory
{

    public static function process($field, Request $request)
    {

        switch ($field['type']) {
            case FileInputHandler::TYPE:
                (new FileInputHandler($field))->process($request);
                break;
            default:
                return;
        }
    }
}