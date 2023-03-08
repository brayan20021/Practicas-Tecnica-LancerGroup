<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Autor;
use App\Models\AutorLibro;
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

                            //proceso para agregar el libro segun los datos
                            $libro = new Libro();

                                    $datos = [                
                                        'nombre' => $this->request->getVar('nombre'),
                                        'edicion' => $this->request->getVar('edicion'),
                                        'fechaPublicacion' => date('Y-m-d'),
                                    ];           

                            $libro->insert($datos);



                            //En esta parte es para insertar el ultimo id del libro que
                            //corresponde al actor que se acabo de registrar con el objetivo
                            //de obtener una relacion entre el libro y el autor
                            $ultimolibroid = $libro->orderBy('id', 'ASC')->getInsertID();
                            $ultimolibroid = json_encode($ultimolibroid);

                            $autorlibro = new AutorLibro();

                                    $datos2 = [
                                        'autor_id' => $this->request->getVar('autor'),
                                        'libro_id' => $ultimolibroid
                                    ]; 
                                
                            $autorlibro->insert($datos2);

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

    public function modificar($id = null){

        $libro = new Libro();
        $datos['libros'] = $libro->where('id',$id)->first();

        return view('libros/modify', $datos);

    }

    public function actualizar(){

        $libro = new Libro();

        $datos=[

            'nombre' => $this->request->getVar('nombre'),
            'edicion' => $this->request->getVar('edicion'),
            'fechaModificacion' => date('Y-m-d'),


        ];

        $id = $this->request->getVar('id');
 
        $libro->update($id, $datos);

    }
    public function borrarlibro($id = null){

        $libro = new Libro();
        
        $libro->where('id',$id)->delete($id);
        
        return $this->response->redirect(site_url('/libros/lista'));

    }

    public function verlibro($id = null){

        $libro = new Libro();
        $datos['libros'] = $libro->where('id',$id)->first();

        $db = \Config\Database::connect();

        $datos['autores'] = $db->table('autores')
        ->select('autores.nombre, autores.apellido')
        ->join('autores_libros', 'autores.id = autores_libros.autor_id')
        ->join('libros', 'libros.id = autores_libros.libro_id')
        ->where('libro_id', $id)
        ->get()
        ->getResultObject();
        
        return view('libros/showbook', $datos);
    }


}
