<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Generic;
use App\Models\Product;
use App\Models\SubDiseases;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller {

    public function index()
    {
        $type = Input::get('type');
        $id = Input::get('id');
        $flag = false;
        $entity = null;
        if(!empty($type) && !empty($id)) {
            $flag = true;
            switch ($type) {
                case 'medicine':
                    $entity = Product::find($id);
                    break;
                case 'generic':
                    $entity = Generic::find($id);
                    $products = Product::where('generic_id', $id)->get();
                    break;
                case 'diseases':
                    $entity = SubDiseases::find($id);
                    break;
            }
        }
        return view('search.index', compact('entity','type', 'flag', 'products'));
    }
}