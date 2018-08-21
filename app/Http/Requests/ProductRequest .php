<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    protected $productId = null;
    public function __construct()
    {
        if (!empty(\Route::current()->parameters['product'])) {
            $this->productId = intval(\Route::current()->parameters['product']);
        }
    }
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        $rules = [];
        $rules['name'] = 'required|min:1|max:255|unique:products,name';
        $rules['brand_id'] = 'required';
        $rules['generic_id'] = 'required';

        if($this->productId)
        {
            $rules['name'] = $rules['name'] . ',' . $this->id;
        }
        return $rules;
    }
}
