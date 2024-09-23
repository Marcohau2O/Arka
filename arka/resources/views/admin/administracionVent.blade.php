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
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-10" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
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
                <p class="mt-2 text-lg font-semibold">
                    <span class="font-bold text-black">Estatus:</span>
                    <span class="{{ $venta->status === 'Completado' ? 'text-purple-500' :
                        ($venta->status === 'En Espera' ? 'text-yellow-600' :
                        ($venta->status === 'Procesando' ? 'text-blue-600' :
                        ($venta->status === 'Enviado' ? 'text-green-600' : 'text-red-600')))}}">
                        {{ $venta->status}}
                    </span>
                </p>

                @if($venta->status != 'Completado')
                    <button class="m-2 p-2 rounded-xl bg-blue-800 text-white" onclick="openModal({{ $venta->id }})">Cambiar estatus</button>
                @endif
            </div>

            <div id="modal-{{ $venta->id }}" class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                <div class="relative bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
                    <button onclick="closeModal({{ $venta->id }})" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
            
                    <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Cambiar Estatus</h2>
                    
                    <div class="flex items-center justify-center mb-4">
                        @if ($venta->status === 'En Espera')
                            <svg class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                            </svg>
                            <span class="mx-4 text-gray-700 text-lg font-medium">→</span>
                            <span class="text-blue-500 text-lg font-bold">Procesando</span>
                        @elseif ($venta->status === 'Procesando')
                            <svg class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12l-4-4-4 4m8 8l-4-4-4 4" />
                            </svg>
                            <span class="mx-4 text-gray-700 text-lg font-medium">→</span>
                            <span class="text-green-500 text-lg font-bold">Enviado</span>
                        @elseif ($venta->status === 'Enviado')
                            <svg class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="mx-4 text-gray-700 text-lg font-medium">→</span>
                            <span class="text-purple-500 text-lg font-bold">Completado</span>
                        @endif
                    </div>
                    
                    <form action="{{ route('ventas.updateStatus', $venta->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <input type="hidden" name="status" value="
                        @if ($venta->status === 'En Espera')
                            Procesando
                        @elseif ($venta->status === 'Procesando')
                            Enviado
                        @elseif ($venta->status === 'Enviado')
                            Completado
                        @endif
                    ">

                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Cambiar a 
                            @if ($venta->status === 'En Espera')
                                "Procesando"
                            @elseif ($venta->status === 'Procesando')
                                "Enviado"
                            @elseif ($venta->status === 'Enviado')
                                "Completado"
                            @endif
                        </button>
                    </form>
                </div>
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
    <script>
        function openModal(id) {
            document.getElementById(`modal-${id}`).classList.remove('hidden');
        }
    
        function closeModal(id) {
            document.getElementById(`modal-${id}`).classList.add('hidden');
        }
    </script>
</body>

</html>
