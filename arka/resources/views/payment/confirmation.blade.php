<!-- resources/views/payment/confirmation.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        @if(session('success'))
            <div class="text-green-500 text-lg font-semibold mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold">¡Gracias por tu compra, {{ session('full_name') }}!</h1>
        <p class="mt-2">Tu pago ha sido procesado con éxito.</p>

        <!-- Detalles del pedido -->
        <div class="mt-4">
            <p class="text-gray-700">Total de productos: <strong>{{ session('total_products') }}</strong></p>
            <p class="text-gray-700">Total pagado: <strong>${{ number_format(session('total_amount'), 2) }}</strong></p>
        </div>

        <a href="{{ route('inicio') }}" class="mt-6 inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Volver al Inicio
        </a>
    </div>
</body>
</html>
