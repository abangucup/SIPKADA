# Backup Project Tugas Akhir

_Judul:_ **SISTEM INFORMASI PENDUKUNG KEPUTUSAN PEMBERIAN BANTUAN DI DINAS DAERAH**

> Backup Program untuk TA :rocket:

\*link for this repo : [github abangucup](https://github.com/abangucup/SIPKADA)\*

> Seperti judul,
> Project dibuat untuk membantu dinas daerah dalam menentukan penerima bantuan yang harus di prioritaskan terlebih dahulu. sistem dibuat mengguankan framework laravel 9

## Table of Contents

-   [Features](#features)
-   [Screenshots](#screenshots)
    -   [Admin Kantor](#user-page)
    -   [Admin Kelurahan](#admin-page)

## Features

-   [x] Framework Laravel
-   [x] Framework Bootstrap
-   [x] DSS Method (SMART)
-   [x] CRUD Menggunakan Templeting Blade
-   [x] Survey Modal
-   [x] DataTable
-   [x] Responsive Layout for User\*
-   [x] Ajax Pagination
-   [x] Admin Memanagemet User Setiap Kelurahan
-   [x] SweetAlert for pop-up info & status
-   [x] Username checker using Middleware Logic
-   [x] Chart
-   [x] Searched data log
-   [x] Sorting data (part of pagination)
-   [x] DSS Method Implementation di controller\*

_Cukup Sekian_ :+1:

<!-- ## Screenshots

### User Page
#### Homepage
![beranda](https://i.imgur.com/nTo2Ia3.png)
Halaman Beranda

#### Login Page
![login](https://i.imgur.com/wNIZwF6.png)
Halaman Login

#### Registration Page
![regist](https://i.imgur.com/03euZ9Y.png)
Halaman Mendaftar

#### Forgot Password Page
![forgot](https://i.imgur.com/V1oONBs.png)
Halaman Lupa Password

#### List Smartphone Page
![list](https://i.imgur.com/coYxqJX.png)
Halaman Daftar Smartphone

#### Option Page
![option](https://i.imgur.com/0nQ2SXV.png)
Halaman Opsi

#### Searching Page
![search](https://i.imgur.com/53iu0ub.png)
Halaman Pencarian

#### Question Page
![question](https://i.imgur.com/tssI4E9.png)
Halaman Pertanyaan

#### Result Page (1)
![result1](https://i.imgur.com/5BpTfud.png)
Halaman Hasil

#### Result Page (2)
![result2](https://i.imgur.com/DCxDWiz.png)
Halaman Hasil - lanjutan

#### Help Page
![help](https://i.imgur.com/8wGg8Cp.png)
Halaman Bantuan

#### Search Log Page
![history](https://i.imgur.com/s5ESxYC.png)
Halaman Riwayat

### Admin Page
#### Dashboard Page
![dashboard](https://i.imgur.com/jiTE3at.png)
Halaman Dashboard

#### Smartphone Data Page
![smartphone](https://i.imgur.com/fC731XB.png)
Halaman Data Smartphone

#### Criteria Data Page
![criteria](https://i.imgur.com/EhQvIw5.png)
Halaman Data Kriteria

#### Question Data Page
![question](https://i.imgur.com/0zviOxg.png)
Halaman Data Pertanyaan

#### Counted Data Page
![log](https://i.imgur.com/ZCAwdTk.png)
Halaman Data Perhitungan

#### User Data Management Page
![user](https://i.imgur.com/Xk8xQ9J.png)
Halaman Data Manajemen User

#### Configuration Page
![config](https://i.imgur.com/U6Lsn5K.png)
Halaman Konfigurasi -->

        /*
        Define Table {
            table penerimas => {
                nama, nik
            }

            table surveys => {
                status, penerima_id, subkriteria_id
            }

            table subkriteria => {
                namasub, kriteria_id, bobot
            }

            table kriteria => {
                namakriteria, bobot
            }
        }

        Define Data {
            penerimas => {
                nama => sincan
                nik => 123
            }

            surveys => {
                [
                    id => 1
                    status => selesai
                    subkriteria_id => 1
                    penerima_id => 1
                ],
                [
                    id => 2
                    status => selesai
                    subkriteria_id => 2
                    penerima_id => 1
                ]
            }

            subkriteria => {
               [
                id => 1
                namasub => sub kriteria 1 dari kriteria 1
                bobot => 80
                kriteria_id => 1
               ],
               [
                id => 2
                namasub => sub kriteria 2 dari kriteria 1
                bobot => 50
                kriteria_id => 1
               ],
               [
                id => 3
                namasub => sub kriteria 1 dari kriteria 2
                bobot => 100
                kriteria_id => 2
               ],
               [
                id => 4
                namasub => sub kriteria 2 dari kriteria 2
                bobot => 80
                kriteria_id => 2
               ],

            }

            kriteria => {
                [
                    id => 1
                    nama => kriteria 1
                    bobot => 100
                ],
                [
                    id => 2
                    nama => kriteria 2
                    bobot => 70
                ],
            }

            Bagaimana
        }

        */

<!-- RUMUS BACKUP  -->

        // Mencari Nilai Terkecil Dan Terbesai
        // filter data hanya menampilkan subbobot dan sub dari table sub kriteria dan kode dari kriteria
        // $filter = DB::table('kriterias')
        //     ->join('subkriterias', 'kriterias.id', '=', 'subkriterias.kriteria_id')
        //     ->join('surveys', 'surveys.subkriteria_id', '=', 'subkriterias.id')
        //     ->get(['subbobot', 'sub', 'kode']);
        // // Membuat Variabel Data Sesusai Kode Kriteria
        // $data = $filter->groupBy('kode');
        // Batas

        // Mencari Normalisasi
        // $bobot = Kriteria::all()->map(function ($item) {
        //     // variable jumlah bobot kriteria
        //     $sum = Kriteria::sum('bobot');
        //     return ([
        //         /*
        //         RUMUS:
        //         N = W/M
        //         W => bobot stiap kriteria
        //         M => jumlah bobot dari smua kriteria
        //         */
        //         'normalisasi' => $item->bobot / $sum,
        //         // Get Data Kriteria
        //         'kriteria' => $item->kriteria,
        //         'bobot' => $item->bobot,
        //         'kode' => $item->kode,
        //         'keterangan' => $item->keterangan,
        //         'jenis' => $item->jenis,
        //         'total' => $item->sum('bobot'),
        //     ]);
        // });