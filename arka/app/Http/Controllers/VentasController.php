<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class VentasController extends Controller
{
    //
    public function administracionVent() 
    {
        $ventas = Payment::all();
        return view('admin.administracionVent', compact('ventas'));
    }

    public function Ventas() {

        $userEmail = auth()->user()->email;

        $venta2 = Payment::where('email', $userEmail)->get();
        
        return view('Compras', compact('venta2'));
    }
}
