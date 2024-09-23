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

    public function updateStatus (Request $request, $id) {

        $venta = Payment::find($id);
    
        $venta->status = $request->status;
        $venta->save();
    
        return redirect()->back()->with('success', 'Estatus de la venta actualizado correctamente.');
    }
}
