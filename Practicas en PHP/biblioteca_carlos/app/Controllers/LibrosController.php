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
    
    public function guardar(){
        $Resultado = new \stdClass();
        $Resultado->RES_CODE = "";
        $Resultado->RES_DESCRIPTION = "";

        $vResultado = "";

        try
        {
            $libro = new Libro();

            $datos = [                
                'nombre' => $this->request->getVar('nombre'),
                'edicion' => $this->request->getVar('edicion'),
                'fechaPublicacion' => date('Y-m-d'),
            ];
                        
            $libro->insert($datos);

            //$vResultado = "PROCESADO";
            $Resultado->RES_CODE = "00";
            $Resultado->RES_DESCRIPTION = "TRANSACCION PROCESADA";
        } catch (\Exception  $ed) {
            ///$eo = $ed->getMessage();
            //$vResultado = "SE PRODUJO UN ERROR, INTENTELO MAS TARDE.";
            $Resultado->RES_CODE = "01";
            $Resultado->RES_DESCRIPTION = "TRANSACCION FALLIDA";
        }
       // $myJSON = json_encode($myObj);
        return json_encode($Resultado);
    }

    public function modificar(){

        return view('libros/modify');
    }

    public function verlibro($id = null){

        $libro = new Libro();
        $datos['libros'] = $libro->where('id',$id)->first();        
        return view('libros/showbook', $datos);
    }

}
