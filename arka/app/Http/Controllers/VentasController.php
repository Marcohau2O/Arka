<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaypalTransaction;

class VentasController extends Controller
{
    //
    public function administracionVent() 
    {
        $ventas = Payment::all();
        $paypalTransactions = PaypalTransaction::all();
        return view('admin.administracionVent', compact('ventas', 'paypalTransactions'));
    }

    public function Ventas() {

        $userEmail = auth()->user()->email;

        $venta2 = Payment::where('email', $userEmail)->get();

        $paypalTransactions = PaypalTransaction::where('user_email', $userEmail)->get();
        
        return view('Compras', compact('venta2', 'paypalTransactions'));
    }

    public function updateStatus (Request $request, $id) {

        $venta = Payment::find($id);
    
        $venta->status = $request->status;
        $venta->save();
    
        return redirect()->back()->with('success', 'Estatus de la venta actualizado correctamente.');
    }

    public function updateStatusPaypal (Request $request, $id) {

        $paypalTransactions = PaypalTransaction::find($id);
    
        $paypalTransactions->status = $request->status;
        $paypalTransactions->save();
    
        return redirect()->back()->with('success', 'Estatus de la Transicion de Paypal se actualizado correctamente.');
    }
}
