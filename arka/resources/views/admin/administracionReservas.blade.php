<!doctype html>
<html lang="en">

<head>
    <title>Admin Administracion Venta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/adminproductos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/nav.css') }}">
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
                <form action="{{ route('admin.dashboard') }}">
                    <button type="submit" class="btn">Regresar a Inicio</button>
                </form>
            </li>
        </ul>
    </nav>
    
    <main class="p-10 flex-1 overflow-y-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            <!-- Cards -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">Total Reservas Estéticos</h3>
                <p class="text-4xl font-bold text-green-600">{{ $reservasEsteticos }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">Total Reservas Medicinales</h3>
                <p class="text-4xl font-bold text-orange-600">{{ $reservasMedicinales }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">Total Reservas</h3>
                <p class="text-4xl font-bold text-blue-600">{{ $reservasEsteticos + $reservasMedicinales }}</p>
            </div>
        </div>

        <!-- Chart -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">Reservas por Tipo</h3>
            <div style="width:75%; margin: 0 auto;">
                <canvas id="reservasChart"></canvas>
            </div>
        </div>

        <!-- Tabla de Reservas -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Listado de Reservas</h3>
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Nombre</th>
                        <th class="border border-gray-300 px-4 py-2">Tipo</th>
                        <th class="border border-gray-300 px-4 py-2">Servicio</th>
                        <th class="border border-gray-300 px-4 py-2">Fecha</th>
                        <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->tipo }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->servicio }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->date }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $reserva->telefono }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        function openModal(id) {
            document.getElementById(`modal-${id}`).classList.remove('hidden');
        }
    
        function closeModal(id) {
            document.getElementById(`modal-${id}`).classList.add('hidden');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('reservasChart').getContext('2d');
    
            fetch('/api/admin-reservaciones')
                .then(response => response.json())
                .then(data => {
                    new Chart(ctx, {
                        type: 'line',
                        data: data,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function (tooltipItem) {
                                            const dataset = tooltipItem.dataset.data;
                                            const value = dataset[tooltipItem.dataIndex];
                                            const total = dataset.reduce((sum, val) => sum + val, 0);
                                            const percentage = total ? ((value / total) * 100).toFixed(2) : 0;
                                            return `${value} (${percentage}%)`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error al cargar los datos del gráfico:', error);
                });
        });
    </script>
</body>

</html>
