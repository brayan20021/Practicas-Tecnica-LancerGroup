<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Autor;

class AutoresController extends BaseController
{
    public function lista()
    {
        $autor = new Autor();
        $datos['autores'] = $autor->orderBy('id', 'ASC')->findAll();


        return view('autor/list', $datos);
    }

    public function crear(){


        return view('autor/create');

    }

    public function modificar(){

        return view('autor/modify');
    }
}
