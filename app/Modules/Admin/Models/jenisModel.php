<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class jenisModel extends Model
{
    protected $table      = 'jenis';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['jenis_bunga'];
}
