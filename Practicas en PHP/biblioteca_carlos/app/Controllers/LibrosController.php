<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Autor;
use App\Models\Libro;

class LibrosController extends BaseController
{
    public function lista()
    {
        $libro = new Libro();

        $datos['libros'] = $libro->orderBy('id', 'ASC')->findAll();
        return view('libros/list', $datos);
    }

    public function crear(){

        $autor = new Autor();
        $datos['autores'] = $autor->orderBy('id', 'ASC')->findAll();

        return view('libros/create', $datos);

    }

    public function modificar(){

        return view('libros/modify');
    }
}
