<?php

namespace App\Controllers;

use App\Models\Dashboard_model;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->dashboard_model = new Dashboard_model();
    }

    public function index()
    {
        $data['total_pelanggan'] = $this->dashboard_model->getCountPel();
        $data['total_baju'] = $this->dashboard_model->getCountBaju();

        echo view('dashboard', $data);
        echo view('_partials/footer');
    }
}
