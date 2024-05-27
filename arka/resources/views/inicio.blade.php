<!doctype html>
<html lang="en">
    <head>
        <title>Inicios</title>
        <!-- Required meta tags -->
        <meta charset"utf-8" />
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
        <link rel="stylesheet" href="{{asset('assets/nav.css')}}">
    </head>

    <body>
  <nav>
        <ul class="navbar">
            <li><img src="your-logo.png" alt="Logo" class="logo"></li>
            <li><a href="#quienes-somos">¿Quienes Somos?</a></li>
            <li><a href="#contactanos">Contactanos</a></li>
            <li><x-dropdown-link :href="route('profile.edit')">
                {{ __('Configuración') }}
            </x-dropdown-link></></li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="text-black" role="menuitem" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </ul>
    </nav>

    <div class="card-container">
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Productos Esteticos</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p>
                <button onclick="window.location.href='/productosE'" class="button type1">
                    <span class="btn-txt">Más Información</span>
                </button>
            </p>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Productos Medicinales</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p>
                <button onclick="window.location.href='/productosM'" class="button type1">
                    <span class="btn-txt">Más Información</span>
                </button>
            </p>        
            </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Serviciós Esteticos</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p>
                <button onclick="window.location.href='/serviciosE'" class="button type1">
                    <span class="btn-txt">Más Información</span>
                </button>
            </p>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Serviciós Medicinales</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p>
                <button onclick="window.location.href='/serviciosM'" class="button type1">
                    <span class="btn-txt">Más Información</span>
                </button>
            </p>
        </div>
        <!-- Add more cards as needed -->
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
