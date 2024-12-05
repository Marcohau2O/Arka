<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Preference;
use MercadoPago\Item;
use MercadoPago\Payer;
use App\Models\MercadoPagoTransaction;

class MercadoPagoController extends Controller
{
    //
    public function createPreference()
    {
        MercadoPagoConfig::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));

        $cart = session()->get('cart', []);
        $cartCollection = collect($cart);

        $subtotal = $cartCollection->sum(function($item) {
            return (float) $item['tasks'] * (float) $item['price'];
        });

        $tax = $subtotal * 0.10;
    
        $total = $subtotal + $tax;
        
        $items = [];
        foreach ($cartCollection as $item) {
            $priceWithTax = (float) $item['price'] * 1.10;

            $items[] = [
                "id" => $item['id'],
                "title" => $item['title'],
                "quantity" => $item['tasks'],
                "unit_price" => $priceWithTax,
            ];
        }
        
        $client = new PreferenceClient();

        try {
            // Crear la preferencia
            $preference = $client->create([
                "items" => $items,
                "statement_descriptor" => "Arka",
                "external_reference" => "CDP001",
                "total_amount" => $total,
                "back_urls" => [
        "success" => route('payment.success'),
        "failure" => route('payment.failure'),
        "pending" => route('payment.pending'),
    ],
    "auto_return" => "approved",
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => "Error creando la Preferencia: " . $e->getMessage()], 500);
        }


        

        
        // Pasar datos a la vista
        return view('Pasarela', [
            'preferenceId' => $preference->id,
            'publicKey' => env('MERCADO_PAGO_PUBLIC_KEY'),
        ]);
    }

    public function success(Request $request)
    {
        // session()->forget('cart');

        $paymentData = $request->all();

        $User = auth()->user();

        $carta = session()->get('cart', []);
        $cartaCollection = collect($carta);

        $subto = $cartaCollection->sum(function ($item) {
            return (float) $item['tasks'] * (float) $item['price'];
        });

        $taxs = $subto * 0.10;
        $totales = $subto + $taxs;

        MercadoPagoTransaction::create([
            'collection_id' => $paymentData['collection_id'] ?? null,
            'collection_status' => $paymentData['collection_status'] ?? null,
            'external_reference' => $paymentData['external_reference'] ?? null,
            'merchant_account_id' => $paymentData['merchant_account_id'] ?? null,
            'merchant_order_id' => $paymentData['merchant_order_id'] ?? null,
            'payment_id' => $paymentData['payment_id'] ?? null,
            'payment_type' => $paymentData['payment_type'] ?? null,
            'preference_id' => $paymentData['preference_id'] ?? null,
            'processing_mode' => $paymentData['processing_mode'] ?? null,
            'site_id' => $paymentData['site_id'] ?? null,
            'status' => 'En Espera',
            'user_name' => $User->name,
            'user_email' => $User->email,
            'tasks' => $cartaCollection->sum('tasks'),
            'total_amount' => $totales,
        ]);

        session()->forget('cart');

        return view('payment-success', [
            'data' => $paymentData,
            'user' => $User,
            'cart' => $carta,
            'total' => $totales,
    ]);
    }

    public function failure(Request $request)
    {
        return view('payment-failure', ['data' => $request->all()]);
    }

    public function pending(Request $request)
    {
        return view('payment-pending', ['data' => $request->all()]);
    }

}
