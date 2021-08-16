# Technical Test
Web Developer

Default Seed for admin access
- id : admin
- pass : admin

Installation
```bash
php artisan migrate:refresh --seed
```

### Buatlah sebuah website untuk melakukan pendaftaran event HUNTBAZAAR yang akan dilaksanakan pada tanggal 12 Desember 2021 dengan kriteria berikut:

- ** Pendaftaran dibuka hanya untuk undangan. Formulir hanya dapat diisi oleh orang yang memiliki link halaman pendaftaran. Setiap orang mendapatkan link undangan yang berbeda. ✅ **
- ** Link undangan hanya dikirimkan ke email yang diinput oleh admin. Link baru di-generate ketika seseorang / email diundang (perlu buat halaman admin). ✅ **
- ** Kolom yang wajib diisi di dalam undangan adalah: **
- Email - autopopulate sesuai dengan email yang diinput oleh admin. ✅**
- Nama✅
- Tanggal Lahir✅
- Jenis Kelamin✅
- Designer Favorit (untuk list silakan ambil dari halaman ini: ✅  https://www.huntstreet.com/designer (user dapat mengisi lebih dari 1) 
- ** Setiap undangan hanya dapat diisi satu kali. ✅ **
- ** Batas waktu pendaftaran adalah 1 bulan dari technical test ini diterima. ✅ **
- ** Tampilkan countdown timer sisa waktu untuk mendaftar. ✅ **
- ** Ketika form telah di-submit, tampilkan kode registrasi yang di-generate secara acak. ✅ **
- ** Ketika link undangan yang telah diisi dibuka kembali, tampilkan kode registrasi pada nomor 7.✅ **
- ** Satu jam setelah formulir diisi, kirimkan secara otomatis email ucapan terima kasih ke email yang didaftarkan.** ✅
- ** Admin dapat melihat daftar undangan yang telah dikirimkan dan status undangan tersebut. Status yang disimpan di dalam undangan harus menggunakan foreign key. ✅ **

### Kriteria Teknis

- ** Design tampilan bebas, namun tetap dipertimbangkan sebagai penilaian. ✅**
- ** Isi email tidak perlu di-design. ✅**
- ** Buatlah menggunakan PHP dengan menggunakan framework Laravel (wajib). Harus menggunakan fitur berikut:**
- Migration✅
- Seeder✅
- Eloquent✅
- Blade✅
- Middleware✅
- FormRequest✅
- Queue✅
- ** Countdown timer harus dibuat sendiri menggunakan jQuery dan VueJS tanpa menggunakan library yang sudah jadi. (full jquery) **
- ** Kumpulkan jawaban dengan menggunakan repository Bitbucket (ada history commit yang jelas ketika mengerjakan menjadi nilai tambah).✅**

### Screen Shoot
https://imgur.com/a/wzXWX7O

![alt text](https://i.imgur.com/XUvcx1e.jpg)
![alt text](https://i.imgur.com/2v7X1Cq.jpg)
![alt text](https://i.imgur.com/E6kE3w7.jpg)
![alt text](https://i.imgur.com/7hXckQ0.jpg)
![alt text](https://i.imgur.com/H6cRaw2.jpg)
