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

                    <h2 class="text-3xl font-bold text-gray-800 mb-2">
                        Senang bertemu anda lagi
                    </h2>

                    <p class="text-gray-400">
                        Login untuk melanjutkan
                    </p>

                </div>

                <!-- FORM -->
                <form action="/login" method="POST" class="space-y-5">

                    @csrf

                    <!-- USERNAME -->
                    <div>

                        <label class="text-sm text-gray-500">
                            Username
                        </label>

                        <input type="text" name="email" placeholder="Masukkan Username"
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

                            <input type="password" name="password" placeholder="Masukkan Kata Sandi"
                                class="w-full px-4 py-3
                                      rounded-xl
                                      bg-gray-100
                                      border border-transparent
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-indigo-400
                                      transition">

                            <!-- EYE ICON -->
                            <span class="absolute right-4 top-3.5 text-gray-400">

                                👁

                            </span>

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
@endsection
