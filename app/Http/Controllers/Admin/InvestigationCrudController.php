<?php

namespace App\Http\Controllers\Admin;

use App\Models\Investigation;
use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\InvestigationRequest as StoreRequest;
use App\Http\Requests\InvestigationRequest as UpdateRequest;

class InvestigationCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel(Investigation::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/investigation');
        $this->crud->setEntityNameStrings('investigation', 'investigations');

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
