<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\DireccionModel;
use App\Models\TipoUsuarioModel;
use App\Database\Migrations\TiposUsuario;

class Home extends BaseController
{

    protected $helpers = [
        'form'
    ];

    public function index(): string
    {
        return view('index');
    }

    public function register(): string
    {


        $tipoUsuarioModel = new TipoUsuarioModel();

        $tiposUsuarios = $tipoUsuarioModel->findAll();

        return view('registrar', ['tiposUsuarios' => $tiposUsuarios]);
    }

    public function store()
    {
        // Obtener todos los datos POST
        $post = $this->request->getPost();

       

        $reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El nombre es obligatorio'
                ],

            ],
            'apellido_paterno' => [

                'rules' => 'required',
                'errors' => [
                    'required' => 'El Apellido Paterno es obligatorio'
                ],
            ],
            'email' => [

                'rules' => 'required|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'El Email es obligatorio',
                    'is_unique' => 'El Email ya existe',
                    'valid_email' => 'El formato el email es invalido'
                ]

            ],
            'sexo' => [

                'rules' => 'required',
                'errors' => [
                    'required' => 'El sexo es obligatorio'
                ],
            ],
            'tipoUsuario' => [

                'rules' => 'required',
                'errors' => [
                    'required' => 'El Tipo de Usuario es obligatorio'
                ],
            ],

            'telefono' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'El Tipo de Usuario es obligatorio',
                    'numeric' => 'El telefono debe ser numerico'
                ],
            ],

            'calle' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La calle es obligatoria'
                ],
            ],
            'numero' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La numero exterior es obligatoria'
                ],
            ],
            'colonia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La colonia es obligatoria'
                ],
            ],
            'ciudad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'La Delegacion o Municipio es obligatoria'
                ],
            ],
            'estado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El estado es obligatoria'
                ],
            ],
            'codigo_postal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El codigo postal es obligatoria'
                ],
            ],
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }


       
        $usuarios = new UsuariosModel();

        // Crear una clave de 8 caracteres aleatorias 
        $clave = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 8);
        $post['clave'] = password_hash($clave, PASSWORD_DEFAULT);

        $usuarios->save([
            'nombre' => $post['nombre'],
            'apellido_paterno' => $post['apellido_paterno'],
            'apellido_materno' => $post['apellido_materno'] ?? null,
            'email' => $post['email'],
            'password' => $post['clave'],
            'telefono' => $post['telefono'],
            'sexo' => $post['sexo'],
            'id_tipo_usuario' => $post['tipoUsuario'],
            'estatus' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        

  

        $direccion = new DireccionModel();
        $id_usuario = $usuarios->insertID();
       
        $direccion->save([
            'calle' => $post['calle'],
            'numero_ext' => $post['numero'],
            'colonia' => $post['colonia'],
            'ciudad' => $post['ciudad'],
            'estado' => $post['estado'],
            'codigo_postal' => $post['codigo_postal'],
            'id_usuario' => $id_usuario,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/')->with('success', 'Usuario registrado correctamente, la contraseña temporal es: '. $clave);
    }
}
