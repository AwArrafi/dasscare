@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 md:py-9 px-4 md:px-6">

        <!-- TITLE -->
        <div class="text-center mb-8">

            <h1 class="text-2xl md:text-4xl font-bold leading-tight">

                HASIL TES
                <span class="text-indigo-600">

                    DASS-21

                </span>

            </h1>

            <p class="text-gray-500 mt-2 text-sm md:text-base">

                Gejala Depresi, Kecemasan, dan Stress

            </p>

        </div>

        <!-- MAIN CARD -->
        <div class="border-2 border-gray-300 rounded-[30px] p-5 md:p-10">

            <!-- HEADER -->
            <div class="grid grid-cols-1 md:grid-cols-2
                gap-4 md:gap-0 mb-10">

                <h2 class="text-xl md:text-2xl
                    font-semibold text-indigo-600 text-center">

                    Hasil Skor

                </h2>

                <h2 class="text-xl md:text-2xl
                    font-semibold text-indigo-600 text-center">

                    Rekomendasi Self-Care

                </h2>

            </div>

            <!-- CONTENT -->
            <div class="space-y-10">

                <!-- DEPRESI -->
                <div class="grid grid-cols-1 lg:grid-cols-[55%_45%]
                    gap-6 lg:gap-10 items-center">

                    <!-- LEFT -->
                    <div class="relative">

                        <!-- TRACK -->
                        <div class="bg-gray-200 rounded-lg overflow-hidden">

                            <!-- BAR -->
                            <div class="{{ $warnaDepresi }}
                                rounded-lg px-4 py-5
                                flex items-center animate-bar"
                                style="width: {{ $widthDepresi }};">

                                <div class="flex items-center gap-3">

                                    <span class="font-bold">

                                        {{ $depresi }}

                                    </span>

                                    <span>

                                        Depresi
                                        ({{ $kategoriDepresi }})

                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- EMOJI -->
                        <img src="{{ $emojiDepresi }}"
                            class="w-14 md:w-20 absolute
                            -right-3 md:-right-6
                            top-1/2 -translate-y-1/2">

                    </div>

                    <!-- RIGHT -->
                    <div>

                        <p class="text-gray-800 text-base md:text-lg leading-relaxed">

                            {{ $rekomendasiDepresi->content }}

                        </p>

                        @auth

                            <a href="/self-care/{{ $resultId }}"
                                class="text-indigo-500 hover:text-indigo-700
                                text-sm font-medium transition hover:underline">

                                Lihat Selengkapnya

                            </a>
                        @else
                            <div class="relative inline-block group">

                                <span class="text-gray-400 text-sm cursor-not-allowed">

                                    Login Dulu

                                </span>

                                <!-- TOOLTIP -->
                                <div
                                    class="absolute left-0 top-7
                                    opacity-0 invisible
                                    group-hover:opacity-100
                                    group-hover:visible
                                    transition-all duration-300
                                    bg-gray-900 text-white text-xs
                                    px-3 py-2 rounded-lg shadow-lg
                                    w-max max-w-[220px]
                                    text-center z-50">

                                    Login untuk membuka detail rekomendasi self-care

                                </div>

                            </div>

                        @endauth

                    </div>

                </div>

                <!-- ANXIETY -->
                <div class="grid grid-cols-1 lg:grid-cols-[55%_45%]
                    gap-6 lg:gap-10 items-center">

                    <!-- LEFT -->
                    <div class="relative">

                        <!-- TRACK -->
                        <div class="bg-gray-200 rounded-lg overflow-hidden">

                            <!-- BAR -->
                            <div class="{{ $warnaAnxiety }}
                                rounded-lg px-4 py-5
                                flex items-center animate-bar"
                                style="width: {{ $widthAnxiety }};">

                                <div class="flex items-center gap-3">

                                    <span class="font-bold">

                                        {{ $anxiety }}

                                    </span>

                                    <span>

                                        Kecemasan
                                        ({{ $kategoriAnxiety }})

                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- EMOJI -->
                        <img src="{{ $emojiAnxiety }}"
                            class="w-14 md:w-20 absolute
                            -right-3 md:-right-6
                            top-1/2 -translate-y-1/2">

                    </div>

                    <!-- RIGHT -->
                    <div>

                        <p class="text-gray-800 text-base md:text-lg leading-relaxed">

                            {{ $rekomendasiAnxiety->content }}

                        </p>

                        @auth

                            <a href="/self-care/{{ $resultId }}"
                                class="text-indigo-500 hover:text-indigo-700
                                text-sm font-medium transition hover:underline">

                                Lihat Selengkapnya

                            </a>
                        @else
                            <div class="relative inline-block group">

                                <span class="text-gray-400 text-sm cursor-not-allowed">

                                    Login Dulu

                                </span>

                                <!-- TOOLTIP -->
                                <div
                                    class="absolute left-0 top-7
                                    opacity-0 invisible
                                    group-hover:opacity-100
                                    group-hover:visible
                                    transition-all duration-300
                                    bg-gray-900 text-white text-xs
                                    px-3 py-2 rounded-lg shadow-lg
                                    w-max max-w-[220px]
                                    text-center z-50">

                                    Login untuk membuka detail rekomendasi self-care

                                </div>

                            </div>

                        @endauth

                    </div>

                </div>

                <!-- STRESS -->
                <div class="grid grid-cols-1 lg:grid-cols-[55%_45%]
                    gap-6 lg:gap-10 items-center">

                    <!-- LEFT -->
                    <div class="relative">

                        <!-- TRACK -->
                        <div class="bg-gray-200 rounded-lg overflow-hidden">

                            <!-- BAR -->
                            <div class="{{ $warnaStress }}
                                rounded-lg px-4 py-5
                                flex items-center animate-bar"
                                style="width: {{ $widthStress }};">

                                <div class="flex items-center gap-3">

                                    <span class="font-bold">

                                        {{ $stress }}

                                    </span>

                                    <span>

                                        Stress
                                        ({{ $kategoriStress }})

                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- EMOJI -->
                        <img src="{{ $emojiStress }}"
                            class="w-14 md:w-20 absolute
                            -right-3 md:-right-6
                            top-1/2 -translate-y-1/2">

                    </div>

                    <!-- RIGHT -->
                    <div>

                        <p class="text-gray-800 text-base md:text-lg leading-relaxed">

                            {{ $rekomendasiStress->content }}

                        </p>

                        @auth

                            <a href="/self-care/{{ $resultId }}"
                                class="text-indigo-500 hover:text-indigo-700
                                text-sm font-medium transition hover:underline">

                                Lihat Selengkapnya

                            </a>
                        @else
                            <div class="relative inline-block group">

                                <span class="text-gray-400 text-sm cursor-not-allowed">

                                    Login Dulu

                                </span>

                                <!-- TOOLTIP -->
                                <div
                                    class="absolute left-0 top-7
                                    opacity-0 invisible
                                    group-hover:opacity-100
                                    group-hover:visible
                                    transition-all duration-300
                                    bg-gray-900 text-white text-xs
                                    px-3 py-2 rounded-lg shadow-lg
                                    w-max max-w-[220px]
                                    text-center z-50">

                                    Login untuk membuka detail rekomendasi self-care

                                </div>

                            </div>

                        @endauth

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-10 md:mt-16">

                <a href="/riwayat"
                    class="bg-indigo-600 hover:bg-indigo-700
                    transition text-white
                    w-full md:w-auto text-center
                    px-6 md:px-10
                    py-3 md:py-4 rounded-2xl
                    shadow-md hover:shadow-lg
                    font-medium text-base md:text-lg">

                    Lihat Riwayat Tes

                </a>

            </div>

            <!-- CTA LOGIN -->
            @guest

                <div class="mt-10 text-center text-sm text-gray-500">

                    <a href="/login"
                        class="text-indigo-600 hover:text-indigo-700
                        transition font-medium hover:underline">

                        Login

                    </a>

                    untuk menyimpan hasil tes dan melihat riwayat evaluasi Anda.

                </div>

            @endguest

        </div>

    </div>

    <style>
        @keyframes slideBar {

            from {

                transform: scaleX(0);

            }

            to {

                transform: scaleX(1);

            }

        }

        .animate-bar {

            animation: slideBar 1s ease forwards;
            transform-origin: left;

        }
    </style>
@endsection
