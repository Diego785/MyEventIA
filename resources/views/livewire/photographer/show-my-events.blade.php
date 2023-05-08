<div>
    <!-- component -->
    <div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">

        @if (Auth::user()->organizer != null)
            <button wire:click="request_open()"
                class="absolute group rounded-2xl h-12 w-48 bg-green-500 font-bold text-lg text-white relative overflow-hidden">
                Crear Evento!
                <div
                    class="absolute duration-300 inset-0 w-full h-full transition-all scale-0 group-hover:scale-100 group-hover:bg-white/30 rounded-2xl">
                </div>
            </button>
        @endif

        <div class="bg-gray-900 min-h-screen flex items-center justify-center">
            <div
                class="bg-gray-800 flex-1 flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-10 max-w-6xl sm:p-6 sm:my-2 sm:mx-4 sm:rounded-2xl">
                <!-- Navigation -->

                <!-- Content -->
                <div class="flex-1 px-2 sm:px-0">

                    <div class="mb-10 sm:mb-0 mt-10 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                        @foreach ($events as $event)
                            <div
                                class="relative group bg-gray-900 py-10 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-gray-900/80 hover:smooth-hover">
                                <img class="w-20 h-20 object-cover object-center rounded-full"
                                    src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                                    alt="cuisine" />
                                <h4 class="text-white text-2xl font-bold capitalize text-center">
                                    {{ $event->name }}</h4>
                                <p class="text-white/50">3 fotógrafos</p>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear Evento:
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre del Evento" />
                <x-jet-input wire:model="name" type="text" class="w-full" />
                <x-jet-input-error for="name" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripción" />
                <textarea wire:model='description'
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                    rows="2" placeholder="Describa brevemente el evento"></textarea>
            </div>
            <div class="mb-4">
                <x-jet-label value="Dirección" />
                <textarea wire:model='address'
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                    rows="2" placeholder="Describa brevemente la dirección"></textarea>
            </div>

            <div class="mb-4">
                <x-jet-label value="Fecha" />
                <x-jet-input wire:model="date" type="date" class="w-full" />
                <x-jet-input-error for="date" />

            </div>

            <div class="mb-4">
                <x-jet-label value="Hora de Inicio" />
                <x-jet-input wire:model='start_time' type="time" class=" w-full" />
                <x-jet-input-error for="start_time" />

            </div>

            <div class="mb-4">
                <x-jet-label value="Hora Final" />
                <x-jet-input wire:model='end_time' type="time" class=" w-full" />
                <x-jet-input-error for="end_time" />

            </div>


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save_event()" wire:loading.attr="disabled" wire:target=""
                class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
