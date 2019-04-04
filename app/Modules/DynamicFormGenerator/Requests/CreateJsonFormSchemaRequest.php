<?php


namespace App\Modules\DynamicFormGenerator\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateJsonFormSchemaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'form_data' => 'nullable',
            'form_schema' => 'array|required',
            'form_schema.fields.*.type' => [
                'required',
                Rule::in(['text-input', 'textarea-input', 'file-input']),
            ],
            'form_schema.fields.*.name' => 'string|required|max:254|min:1',
            'form_schema.fields.*.label' => 'string|required|max:254|min:1',
            'form_schema.fields.*.placeholder' => 'string|nullable'
        ];
    }
}