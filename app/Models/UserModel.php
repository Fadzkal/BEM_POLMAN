<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'login'; // Nama tabel di database
    protected $primaryKey = 'id'; // Ganti dengan primary key Anda
    protected $allowedFields = ['username', 'password']; // Kolom yang dapat diisi
}