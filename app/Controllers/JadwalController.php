<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use CodeIgniter\Validation\Validation;

class JadwalController extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->jadwalModel = new JadwalModel();
    }

    // Method untuk menampilkan jadwal ke user biasa (jadwal.php)
    public function index()
    {
        // Ambil data jadwal dari model
        $data['jadwal'] = $this->jadwalModel->findAll();
        
        // Tampilkan view 'jadwal.php' untuk pengguna biasa
        return view('jadwal', $data);
    }

    // Method untuk menampilkan jadwal untuk admin (jadwalcrud.php)
    public function adminIndex()
    {
        // Ambil data jadwal dari model
        $data['jadwal'] = $this->jadwalModel->findAll();

        // Tampilkan view 'jadwalcrud.php' untuk admin
        return view('jadwalcrud', $data);
    }

    // Method untuk menambah jadwal (GET dan POST untuk form)
    public function create()
    {
        if ($this->request->getMethod() == 'post') {
            // Validasi input
            $rules = [
                'kementrian' => 'required|min_length[3]',
                'tanggal'    => 'required',
                'hari'       => 'required',
                'waktu'      => 'required',
            ];
            if (!$this->validate($rules)) {
                // Jika validasi gagal, kembali ke form dengan error message
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Proses data yang diinputkan
            $this->jadwalModel->save([
                'kementrian' => $this->request->getPost('kementrian'),
                'tanggal'    => $this->request->getPost('tanggal'),
                'hari'       => $this->request->getPost('hari'),
                'waktu'      => $this->request->getPost('waktu'),
            ]);

            return redirect()->to('/admin/jadwalcrud')->with('message', 'Jadwal berhasil ditambahkan.');
        }

        // Tampilkan form tambah jadwal
        return view('create_jadwal');
    }

    // Method untuk menyimpan jadwal baru
    public function store()
    {
        if ($this->request->getMethod() == 'post') {
            // Validasi input
            $rules = [
                'kementrian' => 'required|min_length[3]',
                'tanggal'    => 'required',
                'hari'       => 'required',
                'waktu'      => 'required',
            ];
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Menyimpan data ke dalam database
            $this->jadwalModel->save([
                'kementrian' => $this->request->getPost('kementrian'),
                'tanggal'    => $this->request->getPost('tanggal'),
                'hari'       => $this->request->getPost('hari'),
                'waktu'      => $this->request->getPost('waktu'),
            ]);

            return redirect()->to('/admin/jadwalcrud')->with('message', 'Jadwal berhasil ditambahkan.');
        }
    }

    // Method untuk menampilkan form edit jadwal
    public function edit($id)
    {
        // Ambil data jadwal berdasarkan ID
        $data['jadwal'] = $this->jadwalModel->find($id);
        
        // Cek apakah data jadwal ada
        if (!$data['jadwal']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        // Kirim data jadwal ke view 'edit_jadwal'
        return view('edit_jadwal', $data);
    }

    // Method untuk mengupdate jadwal
    public function update($id)
{
    if ($this->request->getMethod() === 'post') {
        $rules = [
            'kementrian' => 'required|min_length[3]',
            'tanggal'    => 'required',
            'hari'       => 'required',
            'waktu'      => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data berdasarkan ID
        $this->jadwalModel->update($id, [
            'kementrian' => $this->request->getPost('kementrian'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'hari'       => $this->request->getPost('hari'),
            'waktu'      => $this->request->getPost('waktu'),
        ]);

        return redirect()->to('/admin/jadwalcrud')->with('message', 'Jadwal berhasil diupdate.');
    }
}


    // Method untuk menghapus jadwal
    public function delete($id)
    {
        $this->jadwalModel->delete($id);
        return redirect()->to('/admin/jadwalcrud')->with('message', 'Jadwal berhasil dihapus.');
    }
}
