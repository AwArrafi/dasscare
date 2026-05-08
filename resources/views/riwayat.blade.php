@extends('layouts.app')

@section('content')
    <!-- BACK BUTTON -->
    <a href="javascript:history.back()"
        class="absolute top-24 left-16
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

                        <span class="text-xl">
                            ⏺
                        </span>

                        <h2 class="font-semibold text-lg">
                            {{ $result->created_at->format('d F Y') }}
                        </h2>

                    </div>

                </a>
            @endforeach

        </div>

    </div>
@endsection
