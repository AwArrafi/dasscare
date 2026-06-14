@extends('layouts.app')

@section('content')
    @php

        $badgeClass = match ($priorityRule['color']) {
            'green' => 'bg-green-100 text-green-700',

            'yellow' => 'bg-yellow-100 text-yellow-700',

            'red' => 'bg-red-100 text-red-700',

            'blue' => 'bg-blue-100 text-blue-700',

            default => 'bg-gray-100 text-gray-700',
        };

    @endphp
    <div class="min-h-screen py-8 md:py-14 px-4 md:px-6">

        <!-- CONTAINER -->
        <div class="max-w-6xl mx-auto">

            <!-- HEADER -->
            <div class="flex items-start gap-4 mb-8 md:mb-10">

                <!-- BACK -->
                <a href="javascript:history.back()"
                    class="mt-1 inline-flex items-center justify-center
                    min-w-[40px] w-10 h-10 rounded-full
                    border border-gray-300
                    bg-white
                    text-gray-500
                    hover:text-indigo-600
                    hover:border-indigo-600
                    hover:shadow-md
                    transition-all duration-300">

                    ←

                </a>

                <!-- TITLE -->
                <div>

                    <h1
                        class="text-3xl md:text-4xl
                        font-bold text-gray-800
                        leading-tight mb-2">

                        Rekomendasi Self-Care

                    </h1>

                    <p class="text-gray-500
                        text-sm md:text-base">

                        Rekomendasi personal berdasarkan evaluasi psikologis Anda.

                    </p>

                </div>

            </div>

            <!-- SCORE SUMMARY -->
            <div
                class="bg-white rounded-3xl
                p-4 md:p-6
                shadow-[0_2px_12px_rgba(0,0,0,0.04)]
                border border-gray-300
                mb-8">

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

                            <div class="{{ $colorDepresi }}
                                h-full rounded-full
                                transition-all duration-500"
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

                            <div class="{{ $colorAnxiety }}
                                h-full rounded-full
                                transition-all duration-500"
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

                            <div class="{{ $colorStress }}
                                h-full rounded-full
                                transition-all duration-500"
                                style="width: {{ $widthStress }}">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- PRIORITY RULE -->
            <div class="bg-indigo-50 border border-indigo-300
                rounded-3xl p-5 md:p-6 mb-8">

                <div class="flex flex-col sm:flex-row
                    items-start gap-4">

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

                        <div class="flex flex-wrap
                            items-center gap-2 mb-2">

                            <h3 class="font-semibold text-gray-800">

                                Prioritas Saat Ini

                            </h3>

                            <span class="{{ $badgeClass }}
    px-3 py-1 rounded-full
    text-xs font-semibold">

                                {{ $priorityRule['badge'] }}

                            </span>

                        </div>

                        <p class="text-gray-600 text-sm
                            leading-relaxed">

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
                    border border-gray-200
                    shadow-[0_2px_12px_rgba(0,0,0,0.04)]">

                    <div class="flex justify-between items-start mb-6">

                        <h2 class="text-xl font-semibold text-gray-800">

                            Prioritas Utama

                        </h2>

                        <span class="{{ $badgeClass }}
    text-xs px-3 py-1 rounded-full
    font-semibold">

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

                        <h3
                            class="text-xl md:text-2xl
                            font-semibold text-gray-800
                            leading-relaxed mb-4">

                            {{ $mainRecommendation->content }}

                        </h3>

                        <p class="text-gray-500 leading-relaxed
                            mb-6 text-sm md:text-base">

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
                                class="w-full bg-indigo-600
                                hover:bg-indigo-700
                                transition text-white
                                py-3 rounded-2xl font-medium">

                                Mulai Sesi

                            </button>

                            <!-- TOOLTIP -->
                            <div
                                class="absolute left-1/2
                                -translate-x-1/2 top-full mt-3
                                opacity-0 invisible
                                group-hover:opacity-100
                                group-hover:visible
                                transition-all duration-300
                                bg-gray-900 text-white text-xs
                                px-4 py-2 rounded-xl
                                shadow-xl
                                w-max max-w-[220px]
                                text-center z-50">

                                Coming Soon!

                            </div>

                        </div>

                    </div>

                </div>

                <!-- REKOMENDASI TAMBAHAN -->
                <div class="lg:col-span-2">

                    <div class="flex justify-between
                        items-center mb-5">

                        <h2 class="text-xl font-semibold text-gray-800">

                            Rekomendasi Tambahan

                        </h2>


                        <div class="relative inline-block group">

                            <button type="button" class="text-sm text-indigo-500
        cursor-not-allowed">

                                Lihat Semua

                            </button>

                            <!-- TOOLTIP -->
                            <div
                                class="absolute left-1/2
        -translate-x-1/2 top-full mt-3

        opacity-0 invisible

        group-hover:opacity-100
        group-hover:visible

        transition-all duration-300

        bg-gray-900 text-white text-xs
        px-4 py-2 rounded-xl
        shadow-xl

        w-max max-w-[220px]
        text-center z-50">

                                Coming Soon!

                            </div>

                        </div>

                    </div>

                    <div class="space-y-4">

                        @foreach ($additionalRecommendations as $recommendation)
                            <div
                                class="bg-white rounded-2xl p-5
                                border border-gray-300
                                shadow-[0_2px_12px_rgba(0,0,0,0.04)]
                                hover:shadow-md
                                transition">

                                <div
                                    class="flex flex-col sm:flex-row
                                    items-start gap-4">

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

                                        <div
                                            class="flex flex-wrap
                                            justify-between
                                            items-start gap-2 mb-2">

                                            <h3 class="font-semibold text-gray-800">

                                                {{ $recommendation->title }}

                                            </h3>



                                        </div>

                                        <p class="text-sm font-medium text-indigo-500 mb-2">

                                            Kategori:
                                            {{ $recommendation->category }}

                                        </p>

                                        <p class="text-gray-500
    text-sm leading-relaxed">

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
