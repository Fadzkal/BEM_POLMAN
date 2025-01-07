<?php

namespace App\Models;

use CodeIgniter\Model;

class PiketModel extends Model
{
    protected $table = 'jadwal_piket'; // Sesuaikan dengan tabel utama jika diperlukan
    protected $allowedFields = ['divisi', 'tanggal', 'status']; // Sesuaikan dengan kolom yang boleh diisi

    public function get_jadwal_piket() {
        return $this->table('jadwal_piket')->get()->getResultArray();
    }

    public function add_jadwal_piket($data) {
        return $this->table('jadwal_piket')->insert($data);
    }

    public function update_status_piket($id, $status) {
        return $this->table('jadwal_piket')->where('id', $id)->update(['status' => $status]);
    }

    public function get_inventaris() {
        return $this->table('inventaris')->get()->getResultArray();
    }

    public function add_laporan($data) {
        return $this->table('laporan_piket')->insert($data);
    }

    public function get_notifikasi() {
        return $this->table('notifikasi')->get()->getResultArray();
    }

    public function add_notifikasi($data) {
        return $this->table('notifikasi')->insert($data);
    }

    public function get_user($username) {
        return $this->table('users')->where('username', $username)->get()->getRowArray();
    }
}
