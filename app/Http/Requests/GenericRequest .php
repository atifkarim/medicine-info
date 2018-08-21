<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class GenericRequest extends FormRequest
{
    protected $genericId = null;
    public function __construct()
    {
        if (!empty(\Route::current()->parameters['generic'])) {
            $this->genericId = intval(\Route::current()->parameters['generic']);
        }
    }
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        $rules = [];
        $rules['name'] = 'required|min:1|max:255|unique:generics,name';
        if($this->genericId)
        {
            $rules['name'] = $rules['name'] . ',' . $this->id;
        }
        return $rules;
    }
}
