<?php
namespace App\Models;

use CodeIgniter\Model;

class Baju_model extends Model
{
    protected $table = 'baju';
    protected $primaryKey = 'baju_id';
    protected $allowedFields = ['baju_id','baju_nama', 'baju_ukuran', 'baju_kondisi'];

    public function getBaju($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }
}