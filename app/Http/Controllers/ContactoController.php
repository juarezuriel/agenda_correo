<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $users = Contacto::all();

        return response()->json([
            'listaUsuarios' => $users
        ]);
    }

    public function show($id)
    {
        $user = Contacto::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = new Contacto();
        $user->nombre = $request->input('nombre');
        $user->email = $request->input('email');
        $user->save();

        return response()->json('Usuario creado exitosamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $user = Contacto::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        $user->nombre = $request->input('nombre');
        $user->email = $request->input('email');
        $user->save();

        return response()->json('Usuario actualizado exitosamente');
    }

    public function destroy($id)
    {
        $user = Contacto::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        $user->delete();

        return response()->json('Usuario eliminado exitosamente');
    }
}
