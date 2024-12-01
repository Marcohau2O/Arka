<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaypalTransaction;
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

    public function storePaypalTransaction(Request $request)
    {
    $user = json_decode($request->input('user'), true);
    $transactionData = json_decode($request->input('transaction_data'), true);
    $cart = json_decode($request->input('cart'), true);
    $totalAmount = $request->input('total_amount');

    $totalQuantity = array_reduce($cart, function ($carry, $item) {
        return $carry + $item['tasks']; // Suma las cantidades
    }, 0);

    $validatedData = $request->validate([
        'transaction_data' => 'required',
        'user' => 'required',
        'total_amount' => 'required|numeric',
    ]);

    PaypalTransaction::create([
        'order_id' => $transactionData['orderID'],
        'payer_id' => $transactionData['payerID'],
        'payment_id' => $transactionData['paymentID'] ?? null,
        'payment_source' => $transactionData['paymentSource'],
        'facilitator_access_token' => $transactionData['facilitatorAccessToken'] ?? null,
        'user_name' => $user['name'],
        'user_email' => $user['email'],
        'cart' => $totalQuantity,
        'total_amount' => $totalAmount,
        'status' => 'En Espera',
    ]);

    session()->forget('cart');

    return redirect()->route('payment.paypalconfirmation')
        ->with('success', 'Pago realizado con éxito')
        ->with('order_id', $transactionData['orderID'])
        ->with('user_name', $user['name'])
        ->with('user_email', $user['email']);
    }

    public function confirmation2() {
        return view('payment.paypalconfirmation');
    }
}
