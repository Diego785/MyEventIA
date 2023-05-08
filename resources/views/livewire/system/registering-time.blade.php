<div>

    <div class="content transform ease-in-out duration-500 ">
        <div class="h-auto text-center  bg-gradient-to-r from-pink-300 to-indigo-300">
            <div class="py-10 px-6 text-center tracking-wide">
                <!-- component -->
                <div class="min-h-screen flex flex-wrap items-center  justify-center  ">

                    <div
                        class="flex flex-col sm:flex-col lg:flex-row xl:flex-row md:flex-row justify-center items center  container   ">
                        <div
                            class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-white z-30">
                            <h1 class="text-gray-500 font-semibold text-xl ">Básico</h1>
                            <div class="text-center py-4 px-7">
                                <h1 class="text-gray-700 text-4xl font-black">$10.00</h1>
                                <p class="text-gray-500  mt-2">Mensual</p>

                            </div>
                            <div class="h-px bg-gray-200"></div>
                            <div class="text-center mt-3">
                                <p class="text-sm text-gray-400">
                                    Con el plan Básico, tendrás un mes con acceso a todas las funcionalidades como
                                    fotógrafo.
                                </p>
                            </div>
                            <a href="{{ route('registering.photographer', ['amount' => 10.0]) }}">

                                <button
                                    class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800">Comprar
                                    ahora</button>
                            </a>
                        </div>
                        <div
                            class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-purple-500 transform scale-1 sm:scale-1 md:scale-105 lg:scale-105 xl:scale-105 z-40  shadow-none sm:shadow-none md:shadow-xl lg:shadow-xl xl:shadow-xl">
                            <h1 class="text-purple-200 font-semibold text-xl ">Intermedio</h1>
                            <div class="text-center py-4 px-7">
                                <h1 class="text-white text-4xl font-black">$19.00</h1>
                                <p class="text-white text-opacity-50 mt-2">Semestral</p>

                            </div>
                            <div class="h-px bg-purple-400"></div>
                            <div class="text-center mt-3">
                                <p class="text-sm text-white">
                                    Con el plan Intermedio, tendrás 6 meses con acceso a todas las funcionalidades como
                                    fotógrafo.
                                </p>
                            </div>
                            <a href="{{ route('registering.photographer', ['amount' => 19.0]) }}">

                                <button
                                    class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-purple-400 hover:shadow-xl duration-200 hover:bg-purple-800">Comprar
                                    ahora

                                </button>


                            </a>
                        </div>
                        <div
                            class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-white z-30">
                            <h1 class="text-gray-500 font-semibold text-xl ">Profesional</h1>
                            <div class="text-center py-4 px-7">
                                <h1 class="text-gray-700 text-4xl font-black">$40.00</h1>
                                <p class="text-gray-500  mt-2">Anual</p>

                            </div>
                            <div class="h-px bg-gray-200"></div>
                            <div class="text-center mt-3">
                                <p class="text-sm text-gray-400">
                                    Con el plan Profesional, tendrás 1 año con acceso a todas las funcionalidades como
                                    fotógrafo.

                                </p>
                            </div>

                            <a href="{{ route('registering.photographer', ['amount' => 40.0]) }}">

                                <button
                                    class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800">Comprar
                                    ahora</button>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
