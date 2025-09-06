# Rental Mobil — CodeIgniter 4

Aplikasi web untuk manajemen penyewaan mobil (rental) berbasis CodeIgniter 4. Proyek ini ditujukan untuk membantu pemilik rental mengelola armada, pemesanan, pelanggan, dan transaksi dengan alur kerja yang ringkas dan aman.

Jika Anda menemukan bagian yang belum sesuai dengan implementasi saat ini, silakan sesuaikan. README ini disusun agar mudah dipahami oleh pengguna maupun kontributor.

## Fitur Utama

- Katalog Mobil
  - Listing mobil: merk, tipe, tahun, nomor polisi, status ketersediaan, harga sewa per hari.
  - Upload/kelola foto mobil.
- Pemesanan & Transaksi
  - Form pemesanan dengan rentang tanggal sewa.
  - Perhitungan biaya otomatis (lama sewa × harga).
  - Status transaksi: pending, aktif, selesai, batal.
- Pelanggan
  - Manajemen data pelanggan (identitas & kontak).
- Autentikasi & Otorisasi
  - Login/Logout.
  - Role dasar: Admin dan User (opsional).
- Laporan (opsional)
  - Ringkasan transaksi per periode.
  - Pendapatan dan tingkat okupansi armada.
- Keamanan
  - CSRF protection, validasi input, filter auth.
- Konfigurasi & Pengaturan
  - Basis URL, koneksi database, dan kunci enkripsi melalui `.env`.

Catatan: Tandai/ubah fitur yang belum diimplementasikan agar sesuai dengan progres Anda.

## Teknologi

- Backend: PHP (CodeIgniter 4)
- Basis Data: MySQL/MariaDB
- Frontend: HTML/CSS/JS (dapat dipadukan dengan Bootstrap/Tailwind sesuai kebutuhan)
- Dependency Manager: Composer

## Prasyarat

- PHP 7.4 atau lebih baru dengan ekstensi:
  - intl, mbstring, json (default), mysqlnd, curl
- Composer
- MySQL/MariaDB
- Web server (Apache/Nginx) untuk produksi; untuk pengembangan dapat memakai `php spark serve`

## Memulai (Development)

1) Clone repository
```bash
git clone https://github.com/Vyannnnnn/Rental-Mobil.git
cd Rental-Mobil
```

2) Install dependency
```bash
composer install
```

3) Salin konfigurasi lingkungan
```bash
cp env .env
```

4) Set `.env` penting
- Atur URL dasar aplikasi:
```
app.baseURL = 'http://localhost:8080/'
```
- Konfigurasi database:
```
database.default.hostname = localhost
database.default.database = rental_mobil
database.default.username = root
database.default.password = ''
database.default.DBDriver  = MySQLi
```
- Generate kunci enkripsi:
```bash
php spark key:generate
```
Perintah ini akan menambahkan `encryption.key` ke file `.env`.

5) Siapkan database
- Buat database kosong `rental_mobil` (atau sesuai nama yang Anda pakai di `.env`).
- Jalankan migrasi (dan seeder jika tersedia):
```bash
php spark migrate
php spark db:seed DatabaseSeeder
```
Jika belum ada migrasi/seeder, Anda dapat membuatnya terlebih dahulu atau impor skema SQL yang sudah ada.

6) Jalankan server pengembangan
```bash
php spark serve
```
Akses aplikasi di `http://localhost:8080`.

## Struktur Direktori (Ringkas)

```
app/
  Controllers/   # Logika request/response
  Models/        # Akses data & Query Builder
  Views/         # Tampilan (HTML/Templating)
  Config/        # Konfigurasi aplikasi
public/          # Document root (index.php, asset publik)
writable/        # Cache, logs, uploads
```

## Alur Utama Aplikasi (Contoh)

- Admin:
  1. Login sebagai admin.
  2. Tambah data mobil (spesifikasi, harga, foto).
  3. Kelola pelanggan dan transaksi (verifikasi pemesanan, ubah status).
  4. Lihat laporan (opsional).

- Pengguna:
  1. Lihat katalog mobil dan ketersediaannya.
  2. Ajukan pemesanan dengan memilih rentang tanggal.
  3. Konfirmasi pemesanan dan lakukan pembayaran (jika diimplementasikan).
  4. Terima konfirmasi dan detail sewa.

Sesuaikan alur ini dengan implementasi aktual Anda.

## Konfigurasi Web Server (Produksi)

Index utama berada di folder `public/`. Pastikan virtual host/web root diarahkan ke folder `public`, bukan root proyek:

- Apache: arahkan `DocumentRoot` ke `.../Rental-Mobil/public`
- Nginx: arahkan `root` ke `.../Rental-Mobil/public`

Ini membantu meningkatkan keamanan dengan tidak mengekspos file internal aplikasi.

## Pengujian (Opsional)

Jika Anda menulis test:
```bash
vendor/bin/phpunit
```

## Roadmap

- [ ] Integrasi pembayaran online (Midtrans/Xendit) atau konfirmasi manual.
- [ ] Manajemen denda keterlambatan dan deposit.
- [ ] Export laporan ke PDF/Excel.
- [ ] Notifikasi email/WhatsApp untuk konfirmasi pesanan.
- [ ] Manajemen supir (jika sewa termasuk driver).

Sesuaikan daftar ini sesuai kebutuhan proyek.

## Screenshot/Demo

- Tambahkan tangkapan layar UI utama Anda di sini:
  - Dashboard Admin
  - Daftar Mobil
  - Form Pemesanan
- Demo (opsional): tambahkan URL jika tersedia.

## Kontribusi

Kontribusi sangat diterima!
- Fork repository, buat branch fitur: `feat/nama-fitur`
- Commit dengan pesan yang jelas
- Ajukan Pull Request dan jelaskan perubahan Anda

## Lisensi

Tambahkan lisensi proyek Anda (mis. MIT). Buat file `LICENSE` dan sebutkan jenis lisensinya di sini.

## Kontak

- Pemilik: @Vyannnnnn
- Repo: https://github.com/Vyannnnnn/Rental-Mobil
- Pertanyaan/masukan: buka Issue di repository

—
Terima kasih sudah menggunakan dan berkontribusi pada proyek Rental Mobil!
