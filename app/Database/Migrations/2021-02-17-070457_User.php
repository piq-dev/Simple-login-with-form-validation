<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'fullname'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nim'       	 => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'username'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'profile'        => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
