<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
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
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,

            ],
            'apellido_paterno' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'apellido_materno' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'telefono' => [
                'type' => 'varchar',
                'constraint' => 15,
                'null' => true,
            ],
            'sexo' => [
                'type' => 'varchar',
                'constraint' => 30,
                'null' => true,
            ],
            'id_tipo_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'estatus' => [
                'type' => 'INT',
                'constraint' => 1,
                
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],

       ]);

       $this->forge->addKey('id', true);
       $this->forge->addForeignKey('id_tipo_usuario', 'tiposUsuarios', 'id', 'CASCADE', 'SET NULL');

       $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
