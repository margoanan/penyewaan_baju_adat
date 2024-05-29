<?php
namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_model extends Model
{
    protected $table = 'Adat_Pelanggan';
    protected $primaryKey = 'AdatPelanggan_id';
    protected $allowedFields = ['AdatPelanggan_Nama', 'AdatPelanggan_Alamat', 'AdatPelanggan_Tgl'];

    public function getPelanggan($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }

    public function insertPelanggan($data)
    {
        return $this->insert($data);
    }

    public function updatePelanggan($id, $data)
    {
        $row = $this->find($id);

        if ($row) {
            $updated = $this->where('AdatPelanggan_id', $id)->set($data)->update();

            if ($updated) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function deletePelanggans($id)
    {
        return $this->db->table($this->table)->delete(['AdatPelanggan_id' => $id]);
    }
}
?>