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
                <form action="{{ route('admin.dashboard') }}">
                    <button type="submit" class="btn">Regresar a Inicio</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container mx-auto p-10">
        <div class="grid grid-cols-4 gap-4">
            @foreach($ventas as $venta)
            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                <h3 class="text-lg font-semibold mb-2">{{ $venta->full_name }}</h3>
                <p><span class="font-bold">Tarjeta:</span> {{ $venta->card_name }}</p>
                <p><span class="font-bold">Correo:</span> {{ $venta->email }}</p>
                <p><span class="font-bold">Dirección:</span> {{ $venta->address }}</p>
                <p><span class="font-bold">Ciudad:</span> {{ $venta->city }}</p>
                <p><span class="font-bold">Productos Totales:</span> {{ $venta->total_products }}</p>
                <p><span class="font-bold">Monto Total:</span> ${{ number_format($venta->total_amount, 2) }}</p>
                <p><span class="font-bold">Fecha:</span> {{ $venta->created_at->format('d-m-Y') }}</p>
                <p class="mt-2 text-green-600 font-semibold">Estatus: Pagados</p>
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
