@extends('layouts.app')

@section('content')
    <!-- BACK BUTTON -->
    @if ($step > 1)
        <a href="/tes/{{ $step - 1 }}"
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
    @endif

    <div class="flex justify-center items-center min-h-[80vh]">

        <div class="bg-gray-200 rounded-[40px] px-10 py-8 w-full max-w-2xl text-center">

            <!-- STEP -->
            <p class="text-sm font-bold text-black-500 mb-2">
                Pertanyaan {{ $step }}/{{ $total }}
            </p>

            <!-- QUESTION -->
            <h2 class="text-lg font-medium mb-6">
                {{ $question->text }}
            </h2>

            <!-- FORM -->
            <form method="POST" action="{{ route('tes.submit', $step) }}">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">

                <div class="flex flex-col gap-4">

                    @foreach ([
            0 => 'Tidak Sama Sekali',
            1 => 'Sampai di Tingkat Tertentu',
            2 => 'Lumayan Sering',
            3 => 'Sangat Sesuai',
        ] as $val => $label)
                        <label class="block cursor-pointer">
                            <input type="radio" name="value" value="{{ $val }}" class="hidden peer">

                            <div
                                class="bg-white py-4 rounded-full shadow-sm 
                                peer-checked:bg-indigo-500 
                                peer-checked:text-white 
                                transition">
                                {{ $label }}
                            </div>
                        </label>
                    @endforeach

                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="mt-6 px-6 py-3 bg-indigo-600 text-white rounded-full 
                       opacity-50 cursor-not-allowed"
                    id="btnNext" disabled>
                    Selanjutnya
                </button>

            </form>

        </div>

    </div>

    <script>
        const radios = document.querySelectorAll('input[name="value"]');
        const btn = document.getElementById('btnNext');

        radios.forEach(r => {
            r.addEventListener('change', () => {
                btn.disabled = false;
                btn.classList.remove('opacity-50', 'cursor-not-allowed');
            });
        });
    </script>
@endsection
