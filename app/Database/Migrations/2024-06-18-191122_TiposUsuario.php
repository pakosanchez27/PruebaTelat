<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TiposUsuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
               
            ],
            'nombre' =>[
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tiposUsuarios');
    }

    public function down()
    {
        $this->forge->dropTable('tiposUsuarios');
    }
}
