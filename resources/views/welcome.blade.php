@extends('layouts.app')
@section('content')
    <!-- HERO SECTION -->
    <section class="flex items-center justify-between px-14 pt-0 pb-10">

        <div class="max-wxl">
            <h1 class="text-3xl font-semibold leading-tight">
                Selamat Datang di Platform Screening Awal <br>
                Kesehatan Mental Berbasis
                <span class="text-indigo-600 font-bold whitespace-nowrap">
                    DASS - 21
                </span>
            </h1>

            <h2 class="mt-6 text-xl text-indigo-600 font-semibold">
                Apa itu DASS-21?
            </h2>

            <p class="mt-3 text-gray-600 text-sm leading-relaxed max-w-xl">
                DASS-21 adalah alat asesmen mandiri yang dirancang untuk mengukur tiga aspek utama kondisi psikologis
                seseorang,
                yaitu depresi, kecemasan, dan stres. Instrumen ini terdiri dari 21 pernyataan yang membantu pengguna
                mengenali
                keadaan emosional yang sedang dialami.
            </p>

            <a href="/petunjuk"
                class="inline-flex items-center gap-2 mt-6 px-6 py-3 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700 transition">
                Lakukan tes kesehatan mental →
            </a>

            <p class="text-xs text-gray-400 mt-4">
                Catatan: Hasil dari kuesioner ini bukanlah diagnosis medis, melainkan indikasi awal.
            </p>
        </div>

        <div>
            <img src="/images/hero.png" class="w-[350px]">
        </div>

    </section>

    <!-- FACT SECTION -->
    <section class="bg-gray-100 py-4 text-center">

        <h2 class="text-2xl font-semibold mb-10">
            Fakta mengenai website kami
        </h2>

        <div class="flex justify-center gap-10 px-10">

            <!-- CARD 1 -->
            <div
                class="bg-gradient-to-br from-indigo-400 to-indigo-600 text-black p-6 rounded-2xl w-64 shadow-md hover:scale-105 transition">
                <div class="mb-4">
                    <img src="/images/icon1.png" class="w-12 mx-auto">
                </div>
                <h3 class="font-bold text-lg whitespace-nowrap text-center">
                    Rekomendasi Profesional
                </h3>
                <p class="text-sm font-semibold mt-2 text-black/80 text-center">
                    Tips & Tricks langsung dari profesional
                </p>
            </div>

            <!-- CARD 2 -->
            <div
                class="bg-gradient-to-br from-indigo-400 to-indigo-600 text-black p-6 rounded-2xl w-64 shadow-md hover:scale-105 transition">
                <div class="mb-4">
                    <img src="/images/icon2.png" class="w-12 mx-auto">
                </div>
                <h3 class="font-bold text-lg text-center">
                    Aman
                </h3>
                <p class="text-sm font-semibold mt-2 text-black/80 text-center">
                    Data aman dan terjaga kerahasiannya.
                </p>
            </div>

            <!-- CARD 3 -->
            <div
                class="bg-gradient-to-br from-indigo-400 to-indigo-600 text-black p-6 rounded-2xl w-64 shadow-md hover:scale-105 transition">
                <div class="mb-4">
                    <img src="/images/icon3.png" class="w-12 mx-auto">
                </div>
                <h3 class="font-bold text-lg text-center">
                    Cepat & Tepat
                </h3>
                <p class="text-sm font-semibold mt-2 text-black/80 text-center">
                    Langsung mendapatkan hasil setelah proses.
                </p>
            </div>

        </div>

    </section>
@endsection
