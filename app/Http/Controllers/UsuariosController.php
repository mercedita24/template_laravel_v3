<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //Funcion para mostrar todos los usuarios
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        $query = User::query();
        if ( !empty( $keyword ) ) {
            $query->where('name', 'LIKE', "%$keyword%")
                   ->orWhere('email', 'LIKE', "%$keyword%");
        }

        $data['usuarios'] = $query->latest()->paginate($perPage);
        return view('admin.usuarios.index' , $data);
    }

    //Funcion para cargar el formulario de creacion
    public function create()
    {
        $data['roles'] = Role::get();
        return view('admin.usuarios.create', $data);
    }

    //Funcion para crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate(
            User::$rules
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if( $user->save() ){
            $user->syncRoles($request->id_rol); //Para asignar todos los roles seleccionados
            return back()->with('alerta', 'Agregado con éxito.');
        } else {
            return back()->with([
                'alerta' => 'Ocurrio un error al agregar.',
                'tipo' => 'error'
            ]);
        }
    }

    //Funcion para mostrar los datos de 1 usuario
    public function show($id)
    {
        $data['usuario'] = User::find($id);
        return view('admin.usuarios.show', $data);
    }

    //Funcion para cargar el formulario de actualizacion
    public function edit($id)
    {
        $data['usuario'] = User::find($id);
        $data['roles'] = Role::get();
        return view('admin.usuarios.update', $data);
    }

    //Funcion para actualizar los datos de un usuario
    public function update(Request $request, $id)
    {
        $request->validate(
            User::validateUpdate($id)
        );

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->syncRoles($request->id_rol); //Para asignar todos los roles seleccionados

        // modificar la contraseña solo si se solicita
        if($request->password != '' && $request->password != null){
            $user->password = Hash::make($request->password);
        }

        if($user->save()){
            return redirect('usuario')->with('alerta', 'Modificado con éxito.');
        }else{
            return redirect('usuario')->with([
                'alerta' => 'Ocurrio un error al modificar.',
                'tipo' => 'error'
            ]);
        }
    }

    //Funcion para activar o desactivar un usuario
    public function estado( Request $request, $id )
    {
        $user = User::find($id);
        $user->estado = $request->estado!=1?0:1;
        $user->save();

        if( $user->estado == 1 ){
            return back()->with('alerta', 'Usuario activado con éxito.');
        }else{
            return back()->with('alerta', 'Usuario desactivado con éxito.');
        }
    }

}
