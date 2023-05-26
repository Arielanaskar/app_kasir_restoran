<p align="center">
<img src="https://i.ibb.co/Ps2bhfH/logo5.png" width="200px">
</p>

<h1 align="center">Aplikasi Kasir Restoran</h1>

<span align="center">
    
![GitHub repo size](https://img.shields.io/github/repo-size/Arielanaskar/app_kasir_restoran)
![GitHub last commit](https://img.shields.io/github/last-commit/Arielanaskar/app_kasir_restoran)
    
</span>

<hr/>
<br/><br/>
<h3>Teknologi yang digunakan :</h3>
<ul>
<li>Front End : HTML, Bootstrap</li>
<li>Backend : Laravel PHP FrameWork</li>
<li>Javascript : Native Javascript, & Jquery</li>
<li>Bootstrap Theme By <a href='https://themes.3rdwavemedia.com/'>[Xiaoying Riley]</a></li>
</ul>
<br/>
<h3>Fitur Aplikasi :</h3>
<h4>Manager</h4>
  <p>Sebagai seorang manager, Anda memiliki kontrol penuh atas aplikasi ini. Fitur-fitur yang tersedia untuk level hak akses manager antara lain:</p>
  <ul>
    <li>Melihat laporan penjualan secara harian, bulanan, maupun keseluruhan.</li>
    <li>Mengelola produk, termasuk menambah, menghapus, dan memperbarui informasi produk.</li>
    <li>Memantau aktivitas pegawai dalam aplikasi.</li>
  </ul>

  <h4>Kasir</h4>
  <p>Sebagai seorang kasir, Anda bertanggung jawab untuk menangani transaksi penjualan. Berikut adalah fitur-fitur yang tersedia untuk level hak akses kasir:</p>
  <ul>
    <li>Melakukan transaksi penjualan dengan input produk, kuantitas, dan meja.</li>
    <li>Mencetak struk pembayaran untuk pelanggan.</li>
    <li>Melihat riwayat transaksi penjualan pribadi.</li>
    <li>Memperbarui status pembayaran untuk transaksi tertentu.</li>
  </ul>

  <h4>Admin</h4>
  <p>Sebagai seorang admin, Anda memiliki peran penting dalam pengaturan sistem aplikasi. Fitur-fitur yang tersedia untuk level hak akses admin meliputi:</p>
  <ul>
    <li>Mengelola akun pegawai, termasuk membuat, menghapus, dan memperbarui informasi pegawai.</li>
    <li>Mengatur level hak akses pegawai.</li>
    <li>Memantau aktivitas pegawai dalam aplikasi.</li>
  </ul>
<br><br>
<h3>Tampilan Aplikasi</h3>
<br><br>

### <p>Tanggal Rilis</p>
**Release date : 6 April 2020**
> Siapapun diperbolehkan untuk fork/clone atau develop project ini dan berikan project stars dan follow akun saya juga oke, karena ini merupakan project yang saya buat ketika UKK

------------
## 💻 Panduan Instalasi Project

1. **Clone Repository**
```bash
git clone https://github.com/Arielanaskar/app_kasir_restoran.git
cd app_kasir_restoran
composer install
npm install
copy .env.example rename->.env
```
2. **Buka ```.env``` lalu ubah baris berikut sesuaikan dengan databasemu yang ingin dipakai**
```
DB_PORT=3306
DB_DATABASE=app_kasir_restoran
DB_USERNAME=root
DB_PASSWORD=
```

3. **Migration & Seeder Database SQL**
```bash
php artisan migrate
php artisan db:seed
```

4. **Jalankan bash**
```bash
php artisan key:generate
php artisan config:cache
php artisan storage:link
php artisan route:clear
```

5. **Jalankan website**
```bash
php artisan serve
```

5. **Akun Login**
```bash
username: admin
password: asd321 

username: manager 
password: asd321

username: cashier
password: asd321 
```

## 🧑 Pemilik

👤 <a href="https://www.instagram.com/ryandinulfatah12/"> **Ariel Anaskar**</a>
