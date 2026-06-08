# Dokumentasi Proyek: Smart Library System

## Deskripsi Singkat
Smart Library System (SLS) adalah sistem manajemen perpustakaan digital berbasis web modern yang dibangun menggunakan Laravel 11. Sistem ini dirancang untuk membantu pengelolaan perpustakaan secara lebih efisien, interaktif, dan modern melalui integrasi dashboard analitik, sistem peminjaman cerdas, dan notifikasi keterlambatan.

* **Admin** - Mengelola buku, kategori, anggota, transaksi peminjaman, laporan, dan monitoring sistem.
* **Member** - Menelusuri katalog buku, melakukan peminjaman online, dan memantau riwayat peminjaman secara mandiri.

---

## Daftar Isi
---
* [Tentang Proyek](#tentang-proyek)
* [Tujuan Sistem](#tujuan-sistem)
* [Fitur Utama](#fitur-utama)
* [Inovasi & Pembaruan Sistem](#inovasi-pembaruan-sistem)
* [Tech Stack](#tech-stack)
* [Struktur Database](#struktur-database)
* [Relasi Antar Tabel](#relasi-antar-tabel)
* [Struktur Folder](#struktur-folder)
* [Alur Sistem](#alur-sistem)
* [Arsitektur Backend](#arsitektur-backend)
* [Cara Instalasi](#cara-instalasi)
* [Akun Default](#akun-default)
* [Struktur Tim](#struktur-tim)
* [Timeline Proyek](#timeline-proyek)
* [Progress Pengerjaan](#progress-pengerjaan)
* [Risk & Challenge](#risk-challenge)
* [Deployment Plan](#deployment-plan)
* [Future Development](#future-development)
* [Repository & Resource](#repository-resource)

---

## Tentang Proyek

Smart Library System dibuat sebagai proyek pengembangan aplikasi web modern untuk mata kuliah Pemrograman Web.

Berbeda dari sistem perpustakaan biasa, proyek ini tidak hanya fokus pada CRUD data, tetapi juga menghadirkan:

* Smart Borrowing Logic (Deteksi keterlambatan otomatis)
* Real-time Notification Logic
* Analytics Dashboard
* Clean Service Architecture
* Responsive Modern Dashboard UI

---

## Tujuan Sistem

### Tujuan Utama

Membangun sistem perpustakaan digital yang:

* Scalable
* Modern
* Responsive
* Memiliki business logic nyata (seperti manajemen stok dan status denda)
* Siap dikembangkan menjadi enterprise system

---

# Tim Pengembang (3 Angggota)

## Dengan perampingan tim menjadi 3 orang, pembagian tanggung jawab disesuaikan secara efisien:

| Nama | Nim | Peran |
|---|---|---|
| **Mohammad Rafif Abdilah** | **2403015086** | **Backend & database** |
| **Putri Auliya Amanda** | **2403015086** | **Frontend Blade/UI** |
| **M Akhtar Ilyas** | **2403015086** | **UI/UX + Testing + Integrasi** |

---

## Timeline & Progress Pengerjaan
### Status Saat Ini: Berada di Minggu ke-2. Fitur dasar backend sedang diselesaikan, dan beberapa poin sudah berhasil dicapai lebih cepat dari jadwal.

## Minggu 1 - Foundation & Authentication System

### Backend Foundation
- [x] Setup project Laravel 11
- [x] Konfigurasi database MySQL
- [x] Setup environment (.env)
- [x] Troubleshooting koneksi database MySQL
- [x] Konfigurasi CACHE_STORE=file untuk recovery artisan
- [x] Setup struktur folder project
- [x] Setup migration database
- [x] Membuat model utama (User, Book, Category, Borrowing)
- [x] Setup authentication login
- [x] Setup role admin & member
- [x] Setup middleware role
- [x] Membuat route awal
- [x] Restrukturisasi route member dashboard
- [x] Setup redirect login berdasarkan role
- [x] Membuat struktur controller
- [x] Setup service layer architecture
- [x] Setup dashboard admin & member terpisah
- [x] Implementasi statistik dashboard awal

### Frontend & UI/UX
- [x] Mendesain dashboard admin di Figma
- [x] Mendesain halaman login
- [x] Mendesain sidebar & layout
- [x] Menentukan color palette & typography
- [x] Mendesain dashboard member
- [x] Mendesain halaman katalog buku

### Team Collaboration
- [x] Diskusi flow sistem & alur user
- [x] Penyusunan workflow peminjaman
- [x] Penyusunan flow role admin/member
- [x] Setup dokumentasi testing
- [x] Setup GitHub repository & branch workflow

## Minggu 2 - Core Backend Development

### Backend Core Features
- [x] CRUD Books & Categories
- [x] Borrowing & Return System
- [x] Overdue Detection & Stock Automation
- [x] Validation Form & Seeder dummy data
- [x] Dashboard statistics logic
- [x] Eloquent relationships (Borrowing → User → Books)
- [x] Query optimization dasar & Restrukturisasi query dashboard
- [x] Setup relasi borrowing → user → books
- [x] Setup status borrowing (borrowed, returned, overdue)
- [x] Setup due_date dan return_date
- [x] Middleware protection admin/member & Refactor authentication flow

### Frontend Development
- [x] Membuat halaman dashboard admin & manage books
- [x] Membuat halaman login responsive
- [x] Membuat component sidebar, topbar & table books
- [x] Membuat modal form CRUD
- [x] Sinkronisasi variable blade & Responsive layout dashboard

### Testing & QA
- [x] Testing login & CRUD
- [x] Testing role access
- [x] Testing borrowing flow
- [x] Testing database consistency

## Minggu 3 - Frontend Integration & Smart Features

### Backend & Smart Features
- [x] Menyiapkan data untuk frontend
- [x] Finalisasi route & endpoint
- [x] Finalisasi validation & Optimasi query database
- [x] Refactor controller structure & Cleanup duplicated route
- [x] Setup realtime notification event

### Frontend Integration
- [x] Integrasi blade dengan backend
- [x] Responsive dashboard & Halaman catalog member
- [x] Borrowing history UI

### Testing & QA
- [x] Testing borrowing flow
- [x] Testing responsive layout
- [x] Testing notification realtime
- [x] Testing frontend-backend integration

## Minggu 4 - Finalization & Deployment

### Backend Finalization
- [x] Fix bug backend
- [x] Security validation
- [x] Optimize Laravel
- [x] Final route cleanup
- [x] Final database cleanup
- [x] Cleanup unused controller
- [x] Refactor duplicated logic
- [x] Error handling improvement
- [x] Final performance optimization

### Frontend Polish
- [x] Final responsive fixing

### Testing & Deployment
- [x] Full system testing
- [x] Testing semua fitur
- [x] Testing edge cases
- [x] Bug reporting
- [x] Final QA testing
- [] Deployment ke hosting
- [x] Konfigurasi production environment
- [] Final dokumentasi
- [] Persiapan presentasi
- [] Persiapan demo sistem

---

## Fitur Utama

### Admin
| Fitur | Deskripsi |
| :--- | :--- |
| Dashboard Analytics | Statistik buku, member, peminjaman, overdue. |
| Book Management | CRUD buku + upload cover. |
| Category Management | CRUD kategori buku. |
| Member Management | Monitoring anggota. |
| Borrowing Management | Approval & return system. |
| Smart Monitoring | Deteksi keterlambatan otomatis. |
| Real-time Notification | Notifikasi langsung. |
| Reports & Analytics | Grafik peminjaman. |

### Member Feautures
| Fitur | Deskripsi |
| :--- | :--- |
| Browse Catalog | Menelusuri katalog. |
| Smart Search | Search & filter. |
| Book Detail | Detail ketersediaan buku. |
| Borrow Request | Ajukan peminjaman. |
| Borrow History | Riwayat peminjaman. |
| Notification | Status peminjaman realtime. |

---

### Tech Stack & Infrastruktur
| Komponen | Teknologi |
|---|---|
| Backend Framework | Laravel 11 |
| Frontend** | Blade + Bootstrap 5 |
| Styling** | MySQL |
| Authentication | Laravel Authentication |
| Realtime** | Laravel Reverb / Pusher |
| Local Server | XAMPP |
| Version Control | Git + GitHub |
| UI Design | Figma |

---

## Struktur Database

```text
smart_library_system
├── users
├── categories
├── books
├── borrowings
├── notifications
├── sessions
└── migrations
```

---

## Relasi Antar Tabel

```text
users ──< borrowings >── books
                            │
categories ────────────────┘
```

| Relasi | Deskripsi |
|---|---|
| User → Borrowings | 1 user banyak transaksi |
| Book → Borrowings | 1 buku banyak transaksi |
| Category → Books | 1 kategori banyak buku |

---

# Struktur Folder

```text
Smart_Library_System/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── BookController.php
│   │   │   │   ├── CategoryController.php
│   │   │   │   ├── BorrowingController.php
│   │   │   │   └── ReportController.php
│   │   │   │
│   │   │   ├── Auth/
│   │   │   │   └── AuthController.php
│   │   │   │
│   │   │   └── Member/
│   │   │       ├── CatalogController.php
│   │   │       ├── BorrowController.php
│   │   │       └── HistoryController.php
│   │   │
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   │
│   ├── Models/
│   │   ├── User.php
│   │   ├── Book.php
│   │   ├── Category.php
│   │   ├── Borrowing.php
│   │   └── Notification.php
│   │
│   └── Services/
│       ├── DashboardService.php
│       ├── BorrowingService.php
│       ├── NotificationService.php
│       └── GeminiService.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   └── views/
│       ├── admin/
│       ├── member/
│       └── layouts/
│
├── routes/
│   └── web.php
│
├── public/
├── storage/
├── .env
├── composer.json
└── README.md
```

### Akun Default

Setelah menjalankan seeder, gunakan akun berikut untuk login:

| **Role** | **Email** | **Password** |
| :--- | :--- | :--- |
| Admin | admin@gmail.com | password123 |
| Member | member@gmail.com | pasword123 |

---

### Timeline Proyek

| **Minggu** | **Fase** | **Aktivitas** | 
| :--- | :--- | :--- |
| Minggu 1 | Inisiasi & Desain | Setup Laravel, database migration, desain Figma (UI/UX), dokumentasi awal. |
| Minggu 2 | Backend Development | CRUD buku & kategori, sistem peminjaman, role middleware, database seeder. |
| Minggu 3 | Frontend & Integrasi | Pembuatan halaman Blade views, styling Tailwind, integrasi Chart.js. | 
| Minggu 4 | Testing & Deployment | QA testing, bug fixing, optimasi sistem. |

---

# Repository & Resoure

| **Resource** | **Link** |
| :--- | :--- |
| GitHub Repository | [https://github.com/rafifabdilah02/SLS_4B](https://github.com/rafifabdilah02/SLS_4B) |
| Figma Design | [Coming Soon] |
| Live Demo | [Coming Soon] |



