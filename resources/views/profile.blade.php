@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-8">

        <!-- HEADER -->
        <div class="mb-4">

            <h1 class="text-3xl font-bold text-gray-700">
                Rafi
            </h1>

        </div>

        <!-- BACK -->
        <a href="/"
            class="inline-flex items-center gap-2
              text-black
              hover:text-indigo-600
              transition mb-6">

            <span class="text-2xl">←</span>

            <span class="text-lg font-medium">
                Kembali Ke Halaman Utama
            </span>

        </a>

        <!-- TOP BANNER -->
        <div
            class="w-full rounded-[30px]
               bg-gradient-to-r from-indigo-200 to-indigo-300
               px-10 py-8 mb-10 relative overflow-hidden">

            <div class="relative z-10">

                <h2 class="text-2xl font-bold text-gray-700 mb-2">
                    Dashboard Profile
                </h2>

                <p class="text-gray-600 text-sm max-w-md">
                    Pantau kesehatan mentalmu secara berkala dan lihat perkembangan hasil tes sebelumnya.
                </p>

            </div>

            <!-- DECOR -->
            <div class="absolute -right-10 -top-10
                   w-40 h-40 bg-white/20 rounded-full">
            </div>

            <div class="absolute right-20 bottom-0
                   w-24 h-24 bg-white/20 rounded-full">
            </div>

        </div>

        <!-- MAIN CONTENT -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- LEFT -->
            <div>

                <!-- PROFILE -->
                <div class="flex items-center gap-4 mb-10">

                    <img src="/images/profile.jpg"
                        class="w-20 h-20 rounded-full
                            object-cover
                            ring-4 ring-white shadow-lg">

                    <div>

                        <h2 class="text-xl font-semibold">
                            Rafi
                        </h2>

                        <p class="text-gray-500 text-sm">
                            User Dashboard
                        </p>

                    </div>

                </div>

                <!-- HISTORY CARD -->
                <a href="/riwayat"
                    class="group border-2 border-gray-300
                      rounded-2xl p-5
                      hover:border-indigo-400
                      hover:shadow-lg
                      hover:-translate-y-1
                      transition-all duration-300
                      block">

                    <div class="flex items-center gap-4">

                        <!-- ICON -->
                        <div
                            class="w-10 h-10 rounded-full
                               border border-gray-400
                               flex items-center justify-center
                               text-lg
                               group-hover:border-indigo-500
                               group-hover:text-indigo-500
                               transition">

                            ↻

                        </div>

                        <!-- TEXT -->
                        <div>

                            <h3 class="font-semibold text-gray-800">
                                Riwayat Tes
                            </h3>

                            <p class="text-sm text-gray-400">
                                Lihat Riwayat Tes Sebelumnya
                            </p>

                        </div>

                    </div>

                </a>

            </div>

            <!-- RIGHT -->
            <div class="md:col-span-2">

                <div class="space-y-6">

                    <!-- USERNAME -->
                    <div>

                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Username
                        </label>

                        <input type="text" value="Rafi"
                            class="w-full rounded-xl bg-gray-100
                                  border border-transparent
                                  px-4 py-3
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-indigo-400
                                  transition">

                    </div>

                    <!-- GENDER -->
                    <div>

                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Gender
                        </label>

                        <select
                            class="w-full rounded-xl bg-gray-100
                               border border-transparent
                               px-4 py-3
                               focus:outline-none
                               focus:ring-2
                               focus:ring-indigo-400
                               transition">

                            <option>Laki-laki</option>
                            <option>Perempuan</option>

                        </select>

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Password
                        </label>

                        <input type="password" placeholder="Ubah Password"
                            class="w-full rounded-xl bg-gray-100
                                  border border-transparent
                                  px-4 py-3
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-indigo-400
                                  transition">

                    </div>

                    <!-- BUTTON -->
                    <div class="flex gap-4 pt-4">

                        <button
                            class="px-6 py-3 rounded-xl
                               bg-blue-500 text-white
                               font-medium
                               hover:bg-blue-600
                               hover:-translate-y-1
                               transition-all duration-300">

                            Edit

                        </button>

                        <button
                            class="px-6 py-3 rounded-xl
                               bg-red-500 text-white
                               font-medium
                               hover:bg-red-600
                               hover:-translate-y-1
                               transition-all duration-300">

                            Logout

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
