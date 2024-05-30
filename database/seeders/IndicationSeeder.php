<?php

namespace Database\Seeders;

use App\Models\Indication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $indications =
            [
                [
                    "code_indication" => "G001",
                    "name_indication" => "Sering Merasa Sedih"
                ],
                [
                    "code_indication" => "G002",
                    "name_indication" => "Sering kelelahan melakukan aktifitas ringan"
                ],
                [
                    "code_indication" => "G003",
                    "name_indication" => "Kurang konsentrasi dalam belajar "
                ],
                [
                    "code_indication" => "G004",
                    "name_indication" => "Mudah merasa bosan"
                ],
                [
                    "code_indication" => "G005",
                    "name_indication" => "Sering Melamun"
                ],
                [
                    "code_indication" => "G006",
                    "name_indication" => "Tidak semangat melakukan sesuatu"
                ],
                [
                    "code_indication" => "G007",
                    "name_indication" => "Merasa Risau"
                ],
                [
                    "code_indication" => "G008",
                    "name_indication" => "Pesimis"
                ],
                [
                    "code_indication" => "G009",
                    "name_indication" => "Sering menangis secara tiba-tiba"
                ],
                [
                    "code_indication" => "G010",
                    "name_indication" => "Gangguan susah Tidur"
                ],
                [
                    "code_indication" => "G011",
                    "name_indication" => "Merasa Cemas Berlebihan"
                ],
                [
                    "code_indication" => "G012",
                    "name_indication" => "Kecewa dengan diri sendiri"
                ],
                [
                    "code_indication" => "G013",
                    "name_indication" => "Terganggu dengan banyak hal"
                ],
                [
                    "code_indication" => "G014",
                    "name_indication" => "Sering murung"
                ],
                [
                    "code_indication" => "G015",
                    "name_indication" => "Kehilangan minat terhadap hoby"
                ],
                [
                    "code_indication" => "G016",
                    "name_indication" => "Merasa kesepian"
                ],
                [
                    "code_indication" => "G017",
                    "name_indication" => "Sering merasa bersalah"
                ],
                [
                    "code_indication" => "G018",
                    "name_indication" => "Merasa dihakimi"
                ],
                [
                    "code_indication" => "G019",
                    "name_indication" => "Membenci Diri Sendiri"
                ],
                [
                    "code_indication" => "G020",
                    "name_indication" => "Mudah tersinggung"
                ],
                [
                    "code_indication" => "G021",
                    "name_indication" => "Kehilangan Nafsu makan "
                ],
                [
                    "code_indication" => "G022",
                    "name_indication" => "Khawatir tentang penampilan"
                ],
                [
                    "code_indication" => "G023",
                    "name_indication" => "Mudah Marah"
                ],
                [
                    "code_indication" => "G024",
                    "name_indication" => "Suka menyendiri"
                ],
                [
                    "code_indication" => "G025",
                    "name_indication" => "Pikiran Untuk Bunuh Diri"
                ],
                [
                    "code_indication" => "G026",
                    "name_indication" => "Sulit mengambil keputusan"
                ],
                [
                    "code_indication" => "G027",
                    "name_indication" => "Sulit melakukan kegiatan dengan Baik"
                ],
                [
                    "code_indication" => "G028",
                    "name_indication" => "Ada penambahan dan penurunan berat badan"
                ],
                [
                    "code_indication" => "G029",
                    "name_indication" => "Kurang percaya diri"
                ],
            ];

            foreach ($indications as $indication) {
                Indication::create($indication);
            }
    }
}
