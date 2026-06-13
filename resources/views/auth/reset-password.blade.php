@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex">

        <!-- LEFT IMAGE -->
        <div class="hidden lg:block lg:w-1/2">
            <img src="/images/login-placeholder.jpg" class="w-full h-full object-cover" alt="Reset Password">
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
                    Reset Password
                </h2>

                <p class="text-gray-500 mb-8">
                    Masukkan password baru untuk akun Anda.
                </p>

                <!-- ERROR -->
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- FORM -->
                <form action="{{ route('password.update') }}" method="POST" class="space-y-6">

                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Email
                        </label>

                        <input type="email" name="email" value="{{ request('email') }}" readonly
                            class="w-full rounded-2xl border border-gray-200
                                   bg-gray-100 px-5 py-4">

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Password Baru
                        </label>

                        <input type="password" name="password" placeholder="Minimal 8 karakter"
                            class="w-full rounded-2xl border border-gray-200 px-5 py-4
                                   focus:outline-none focus:ring-2 focus:ring-indigo-400">

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Konfirmasi Password
                        </label>

                        <input type="password" name="password_confirmation" placeholder="Ulangi password baru"
                            class="w-full rounded-2xl border border-gray-200 px-5 py-4
                                   focus:outline-none focus:ring-2 focus:ring-indigo-400">

                    </div>

                    <button type="submit"
                        class="w-full py-4 rounded-2xl
                               bg-gradient-to-r from-indigo-500 to-purple-600
                               text-white font-semibold text-lg
                               shadow-lg hover:opacity-90 transition">

                        Simpan Password Baru

                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
