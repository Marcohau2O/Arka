<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function administracionUser()
    {
        $Users = User::all();
        $totalUser = $Users->count();
        return view('admin.administracionUser', compact('Users','totalUser'));
    }
}
