@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-8 md:py-10 px-4 md:px-6">

        <!-- HEADER -->
        <div class="flex items-center gap-4 mb-10">

            <!-- BACK BUTTON -->
            <a href="javascript:history.back()"
                class="inline-flex items-center justify-center
                w-10 h-10 rounded-full
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
            <h1 class="text-2xl md:text-3xl font-bold">

                Riwayat Tes
                <span class="text-indigo-600">

                    DASS-21

                </span>

            </h1>

        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

            @foreach ($results as $result)
                <a href="/hasil/{{ $result->id }}"
                    class="group bg-indigo-300 rounded-3xl
                    px-6 py-6
                    hover:bg-indigo-400
                    hover:-translate-y-1
                    hover:shadow-xl
                    transition-all duration-300">

                    <div class="flex flex-col gap-2">

                        <p class="text-sm text-indigo-800 font-medium">

                            Riwayat Tes

                        </p>

                        <h2 class="font-semibold text-lg md:text-xl">

                            {{ $result->created_at->format('d F Y') }}

                        </h2>

                    </div>

                </a>
            @endforeach

        </div>

        <!-- PAGINATION -->
        <div class="flex justify-center items-center
            gap-3 md:gap-5
            mt-10 flex-wrap">

            {{-- PREVIOUS --}}
            @if ($results->onFirstPage())
                <span
                    class="px-4 md:px-5 py-2 md:py-3
                    rounded-2xl
                    bg-gray-200 text-gray-400
                    text-sm md:text-base">

                    Sebelumnya

                </span>
            @else
                <a href="{{ $results->previousPageUrl() }}"
                    class="px-4 md:px-5 py-2 md:py-3
                    rounded-2xl
                    bg-indigo-500 text-white
                    text-sm md:text-base
                    hover:bg-indigo-600
                    transition">

                    Sebelumnya

                </a>
            @endif

            {{-- PAGE NUMBER --}}
            <span class="px-2 py-2
                text-gray-600 font-medium
                text-sm md:text-base">

                Halaman {{ $results->currentPage() }}

            </span>

            {{-- NEXT --}}
            @if ($results->hasMorePages())
                <a href="{{ $results->nextPageUrl() }}"
                    class="px-4 md:px-5 py-2 md:py-3
                    rounded-2xl
                    bg-indigo-500 text-white
                    text-sm md:text-base
                    hover:bg-indigo-600
                    transition">

                    Selanjutnya

                </a>
            @else
                <span
                    class="px-4 md:px-5 py-2 md:py-3
                    rounded-2xl
                    bg-gray-200 text-gray-400
                    text-sm md:text-base">

                    Selanjutnya

                </span>
            @endif

        </div>

    </div>
@endsection
