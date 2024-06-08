<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    //
    public function index()
    {
        $productos = Producto::all();
        return view('productosE',compact('productos'));
    }
    public function indexAlternative()
    {
        $productos = Producto::all();
        return view('admin.productosEs', compact('productos'));
    }
}
