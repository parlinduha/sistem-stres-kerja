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
            // P001 => Gangguan Mood
            [
                'code_indication' => 'P001',
                'code_sickness' => 'G001',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P001',
                'code_sickness' => 'G002',
                'mb' => 0.4,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P001',
                'code_sickness' => 'G003',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P001',
                'code_sickness' => 'G004',
                'mb' => 0.4,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P001',
                'code_sickness' => 'G005',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P001',
                'code_sickness' => 'G007',
                'mb' => 0.4,
                'md' => 0.2
            ],

            // P002 => Depresi Ringan
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G001',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G002',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G006',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G008',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G010',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G011',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G014',
                'mb' => 0.8,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G015',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G016',
                'mb' => 0.8,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P002',
                'code_sickness' => 'G022',
                'mb' => 0.6,
                'md' => 0.0
            ],

            // Depresi Sedang
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G001',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G009',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G010',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G011',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G012',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G013',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G016',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G017',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G020',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G022',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G023',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P003',
                'code_sickness' => 'G027',
                'mb' => 0.6,
                'md' => 0.2
            ],

            // Depresi Berat
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G001',
                'mb' => 0.8,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G009',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G010',
                'mb' => 0.8,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G012',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G013',
                'mb' => 0.2,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G016',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G018',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G019',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G020',
                'mb' => 0.8,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G021',
                'mb' => 0.4,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G024',
                'mb' => 0.6,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G025',
                'mb' => 0.8,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G026',
                'mb' => 0.4,
                'md' => 0.2
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G027',
                'mb' => 0.6,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G028',
                'mb' => 1.0,
                'md' => 0.0
            ],
            [
                'code_indication' => 'P004',
                'code_sickness' => 'G029',
                'mb' => 0.8,
                'md' => 0.0
            ],
        ];

        foreach ($rules as $rule) {
            ValueCf::create($rule);
        }
    }
}
