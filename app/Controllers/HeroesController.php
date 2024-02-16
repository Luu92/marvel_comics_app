<?php

namespace App\Controllers;

use App\Models\HeroeModel;

class HeroesController extends BaseController
{

    private $heroeModel;
  

    public function __construct()
    {
        $this->heroeModel = new HeroeModel();
        helper('form');
    }

    //Función para la consulta del API heroes de marvel
    public function index()
    {
        $url = 'https://gateway.marvel.com:443/v1/public/characters?ts=1&apikey=c46699e1bc6fdc29c3b1af94cbb063aa&hash=82d66dbdf151ba6aa712ed5fd80dd406';
        $response = file_get_contents($url);
        $dataAPI = json_decode($response, true);
        $data = ['titulo' => 'Lista de Heroes Marvel', 'dataAPI' => $dataAPI];
        return view('heroe/listarHeroes', $data);
    }

    public function listarMisHeroes()
    {

        //$heroeModel = new HeroeModel();
        $resultado = $this->heroeModel->findAll();

        $data = ['titulo' => 'Lista de Mis Heroes', 'heroes' => $resultado];
        return view('heroe/listarMisHeroes', $data);
    }

    //Crea un nuevo heroe y lo guarda en la base de datos
    public function createHeroe()
    {
        $data = ['titulo' => 'Crear Nuevo Heroes Marvel'];
        return view('heroe/crearHeroe', $data);
    }

    //Recibimos cada atributo del formulario, guaramos en la base de datos y regresamos a la vista mis heroes.
    public function guardarHeroe()
    {
        $nombre = $this->request->getPost('nombre');
        $descripcion = $this->request->getPost('descripcion');
        $url_img = $this->request->getPost('url_img');

        $this->heroeModel->insert([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'url_img' => $url_img
        ]);
        $resultado = $this->heroeModel->findAll();
        $data = ['titulo' => 'Lista de Mis Heroes', 'heroes' => $resultado];
        return view('heroe/listarMisHeroes', $data);
    }

    //Muestra Detalles de un heroe en especifico de acuerdo al ID.
    public function show($id)
    {
        $heroe = $this->heroeModel->find($id);
        $data = ['titulo' => 'Editar Heroes Marvel', 'heroe' => $heroe];
        return view('heroe/editarHeroe', $data);
    }

    //Actualiza información de un heroe
    public function updateHeroe($id)
    {
        if ($this->request->getPost('_method') === 'PUT') {
            // Obtener los datos enviados en la solicitud PUT
            $datos = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'url_img' => $this->request->getPost('url_img')
            ];
        }
        $this->heroeModel->update($id, $datos);
        $resultado = $this->heroeModel->findAll();
        $data = ['titulo' => 'Lista de Mis Heroes', 'heroes' => $resultado];
        return view('heroe/listarMisHeroes', $data);
    }

    //Elimina un heroe en la base de datos y en la app
    public function deleteHeroe($id)
    {
        if ($this->request->getMethod() === 'post' && $this->request->getPost('eliminar')) {
            // Elimina el héroe con el ID proporcionado
            $this->heroeModel->delete($id);
    
            // Redirecciona a la vista de lista de héroes
            return redirect()->to('/heroes/listarmisheroes')->with('mensaje', 'Heroe eliminado');
        } else {
            // Si la solicitud no es POST o no se envió el parámetro 'eliminar', redirecciona a la misma vista de lista de héroes
            return redirect()->to('/heroes/listarmisheroes');
        }
    }
}
