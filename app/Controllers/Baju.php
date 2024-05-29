<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Baju_model;

class Baju extends BaseController
{
    protected $bajuModel;

    public function __construct()
    {
        $this->bajuModel = new Baju_model();
    }

    public function index()
    {
        $data['data_baju'] = $this->bajuModel->findAll();
        return view('baju/index', $data);
    }

    public function create()
    {
        return view('baju/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $data = [
            'baju_id' => $this->request->getPost('baju_id'),
            'baju_nama' => $this->request->getPost('baju_nama'),
            'baju_ukuran' => $this->request->getPost('baju_ukuran'),
            'baju_kondisi' => $this->request->getPost('baju_kondisi'),
        ];

        if (!$validation->run($data, 'baju')) {
            return redirect()->to(base_url('baju/create'))->withInput()->with('errors', $validation->getErrors());
        }

        $this->bajuModel->insert($data);

        return redirect()->to(base_url('baju'))->with('success', 'Baju created successfully');
    }

    public function edit($id)
    {
        $data['baju'] = $this->bajuModel->find($id);

        return view('baju/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('baju_id');

        $data = [
            'baju_nama' => $this->request->getVar('baju_nama'),
            'baju_ukuran' => $this->request->getVar('baju_ukuran'),
            'baju_kondisi' => $this->request->getVar('baju_kondisi'),
        ];

        $this->bajuModel->update($id, $data);

        return redirect()->to(base_url('baju'))->with('success', 'Baju updated successfully');
    }

    public function delete($id)
    {
        
        $this->bajuModel->delete($id);

        return redirect()->to(base_url('baju'))->with('success', 'Baju deleted successfully');
    }
}  