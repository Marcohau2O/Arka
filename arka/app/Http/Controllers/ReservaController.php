<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    //
    public function store(Request $request) {
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'date' => 'required|date',
            'telefono' => 'required|string|max:15',
            'servicio' => 'required|string|max:15'
        ]);

        $validateData['tipo'] = 'Estéticos';

        Reserva::create($validateData);

        return redirect()->back()->with('success', 'Reserva realizada con éxito.');
    }

    public function store2(Request $request) {
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'date' => 'required|date',
            'telefono' => 'required|string|max:15',
            'servicio' => 'required|string|max:15'
        ]);

        $validateData['tipo'] = 'Medicinales';

        Reserva::create($validateData);

        return redirect()->back()->with('success', 'Reserva realizada con éxito.');
    }

    public function index()
    {
        $userName = auth()->user()->name;

        $reservas = Reserva::where('nombre', $userName)->get();

        return view('reserva', compact('reservas'));
    }

    public function AdminReservaciones() {
        
        $reservasEsteticos = Reserva::where('tipo', 'Estéticos')->count();
        $reservasMedicinales = Reserva::where('tipo', 'Medicinales')->count();
    
        
        $reservas = Reserva::all();
    
        
        $totalReservas = $reservasEsteticos + $reservasMedicinales;
        $reservasEsteticosPercentage = $totalReservas ? ($reservasEsteticos / $totalReservas) * 100 : 0;
        $reservasMedicinalesPercentage = $totalReservas ? ($reservasMedicinales / $totalReservas) * 100 : 0;

        return view('admin.administracionReservas', compact('reservasEsteticos', 'reservasMedicinales', 'reservas', 'reservasEsteticosPercentage', 'reservasMedicinalesPercentage'));
    }

    public function AdminReservacion()
        {
            $reservasEsteticos = Reserva::where('tipo', 'Estéticos')->count();
            $reservasMedicinales = Reserva::where('tipo', 'Medicinales')->count();

            $totalReservas = $reservasEsteticos + $reservasMedicinales;
            $reservasEsteticosPercentage = $totalReservas ? ($reservasEsteticos / $totalReservas) * 100 : 0;
            $reservasMedicinalesPercentage = $totalReservas ? ($reservasMedicinales / $totalReservas) * 100 : 0;

            $data = [
                'labels' => ['Estéticos', 'Medicinales'],
                'datasets' => [
                    [
                        'label' => 'Reservaciones',
                        'data' => [$reservasEsteticos, $reservasMedicinales],
                        'backgroundColor' => ['#4CAF50', '#FF9800']
                    ]
                ]
            ];

            return response()->json($data);
        }
}
