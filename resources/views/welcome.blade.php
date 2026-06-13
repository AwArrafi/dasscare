@extends('layouts.app')
@section('content')
    <!-- HERO SECTION -->
    <!-- HERO SECTION -->
    <section
        class="max-w-6xl mx-auto
    flex flex-col md:flex-row
    items-center justify-between
    px-6
    pt-8 md:pt-12
    pb-8">

        <!-- TEXT -->
        <div class="w-full md:max-w-xl
        text-center md:text-left">

            <h1 class="text-2xl sm:text-3xl md:text-5xl
    font-semibold
    leading-snug md:leading-tight">

                Selamat Datang di Platform Screening Awal
                Kesehatan Mental Berbasis

                <span class="block mt-2
        text-indigo-600
        font-bold">

                    DASS - 21

                </span>

            </h1>

            <h2 class="mt-8
            text-xl
            text-indigo-600
            font-semibold">

                Apa itu DASS-21?

            </h2>

            <p
                class="mt-3
            text-gray-600
            text-sm md:text-base
            leading-relaxed
            max-w-xl
            mx-auto md:mx-0">

                DASS-21 adalah alat asesmen mandiri yang dirancang untuk mengukur
                tiga aspek utama kondisi psikologis seseorang, yaitu depresi,
                kecemasan, dan stres. Instrumen ini terdiri dari 21 pernyataan yang
                membantu pengguna mengenali keadaan emosional yang sedang dialami.

            </p>

            <a href="/petunjuk"
                class="inline-flex items-center justify-center gap-2

            w-full sm:w-auto

            mt-8

            px-8 py-4

            bg-indigo-600
            text-white

            rounded-2xl

            shadow-lg

            hover:bg-indigo-700

            transition">

                Lakukan tes kesehatan mental →

            </a>

            <p class="text-xs
            text-gray-400
            mt-4">

                Catatan: Hasil dari kuesioner ini bukanlah diagnosis medis,
                melainkan indikasi awal.

            </p>

        </div>

        <!-- HERO IMAGE -->
        <div class="hidden md:block">

            <img src="/images/hero.png" class="w-[350px] lg:w-[420px]" alt="Hero">

        </div>

    </section>
    <!-- FACT + FOOTER -->
    <section class="bg-gray-100 mt-2">

        <div class="max-w-7xl mx-auto px-6 md:px-10 py-16">

            <!-- TITLE -->
            <div class="text-center mb-12">

                <h2 class="text-2xl md:text-3xl font-semibold">

                    Fakta Mengenai Website Kami

                </h2>
            </div>

            <!-- FACT CARDS -->
            <div class="grid grid-cols-1
            sm:grid-cols-2
            lg:grid-cols-3
            gap-6 mb-16">

                <!-- CARD 1 -->
                <div
                    class="bg-gradient-to-br
                from-indigo-400 to-indigo-600
                rounded-3xl p-6
                shadow-md hover:shadow-xl
                hover:-translate-y-1
                transition-all duration-300">

                    <img src="/images/icon1.png" class="w-12 mb-4">

                    <h3 class="font-bold text-lg mb-2">

                        Rekomendasi Profesional

                    </h3>

                    <p class="text-sm text-black/80">

                        Rekomendasi self-care berdasarkan
                        kategori hasil evaluasi psikologis.

                    </p>

                </div>

                <!-- CARD 2 -->
                <div
                    class="bg-gradient-to-br
                from-indigo-400 to-indigo-600
                rounded-3xl p-6
                shadow-md hover:shadow-xl
                hover:-translate-y-1
                transition-all duration-300">

                    <img src="/images/icon2.png" class="w-12 mb-4">

                    <h3 class="font-bold text-lg mb-2">

                        Aman & Rahasia

                    </h3>

                    <p class="text-sm text-black/80">

                        Data pengguna tersimpan dengan aman
                        dan menjaga privasi setiap hasil evaluasi.

                    </p>

                </div>

                <!-- CARD 3 -->
                <div
                    class="bg-gradient-to-br
                from-indigo-400 to-indigo-600
                rounded-3xl p-6
                shadow-md hover:shadow-xl
                hover:-translate-y-1
                transition-all duration-300">

                    <img src="/images/icon3.png" class="w-12 mb-4">

                    <h3 class="font-bold text-lg mb-2">

                        Cepat & Tepat

                    </h3>

                    <p class="text-sm text-black/80">

                        Hasil dapat diperoleh secara langsung
                        setelah seluruh pertanyaan selesai dijawab.

                    </p>

                </div>

            </div>

            <!-- FOOTER CONTENT -->
            <div class="border-t border-gray-200
            pt-12">

                <div class="grid grid-cols-1
                md:grid-cols-3
                gap-10">

                    <!-- BRAND -->
                    <div>

                        <div class="flex items-center
                        gap-3 mb-4">

                            {{-- <div>

                                <img src="/images/logo.png" class="w-12 mb-4">

                            </div> --}}

                            <h3 class="font-bold text-lg">

                                Biro Psikologi Prima Solutions

                            </h3>

                        </div>

                        <p class="text-gray-500
                        text-sm leading-7">

                            Sistem evaluasi psikologis berbasis
                            DASS-21 untuk membantu pengguna
                            memahami kondisi depresi,
                            kecemasan, dan stres secara mandiri.

                        </p>

                    </div>

                    <!-- MENU -->
                    <div>

                        <h4 class="font-semibold mb-4">

                            Informasi

                        </h4>

                        <div class="flex flex-col gap-3
                        text-sm text-gray-500">

                            <a href="#" class="hover:text-indigo-600">

                                Tentang Kami

                            </a>

                            <a href="/petunjuk" class="hover:text-indigo-600">

                                Panduan Tes

                            </a>

                            <a href="#" class="hover:text-indigo-600">

                                Kebijakan Privasi

                            </a>

                            <a href="#" class="hover:text-indigo-600">

                                Syarat & Ketentuan

                            </a>

                        </div>

                    </div>

                    <!-- SOCIAL -->
                    <div>

                        <h4 class="font-semibold mb-4">

                            Kontak & Media Sosial

                        </h4>

                        <div class="flex flex-col gap-3
                        text-sm text-gray-500">

                            <a href="https://www.instagram.com/prima_solutions?igsh=bmR5OTZ0ZGl4dHli"
                                class="hover:text-indigo-600">

                                Instagram

                            </a>

                            <a href="#" class="hover:text-indigo-600">

                                Email

                            </a>

                        </div>

                    </div>

                </div>

                <!-- COPYRIGHT -->
                <div class="border-t border-gray-200
                mt-10 pt-6">

                    <p class="text-xs text-gray-400">

                        © 2026 DASSCare Professional.
                        Dikembangkan oleh Awang & Tim Prima Solutions.

                    </p>

                </div>

            </div>

        </div>

    </section>
@endsection
