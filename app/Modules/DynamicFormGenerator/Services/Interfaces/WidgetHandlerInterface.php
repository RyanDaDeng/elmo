<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2019/4/4
 * Time: 11:38 PM
 */

namespace App\Modules\DynamicFormGenerator\Services\Interfaces;



use Illuminate\Http\Request;

interface WidgetHandlerInterface
{

    public function process(Request $request);
}