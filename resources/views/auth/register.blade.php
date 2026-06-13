@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex">

        <!-- LEFT IMAGE -->
        <div class="hidden lg:block lg:w-1/2">
            <img src="\images\login-placeholder.jpg" class="w-full h-full object-cover" alt="Register">
        </div>

        <!-- RIGHT FORM -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white px-8 py-10">

            <div class="w-full max-w-2xl">

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

                                    Registrasi Gagal

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


                </a>

                <!-- LOGO -->
                <div class="flex items-center gap-3 mb-6">

                    <img src="\images\logo.png" class="w-11 h-11" alt="Logo">

                    <h1 class="text-2xl font-bold text-indigo-600">
                        Prima Solutions
                    </h1>

                </div>

                <!-- TITLE -->
                <h2 class="text-4xl font-bold text-gray-900 mb-2">
                    Buat Akun Baru
                </h2>

                <p class="text-gray-500 mb-8">
                    Lengkapi data diri untuk mulai melakukan tes kesehatan mental
                </p>

                <!-- FORM -->
                <form action="/register" method="POST" class="space-y-6">

                    @csrf

                    <!-- NAMA -->
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Nama Lengkap
                        </label>

                        <input type="text" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap Anda"
                            class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                    </div>

                    <!-- USERNAME -->
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Username
                        </label>

                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Contoh: rafi123"
                            class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                    </div>

                    <!-- GRID -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- GENDER -->
                        <div>

                            <label class="block mb-2 font-medium text-gray-700">
                                Jenis Kelamin
                            </label>

                            <select name="gender"
                                class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                                <option value="">
                                    Pilih jenis kelamin
                                </option>

                                <option value="Laki-laki">
                                    Laki-laki
                                </option>

                                <option value="Perempuan">
                                    Perempuan
                                </option>

                            </select>

                        </div>

                        <!-- PEKERJAAN -->
                        <div>

                            <label class="block mb-2 font-medium text-gray-700">
                                Pekerjaan
                            </label>

                            <input type="text" name="job" value="{{ old('job') }}" placeholder="Contoh: Mahasiswa"
                                class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                        </div>

                    </div>

                    <!-- GRID -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- KOTA -->
                        <div>

                            <label class="block mb-2 font-medium text-gray-700">
                                Asal Kota
                            </label>

                            <input type="text" name="city" value="{{ old('city') }}" placeholder="Contoh: Jakarta"
                                class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                        </div>

                        <!-- HP -->
                        <div>

                            <label class="block mb-2 font-medium text-gray-700">
                                Nomor HP
                            </label>

                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="08xx-xxxx-xxxx"
                                class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Email
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                            class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Password
                        </label>

                        <input type="password" name="password" placeholder="Minimal 8 karakter"
                            class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                    </div>

                    <!-- KONFIRMASI -->
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            Konfirmasi Password
                        </label>

                        <input type="password" name="password_confirmation" placeholder="Ulangi password Anda"
                            class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-400">

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold text-lg shadow-lg hover:opacity-90 transition">

                        Daftar Sekarang

                    </button>

                    <!-- LOGIN -->
                    <p class="text-center text-gray-500">

                        Sudah punya akun?

                        <a href="/login" class="text-indigo-600 font-semibold">
                            Login
                        </a>

                    </p>

                </form>

            </div>

        </div>

    </div>
@endsection
