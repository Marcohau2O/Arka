<!doctype html>
<html lang="en">

<head>
    <title>Admin Administracion Venta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/adminproductos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/nav.css') }}">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav>
        <ul class="navbar">
            <div aria-label="Orange and tan hamster running in a metal wheel" role="img" class="wheel-and-hamster">
                <div class="wheel"></div>
                <div class="hamster">
                    <div class="hamster__body">
                        <div class="hamster__head">
                            <div class="hamster__ear"></div>
                            <div class="hamster__eye"></div>
                            <div class="hamster__nose"></div>
                        </div>
                        <div class="hamster__limb hamster__limb--fr"></div>
                        <div class="hamster__limb hamster__limb--fl"></div>
                        <div class="hamster__limb hamster__limb--br"></div>
                        <div class="hamster__limb hamster__limb--bl"></div>
                        <div class="hamster__tail"></div>
                    </div>
                </div>
                <div class="spoke"></div>
            </div>
            <li>
                <form action="{{ route('inicio') }}">
                    <button type="submit" class="btn">Regresar a Inicio</button>
                </form>
            </li>
        </ul>
    </nav>

    <h1 class="text-center font-semibold text-3xl">Card payment</h1>

    <div class="container mx-auto p-10">
        <div class="grid grid-cols-4 gap-4">
            @foreach($venta2 as $venta)
            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                <h3 class="text-lg font-semibold mb-2">{{ $venta->full_name }}</h3>
                <p><span class="font-bold">Tarjeta:</span> {{ $venta->card_name }}</p>
                <p><span class="font-bold">Correo:</span> {{ $venta->email }}</p>
                <p><span class="font-bold">Dirección:</span> {{ $venta->address }}</p>
                <p><span class="font-bold">Ciudad:</span> {{ $venta->city }}</p>
                <p><span class="font-bold">Productos Totales:</span> {{ $venta->total_products }}</p>
                <p><span class="font-bold">Monto Total:</span> ${{ number_format($venta->total_amount, 2) }}</p>
                <p><span class="font-bold">Fecha:</span> {{ $venta->created_at->format('d-m-Y') }}</p>
                <p class="mt-2 text-lg font-semibold">
                    <span class="font-bold text-black">Estatus:</span>
                    <span class="{{ $venta->status === 'Completado' ? 'text-purple-500' :
                        ($venta->status === 'En Espera' ? 'text-yellow-600' :
                        ($venta->status === 'Procesando' ? 'text-blue-600' :
                        ($venta->status === 'Enviado' ? 'text-green-600' : 'text-red-600')))}}">
                        {{ $venta->status}}
                    </span>
                </p>
            </div>
            @endforeach
        </div>
    </div>
    
    <h1 class="text-center font-semibold text-3xl">Paypal Transactions</h1>

    <div class="container mx-auto p-10">
        <div class="grid grid-cols-4 gap-4">
            @foreach($paypalTransactions as $transaction)
            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                <h3 class="text-lg font-semibold mb-2">{{ $transaction->user_name }}</h3>
                <p><span class="font-bold">Correo:</span> {{ $transaction->user_email }}</p>
                <p><span class="font-bold">Order ID:</span> {{ $transaction->order_id }}</p>
                <p><span class="font-bold">Payment Source:</span> {{ $transaction->payment_source }}</p>
                <p><span class="font-bold">Productos Totales:</span> {{ $transaction->cart }}</p>
                <p><span class="font-bold">Monto Total:</span> ${{ number_format($transaction->total_amount, 2) }}</p>
                <p><span class="font-bold">Fecha:</span> {{ $transaction->created_at->format('d-m-Y') }}</p>
                <p class="mt-2 text-lg font-semibold">
                    <span class="font-bold text-black">Estatus:</span>
                    <span class="{{ $transaction->status === 'Completado' ? 'text-purple-500' :
                        ($transaction->status === 'En Espera' ? 'text-yellow-600' :
                        ($transaction->status === 'Procesando' ? 'text-blue-600' :
                        ($transaction->status === 'Enviado' ? 'text-green-600' : 'text-red-600')))}}">
                        {{ $transaction->status }}
                    </span>
                </p>
            </div>
            @endforeach
        </div>
    </div>
    

    <h1 class="text-center font-semibold text-3xl">Mercado Pago Transactions</h1>

    <div class="container mx-auto p-10">
        <div class="grid grid-cols-4 gap-4">
            @foreach($mercadopagoTrasactions as $transactionmercado)
            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                <h3 class="text-lg font-semibold mb-2">{{ $transactionmercado->user_name }}</h3>
                <p><span class="font-bold">Correo:</span> {{ $transactionmercado->user_email }}</p>
                <p><span class="font-bold">Order ID:</span> {{ $transactionmercado->collection_id }}</p>
                <p><span class="font-bold">External Reference:</span> {{ $transactionmercado->external_reference }}</p>
                <p><span class="font-bold">Productos Totales:</span> {{ $transactionmercado->tasks }}</p>
                <p><span class="font-bold">Monto Total:</span> ${{ number_format($transactionmercado->total_amount, 2) }}</p>
                <p><span class="font-bold">Fecha:</span> {{ $transactionmercado->created_at->format('d-m-Y') }}</p>
                <p class="mt-2 text-lg font-semibold">
                    <span class="font-bold text-black">Estatus:</span>
                    <span class="{{ $transactionmercado->status === 'Completado' ? 'text-purple-500' :
                        ($transactionmercado->status === 'En Espera' ? 'text-yellow-600' :
                        ($transactionmercado->status === 'Procesando' ? 'text-blue-600' :
                        ($transactionmercado->status === 'Enviado' ? 'text-green-600' : 'text-red-600')))}}">
                        {{ $transactionmercado->status }}
                    </span>
                </p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
