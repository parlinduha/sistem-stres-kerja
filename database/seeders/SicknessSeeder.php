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
                "code_sickness" => "D01",
                "name_sickness" => "Tidak Stres",
                "description" => "Tetap bersyukur dan teguh dalam menjaga apa yang sudah dimiliki"
            ],
            [
                "code_sickness" => "D02",
                "name_sickness" => "Stres Rendah",
                "description" => "1. Coba luangkan sedikit waktu istirahat di kantor, entah itu untuk berbincang dengan rekan kerja dan berbagi ide, atau keluar sejenak dari ruangan dan mungkin pergi ke kantin untuk sesaat.
                                  2. Silakan lakukan sesi meditasi singkat untuk meredakan ketegangan dalam diri.
                                  3. Mencuci wajah sebentar untuk menyegarkan karena air yang menyentuh kulit dapat memberikan sensasi segar yang berhubungan dengan merasa rileks.
                                  4. Melakukan aktivitas fisik ringan tanpa harus berdiri atau berjalan.
                                  5. Coba luangkan waktu untuk melakukan hobi, seperti mendengarkan musik sebentar atau menggambar, sebelum kembali fokus pada pekerjaan.
                                  6. Temukan asal-usul tekanan yang dirasakan, kemudian bicarakan dengan seseorang terdekat atau refleksikan dalam diri sendiri.
                                  7. Buatlah urutan tugas yang harus diselesaikan satu per satu berdasarkan prioritasnya.
                                  8. Memberikan penghargaan pada diri sendiri adalah tentang mengakui dan menghargai pencapaian, kualitas, atau upaya yang telah kita lakukan.
                                  9. Konsumsilah makanan yang sehat dan bergizi, hindari mengonsumsi makanan cepat saji."
            ],
            [
                "code_sickness" => "D03",
                "name_sickness" => "Stres Sedang",
                "description" => "1. Saat mencoba mengingat kembali, identifikasi masalah utama yang terjadi sebelumnya dan buatlah daftar prioritas berdasarkan hal tersebut.
                                  2. Susun agenda harian dan rutinitas.
                                  3. Meditasi yang digunakan untuk menciptakan kedamaian dan ketenangan dalam pikiran dan tubuh seseorang.
                                  4. Buatlah rencana perjalanan untuk memanjakan diri sebagai hadiah.
                                  5. Lakukanlah diskusi dan pertukaran ide dengan teman serta pakar untuk mendapatkan pemahaman yang lebih baik.
                                  6. Berpikir positif ialah keyakinan bahwa di setiap masalah, pasti terdapat solusinya."
            ],
            [
                "code_sickness" => "D04",
                "name_sickness" => "Stres Tinggi",
                "description" => "1. Mengambil Istirahat.
                                  2. Tetapkan prioritas dan pilih tugas yang akan diselesaikan terlebih dahulu.
                                  3. Pilihlah untuk mengonsumsi makanan yang sehat dan kaya gizi, dan hindari makanan cepat saji.
                                  4. Lakukanlah praktik meditasi, berolahraga, atau yoga.
                                  5. Minta pertolongan dari seorang pakar.
                                  6. Berpikir positif dan memiliki tekad bahwa setiap masalah pasti bisa diatasi tidak hanya mempermasalahkan situasi tersebut, tetapi juga mencari solusi."
            ],
        ];

        foreach ($sicknesses as $sickness) {
            Sickness::create($sickness);
        }
    }
}
