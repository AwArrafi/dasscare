@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex">

        <!-- LEFT IMAGE -->
        <div class="hidden lg:block lg:w-1/2">
            <img src="/images/login-placeholder.jpg" class="w-full h-full object-cover" alt="Forgot Password">
        </div>

        <!-- RIGHT FORM -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white px-8 py-10">

            <div class="w-full max-w-xl">

                <!-- LOGO -->
                <div class="flex items-center gap-3 mb-6">

                    <img src="/images/logo.png" class="w-11 h-11" alt="Logo">

                    <h1 class="text-2xl font-bold text-indigo-600">
                        DASSCare
                    </h1>

                </div>

                <!-- TITLE -->
                <h2 class="text-4xl font-bold text-gray-900 mb-2">
                    Lupa Password
                </h2>

                <p class="text-gray-500 mb-8">
                    Masukkan email yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang password Anda.
                </p>

                <!-- SUCCESS -->
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-green-50 border border-green-200 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- ERROR -->
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- FORM -->
                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">

                    @csrf

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Email
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                            class="w-full rounded-2xl border border-gray-200 px-5 py-4
                                   focus:outline-none focus:ring-2 focus:ring-indigo-400">

                    </div>

                    <button type="submit"
                        class="w-full py-4 rounded-2xl
                               bg-gradient-to-r from-indigo-500 to-purple-600
                               text-white font-semibold text-lg
                               shadow-lg hover:opacity-90 transition">

                        Kirim Link Reset Password

                    </button>

                    <p class="text-center text-gray-500">

                        Ingat password?

                        <a href="/login" class="text-indigo-600 font-semibold">

                            Kembali ke Login

                        </a>

                    </p>

                </form>

            </div>

        </div>

    </div>
@endsection
