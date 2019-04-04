<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2019/4/3
 * Time: 10:20 PM
 */

namespace App\Modules\DynamicFormGenerator\Services;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FormSchemaValidator
{

    protected $schema;

    public function __construct($json)
    {
        $this->schema = json_decode($json, true);
    }

    public function validate()
    {
        $validator = Validator::make($this->schema, $this->rule());
        return $validator->fails();
    }

    public function rule()
    {
        return [
            'title' => 'required|string',
            'schema.*.type' => [
                'required',
                Rule::in(['text', 'textarea', 'file']),
            ],
            'schema.*.name' => 'string|required|max:254|min:1',
            'schema.*.label' => 'string|required|max:254|min:1',
            'schema.*.placeholder' => 'string'
        ];
    }

}