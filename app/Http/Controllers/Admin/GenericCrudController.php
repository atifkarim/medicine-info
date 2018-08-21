<?php

namespace App\Http\Controllers\Admin;

use App\Models\Generic;
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
        $this->crud->addField([
            'label' => trans('validation.attributes.name'),
            'name' => 'name' ,
            'type' => 'text'
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
