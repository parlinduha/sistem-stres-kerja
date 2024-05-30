<?php

namespace Database\Seeders;

use App\Models\Sickness;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SicknessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sicknesses = [
            [
                "code_sickness" => "P001",
                "name_sickness" => "Gangguan Mood",
                "description" => 'Ganggguan mood yang terjadi pada seseorang ini umumnya terjadi karena banyaknya tekanan yang menimpa dirinya dan cenderung terlarut dalam tekanan dapat meningkatkan resiko berkembangnya gangguan mood yang kemudian dapat berubah menjadi depresi terutama depresi mayor. Hal ini terbukti pada suatu penelitian yang menemukan bahwa dalam sekitar empat dari lima kasus, depresi mayor diawali oleh peristiwa kehidupan yang penuh tekanan.'

            ],
            [
                "code_sickness" => "P002",
                "name_sickness" => "Depresi Ringan",
                "description" => 'Depresi ringan ini di identikkan dengan depresi minor yang merupakan perasaan melankolis yang berlangsung sebentar dan disebabkan oleh sebuah kejadian yang tragis atau mengandung ancaman, atau kehilangan sesuatu yang penting dalam kehidupan si penderita (Meier, 2000: 20-21). Orang dengan depresi ringan ini setidaknya memiliki 2 dari gejala lainnya dan 2-3 dari gejala utama. (Maslim, 2003, 64).'

            ],
            [
                "code_sickness" => "P003",
                "name_sickness" => "Depresi Sedang",
                "description" => 'Depresi sedang ini di alami oleh penderita selama kurang 2 minggu, dan orang dengan depresi sedang ini mengalami kesulitan nyata untuk meneruskan kegiatan social, pekerjaan dan urusan rumah tangga. Orang dengan depresi sedang ini setidaknya memiliki 2-3 dari gejala utama dan 3-4 dari gejala lainnya (Maslim,  2003: 64).'

            ],
            [
                "code_sickness" => "P004",
                "name_sickness" => "Depresi Berat",
                "description" => 'Depresi mayor merupakan salah satu gangguan yang prevalensinya paling tinggi di antara berbagai gangguan (Davidson, 2006: 374). Depresi mayor adalah kemurungan yang dalam dan menyebar luas. Perasaan murung ini mampu menyedot semangat dan energy serta menyelubungi kehidupan si penderita seperti asap yang tebak dan menyesakkan dada. Depresi mayor ini dapat berlangsung cukup lama mulai dari empat belas hari sampai beberapa tahun. Hal ini menyebabkan penderita akan sangat sulit utnuk berfungsi dengan baik di lingkungannya. Orang dengan depresi mayor ini juga terkadang disertai dengan keinginan untuk bunuh diri atau bahkan keinginan untuk mati. Orang yang sangat tertekan, mereka akan mengalami dampak hal-hal yang mengganggu kejiwaan mereka seperti gila, paranoia atau halusinasi pendengaran (Meier, 2000: 25-26).'

            ],
        ];

        foreach ($sicknesses as $sickness) {
            Sickness::create($sickness);
        }
    }
}
