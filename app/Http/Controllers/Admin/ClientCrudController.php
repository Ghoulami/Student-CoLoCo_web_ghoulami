<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Client::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/client');
        CRUD::setEntityNameStrings('client', 'clients');
    }

    
    protected function setupListOperation()
    {
        
        $col1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];

        $col2 = [
            'name' => 'username',
            'type' => 'text',
            'label' => 'User Name',
        ];

        $col3 = [
            'name' => 'first_name',
            'type' => 'text',
            'label' => 'Firs Name',
        ];
        
        $col4 = [
            'name' => 'email',
            'label' => 'email',
            'type' => 'text',
        ];
        
        
        $col5 = [
            'name' => 'start_date',
            'type' => 'date',
            'label' => 'Date debut',
        ];
        
        $col6 = [
            'name' => 'phone',
            'type' => 'text',
            'label' => 'Phone',
        ];
        
        $col7 = [
            'name' => 'fax',
            'type' => 'text',
            'label' => 'Fac',
        ];

        $this->crud->addColumns([$col1,$col2,$col3,$col4,$col5,$col6]);
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
    }
    protected function handlePasswordInput($request)
    {
       
        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ClientRequest::class);
        $col1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '300px'
        ];

        $col2 = [
            'name' => 'last_name',
            'type' => 'text',
            'label' => 'Last Name',
        ];

        $col3 = [
            'name' => 'first_name',
            'type' => 'text',
            'label' => 'First Name',
        ];

        $col4 = [
            'name' => 'email',
            'label' => 'email',
            'type' => 'text',
        ];
    
        $col5 = [
            'name' => 'username',
            'label' => 'Username',
            'type' => 'text',
        ];
        $col6 = [
            'name' => 'adresse',
            'type' => 'address_algolia',
            'label' => 'adresse',
        ];
        $col7 = [
            'name' => 'start_date',
            'type' => 'date',
            'label' => 'Start date',
        ];

        $col8 = [
            'name' => 'facebook',
            'type' => 'date',
            'label' => 'facebook',
        ];

        $col9 = [
            'name' => 'twitter',
            'type' => 'date',
            'label' => 'twitter',
        ];

    
        $col10 = [
            'name' => 'public_email',
            'label' => 'Public Email',
            'type' => 'text',
        ];

        $col11 = [
            'name' => 'phone',
            'type' => 'text',
            'label' => 'Phone',
        ];

        $col12 = [
            'name' => 'website',
            'type' => 'text',
            'label' => 'Web site',
        ];

        $col13 = [
            'name' => 'fax',
            'type' => 'text',
            'label' => 'Fax',
        ];


        $col14 = [
            'name' => 'password',
            'type' => 'password',
            'label' => 'Mot de pass',
            'default'    => Str::random(8),
        ];
        /*$col10 =[ // n-n relationship (with pivot table)
            'label'     => 'favories', // Table column heading
            'type'      => 'checklist',
            'name'      => 'produit', // the method that defines the relationship in your Model
            'entity'    => 'produit', // the method that defines the relationship in your Model
            'attribute' => 'nom', // foreign key attribute that is shown to user
            'model'     => 'App\Models\produit', 
            'pivot'            => true, // on create&update, do you need to add/delete pivot table entries?]
            'number_columns'   => 3, //can be 1,2,3,4,6// foreign key model
        ];*/
        $this->crud->addFields([$col1, $col2,$col3, $col4 ,$col8, $col9, $col5, $col6, $col7, $col10, $col11, $col12, $col13, $col14]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation(){
        $col1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];

        $col2 = [
            'name' => 'username',
            'type' => 'text',
            'label' => 'User Name',
        ];

        $col3 = [
            'name' => 'first_name',
            'type' => 'text',
            'label' => 'Firs Name',
        ];
        
        $col4 = [
            'name' => 'email',
            'label' => 'email',
            'type' => 'text',
        ];
        
        
        $col5 = [
            'name' => 'start_date',
            'type' => 'date',
            'label' => 'Date debut',
        ];
        
        $col6 = [
            'name' => 'phone',
            'type' => 'text',
            'label' => 'Phone',
        ];
        
        $col7 = [
            'name' => 'fax',
            'type' => 'text',
            'label' => 'Fac',
        ];

        $this->crud->addColumns([$col1,$col2,$col3,$col4,$col5,$col6]);
    }
    
}
