<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?= base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .antrian {
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            max-width: 150%;
            max-height: 150%;
            background-color: #ffffff;
            border: 2px solid rgb(0, 0, 0);
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container">
        <div>
            <img src="<?= base_url() ?>assets/img/logo rsu.png" alt="logo rumah sakit" style="padding-top: 60px; padding-bottom: 0px; line-height: 0px;">
        </div>
        <!-- tutup logo rumah sakit -->

        <div>
            <div>
                <p style="font-size: 35px; font-weight: bold; margin-bottom: 0px;">Rumah Sakit Umum Daerah Kota Banjar</p>
            </div>
            <div>
                <p style="margin-bottom: 0px;">
                    Jl. Rumah Sakit Umum No.5, Hegarsari, Kec. Pataruman, Kota Banjar, Jawa Barat 40293
                </p>
            </div>
        </div>
        <!-- tutup alamat rumah sakit -->

        <div>
            <div>
                <p style="margin-bottom: 0px;">Nomor Antrian Anda</p>
            </div>
            <div>
                <p style="font-weight: bold; font-size: 75px; line-height: 80px; margin-bottom: 0px;"><?= $cetak['nomorantrean'] ?></p>
            </div>
        </div>
        <!-- tutup nomer antrian -->

        <tr>
            <th>No. Pendaftaran :</th>
            <td><?= $cetak['nopendaftaran'] ?></td>
        </tr>
        <!-- tutup tr no pendaftaran -->

        <br>
        <br style="line-height: 5px;">
        <tr>
            <th>Poli Tujuan :</th>
            <td><?= $cetak['namapoli'] ?></td>
        </tr>
        <!-- tutup tr poli tujuan  -->

        <br>
        <br style="line-height: 5px;">

        <tr>
            <th>Dokter Tujuan :</th>
            <td><?= $cetak['namadokter'] ?></td>
        </tr>
        <!-- tutup tr dokter tujuan  -->

        <br>
        <br style="line-height: 5px;">

        <tr>
            <th>Estimasi Dilayani :</th>
            <td><?= $cetak['estimasidilayani'] ?></td>
        </tr>
        <!-- tutup tr estimasi dilayani  -->

        <br>
        <br style="line-height: 5px;">

        <tr>
            <th>No. Rekam Medik :</th>
            <td><?= $cetak['nocm'] ?></td>
        </tr>
        <!-- tutup tr rekam medik  -->

        <br>
        <br style="line-height: 5px;">

        <tr>
            <th>Status Pasien :</th>
            <td><?= $cetak['statuspasien'] ?></td>
        </tr>
        <!-- tutup tr statuspasien -->

        <br>
        <br style="line-height: 25px;">


        <div>
            <img src="<?= base_url() . 'assets/img/qrcode/' . $cetak['kodebooking'] . '.png' ?>" alt="logo qrcode" style="padding-bottom: 0px; line-height: 0px;">
        </div>
        <!-- tutup div gambar barcode -->

        <div>
            <p style="font-size: 23px; font-weight: bold; margin-bottom: 0px; line-height: 0px;"><?= $cetak['kodebooking'] . date('dmY', strtotime($cetak['estimasidilayani'])) ?></p>
        </div>
        <!-- tutup kode booking -->

        <br>

        <div style="line-height: 5px;">
            <p>Mohon datang <b>30 menit</b> sebelumnya </p>
            <p>Jika terlambat antrian tidak berlaku lagi</p>
            <p style="font-weight: bold;">!!! Bawalah tanda bukti ini untuk verifikasi di pendaftaran !!! </p>
        </div>
        <!-- tutup keterangan -->

    </div>
    <!-- tutup container -->

</body>

</html>