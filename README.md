# 🌟 Website Belajar Bahasa Daerah

Proyek ini adalah platform belajar bahasa daerah menggunakan **Laravel**, **Breeze**, **Spatie**, dan **Tailwind CSS**. Website ini membantu siswa mempelajari 5 bahasa daerah dengan fitur seperti **leaderboard**, **tracking**, dan antarmuka yang responsif.

---

## 📚 Fitur Utama

1. **Belajar Bahasa Daerah**  
   - Bahasa: Jawa, Sunda, Madura, Bali, Minang.  
   - Level Pembelajaran: Ngoko, Madya, Krama (sesuai struktur bahasa).

2. **Leaderboard**  
   - Menampilkan peringkat user berdasarkan progres dan nilai.

3. **Tracking**  
   - User dapat memantau progress belajar secara real-time.

4. **Autentikasi dan Role Management**  
   - Menggunakan **Laravel Breeze** dan **Spatie Permission**.  
   - Role Pengguna:  
     - **Admin**: Kelola konten dan pengguna.  
     - **User**: Akses materi dan kuis.

5. **UI Responsif**  
   - Dibangun dengan **Tailwind CSS** untuk tampilan modern dan responsif di berbagai perangkat.

---

## 🛠️ Teknologi yang Digunakan

| Teknologi             | Deskripsi                          |
|------------------------|------------------------------------|
| **Laravel 10**         | Framework backend PHP.            |
| **Laravel Breeze**     | Autentikasi pengguna.             |
| **Spatie Permission**  | Role-based access control (RBAC). |
| **Tailwind CSS**       | Framework CSS modern.             |
| **Vite**               | Build tool frontend.              |
| **MySQL**              | Database untuk penyimpanan data.  |
| **Alpine.js**          | Library interaktivitas frontend.  |

---

## 🖥️ Instalasi Proyek

### Persyaratan Sistem

- **PHP** >= 8.1  
- **Composer**  
- **Node.js** & **npm**  
- **MySQL**  

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/aliyyarahma20/hai-bu.git
   cd project-laravel
2. **Install Dependencies**
   ```bash
   composer install
   npm install     
3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
4. **Konfigurasi Database**
   ```bash
   DB_DATABASE=nama_database
   DB_USERNAME=username
   DB_PASSWORD=password   
5. **Migrasi Database**
    Edit file .env dan sesuaikan pengaturan database:
   ```bash
   php artisan migrate --seed
6. **Jalankan Vite dan Server Laravel**
   ```bash
   npm run dev
   php artisan serve
7. **Akses Aplikasi**
    Buka browser dan kunjungi:
    http://localhost:
   
---

## 📂 Struktur Folder Utama

- **`app/Http/Controllers`** → Menangani logika aplikasi dan request.  
- **`app/Models`** → Model untuk database.  
- **`database/migrations`** → File migrasi untuk struktur database.  
- **`database/seeders`** → Seeder untuk data awal, seperti pengguna dan peran.  
- **`resources/views`** → File Blade untuk antarmuka pengguna (UI).  
- **`routes/web.php`** → Routing web aplikasi.  
- **`public/`** → Aset publik seperti gambar, CSS, dan JavaScript.  
- **`resources/css`** → File Tailwind CSS dan styling lainnya.  
- **`resources/js`** → File JavaScript dan integrasi frontend.  
- **`storage/`** → Menyimpan cache, file log, dan data lainnya.  

---

## 👥 Role Pengguna

| Role      | Deskripsi                                   |
|-----------|--------------------------------------------|
| **Admin** | Mengelola pengguna, materi, dan leaderboard. |
| **Siswa** | Belajar materi, mengerjakan kuis, dan melihat skor. |

---

## 🚀 Deployment

1. **Deploy**
   ```bash
   npm run build
   php artisan optimize

---

## 🎉 Terima Kasih!
Semoga proyek ini memberikan dampak positif bagi pembelajaran bahasa daerah Indonesia. 😊
