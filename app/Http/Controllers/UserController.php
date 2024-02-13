<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('userviews.index', ['users' => $users]);
    }

    public function create()
    {
        return view('userviews.store');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|min:3|regex:/^[A-Za-z]+$/|max:255',
            'ap_paterno' => 'string|min:3|regex:/^[A-Za-z]+$/|max:255',
            'ap_materno' => 'string|min:3|regex:/^[A-Za-z]+$/|max:255',
            'telefono' => 'digits_between:1,10|numeric',
            'correo' => 'email|unique:users',
        ], [
            'name.min' => 'El nombre debe tener al menos :min caracteres.',
            'name.regex' => 'El nombre solo debe contener caracteres alfabéticos.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',
            'ap_paterno.min' => 'El apellido paterno debe tener al menos :min caracteres.',
            'ap_paterno.regex' => 'El apellido paterno solo debe contener caracteres alfabéticos.',
            'ap_paterno.max' => 'El apellido paterno no puede tener más de :max caracteres.',
            'ap_materno.min' => 'El apellido materno debe tener al menos :min caracteres.',
            'ap_materno.regex' => 'El apellido materno solo debe contener caracteres alfabéticos.',
            'ap_materno.max' => 'El apellido materno no puede tener más de :max caracteres.',
            'telefono.digits_between' => 'El teléfono debe tener entre :min y :max dígitos.',
            'telefono.numeric' => 'El teléfono debe ser numérico.',
            'correo.email' => 'Por favor, proporciona una dirección de correo electrónico válida.',
            'correo.unique' => 'Este correo electrónico ya está registrado.',
        ]);

        User::create($request->all());

        return redirect('/users')->with('success', 'Usuario creado exitosamente');
    }

    function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('userviews.avisos')->withErrors(['error' => 'Usuario no encontrado.']);
        }
        return view('userviews.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.edit', $id)->withErrors(['error' => 'Usuario no encontrado.']);
        }   
        $request->validate([
            'name' => 'alpha|min:3|regex:/^[A-Za-z]+$/|max:255',
            'ap_paterno' => 'alpha|min:3|regex:/^[A-Za-z]+$/|max:255',
            'ap_materno' => 'alpha|min:3|regex:/^[A-Za-z]+$/|max:255',
            'telefono' => 'digits_between:1,10|numeric',
            'correo' => 'email|unique:users,correo,' . $id,
        ], [
            'name.min' => 'El nombre debe tener al menos :min caracteres.',
            'name.regex' => 'El nombre solo debe contener caracteres alfabéticos.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',
            'ap_paterno.min' => 'El apellido paterno debe tener al menos :min caracteres.',
            'ap_paterno.regex' => 'El apellido paterno solo debe contener caracteres alfabéticos.',
            'ap_paterno.max' => 'El apellido paterno no puede tener más de :max caracteres.',
            'ap_materno.min' => 'El apellido materno debe tener al menos :min caracteres.',
            'ap_materno.regex' => 'El apellido materno solo debe contener caracteres alfabéticos.',
            'ap_materno.max' => 'El apellido materno no puede tener más de :max caracteres.',
            'telefono.digits_between' => 'El teléfono debe tener entre :min y :max dígitos.',
            'telefono.numeric' => 'El teléfono debe ser numérico.',
            'correo.email' => 'Por favor, proporciona una dirección de correo electrónico válida.',
            'correo.unique' => 'Este correo electrónico ya está registrado.',
        ]);
    
        if (
            $user->name != $request->name ||
            $user->ap_paterno != $request->ap_paterno ||
            $user->ap_materno != $request->ap_materno ||
            $user->telefono != $request->telefono ||
            $user->correo != $request->correo
        ) {
            $user->update($request->all());
            return redirect('/users')->with('success', 'Usuario actualizado exitosamente');
        } else {
            return redirect('/users')->with('success', 'No se realizaron cambios.');
        }
    }
    



    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/users')->with('success', 'Usuario eliminado exitosamente');
    }
}
