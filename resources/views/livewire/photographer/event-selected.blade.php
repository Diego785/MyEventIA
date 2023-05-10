<div>
    <div class="content ml-12 pb-4 transform ease-in-out duration-500 pt-20 px-2 md:px-5">
        <div class="h-full mb-40  border rounded-lg  bg-gradient-to-r from-pink-300 to-indigo-300">


            <div class="w-full bg-white rounded-xl p-4 shadow-xl mt-4">
                <div class="flex flex-col font-bold text-xl justify-center items-center">
                    {{ $event->name }}

                </div>
            </div>

            <div class="grid grid-cols-12 gap-0">
                <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xxl:col-span-8 px-6 py-6">
                    <div class="grid grid-cols-12 gap-6">

                        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-6 xxl:col-span-6">

                            <!-- Start Nav Bar -->
                            <nav x-data="{ active: 1 }" class="bg-white p-4 rounded-xl shadow-xl flex items-center">

                                @if ($photosEvent)
                                    <a wire:click="$set('photosEvent', true)"
                                        class=" cursor-pointer flex space-x-2 items-center mr-4 text-indigo-600 border-b-4 border-indigo-600"
                                        x-on:click.prevent="active = 2">
                                        <i class="fas fa-clipboard-list fa-lg"></i>
                                        <p class="font-semibold text-sm">Fotos del Evento</p>
                                    </a>
                                    <a wire:click="$set('photosEvent', false)"
                                        class="cursor-pointer flex space-x-2 items-center mr-4 text-gray-400"
                                        x-bind:class="{ 'text-indigo-600 border-b-4 border-indigo-600': active === 3 }"
                                        x-on:click.prevent="active = 3">
                                        <i class="fas fa-file-medical-alt fa-lg"></i>
                                        <p class="font-semibold text-sm">Solicitudes de Compra</p>
                                    </a>
                                @else
                                    <a wire:click="$set('photosEvent', true)"
                                        class="cursor-pointer flex space-x-2 items-center mr-4 text-gray-400"
                                        x-on:click.prevent="active = 2">
                                        <i class="fas fa-clipboard-list fa-lg"></i>
                                        <p class="font-semibold text-sm">Fotos del Evento</p>
                                    </a>
                                    <a wire:click="$set('photosEvent', false)"
                                        class="cursor-pointer flex space-x-2 items-center mr-4 text-indigo-600 border-b-4 border-indigo-600"
                                        x-bind:class="{ 'text-indigo-600 border-b-4 border-indigo-600': active === 3 }"
                                        x-on:click.prevent="active = 3">
                                        <i class="fas fa-file-medical-alt fa-lg"></i>
                                        <p class="font-semibold text-sm">Solicitudes de Compra</p>
                                    </a>
                                @endif
                            </nav>
                            <!-- End Nav Bar -->
            
                            <div class="m-1 p-2 rounded-xl">

                                @if ($image_preview)
                                    <img src="{{ $image_preview }}" id="main" alt="IMAGE"
                                        style="object-fit: contain; width:300px; height:300px; border-radius: 0.75rem; ">
                                @else
                                    <img id="main" alt="IMAGE"
                                        src="https://img.freepik.com/premium-vector/cute-photographer-cartoon-illustration-people-profession-icon-concept_138676-1899.jpg"
                                        style="object-fit: contain; width:300px; height:300px; border-radius: 0.75rem; " />
                                @endif

                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-6 xxl:col-span-6">
                            <!-- Start Card List -->
                            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between">
                                <div class="flex space-x-6 items-center">
                                    <div class="relative inline-flex">
                                        <i
                                            class="fa-lg fas fa-sort-down w-2 h-2 absolute top-0 right-0 mx-5 my-2 pointer-events-none text-white"></i>
                                        <select wire:model="category"
                                            class="border-white rounded-xl text-white  pl-5 pr-10 bg-pink-600 hover:bg-pink-700 focus:outline-none appearance-none">
                                            <option value="public">Públicas</option>
                                            <option value="private">Privadas</option>
                                        </select>
                                    </div>
                                    <div class="flex space-x-2 items-center">
                                        <p class="font-semibold">55 fotos</p>

                                    </div>
                                </div>
                                <p class="font-semibold text-gray-400">08:02 PM</p>
                            </div>
                            <!-- End Card List -->
                            <!-- Start Card List -->
                            <div class="w-full bg-white rounded-xl p-4 shadow-xl mt-4">
                                <div class="flex flex-col justify-center items-center">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/upload-social-media-post-4291893-3569926.png"
                                        class="w-auto h-40 rounded-lg" />
                                    {{-- <p class="font-semibold text-xl mt-1">Subir Fotos</p> --}}
                                    <p class="font-semibold text-sm text-gray-400 text-center">Sube las fotos del
                                        evento
                                        aquí</p>

                                    {{-- <form method="POST" action="{{ url('upload-photo') }}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="file" name="image" class="form-control-file hidden"
                                                id="file-btn" />

                                            <a for="file-btn" class="mt-4">
                                                <label for="file-btn"
                                                    class="px-4 py-2 rounded text-primary hover:bg-primary  transition-all outline-none bg-black border-black text-white hover:text-black hover:bg-white font-bold">
                                                    Cargar Foto
                                                </label>
                                            </a>


                                            <button
                                                class="mx-5 px-4 py-2 rounded text-primary hover:bg-primary  transition-all outline-none bg-black border-black text-white hover:text-black hover:bg-white font-bold"
                                                type="submit">Subir Foto</button>
                                        </form> --}}
                                    <form wire:submit.prevent="submit">
                                        <input type="file" wire:model="image" class="form-control-file hidden"
                                            id="file-btn" />

                                        <a for="file-btn" class="mt-4">
                                            <label for="file-btn"
                                                class="px-4 py-2 rounded text-primary hover:bg-primary  transition-all outline-none bg-black border-black text-white hover:text-black hover:bg-white font-bold">
                                                Cargar Foto
                                            </label>
                                        </a>

                                        @error('image')
                                            <span class="error">{{ $message }}</span>
                                        @enderror


                                        @if ($image_preview)
                                            <button
                                                class="mx-5 px-4 py-2 rounded text-primary hover:bg-primary  transition-all outline-none bg-black border-black text-white hover:text-black hover:bg-white font-bold"
                                                type="submit">Subir Foto</button>
                                        @else
                                            <button disabled="true"
                                                class="mx-5 px-4 py-2 rounded text-primary  transition-all outline-none bg-gray-500 border-black text-white hover:text-black hover:bg-gray-300 font-bold"
                                                type="submit">Subir Foto</button>
                                        @endif

                                    </form>


                                </div>
                            </div>
                            <!-- End Card List -->
                        </div>

                        {{-- <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5">
                            <!-- Start Card List -->
                            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                                <div class="flex space-x-6 items-center">
                                    <img src="https://www.nicepng.com/png/detail/395-3955418_paypal-icon-png.png"
                                        class="w-auto h-12" />
                                    <div>
                                        <p class="font-semibold text-base">PayPal</p>
                                        <p class="font-semibold text-xs text-gray-400">Payment Collected</p>
                                    </div>
                                </div>
    
                                <div class="flex space-x-2 items-center">
                                    <div class="bg-yellow-200 rounded-md p-2 flex items-center">
                                        <p class="text-yellow-600 font-semibold text-xs">-C4,678</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card List -->
    
                        </div> --}}
                        {{-- <div class="grid grid-cols-12 gap-4 w-atuo">
    
                            <!-- Start Card List -->
                            @foreach ($imgs as $img)
                                <div class="bg-white rounded-xl p-4 shadow-xl mt-4">
                                    <div class="flex flex-col justify-center items-center">
                                        <img src="https://my-event-dhv.s3.amazonaws.com/{{ $img->path }}"
                                            class="w-full h-40 rounded-lg" />
                                    </div>
    
                                </div>
                            @endforeach
                            <!-- End Card List -->
                        </div> --}}


                    </div>

                </div>

                <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-4 xxl:col-span-4 px-6 py-6">
                    <!-- Start profile Card -->
                    <div class="bg-white rounded-xl p-4 shadow-xl">
                        <div class="flex flex-col justify-center items-center">
                            <div class="w-32 h-32 rounded-full bg-gray-300 border-2 border-white mt-2">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVxhAxJ4D7MOeTTj6kR9PBeZonW5HM7giKjTbEmR-HMBwf3G1VqGnlwpO1kWrdyIZu8_U&usqp=CAU"
                                    class="rounded-full w-auto" />
                            </div>
                            <p class="font-semibold text-xl mt-1">Safwan</p>
                            <p class="font-semibold text-base text-gray-400">No Future</p>

                            <div class="relative  p-4 rounded-lg shadow-xl w-full bg-cover bg-center h-32 mt-4"
                                style="background-image: url('https://images.pexels.com/photos/1072179/pexels-photo-1072179.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');">
                                <div class="absolute inset-0 bg-gray-800 bg-opacity-50"></div>
                                <div
                                    class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                                    <div>
                                        <h3 class="text-center text-white text-lg">
                                            Total Income
                                        </h3>
                                        <h3 class="text-center text-white text-3xl mt-2 font-bold">
                                            RM 2000.00
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End profile Card -->
                    {{-- <!-- Start Card List -->
                    <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                        <div class="flex space-x-6 items-center">
                            <img src="https://i.pinimg.com/originals/25/0c/a0/250ca0295215879bd0d53e3a58fa1289.png"
                                class="w-auto h-24 rounded-lg" />
                            <div>
                                <p class="font-semibold text-base">Connect Device</p>
                                <p class="font-semibold text-sm text-gray-400">Autorize device for transfer</p>
                            </div>
                        </div>
    
                        <div class="flex space-x-2 items-center">
                            <div class="bg-gray-300 rounded-md p-2 flex items-center">
                                <i class="fas fa-chevron-right fa-sm text-black"></i>
                            </div>
                        </div>
                    </div>
                    <!-- End Card List --> --}}


                </div>
            </div>
            <div class="place-items-center lg:mx-30 md:mx-30 sm:mx-20 xs:mx-10">
                <div class="card rounded-xl py-5 bg-gray-100 px-16 shadow-2xl backdrop-blur-md max-sm:px-8">
                    <div class="mb-3 flex flex-col items-center">
                        <div
                            class="mx-auto grid max-w-3xl grid-cols-1 gap-6  sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4">
                            @foreach ($imgs as $img)
                                <article
                                    class="rounded-xl text-center bg-white p-1 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                                    <div href=""
                                        class="text-center bg-center self-center items-center justify-center content-center">
                                        <div class="m-1 p-2 rounded-xl">
                                            <img src="https://my-event-dhv.s3.amazonaws.com/{{ $img->path }}"
                                                {{-- wire:click="$set('image_preview', this.src)" --}} onclick="change(this.src)"
                                                style="object-fit: cover; width:150px; height:150px; border-radius: 0.75rem; " />

                                        </div>


                                    </div>
                                </article>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            const change = src => {
                document.getElementById('main').src = src
            }
        </script>
        <script>
            Livewire.on('waitingIA',
                personFinded => {
                    Swal.fire({
                        title: 'Buscando Coincidencias!',
                        html: 'Esto tomará <b></b> millisegundos :3.',
                        timer: 6000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                    })
                });
        </script>
        <script>
            Livewire.on('resultSearch', personFinded => {
                Swal.fire({
                    title: '¡Se encontraron coincidencias!',
                    text: personFinded + " aparece en la foto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Enviar Notificación!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Cancelar.',
                            '¡No se ejecutó la notificación!'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
