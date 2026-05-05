<div align="center">
    <img  alt="logo" src="/public/img/hospital_logo.png"/>
    <h1>Tugas Besar</h1>
    <h3>II3160 - Teknologi Sistem Terintegrasi</h3>
</div>
<br>

<div align="center">
    <img src="https://readme-typing-svg.herokuapp.com?font=Itim&size=48&pause=1000&color=005792&center=true&vCenter=true&random=false&width=1000&height=60&lines=Teknologi+Sistem+-+Terintegrasi;Sistem+Rumah+Sakit;Sistem+Apotek" alt="Typing SVG">
</div>

## List of Contents

1. [System Overview](#system-overview)
2. [Core Domain](#core-domain)
3. [Team Members](#team-members)
4. [Tech Stack](#tech-stack)
5. [How to Run](#how-to-run)
6. [Deployment](#deployment)
7. [Features](#features)
8. [Documentation](#documentation)

## System Overview

Sistem TST Hospital membantu rumah sakit dalam kegiatan-kegiatan pendaftaran pasien, pencatatan hasil kunjungan, pembuatan preskripsi obat yang secara langsung dikirim ke sistem apotek, dan sistem pencatatan pembayaran. Sistem ini dibuat untuk mempermudah segala kegiatan pencatatan dan pemesanan obat di rumah sakit.

## Core Domain

Sistem rumah sakit bertugas untuk melayani pembayaran untuk segala transaksi di rumah sakit dan apotek. Selanjutnya, sistem rumah sakit melakukan rekapitulasi masukan uang tiap bulannya untuk diberikan ke sistem apotek. Dengan memanfaatkan sistem ini, sistem apotek akan dipermudah karena tidak lagi perlu menyediakan sistem pembayaran tersendiri. 

## Team Members

<table>
    <tr align="center">
        <th>No.</th>
        <th>Nama</th>
        <th>NIM</th>
    </tr>
    <tr>
        <td>1.</td>
        <td>Frendy Sanusi</td>
        <td>18221041</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Nadira R. A.</td>
        <td>18221059</td>
    </tr>
    <tr>
        <td>3.</td>
        <td>Vania Salsabila</td>
        <td>18221075</td>
    </tr>
</table>

## Tech Stack

- PHP
- Codeigniter 4
- Tailwind CSS
- MySQL
- phpMyAdmin
- Postman
- Github dan Git
- Docker
- Visual Studio Code

![Code-Igniter](https://img.shields.io/badge/CodeIgniter-%23EF4223.svg?style=for-the-badge&logo=codeIgniter&logoColor=white)

[![My Skills](https://skillicons.dev/icons?i=php,tailwind,mysql,postman,github,git,docker,vscode)](https://skillicons.dev)

## How to run

### By local

1. Clone respository ini

2. Masuk ke directory

```
cd /ci-hospital
```

3. Copy konten file .env.example menjadi .env

4. Setup aplikasi menggunakan command berikut

```
composer install
npm install
php spark migrate
php spark db:seed DataSeeder
php spark db:seed PasienCredentialSeeder
```

5. Jalankan aplikasi menggunakan command berikut
```
php spark serve
```
6. Service berjalan pada http://localhost:8080 pada browser Anda

7. Gunakan informasi login berikut:
```
# Login sebagai admin
username: admin
password: password

# Login sebagai dokter
username: dokter_a
password: password

# Login sebagai pasien
username: pasien_a
password: password
```

### By Docker

1. Jalankan command berikut.
```
make setup
```

2. Service berjalan pada http://localhost:8080 pada browser Anda


## Deployment

Deployment dilakukan menggunakan Docker dalam bentuk container

## Features

1. **Login** - melakukan validasi dan autorisasi pengguna. Terdapat **3 role** dalam sistem ini: **Admin**, **Dokter**, dan **Pasien**. Setiap role memiliki akses dan tampilan dashboard yang berbeda sesuai kebutuhan.

2. **Dashboard Dokter** - dokter dapat melihat daftar obat yang tersedia di sistem, mengelola data kunjungan pasien, serta melihat profil diri.

3. **Add Kunjungan** - dokter dapat menambahkan data kunjungan, memilih pasien, mengisi keluhan, diagnosa, dan preskripsi obat. Stok obat akan otomatis berkurang sesuai preskripsi yang diberikan.

4. **Profile** - dokter dan admin dapat melihat data diri serta melakukan Log Out pada halaman profil.

5. **Add/Edit/Delete Patients** - admin dapat melakukan manajemen data pasien untuk kebutuhan pendaftaran.

6. **Edit Transactions** - admin dapat mengkonfirmasi dan mengelola data transaksi pembayaran.

7. **Send Recapitulation** - admin dapat mengirimkan data rekapitulasi keuangan untuk bulan tertentu.

8. **Dashboard Pasien** - pasien dapat login dan melihat riwayat kunjungan mereka sendiri beserta informasi diagnosa dan preskripsi obat.

## Documentation
[Documentation](https://docs.google.com/document/d/11VVUq3s6EbKkoQnYY_Sl7ymabZufGoWuneDM68WyuzY/edit?usp=sharing)

*Development processes and interfaces are provided in the document.*
