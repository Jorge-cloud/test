<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Participante_model;

class ParticipanteController extends ResourceController
{

    public function index()
    {
        $modelo = new Participante_model();
        $data['participantes'] = $modelo->asObject()->findAll();


        // var_dump($data['participantes']);
        return view('welcome_message', $data);
    }

    public function buscar()
    {
        $dato = $this->request->getPost('legajo');

        $db      = \Config\Database::connect();
        // $builder = $db->table('participante');

        // $data = $builder->like('nombre', 'jorge');
        // $modelo = new Participante_model();
        // $data = $modelo->select('nombre')->findAll();
        $query = $db->query('select nombre from participante where nombre like "' . $dato . '%"');

        $data = $query->getResult();
        // var_dump($results);

        // $query = $db->query('YOUR QUERY HERE');
        return $this->respond($data);
    }
}
