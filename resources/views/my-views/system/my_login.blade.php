@extends('layouts.my-layouts.my_empty_layout')

@section('title')
    Login
@endsection

@section('content')
    <!-- component -->
    <div class="bg-gradient-to-r from-pink-300 to-indigo-300 h-screen overflow-hidden flex items-center justify-center">
        <div class="bg-white lg:w-5/12 md:6/12 w-10/12 shadow-3xl">
            <div class="bg-gray-800 absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full p-4 md:p-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                    <path
                        d="M20 5h-2.586l-2.707-2.707A.996.996 0 0 0 14 2h-4a.996.996 0 0 0-.707.293L6.586 5H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2zm-8 12c-2.71 0-5-2.29-5-5s2.29-5 5-5 5 2.29 5 5-2.29 5-5 5z">
                    </path>
                </svg>
            </div>
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form class="p-12 md:p-24" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex items-center text-lg mb-6 md:mb-8">
                    <svg class="absolute ml-3" width="24" viewBox="0 0 24 24">
                        <path
                            d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z" />
                    </svg>
                    <input class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Username"
                        id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                </div>
                <div class="flex items-center text-lg mb-6 md:mb-8">
                    <svg class="absolute ml-3" viewBox="0 0 24 24" width="24">
                        <path
                            d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z" />
                    </svg>
                    <input class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Password"
                        id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>
                <button
                    class="bg-gradient-to-b from-gray-700 to-gray-900 font-medium p-2 md:p-4 text-white uppercase w-full">
                    {{ __('Log in') }}
                </button>
                
            </form>
        </div>
    </div>
@endsection
