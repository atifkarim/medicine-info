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

    public function productSearch()
    {
        $id = Input::get('id');
        $products = Product::all();
        $entity = null;
        if($id) {
            $entity = Product::find($id);
        }
        return view('product.search',compact('entity', 'products'));
    }

    public function genericSearch()
    {
        $id = Input::get('id');
        $entity = null;
        $generics = Generic::all();
        if($id) {
            $entity = Generic::find($id);
            $products = Product::where('generic_id', $id)->get();
        }
        return view('generic.search',compact('entity', 'products', 'generics'));
    }

    public function diseasesSearch()
    {
        $id = Input::get('id');
        $entity = null;
        $diseases = SubDiseases::all();
        if($id) {
            $entity = SubDiseases::find($id);
        }
        return view('diseases.search',compact('entity', 'diseases'));
    }
}