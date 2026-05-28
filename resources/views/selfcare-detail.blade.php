@extends('layouts.app')

@section('content')
    <!-- BACK BUTTON -->
    <a href="javascript:history.back()"
        class="absolute top-30 left-16
          inline-flex items-center justify-center
          w-9 h-9 rounded-full
          border border-gray-300
          text-gray-500
          hover:text-indigo-600
          hover:border-indigo-600
          transition">

        ←
    </a>
    <div class="min-h-screen py-14 px-6">

        <!-- CONTAINER -->
        <div class="max-w-6xl mx-auto">

            <!-- HEADER -->
            <div class="mb-10">

                <h1 class="text-4xl font-bold text-gray-800 mb-2">

                    Rekomendasi Self-Care

                </h1>

                <p class="text-gray-500">

                    Rekomendasi personal berdasarkan evaluasi psikologis Anda.

                </p>

            </div>

            <!-- SCORE SUMMARY -->
            <div class="bg-white rounded-3xl p-6
                shadow-sm border border-gray-500 mb-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <!-- DEPRESI -->
                    <div>

                        <div class="flex justify-between mb-2 text-sm">

                            <span class="font-medium text-gray-700">

                                Depresi

                            </span>

                            <span class="text-gray-500">

                                {{ $result->score_depression }}
                                {{ $result->category_depression }}

                            </span>

                        </div>

                        <div class="bg-gray-200 rounded-full h-3 overflow-hidden">

                            <div class="{{ $colorDepresi }} h-full rounded-full transition-all duration-500"
                                style="width: {{ $widthDepresi }}">

                            </div>

                        </div>

                    </div>

                    <!-- ANXIETY -->
                    <div>

                        <div class="flex justify-between mb-2 text-sm">

                            <span class="font-medium text-gray-700">

                                Kecemasan

                            </span>

                            <span class="text-gray-500">

                                {{ $result->score_anxiety }}
                                {{ $result->category_anxiety }}

                            </span>

                        </div>

                        <div class="bg-gray-200 rounded-full h-3 overflow-hidden">

                            <div class="{{ $colorAnxiety }} h-full rounded-full transition-all duration-500"
                                style="width: {{ $widthAnxiety }}">

                            </div>

                        </div>

                    </div>

                    <!-- STRESS -->
                    <div>

                        <div class="flex justify-between mb-2 text-sm">

                            <span class="font-medium text-gray-700">

                                Stress

                            </span>

                            <span class="text-gray-500">

                                {{ $result->score_stress }}
                                {{ $result->category_stress }}

                            </span>

                        </div>

                        <div class="bg-gray-200 rounded-full h-3 overflow-hidden">

                            <div class="{{ $colorStress }} h-full rounded-full transition-all duration-500"
                                style="width: {{ $widthStress }}">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- PRIORITY RULE -->
            <div class="bg-indigo-50 border border-indigo-100
                rounded-2xl p-5 mb-8">

                <div class="flex items-start gap-4">

                    <!-- ICON -->
                    <div
                        class="w-11 h-11 rounded-xl
                        bg-indigo-100
                        flex items-center justify-center
                        text-indigo-600 text-xl">

                        🧠

                    </div>

                    <!-- CONTENT -->
                    <div class="flex-1">

                        <div class="flex items-center gap-3 mb-2">

                            <h3 class="font-semibold text-gray-800">

                                Prioritas Saat Ini

                            </h3>

                            <span
                                class="px-3 py-1 rounded-full text-xs font-semibold

                                @if ($priorityRule['color'] === 'red') bg-red-100 text-red-600
                                @elseif ($priorityRule['color'] === 'yellow')
                                    bg-yellow-100 text-yellow-700
                                @elseif ($priorityRule['color'] === 'green')
                                    bg-green-100 text-green-700
                                @else
                                    bg-blue-100 text-blue-700 @endif
                            ">

                                {{ $priorityRule['badge'] }}

                            </span>

                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed">

                            {{ $priorityRule['description'] }}

                        </p>

                    </div>

                </div>

            </div>

            <!-- MAIN CONTENT -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- PRIORITAS UTAMA -->
                <div
                    class="bg-white rounded-3xl p-6
                    border border-red-200
                    shadow-sm">

                    <div class="flex justify-between items-start mb-6">

                        <h2 class="text-xl font-semibold text-gray-800">

                            Prioritas Utama

                        </h2>

                        <span
                            class="bg-red-100 text-red-600
                            text-xs px-3 py-1 rounded-full font-semibold">

                            {{ $priorityRule['badge'] }}

                        </span>

                    </div>

                    <!-- CARD -->
                    <div>

                        <div
                            class="w-14 h-14 rounded-2xl
                            bg-indigo-100 text-indigo-600
                            flex items-center justify-center
                            text-2xl mb-5">

                            🧘

                        </div>

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">

                            {{ $mainRecommendation->content }}

                        </h3>

                        <p class="text-gray-500 leading-relaxed mb-6">

                            {{ $priorityRule['priority'] }}

                        </p>

                        <!-- TAG -->
                        <div class="flex flex-wrap gap-2 mb-8">

                            <span
                                class="bg-gray-100 text-gray-600
                                text-sm px-3 py-1 rounded-full">

                                15 menit/hari

                            </span>

                            <span
                                class="bg-gray-100 text-gray-600
                                text-sm px-3 py-1 rounded-full">

                                CBT Relaksasi

                            </span>

                        </div>

                        <!-- BUTTON -->
                        <div class="relative group">

                            <button
                                class="w-full bg-indigo-600 hover:bg-indigo-700
        transition text-white py-3 rounded-2xl font-medium">

                                Mulai Sesi

                            </button>

                            <!-- TOOLTIP -->
                            <div
                                class="absolute left-1/2 -translate-x-1/2 top-full mt-3
        opacity-0 invisible
        group-hover:opacity-100
        group-hover:visible
        transition-all duration-300
        bg-gray-900 text-white text-xs
        px-4 py-2 rounded-xl shadow-xl
        whitespace-nowrap z-50">

                                Coming Soon!

                            </div>

                        </div>

                    </div>

                </div>

                <!-- REKOMENDASI TAMBAHAN -->
                <div class="lg:col-span-2">

                    <div class="flex justify-between items-center mb-5">

                        <h2 class="text-xl font-semibold text-gray-800">

                            Rekomendasi Tambahan

                        </h2>

                        <span class="text-sm text-indigo-500">

                            Lihat Semua

                        </span>

                    </div>

                    <div class="space-y-4">

                        @foreach ($additionalRecommendations as $recommendation)
                            <div
                                class="bg-white rounded-2xl p-5
                                border border-gray-500
                                shadow-sm hover:shadow-md
                                transition">

                                <div class="flex items-start gap-4">

                                    <!-- ICON -->
                                    <div
                                        class="w-12 h-12 rounded-xl
                                        bg-orange-100 text-orange-500
                                        flex items-center justify-center
                                        text-xl">

                                        📝

                                    </div>

                                    <!-- CONTENT -->
                                    <div class="flex-1">

                                        <div class="flex justify-between items-start mb-2">

                                            <h3 class="font-semibold text-gray-800">

                                                {{ $recommendation->category }}

                                            </h3>

                                            <span
                                                class="bg-blue-100 text-blue-600
                                                text-xs px-3 py-1 rounded-full font-semibold">

                                                MENENGAH

                                            </span>

                                        </div>

                                        <p class="text-gray-500 text-sm leading-relaxed">

                                            {{ $recommendation->content }}

                                        </p>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
