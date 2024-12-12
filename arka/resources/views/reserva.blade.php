<!doctype html>
<html lang="en">

<head>
    <title>Administracion Reservas</title>
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

    <div class="container mx-auto p-5">
        <h1 class="text-2xl font-bold mb-5">Reservas de {{ auth()->user()->name }}</h1>
        @if($reservas->isEmpty())
            <p>No hay reservas registradas.</p>
        @else
            <table class="table-auto w-full border-collapse border border-gray-200 bg-white shadow-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Nombre</th>
                        <th class="border border-gray-300 px-4 py-2">Servicio</th>
                        <th class="border border-gray-300 px-4 py-2">Fecha</th>
                        <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->servicio }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->date }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->telefono }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
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
