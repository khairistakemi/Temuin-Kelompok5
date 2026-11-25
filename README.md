# Temu.in (Aplikasi Lost and Found)

Aplikasi web untuk melaporkan dan mencari barang hilang atau ditemukan di lingkungan kampus UPN "Veteran" Jakarta. Pengguna dapat membuat laporan, mencari barang, mengajukan klaim dengan bukti, dan memantau perkembangan laporannya dari dashboard.

Proyek akhir mata kuliah **Pemrograman Web**, Program Studi Sains Data, Fakultas Ilmu Komputer UPNVJ.
Dosen pengampu: Muhammad Panji Muslim, S.Pd., M.Kom.

## Anggota Kelompok 5 dan Pembagian Tugas

| No | Nama | NIM | Branch | Bagian yang dikerjakan |
|---|---|---|---|---|
| 1 (Ketua) | Khairista Akemi Suryana | 2510514019 | `fitur/auth` | Login, logout, profil, validasi email kampus, serta setup repositori, migration, model, seeder, dan layout |
| 2 | Satrio Radithya Prayata | 2510514021 | `fitur/laporan` | Tambah, lihat, ubah, hapus laporan, dan unggah gambar |
| 3 | Sadewo Ahza Hasiqghani | 2510514016 | `fitur/beranda` | Beranda, pencarian, filter kategori dan jenis laporan, dan pagination |
| 4 | Narendra Putra Bhaskoro | 2510514022 | `fitur/klaim` | Detail barang, form klaim, dan status klaim |
| 5 | Muhammad Farand Danendra | 2510514025 | `fitur/dashboard` | Dashboard statistik, riwayat laporan, tandai selesai, dan notifikasi klaim masuk |

## Fitur

- Pendaftaran dan login hanya dengan email kampus (`@mahasiswa.upnvj.ac.id` atau `@upnvj.ac.id`).
- Profil pengguna: lihat dan ubah nama, email, dan nomor telepon.
- Laporan barang hilang atau ditemukan, lengkap dengan foto. Pengguna hanya dapat mengubah dan menghapus laporannya sendiri.
- Beranda berisi laporan aktif dengan pencarian (nama barang atau lokasi), filter kategori, filter jenis laporan, pengurutan terbaru, dan pagination.
- Halaman detail barang dan form klaim dengan bukti atau ciri barang. Pengguna tidak dapat mengklaim laporannya sendiri.
- Pemilik laporan dapat menerima atau menolak klaim, dan pengaju dapat melihat status klaimnya.
- Dashboard berisi statistik laporan, riwayat laporan, tombol tandai selesai, dan pemberitahuan saat ada klaim masuk.

## Langkah Pemasangan dari Nol

### 1. Siapkan perangkat lunak

Pastikan sudah terpasang:

- PHP 8.3 atau lebih baru
- Composer
- MySQL (misalnya lewat XAMPP atau Laragon)
- Git

### 2. Ambil kode dari GitHub

```bash
git clone https://github.com/khairistakemi/Temuin-Kelompok5.git
cd Temuin-Kelompok5
```

### 3. Pasang dependensi

```bash
composer install
```

### 4. Buat berkas `.env`

Berkas `.env` tidak ikut ke repositori. Buat dari contohnya:

```bash
copy .env.example .env
php artisan key:generate
```

### 5. Atur koneksi database

Buka `.env`, lalu pastikan bagian database berisi seperti ini (tanpa tanda `#` di depannya):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=temuin
DB_USERNAME=root
DB_PASSWORD=
```

Isi `DB_PASSWORD` jika MySQL di komputer Anda memakai kata sandi.

### 6. Buat database

Nyalakan MySQL, lalu buat database kosong bernama **`temuin`**.

### 7. Bangun tabel dan isi data contoh

```bash
php artisan migrate:fresh --seed
php artisan storage:link
```

### 8. Jalankan aplikasi

```bash
php artisan serve
```

Buka `http://localhost:8000` di browser.

## Akun Contoh

Data contoh dari seeder menyediakan tiga akun dengan kata sandi yang sama, yaitu `password`:

| Nama | Email |
|---|---|
| Budi | budi@mahasiswa.upnvj.ac.id |
| Sari | sari@mahasiswa.upnvj.ac.id |
| Andi | andi@mahasiswa.upnvj.ac.id |

## Struktur Basis Data

| Tabel | Isi |
|---|---|
| `users` | Akun pengguna (nama, email, nomor telepon, kata sandi) |
| `categories` | Kategori barang |
| `reports` | Laporan barang hilang atau ditemukan |
| `claims` | Klaim atas laporan beserta statusnya |

Relasi utama: satu pengguna memiliki banyak laporan, satu kategori memiliki banyak laporan, dan satu laporan memiliki banyak klaim.

## Alur Kerja Git

1. Setiap anggota bekerja di branch miliknya sendiri (lihat tabel pembagian tugas).
2. Ambil perubahan terbaru sebelum mulai bekerja:
   ```bash
   git fetch
   git merge origin/main
   ```
3. Simpan dan kirim perubahan:
   ```bash
   git add .
   git commit -m "Pesan singkat tentang perubahan"
   git push -u origin nama-branch
   ```
4. Buka Pull Request ke `main` di GitHub. Pull Request ditinjau oleh anggota lain sebelum digabung.
5. Tidak ada yang melakukan push langsung ke `main`.


##
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
