<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indication extends Model
{
    use HasFactory;

    protected $table = 'indications';
    protected $guard = ['id'];
    protected $fillable = [
        'code_indication',
        'name_indication',
    ];

    public function fillTable()
    {
        $indications = [
            ["code_indication" => "G01", "name_indication" => "Tugas yang diberikan perusahaan berlebihan"],
            ["code_indication" => "G02", "name_indication" => "Tanggung jawab yang diberikan perusahaan sangat memberatkan"],
            ["code_indication" => "G03", "name_indication" => "Dikejar waktu dalam menyelesaikan pekerjaan"],
            ["code_indication" => "G04", "name_indication" => "Tugas yang dilakukan tidak terjadwal dengan baik"],
            ["code_indication" => "G05", "name_indication" => "Mengalami kesulitan memenuhi target perusahaan"],
            ["code_indication" => "G06", "name_indication" => "Mendapat waktu istirahat yang kurang untuk menjalankan pekerjaan"],
            ["code_indication" => "G07", "name_indication" => "Tidak mampu menyelesaikan pekerjaan tepat waktu"],
            ["code_indication" => "G08", "name_indication" => "Bekerja dengan peralatan yang tidak memadai"],
            ["code_indication" => "G09", "name_indication" => "Lingkungan kerja yang banyak gangguan"],
            ["code_indication" => "G010", "name_indication" => "Mengerjakan tugas yang berbeda – beda"],
            ["code_indication" => "G011", "name_indication" => "Melakukan pekerjaan yang dirasakan tidak dimengerti/tidak cocok"],
            ["code_indication" => "G012", "name_indication" => "Menerima tugas yang bertentangan satu sama lain"],
            ["code_indication" => "G013", "name_indication" => "Tujuan yang ditetapkan perusahaan tidak sesuai dengan harapan"],
            ["code_indication" => "G014", "name_indication" => "Ditekan dengan banyak peraturan dalam menjalankan tugas"],
            ["code_indication" => "G015", "name_indication" => "Mengalami konflik dari tugas yang dibebankan atasan yang berlainan"],
            ["code_indication" => "G016", "name_indication" => "Merasakan konflik dari tugas yang dibebankan atasan langsung penulis"],
            ["code_indication" => "G017", "name_indication" => "Menerima penugasan yang berbeda – beda dari dua atasan / lebih"],
            ["code_indication" => "G018", "name_indication" => "Hubungan yang tidak harmonis dengan rekan kerja"],
            ["code_indication" => "G019", "name_indication" => "Mengalami konflik dengan rekan kerja"],
            ["code_indication" => "G020", "name_indication" => "Mengalami kesulitan berkomunikasi dengan atasan"],
            ["code_indication" => "G021", "name_indication" => "Kurangnya dukungan dari atasan"],
            ["code_indication" => "G022", "name_indication" => "Ada hubungan yang tidak baik antara atasan dan karyawan"],
            ["code_indication" => "G023", "name_indication" => "Merasa kurang jelas dengan informasi dari perusahaan mengenai pekerjaan"],
            ["code_indication" => "G024", "name_indication" => "Tidak tahu apa yang menjadi tanggung jawab pekerjaan yang penulis jalankan"],
            ["code_indication" => "G025", "name_indication" => "Merasa tidak jelas dalam hal ruang lingkup pekerjaan"],
            ["code_indication" => "G026", "name_indication" => "Merasa sulit untuk memperoleh informasi yang dibutuhkan untuk menjalankan pekerjaan"],
            ["code_indication" => "G027", "name_indication" => "Merasa tidak tahu harus bertanggung jawab kepada siapa dalam bekerja"],
            ["code_indication" => "G028", "name_indication" => "Prosedur/intruksi kerja kurang jelas"],
            ["code_indication" => "G029", "name_indication" => "Alur komunikasi tidak jelas"],
            ["code_indication" => "G030", "name_indication" => "Atasan terlalu banyak mengatur"],
            ["code_indication" => "G031", "name_indication" => "Atasan bertindak kurang adil dalam pembagian pekerjaan kepada bawahan"],
            ["code_indication" => "G032", "name_indication" => "Merasa tidak mengetahui bagaimana penilaian atasan"],
            ["code_indication" => "G033", "name_indication" => "Merasa tidak mempunyai peranan dalam pengambilan Keputusan"],
            ["code_indication" => "G034", "name_indication" => "Merasa tidak ada kesempatan untuk berpartisipasi dalam mencapai tujuan perusahaan"],
            ["code_indication" => "G035", "name_indication" => "Atasan tidak memberitahu dengan jelas perubahan-perubahan kebijaksanaan diperusahaan"],
            ["code_indication" => "G036", "name_indication" => "Atasan tidak memberitahu tugas yang harus penulis lakukan"],
            ["code_indication" => "G037", "name_indication" => "Peluang yang kecil untuk mendapat promosi"],
            ["code_indication" => "G038", "name_indication" => "Mendapat pekerjaan baru yang memerlukan keterampilan berbeda dari sebelumnya"],
            ["code_indication" => "G039", "name_indication" => "Merasa tidak mempunyai kesempatan untuk lebih maju dalam bekerja"],
            ["code_indication" => "G040", "name_indication" => "Mengalami promosi kerja ke jabatan yang lebih rendah dari kemampuan yang dimiliki"],
            ["code_indication" => "G041", "name_indication" => "Mengalami promosi kerja ke jabatan yang lebih tinggi dari kemampuan yang dimiliki"],
            ["code_indication" => "G042", "name_indication" => "Umpan balik terhadap hasil kerja tidak sesuai dengan harapan"],
            ["code_indication" => "G043", "name_indication" => "Pemberentian karyawan menjadi pemicu kecemasan penulis untuk bekerja dengan baik"]
        ];
        return $indications;
    }


}
