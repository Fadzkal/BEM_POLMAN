<?php

namespace App\Controllers;

use App\Models\JadwalPiketModel;
use CodeIgniter\Controller;

class JadwalPiket extends Controller
{
    protected $jadwalPiketModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->jadwalPiketModel = new JadwalPiketModel();
    }

    public function index()
    {
        // Ambil semua data jadwal piket dari database
        $data['jadwal_piket'] = $this->jadwalPiketModel->findAll();

        // Load view dan kirimkan data $jadwal_piket
        return view('jadwal', $data);
    }

    public function tambah_jadwal()
    {
        // Validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'divisi' => 'required',
            'tanggal' => 'required|valid_date',
        ]);

        if (!$this->validate([
            'divisi' => 'required',
            'tanggal' => 'required|valid_date',
        ])) {
            // Redirect kembali ke halaman dengan pesan error jika validasi gagal
            return redirect()->to('/jadwalpiket')->with('errors', $validation->getErrors());
        }

        // Tambahkan data ke database
        $this->jadwalPiketModel->save([
            'divisi' => $this->request->getPost('divisi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'status' => 'Belum Selesai', // Atur status default
        ]);

        // Redirect ke halaman jadwal setelah menambah data
        return redirect()->to('/jadwalpiket')->with('message', 'Jadwal piket berhasil ditambahkan');
    }
}
