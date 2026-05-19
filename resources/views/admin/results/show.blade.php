@extends('layouts.admin')

@section('content')
    <div class="p-8">

        <!-- TITLE -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            Data Riwayat Tes
        </h1>

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-500">

                        <tr>

                            <th class="px-6 py-5 text-left">ID</th>
                            <th class="px-6 py-5 text-left">Nama</th>
                            <th class="px-6 py-5 text-left">Tanggal</th>
                            <th class="px-6 py-5 text-left">D/KET</th>
                            <th class="px-6 py-5 text-left">A/KET</th>
                            <th class="px-6 py-5 text-left">S/KET</th>
                            <th class="px-6 py-5 text-left">Pekerjaan</th>
                            <th class="px-6 py-5 text-left">Asal Kota</th>
                            <th class="px-6 py-5 text-left">E-Mail</th>
                            <th class="px-6 py-5 text-left">No.Hp</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr class="border-t border-gray-100">

                            <td class="px-6 py-6">
                                {{ str_pad($result->id, 5, '0', STR_PAD_LEFT) }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->user->name }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->score_depression }}
                                /
                                {{ $result->category_depression }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->score_anxiety }}
                                /
                                {{ $result->category_anxiety }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->score_stress }}
                                /
                                {{ $result->category_stress }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->user->job }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->user->city }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->user->email }}
                            </td>

                            <td class="px-6 py-6">
                                {{ $result->user->phone }}
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- CONTENT -->
            <!-- CONTENT -->
            <div class="px-6 pb-8 pt-12 border-t border-gray-100">

                <div class="space-y-8">

                    <!-- DEPRESI -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                        <div
                            class="{{ $warnaDepresi }} rounded-lg px-5 py-4 flex justify-between items-center text-white font-semibold">

                            <span>
                                Depresi ({{ $result->category_depression }})
                            </span>

                            <span>
                                {{ $result->score_depression }}
                            </span>

                        </div>

                        <p class="text-2xl text-gray-700 leading-relaxed">

                            {{ $rekomendasiDepresi }}

                        </p>

                    </div>

                    <!-- ANXIETY -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                        <div
                            class="{{ $warnaAnxiety }} rounded-lg px-5 py-4 flex justify-between items-center text-white font-semibold">

                            <span>
                                Kecemasan ({{ $result->category_anxiety }})
                            </span>

                            <span>
                                {{ $result->score_anxiety }}
                            </span>

                        </div>

                        <p class="text-2xl text-gray-700 leading-relaxed">

                            {{ $rekomendasiAnxiety }}

                        </p>

                    </div>

                    <!-- STRESS -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                        <div
                            class="{{ $warnaStress }} rounded-lg px-5 py-4 flex justify-between items-center text-white font-semibold">

                            <span>
                                Stress ({{ $result->category_stress }})
                            </span>

                            <span>
                                {{ $result->score_stress }}
                            </span>

                        </div>

                        <p class="text-2xl text-gray-700 leading-relaxed">

                            {{ $rekomendasiStress }}

                        </p>

                    </div>

                    <!-- BUTTON -->
                    <div class="pt-4">

                        <button class="bg-blue-500 hover:bg-blue-600 transition text-white px-6 py-3 rounded-xl shadow">

                            Download PDF

                        </button>

                    </div>

                </div>

            </div>
        </div>
    @endsection
