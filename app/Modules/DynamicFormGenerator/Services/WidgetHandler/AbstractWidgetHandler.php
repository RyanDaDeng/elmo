<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2019/4/4
 * Time: 11:29 PM
 */

namespace App\Modules\DynamicFormGenerator\Services\WidgetHandler;


use App\Modules\DynamicFormGenerator\Services\Interfaces\WidgetHandlerInterface;


abstract class AbstractWidgetHandler implements WidgetHandlerInterface
{

    protected $type;
    protected $name;
    protected $label;
    protected $placeholder;

    public function __construct($field)
    {
        $this->type = $field['type'];
        $this->type = $field['name'];
        $this->type = $field['label'];
        $this->type = $field['placeholder'];
    }


}