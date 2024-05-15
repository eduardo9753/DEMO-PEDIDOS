<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:Crear categoria');
        $this->middleware('can:Listar categoria');
        $this->middleware('can:Editar categoria');
        $this->middleware('can:Eliminar categoria');
    }

    //vista del crud categorias con livewire
    public function index()
    {
        return view('admin.category.index');
    }
}
