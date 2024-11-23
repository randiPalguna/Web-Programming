<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Kelompok
1. Randi Palguna Artayasa (5025231020)
2. Putu Ardanatha Pratama (5025231156)
3. Haidar Daffa Firzatullah (5025231071)
4. Putu Agrapana Mahesa Kusmeiran (5025231225)

## Cara Menginstall Project Hingga Jalan di Localhost
0. Pastikan di laptop bisa menjalankan perintah `php -v` dan `composer` secara global di cmd windows.
1. Gunakan perintah `git clone https://github.com/randiPalguna/OpenNature.git` untuk mengcopy proyek kedalam direktori laptop.
2. Masuk ke direktori projek OpenNature dengan `cd OpenNature`.
3. Lakukan update composer di dalam direktori OpenNature dengan perintah `composer update` dan tunggu sampai selesai.
4. Ubah nama file .env.example menjadi .env dengan perintah `ren .env.example .env` jika menggunakan cmd windows atau `mv .env.example .env` jika menggunakan linux.
   Catatan: Pengubahan nama file juga bisa dilakukan secara manual pada file explorer windows.
5. Generate key pada file .env dengan perintah `php artisan key:generate`.
6. Sekarang buka aplikasi XAMPP dan hidupkan `apache` dan `mysql`. Pastikan tidak ada error atau berwarna hijau.
7. Selanjutnya membuat session table pada projek direktori OpenNature dengan perintah `php artisan session:table`.
8. Selanjutnya melakukan migrate database dengan perintah `php artisan migrate` dan ketik `yes` ketika dimintai keterangan.
9. Selanjutnya melakukan penambahan data pada database dengan perintah `php artisan db:seed`.
10. Akhirnya jalankan projek OpenNature dengan perintah `php artisan serve`.
11. Buka browser dan masuk ke localhost projek dengan search `http://localhost:8000/`.

## Desain Database
![Screenshot 2024-09-13 175010](https://github.com/user-attachments/assets/81d8f333-d486-4b90-be9b-d399eff9fdc4)

## Fitur Web
1. Dapat melakukan read data dari database.
2. Dapat melakukan create data pada database.
