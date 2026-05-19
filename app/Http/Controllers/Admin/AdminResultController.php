<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminResultController extends Controller
{
    public function index()
    {
        $results = Result::with('user')->latest()->paginate(10);

        return view('admin.results.index', compact('results'));
    }

    public function show($id)
    {

        $result = Result::with('user')->findOrFail($id);

        // WARNA
        $warnaDepresi = $this->getColor($result->category_depression);

        $warnaAnxiety = $this->getColor($result->category_anxiety);

        $warnaStress = $this->getColor($result->category_stress);

        // REKOMENDASI
        $rekomendasiDepresi = 'Konseling Psikolog, bantuan profesional';

        $rekomendasiAnxiety = 'Teknik relaksasi napas 4-7-8, micro-break setiap 2 jam kerja';

        $rekomendasiStress = 'Guided exposure ringan, mindfulness meditation';

        return view('admin.results.show', [

            'result' => $result,

            'warnaDepresi' => $warnaDepresi,
            'warnaAnxiety' => $warnaAnxiety,
            'warnaStress' => $warnaStress,

            'rekomendasiDepresi' => $rekomendasiDepresi,
            'rekomendasiAnxiety' => $rekomendasiAnxiety,
            'rekomendasiStress' => $rekomendasiStress,

        ]);
    }

    private function getColor($kategori)
    {
        if (in_array($kategori, ['Berat', 'Sangat Berat'])) {
            return 'bg-red-500';
        }

        if ($kategori == 'Sedang') {
            return 'bg-yellow-500 text-black';
        }

        return 'bg-green-500 text-black';
    }
}
