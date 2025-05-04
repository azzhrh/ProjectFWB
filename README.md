<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Judul	: Plantopia : Katalog Tanaman Hias Digital
Nama	: Az Zahra
Nim	: D0223005
Framework Web Based
2024
Katalog Tanaman Hias Digital adalah sebuah aplikasi berbasis web yang memungkinkan pengguna untuk mengelola dan menelusuri koleksi tanaman hias secara digital. Aplikasi ini memiliki tiga jenis role pengguna, yaitu:
•	Admin: Bertugas mengelola pengguna, kategori, serta keseluruhan data tanaman dan transaksi.
•	Petugas: Bertugas memperbarui stok tanaman dan mengelola informasi tanaman.
•	User: Dapat melihat katalog, melakukan pembelian tanaman, serta melihat riwayat transaksi mereka.
1.	Fitur Utama
•	Autentikasi Pengguna: Pengguna dapat mendaftar, login, dan mengelola profil mereka.
•	Manajemen Tanaman: Petugas dan admin dapat menambah, mengedit, dan menghapus data tanaman.
•	Katalog Tanaman: User dapat melihat daftar tanaman berdasarkan kategori atau nama.
•	Transaksi Pembelian: User dapat membeli tanaman, sistem akan mencatat transaksi dan mengurangi stok tanaman.
•	Role Management: Akses pengguna dibatasi sesuai perannya.
•	Manajemen Kategori: Admin dapat menambahkan dan mengelola kategori tanaman.
•	Riwayat Aktivitas: Sistem mencatat aktivitas penting seperti login dan pembelian.
1.	Tabel users (Pengguna)
Field	Tipe Data	Deskripsi
Id	INT AUTO_INCREMENT	ID unik untuk setiap pengguna
Name	VARCHAR(255)	Nama Pengguna
Email	VARCHAR(255) UNIQUE	Alamat email pengguna
Password	VARCHAR(255)	Password pengguna (di-hash)
Role_id	INT	Relasi ke tabel roles
Created_at	TIMESTAMP	Waktu saat pengguna dibuat
Updated_at	TIMETAMP	Waktu saat pengguna diperbarui
2.	Tabel Roles (Peran Pengguna)
Field 	Tipe Data	Deskripsi
Id	INT	ID unik role
Name	ENUM	Nama peran : “admin”, “petugas”, “user”
Created_at	TIMESTAMP	Otomatis
Updated_at	TIMESTAMP	otomatis

3.	Tabel Plants (Tanaman)
Field 	Tipe Data	Deskripsi
Id	INT	ID unik tanaman
Name	VARCHAR(255)	Nama tanaman
Description	TEXT	Deskripsi tanaman harga tanaman
Price	INT	Harga tanaman
stock	INT	Stok tanaman tersedia
Category_id	INT	Relasi ke tabel categories
Image	VARCHAR(255)	Path gambar tanaman
Created_at	TIMESTAMP	Otomatis
Update_at	TIMESTAMP	Otomatis 

4.	Tabel Categories (Kategori Tanaman)
Field 	Tipe Data	Deskripsi 
Id	INT	ID unik kategori
Name	VARCHAR(100)	Nama kategori tanaman
Description	TEXT	Deskripsi kategori

5.	Tabel Transaction (Transaksi Pembelian)
Field 	Tipe Data	Deskripsi 
Id	INT	ID unik transaksi
User_id	INT	ID pengguna yang melakukan pembelian
Plant_id	INT	ID tanaman yang beli
Quantity	INT	Jumlah tanaman yang beli
Total_price	INT	Toal harga (price * quantity)
Created_at	TIMESTAMP	Waktu saat transaksi
Update_at	TIMESTAMP	Waktu saat transaksi diperbarui

2. Relasi Antar Tabel
Relasi 	Jenis relasi
Users - roles	Many-to-One
Plants - categories	Many-to-One
Transactions - users	Many-to- One
Transactions - plants	Many-to-One
Favorites - users	Many-to-One
Favorites - plants	Many-to-One
Logs - users	Many-to-One


### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
