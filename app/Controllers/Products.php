<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $model = new ProductModel();

        $data['products'] = $model->findAll();

        return view('products', $data);
    }

    protected function requireLogin()
    {
        if (!session()->get('logged_in')) {
            redirect()->to('/login')->send();
            exit;
        }
    }

}
