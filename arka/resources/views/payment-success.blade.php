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
            <h1 class="text-3xl font-bold text-green-500">¡Pago confirmado!</h1>
            <p class="mt-2 text-gray-700 text-lg">Gracias por tu compra.</p>
        </div>
        <div class="bg-green-50 p-4 rounded-lg shadow-inner border border-green-200 mb-6">
            <p class="text-gray-600">
                Tu número de orden es: 
                <span class="font-semibold text-green-700">{{ $data['payment_id'] ?? 'No disponible' }}</span>.
            </p>
        </div>
        <a href="{{ url('/') }}" class="px-6 py-3 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Volver al Inicio
        </a>
    </div>
    <script>
        var paymentId = @json($data['payment_id'] ?? null);
            //Aqui se mapean el data y con eso vamos a guardarlo en una bse de datos
        console.log("Payment ID:", paymentId)
    </script>
</body>
</html>
