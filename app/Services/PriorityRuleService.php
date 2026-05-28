<?php

namespace App\Services;

class PriorityRuleService
{
    public function check($depresi, $anxiety, $stress)
    {

        /*
        |--------------------------------------------------------------------------
        | RISIKO TINGGI
        |--------------------------------------------------------------------------
        */

        if (

            in_array($depresi, ['Berat', 'Sangat Berat']) &&
            in_array($anxiety, ['Berat', 'Sangat Berat'])

        ) {

            return [

                'status' => 'Risiko Tinggi',

                'priority' => 'Rekomendasi profesional + monitoring intensif',

                'badge' => 'SEGERA',

                'description' =>
                'Kondisi depresi dan kecemasan berada pada tingkat tinggi sehingga diperlukan intervensi profesional dan pemantauan berkala.',

                'color' => 'red',

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | PRIORITAS KONSULTASI
        |--------------------------------------------------------------------------
        */

        if ($depresi === 'Sangat Berat') {

            return [

                'status' => 'Prioritas Konsultasi',

                'priority' => 'Rujukan profesional segera',

                'badge' => 'KRITIS',

                'description' =>
                'Tingkat depresi sangat berat memerlukan evaluasi dan konsultasi profesional sesegera mungkin.',

                'color' => 'red',

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | MONITORING INTENSIF
        |--------------------------------------------------------------------------
        */

        if (

            $stress === 'Sangat Berat' &&
            in_array($depresi, ['Sedang', 'Berat', 'Sangat Berat'])

        ) {

            return [

                'status' => 'Monitoring Intensif',

                'priority' => 'Pendampingan dan evaluasi berkala',

                'badge' => 'TINGGI',

                'description' =>
                'Kondisi stres sangat berat disertai depresi memerlukan monitoring kondisi psikologis secara berkala.',

                'color' => 'yellow',

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | RISIKO RENDAH
        |--------------------------------------------------------------------------
        */

        if (

            $depresi === 'Normal' &&
            $anxiety === 'Normal' &&
            $stress === 'Normal'

        ) {

            return [

                'status' => 'Risiko Rendah',

                'priority' => 'Edukasi preventif & self-maintenance',

                'badge' => 'RENDAH',

                'description' =>
                'Kondisi psikologis berada pada kategori normal sehingga fokus pada pencegahan dan menjaga kestabilan mental.',

                'color' => 'green',

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | DEFAULT
        |--------------------------------------------------------------------------
        */

        return [

            'status' => 'Perlu Perhatian',

            'priority' => 'Self-care dan evaluasi berkala',

            'badge' => 'MENENGAH',

            'description' =>
            'Disarankan melakukan self-care rutin dan memantau perkembangan kondisi psikologis.',

            'color' => 'blue',

        ];
    }
}
