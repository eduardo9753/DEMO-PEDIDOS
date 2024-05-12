<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //LOGIN DE INICIO DE SESSION
    public function index()
    {
        return view('admin.auth.login');
    }

    //INGRESAR
    public function store(Request $request)
    {
        //validaciones
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //autenticando con la base de datos
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Tus credenciales estan incorrectas');
        } else {
            $user = User::find(auth()->user()->id);
            $roles = $user->getRoleNames();

            //return $roles;
            if ($roles->contains('Admin')) {
                return redirect()->route('admin.dashboard.index');
            } else if ($roles->contains('Cajera')) {
                return redirect()->route('cashier.order.index');
            } else if ($roles->contains('Visor')) {
                return redirect()->route('visor.table.index');
            } else if ($roles->contains('Mesera')) {
                return redirect()->route('waitress.table.index');
            } else {
                return back()->with('mensaje', 'El usuario no tiene un rol asignado');
            }
        }
    }

    //SALIR 
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
