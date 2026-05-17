@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-3 gap-6">

        <!-- CARD -->
        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <h3 class="text-gray-400 text-sm mb-2">
                Total User
            </h3>

            <h1 class="text-4xl font-bold text-indigo-600">
                120
            </h1>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <h3 class="text-gray-400 text-sm mb-2">
                Total Tes
            </h3>

            <h1 class="text-4xl font-bold text-indigo-600">
                540
            </h1>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <h3 class="text-gray-400 text-sm mb-2">
                Self-Care
            </h3>

            <h1 class="text-4xl font-bold text-indigo-600">
                24
            </h1>

        </div>

    </div>
@endsection
