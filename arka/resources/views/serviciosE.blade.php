<!doctype html>
<html lang="en">
    <head>
        <title>Servicion Esteticos</title>
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
        <link rel="stylesheet" href="{{asset('assets/servicios.css')}}">
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
            <li>
                <form action="{{ route('inicio') }}">
                    <button type="submit" class="btn">Regresar a Inicio</button>
                </form>
            </li>            
        </ul>
    </nav>

    <div class="card-container">
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Baños</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p><button class="button type1" data-bs-toggle="modal" data-bs-target="#reservarModal"><span class="btn-txt">Reservar</span></button></p>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Corte de Pelo</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p><button class="button type1" data-bs-toggle="modal" data-bs-target="#reservarModal"><span class="btn-txt">Reservar</span></button></p>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Corte de Uña</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p><button class="button type1" data-bs-toggle="modal" data-bs-target="#reservarModal"><span class="btn-txt">Reservar</span></button></p>
        </div>
        <!-- Add more cards as needed -->
    </div>
        <!-- Modal -->
  <div class="modal fade" id="reservarModal" tabindex="-1" aria-labelledby="reservarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reservarModalLabel">Reservar Servicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Contenido del Modal -->
          <form>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Dia</label>
              <input type="date" class="form-control" id="date" required>
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="tel" class="form-control" id="telefono" required>
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
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
