<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Http\Controllers\CartController;

class PaymentController extends Controller
{
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'card_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'total_products' => 'required|integer',
            'total_amount' => 'required|numeric',
        ]);

        $validatedData['status'] = 'En Espera';

        $payment = Payment::create($validatedData);

        session()->forget('cart');

        return redirect()->route('payment.confirmation')->with('success', 'Pago realizado con éxito.')
        ->with('full_name', $validatedData['full_name'])
        ->with('total_products', $validatedData['total_products'])
        ->with('total_amount', $validatedData['total_amount']);
    }

    public function confirmation(){
        return view('payment.confirmation');
    }
}
