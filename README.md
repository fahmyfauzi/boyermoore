# Rancang Bangun Aplikasi Pencarian Kerja Berbasis Web Menggunakan Algoritma Boyer-Moore
Melanjutkan proyek Kerja Praktik untuk penelitian Perbandingan algoritma brute force dengan algoritma boyer-moore pada aplikasi pencarian kerja berbasis web. 

jurnal : [Perbandingan Algoritma Brute Force Dengan Algoritma Boyer-Moore Pada Aplikasi Pencarian Kerja Berbasis Web](https://ejurnal.dipanegara.ac.id/index.php/jusiti/article/view/1283)

## features
- Pencarian berdasarkan title dan menghitung proses pencarian menggunakan algorimta boyer-moore


## requirements
- php 8.0.2
- database mysql
- laravel 10.0
- laragon
- chrome
- composer

## installation

1. Clone repositori
    ```sh
    git https://github.com/fahmyfauzi/boyermoore.git
    ```
2. masuk ke dalam directori
    ```sh
    cd boyermoore
    ```
3. Instal composer
    ```sh
    composer install
    or
    composer update
    ```
4. Copy file .env.example 
    ```
    cp .env.example .env
    ```
4. Generate an app encryption key

    ```sh
    php artisan key:generate
    ```
5. Create database on your computer or phpMyAdmin and import data from ``` database/laravel_didamelid.sql ```
6. In the .env file, add database information to allow Laravel to connect to the database
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_didamelid
    DB_USERNAME=DB_USERNAME
    DB_PASSWORD=DB_PASSWORD
    ```
    
6. migrasi database
    ```
    php artisan migrate --seed
    ```
7. install package
    ```
    npm install
    npm run build
    ```
    
8. jalankan project
    ```sh
   php artisan serve
    ```


## usage
- buka chrome masukan link ```boyermoore.test``` atau ``` http://127.0.0.1:8000/ ```
- akses ```laravel_didamelid.test/job``` untuk melakukan pencarian 


## credits

[Fahmy Fauzi ](https://github.com/fahmyfauzi)

## screanshot

1. Hasil Pencarian menggunakan Boyer-Moore
    ![Untitled video - Made with Clipchamp (7)](https://github.com/fahmyfauzi/boyermoore/assets/58255031/3d92ce2d-4065-4571-8d02-ae24df8e1cb5)


    
2. Hasil Pencarian menggunakan Brute Force
    ![Untitled video - Made with Clipchamp (9)](https://github.com/fahmyfauzi/boyermoore/assets/58255031/b706a8f1-4017-45d7-be19-4d96f985448d)


   
