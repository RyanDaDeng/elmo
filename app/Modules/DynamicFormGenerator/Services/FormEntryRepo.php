<?php

namespace App\Modules\DynamicFormGenerator\Services;


use App\Modules\DynamicFormGenerator\Controllers\Models\FormEntry;
use Illuminate\Support\Facades\Auth;

class FormEntryRepo
{

    public static function getFormById($id)
    {
        return FormEntry::query()->current()
            ->where('id', $id)
            ->first();
    }


    public static function createJsonSchema($formSchema, $formData)
    {
        $obj = new FormEntry();
        $obj->user_id = Auth::id();
        $obj->form_data = $formData;
        $obj->json_schema = $formSchema;
        $obj->save();
        return $obj;
    }


    public static function updateFormData($id, $formSchema, $formData)
    {
        $obj = FormEntry::query()->current()->where('id', $id)->first();
        $obj->form_data = $formData;
        $obj->json_schema = $formSchema;
        $obj->save();
        return $obj;
    }


    public static function getAllFormEntries()
    {
        // TODO: pagination
        return FormEntry::query()->current()->get();
    }
}