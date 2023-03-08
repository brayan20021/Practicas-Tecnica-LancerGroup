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

        $validacion = $this->validate([

            'nombre' => 'required|alpha_space|max_length[60]',
            'apellido' => 'required|alpha_space|max_length[60]',
            'pais' => 'required|alpha_space|max_length[60]',
        
            ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('mensaje', 'Asegurate que todos los datos esten correctamente, solo utiliza caracteres alfabeticos');

        } else {    
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

    }

    public function borrarautor($id = null){

        $autor = new Autor();
        $autor->where('id',$id)->delete($id);
        
        return $this->response->redirect(site_url('/autores/lista'));

    }

    public function guardar(){


            $validacion = $this->validate([

            'nombre' => 'required|alpha_space|min_length[1]|max_length[60]',
            'apellido' => 'required|alpha_space|min_length[1]|max_length[60]',
            'pais' => 'required|alpha_space|min_length[1]|max_length[60]',
        
            ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('mensaje', 'Asegurate que todos los datos esten correctamente, solo utiliza caracteres alfabeticos');
            
                
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

             }
    }


}
