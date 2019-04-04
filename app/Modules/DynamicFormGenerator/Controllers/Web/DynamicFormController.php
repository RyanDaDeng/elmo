<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2019/4/3
 * Time: 11:36 PM
 */

namespace App\Modules\DynamicFormGenerator\Controllers\Web;


use App\Modules\DynamicFormGenerator\Requests\CreateJsonFormSchemaRequest;
use App\Modules\DynamicFormGenerator\Services\Factories\WidgetProcessorFactory;
use App\Modules\DynamicFormGenerator\Services\FormEntryRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DynamicFormController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return FormEntryRepo::getAllFormEntries();
    }

    /**
     * @param CreateJsonFormSchemaRequest $request
     * @return \App\Modules\DynamicFormGenerator\Controllers\Models\FormEntry
     */
    public function create(CreateJsonFormSchemaRequest $request)
    {
        $request->validated();
        // TODO: factory and template pattern to process different input
        $fields = $request->input('form_schema')['fields'];
        foreach ($fields as $field) {
            WidgetProcessorFactory::process($field, $request);
        }

        return FormEntryRepo::createJsonSchema(
            $request->input('form_schema'),
            $request->input('form_data')
        );
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        return FormEntryRepo::updateFormData(
            $id,
            $request->input('form_schema'),
            $request->input('form_data')
        );
    }


    public function uploadFile(Request $request){

        dd($request->file('file'));
    }
}