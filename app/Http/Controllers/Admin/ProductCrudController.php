<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Generic;
use App\Models\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use Illuminate\Support\Facades\Input;

class ProductCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel(Product::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('medicine', 'medicines');

        $this->setupCrudFields();
        $this->setupDataTable();
    }

    private function setupCrudFields()
    {
        $types = config('medicine.types');

        $this->crud->addFields([
            [
                'label' => trans('validation.attributes.name'),
                'name' => 'name' ,
                'type' => 'text'
            ], [
                'name' => 'type_id',
                'label' => trans('validation.attributes.type'),
                'type' => 'select2_from_array',
                'options' => $types,
                'allows_null' => true
            ], [
                // 1-n relationship
                'label' => trans('validation.attributes.brand'), // Table column heading
                'type' => "select2",
                'name' => 'brand_id', // the column that contains the ID of that connected entity;
                'entity' => 'brand', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user,
                'query_params' => [
                    'entity' => 'brand'
                ],
                'allows_null' => true
            ], [
                // 1-n relationship
                'label' => trans('validation.attributes.generic'), // Table column heading
                'type' => "select2",
                'name' => 'generic_id', // the column that contains the ID of that connected entity;
                'entity' => 'generic', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user,
                'query_params' => [
                    'entity' => 'generic'
                ],
                'allows_null' => true
            ]
        ]);
    }

    private function setupDataTable()
    {
        $this->crud->addColumns([
            [
                'label' => trans('validation.attributes.name'),
                'name' => 'medicine_name' ,
                'type' => 'text'
            ], [
                'label' => trans('validation.attributes.brand'), // Table column heading
                'type' => "select",
                'name' => 'brand_id', // the column that contains the ID of that connected entity;
                'entity' => 'brand', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => Brand::class, // foreign key model
            ], [
                'label' => trans('validation.attributes.generic'), // Table column heading
                'type' => "select",
                'name' => 'generic_id', // the column that contains the ID of that connected entity;
                'entity' => 'generic', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => Generic::class, // foreign key model
            ]
        ]);
    }

    public function store(StoreRequest $request)
    {
        $redirect_location = parent::storeCrud($request);
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud($request);
        return $redirect_location;
    }
}
