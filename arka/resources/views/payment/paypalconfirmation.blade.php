
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
            <p class="text-gray-700">Gracias por tu compra. El ID de tu transacción es: <strong>{{ session('order_id') }}</strong>.</p>
            <p class="text-gray-700">Gracias por tu compra: <strong>{{ session('user_name') }}</strong>.</p>
            <p class="text-gray-700">Correo: <strong>{{ session('user_email') }}</strong>.</p>
        @else
            <div class="text-red-500 text-lg font-semibold mb-4">
                Ocurrió un problema al procesar tu transacción.
            </div>
        @endif
        <a href="{{ route('inicio') }}" class="mt-6 inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Volver al Inicio
        </a>
    </div>
</body>
</html>
