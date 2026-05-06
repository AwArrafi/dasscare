@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-6">

        <!-- TITLE -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold">
                HASIL TES
                <span class="text-indigo-600">DASS-21</span>
            </h1>

            <p class="text-gray-500 mt-2">
                Gejala Depresi, Kecemasan, dan Stress
            </p>
        </div>

        <!-- MAIN CARD -->
        <div class="border-2 border-gray-300 rounded-[30px] p-10">

            <div class="grid grid-cols-2 gap-10">

                <!-- LEFT -->
                <div>

                    <h2 class="text-2xl font-semibold text-indigo-600 mb-8 text-center">
                        Hasil Skor
                    </h2>

                    <!-- DEPRESI -->
                    <div class="relative mb-12">

                        <!-- BAR -->
                        <div class="{{ $warnaDepresi }} rounded-lg px-4 py-3 flex justify-between items-center">

                            <div class="flex items-center gap-3">

                                <span class="font-bold">
                                    {{ $depresi }}
                                </span>

                                <span>
                                    Depresi ({{ $kategoriDepresi }})
                                </span>

                            </div>

                        </div>

                        <!-- FLOATING EMOJI -->
                        <img src="{{ $emojiDepresi }}" class="w-20 absolute -right-6 -top-5">

                    </div>

                    <!-- ANXIETY -->
                    <div class=" relative mb-12">
                        <div class="{{ $warnaAnxiety }} rounded-lg px-4 py-3 flex justify-between items-center">

                            <div class="flex items-center gap-3">

                                <span class="font-bold">
                                    {{ $anxiety }}
                                </span>

                                <span>
                                    Kecemasan ({{ $kategoriAnxiety }})
                                </span>

                            </div>

                        </div>

                        <img src="{{ $emojiAnxiety }}" class="w-20 absolute -right-6 -top-5">

                    </div>

                    <!-- STRESS -->
                    <div class="relative mb-7">
                        <div class="{{ $warnaStress }} rounded-lg px-4 py-3 flex justify-between items-center">

                            <div class="flex items-center gap-3">

                                <span class="font-bold">
                                    {{ $stress }}
                                </span>

                                <span>
                                    Stress ({{ $kategoriStress }})
                                </span>

                            </div>

                        </div>

                        <img src="{{ $emojiStress }}" class="w-20 absolute -right-6 -top-5">

                    </div>

                </div>

                <!-- RIGHT -->
                <div>

                    <h2 class="text-2xl font-semibold text-indigo-600 mb-8 text-center">
                        Rekomendasi Self-Care
                    </h2>

                    <div class="space-y-9 mt-10">

                        <div>
                            <p class="text-lg">
                                Konseling psikolog, bantuan profesional
                            </p>

                            <a href="#" class="text-sm text-indigo-500">
                                Lihat Selengkapnya
                            </a>
                        </div>

                        <div>
                            <p class="text-lg">
                                Teknik relaksasi napas 4-7-8, micro-break setiap 2 jam kerja
                            </p>

                            <a href="#" class="text-sm text-indigo-500">
                                Lihat Selengkapnya
                            </a>
                        </div>

                        <div>
                            <p class="text-lg">
                                Guided exposure ringan, mindfulness meditation
                            </p>

                            <a href="#" class="text-sm text-indigo-500">
                                Lihat Selengkapnya
                            </a>
                        </div>

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-center gap-10 mt-10">

                <a href="#" class="bg-indigo-600 text-white px-8 py-3 rounded-xl">
                    Riwayat Tes
                </a>

                <a href="/tes/1" class="bg-indigo-600 text-white px-8 py-3 rounded-xl">
                    Ambil Tes Ulang
                </a>

            </div>

        </div>

    </div>
@endsection
