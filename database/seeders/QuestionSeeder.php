<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $questions = [
            ['Saya merasa bahwa diri saya menjadi marah karena hal sepele', 'S'],
            ['Saya merasa mulut saya kering', 'A'],
            ['Saya sama sekali tidak dapat merasakan perasaan positif', 'D'],
            ['Saya mengalami kesulitan bernapas (nafas terengah-engah dalam kondisi tidak melakukan aktifitas berat)', 'A'],
            ['Saya sepertinya tidak tidak kuat lagi untuk melakukan suatu kegiatan', 'D'],
            ['Saya cenderung bereaksi berlebihan terhadap suatu situasi', 'S'],
            ['Saya merasa gemetar', 'A'],
            ['Saya merasa telah menggunakan banyak energi disaat merasa cemas', 'S'],
            ['Saya khawatir tentang situasi yang membuat panik dan mempermalukan diri sendiri', 'A'],
            ['Saya merasa tidak ada yang bisa diharapkan di masa depan', 'D'],
            ['Saya sedang merasa gelisah', 'S'],
            ['Saya merasa sulit untuk rileks', 'S'],
            ['Saya merasa sedih dan tertekan', 'D'],
            ['Saya sulit untuk sabar dalam menghadapi gangguan terhadap hal yang sedang saya lakukan', 'S'],
            ['Saya merasa hampir panik', 'A'],
            ['Saya tidak antusias terhadap apapun', 'D'],
            ['Saya merasa tidak berharga sebagai seorang manusia', 'D'],
            ['Saya mudah tersinggung', 'S'],
            ['Saya merasakan perubahan detak jantung walaupun tidak melakukan aktivitas fisik', 'A'],
            ['Saya merasa takut tanpa alasan yang jelas', 'A'],
            ['Saya merasa hidup tidak bermamfaat', 'D'],
        ];

        foreach ($questions as $q) {
            Question::create([
                'text' => $q[0],
                'dimension' => $q[1],
            ]);
        }
    }
}
