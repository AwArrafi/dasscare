@extends('layouts.admin')

@section('content')
    <div class="p-10">

        <!-- TITLE -->
        <h1 class="text-4xl font-bold text-gray-800 mb-8">
            Data Riwayat Tes
        </h1>

        <form action="/admin/results" method="GET" class="flex flex-col lg:flex-row lg:items-center gap-3">

            <!-- SEARCH BAR -->
            <div class="relative flex-1 max-w-xl">

                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="   Cari nama, username, atau email..."
                    class="w-full pl-12 pr-4 py-3 rounded-full
                bg-white border border-gray-200
                text-sm text-gray-700
                shadow-sm
                focus:ring-2 focus:ring-indigo-500
                focus:border-indigo-500
                outline-none transition">
            </div>

            <!-- FILTER DEPRESI -->
            <select name="depression_category"
                class="h-12 min-w-[135px] px-5 rounded-full
    bg-white border border-gray-200
    text-sm text-gray-700 shadow-sm cursor-pointer
    focus:ring-2 focus:ring-indigo-500
    focus:border-indigo-500 outline-none transition">
                <option value="">Depresi</option>
                <option value="Normal" {{ request('depression_category') == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Ringan" {{ request('depression_category') == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                <option value="Sedang" {{ request('depression_category') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Berat" {{ request('depression_category') == 'Berat' ? 'selected' : '' }}>Berat</option>
                <option value="Sangat Berat" {{ request('depression_category') == 'Sangat Berat' ? 'selected' : '' }}>Sangat
                    Berat</option>
            </select>

            <!-- FILTER KECEMASAN -->
            <select name="anxiety_category"
                class="h-12 min-w-[150px] px-5 rounded-full
    bg-white border border-gray-200
    text-sm text-gray-700 shadow-sm cursor-pointer
    focus:ring-2 focus:ring-indigo-500
    focus:border-indigo-500 outline-none transition">
                <option value="">Kecemasan</option>
                <option value="Normal" {{ request('anxiety_category') == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Ringan" {{ request('anxiety_category') == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                <option value="Sedang" {{ request('anxiety_category') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Berat" {{ request('anxiety_category') == 'Berat' ? 'selected' : '' }}>Berat</option>
                <option value="Sangat Berat" {{ request('anxiety_category') == 'Sangat Berat' ? 'selected' : '' }}>Sangat
                    Berat</option>
            </select>

            <!-- FILTER STRESS -->
            <select name="stress_category"
                class="h-12 min-w-[125px] px-5 rounded-full
    bg-white border border-gray-200
    text-sm text-gray-700 shadow-sm cursor-pointer
    focus:ring-2 focus:ring-indigo-500
    focus:border-indigo-500 outline-none transition">
                <option value="">Stress</option>
                <option value="Normal" {{ request('stress_category') == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Ringan" {{ request('stress_category') == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                <option value="Sedang" {{ request('stress_category') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Berat" {{ request('stress_category') == 'Berat' ? 'selected' : '' }}>Berat</option>
                <option value="Sangat Berat" {{ request('stress_category') == 'Sangat Berat' ? 'selected' : '' }}>Sangat
                    Berat</option>
            </select>

            <!-- DATE -->
            <input type="date" name="date" value="{{ request('date') }}"
                class="px-4 py-3 rounded-full bg-white border border-gray-200
            text-sm text-gray-600 shadow-sm
            focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">

            <!-- BUTTON SEARCH -->
            <button type="submit"
                class="px-6 py-3 rounded-full bg-blue-500 hover:bg-blue-600
            text-white text-sm font-medium shadow-sm transition">
                Filter
            </button>

            <!-- RESET -->
            @if (request('search') ||
                    request('depression_category') ||
                    request('anxiety_category') ||
                    request('stress_category') ||
                    request('date'))
                <a href="/admin/results"
                    class="px-5 py-3 rounded-full bg-blue-500 hover:bg-blue-600
                text-white text-sm font-medium transition">
                    Reset
                </a>
            @endif

        </form>

    </div>

    <!-- TABLE CARD -->
    <div
        class="bg-white rounded-3xl
            border border-black-100/80
            shadow-[0_2px_8px_rgba(0,0,0,0.03)]
            overflow-hidden">

        <!-- TABLE -->
        <table class="w-full">

            <!-- HEADER -->
            <thead class="bg-gray-200 border-b border-black-200">

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
