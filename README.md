# Dokumentasi Proyek: LibraryMS

## Tentang Proyek
LibraryMS adalah aplikasi web sistem manajemen perpustakaan digital yang dikembangkan sebagai proyek mata kuliah Pemrograman Web. Sistem ini dirancang untuk mempermudah pengelolaan perpustakaan dengan dua peran pengguna utama:

* **Admin** - Mengelola seluruh data buku, anggota, kategori, dan proses peminjaman.
* **Member** - Dapat menelusuri katalog buku dan mengajukan peminjaman secara online.

---

# Tim Pengembang (3 Angggota)

## Dengan perampingan tim menjadi 3 orang, pembagian tanggung jawab disesuaikan secara efisien:

| Nama | Nim | Peran |
|---|---|---|
| **Mohammad Rafif Abdilah** | **2403015086** | **Project Manager & Fullstack Developer(Lead backend, integrasi sistem, & arsitektur database)** |
| **Putri Auliya Amanda** | **2403015086** | **Frontend Developer & UI/UX Designer(Desain Figma, slicing Blade views, & styling Tailwind CSS)** |
| **M Akhtar Ilyas** | **2403015086** | **Backend Developer & QA Tester(CRUD fitur, keamanan token/middleware, & testing bug)** |

---

## Timeline & Progress Pengerjaan
### Status Saat Ini: Berada di Minggu ke-2. Fitur dasar backend sedang diselesaikan, dan beberapa poin sudah berhasil dicapai lebih cepat dari jadwal.

## Minggu 1 — Inisiasi & Desain (Selesai - 100%)
- [x] Setup project awal menggunakan Laravel 11
- [x] Instalasi dan konfigurasi Laravel Breeze untuk sistem autentikasi
- [x] Konfigurasi database MySQL dan file .env
- [x] Pembuatan migrasi tabel dasar: categories, books, dan borrowings
- [x] Kustomisasi tabel users (Menambahkan kolom role, phone, dan address)
- [x] Desain UI di Figma untuk halaman utama (Dashboard Admin & Portal Member)
- [x] Setup repository GitHub bersama beserta branch manajemen tim

## Minggu 2 — Backend Development (Sedang Berjalan - 60%)
- [x] Pembuatan relasi antar Model Eloquent (User, Book, Category, Borrowing)
- [x] Fitur backend untuk CRUD Kategori Buku oleh Admin
- [x] Fitur backend untuk CRUD Buku lengkap dengan logic upload cover dokumen
- [ ] Fitur backend untuk manajemen data Anggota/Member oleh Admin
- [ ] Implementasi sistem pengajuan dan persetujuan (approval) peminjaman buku
- [ ] Penerapan Role Middleware untuk membatasi hak akses Admin vs Member
- [ ] Pembuatan Database Seeder untuk data dummy pengujia

## Minggu 3 — Frontend & Integrasi (Belum Mulai - 0%)
- [ ] Pembuatan layout dashboard Admin (sidebar, topbar, responsive mobile)
- [ ] Pembuatan layout portal Member (navbar, catalog grid, footer)
- [ ] Slicing desain Figma ke dalam kode komponen Blade Views
- [ ] Integrasi library Chart.js untuk grafik statistik di halaman laporan admin
- [ ] Implementasi fitur live search dan filter kategori buku

## Minggu 4 — Testing & Deployment (Belum Mulai - 0%)
- [ ] Pengujian menyeluruh (Quality Assurance) untuk semua fitur dan validasi form
- [ ] Perbaikan bug dan optimasi performa aplikasi (php artisan optimize)
- [ ] Deployment aplikasi ke free hosting (GoogieHost)
- [ ] Penyusunan laporan akhir dan finalisasi dokumentasi proyek

---

## Fitur Utama

### Admin
| Fitur | Deskripsi |
| :--- | :--- |
| **Dashboard** | **Statistik real-time: total buku, anggota aktif, peminjaman berjalan, keterlambatan.** |
| **Kelola Buku** | **CRUD buku lengkap dengan upload cover, filter kategori, dan pencarian.** |
| **Kelola Anggota** | **Manajemen data anggota, detail profil, dan riwayat peminjaman.** |
| **Kelola Peminjaman** | **Approval/reject pengajuan, monitoring status, dan tandai pengembalian.** |
| **Kelola Kategori** | **CRUD kategori buku.** |
| **Laporan** | **Grafik aktivitas peminjaman bulanan, kategori terpopuler, dan export data.** |
| **Pengaturan** | **Manajemen profil dan keamanan akun admin.** |

