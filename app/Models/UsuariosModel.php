<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TipoUsuarioModel;

class UsuariosModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre', 'apellido_paterno','apellido_materno','sexo', 'email', 'password', 'telefono', 'id_tipo_usuario','estatus','created_at', 'updated_at' ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;

    // Relaciones
    public function tipoUsuario(){
        return $this->belongsTo(TipoUsuarioModel::class, 'id_tipo_usuario', 'id');

    }

    public function direcciones(){
        return $this->hasOne(DireccionModel::class, 'id_usuario', 'id');
    }
   
    public function obtenerUsuariosActivos()
    {
        return $this->where('estatus', 1)->findAll();
    }

    // Controller or Service Class
public function getUserById($id) {
    $db = \Config\Database::connect(); // Get the database connection
    $builder = $db->table('usuarios'); // Create a query builder for the 'usuarios' table

    $builder->select('usuarios.*, tiposusuarios.nombre as tipo');
    $builder->join('tiposusuarios', 'usuarios.id_tipo_usuario = tiposusuarios.id', 'left');
    $builder->where('usuarios.id', $id);

    $query = $builder->get(); // Execute the query

    if ($query->getNumRows() > 0) {
        return $query->getRow(); // Return the result
    } else {
        return null;
    }
}
    

}
