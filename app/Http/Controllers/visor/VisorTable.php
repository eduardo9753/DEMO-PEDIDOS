<?php

namespace App\Http\Controllers\visor;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class VisorTable extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //LISTA DE MESAS SOLO PARA EL VISOR
    public function index()
    {
        $tables = Table::all();
        return view('visor.table.index', [
            'tables' => $tables
        ]);
    }
}
