<?php

namespace App\Models;

use CodeIgniter\Model;

class Dashboard_model extends Model
{
    protected $table = 'adat_pelanggan';

    public function getCountPel()
    {
        return $this->countAll();
    }

    public function getCountBaju()
    {
        $bajuModel = new \App\Models\Baju_model();
        return $bajuModel->countAll();
    }
}
