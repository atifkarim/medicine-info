<?php

namespace App\Http\Controllers\Admin;

use App\Models\Generic;
use App\Models\SubDiseases;
use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\GenericRequest as StoreRequest;
use App\Http\Requests\GenericRequest as UpdateRequest;

class GenericCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel(Generic::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/generic');
        $this->crud->setEntityNameStrings('generic', 'generics');

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
                'label' => trans('validation.attributes.diseases'),
                'type' => 'select2_multiple',
                'name' => 'sub_diseases', // the method that defines the relationship in your Model
                'entity' => 'sub_diseases', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => SubDiseases::class, // foreign key model
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ], [
                'label' => trans('validation.attributes.available_in_pregnancy'),
                'name' => 'available_in_pregnancy',
                'type' => 'checkbox'
            ], [
                'label' => trans('validation.attributes.side_effect'),
                'name' => 'side_effect',
                'type' => 'wysiwyg'
            ], [
                'label' => trans('validation.attributes.alert'),
                'name' => 'alert',
                'type' => 'wysiwyg'
            ]
        ]);
    }

    private function setupDataTable()
    {
        $this->crud->addColumn([
            'label' => trans('validation.attributes.name'),
            'name' => 'name' ,
            'type' => 'text'
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
