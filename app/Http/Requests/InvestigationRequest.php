<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class InvestigationRequest extends FormRequest
{
    protected $investigationId = null;
    public function __construct()
    {
        if (!empty(\Route::current()->parameters['investigation'])) {
            $this->investigationId = intval(\Route::current()->parameters['investigation']);
        }
    }
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        $rules = [];
        $rules['name'] = 'required|min:1|max:255|unique:investigations,name';
        if($this->investigationId)
        {
            $rules['name'] = $rules['name'] . ',' . $this->id;
        }
        return $rules;
    }
}
