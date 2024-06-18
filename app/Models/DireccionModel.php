<?php

namespace App\Models;

use CodeIgniter\Model;

class DireccionModel extends Model
{
    protected $table            = 'direcciones';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['calle', 'numero_ext', 'colonia', 'ciudad', 'estado', 'codigo_postal', 'id_usuario', 'created_at', 'updated_at'  ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
  
    // Relaciones
    public function usuario(){
        return $this->belongsTo(UsuariosModel::class, 'id_usuario', 'id_usuario');
    }
}
