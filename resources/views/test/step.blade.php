@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center
        min-h-[75vh]
        px-4 py-8">

        <div style="background-color: #9A7ADF;"
            class="rounded-[32px] md:rounded-[40px]
            px-5 md:px-10
            py-8 md:py-10
            w-full max-w-2xl text-center
            shadow-[0_12px_30px_rgba(74,51,136,0.18)]">

            @if ($step > 1)
                <div class="flex justify-start mb-4">

                    <a href="/tes/{{ $step - 1 }}"
                        class="inline-flex items-center gap-2
                        text-white/80
                        hover:text-white
                        transition">

                        ← Kembali

                    </a>

                </div>
            @endif

            <!-- STEP -->
            <p class="text-sm md:text-base
                font-bold text-white mb-3">

                Pertanyaan {{ $step }}/{{ $total }}

            </p>

            <!-- QUESTION -->
            <h2
                class="text-lg md:text-2xl
                font-medium
                leading-relaxed
                mb-8
                max-w-xl mx-auto
                text-white">

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

                            <div class="bg-white
                                py-4 md:py-5
                                px-5
                                rounded-full
                                shadow-sm
                                border border-white/40
                                text-sm md:text-lg
                                font-medium
                                text-gray-700
                                hover:bg-purple-50
                                hover:shadow-md
                                peer-checked:text-white
                                transition-all duration-300"
                                onclick="this.style.backgroundColor='#4A3388'">

                                {{ $label }}

                            </div>

                        </label>
                    @endforeach

                </div>

                <!-- BUTTON -->
                <button type="submit" style="background-color: #4A3388;"
                    class="mt-8
                    w-full md:w-auto
                    px-8 md:px-10
                    py-3 md:py-4
                    text-white
                    rounded-full
                    font-medium
                    text-sm md:text-base
                    opacity-50 cursor-not-allowed
                    transition-all duration-300
                    hover:opacity-90"
                    id="btnNext" disabled>

                    Selanjutnya

                </button>

            </form>

        </div>

    </div>

    <script>
        const radios = document.querySelectorAll('input[name="value"]');
        const btn = document.getElementById('btnNext');

        radios.forEach(radio => {
            radio.addEventListener('change', () => {
                btn.disabled = false;

                btn.classList.remove(
                    'opacity-50',
                    'cursor-not-allowed'
                );

                btn.classList.add(
                    'cursor-pointer'
                );

                document.querySelectorAll('input[name="value"]').forEach(input => {
                    const optionBox = input.nextElementSibling;

                    if (input.checked) {
                        optionBox.style.backgroundColor = '#4A3388';
                        optionBox.style.color = '#ffffff';
                        optionBox.style.borderColor = '#4A3388';
                    } else {
                        optionBox.style.backgroundColor = '#ffffff';
                        optionBox.style.color = '#374151';
                        optionBox.style.borderColor = 'rgba(255,255,255,0.4)';
                    }
                });
            });
        });
    </script>
@endsection
