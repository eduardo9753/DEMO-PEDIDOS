<?php

namespace App\Http\Controllers\admin\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index()
    {
        return view('admin.account.index');
    }
}
