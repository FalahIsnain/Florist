<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'pengguna';
    protected $allowedFields = ['username', 'email', 'nama', 'no_telp', 'password'];
    protected $primaryKey = 'id_user';


    public function getOne($id)
    {
        return $this->where(['id_user' => $id])->first();
    }
}
