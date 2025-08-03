<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Libraries\GroceryCrud; 

class Admin extends BaseController
{
    public function index()
    {
        return redirect()->to('/admin/users'); // page par défaut
    }

    public function users()
    {
        $crud = new GroceryCrud();

        $crud->setTable('users');
        $crud->setSubject('Utilisateur', 'Utilisateurs');
        $crud->columns(['username', 'email', 'created_at']);
        $crud->requiredFields(['username', 'email']);

        $output = $crud->render();

        return view('admin_view', (array)$output);
    }
}
