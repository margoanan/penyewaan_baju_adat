<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pelanggan_model;

class Pelanggan extends BaseController
{
    public function index()
    {
        $model = new Pelanggan_model();
        $data['Adat_Pelanggan'] = $model->getPelanggan();
        return view('pelanggan/index', $data); 
    }

    public function create()
    {
        return view('pelanggan/create'); 
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $data = [
            'AdatPelanggan_Nama' => $this->request->getPost('AdatPelanggan_Nama'),
            'AdatPelanggan_Alamat' => $this->request->getPost('AdatPelanggan_Alamat'),
            'AdatPelanggan_Tgl' => $this->request->getPost('AdatPelanggan_Tgl'),
        ];

        if ($validation->run($data, 'pelanggan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pelanggan/create'));
        } else {
            $model = new Pelanggan_model(); 
            $simpan = $model->insertPelanggan($data); 
            
            if ($simpan) {
                session()->setFlashdata('success', 'Created pelanggan successfully');
                return redirect()->to(base_url('pelanggan'));
            }
        }
    }
    public function edit($id)
    {
        $model = new Pelanggan_model();
        $data['pelanggan'] = $model->find($id);
        return view('pelanggan/edit', $data);
    }
    public function update()
    {
        $model = new Pelanggan_model();

        $id = $this->request->getVar('BusPelanggan_id');

        $data = [
            'AdatPelanggan_Nama' => $this->request->getPost('AdatPelanggan_Nama'),
            'AdatPelanggan_Alamat' => $this->request->getPost('AdatPelanggan_Alamat'),
            'AdatPelanggan_Tgl' => $this->request->getPost('AdatPelanggan_Tgl'),
        ];

        $model->update($id, $data);
        return redirect()->to(base_url('pelanggan'));
    }


    public function delete($id)
    {
        $model = new Pelanggan_model();
        $model->delete($id);
        return redirect()->to(base_url('pelanggan'));
    }


}
