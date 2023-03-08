<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Autores;
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

    public function crear()
    {

        $autor = new Autor();
        $datos['autores'] = $autor->where('eliminado', 0)->findAll();

        return view('libros/create', $datos);
    }

    public function guardar()
    {

        $Resultado = new \stdClass();
        $Resultado->RES_CODE = "01";
        $Resultado->RES_DESCRIPTION = "Asegurate de cumplir con todos los campos";

        $vResultado = "";

        try {

            $validacion = $this->validate([

                'nombre' => 'required',
                'edicion' => 'required',
                'autor' => 'integer|required',

            ]);

            if (!$validacion) {
                $session = session();
                $session->setFlashdata('mensaje', 'Asegurate que todos los datos esten correctamente, solo utiliza caracteres alfabeticos');
            } else {
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
                $Resultado->RES_DESCRIPTION = "Registro exitoso";
            }
        } catch (\Exception  $ed) {
            ///$eo = $ed->getMessage();
            //$vResultado = "SE PRODUJO UN ERROR, INTENTELO MAS TARDE.";

        }
        // $myJSON = json_encode($myObj);
        return json_encode($Resultado);
    }

    public function modificar($id = null)
    {

        $libro = new Libro();
        $datos['libros'] = $libro->where('id', $id)->first();

        return view('libros/modify', $datos);
    }

    public function actualizar()
    {

        $validacion = $this->validate([

            'nombre' => 'required',
            'edicion' => 'required',

        ]);

        if (!$validacion) {
            $session = session();
            $session->setFlashdata('mensaje', 'Asegurate que todos los datos esten correctamente, solo utiliza caracteres alfabeticos');
        } else {
            $libro = new Libro();

            $datos = [

                'nombre' => $this->request->getVar('nombre'),
                'edicion' => $this->request->getVar('edicion'),
                'fechaModificacion' => date('Y-m-d'),

            ];

            $id = $this->request->getVar('id');

            $libro->update($id, $datos);
        }
    }
    public function borrarlibro($id = null)
    {

        $libro = new Libro();
        $libroautor = new AutorLibro();

        $libro->where('id', $id)->delete($id);
        $libroautor->where('libro_id', $id)->delete();

        return $this->response->redirect(site_url('/libros/lista'));
    }

    public function verlibro($id = null)
    {

        $libro = new Libro();
        $datos['libros'] = $libro->where('id', $id)->first();

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

    public function agregarautor($id = null)
    {

        $libro = new Libro();
        $datos['libros'] = $libro->where('id', $id)->first();

        $autores = new Autor();
        $datos['autores'] = $autores->where('eliminado', 0)->findAll();

        return view('libros/addautor', $datos);
    }

    public function agregandoautor()
    {

        $autorlibro = new AutorLibro();

        $datos = [
            'autor_id' => $this->request->getVar('autor'),
            'libro_id' => $this->request->getVar('libro'),
        ];
        $libroid = $this->request->getVar('libro');

        $autorlibro->insert($datos);

        return $this->response->redirect(site_url('libros/verlibro/' . $libroid));
    }
}
