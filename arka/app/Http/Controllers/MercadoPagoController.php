<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Preference;
use MercadoPago\Item;
use MercadoPago\Payer;

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


        session()->forget('cart');

        
        // Pasar datos a la vista
        return view('Pasarela', [
            'preferenceId' => $preference->id,
            'publicKey' => env('MERCADO_PAGO_PUBLIC_KEY'),
        ]);
    }

    public function success(Request $request)
    {
        // Datos del pago
        $paymentData = $request->all();

        // Puedes guardar los datos en tu base de datos o procesarlos
        return view('payment-success', ['data' => $paymentData]);
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
