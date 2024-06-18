<?php

namespace App\Models;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'Education';
    protected $guard = ['id'];
    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'author'
    ];

    public function fillTable()
    {
        $educations = [
            [
                'title' => 'Pengertian dan Penyebab Stres Kerja',
                'description' => 'Stres kerja adalah kondisi yang dihadapi oleh banyak pekerja di berbagai industri. Artikel ini membahas pengertian stres kerja dan faktor-faktor yang menyebabkannya.',
                'image' => 'backend/images/carousel/banner_1.jpg',
                'slug' => Str::slug('Pengertian dan Penyebab Stres Kerja'),
                'author' => 'Author 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Dampak Negatif Stres Kerja pada Kesehatan',
                'description' => 'Stres kerja tidak hanya mempengaruhi produktivitas tetapi juga dapat berdampak buruk pada kesehatan fisik dan mental. Artikel ini menguraikan dampak negatif stres kerja.',
                'image' => 'backend/images/carousel/banner_2.jpg',
                'slug' => Str::slug('Dampak Negatif Stres Kerja pada Kesehatan'),
                'author' => 'Author 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Cara Mengelola Stres Kerja dengan Efektif',
                'description' => 'Mengelola stres kerja adalah keterampilan penting yang perlu dikuasai. Artikel ini memberikan tips dan strategi efektif untuk mengelola stres di tempat kerja.',
                'image' => 'backend/images/carousel/banner_3.jpg',
                'slug' => Str::slug('Cara Mengelola Stres Kerja dengan Efektif'),
                'author' => 'Author 3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Pentingnya Dukungan Sosial di Tempat Kerja',
                'description' => 'Dukungan sosial dari rekan kerja dan atasan dapat membantu mengurangi stres kerja. Artikel ini membahas pentingnya dukungan sosial di lingkungan kerja.',
                'image' => 'backend/images/carousel/banner_4.jpg',
                'slug' => Str::slug('Pentingnya Dukungan Sosial di Tempat Kerja'),
                'author' => 'Author 4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Mengidentifikasi Gejala Stres Kerja',
                'description' => 'Mengenali gejala stres kerja sejak dini dapat membantu dalam mengambil langkah-langkah pencegahan. Artikel ini mengidentifikasi gejala-gejala stres kerja yang umum.',
                'image' => 'backend/images/carousel/banner_5.jpg',
                'slug' => Str::slug('Mengidentifikasi Gejala Stres Kerja'),
                'author' => 'Author 5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Manfaat Olahraga dalam Mengatasi Stres Kerja',
                'description' => 'Olahraga memiliki banyak manfaat, termasuk dalam mengatasi stres kerja. Artikel ini menjelaskan bagaimana olahraga dapat membantu mengurangi tingkat stres di tempat kerja.',
                'image' => 'backend/images/carousel/banner_6.jpg',
                'slug' => Str::slug('Manfaat Olahraga dalam Mengatasi Stres Kerja'),
                'author' => 'Author 6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        return $educations;
    }
}
