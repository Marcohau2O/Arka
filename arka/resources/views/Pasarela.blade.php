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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="{{asset('assets/nav.css')}}">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('app.paypal_id') }}&currency=MXN"></script>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        @vite('resources/css/app.css')
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
                    <form action="{{ route('checkout') }}">
                        <button type="submit" class="btn">Regresar al Carrito</button>
                    </form>
                </li>            
            </ul>
        </nav>
        <div class="flex flex-row m-16">
            <div class="flex-1 max-w-[30rem] max-h-[20rem] mx-auto p-4 bg-white shadow-lg rounded-lg">
                <h2 class="bg-white text-lg text-center">En Resumen a Pagar: 2</h2>
                @php
                $cart = session()->get('cart', []);
                $cartCollection = collect($cart);
                $subtotal = $cartCollection->sum(function($item){
                    return $item['tasks'] * $item['price'];
                });
                $tax = $subtotal * 0.10;
                $total = $subtotal + $tax;
                @endphp
                <!-- Resumen del carrito -->
                    <div class="mt-4">
                        <p class="text-lg font-semibold">Total de productos: {{ $cartCollection->sum('tasks') }}</p>
                        <p class="text-lg font-semibold">Total a pagar: {{ number_format($total, 2) }}</p>
                    </div>
            </div>
            <div class="flex-1 max-w-[60rem] mx-auto p-4 bg-white shadow-lg rounded-lg">
                <h2 class="text-2xl font-semibold mb-4 text-center">Payment Form</h2>
                <form action="{{route('payment.store')}}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Account Information Start -->
                    <h4 class="text-lg font-medium mb-3">Account</h4>
                    <div class="space-y-3">
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                            <input type="text" id="full_name" name="full_name" placeholder="Full Name" required class="flex-1 p-2 placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fa fa-user icon p-2"></i>
                        </div>
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                            <input type="text" id="card_name" name="card_name" placeholder="Name on Card" required class="flex-1 p-2 placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fa fa-user icon p-2"></i>
                        </div>
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                            <input type="email" id="email" name="email" placeholder="Email Address" value="{{ old('email', auth()->user()->email) }}" required class="flex-1 p-2 placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fa fa-envelope icon p-2"></i>
                        </div>
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                            <input type="text" id="address" name="address" placeholder="Address" required class="flex-1 p-2 placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fa fa-map-marker icon p-2"></i>
                        </div>
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                            <input type="text" id="city" name="city" placeholder="City" required class="flex-1 p-2 placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fa fa-institution icon p-2"></i>
                        </div>
                    </div>
                    <!-- Account Information End -->
            
                    <!-- Payment Details Start -->
                    <div class="space-y-3">
                        <h4 class="text-lg font-medium mb-2">Payment Details</h4>
                        <div class="flex space-x-3 mb-3">
                            <div class="flex items-center">
                                <input type="radio" name="pay" class="form-radio text-indigo-600" id="bc1" checked onchange="togglePaymentOptions()">
                                <label for="bc1" class="ml-1 text-gray-700 text-sm flex items-center"><i class="fa fa-cc-visa mr-1"></i>Credit Card</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="pay" class="form-radio text-indigo-600" id="bc2" onchange="togglePaymentOptions()">
                                <label for="bc2" class="ml-1 text-gray-700 text-sm flex items-center"><i class="fa fa-cc-paypal mr-1"></i>Paypal</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="pay" class="form-radio text-indigo-600" id="bc3" onchange="togglePaymentOptions()">
                                <label for="bc3" class="ml-1 text-gray-700 text-sm flex items-center"><i class="fa fa-credit-card icon mr-1"></i>Mercado Libre</label>
                            </div>
                        </div>
                        <div id="credit-card-fields">
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden mb-3">
                            <input type="tel" id="card_number" name="card_number" placeholder="Card Number 1111-2222-3333-4444" required class="flex-1 p-2 placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fa fa-credit-card icon p-2"></i>
                        </div>
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden mb-3">
                            <input type="tel" id="card_cvc" name="card_cvc" placeholder="Card CVC 632" required maxlength="3" class="flex-1 p-2 placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fa fa-user icon p-2"></i>
                        </div>
                        <div class="flex space-x-2 mb-3">
                            <input type="number" id="exp_month" name="exp_month" placeholder="Exp Month" required maxlength="2" class="w-1/2 p-2 border border-gray-300 rounded-md placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <input type="number" id="exp_year" name="exp_year" placeholder="Exp Year" required maxlength="2" class="w-1/2 p-2 border border-gray-300 rounded-md placeholder-gray-400 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <input type="hidden" name="total_products" value="{{ $cartCollection->sum('tasks')}}">
                        <input type="hidden" name="total_amount" value="{{ number_format($total, 2, '.', '')}}">
                        <div class="flex justify-center">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">PAY NOW</button>
                        </div>
                    </div>
                    <!-- Payment Details End -->
                
                </form>
                <div id="paypal-button" class="hidden">
                    <div id="paypal-buttons" class="flex justify-center items-center m-5"></div>
                    <script>
                        
                        var Currentuser = @json(auth()->user());
                        var totalAmount = "{{ number_format($total, 2, '.', '') }}";
                        var cart = @json($cart);
                    
                            paypal.Buttons({
                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: totalAmount,
                                                currency_code: 'MXN'
                                            }
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    console.log(data)
                                    console.log(Currentuser);

                                    var form = document.createElement('form');
                                form.method = 'POST';
                                form.action = '{{ route("storePaypalTransaction") }}'; // La ruta a tu controlador

                                // Crear un campo oculto para el token CSRF
                                var csrfToken = document.createElement('input');
                                csrfToken.type = 'hidden';
                                csrfToken.name = '_token';
                                csrfToken.value = '{{ csrf_token() }}';
                                form.appendChild(csrfToken);

                                // Crear campos ocultos para los datos
                                var userField = document.createElement('input');
                                userField.type = 'hidden';
                                userField.name = 'user';
                                userField.value = JSON.stringify(Currentuser);
                                form.appendChild(userField);

                                var transactionDataField = document.createElement('input');
                                transactionDataField.type = 'hidden';
                                transactionDataField.name = 'transaction_data';
                                transactionDataField.value = JSON.stringify(data);
                                form.appendChild(transactionDataField);

                                var cartField = document.createElement('input');
                                cartField.type = 'hidden';
                                cartField.name = 'cart';
                                cartField.value = JSON.stringify(cart);
                                form.appendChild(cartField);

                                // Crear campo oculto para el total
                                var totalField = document.createElement('input');
                                totalField.type = 'hidden';
                                totalField.name = 'total_amount';
                                totalField.value = totalAmount;
                                form.appendChild(totalField);
                                
                                // Enviar el formulario
                                document.body.appendChild(form);
                                form.submit();
                                }
                            }).render("#paypal-buttons");
                    </script>
                </div>
                <div id="mercado-button" class="hidden">
                    <div id="wallet_container"></div>
                
                    
                    <script src="https://sdk.mercadopago.com/js/v2"></script>
                    <script>
                        const mp = new MercadoPago('{{ $publicKey }}', {
                            locale: 'es-MX'
                        });
                
                        // Renderizar el botón de pago
                        mp.bricks().create("wallet", "wallet_container", {
                            initialization: {
                                preferenceId: '{{ $preferenceId }}'
                            },
                        });
                    </script>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script>
            function togglePaymentOptions() {
                
                const creditCardFields = document.getElementById('credit-card-fields');
                const paypalButton = document.getElementById('paypal-button');
                const mercadoLButton = document.getElementById('mercado-button');

                
                const isCreditCardSelected = document.getElementById('bc1').checked;
                const isPaypalSelected = document.getElementById('bc2').checked;
                const isMercadoSelected = document.getElementById('bc3').checked;

                
                if (isCreditCardSelected) {
                    creditCardFields.classList.remove('hidden');
                    paypalButton.classList.add('hidden');
                    mercadoLButton.classList.add('hidden');
                } else if (isPaypalSelected) {
                    creditCardFields.classList.add('hidden');
                    paypalButton.classList.remove('hidden');
                    mercadoLButton.classList.add('hidden');
                } else if (isMercadoSelected) {
                    creditCardFields.classList.add('hidden');
                    paypalButton.classList.add('hidden');
                    mercadoLButton.classList.remove('hidden');
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                togglePaymentOptions();
            });

        </script>
    </body>
</html>