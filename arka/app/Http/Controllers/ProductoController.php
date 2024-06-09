<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use DB;

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

    public function create()
    {
        return view('admin.createProdEs'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        try {
            DB::beginTransaction();
    
            $producto = new Producto();
            $producto->title = $request->input('title');
            $producto->description = $request->input('description');
            $producto->quantity = $request->input('quantity');
    
            if ($request->hasFile('image')) {
                $producto['image'] = $request->file('image')->store('uploads','public');
            }
            // if ($request->hasFile('image')) {
            //     $archivo = $request->file('image');
            //     $nombreArchivo = time() . '.' . $archivo->getClientOriginalExtension();
            //     $archivo->move(public_path('Archivos'), $nombreArchivo);
            //     $producto->image = $nombreArchivo;
            // }
    
            $producto->save();
    
            DB::commit();
    
            return redirect('/admin/productosEs')->with('success', 'Producto agregado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id); // Obtener el producto que deseas editar
        return view('admin.updateProdEs', compact('producto'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Opcional: No requerimos que la imagen sea siempre obligatoria en la actualización
        ]);

        try {
            DB::beginTransaction();

            $producto = Producto::findOrFail($id);

            if ($request->hasFile('image')) {
                Storage::delete('public/'.$producto->image);
                $producto['image'] = $request->file('image')->store('uploads','public');
                }
            //$producto = Producto::findOrFail($id);
            $producto->title = $request->input('title');
            $producto->description = $request->input('description');
            $producto->quantity = $request->input('quantity');

            // if ($request->hasFile('image')) {
            //     // Si se proporciona una nueva imagen, la actualizamos
            //     $archivo = $request->file('image');
            //     $nombreArchivo = time() . '.' . $archivo->getClientOriginalExtension();
            //     $archivo->move(public_path('Archivos'), $nombreArchivo);
            //     $producto->image = $nombreArchivo;
            // }

            $producto->save();

            DB::commit();

            return redirect('/admin/productosEs')->with('success', 'Producto actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

        public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $producto = Producto::findOrFail($id);

            // Eliminar imagen si existe
            if (!empty($producto->image)) {
                Storage::delete('public/'.$producto->image);
            }

            $producto->delete();

            DB::commit();

            return redirect('/admin/productosEs')->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }


}
