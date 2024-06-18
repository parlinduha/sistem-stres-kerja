<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Indication;
use App\Models\Sickness;
use App\Models\User;
use App\Models\ValueCf;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ConditionSeeder::class,
            IndicationSeeder::class,
            SicknessSeeder::class,
            EducationSeeder::class,
            // ValueCfSeeder::class,
        ]);
        // $valueCf = new ValueCf();
        // $indication = new Indication();
        // $sickness = new Sickness();
        // $education = new Education();
        // $users = new User();

        // ValueCf::insert($valueCf->fillTable());
        // Indication::insert($indication->fillTable());
        // Sickness::insert($sickness->fillTable());
        // Education::insert($education->fillTable());
        // User::insert($users->fillTable());
    }
}
