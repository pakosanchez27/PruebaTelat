<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TiposUsuariosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'nombre' => 'Administrador'],
            ['id' => 2, 'nombre' => 'Administrador-Operativo'],
            ['id' => 3, 'nombre' => 'Operativo'],
        ];

        // Insertar los datos en la tabla tiposUsuarios
        $this->db->table('tiposUsuarios')->insertBatch($data);
    }
}
