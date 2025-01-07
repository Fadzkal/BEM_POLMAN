<?php

namespace App\Controllers;

use App\Models\PiketModel;
use CodeIgniter\Controller;

class SmartPiket extends Controller
{
    protected $piketModel;
    protected $session;

    public function __construct() {
        $this->piketModel = new PiketModel();
        $this->session = \Config\Services::session();
        helper(['url', 'form']);
    }

    // Halaman Login
    public function login() {
        return view('login');
    }

    public function login_submit() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $this->piketModel->get_user($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set('user_role', $user['role']);
            return redirect()->to('/smartpiket/index');
        } else {
            $this->session->setFlashdata('error', 'Login Gagal');
            return redirect()->to('/smartpiket/login');
        }
    }

    public function logout() {
        $this->session->remove('user_role');
        return redirect()->to('/smartpiket/login');
    }

    public function index() {
        if (!$this->session->get('user_role')) {
            return redirect()->to('/smartpiket/login');
        }

        $data['jadwal_piket'] = $this->piketModel->get_jadwal_piket();
        return view('jadwal', $data);
    }

    // Tambah Jadwal Piket
    public function tambah_jadwal() {
        $data = [
            'divisi' => $this->request->getPost('divisi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'status' => 'Belum Selesai'
        ];
        $this->piketModel->add_jadwal_piket($data);
        return redirect()->to('/smartpiket/index');
    }

    // Laporan Piket
    public function tambah_laporan($jadwal_id) {
        $data = [
            'jadwal_id' => $jadwal_id,
            'bukti_laporan' => $this->request->getPost('bukti_laporan'),
            'status_verifikasi' => 'Belum Terverifikasi'
        ];
        $this->piketModel->add_laporan($data);
        return redirect()->to('/smartpiket/index');
    }

    // Notifikasi
    public function notifikasi() {
        $data['notifikasi'] = $this->piketModel->get_notifikasi();
        return view('notifikasi', $data);
    }
}
