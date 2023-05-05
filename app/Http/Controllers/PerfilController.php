<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// clases para cambiar las validaciones por defecto
use Illuminate\Validation\Rule;
use App\Rules\ContrasenaAnterior;

class PerfilController extends Controller
{
    public function show(Request $request){
        return view('admin.perfil.index');
    }

    public function edit(Request $request){
        $user = auth()->user();
        $request->validate([
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id) ],
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = preg_replace('/[^0-9]/', '', $request->phone); //Limpiar el string y dejar solo numeros
        $user->save();

        return back()->with('alerta', 'Perfil editado con éxito.');
    }

    public function editar_contrasena(Request $request){
        $user = auth()->user();
        $request->validate([
            'password' => ['required', 'string', 'confirmed'],
            'current_password' => new ContrasenaAnterior(),
        ]);
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with([
            'alerta'=> 'Contraseña editada con éxito.',
            'tiempo'=> '2000'
        ]);
    }

}
