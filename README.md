# 🧑‍💻 Daily Work Attendance System

Sistem absensi harian berbasis web yang menggabungkan:

- ✅ Absensi (check-in & check-out)
- ✅ Daily work log (rencana & hasil kerja)
- ✅ Mini task list
- ✅ Admin dashboard

Dibangun menggunakan:

- Laravel (Backend)
- React.js (Frontend)
- Inertia.js (Bridge Laravel ↔ React)

---

# 🚀 Features

- Check-in dengan rencana kerja (plan)
- Check-out dengan hasil kerja (result)
- Mini task list per hari
- Tracking status task (done / belum)
- Dashboard admin untuk monitoring user

---

# 🧱 Tech Stack

- Laravel
- React.js
- Inertia.js
- MySQL

---

# ⚙️ Installation Guide

Ikuti langkah berikut untuk menjalankan project ini di lokal:

---

## 1. Clone Repository

```bash
git clone https://github.com/username/nama-project.git
cd nama-project
```

---

## 2. Install Dependency Backend (Laravel)

```bash
composer install
```

---

## 3. Install Dependency Frontend (React)

```bash
npm install
```

---

## 4. Setup Environment

Copy file `.env`:

```bash
cp .env.example .env
```

Lalu generate app key:

```bash
php artisan key:generate
```

---

## 5. Setup Database

Edit file `.env`:

```env
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

Lalu jalankan migration:

```bash
php artisan migrate
```

---

## 6. Jalankan Server

Jalankan Laravel:

```bash
php artisan serve
```

Jalankan React (Vite):

```bash
npm run dev
```

---

## 7. Akses Aplikasi

Buka di browser:

```
http://127.0.0.1:8000
```

---

# 🔐 Default Role System

Terdapat 2 role:

- `admin`
- `employee`

Untuk mengubah role user, bisa langsung edit di database (table `users`).

---

# 🧠 Cara Penggunaan

### 👤 User:

1. Login
2. Check-in (isi rencana kerja)
3. Tambah task
4. Tandai task selesai
5. Check-out (isi hasil kerja)

---

### 🧑‍💼 Admin:

1. Login sebagai admin
2. Akses dashboard admin
3. Monitoring aktivitas user

---

# 📂 Struktur Utama Project

```
app/
 ├── Models/
 ├── Http/Controllers/

resources/
 ├── js/Pages/
 ├── js/Components/

database/
 ├── migrations/
```

---

# ⚠️ Catatan Penting

- Pastikan Node.js & PHP sudah terinstall
- Gunakan PHP minimal versi 8+
- Gunakan MySQL / MariaDB

---

# 🤝 Contributing

Silakan fork project ini dan buat pull request jika ingin berkontribusi.

---

# 📄 License

Project ini bersifat open-source dan bebas digunakan untuk pembelajaran.
