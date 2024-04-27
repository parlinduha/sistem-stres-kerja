# Sistem Pakar Stres Kerja Metode Certainty Factor

## Cara Install

Berikut adalah langkah-langkah untuk mengkloning dan menginstal proyek Laravel "Sistem Pakar Stres Kerja Metode Certainty Factor" di lingkungan lokal Anda, serta membuat file env dan nama basis data menggunakan MySQL dan Laragon.

### Langkah 1: Clone Proyek

Buka terminal Anda dan arahkan ke direktori tempat Anda ingin menyimpan proyek ini. Kemudian jalankan perintah berikut:

```
git clone https://github.com/parlinduha/sistem-stres-kerja.git
```
Langkah 2: Salin File Env Example
Salin file .env.example dan beri nama .env. Anda dapat melakukannya dengan menjalankan perintah berikut:
```
cp .env.example .env
```
### Langkah 3: Konfigurasi File Env
Buka file .env yang baru dibuat dan atur konfigurasi basis data Anda. Anda perlu menyesuaikan DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, dan DB_PASSWORD sesuai dengan pengaturan MySQL Laragon Anda.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan Anda mengganti nama_database_anda, username_mysql_anda, dan password_mysql_anda sesuai dengan pengaturan MySQL Anda.

### Langkah 4: Instal Dependencies Menggunakan Composer
Navigasikan ke direktori proyek Anda yang baru saja di-kloning dan jalankan perintah berikut untuk menginstal semua dependencies yang diperlukan:
```
composer install
```
### Langkah 5: Generate Key Aplikasi Laravel
Setelah selesai menginstal dependencies, jalankan perintah berikut untuk menghasilkan kunci aplikasi Laravel:
```
php artisan key:generate
```

### Langkah 6: Jalankan Migrasi dan Seeder (Opsional)
Jika proyek ini menggunakan migrasi dan seeder, Anda dapat menjalankannya dengan perintah berikut:

```
php artisan migrate --seed
```

### Langkah 7: Jalankan Server Laravel
Terakhir, jalankan server Laravel dengan perintah:
```
php artisan serve
```
Anda sekarang dapat mengakses proyek Laravel Anda melalui browser dengan alamat ```http://localhost:8000```

Selamat mengembangkan!

