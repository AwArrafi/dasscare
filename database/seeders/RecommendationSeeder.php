<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recommendation;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Recommendation::create([
            'dimension' => 'depression',
            'category' => 'Normal',
            'content' => 'Menjaga pola tidur teratur (7–9 jam), olahraga ringan 3–4x/minggu, aktivitas sosial rutin, gratitude journaling'
        ]);

        Recommendation::create([
            'dimension' => 'depression',
            'category' => 'Ringan',
            'content' => 'Journaling emosi, mindfulness 10–15 menit/hari, penjadwalan aktivitas menyenangkan, menjaga interaksi sosial'
        ]);

        Recommendation::create([
            'dimension' => 'depression',
            'category' => 'Sedang',
            'content' => 'Guided CBT self-help module, monitoring mood harian, latihan cognitive restructuring sederhana, konsultasi awal (opsional)'
        ]);

        Recommendation::create([
            'dimension' => 'depression',
            'category' => 'Berat',
            'content' => 'Konseling psikolog, terapi CBT formal, dukungan keluarga/teman, monitoring berkala'
        ]);

        Recommendation::create([
            'dimension' => 'depression',
            'category' => 'Sangat Berat',
            'content' => 'Konsultasi profesional segera, evaluasi klinis menyeluruh, pendampingan intensif (self-care bersifat pendukung)'
        ]);



        Recommendation::create([
            'dimension' => 'anxiety',
            'category' => 'Normal',
            'content' => 'Edukasi manajemen stres, olahraga teratur, teknik pernapasan ringan'
        ]);

        Recommendation::create([
            'dimension' => 'anxiety',
            'category' => 'Ringan',
            'content' => 'Latihan pernapasan diafragma, progressive muscle relaxation, pembatasan konsumsi kafein'
        ]);

        Recommendation::create([
            'dimension' => 'anxiety',
            'category' => 'Sedang',
            'content' => 'Guided exposure ringan, mindfulness meditation, CBT-based anxiety workbook'
        ]);

        Recommendation::create([
            'dimension' => 'anxiety',
            'category' => 'Berat',
            'content' => 'Konseling psikolog, CBT terstruktur'
        ]);

        Recommendation::create([
            'dimension' => 'anxiety',
            'category' => 'Sangat Berat',
            'content' => 'Konsultasi profesional prioritas, evaluasi klinis, monitoring serangan panik'
        ]);



        Recommendation::create([
            'dimension' => 'stress',
            'category' => 'Normal',
            'content' => 'Manajemen waktu, olahraga rutin, sleep hygiene'
        ]);

        Recommendation::create([
            'dimension' => 'stress',
            'category' => 'Ringan',
            'content' => 'Teknik relaksasi napas 4-7-8, micro-break setiap 2 jam kerja'
        ]);

        Recommendation::create([
            'dimension' => 'stress',
            'category' => 'Sedang',
            'content' => 'Mindfulness-Based Stress Reduction (MBSR), time-blocking schedule, pembatasan beban kerja'
        ]);

        Recommendation::create([
            'dimension' => 'stress',
            'category' => 'Berat',
            'content' => 'Konsultasi psikolog, evaluasi beban kerja, aktivasi dukungan sosial'
        ]);

        Recommendation::create([
            'dimension' => 'stress',
            'category' => 'Sangat Berat',
            'content' => 'Intervensi profesional, pengurangan paparan stresor utama, rujukan bila diperlukan'
        ]);
    }
}
