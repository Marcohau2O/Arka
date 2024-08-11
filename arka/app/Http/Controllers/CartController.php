<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function add(Request $request)
    {
        $producto = Producto::find($request->id);

        if (empty($producto)) {
            return redirect('/')->with('error', 'Producto no encontrado.');
        }

        $cart = session()->get('cart', []);

        \Log::info('Carrito antes de agregar:', $cart);

        if (isset($cart[$producto->id])) {
            $cart[$producto->id]['tasks']++;
        } else {
            $cart[$producto->id] = [
                'id' => $producto->id,
                'title' => $producto->title,
                'tasks' => 1,
                'price' => $producto->quantity,
                'image' => $producto->image,
            ];
        }

        session()->put('cart', $cart);

        \Log::info("Carrito actualizado", $cart);

        return redirect()->back()->with("success", "¡Producto agregado al carrito: " . $producto->title . "!");
        
    }

    public function adds(Request $request)
    {
        $product = Product::find($request->id);

        if (empty($product)) {
            return redirect('/')->with('error', 'Producto no encontrado.');
        }

        $cart = session()->get('cart',[]);

        \Log::info('Carrito antes de agregar:', $cart);
        
        if(isset($cart[$product->id])) {
            $cart[$product->id]['tasks']++;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'title' => $product->title,
                'tasks' => 1,
                'price' => $product->quantity,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        \Log::info("Carrito actualizado", $cart);

        return redirect()->back()->with("success", "¡Producto agregado al carrito: " . $product->title . "!");
    }


    public function checkout(){
        return view('checkout');
    }

    public function removeItem(Request $request){

        $Id = $request->input('id');

        $cart = session()->get('cart', []);

        if (isset($cart[$Id])) {

            unset($cart[$Id]);

            session()->put('cart', $cart);

            return redirect()->back()->with("success", "¡Producto eliminado!");
        }else {

            return redirect()->back()->with("error", "¡Producto no eliminado en el carrito:!");            
        }
    }

    public function clear(){
        
        session()->forget('cart');

    return redirect()->back()->with("success", "¡Carrito limpiado!");
    }
}