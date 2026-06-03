@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center
        min-h-[75vh]
        px-4 py-8">

        <div
            class="bg-gray-200
            rounded-[32px] md:rounded-[40px]
            px-5 md:px-10
            py-8 md:py-10
            w-full max-w-2xl text-center">

            @if ($step > 1)
                <div class="flex justify-start mb-4">

                    <a href="/tes/{{ $step - 1 }}"
                        class="inline-flex items-center gap-2
            text-gray-500
            hover:text-indigo-600
            transition">

                        ← Kembali

                    </a>

                </div>
            @endif

            <!-- STEP -->
            <p class="text-sm md:text-base
                font-bold text-black mb-3">

                Pertanyaan {{ $step }}/{{ $total }}

            </p>

            <!-- QUESTION -->
            <h2
                class="text-lg md:text-2xl
                font-medium
                leading-relaxed
                mb-8
                max-w-xl mx-auto">

                {{ $question->text }}

            </h2>

            <!-- FORM -->
            <form method="POST" action="{{ route('tes.submit', $step) }}">

                @csrf

                <input type="hidden" name="question_id" value="{{ $question->id }}">

                <div class="flex flex-col gap-4">

                    @foreach ([0 => 'Tidak Sama Sekali', 1 => 'Sampai di Tingkat Tertentu', 2 => 'Lumayan Sering', 3 => 'Sangat Sesuai'] as $val => $label)
                        <label class="block cursor-pointer">

                            <input type="radio" name="value" value="{{ $val }}" class="hidden peer">

                            <div
                                class="bg-white
                                py-4 md:py-5
                                px-5
                                rounded-full
                                shadow-sm
                                border border-transparent
                                text-sm md:text-lg
                                font-medium
                                hover:border-indigo-300
                                hover:shadow-md
                                peer-checked:bg-indigo-500
                                peer-checked:text-white
                                peer-checked:border-indigo-500
                                transition-all duration-300">

                                {{ $label }}

                            </div>

                        </label>
                    @endforeach

                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="mt-8
                    w-full md:w-auto
                    px-8 md:px-10
                    py-3 md:py-4
                    bg-indigo-600 text-white
                    rounded-full
                    font-medium
                    text-sm md:text-base
                    opacity-50 cursor-not-allowed
                    transition-all duration-300"
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

                btn.classList.remove(
                    'opacity-50',
                    'cursor-not-allowed'
                );

            });

        });
    </script>
@endsection
