<!doctype html>
<html lang="en">
    <head>
        <title>Admin UpdateMe</title>
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
        <link rel="stylesheet" href="{{asset('assets/adminCreate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/nav.css')}}">
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
                    <form action="{{route('productosMe.alternative')}}">
                        <button type="submit" class="btn">Regresar a Inicio</button>
                    </form>
                </li>            
            </ul>
        </nav>

        <!-- resources/views/admin/create.blade.php -->
        <div class="form-container">
        <form class="form" method="POST" action="{{ route('admin.editsProdMe', $products->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Utilizamos el método PUT para actualizar -->
            <div class="form-group py-3 px-3">
                <label for="title">Título:</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $products->title }}">
            </div>
            <div class="form-group py-3 px-3">
                <label for="description">Descripción:</label>
                <textarea name="description" class="form-control" id="description" rows="3">{{ $products->description }}</textarea>
            </div>
            <div class="form-group py-3 px-3">
                <label for="quantity">Cantidad:</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $products->quantity }}">
            </div>
            <div class="form-group py-3 px-5">
                <label for="image">Imagen:</label>
                <img src="{{ asset('storage').'/'.$products->image }}" alt="" width="200">
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <button type="submit" class="btn btn-primary" id="EditarProductoBtn">Actualizar Producto</button>
        </form>
    </div>
        
        

        <!-- Bootstrap JavaScript Libraries -->
        <script>
            document.getElementById('EditarProductoBtn').addEventListener('click', function() {
                Swal.fire({
                    title: "Good job!",
                    text: "Se Edito Correctamente!",
                    icon: "success"
                    });
            });
                </script>
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
