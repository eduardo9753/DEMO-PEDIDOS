<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:Leer usuarios')->only('index');
        $this->middleware('can:Editar usuarios')->only('create', 'edit', 'update');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:30',
            'email' => 'required|unique:users|max:80',
            'password' => 'required|min:6'
        ]);

        //guardamos los datos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) //encriptar la contraseña
        ]);

        if ($user) {
            //para poder guardar los datos en la session actual
            /*auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);*/
            return redirect()->route('admin.users.index')->with('exito', 'Usuario creado correctamente');
        } else {
            return redirect()->route('admin.users.index')->with('exito', 'No se puedo crear el usuario correctamente');
        }
    }

    public function create()
    {
        return view('admin.user.create');
    }

    //para asignarle una funcion al usuario
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(User $user, Request $request)
    {
        $user->roles()->sync([$request->role]); // Usamos sync() con un array de un solo elemento
        return redirect()->route('admin.users.edit', $user)->with('exito', 'Rol asignado correctamente al usuario');
    }
}
