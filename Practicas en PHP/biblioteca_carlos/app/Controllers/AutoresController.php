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

    public function modificarautor($id = null){

        $autor = new Autor();
        $datos['autor'] = $autor->where('id',$id)->first();
        return view('autor/modify', $datos);

    }

    public function actualizarautor(){

        $libro = new Autor();

        $datos=[

            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'pais' => $this->request->getVar('pais'),
            'fechaModificacion' => date('Y-m-d'),


        ];

        $id = $this->request->getVar('id');
 
        $libro->update($id, $datos);
        

    }

    public function borrarautor($id = null){

        $autor = new Autor();
        $autor->where('id',$id)->delete($id);
        
        return $this->response->redirect(site_url('/autores/lista'));

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
