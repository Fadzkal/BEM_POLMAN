<?php namespace App\Models;

use CodeIgniter\Model;

class JadwalPiketModel extends Model
{
    protected $table = 'jadwalpiket';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kementrian', 'tanggal', 'hari', 'waktu'];
}
