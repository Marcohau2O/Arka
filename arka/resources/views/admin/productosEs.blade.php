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
        <link rel="stylesheet" href="{{asset('assets/adminproductos.css')}}">
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
                <li>
                    <form action="{{ route('inicio') }}">
                        <button type="submit" class="btn">Regresar a Inicio</button>
                    </form>
                </li>            
            </ul>
        </nav>
        <div class="container mx-auto px-4">
            <div class="flex justify-start">
        <button class="button1 py-2 px-4">
            <span class="span2 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Agregar
            </span>
        </button>
        </div>
        </div>
        <div class="container mx-auto p-4">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th scope="col" class="px-4 py-2">Imagen</th>
                    <th scope="col" class="px-4 py-2">Título</th>
                    <th scope="col" class="px-4 py-2">Descripción</th>
                    <th scope="col" class="px-4 py-2">Costo</th>
                    <th scope="col" class="px-4 py-2">Editar</th>
                    <th scope="col" class="px-4 py-2">Eliminar</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($productos as $producto)
                <tr>
                    <td class="px-4 py-2">
                        <img src="{{ asset('path/to/your/image/'.$producto->image) }}" class="img-thumbnail w-24 h-auto" alt="Product Image" style="width: 100px;">
                    </td>
                    <td class="px-4 py-2">{{ $producto->title }}</td>
                    <td class="px-4 py-2">{{ $producto->description }}</td>
                    <td class="px-4 py-2">{{ $producto->quantity }}</td>
                    <td class="px-4 py-2">
                        <button class="button2 py-2 px-4">
                            <span class="span2 flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Editar
                            </span>
                        </button>
                    </td>
                    <td class="px-4 py-2">
                        <button class="button3 py-2 px-4">
                            <span class="span3 flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Eliminar
                            </span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
