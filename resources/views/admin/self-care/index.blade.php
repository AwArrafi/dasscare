@extends('layouts.admin')

@section('content')
    <div class="p-8">

        <!-- TITLE -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Data Self-Care
            </h1>
        </div>

        <!-- FLASH MESSAGE -->
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
                class="mb-6 rounded-2xl bg-green-50 border border-green-200 text-green-700 px-5 py-4">

                {{ session('success') }}

            </div>
        @endif

        <!-- FILTER + ADD BUTTON -->
        <div class="flex items-center justify-between gap-4 mb-6">

            <!-- FILTER FORM -->
            <form action="/admin/self-care" method="GET" class="flex items-center gap-3">

                <!-- SEARCH BAR -->
                <div class="relative w-[420px]">

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari isi rekomendasi..."
                        class="w-full px-5 py-3 rounded-full
                        bg-white border border-gray-200
                        text-sm text-gray-700 placeholder:text-gray-400
                        shadow-sm
                        focus:ring-2 focus:ring-blue-500
                        focus:border-blue-500
                        outline-none transition">
                </div>

                <!-- FILTER DIMENSION -->
                <select name="dimension"
                    class="px-4 py-3 rounded-full bg-white border border-gray-200
                    text-sm text-gray-600 shadow-sm cursor-pointer
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                    <option value="">Semua Dimensi</option>

                    <option value="depression" {{ request('dimension') == 'depression' ? 'selected' : '' }}>
                        Depresi
                    </option>

                    <option value="anxiety" {{ request('dimension') == 'anxiety' ? 'selected' : '' }}>
                        Kecemasan
                    </option>

                    <option value="stress" {{ request('dimension') == 'stress' ? 'selected' : '' }}>
                        Stress
                    </option>

                </select>

                <!-- FILTER CATEGORY -->
                <select name="category"
                    class="px-4 py-3 rounded-full bg-white border border-gray-200
                    text-sm text-gray-600 shadow-sm cursor-pointer
                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                    <option value="">Semua Kategori</option>

                    <option value="Normal" {{ request('category') == 'Normal' ? 'selected' : '' }}>
                        Normal
                    </option>

                    <option value="Ringan" {{ request('category') == 'Ringan' ? 'selected' : '' }}>
                        Ringan
                    </option>

                    <option value="Sedang" {{ request('category') == 'Sedang' ? 'selected' : '' }}>
                        Sedang
                    </option>

                    <option value="Berat" {{ request('category') == 'Berat' ? 'selected' : '' }}>
                        Berat
                    </option>

                    <option value="Sangat Berat" {{ request('category') == 'Sangat Berat' ? 'selected' : '' }}>
                        Sangat Berat
                    </option>

                </select>

                <!-- BUTTON FILTER -->
                <button type="submit"
                    class="px-6 py-3 rounded-full bg-blue-500 hover:bg-blue-600
                    text-white text-sm font-medium shadow-sm transition">
                    Filter
                </button>

                <!-- RESET -->
                @if (request('search') || request('dimension') || request('category'))
                    <a href="/admin/self-care"
                        class="px-5 py-3 rounded-full bg-white border border-gray-200
                        text-gray-700 text-sm font-medium shadow-sm hover:bg-gray-100 transition">
                        Reset
                    </a>
                @endif

            </form>

            <!-- BUTTON ADD -->
            <a href="{{ route('self-care.create') }}"
                class="shrink-0 bg-blue-500 hover:bg-blue-600 transition
                text-white px-6 py-3 rounded-full shadow-sm
                font-medium text-sm whitespace-nowrap">

                + Tambah Rekomendasi

            </a>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-sm border border-black overflow-hidden">

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-200 border-b border-black text-black">

                        <tr class="border-b border-black">

                            <th class="px-6 py-5 text-left">ID</th>

                            <th class="px-6 py-5 text-left">Dimensi</th>

                            <th class="px-6 py-5 text-left">Kategori</th>

                            <th class="px-6 py-5 text-left">Rekomendasi</th>

                            <th class="px-6 py-5 text-left">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($recommendations as $recommendation)
                            <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                                <td class="px-6 py-6">

                                    {{ $recommendation->id }}

                                </td>

                                <td class="px-6 py-6 capitalize">

                                    {{ $recommendation->dimension }}

                                </td>

                                <td class="px-6 py-6">

                                    {{ $recommendation->category }}

                                </td>

                                <td class="px-6 py-6 text-gray-600 max-w-lg">

                                    {{ $recommendation->content }}

                                </td>

                                <td class="px-6 py-6">

                                    <div class="flex items-center gap-3">

                                        <a href="{{ route('self-care.edit', $recommendation->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 transition text-white px-4 py-2 rounded-xl text-sm font-medium">

                                            Edit

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-6 py-10 text-center text-gray-400">

                                    Belum ada data rekomendasi.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- PAGINATION -->
            <div class="px-6 py-5 border-t border-gray-100">

                {{ $recommendations->links() }}

            </div>

        </div>

    </div>
@endsection
