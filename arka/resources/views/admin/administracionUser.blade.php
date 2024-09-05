<!doctype html>
<html lang="en">
    <head>
        <title>Admin administracionUser</title>
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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
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
                    <form action="{{route('admin.dashboard')}}">
                        <button type="submit" class="btn">Regresar a Inicio</button>
                    </form>
                </li>            
            </ul>
        </nav>

        <div class="container mx-auto p-10">
            <div class="grid grid-cols-4 gap-6">
                @foreach($Users as $User)
                <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-indigo-100 p-2 rounded-full text-indigo-500">
                            <i class="fa fa-user icon text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold ml-4 text-gray-800">{{ $User->name }}</h3>
                    </div>
                    <p class="mb-2"><span class="font-bold text-gray-700">ID:</span> {{ $User->id }}</p>
                    <p class="mb-2"><span class="font-bold text-gray-700">Correo:</span> {{ $User->email }}</p>
                    <p class="mb-2"><span class="font-bold text-gray-700">Tipo Usuario:</span> 
                        <span class="inline-block px-2 py-1 rounded-lg text-white 
                        {{ $User->usertype == 'admin' ? 'bg-green-500' : 'bg-blue-500' }}">
                        {{ ucfirst($User->usertype) }}
                        </span>
                    </p>
                    <p><span class="font-bold text-gray-700">Fecha Creación:</span> {{ $User->created_at->format('d-m-Y') }}</p>
                </div>
                @endforeach
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
