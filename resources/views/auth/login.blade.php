@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-white overflow-hidden">

        <!-- LEFT IMAGE -->
        <div class="hidden lg:block lg:w-2/3">

            <img src="/images/login-placeholder.jpg" alt="Login Image" class="w-full h-full object-cover">

        </div>

        <!-- RIGHT SIDE -->
        <div class="w-full lg:w-1/3 flex items-center justify-center px-10">

            <div class="w-full max-w-sm">

                <!-- LOGO -->
                <div class="flex items-center gap-3 mb-10">

                    <img src="/images/logo.png" class="w-14 h-14" alt="Logo">

                    <h1 class="text-2xl font-semibold text-indigo-600">
                        Prima Solutions
                    </h1>

                </div>

                <!-- TITLE -->
                <div class="mb-8">

                    <h2 class="text-4xl font-bold text-gray-900 mb-2">
                        Senang bertemu anda lagi
                    </h2>

                    <p class="text-gray-500 mb-6">
                        Login untuk melanjutkan
                    </p>

                    @if (session('success'))
                        <div class="mb-6 rounded-2xl bg-green-50 border border-green-200 text-green-700 px-5 py-4 text-sm">

                            {{ session('success') }}

                        </div>
                    @endif

                    @if ($errors->any())
                        <div id="toastError"
                            class="fixed top-6 right-6
        max-w-sm
        bg-white
        border-l-4 border-red-500
        text-gray-800
        px-5 py-4
        rounded-2xl
        shadow-2xl
        z-50">

                            <div class="flex items-start gap-3">

                                <div class="text-red-500 text-xl">

                                </div>

                                <div>

                                    <p class="font-semibold text-red-600">

                                        Login Gagal

                                    </p>

                                    <p class="text-sm text-gray-600">

                                        {{ $errors->first() }}

                                    </p>

                                </div>

                            </div>

                        </div>

                        <script>
                            setTimeout(() => {

                                const toast =
                                    document.getElementById('toastError');

                                if (toast) {

                                    toast.style.transition = '0.4s';
                                    toast.style.opacity = '0';

                                    setTimeout(() => {

                                        toast.remove();

                                    }, 400);

                                }

                            }, 3000);
                        </script>
                    @endif

                </div>

                <!-- FORM -->
                <form action="/login" method="POST" class="space-y-5">

                    @csrf

                    <!-- USERNAME -->
                    <div>

                        <labl class="text-sm text-gray-500">
                            Username
                        </labl>

                        <input type="text" name="username" placeholder="Masukkan Username"
                            class="w-full mt-2 px-4 py-3
                                  rounded-xl
                                  bg-gray-100
                                  border border-transparent
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-indigo-400
                                  transition">

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="text-sm text-gray-500">
                            Password
                        </label>

                        <div class="relative mt-2">

                            <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi"
                                class="w-full px-4 py-3
                  rounded-xl
                  bg-gray-100
                  border border-transparent
                  focus:outline-none
                  focus:ring-2
                  focus:ring-indigo-400
                  transition">

                            <!-- EYE BUTTON -->
                            <button type="button" id="togglePassword"
                                class="absolute right-4 top-3.5 text-gray-400 hover:text-indigo-500 transition">

                                <!-- EYE OPEN -->
                                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                                                                             c4.477 0 8.268 2.943 9.542 7
                                                                             -1.274 4.057-5.065 7-9.542 7
                                                                             -4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                            </button>

                        </div>

                    </div>

                    <!-- OPTIONS -->
                    <div class="flex items-center justify-between text-sm">

                        <label class="flex items-center gap-2 text-gray-500">

                            <input type="checkbox" class="rounded border-gray-300 text-indigo-500">

                            Ingat Saya

                        </label>

                        <a href="#" class="text-indigo-500 hover:text-indigo-600 transition">

                            Lupa Password?

                        </a>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="w-full py-3 rounded-xl
                               bg-indigo-600 text-white
                               font-medium
                               hover:bg-indigo-700
                               hover:-translate-y-1
                               transition-all duration-300">

                        Login

                    </button>

                </form>

                <!-- GUEST ACCESS -->
                <div class="mt-4 text-center">

                    <a href="/" class="text-gray-400 text-sm
        hover:text-indigo-600
        transition">

                        Lanjutkan tanpa akun

                    </a>

                </div>

                <!-- REGISTER -->
                <div class="mt-8 text-center text-sm text-gray-500">

                    Belum memiliki akun?

                    <a href="/register" class="text-indigo-600 font-medium hover:underline">

                        Daftar Sekarang!

                    </a>

                </div>

            </div>

        </div>

    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function() {

            const type =
                passwordInput.getAttribute('type') === 'password' ?
                'text' :
                'password';

            passwordInput.setAttribute('type', type);

            // TOGGLE STRIKE
            if (type === 'text') {

                this.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19
                             c-4.478 0-8.268-2.943-9.543-7
                             a9.97 9.97 0 012.223-3.592M6.228 6.228
                             A9.956 9.956 0 0112 5
                             c4.478 0 8.268 2.943 9.543 7
                             a9.97 9.97 0 01-4.293 5.774M15 12
                             a3 3 0 11-6 0 3 3 0 016 0zm6 6L3 3"/>
                </svg>
            `;

            } else {

                this.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5
                             c4.477 0 8.268 2.943 9.542 7
                             -1.274 4.057-5.065 7-9.542 7
                             -4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            `;

            }

        });
    </script>
@endsection
