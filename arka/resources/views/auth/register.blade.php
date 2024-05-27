<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
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
        <link rel="stylesheet" href="{{asset('assets/login.css')}}">
    </head>

    <body>
        <div class="container">
            <div class="heading">Registrase</div>
            <form action="{{route('register')}}" class="form" method="POST">
                @csrf
                <input
                placeholder="name"
                id="name"
                name="name"
                type="name"
                class="input"
                required=""
              />
              <input
                placeholder="E-mail"
                id="email"
                name="email"
                type="email"
                class="input"
                required=""
              />
              <input
                placeholder="Password"
                id="password"
                name="password"
                type="password"
                class="input"
                required=""
              />
              <input
              placeholder="Password_confirmation"
              id="password_confirmation"
              name="password_confirmation"
              type="password_confirmation"
              class="input"
              required=""
            />
              <input value="Registrase" type="submit" class="login-button" href="{{route('login')}}"/>
              <span class="forgot-password"><a href="{{route('login')}}">Ya Tienes Cuenta??</a></span>
            </form>
          
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
