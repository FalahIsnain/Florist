<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class buketModel extends Model
{
    protected $table      = 'buket';
    protected $primaryKey = 'id_buket';
    protected $allowedFields = ['tipe_buket'];
}
