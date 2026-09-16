<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $model = new UserModel();

        $data['users'] = $model->findAll();

        return view('users', $data);
    }

    protected function requireLogin()
    {
        if (!session()->get('logged_in')) {
            redirect()->to('/login')->send();
            exit;
        }
    }

}