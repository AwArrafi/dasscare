<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recommendation;

class AdminResultController extends Controller
{
    public function index()
    {
        $results = Result::with('user')->latest()->paginate(5);

        return view('admin.results.index', compact('results'));
    }



    public function show($id)
    {

        $result = Result::with('user')->findOrFail($id);

        // WARNA
        $warnaDepresi = $this->getColor($result->category_depression);

        $warnaAnxiety = $this->getColor($result->category_anxiety);

        $warnaStress = $this->getColor($result->category_stress);

        $widthDepresi = $this->getWidth($result->category_depression);

        $widthAnxiety = $this->getWidth($result->category_anxiety);

        $widthStress = $this->getWidth($result->category_stress);

        // REKOMENDASI
        $rekomendasiDepresi = Recommendation::where(
            'dimension',
            'depression'
        )->where(
            'category',
            $result->category_depression
        )->first();

        $rekomendasiAnxiety = Recommendation::where(
            'dimension',
            'anxiety'
        )->where(
            'category',
            $result->category_anxiety
        )->first();

        $rekomendasiStress = Recommendation::where(
            'dimension',
            'stress'
        )->where(
            'category',
            $result->category_stress
        )->first();

        return view('admin.results.show', [

            'result' => $result,

            'warnaDepresi' => $warnaDepresi,
            'warnaAnxiety' => $warnaAnxiety,
            'warnaStress' => $warnaStress,

            'rekomendasiDepresi' => $rekomendasiDepresi,
            'rekomendasiAnxiety' => $rekomendasiAnxiety,
            'rekomendasiStress' => $rekomendasiStress,

            'widthDepresi' => $widthDepresi,
            'widthAnxiety' => $widthAnxiety,
            'widthStress' => $widthStress,

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

    private function getWidth($kategori)
    {
        if (in_array($kategori, ['Berat', 'Sangat Berat'])) {
            return '100%';
        }

        if ($kategori == 'Sedang') {
            return '65%';
        }

        return '35%';
    }
}
