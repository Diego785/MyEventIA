<div>
    <!-- component -->
    <div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">

        <div class="bg-gray-900 min-h-screen flex items-center justify-center">
            <div
                class="bg-gray-800 flex-1 flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-10 max-w-6xl sm:p-6 sm:my-2 sm:mx-4 sm:rounded-2xl">
                <!-- Navigation -->

                <!-- Content -->
                <div class="flex-1 px-2 sm:px-0">

                    <div class="mb-10 sm:mb-0 mt-10 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                        @foreach ($photographers as $photographer)
                            <a wire:click="request_open({{ $photographer->id }})">
                                <div
                                    class="relative group bg-gray-900 py-10 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-gray-900/80 hover:smooth-hover">
                                    <img class="w-20 h-20 object-cover object-center rounded-full"
                                        src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                                        alt="cuisine" />
                                    <h4 class="text-white text-2xl font-bold capitalize text-center">
                                        {{ $photographer->user->name }}</h4>
                                    <p class="text-white/50">55 fotos</p>
                                </div>
                            </a>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Solicitud al Fotógrafo:
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Organizador" />
                <x-jet-input wire:model="organizer" readonly type="text" class="w-full" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Fotógrafo" />
                <x-jet-input wire:model="photographer" readonly type="text" class="w-full" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Estado de la Solicitud" />
                <x-jet-input wire:model="status" readonly type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Costo" />
                <x-jet-input wire:model='amount' type="number" min="0" step="5" class=" w-full" />
                <x-jet-input-error for='amount'  />
            
            </div>

            <div class="mb-4">
                <x-jet-label value="Descripción del Trabajo" />
                <textarea wire:model='description'
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                    rows="2" placeholder="Describa brevemente los requerimientos"></textarea>
            </div>


             <div class="mb-4 w-full" wire:ignore>
                <x-jet-label value='Evento' />
                <select wire:model='event' style='width: 100%'>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }} </option>
                    @endforeach
                </select>
            </div> 
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save_request()" wire:loading.attr="disabled" wire:target="" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
