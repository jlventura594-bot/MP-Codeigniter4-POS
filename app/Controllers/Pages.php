<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('home');
    }

    public function about()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('about');
    }
}