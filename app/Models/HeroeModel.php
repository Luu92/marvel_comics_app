<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroeModel extends Model{

    protected $table      = 'heroe';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nombre', 'descripcion', 'url_img'];

    //protected bool $allowEmptyInserts = false;




}