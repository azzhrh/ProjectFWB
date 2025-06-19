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
- **Customer:** Melihat katalog, membeli tanaman, dan melihat riwayat transaksi.

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

### Tabel: `roles`

| Kolom      | Tipe Data         | Keterangan             |
|------------|-------------------|------------------------|
| id         | BIGINT (Auto Inc) | Primary key            |
| name       | ENUM              | ['admin', 'petugas', 'user'] |
| created_at | TIMESTAMP         | Otomatis oleh Laravel  |
| updated_at | TIMESTAMP         | Otomatis oleh Laravel  |

### Tabel: `users`

| Kolom      | Tipe Data         | Keterangan                         |
|------------|-------------------|-------------------------------------|
| id         | BIGINT (Auto Inc) | Primary key                         |
| name       | STRING            | Nama pengguna                       |
| email      | STRING (unique)   | Email unik                          |
| password   | STRING            | Password (hash)                     |
| role_id    | BIGINT            | FK → `roles.id`                     |
| created_at | TIMESTAMP         | Otomatis oleh Laravel               |
| updated_at | TIMESTAMP         | Otomatis oleh Laravel               |

### Tabel: `categories`

| Kolom      | Tipe Data         | Keterangan                  |
|------------|-------------------|------------------------------|
| id         | BIGINT (Auto Inc) | Primary key                 |
| name       | STRING(100)       | Nama kategori               |
| description| TEXT (nullable)   | Deskripsi kategori          |
| created_at | TIMESTAMP         | Otomatis oleh Laravel       |
| updated_at | TIMESTAMP         | Otomatis oleh Laravel       |

### Tabel: `plants`

| Kolom       | Tipe Data         | Keterangan                       |
|-------------|-------------------|-----------------------------------|
| id          | BIGINT (Auto Inc) | Primary key                      |
| name        | STRING            | Nama tanaman                     |
| description | TEXT (nullable)   | Deskripsi tanaman                |
| price       | INTEGER           | Harga tanaman                    |
| stock       | INTEGER           | Stok tersedia                    |
| category_id | BIGINT            | FK → `categories.id`             |
| image       | STRING (nullable) | Path gambar tanaman              |
| created_at  | TIMESTAMP         | Otomatis oleh Laravel            |
| updated_at  | TIMESTAMP         | Otomatis oleh Laravel            |

### Tabel: `transactions`

| Kolom       | Tipe Data         | Keterangan                      |
|-------------|-------------------|----------------------------------|
| id          | BIGINT (Auto Inc) | Primary key                     |
| user_id     | BIGINT            | FK → `users.id`                 |
| plant_id    | BIGINT            | FK → `plants.id`                |
| quantity    | INTEGER           | Jumlah yang dibeli              |
| total_price | INTEGER           | Total harga                     |
| created_at  | TIMESTAMP         | Otomatis oleh Laravel           |
| updated_at  | TIMESTAMP         | Otomatis oleh Laravel           |

---

### Relasi Antar Tabel

| Relasi                        | Tabel 1        | Tabel 2        | Jenis Relasi   | Penjelasan                                                                 |
|-------------------------------|----------------|----------------|----------------|-----------------------------------------------------------------------------|
| **Roles ↔ Users**             | `roles`        | `users`        | One-to-Many    | Setiap pengguna (`users`) hanya memiliki satu `role`, namun satu `role` dapat dimiliki oleh banyak pengguna (`users`). |
| **Categories ↔ Plants**       | `categories`   | `plants`       | One-to-Many    | Setiap tanaman (`plants`) masuk dalam satu kategori (`categories`), tetapi satu kategori dapat memiliki banyak tanaman (`plants`). |
| **Users ↔ Transactions**      | `users`        | `transactions` | One-to-Many    | Setiap transaksi (`transactions`) milik satu pengguna (`users`), namun satu pengguna dapat memiliki banyak transaksi (`transactions`). |
| **Plants ↔ Transactions**     | `plants`       | `transactions` | One-to-Many    | Setiap transaksi pembelian (`transactions`) berhubungan dengan satu tanaman (`plants`), tetapi satu tanaman dapat dibeli dalam banyak transaksi. |
| **Users ↔ Sessions** (Opsional) | `users`        | `sessions`     | One-to-Many    | Setiap sesi login (`sessions`) dapat dikaitkan dengan satu pengguna (`users`), namun satu pengguna dapat memiliki banyak sesi (tergantung implementasi sistem login). |




