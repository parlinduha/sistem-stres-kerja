<?php

namespace Database\Seeders;

use App\Models\ConditionUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConditionUser::create([
            'condition' => 'Tidak Tahu',
            'value' => 0.00
        ]);
        ConditionUser::create([
            'condition' => 'Tidak Yakin',
            'value' => 0.20
        ]);
        ConditionUser::create([
            'condition' => 'Mungkin',
            'value' => 0.40
        ]);
        ConditionUser::create([
            'condition' => 'Kemungkinan Besar',
            'value' => 0.60
        ]);
        ConditionUser::create([
            'condition' => 'Hampir Pasti',
            'value' => 0.80
        ]);
        ConditionUser::create([
            'condition' => 'Pasti',
            'value' => 1.00
        ]);
    }
}
