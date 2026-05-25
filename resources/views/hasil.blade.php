@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-9 px-6">

        <!-- TITLE -->
        <div class="text-center mb-8">

            <h1 class="text-4xl font-bold">

                HASIL TES
                <span class="text-indigo-600">

                    DASS-21

                </span>

            </h1>

            <p class="text-gray-500 mt-2">

                Gejala Depresi, Kecemasan, dan Stress

            </p>

        </div>

        <!-- MAIN CARD -->
        <div class="border-2 border-gray-300 rounded-[30px] p-10">

            <!-- HEADER -->
            <div class="grid grid-cols-2 mb-10">

                <h2 class="text-2xl font-semibold text-indigo-600 text-center">

                    Hasil Skor

                </h2>

                <h2 class="text-2xl font-semibold text-indigo-600 text-center">

                    Rekomendasi Self-Care

                </h2>

            </div>

            <!-- CONTENT -->
            <div class="space-y-10">

                <!-- DEPRESI -->
                <div class="grid grid-cols-[55%_45%] gap-10 items-center">

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
                        <img src="{{ $emojiDepresi }}" class="w-20 absolute -right-6 top-1/2 -translate-y-1/2">

                    </div>

                    <!-- RIGHT -->
                    <div>

                        <p class="text-gray-800 text-lg leading-relaxed">

                            {{ $rekomendasiDepresi->content }}

                        </p>

                        <div class="relative inline-block group">

                            <span class="text-indigo-500 text-sm mt-2 inline-block cursor-not-allowed hover:underline">

                                Lihat Selengkapnya

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
        whitespace-nowrap z-50">

                                Fitur detail rekomendasi akan segera hadir

                            </div>

                        </div>

                    </div>

                </div>

                <!-- ANXIETY -->
                <div class="grid grid-cols-[55%_45%] gap-10 items-center">

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
                        <img src="{{ $emojiAnxiety }}" class="w-20 absolute -right-6 top-1/2 -translate-y-1/2">

                    </div>

                    <!-- RIGHT -->
                    <div>

                        <p class="text-gray-800 text-lg leading-relaxed">

                            {{ $rekomendasiAnxiety->content }}

                        </p>

                        <div class="relative inline-block group">

                            <span class="text-indigo-500 text-sm mt-2 inline-block cursor-not-allowed hover:underline">

                                Lihat Selengkapnya

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
        whitespace-nowrap z-50">

                                Fitur detail rekomendasi akan segera hadir

                            </div>

                        </div>

                    </div>

                </div>

                <!-- STRESS -->
                <div class="grid grid-cols-[55%_45%] gap-10 items-center">

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
                        <img src="{{ $emojiStress }}" class="w-20 absolute -right-6 top-1/2 -translate-y-1/2">

                    </div>

                    <!-- RIGHT -->
                    <div>

                        <p class="text-gray-800 text-lg leading-relaxed">

                            {{ $rekomendasiStress->content }}

                        </p>

                        <div class="relative inline-block group">

                            <span class="text-indigo-500 text-sm mt-2 inline-block cursor-not-allowed hover:underline">

                                Lihat Selengkapnya

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
        whitespace-nowrap z-50">

                                Fitur detail rekomendasi akan segera hadir

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-16">

                <a href="/riwayat"
                    class="bg-indigo-600 hover:bg-indigo-700
        transition text-white
        px-10 py-4 rounded-2xl
        shadow-md hover:shadow-lg
        font-medium text-lg">

                    Lihat Riwayat Tes

                </a>

            </div>

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
