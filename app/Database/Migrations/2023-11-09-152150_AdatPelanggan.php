<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdatPelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'AdatPelanggan_id' => [
				'type' => 'INT',
				'constraint' => 20,
				'auto_increment' => true,
			],
			'AdatPelanggan_Nama' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
			],
			'AdatPelanggan_Alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
			],
			'AdatPelanggan_Tgl' => [
				'type' => 'DATE',
			],
		]);
		
		$this->forge->addKey('AdatPelanggan_id', true);
		$this->forge->createTable('Adat_Pelanggan');
	
	}

	public function down()
	{
		$this->forge->dropTable('Adat_Pelanggan');
	}
}
