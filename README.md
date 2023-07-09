<p align="center">
<img src="https://i.ibb.co/Ps2bhfH/logo5.png" width="200px">
</p>

<h1 align="center">Aplikasi Kasir Restoran</h1>

<span align="center">
    
![GitHub repo size](https://img.shields.io/github/repo-size/Arielanaskar/app_kasir_restoran)
![GitHub last commit](https://img.shields.io/github/last-commit/Arielanaskar/app_kasir_restoran)
    
</span>

<hr/>
<br/>
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
<br>
<h3> Beberapa Tampilan Aplikasi :</h3>
<br>
<table>
<tr>
    <td>
    <small>Halaman List Menu</small>
        <img src="https://i.ibb.co/JrcCyRc/Screenshot-297.png" alt="Screenshot-297" width="100%" border="0">
    </td>
    <td>
    <small>Halaman Order Menu</small>
        <img src="https://i.ibb.co/PTKJzLz/Screenshot-300.png" alt="Screenshot-300" width="100%" border="0">   
    </td>
</tr>
<tr>
    <td>
        <small>Pemilihan Meja</small>
        <img src="https://i.ibb.co/dkXqfxR/Screenshot-301.png" alt="Screenshot-301" width="100%" border="0">
    </td>
     <td>
        <small>Halaman Data Transaksi</small>
        <img src="https://i.ibb.co/TgQB2wR/Screenshot-302.png" alt="Screenshot-302" width="100%" border="0">
    </td>
</tr>
<tr>
    <td>
        <small>Log Aktivitas</small>
        <img src="https://i.ibb.co/Ws487dK/Screenshot-303.png" alt="Screenshot-303" width="100%" border="0">
    </td>
</tr>   
</table> 
<br><br>

### <p>Tanggal Rilis</p>
**Release date : 4 April 2023**
> Siapapun diperbolehkan untuk fork/clone atau develop project ini dan berikan project stars dan follow akun saya juga oke, karena ini merupakan project yang saya buat ketika UKK

------------
## 💻 Panduan Instalasi Project

1. **Clone Repository**
```bash
git clone https://github.com/Arielanaskar/app_kasir_restoran.git
cd app_kasir_restoran
composer install
copy .env.example rename->.env
```
2. **Buka ```.env``` lalu ubah baris berikut sesuaikan dengan databasemu yang ingin dipakai**
```
DB_PORT=3306
DB_DATABASE=app_kasir_restoran
DB_USERNAME=root
DB_PASSWORD=
```

3. **Migration & Seeder Database SQL** (pastikan internet nyala, untuk mengunduh gambar dari setiap menu)
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
Admin
username: admin
password: asd321 

Manager
username: manager 
password: asd321

Kasir
username: cashier
password: asd321 
```

## 🧑 Pemilik

👤  <a href="https://www.instagram.com/arilanaskar_/"> **Ariel Anaskar**</a>
- Facebook : <a href="https://web.facebook.com/ariel.anaskar.95"> Ariel Anaskar</a>

## Contributing
Contributions, issues and feature requests di persilahkan.
Jangan ragu untuk memeriksa halaman masalah jika Anda ingin berkontribusi.
