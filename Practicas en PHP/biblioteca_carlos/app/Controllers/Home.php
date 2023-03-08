<?php

namespace App\Controllers;

use App\Models\Autor;
use App\Models\Libro;

class Home extends BaseController
{
    public function index()
    {
        $libro = new Libro();
        $datos['libro'] = $libro->orderBy('id', 'ASC')->countAllResults();
        
        $autor = new Autor();
        $datos['autores'] = $autor->orderBy('id', 'ASC')->countAllResults();
        return view('dashboard/index', $datos);
    }
}
