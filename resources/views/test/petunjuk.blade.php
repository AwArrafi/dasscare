@extends('layouts.app')

@section('content')
    <section
        class="flex flex-col lg:flex-row
        items-center justify-center
        gap-10 lg:gap-24
        px-4 md:px-8 lg:px-16
        py-8 lg:pt-6">

        <!-- LEFT CARD -->
        <div
            class="bg-gray-100
            p-6 md:p-8 lg:p-10
            rounded-[32px] lg:rounded-[40px]
            max-w-lg w-full">

            <!-- TITLE -->
            <h2 class="text-xl md:text-2xl
                font-semibold text-center
                mb-4 tracking-wide">

                PETUNJUK PENGISIAN

            </h2>

            <!-- DESCRIPTION -->
            <p
                class="text-sm md:text-[15px]
                text-gray-600
                leading-7
                text-center
                max-w-md mx-auto
                tracking-wide mb-8">

                Silahkan jawab pertanyaan sesuai dengan pengalaman anda selama satu minggu terakhir.
                Tidak ada jawaban benar atau salah, isi sesuai kondisi anda.

            </p>

            <!-- SKALA -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <!-- 0 -->
                <div
                    class="bg-white rounded-2xl
                    p-4 flex items-center gap-3
                    shadow-sm border border-gray-100">

                    <div
                        class="min-w-[40px] w-10 h-10
                        flex items-center justify-center
                        bg-indigo-200 rounded-full
                        font-bold text-indigo-700">

                        0

                    </div>

                    <div>

                        <p class="text-sm font-semibold">

                            Tidak Sama sekali

                        </p>

                        <p class="text-xs text-gray-400">

                            Atau tidak pernah.

                        </p>

                    </div>

                </div>

                <!-- 1 -->
                <div
                    class="bg-white rounded-2xl
                    p-4 flex items-center gap-3
                    shadow-sm border border-gray-100">

                    <div
                        class="min-w-[40px] w-10 h-10
                        flex items-center justify-center
                        bg-indigo-200 rounded-full
                        font-bold text-indigo-700">

                        1

                    </div>

                    <div>

                        <p class="text-sm font-semibold">

                            Sampai di tingkat tertentu

                        </p>

                        <p class="text-xs text-gray-400">

                            Atau kadang-kadang.

                        </p>

                    </div>

                </div>

                <!-- 2 -->
                <div
                    class="bg-white rounded-2xl
                    p-4 flex items-center gap-3
                    shadow-sm border border-gray-100">

                    <div
                        class="min-w-[40px] w-10 h-10
                        flex items-center justify-center
                        bg-indigo-200 rounded-full
                        font-bold text-indigo-700">

                        2

                    </div>

                    <div>

                        <p class="text-sm font-semibold">

                            Lumayan Sering

                        </p>

                        <p class="text-xs text-gray-400">

                            Atau cukup sering.

                        </p>

                    </div>

                </div>

                <!-- 3 -->
                <div
                    class="bg-white rounded-2xl
                    p-4 flex items-center gap-3
                    shadow-sm border border-gray-100">

                    <div
                        class="min-w-[40px] w-10 h-10
                        flex items-center justify-center
                        bg-indigo-200 rounded-full
                        font-bold text-indigo-700">

                        3

                    </div>

                    <div>

                        <p class="text-sm font-semibold">

                            Sangat sesuai

                        </p>

                        <p class="text-xs text-gray-400">

                            Atau sering sekali.

                        </p>

                    </div>

                </div>

            </div>

            <!-- DIVIDER INFO -->
            <div
                class="flex items-center justify-center
                bg-gray-200 rounded-full
                px-4 md:px-6 py-3
                mt-8 text-sm tracking-wide">

                <span class="pr-4 md:pr-6 text-gray-700">

                    Pilihan Ganda

                </span>

                <div class="w-[2px] h-6 bg-gray-300"></div>

                <span class="pl-4 md:pl-6 text-gray-700">

                    21 Pertanyaan

                </span>

            </div>

            <!-- BUTTON -->
            <a href="/tes/1"
                class="block text-center
                mt-8 py-4 rounded-full
                bg-gradient-to-r from-indigo-400 to-indigo-600
                text-black font-bold tracking-wide
                shadow-md hover:opacity-90 transition
                text-sm md:text-base">

                MULAI TES SEKARANG

            </a>

        </div>

        <!-- RIGHT IMAGE -->
        <div class="hidden lg:block">

            <img src="/images/illustration.png" class="w-[320px] xl:w-[420px]">

        </div>

    </section>
@endsection
