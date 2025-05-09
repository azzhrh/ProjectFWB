<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Plantopia : Katalog Tanaman Hias Digital

**Nama:** Az Zahra  
**NIM:** D0223005  
**Mata Kuliah:** Framework Web Based  
**Tahun:** 2025

---

## Deskripsi

**Plantopia** adalah aplikasi berbasis web untuk mengelola dan menelusuri koleksi tanaman hias secara digital. Aplikasi ini memiliki tiga jenis role pengguna:

- **Admin:** Mengelola pengguna, kategori, data tanaman, dan transaksi.
- **Petugas:** Mengelola dan memperbarui data tanaman serta stok.
- **User:** Melihat katalog, membeli tanaman, dan melihat riwayat transaksi.

---

## Fitur Utama

- **Autentikasi Pengguna:** Registrasi, login, dan pengelolaan profil.
- **Manajemen Tanaman:** Tambah, edit, dan hapus tanaman (admin/petugas).
- **Katalog Tanaman:** Pencarian tanaman berdasarkan kategori atau nama.
- **Transaksi Pembelian:** Pembelian tanaman oleh user dengan pencatatan transaksi dan pengurangan stok.
- **Role Management:** Hak akses sesuai peran.
- **Manajemen Kategori:** Admin dapat mengatur kategori tanaman.
- **Riwayat Aktivitas:** Pencatatan aktivitas seperti login dan pembelian.

---

## Struktur Tabel Database

### 1. Tabel `users` (Pengguna)

| Field       | Tipe Data        | Deskripsi                         |
|-------------|------------------|-----------------------------------|
| id          | INT AUTO_INCREMENT | ID unik untuk setiap pengguna     |
| name        | VARCHAR(255)     | Nama pengguna                     |
| email       | VARCHAR(255) UNIQUE | Email pengguna                  |
| password    | VARCHAR(255)     | Password di-hash                  |
| role_id     | INT              | Relasi ke tabel roles             |
| created_at  | TIMESTAMP        | Waktu dibuat                      |
| updated_at  | TIMESTAMP        | Waktu diperbarui                  |

### 2. Tabel `roles` (Peran Pengguna)

| Field       | Tipe Data | Deskripsi                        |
|-------------|-----------|----------------------------------|
| id          | INT       | ID unik role                     |
| name        | ENUM      | admin, petugas, user             |
| created_at  | TIMESTAMP | Otomatis                         |
| updated_at  | TIMESTAMP | Otomatis                         |

### 3. Tabel `plants` (Tanaman)

| Field        | Tipe Data      | Deskripsi                         |
|--------------|----------------|-----------------------------------|
| id           | INT            | ID unik tanaman                   |
| name         | VARCHAR(255)   | Nama tanaman                      |
| description  | TEXT           | Deskripsi tanaman                 |
| price        | INT            | Harga tanaman                     |
| stock        | INT            | Jumlah stok                       |
| category_id  | INT            | Relasi ke tabel categories        |
| image        | VARCHAR(255)   | Path gambar tanaman               |
| created_at   | TIMESTAMP      | Otomatis                          |
| updated_at   | TIMESTAMP      | Otomatis                          |

### 4. Tabel `categories` (Kategori Tanaman)

| Field        | Tipe Data     | Deskripsi                         |
|--------------|---------------|-----------------------------------|
| id           | INT           | ID unik kategori                  |
| name         | VARCHAR(100)  | Nama kategori                     |
| description  | TEXT          | Deskripsi kategori                |

### 5. Tabel `transactions` (Transaksi Pembelian)

| Field        | Tipe Data | Deskripsi                                   |
|--------------|-----------|---------------------------------------------|
| id           | INT       | ID unik transaksi                           |
| user_id      | INT       | ID user                                     |
| plant_id     | INT       | ID tanaman                                  |
| quantity     | INT       | Jumlah tanaman                              |
| total_price  | INT       | Total harga (price * quantity)              |
| created_at   | TIMESTAMP | Waktu transaksi                             |
| updated_at   | TIMESTAMP | Waktu transaksi diperbarui                  |

---

## Relasi Antar Tabel

| Relasi                    | Jenis Relasi  |
|---------------------------|---------------|
| Users - Roles            | Many-to-One   |
| Plants - Categories      | Many-to-One   |
| Transactions - Users     | Many-to-One   |
| Transactions - Plants    | Many-to-One   |
| Favorites - Users        | Many-to-One   |
| Favorites - Plants       | Many-to-One   |
| Logs - Users             | Many-to-One   |




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
