<?php

namespace App\Models;

use CodeIgniter\Model;

class Participante_model extends Model
{
    protected $table      = 'participante';

    protected $primaryKey = 'id_participante';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';


    // protected $allowedFields = ['nombre', 'apellido', 'correo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
