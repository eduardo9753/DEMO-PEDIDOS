<?php

namespace App\Http\Controllers\admin\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    public function index()
    {
        return view('admin.company.index');
    }
}
