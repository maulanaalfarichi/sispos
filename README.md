# sispos - Sistem Posko
# SIKOBE powered by Laravel PHP Framework
[![StyleCI](https://styleci.io/repos/69106847/shield?style=flat)](https://styleci.io/repos/7548986)
[![Build Status](https://travis-ci.org/feelinc/sikobe.svg)](https://travis-ci.org/feelinc/sikobe)

***Sistem Informasi Korban Bencana***

Aplikasi web ini awalnya di bangun untuk membantu para relawan memberikan informasi mengenai situasi dari semua area yang terdampak bencana banjir di ***Garut***, sehingga publik dapat memantau perkembangannya dan dapat menyalurkan bantuan ke area yang membutuhkan.

Aplikasi ini di bangun pertama kali oleh para [Relawan TIK]-Perhimpunan Pengembang Platform TIK Garut. daerah ***Garut***. Karena keterbatasan waktu para relawan yang mempunyai kemampuan web programming, maka awal belum semua fasilitas terimplementasi. Di bawah adalah screenshot tampilan dari fasilitas yang telah tersedia.

Di dukung dan system requirement di rancang oleh Rinda Cahyana

## Screenshots
- Halaman depan : [Foto 1](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/homepage-1.jpg)
- Mengelola Area Terdampak : [Foto 1](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/area-management-1.jpg) [Foto 2](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/area-management-2.jpg) [Foto 3](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/area-management-3.jpg) 
- Mengelola Posko : [Foto 1](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/post-management-1.jpg) [Foto 2](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/post-management-2.jpg)
- Mengelola Informasi : [Foto 1](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/information-management-1.jpg)
- Mengelola User : [Foto 1](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/user-management-1.jpg)
- Mengelola Pesan : [Foto 1](https://github.com/feelinc/sikobe/blob/master/SCREENSHOTS/message-management-1.jpg)


## Instalasi

##### Requirement
- versi PHP : silahkan lihat dokumentasi [Laravel 5.3.x](https://laravel.com/docs/5.3/installation#server-requirements).
- MariaDB / MySQL.
- 1 buah domain / subdomain : contoh sikobe.wilayah-anda.id
- 1 buah sub-domain : contoh api.sikobe.wilayah-anda.id
- Anda harus mengetahui cara instalasi / pemasangan Laravel PHP Framework.

##### Langkah Instalasi SIKOBE

1) Clone repository ini atau [download](https://github.com/feelinc/sikobe/archive/master.zip).

2) Download Composer : https://getcomposer.org/composer.phar, kemudian simpan di dalam folder sikobe.

3) Buat sebuah database. Kemudian import file "/SQL/tables.sql" sehingga terbentuk semua tabel yang di butuhkan.

4) Copy file ".env.example" ganti menjadi ".env".

5) Edit file ".env" tadi, kemudian isi informasi di dalamnya :
   - APP_URL : contoh http://sikobe.wilayah-anda.id
   - APP_DOMAIN : contoh sikobe.wilayah-anda.id
   - API_DOMAIN : contoh http://api.sikobe.wilayah-anda.id
   - JWT_KEY : isi dengan random string
   - POSKO_PUSAT_LATITUDE : contoh -7.2066635
   - POSKO_PUSAT_LONGITUDE : contoh 107.8261692
   - GOOGLE_ANALYTIC_UA : contoh UA-84943613-1
   - GOOGLE_API_KEY: buat sebuah api key di [Google Developer website](https://developers.google.com/maps/documentation/javascript/)
   - dan semua informasi koneksi ke database

6) Melalui terminal / command prompt, masuk kedalam folder sikobe, dan jalankan perintah di bawah, pastikan koneksi internet tersedia.
```sh
php composer.phar install
```

7) Login : contoh http://sikobe.wilayah-anda.id/login , login menggunakan email yang terdaftar di tabel "users" dengan password semua "123456" (tanpa kutip).

##### Mengganti isi halaman "Kirim Pesan"
Silahkan modifikasi file "/resources/views/contact.blade.php"

##### Mengganti isi popup "Mengenai SIKOBE"
Silahkan modifikasi file "/resources/views/layouts/app-front.blade.php"

## Teknologi

SIKOBE menggunakan berbagai macam proyek open source:

* [Laravel](https://laravel.com) - Revolutionize how you build the web!
* [React JS](https://facebook.github.io/react/) - a JavaScript Library for building user interfaces!
* [React Starter Kit](https://github.com/kriasoft/react-starter-kit) - "isomorphic" web app boilerplate.
* [Twitter Bootstrap](http://getbootstrap.com/) - great UI boilerplate for modern web apps.
* [jQuery](https://jquery.com/)
* Etc.
 
## Pengembang Awal
Semua kontributor awal
* Sulaeman
* Ikbal M H
* Antonio S I
* Saddam
## Ikut Mengembangkan
Terima kasih untuk ikut membantu mengembangkan aplikasi web ini. Semoga menjadi lebih lengkap fasilitas nya untuk mempermudah melakukan bantuan pasca bencana, baik oleh para relawan maupun publik memantau situasi.

Untuk mempermudah komunikasi antar pengembang SIKOBE, maka silahkan bergabung di [SiKoBe Slack](http://slack.sikobe.com/).

## Lisensi

Aplikasi ini kami persembahkan sebagai open-source software dengan lisensi [MIT license](http://opensource.org/licenses/MIT).
