<?php

namespace App\Controllers;

use App\Models\JadwalModel;

class DashboardController extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
    }

    public function index()
    {
        // Ambil data jadwal untuk ditampilkan di dashboard
        $data['jadwal'] = $this->jadwalModel->findAll();
        
        // Ambil role dari session
        $data['role'] = session()->get('role');

        // Kirim data jadwal dan role ke view
        return view('dashboard', $data);
    }

    // Method untuk melihat jadwal berdasarkan role
    public function lihatJadwal()
    {
        // Debug session role
        $role = session()->get('role');
        var_dump($role); // Cek apakah role benar
        die(); // Untuk berhenti dan melihat hasil dump
        
        if (in_array($role, ['Presiden BEM', 'Sekretaris'])) {
            return redirect()->to('/jadwal');
        } else {
            return redirect()->to('/jadwal/view');
        }
    }
}
