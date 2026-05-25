# Dokumentasi Proyek: Smart Library System

## Deskripsi Singkat
Smart Library System (SLS) adalah sistem manajemen perpustakaan digital berbasis web modern yang dibangun menggunakan Laravel 11. Sistem ini dirancang untuk membantu pengelolaan perpustakaan secara lebih efisien, interaktif, dan modern melalui integrasi dashboard analitik, sistem peminjaman cerdas, notifikasi real-time, dan AI Assistant berbasis Gemini API

* **Admin** - Mengelola buku, kategori, anggota, transaksi peminjaman, laporan, dan monitoring sistem.
* **Member** - Menelusuri katalog buku, melakukan peminjaman online, memantau riwayat, dan menggunakan AI Assistant untuk rekomendasi buku.

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

* Smart Borrowing Logic
* AI Book Recommendation
* Real-time Notification
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
* Memiliki business logic nyata
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

## Minggu 1 
- [x] Setup project Laravel 11
- [x] Konfigurasi database MySQL
- [x] Setup environment (.env)
- [x] Setup struktur folder project
- [x] Setup migration database
- [x] Membuat model utama (User, Book, Category, Borrowing)
- [x] Setup authentication login
- [x] Setup role admin & member
- [x] Setup middleware role
- [x] Membuat route awal
- [x] Membuat struktur controller
- [x] Setup service layer architecture
- [ ] Mendesain dashboard admin di Figma
- [ ] Mendesain halaman login
- [ ] Mendesain sidebar & layout
- [ ] Menentukan color palette & typography
- [ ] Diskusi flow sistem & alur user
- [ ] Setup dokumentasi testing

## Minggu 2
- [x] CRUD Books
- [x] CRUD Categories
- [x] Borrowing System
- [x] Return System
- [x] Overdue Detection
- [x] Stock Automation
- [x] Validation Form
- [x] Seeder dummy data
- [x] Dashboard statistics logic
- [x] Eloquent relationships
- [x] Query optimization dasar
- [ ] Membuat halaman dashboard admin
- [ ] Membuat halaman manage books
- [ ] Membuat halaman login responsive
- [ ] Membuat component sidebar
- [ ] Membuat table books
- [ ] Sinkronisasi variable blade
- [ ] Testing login & CRUD
- [ ] Testing role access

## Minggu 3 —
- [x] Menyiapkan data untuk frontend
- [x] Finalisasi route & endpoint
- [x] Finalisasi validation
- [x] Integrasi Gemini API
- [x] Integrasi notification realtime
- [x] Optimasi query database
- [ ] Integrasi blade dengan backend
- [ ] Responsive dashboard
- [ ] Halaman catalog member
- [ ] Borrowing history UI
- [ ] Statistik dashboard
- [ ] Integrasi Chart.js
- [ ] Integrasi fullstack
- [ ] Testing borrowing flow
- [ ] Testing responsive layout
- [ ] Testing AI chatbot

## Minggu 4
- [x] Fix bug backend
- [x] Security validation
- [x] Optimize Laravel
- [x] Final route cleanup
- [x] Final database cleanup
- [ ] UI polishing
- [ ] Final responsive fixing
- [ ] Animation & UX refinement
- [ ] Full system testing
- [ ] Testing semua fitur
- [ ] Testing edge cases
- [ ] Bug reporting
- [ ] Deployment ke hosting
- [ ] Final dokumentasi
- [ ] Persiapan presentasi

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
| AI Monitoring Assistant | Bantuan pencarian & rekomendasi. |

### Member Feautures
| Fitur | Deskripsi |
| :--- | :--- |
| Browse Catalog | Menelusuri katalog. |
| Smart Search | Search & filter. |
| Book Detail | Detail lengkap buku. |
| Borrow Request | Ajukan peminjaman. |
| Borrow History | Riwayat peminjaman. |
| AI Chatbot | Rekomendasi buku AI. |
| Notification | Status peminjaman realtime. |

---

### Tech Stack & Infrastruktur
| Komponen | Teknologi |
|---|---|
| Backend Framework | Laravel 11 |
| Frontend** | Blade + Bootstrap 5 |
| Styling** | MySQL |
| Authentication | Laravel Authentication |
| AI Integration | Gemini API** |
| Realtime** | Laravel Reverb / Pusher |
| Chart Analytics | Chart.js |
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
| Minggu 4 | Testing & Deployment | QA testing, bug fixing, optimasi sistem, deployment ke GoogieHost. |

---

# Repository & Resoure

| **Resource** | **Link** |
| :--- | :--- |
| GitHub Repository | [https://github.com/rafifabdilah02/SLS_4B](#https://github.com/rafifabdilah02/SLS_4B) |
| Figma Design | [Coming Soon] |
| Live Demo | [Coming Soon] |



