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
| **Field**    | **Tipe Data**       | **Deskripsi**                  |
| ------------ | ------------------- | ------------------------------ |
| `id`         | INT AUTO\_INCREMENT | ID unik untuk setiap pengguna  |
| `name`       | VARCHAR(255)        | Nama pengguna                  |
| `email`      | VARCHAR(255) UNIQUE | Alamat email pengguna          |
| `password`   | VARCHAR(255)        | Password pengguna (di-hash)    |
| `role_id`    | INT                 | Relasi ke tabel `roles`        |
| `created_at` | TIMESTAMP           | Waktu saat pengguna dibuat     |
| `updated_at` | TIMESTAMP           | Waktu saat pengguna diperbarui |

2.	Tabel Roles (Peran Pengguna)
| **Field**    | **Tipe Data**                    | **Deskripsi**                         |
| ------------ | -------------------------------- | ------------------------------------- |
| `id`         | INT                              | ID unik role                          |
| `name`       | ENUM('admin', 'petugas', 'user') | Nama peran pengguna                   |
| `created_at` | TIMESTAMP                        | Waktu saat role dibuat (otomatis)     |
| `updated_at` | TIMESTAMP                        | Waktu saat role diperbarui (otomatis) |


3.	Tabel Plants (Tanaman)
| **Field**     | **Tipe Data** | **Deskripsi**                             |
| ------------- | ------------- | ----------------------------------------- |
| `id`          | INT           | ID unik tanaman                           |
| `name`        | VARCHAR(255)  | Nama tanaman                              |
| `description` | TEXT          | Deskripsi tanaman dan harga               |
| `price`       | INT           | Harga tanaman                             |
| `stock`       | INT           | Stok tanaman yang tersedia                |
| `category_id` | INT           | Relasi ke tabel `categories`              |
| `image`       | VARCHAR(255)  | Path atau URL gambar tanaman              |
| `created_at`  | TIMESTAMP     | Waktu saat tanaman ditambahkan (otomatis) |
| `updated_at`  | TIMESTAMP     | Waktu saat data tanaman diperbarui        |


4.	Tabel Categories (Kategori Tanaman)
| **Field**     | **Tipe Data** | **Deskripsi**              |
| ------------- | ------------- | -------------------------- |
| `id`          | INT           | ID unik kategori           |
| `name`        | VARCHAR(100)  | Nama kategori tanaman      |
| `description` | TEXT          | Deskripsi kategori tanaman |


5.	Tabel Transaction (Transaksi Pembelian)
| **Field**     | **Tipe Data** | **Deskripsi**                               |
| ------------- | ------------- | ------------------------------------------- |
| `id`          | INT           | ID unik transaksi                           |
| `user_id`     | INT           | ID pengguna yang melakukan pembelian        |
| `plant_id`    | INT           | ID tanaman yang dibeli                      |
| `quantity`    | INT           | Jumlah tanaman yang dibeli                  |
| `total_price` | INT           | Total harga (hasil dari `price * quantity`) |
| `created_at`  | TIMESTAMP     | Waktu saat transaksi dibuat                 |
| `updated_at`  | TIMESTAMP     | Waktu saat transaksi diperbarui             |


2. Relasi Antar Tabel
| **Relasi**                | **Jenis Relasi** | **Penjelasan**                                       |
| ------------------------- | ---------------- | ---------------------------------------------------- |
| `users` → `roles`         | Many-to-One      | Banyak pengguna memiliki satu role.                  |
| `plants` → `categories`   | Many-to-One      | Banyak tanaman dapat tergolong dalam satu kategori.  |
| `transactions` → `users`  | Many-to-One      | Banyak transaksi bisa dilakukan oleh satu user.      |
| `transactions` → `plants` | Many-to-One      | Banyak transaksi bisa melibatkan satu jenis tanaman. |
| `favorites` → `users`     | Many-to-One      | Banyak favorit dimiliki oleh satu user.              |
| `favorites` → `plants`    | Many-to-One      | Banyak favorit mengarah pada satu tanaman.           |
| `logs` → `users`          | Many-to-One      | Banyak aktivitas dicatat untuk satu user.            |



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
