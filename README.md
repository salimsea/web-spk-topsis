# Aplikasi SPK Metode TOPSIS

![visitors](https://visitor-badge.laobi.icu/badge?page_id=salimsea.web-spk-topsis)

## Demo Aplikasi
<img width="500" alt="image" src="https://github.com/salimsea/web-spk-topsis/assets/49223890/140c1297-3ddf-4da3-b230-eb9293c55de3">

## Deskripsi
Aplikasi ini adalah sistem pendukung keputusan (SPK) yang menggunakan metode TOPSIS (Technique for Order Preference by Similarity to Ideal Solution) untuk membantu dalam proses penilaian dan pengambilan keputusan. Metode ini menilai kandidat berdasarkan kedekatan mereka dengan solusi ideal.

## Fitur
- Input data kriteria dan bobot
- Input data alternatif
- Perhitungan TOPSIS
- Hasil perhitungan dan ranking alternatif

## Teknologi yang Digunakan
- PHP
- MySQL
- HTML
- CSS
- JavaScript

## Instalasi
1. Clone repository ini ke lokal Anda:
    ```bash
    git clone https://github.com/salimsea/web-spk-topsis.git
    ```

2. Masuk ke direktori project:
    ```bash
    cd repo
    ```

3. Buat database di MySQL dan impor file `database.sql` yang ada di folder `sql`:
    ```sql
    CREATE DATABASE spk_topsis;
    USE spk_topsis;
    SOURCE database.sql;
    ```

4. Ubah file koneksi database di `koneksi.php`:
    ```php
    <?php
    $konek = mysqli_connect("localhost","root","","db_name");
    ?>
    ```

5. Jalankan aplikasi dengan membuka file `index.php` di browser:
    ```bash
    http://localhost/web-spk-topsis/index.php
    ```

## Penggunaan
1. Tambahkan data kriteria dan bobot di halaman `kriteria.php`.
2. Tambahkan data alternatif di halaman `produk.php`.
3. Lakukan perhitungan TOPSIS di halaman `analisa.php`.
4. Lihat hasil ranking di halaman `analisa_hasil.php`.

## Kontribusi
Silakan membuat pull request atau mengajukan issue jika Anda ingin berkontribusi pada proyek ini.


