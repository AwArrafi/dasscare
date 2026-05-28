@extends('layouts.admin')

@section('content')
    <div class="p-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-8">

            <h1 class="text-3xl font-bold text-gray-800">

                Data Self-Care

            </h1>

            <a href="{{ route('self-care.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 transition text-white px-5 py-3 rounded-2xl shadow-sm font-medium">

                + Tambah Rekomendasi

            </a>

        </div>

        <!-- FLASH MESSAGE -->
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
                class="mb-6 rounded-2xl bg-green-50 border border-green-200 text-green-700 px-5 py-4">

                {{ session('success') }}

            </div>
        @endif

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-500">

                        <tr>

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
