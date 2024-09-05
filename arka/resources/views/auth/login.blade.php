<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('assets/login.css')}}">
    <title>Inicio de Session</title>


</head>
<body>
    <div class="container">
        <div class="signin-signup">
            {{-- Formulario de Inicio de Session --}}
            @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{{ $errors->first() }}',
                    });
                });
            </script>
        @endif
            <form action="{{route('login')}}" method="POST" class="sign-in-form">
                @csrf
                <img src="{{ asset('storage/uploads/logo.png') }}" alt="Logo" style="width: 300px; height: 200px; margin: 5%;">
                <h2 class="title">
                    Iniciar sesión</h2>
                <form>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input
                    placeholder="E-mail"
                    id="email"
                    name="email"
                    type="email"
                    class="input"
                    required
                    />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input 
                    placeholder="Password"
                    id="password"
                    name="password"
                    type="password"
                    class="input"
                    required
                    />
                </div>
                <input type="submit" value="Login" class="btn">
                <p class="social-text">O inicie sesión con la plataforma social
                </p>
                {{-- Fin de Inicio de Session --}}

                {{-- Inicio de Session de Otras--}}
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                {{-- Inicio de Session de Otras--}}

            </form>
            {{-- Formulario de Registro--}}
            <form action="{{route('register')}}" method="POST" class="sign-up-form">
                @csrf
                <img src="{{ asset('storage/uploads/logo.png') }}" alt="Logo" style="width: 300px; height: 200px; margin: 5%;">
                <h2 class="title">Registro</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input 
                    placeholder="name"
                    id="name"
                    name="name"
                    type="name"
                    class="input"
                    required
                    />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input 
                    placeholder="E-mail"
                    id="email"
                    name="email"
                    type="email"
                    class="input"
                    required
                    />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input 
                    placeholder="Password"
                    id="password"
                    name="password"
                    type="password"
                    class="input"
                    required
                    />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input 
                    placeholder="Password_confirmation"
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="input"
                    required
                    />
                </div>
                <input type="submit" value="Sign up" class="btn">
                {{-- <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div> --}}
            </form>
            {{-- Fin Formulario de Registro--}}

        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>¿Miembro de Arka?</h3>
                    <p>Ya eres Miembro Arka</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="signin.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>¿Nuevo en Arka?</h3>
                    <p>Primer y mejor sitio web para Animales Arka.</p>
                    <button class="btn" id="sign-up-btn">Registrase</button>
                </div>
                <img src="signup.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.classList.toggle("show");
        }


        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");
        const sign_in_btn2 = document.querySelector("#sign-in-btn2");
        const sign_up_btn2 = document.querySelector("#sign-up-btn2");
        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });
        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });
        sign_up_btn2.addEventListener("click", () => {
            container.classList.add("sign-up-mode2");
        });
        sign_in_btn2.addEventListener("click", () => {
            container.classList.remove("sign-up-mode2");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>