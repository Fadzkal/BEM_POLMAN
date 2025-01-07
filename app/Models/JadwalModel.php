<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    // Nama tabel yang digunakan
    protected $table      = 'jadwalpiket';

    // Nama kolom primary key
    protected $primaryKey = 'id';

    // Gunakan auto increment pada primary key
    protected $useAutoIncrement = true;

    // Mengembalikan hasil sebagai array
    protected $returnType     = 'array';

    // Gunakan timestamp otomatis untuk created_at dan updated_at
    protected $useTimestamps  = true;

    // Nama kolom untuk menyimpan waktu pembuatan dan pembaruan
    protected $createdField   = 'created_at'; 
    protected $updatedField   = 'updated_at';

    // Kolom-kolom yang dapat diisi melalui model
    protected $allowedFields = ['kementrian', 'tanggal', 'hari', 'waktu'];

    // Aturan validasi untuk setiap kolom
    protected $validationRules = [
        'kementrian' => 'required|min_length[3]',  // Kementrian wajib diisi dan minimal 3 karakter
        'tanggal'    => 'required',                 // Tanggal wajib diisi
        'hari'       => 'required',                 // Hari wajib diisi
        'waktu'      => 'required',                 // Waktu wajib diisi
    ];

    // Pesan kesalahan untuk validasi
    protected $validationMessages = [
        'kementrian' => [
            'required'   => 'Kementrian harus diisi.',
            'min_length' => 'Kementrian harus memiliki minimal 3 karakter.',
        ],
        'tanggal' => [
            'required' => 'Tanggal harus diisi.',
        ],
        'hari' => [
            'required' => 'Hari harus diisi.',
        ],
        'waktu' => [
            'required' => 'Waktu harus diisi.',
        ],
    ];

    // Opsional: Menambahkan metode untuk mengambil jadwal berdasarkan ID
    public function getJadwalById($id)
    {
        return $this->where('id', $id)->first();  // Mengambil jadwal berdasarkan ID
    }

    // Opsional: Menambahkan metode untuk mengambil semua jadwal
    public function getAllJadwal()
    {
        return $this->findAll();  // Mengambil semua jadwal
    }

    // Opsional: Metode untuk menambahkan validasi khusus atau query lainnya bisa ditambahkan di sini
}
