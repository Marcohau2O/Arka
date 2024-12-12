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

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'
                });
            });
        </script>
    @endif

    <div class="card-container">
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Baños</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p><button class="button type1" data-bs-toggle="modal" data-bs-target="#reservarModal" data-servicio="Baños"><span class="btn-txt">Reservar</span></button></p>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Corte de Pelo</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p><button class="button type1" data-bs-toggle="modal" data-bs-target="#reservarModal" data-servicio="Corte-de-Pelo"><span class="btn-txt">Reservar</span></button></p>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Corte de Uña</p>
            <p class="card-body">
                Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna tristique, non lobortis.
            </p>
            <p><button class="button type1" data-bs-toggle="modal" data-bs-target="#reservarModal" data-servicio="Corte-de-Uña"><span class="btn-txt">Reservar</span></button></p>
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
          <form method="POST" action="{{ route('reservar.store')}}">
            @csrf
            <input type="hidden" id="servicio" name="servicio">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" value="{{ old('name', auth()->user()->name) }}" name="nombre" readonly>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Dia</label>
              <input type="date" class="form-control" name="date">
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="tel" class="form-control" name="telefono">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          const botonesReserva = document.querySelectorAll('button[data-bs-target="#reservarModal"]');
        
          botonesReserva.forEach(button => {
            button.addEventListener('click', function () {
              const servicio = this.getAttribute('data-servicio');
              
              document.getElementById('servicio').value = servicio;
            });
          });
        </script>
    </body>
</html>
