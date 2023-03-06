<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LibrosController extends BaseController
{
    public function lista()
    {
        return view('libros/list');
    }

    public function crear(){


        return view('libros/create');

    }

    public function modificar(){

        return view('libros/modify');
    }
}
