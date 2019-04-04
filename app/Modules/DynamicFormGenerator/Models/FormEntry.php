<?php

namespace App\Modules\DynamicFormGenerator\Controllers\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FormEntry extends Model
{
    //

    protected $guarded = [];
    protected $casts = [
        'json_schema' => 'array',
        'form_data' => 'array'
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeCurrent($query)
    {
        return $query->where('user_id', '=', Auth::id());
    }

}
