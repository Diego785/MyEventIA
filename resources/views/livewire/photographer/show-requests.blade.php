<div>
    <!-- component -->
    <div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">

        
        @if ($quantity_requests > 0)
        <div class="flex mt-28 bg-green-100 rounded-lg p-4 text-sm text-green-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium">Tienes nuevas solicitudes!</span> {{ $quantity_requests }} solicitudes
                pendientes.
            </div>
        </div>
    @else
        <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium">No tienes nuevas solicitudes!</span>
            </div>
        </div>
    @endif
        <div class="bg-gray-900 min-h-screen flex items-center justify-center">

            <div
                class="bg-gray-800 flex-1 flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-10 max-w-6xl sm:p-6 sm:my-2 sm:mx-4 sm:rounded-2xl">
                <!-- Navigation -->

                <!-- Content -->

                <div class="flex-1 px-2 sm:px-0">

                    <div
                        class=" grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                        @foreach ($requests as $request)
                            <div
                                class="relative group bg-gray-900 py-10 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-gray-900/80 hover:smooth-hover">
                                <img class="w-20 h-20 object-cover object-center rounded-full"
                                    src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                                    alt="cuisine" />
                                @if (Auth::user()->photographer != null)
                                    <h4 class="text-white text-2xl font-bold capitalize text-center">
                                        Organizador: {{ $request->organizer->user->name }}</h4>
                                @else
                                    <h4 class="text-white text-2xl font-bold capitalize text-center">
                                        Fotógrafo: {{ $request->photographer->user->name }}</h4>
                                @endif
                                <h4 class="text-white font-bold  text-md text-center">
                                    Evento: {{ $request->event->name }}</h4>
                                <h4 class="text-white/80 italic  text-md text-center">
                                    <span class="font-bold"> Descripción del evento:</span> {{ $request->event->description }}</h4>
                                    <h4 class="text-white/80 italic  text-md text-center">
                                        <span class="font-bold"> Descripción del trabajo:</span> {{ $request->description }}</h4>
                                        <h4 class="text-white/80 italic  text-md text-center">
                                            <span class="font-bold"> Dirección:</span> {{ $request->event->address }}</h4>
                                <h4 class="text-white/80  text-md text-center">
                                    {{ $request->event->date }}</h4>
                                <h4 class="text-white/80  text-md text-center">
                                    {{ $request->event->start_time }}-{{ $request->event->end_time }} </h4>
                                    <h4 class="text-white font-bold text-xl text-center">
                                        {{ $request->amount }} $</h4>
                                <p class="text-white/50 uppercase">{{ $request->status }}</p>

                                @if (Auth::user()->photographer != null && $request->status == 'Pendiente')
                                    <h1 class="text-xl mb-4 font-bold text-slate-500 text-center">¿Aceptar solicitud de trabajo?
                                    </h1>
                                    <div class="flex justify-between">

                                        <button wire:click="decline_request({{ $request->id }})"
                                            class="bg-red-500 px-4 py-2 rounded-md text-md text-white">Cancelar</button>
                                        <button wire:click="accept_request({{ $request->id }})"
                                            class="bg-green-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Aceptar</button>
                                    </div>
                                @endif


                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
