<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Baju extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'baju_id' => [
				'type' => 'INT',
				'constraint' => 20,
				'auto_increment' => true,
			],
			'baju_nama' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
			],
			'baju_ukuran' => [
				'type' => 'ENUM',
				'constraint' => "'XS', 'S', 'M', 'L', 'XL', 'XXL'",
				'default' => 'L'
			],
			'baju_kondisi' => [
				'type' => 'ENUM',
				'constraint' => "'baik', 'pudar', 'robek'",
				'default' => 'baik'
			],
		]);
		
		$this->forge->addKey('baju_id', true);
		$this->forge->createTable('baju');
	}

	public function down()
	{
		$this->forge->dropTable('baju');
	}
}
