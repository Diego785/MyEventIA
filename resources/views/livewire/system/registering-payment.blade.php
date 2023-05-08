<div>
    <div class="grid grid-cols-5 gap-6 container py-8">
        <div class="col-span-3">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Suscripción: </span>#{{ $suscription }}
                </p>

            </div>
            

            {{-- <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class="grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envío</p>

                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p class="text-sm">Calle false 123</p>
                    </div>

                    <div>
                        <p class="text-lg font-semibold uppercase">Datos del contacto</p>
                        <p class="text-sm ">Persona que recibirá el producto</p>
                        <p class="text-sm ">Teléfono del contacto</p>
                    </div>
                </div>
            </div> --}}
            <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
                <p class="text-xl font-semibold mb-4">Resúmen</p>
                <table class="table-auto w-full text-center">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Precio</th>
                            <th>Tiempo</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td></td>
                            <td>{{ $amount }}$</td>
                            <td>{{ $time }}</td>
                            <td>{{ $amount }}$</td>
                        </tr>
                    </tbody>


                </table>

            </div>

        </div>




        <div class="col-span-2">
            <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
                <div class="flex justify-between items-center mb-4">
                    <img class="h-8"
                        src="https://w7.pngwing.com/pngs/27/252/png-transparent-mastercard-visa-credit-card-paypal-logo-mastercard-text-display-advertising-payment.png"
                        alt="">
                    <div class="text-gray-700">
                        <p class="text-sm font-semibold">
                            Subtotal: {{ $amount }}$
                        </p>
                        <p class="text-lg font-semibold uppercase">
                            Total: {{ $amount }}$
                        </p>
                        <div class="container">

                        </div>
                    </div>

                </div>
                <div wire:ignore id="paypal-button-container"></div>
            </div>

        </div>
    </div>

    @push('js')
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}"></script>

        <script>
            paypal.Buttons({

                // Sets up the transaction when a payment button is clicked

                createOrder: function(data, actions) {

                    return actions.order.create({

                        purchase_units: [{

                            amount: {

                                value: "{{$amount}}"

                            }

                        }]

                    });

                },

                // Finalize the transaction after payer approval

                onApprove: function(data, actions) {

                    return actions.order.capture().then(function(details) {
                        // console.log(details);
                        // alert('Transacción completada por ' + details.payer.name
                        //     .given_name);
                        Livewire.emit('saveSuscription');

                    });

                }

            }).render("#paypal-button-container");
        </script>
    @endpush

</div>
