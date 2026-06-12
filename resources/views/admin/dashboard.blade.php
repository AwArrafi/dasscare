@extends('layouts.admin')

@section('content')
    <!-- STAT CARD -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- USER -->
        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <h3 class="text-gray-400 text-sm mb-2">

                Total User

            </h3>

            <h1 class="text-4xl font-bold text-indigo-600">

                {{ $totalUsers }}

            </h1>

        </div>

        <!-- TES -->
        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <h3 class="text-gray-400 text-sm mb-2">

                Total Tes

            </h3>

            <h1 class="text-4xl font-bold text-indigo-600">

                {{ $totalTests }}
            </h1>

        </div>

        <!-- SELF CARE -->
        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <h3 class="text-gray-400 text-sm mb-2">

                Self-Care

            </h3>

            <h1 class="text-4xl font-bold text-indigo-600">

                {{ $totalRecommendations }}
            </h1>

        </div>

    </div>

    <!-- GRAFIK BESAR -->
    <div class="mt-8">

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <h2 class="text-xl font-semibold text-gray-800 mb-6">

                Statistik Hasil Tes Bulanan

            </h2>

            <canvas id="monthlyChart" height="100"></canvas>

        </div>

    </div>

    <!-- GRAFIK BAWAH -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mt-8">


        <!-- LINE -->
        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <h2 class="text-xl font-semibold text-gray-800 mb-6">

                Tren Pengguna

            </h2>

            <canvas id="userChart"></canvas>

        </div>

    </div>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // BAR CHART
        new Chart(
            document.getElementById('monthlyChart'), {
                type: 'bar',

                data: {

                    labels: @json($months),

                    datasets: [

                        {
                            label: 'Jumlah Tes',

                            data: @json($monthlyTests),

                            backgroundColor: '#4F46E5',
                            borderRadius: 12
                        }

                    ]
                },

                options: {

                    responsive: true,

                    plugins: {

                        legend: {

                            display: false

                        }

                    }

                }

            }
        );

        // DONUT
        new Chart(
            document.getElementById('riskChart'), {
                type: 'doughnut',

                data: {

                    labels: [
                        'Normal',
                        'Ringan',
                        'Sedang',
                        'Berat',
                        'Sangat Berat'
                    ],

                    datasets: [

                        {

                            data: [
                                40,
                                20,
                                20,
                                12,
                                8
                            ],

                            backgroundColor: [

                                '#22C55E',
                                '#84CC16',
                                '#EAB308',
                                '#F97316',
                                '#EF4444'

                            ]

                        }

                    ]
                }

            }
        );

        // LINE CHART
        new Chart(
            document.getElementById('userChart'), {
                type: 'line',

                data: {

                    labels: @json($months),

                    datasets: [

                        {

                            label: 'User',

                            data: @json($monthlyUsers),

                            borderColor: '#4F46E5',

                            backgroundColor: 'rgba(79,70,229,0.1)',

                            fill: true,

                            tension: 0.4

                        }

                    ]

                },

                options: {

                    responsive: true

                }

            }
        );
    </script>
@endsection
