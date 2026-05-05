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
            ['Saya merasa sulit untuk beristirahat', 'S'],
            ['Saya merasa mulut saya kering', 'A'],
            ['Saya tidak dapat merasakan perasaan positif', 'D'],
            ['Saya mengalami kesulitan bernapas', 'A'],
            ['Saya merasa sulit untuk memulai sesuatu', 'D'],
            ['Saya bereaksi berlebihan terhadap situasi', 'S'],
            ['Saya merasa gemetar', 'A'],
            ['Saya merasa menggunakan banyak energi untuk cemas', 'S'],
            ['Saya khawatir tentang situasi yang membuat panik', 'A'],
            ['Saya merasa tidak ada yang bisa diharapkan', 'D'],
            ['Saya merasa gelisah', 'S'],
            ['Saya sulit untuk rileks', 'S'],
            ['Saya merasa sedih dan tertekan', 'D'],
            ['Saya tidak sabar terhadap hal kecil', 'S'],
            ['Saya merasa hampir panik', 'A'],
            ['Saya tidak antusias terhadap apapun', 'D'],
            ['Saya merasa tidak berharga', 'D'],
            ['Saya mudah tersinggung', 'S'],
            ['Saya merasakan detak jantung tanpa aktivitas', 'A'],
            ['Saya merasa takut tanpa alasan', 'A'],
            ['Saya merasa hidup tidak berarti', 'D'],
        ];

        foreach ($questions as $q) {
            Question::create([
                'text' => $q[0],
                'dimension' => $q[1],
            ]);
        }
    }
}
