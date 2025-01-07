<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table = 'stock'; // Nama tabel di database
    protected $primaryKey = 'idbarang'; // Ganti dengan primary key Anda
    protected $allowedFields = ['namabarang', 'deskripsi', 'stock']; // Kolom yang dapat diisi
}