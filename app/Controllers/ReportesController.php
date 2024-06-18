<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\DireccionModel;
use App\Models\TipoUsuarioModel;
use App\Controllers\BaseController;
use App\Database\Migrations\Usuarios;
use CodeIgniter\HTTP\ResponseInterface;

class ReportesController extends BaseController
{

    protected $helpers = ['form'];
    public function index()
    {
        $usuariosModel = new UsuariosModel();
        $usuarios = $usuariosModel->obtenerUsuariosActivos();

        // dd($usuarios);
        return view('reporte', ['usuarios' => $usuarios]);
       

    }

    public function show($id) {
        // converitir el id en int 
        $id = (int) $id;
    
        $usuario = new UsuariosModel();
        $usuario = $usuario->getUserById($id);


        $direccion = new DireccionModel();
        $direccion = $direccion->where('id_usuario', $id)->first();
      
        // dd($usuario);
        return view('reportes/verUsuario', ['usuario' => $usuario , 'direccion' => $direccion]);
    }
    public function edit($id){
        $tipoUsuarioModel = new TipoUsuarioModel();
        $tiposUsuarios = $tipoUsuarioModel->findAll();
    
        $usuarioModel = new UsuariosModel();
        $usuario = $usuarioModel->find($id);
    
        $direccionModel = new DireccionModel();
        $direccion = $direccionModel->where('id_usuario', $id)->first();
    
        return view('reportes/editarUsuario', [
            'usuario' => $usuario,
            'tiposUsuarios' => $tiposUsuarios,
            'direccion' => $direccion
        ]);
    }

    public function update($id){

        $data = $this->request->getPost();

        $usuarioModel = new UsuariosModel();
        $direccionModel = new DireccionModel();

        $usuario = $usuarioModel->find($id);
        $direccion = $direccionModel->where('id_usuario', $id)->first();

        $usuario['nombre'] = $data['nombre'];
        $usuario['apellido_paterno'] = $data['apellido_paterno'];
        $usuario['apellido_materno'] = $data['apellido_materno'];
        $usuario['email'] = $data['email'];
        $usuario['telefono'] = $data['telefono'];
        $usuario['id_tipo_usuario'] = $data['tipoUsuario'];

        $direccion['calle'] = $data['calle'];
        $direccion['numero'] = $data['numero'];
        $direccion['colonia'] = $data['colonia'];
        $direccion['ciudad'] = $data['ciudad'];
        $direccion['estado'] = $data['estado'];
        $direccion['codigo_postal'] = $data['codigo_postal'];

        $usuarioModel->save($usuario);
        $direccionModel->save($direccion);

        return redirect()->to('/reportes')->with('actualizado', 'Usuario actualizado correctamente');
    }

    function desactivar($id) {
        $usuarioModel = new UsuariosModel();
        $usuario = $usuarioModel->find($id);
        $usuario['estatus'] = 0;
        $usuarioModel->save($usuario);

        return redirect()->to('/reportes')->with('desactivado', 'Usuario desactivado correctamente');
    }

    public function exportar()
    {
        $usuariosModel = new UsuariosModel();
        $usuarios = $usuariosModel->findAll();

        if (empty($usuarios)) {
            return redirect()->to('/reportes')->with('error', 'No hay usuarios para exportar.');
        }

        // Nombre del archivo CSV
        $fileName = 'usuarios_' . date('Y-m-d') . '.csv';

        // Encabezados del archivo CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // Abrir el archivo temporal en modo escritura
        $file = fopen('php://temp', 'w');

        // Escribir los encabezados del CSV
        fputcsv($file, ['ID', 'Nombre', 'Apellido', 'Email', 'Estatus']);

        // Escribir los datos de cada usuario en el archivo CSV
        foreach ($usuarios as $usuario) {
            fputcsv($file, [$usuario['id'], $usuario['nombre'], $usuario['apellido_paterno'], $usuario['email'], ($usuario['estatus'] == 1 ? 'Activo' : 'Inactivo')]);
        }

        // Enviar el archivo CSV para descarga
        rewind($file);
        $csv = stream_get_contents($file);
        fclose($file);

        // Crear una respuesta con el archivo CSV y los encabezados
        $response = $this->response->setBody($csv);

        foreach ($headers as $name => $value) {
            $response = $response->setHeader($name, $value);
        }

        return $response;
    }
    
}
