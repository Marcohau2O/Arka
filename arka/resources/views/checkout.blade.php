<!doctype html>
<html lang="en">
    <head>
        <title>Productos Esteticos</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="{{asset('assets/productos.css')}}">
        <link rel="stylesheet" href="{{asset('assets/nav.css')}}">
        @vite('resources/css/app.css')
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
                <li class="nav-item">
                    <a class="nav-link" href="{{route('checkout')}}">
                        Carrito
                        <span class="badge bg-danger">
                            @php
                            $cart = session()->get('cart',[]);
                            $totalItems = array_sum(array_column($cart, 'tasks'));
                            @endphp
                            {{ $totalItems }}
                        </span>
                    </a>
                </li>
                <li>
                    <form action="{{ route('inicio') }}">
                        <button type="submit" class="btn">Regresar a Inicio</button>
                    </form>
                </li>            
            </ul>
        </nav>
        <div class="container mx-auto p-4">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @php
                $cart = session()->get('cart', []);
                
                $subtotal = 0;
                $taxRate = 0.1;
                $total = 0;

                
                foreach ($cart as $item) {
                    $subtotal += $item['tasks'] * $item['price'];
                }

                $tax = $subtotal * $taxRate;
                $total = $subtotal + $tax;

                $isDisabled = is_null($total) || $total <= 0;
            @endphp
                    @php
                $cart = session()->get('cart', []);
                    @endphp
                        @if (count($cart) > 0)
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-800 text-white">
                                <th scope="col" class="px-4 py-4">ID</th>
                                <th scope="col" class="px-4 py-4">Nombre</th>
                                <th scope="col" class="px-4 py-4">Cantidad</th>
                                <th scope="col" class="px-4 py-4">Precio Unitario</th>
                                <th scope="col" class="px-4 py-4">Importe</th>
                                <th scope="col" class="px-4 ý-4"></th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cart as $item)
                                <tr>
                                    <td class="px-4 py-4"><img src="{{ asset('storage/' . $item['image']) }}" width="50" alt="{{ $item['title'] }}"></td>
                                    <td class="px-4 py-4">{{ $item['title'] }}</td>
                                    <td class="px-4 py-4">{{ $item['tasks'] }}</td>
                                    <td class="px-4 py-4">{{ number_format($item['price']) }}</td>
                                    <td class="px-4 py-4">{{ number_format($item['tasks'] * $item['price'], 2) }}</td>
                                    <td>
                                        <form action="{{route('removeitem')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item['id']}}"/>
                                            <input type="submit" name="btn" class="btn btn-danger btn-sm" value="Eliminar">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="fw-bolde">
                                    <td colspan="3"></td>
                                    <td class="text-center">Subtotal</td>
                                    <td class="text-center">{{ number_format($subtotal, 2) }}</td>
                                    <td></td>
                                </tr>
                                <tr class="fw-bolde">
                                    <td colspan="3"></td>
                                    <td class="text-center">impuestos %10</td>
                                    <td class="text-center">{{ number_format($tax, 2) }}</td>
                                    <td></td>
                                </tr>
                                <tr class="fw-bolde">
                                    <td colspan="3"></td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">{{ number_format($total, 2) }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('clear') }}" class="inline-block m-2 px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md shadow-sm hover:bg-red-600 transition duration-300 ease-in-out">
                            Vaciar Carrito
                        </a>                        
                        @else
                        <a id="add-product" class="inline-block m-2 px-4 py-2 text-sm font-meddium text-white bg-blue-500 rounded-md shadow-sm hover:bg-blue-600 transition duration-300 ease-in-out">
                            Agregar un Producto
                        </a>
                        @endif
                    </div>
                    <div style="display: flex; justify-content: flex-end">
                        <form action="{{route('Pasarela')}}">
                        <button type="submit"
                            class="m-10 px-6 py-3 text-lg rounded-lg shadow-lg {{ $isDisabled ? 'bg-gray-400 text-gray-600 cursor-not-allowed' : 'bg-green-500 text-white hover:bg-green-600' }}" 
                            {{ $isDisabled ? 'disabled' : '' }}>
                            <span class="btn-txt">Pagar</span>
                        </button>
                        </form>
                    </div>
        </div> 
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script>
            document.getElementById('add-product').addEventListener('click', function(event) {
                event.preventDefault();
            
                Swal.fire({
                    title: '¿Donde Ir?',
                    text: "Selecciona una opción:",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Esteticos',
                    cancelButtonText: 'Medicinales'
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        window.location.href = '/productosE';
                    } else if (result.isDismissed) {
                        
                        window.location.href = '/productosM';
                    }
                });
            });
            </script>
            
    </body>
</html>