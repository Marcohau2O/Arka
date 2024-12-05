<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg text-center">
        <div class="mb-6">
            <h1 class="text-lg font-bold text-green-500">¡Pago confirmado!</h1>
            <p class="mt-2 text-gray-700 text-lg">Gracias por tu compra.</p>
        </div>
        <div class="p-4 mb-6">
            <p class="text-gray-600">
                Tu número de orden es: 
                <span class="font-semibold text-gray-700">{{ $data['payment_id'] ?? 'No disponible' }}</span>.
            </p>
            <p class="text-gray-600">
                Gracias por tu compra:
                <span class="font-semibold text-gray-700">{{ $user['name'] ?? 'No disponible' }}</span>.
            </p>
            <p class="text-gray-600">
                Correo:
                <span class="font-semibold text-gray-700">{{ $user['email'] ?? 'No disponible' }}</span>.
            </p>
        </div>
        <a href="{{ route('inicio') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Volver al Inicio
        </a>
    </div>
</body>
</html>
