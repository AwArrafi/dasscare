@extends('layouts.admin')

@section('content')
    <div class="p-10">

        <!-- TITLE -->
        <h1 class="text-4xl font-bold text-gray-800 mb-8">
            Data Riwayat Tes
        </h1>

        <!-- TABLE CARD -->
        <div
            class="bg-white rounded-3xl
            border border-gray-100/80
            shadow-[0_2px_8px_rgba(0,0,0,0.03)]
            overflow-hidden">

            <!-- TABLE -->
            <table class="w-full">

                <!-- HEADER -->
                <thead class="bg-gray-200 border-b border-gray-300">

                    <tr class="text-left text-black-500 text-sm">

                        <th class="px-6 py-5">ID</th>

                        <th class="px-6 py-5 text-left">
                            Nama
                        </th>

                        <th class="px-6 py-5">
                            Tanggal
                        </th>

                        <th class="px-6 py-5">
                            D/KET
                        </th>

                        <th class="px-6 py-5">
                            A/KET
                        </th>

                        <th class="px-6 py-5">
                            S/KET
                        </th>

                        <th class="px-6 py-5 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @foreach ($results as $result)
                        <tr
                            class="border-b border-gray-50
                            hover:bg-gray-50
                            transition duration-200">

                            <!-- ID -->
                            <td class="px-6 py-5">

                                {{ str_pad($result->id, 5, '0', STR_PAD_LEFT) }}

                            </td>

                            <!-- NAME -->
                            <td class="px-6 py-5">

                                {{ $result->user->name }}

                            </td>

                            <!-- DATE -->
                            <td class="px-6 py-5">

                                {{ $result->created_at->format('d M Y') }}

                            </td>

                            <!-- DEPRESI -->
                            <td class="px-6 py-5">

                                {{ $result->score_depression }}
                                /
                                {{ $result->category_depression }}

                            </td>

                            <!-- ANXIETY -->
                            <td class="px-6 py-5">

                                {{ $result->score_anxiety }}
                                /
                                {{ $result->category_anxiety }}

                            </td>

                            <!-- STRESS -->
                            <td class="px-6 py-5">

                                {{ $result->score_stress }}
                                /
                                {{ $result->category_stress }}

                            </td>

                            <!-- BUTTON -->
                            <td class="px-6 py-5 text-center">

                                <a href="/admin/results/{{ $result->id }}"
                                    class="bg-blue-500 hover:bg-blue-600
                                    text-white px-5 py-2 rounded-xl
                                    transition">

                                    Detail

                                </a>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

            <!-- PAGINATION -->
            <div class="px-6 py-5 border-t border-gray-100 bg-white">

                {{ $results->links() }}

            </div>

        </div>

    </div>
@endsection
