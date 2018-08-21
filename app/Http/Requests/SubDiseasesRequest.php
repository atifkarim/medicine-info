<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class SubDiseasesRequest extends FormRequest
{
    protected $subDiseasesId = null;
    public function __construct()
    {
        if (!empty(\Route::current()->parameters['subdisease'])) {
            $this->subDiseasesId = intval(\Route::current()->parameters['subdisease']);
        }

    }
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        $rules = [];
        $rules['name'] = 'required|min:1|max:255|unique:sub_diseases,name';
        $rules['diseases_id'] = 'required';

        if($this->subDiseasesId)
        {
            $rules['name'] = $rules['name'] . ',' . $this->id;
        }
        return $rules;
    }
}
