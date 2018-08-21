<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class DiseasesRequest extends FormRequest
{
    protected $diseasesId = null;
    public function __construct()
    {
        if (!empty(\Route::current()->parameters['diseases'])) {
            $this->diseasesId = intval(\Route::current()->parameters['diseases']);
        }
    }
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        $rules = [];
        $rules['name'] = 'required|min:1|max:255|unique:diseases,name';
        if($this->diseasesId)
        {
            $rules['name'] = $rules['name'] . ',' . $this->id;
        }
        return $rules;
    }
}
