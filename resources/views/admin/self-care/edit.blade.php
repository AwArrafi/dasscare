@extends('layouts.admin')

@section('content')
    <div class="p-10">

        <div class="max-w-4xl mx-auto">

            <!-- CARD -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10">

                <!-- HEADER -->
                <div class="mb-10">

                    <h1 class="text-4xl font-bold text-gray-800">

                        Edit Self-Care

                    </h1>

                    <p class="text-gray-500 mt-2">

                        Kelola rekomendasi self-care berdasarkan kategori psikologis.

                    </p>

                </div>

                <!-- FORM -->
                <!-- FORM -->
                <form action="{{ route('self-care.update', $recommendation->id) }}" method="POST" class="space-y-10">

                    @csrf
                    @method('PUT')

                    <!-- DIMENSION -->
                    <div class="space-y-3">

                        <label class="block text-sm font-semibold text-gray-700">

                            Dimensi

                        </label>

                        <select name="dimension"
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-6 py-5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">

                            <option value="depression" {{ $recommendation->dimension == 'depression' ? 'selected' : '' }}>

                                Depression

                            </option>

                            <option value="anxiety" {{ $recommendation->dimension == 'anxiety' ? 'selected' : '' }}>

                                Anxiety

                            </option>

                            <option value="stress" {{ $recommendation->dimension == 'stress' ? 'selected' : '' }}>

                                Stress

                            </option>

                        </select>

                    </div>

                    <!-- CATEGORY -->
                    <div class="space-y-3">

                        <label class="block text-sm font-semibold text-gray-700">

                            Kategori

                        </label>

                        <select name="category"
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-6 py-5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">

                            <option value="Normal" {{ $recommendation->category == 'Normal' ? 'selected' : '' }}>

                                Normal

                            </option>

                            <option value="Ringan" {{ $recommendation->category == 'Ringan' ? 'selected' : '' }}>

                                Ringan

                            </option>

                            <option value="Sedang" {{ $recommendation->category == 'Sedang' ? 'selected' : '' }}>

                                Sedang

                            </option>

                            <option value="Berat" {{ $recommendation->category == 'Berat' ? 'selected' : '' }}>

                                Berat

                            </option>

                            <option value="Sangat Berat"
                                {{ $recommendation->category == 'Sangat Berat' ? 'selected' : '' }}>

                                Sangat Berat

                            </option>

                        </select>

                    </div>

                    <!-- CONTENT -->
                    <div class="space-y-3">

                        <label class="block text-sm font-semibold text-gray-700">

                            Rekomendasi Self-Care

                        </label>

                        <textarea name="content" rows="6"
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50 px-6 py-5 text-gray-700 leading-relaxed focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none">{{ $recommendation->content }}</textarea>

                    </div>

                    <!-- BUTTON -->
                    <div class="flex items-center gap-5 pt-4">

                        <!-- UPDATE -->
                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 transition text-white px-8 py-4 rounded-2xl shadow-sm font-medium">

                            Simpan Perubahan

                        </button>

                </form>

                <!-- DELETE -->
                <form action="{{ route('self-care.destroy', $recommendation->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Yakin ingin menghapus rekomendasi ini?')"
                        class="bg-red-500 hover:bg-red-600 transition text-white px-8 py-4 rounded-2xl shadow-sm font-medium">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

    </div>

    </div>

    </div>
@endsection
