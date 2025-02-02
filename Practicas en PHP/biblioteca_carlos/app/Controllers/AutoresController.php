<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Autor;
use App\Models\AutorLibro;
use Exception;

class AutoresController extends BaseController
{
    public function lista()
    {
        $autor = new Autor();
        $datos['autores'] = $autor->where('eliminado',0)->findAll();

       
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

        $validacion = $this->validate([

            'nombre' => 'required|alpha_space|max_length[60]',
            'apellido' => 'required|alpha_space|max_length[60]',
            'pais' => 'required|alpha_space|max_length[60]',
        
            ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('mensaje', 'Asegurate que todos los datos esten correctamente, solo utiliza caracteres alfabeticos');

        } else {    
        $autor = new Autor();

        $datos=[

            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'pais' => $this->request->getVar('pais'),
            'fechaModificacion' => date('Y-m-d'),


        ];

        $id = $this->request->getVar('id');
 
        $autor->update($id, $datos);

        }   

    }

    public function borrarautor($id = null){

        $autor = new Autor();

        $datos=[

            'fechaEliminacion' =>  date('Y-m-d'),
            'eliminado' => '1',

        ];
        
        $autor->update($id, $datos);
        
        return $this->response->redirect(site_url('/autores/lista'));

    }

    public function verautor($id= null){

        $autor = new Autor();
        $librocantd = new AutorLibro();

        $datos['autores'] = $autor->where('id',$id)->first();
        $datos['canxautores'] = $librocantd->where('autor_id', $id)->countAllResults();

        return view('autor/showactor',$datos);

    }

    public function guardar(){

        $Resultado = new \stdClass();
        $Resultado->RES_CODE = "";
        $Resultado->RES_DESCRIPTION = "";

            try {
            $validacion = $this->validate([

            'nombre' => 'required|alpha_space|min_length[1]|max_length[60]',
            'apellido' => 'required|alpha_space|min_length[1]|max_length[60]',
            'pais' => 'required|alpha_space|min_length[1]|max_length[60]',
        
            ]);

        if(!$validacion){

            $Resultado->RES_CODE = "01";
            $Resultado->RES_DESCRIPTION = "Asegurate que todos los datos esten correctamente, solo utiliza caracteres alfabeticos";
                
            /* return $this->response->redirect(site_url('/listar')); */
            
                } else {
                    $autor = new Autor();

                    $datos = [                
                        'nombre' => $this->request->getVar('nombre'),
                        'apellido' => $this->request->getVar('apellido'),
                        'pais' => $this->request->getVar('pais'),
                        'fechaCreacion' => date('Y-m-d'),
                    ];
                                
                    $autor->insert($datos);

                    $Resultado->RES_CODE = "00";
                    $Resultado->RES_DESCRIPTION = "Registro exitoso";

             }
            }
            catch (Exception $ex) {
                return print_r($ex->getMessage());
                $Resultado->RES_CODE = "02";
                $Resultado->RES_DESCRIPTION = $ex->getMessage();
            }

             return json_encode($Resultado);
    }



}
