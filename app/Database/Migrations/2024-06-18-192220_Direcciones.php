<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Direcciones extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'calle' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'numero_ext' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'colonia' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ciudad' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'estado' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'codigo_postal' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_usuario', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('direcciones');
    }

    public function down()
    {
        $this->forge->dropTable('direcciones');
    }
}
