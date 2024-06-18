<?php

namespace Database\Seeders;

use App\Models\ValueCf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueCfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            // P01 => Tidak Stres
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G07',
                'mb' => 0.4,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G08',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G011',
                'mb' => 0.5,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G018',
                'mb' => 1.0,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G019',
                'mb' => 0.8,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G021',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G024',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G025',
                'mb' => 0.5,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G027',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G033',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G036',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G040',
                'mb' => 0.4,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P01',
                'code_sickness' => 'G041',
                'mb' => 0.6,
                'md' => 0.2
            ],
            // P02 => Stres Rendah
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G01',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G02',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G03',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G04',
                'mb' => 0.8,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G05',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G06',
                'mb' => 0.8,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G07',
                'mb' => 0.8,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G08',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G09',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G010',
                'mb' => 0.9,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G011',
                'mb' => 0.8,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G012',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G013',
                'mb' => 0.8,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G014',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G015',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G016',
                'mb' => 1.0,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G017',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G019',
                'mb' => 0.5,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G020',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G021',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G022',
                'mb' => 0.8,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G023',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G024',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G025',
                'mb' => 0.4,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G026',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G027',
                'mb' => 0.9,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G028',
                'mb' => 0.8,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G029',
                'mb' => 0.8,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G030',
                'mb' => 0.4,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G031',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G032',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G033',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G034',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G035',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G036',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G037',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P02',
                'code_sickness' => 'G038',
                'mb' => 0.8,
                'md' => 0.5
            ],
            // P03 => Stres Sedang
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G01',
                'mb' => 0.8,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G02',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G03',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G04',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G05',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G06',
                'mb' => 0.5,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G07',
                'mb' => 0.8,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G08',
                'mb' => 1.0,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G09',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G010',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G011',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G012',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G013',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G014',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G015',
                'mb' => 0.8,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G016',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G017',
                'mb' => 0.5,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G018',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G019',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G020',
                'mb' => 0.8,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G021',
                'mb' => 0.5,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G022',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G023',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G024',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G025',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G026',
                'mb' => 0.5,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G027',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G028',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G029',
                'mb' => 0.5,
                'md' => 0.1
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G030',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G031',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G032',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G033',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G035',
                'mb' => 0.8,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G036',
                'mb' => 0.6,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G037',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G040',
                'mb' => 0.8,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P03',
                'code_sickness' => 'G041',
                'mb' => 0.9,
                'md' => 0.5
            ],
            // P04 => Stres Tinggi
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G01',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G02',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G03',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G04',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G05',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G06',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G07',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G08',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G09',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G010',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G011',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G012',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G013',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G014',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G015',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G016',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G017',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G018',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G019',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G020',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G021',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G022',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G023',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G024',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G025',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G026',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G027',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G028',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G029',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G030',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G031',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G032',
                'mb' => 0.9,
                'md' => 0.5
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G033',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G034',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G035',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G036',
                'mb' => 0.8,
                'md' => 0.4
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G037',
                'mb' => 0.7,
                'md' => 0.3
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G038',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G040',
                'mb' => 1.0,
                'md' => 0.6
            ],
            [
                'code_indication' => 'P04',
                'code_sickness' => 'G041',
                'mb' => 0.9,
                'md' => 0.5
            ]
        ];

        foreach ($rules as $rule) {
            ValueCf::create($rule);
        }
    }
}
