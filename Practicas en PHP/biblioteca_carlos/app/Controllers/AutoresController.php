<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AutoresController extends BaseController
{
    public function lista()
    {
        return view('autor/list');
    }

    public function crear(){


        return view('autor/create');

    }

    public function modificar(){

        return view('autor/modify');
    }
}
