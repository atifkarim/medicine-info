<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    protected $brandId = null;
    public function __construct()
    {
        if (!empty(\Route::current()->parameters['brand'])) {
            $this->brandId = intval(\Route::current()->parameters['brand']);
        }
    }
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        $rules = [];
        $rules['name'] = 'required|min:1|max:255|unique:brands,name';
        if($this->brandId)
        {
            $rules['name'] = $rules['name'] . ',' . $this->id;
        }
        return $rules;
    }
}
