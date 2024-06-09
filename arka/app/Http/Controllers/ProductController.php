<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('productosM',compact('products'));
    }

    public function indexAlternative()
    {
        $products = Product::all();
        return view('admin.productosMe',compact('products'));
    }

    public function create()
    {
        return view('admin.createProdMe');
    }

    public function stores(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        try {
            DB::beginTransaction();
    
            $products = new Product();
            $products->title = $request->input('title');
            $products->description = $request->input('description');
            $products->quantity = $request->input('quantity');
    
            if ($request->hasFile('image')) {
            $products['image'] = $request->file('image')->store('uploads','public');
            }

            // if ($request->hasFile('image')) {
            //     $archivo = $request->file('image');
            //     $nombreArchivo = time() . '.' . $archivo->getClientOriginalExtension();
            //     $archivo->move(public_path('Archivos'), $nombreArchivo);
            //     $products->image = $nombreArchivo;
            // }
    
            $products->save();
    
            DB::commit();
    
            return redirect('/admin/productosMe')->with('success', 'Producto agregado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function edits($id)
    {
        $products = Product::findOrFail($id); 
        return view('admin.updateProdMe', compact('products'));
    }

    public function updates(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Opcional: No requerimos que la imagen sea siempre obligatoria en la actualización
        ]);

        try {
            DB::beginTransaction();

            $products = Product::findOrFail($id);

            if ($request->hasFile('image')) {
                Storage::delete('public/'.$products->image);
                $products['image'] = $request->file('image')->store('uploads','public');
                }

            //$products = Product::findOrFail($id);
            $products->title = $request->input('title');
            $products->description = $request->input('description');
            $products->quantity = $request->input('quantity');

            // if ($request->hasFile('image')) {
            //     // Si se proporciona una nueva imagen, la actualizamos
            //     $archivo = $request->file('image');
            //     $nombreArchivo = time() . '.' . $archivo->getClientOriginalExtension();
            //     $archivo->move(public_path('Archivos'), $nombreArchivo);
            //     $products->image = $nombreArchivo;
            // }

            $products->save();

            DB::commit();

            return redirect('/admin/productosMe')->with('success', 'Producto actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function destroys($id)
    {
        try {
            DB::beginTransaction();

            $products = Product::findOrFail($id);

            // Eliminar imagen si existe
            if (!empty($products->image)) {
                Storage::delete('Archivos/' . $products->image);
            }

            $products->delete();

            DB::commit();

            return redirect('/admin/productosMe')->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
