<div>

    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-r from-pink-300 to-indigo-300">
        <div
            class="
          flex flex-col
          bg-white
          shadow-md
          px-4
          sm:px-6
          md:px-8
          lg:px-10
          py-8
          rounded-3xl
          w-50
          max-w-md
        ">
            <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
                Registrate
            </div>
            <div class="mt-4 self-center text-xl sm:text-sm text-gray-800">
                Ingresa tus credenciales como Organizador.
            </div>

            <div class="mt-10">
                <form action="#">
                    <div class="flex flex-col mb-5">
                        <label for="name" class="mb-1 text-xs tracking-wide text-gray-600">Nombre:</label>
                        <div class="relative">
                            <div
                                class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
                                <i class="fas fa-user text-blue-500"></i>
                            </div>

                            <input wire:model="name" id="name" type="name" name="name"
                                class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                                placeholder="Ingresa tu username" />

                        </div>
                    </div>
                    <x-jet-input-error for="name" class="mb-1 " />


                    <div class="flex flex-col mb-5">
                        <label for="telephone" class="mb-1 text-xs tracking-wide text-gray-600">Teléfono:</label>
                        <div class="relative">
                            <div
                                class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
                                <i class="fa-solid fa-phone text-blue-500"></i>
                            </div>

                            <input wire:model="telephone" id="telephone" type="telephone" name="telephone"
                                class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                                placeholder="Ingresa tu número de celular" />


                        </div>
                    </div>
                    <x-jet-input-error for="telephone" class="mb-1 " />


                    <div class="flex flex-col mb-5">
                        <label for="carnet" class="mb-1 text-xs tracking-wide text-gray-600">Carnet:</label>
                        <div class="relative">
                            <div
                                class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
                                <i class="fa-solid fa-address-card text-blue-500"></i>
                            </div>

                            <input wire:model="carnet" id="carnet" name="carnet"
                                class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                                placeholder="Ingresa tu carnet de identidad" />

                        </div>
                    </div>
                    <x-jet-input-error for="carnet" class="mb-1 " />


                    <div class="flex flex-col mb-5">
                        <label for="email" class="mb-1 text-xs tracking-wide text-gray-600">Email:</label>
                        <div class="relative">
                            <div
                                class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
                                <i class="fas fa-at text-blue-500"></i>
                            </div>

                            <input wire:model="email" id="email" name="email" type="email"
                                class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                                placeholder="Ingresa tu email" />

                        </div>
                    </div>
                    <x-jet-input-error for="email" class="mb-1 " />

                    <div class="flex flex-col mb-6">
                        <label for="password"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
                        <div class="relative">
                            <div
                                class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  ">
                                <span>
                                    <i class="fas fa-lock text-blue-500"></i>
                                </span>
                            </div>

                            <input wire:model="password" id="password" type="password" name="password"
                                class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                                placeholder="Ingresa tu password" />

                        </div>
                    </div>
                    <x-jet-input-error for="password" class="mb-1 " />

                    <div class="flex w-full">
                        <a wire:click="register()" type="submit"
                            class="
                  flex
                  mt-2
                  items-center
                  justify-center
                  focus:outline-none
                  text-white text-sm
                  sm:text-base
                  bg-blue-500
                  hover:bg-blue-600
                  rounded-2xl
                  py-2
                  w-full
                  transition
                  duration-150
                  ease-in
                ">
                            <span class="mr-2 uppercase">Sign Up</span>
                            <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-center items-center mt-6">
            <a href="#" target="_blank"
                class="
            inline-flex
            items-center
            text-gray-700
            font-medium
            text-xs text-center
          ">
                <span class="ml-2">¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="text-xs ml-2 text-blue-500 font-semibold">¡Ingresa
                        aquí!</a></span>
            </a>
        </div>
    </div>
</div>
