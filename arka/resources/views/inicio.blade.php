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
            <button class="btn"> Nosotros
            </button>
            <button class="btn"> Contactanos
            </button>
            <button class="btn" onclick="window.location.href='{{ route('profile.edit') }}'"> Configuración
            </button>          
            <button class="Btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Logout</div>
            </button>
            
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
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
