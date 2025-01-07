<?php

namespace App\Controllers;

use App\Models\StockModel;

class StockController extends BaseController
{
    protected $stockModel;

    public function __construct()
    {
        $this->stockModel = new StockModel();
        helper('url');
    }

    public function index()
    {
        $data = [
            'stocks' => $this->stockModel->findAll()
        ];
        return view('stock/index', $data);
    }

    public function add()
    {
            $this->stockModel->save([
                'namabarang' => $this->request->getPost('namabarang'),
                'deskripsi'  => $this->request->getPost('deskripsi'),
                'stock'      => $this->request->getPost('stock'),
            ]);
            return redirect()->to('/stock');
    }

    public function update($id)
    {
            $this->stockModel->update($id, [
                'namabarang' => $this->request->getPost('namabarang'),
                'deskripsi'  => $this->request->getPost('deskripsi'),
                'stock'      => $this->request->getPost('stock'),
            ]);
            
            return redirect()->to('/stock');
    }

    public function delete($id)
    {
        $this->stockModel->delete($id);
        return redirect()->to('/stock');
    }

    public function export()
    {
        $model = new StockModel();
        $data['stocks'] = $model->findAll();
        return view('stock/export', $data);
    }
}
