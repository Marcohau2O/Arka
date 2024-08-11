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
        <link rel="stylesheet" href="{{asset('assets/productos.css')}}">
        <link rel="stylesheet" href="{{asset('assets/nav.css')}}">
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
        @include('partials.msg')
        <div class="card-container">
           @foreach($productos as $producto)
          <div class="card">
              <img src="{{ asset('storage').'/'.$producto->image }}" class="card-img-top" alt="Product Image">
              <div class="card__content">
                  <p class="card__title">{{ $producto->title }}</p>
                  <p class="card__description">{{ $producto->description }}</p>
                  <p class="card__quantity">Costo: {{ number_format($producto['quantity'], 0, '.', ',') }}</p>
              </div>
              <form action="{{route('add')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$producto->id}}"/>
                <input type="submit" name="btn" class="btn btn-success w-100" value="addCart">
              </form>
          </div>
          @endforeach
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
