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

    <div class="max-w-5xl mx-auto py-10 px-6">

        <!-- TITLE -->
        <h1 class="text-3xl font-bold mb-10">
            Riwayat Tes
            <span class="text-indigo-600">DASS-21</span>
        </h1>

        <!-- GRID -->
        <div class="grid grid-cols-2 gap-6">

            @foreach ($results as $result)
                <a href="/hasil/{{ $result->id }}"
                    class="group bg-indigo-300 rounded-2xl px-6 py-5
          hover:bg-indigo-400
          hover:-translate-y-1
          hover:shadow-lg
          transition-all duration-300">

                    <div class="flex items-center gap-4">

                        <h2 class="font-semibold text-lg">
                            Riwayat Tes {{ $result->created_at->format('d F Y') }}
                        </h2>

                    </div>

                </a>
            @endforeach

        </div>

        <div class="flex justify-center items-center gap-3 mt-10">

            {{-- PREVIOUS --}}
            @if ($results->onFirstPage())
                <span class="px-4 py-2 rounded-xl bg-gray-200 text-gray-400">
                    Sebelumnya
                </span>
            @else
                <a href="{{ $results->previousPageUrl() }}"
                    class="px-4 py-2 rounded-xl bg-indigo-500 text-white
                  hover:bg-indigo-600 transition">

                    Sebelumnya

                </a>
            @endif


            {{-- PAGE NUMBER --}}
            <span class="px-4 py-2 text-gray-600 font-medium">

                Halaman {{ $results->currentPage() }}

            </span>


            {{-- NEXT --}}
            @if ($results->hasMorePages())
                <a href="{{ $results->nextPageUrl() }}"
                    class="px-4 py-2 rounded-xl bg-indigo-500 text-white
                  hover:bg-indigo-600 transition">

                    Selanjutnya

                </a>
            @else
                <span class="px-4 py-2 rounded-xl bg-gray-200 text-gray-400">
                    Selanjutnya
                </span>
            @endif

        </div>

    </div>
@endsection
