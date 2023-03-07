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

    public function guardar(){

        $Resultado = new \stdClass();
        $Resultado->RES_CODE = "";
        $Resultado->RES_DESCRIPTION = "";

        $vResultado = "";

        try
        {
            $autor = new Autor();

            $datos = [                
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'pais' => $this->request->getVar('pais'),
                'fechaCreacion' => date('Y-m-d'),
            ];
                        
            $autor->insert($datos);

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

        return view('autor/modify');
    }
}
