<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diseases;
use App\Models\Investigation;
use App\Models\Product;
use App\Models\SubDiseases;
use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\SubDiseasesRequest as StoreRequest;
use App\Http\Requests\SubDiseasesRequest as UpdateRequest;

class SubDiseasesCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel(SubDiseases::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/subdiseases');
        $this->crud->setEntityNameStrings('subdiseases', 'sub diseases');

        $this->setupCrudFields();
        $this->setupDataTable();
    }

    private function setupCrudFields()
    {
        $this->crud->addFields([
            [
                'label' => trans('validation.attributes.name'),
                'name' => 'name' ,
                'type' => 'text'
            ], [
                // 1-n relationship
                'label' => trans('validation.attributes.diseases'), // Table column heading
                'type' => "select2_ajax_generic",
                'name' => 'diseases_id', // the column that contains the ID of that connected entity;
                'entity' => 'diseases', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user,
                'query_params' => [
                    'entity' => 'diseases'
                ]
            ], [
                'label' => trans('validation.attributes.product'),
                'type' => 'select2_multiple',
                'name' => 'products', // the method that defines the relationship in your Model
                'entity' => 'products', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => Product::class, // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ], [
                'label' => trans('validation.attributes.investigation'),
                'type' => 'select2_multiple',
                'name' => 'investigations', // the method that defines the relationship in your Model
                'entity' => 'investigations', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => Investigation::class, // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ], [
                'name' => 'symptom',
                'label' => trans('validation.attributes.symptom'),
                'type' => 'wysiwyg'
            ], [
                'name' => 'causes',
                'label' => trans('validation.attributes.causes'),
                'type' => 'wysiwyg'
            ], [
                'name' => 'treatment',
                'label' => trans('validation.attributes.treatment'),
                'type' => 'wysiwyg'
            ]
        ]);
    }

    private function setupDataTable()
    {
        $this->crud->addColumns([
            [
                'label' => trans('validation.attributes.name'),
                'name' => 'name' ,
                'type' => 'text'
            ], [
                'label' => trans('validation.attributes.diseases'), // Table column heading
                'type' => "select",
                'name' => 'diseases_id', // the column that contains the ID of that connected entity;
                'entity' => 'diseases', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => Diseases::class, // foreign key model
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