### Member
| Fitur | Deskripsi |
| :--- | :--- |
| **Katalog Buku** | **Browse buku dengan filter kategori, pencarian, dan cek ketersediaan stok.** |
| **Detail Buku** | **Informasi lengkap buku + tombol ajukan peminjaman.** |
| **Riwayat Peminjaman** | **Pantau status peminjaman (pending, aktif, terlambat, selesai).** |

---

## Tech Stack & Infrastruktur
| Komponen | Teknologi |
|---|---|
| **Backend Framework** | **Laravel 11** |
| **Authentication** | **Laravel Breeze** |
| **Frontend Styling** | **Tailwind CSS** |
| **Database** | **MySQL 8.0** |
| **Chart / Visualisasi** | **Chart.js** |
| **Server Lokal** | **PHP Built-in / Laragon / XAMPP** |
| **Version Control** | **Git + GitHub** |
| **Design UI** | **Figma** |
| **Deployment** | **GoogieHost (Free Hosting)** |


## Struktur Database

```text
library_management
├── users         → Data pengguna (admin & member) + role, phone, address
├── categories    → Kategori buku (Fiksi, Non-Fiksi, Sains, dll)
├── books         → Data buku lengkap (judul, pengarang, stok, cover)
├── borrowings    → Transaksi peminjaman
│                    (pending, approved, rejected, returned, overdue)
├── sessions      → Session Laravel (default)
└── migrations    → Riwayat migrasi database (default)
```

---

## Relasi Antar Tabel

```text
users       ──< borrowings >── books
                                 │
categories ──────────────────────┘
```

- Satu user dapat memiliki banyak borrowings.
- Satu book dapat dipinjam berkali-kali.
- Satu category dapat memiliki banyak books.

---

#Struktur Folder

```text
library-management-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── BookController.php
│   │   │   │   ├── MemberController.php
│   │   │   │   ├── BorrowingController.php
│   │   │   │   ├── CategoryController.php
│   │   │   │   └── ReportController.php
│   │   │   └── Member/
│   │   │       ├── CatalogController.php
│   │   │       └── BorrowingHistoryController.php
│   │   └── Middleware/
│   │       └── RoleMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Book.php
│       ├── Category.php
│       └── Borrowing.php
├── database/
│   ├── migrations/
│   │   ├── ..._create_users_table.php
│   │   ├── ..._create_categories_table.php
│   │   ├── ..._create_books_table.php
│   │   ├── ..._create_borrowings_table.php
│   │   └── ..._add_role_to_users_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── UserSeeder.php
│       ├── CategorySeeder.php
│       └── BookSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── admin.blade.php
│       │   └── member.blade.php
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── books/
│       │   ├── members/
│       │   ├── borrowings/
│       │   ├── categories/
│       │   ├── reports/
│       │   └── settings.blade.php
│       └── member/
│           ├── catalog/
│           └── history/
├── routes/
│   └── web.php
├── public/
│   └── storage/ (symlink untuk cover buku)
├── .env.example
├── composer.json
└── README.md
```

### Akun Default

Setelah menjalankan seeder, gunakan akun berikut untuk login:

| **Role** | **Email** | **Password** |
| :--- | :--- | :--- |
| **Admin** | **admin@gmail.com** | **password123** |
| **Member** | **member@gmail.com** | **pasword123** |

---

### Timeline Proyek

| **Minggu** | **Fase** | **Aktivitas** | 
| :--- | :--- | :--- |
| **Minggu 1** | **Inisiasi & Desain** | **Setup Laravel, database migration, desain Figma (UI/UX), dokumentasi awal.** |
| **Minggu 2** | **Backend Development** | **CRUD buku & kategori, sistem peminjaman, role middleware, database seeder.** |
| **Minggu 3** | **Frontend & Integrasi** | **Pembuatan halaman Blade views, styling Tailwind, integrasi Chart.js.** | 
| **Minggu 4** | **Testing & Deployment** | **QA testing, bug fixing, optimasi sistem, deployment ke GoogieHost.** |




