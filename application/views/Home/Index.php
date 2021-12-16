<!-- Bagian ini tag head digunakan untuk penampung tag 
<title>, <style>, <meta>, <link>, <script>, and <base>. -->
<?php $this->load->view('Template/Head'); ?>

<!-- Bagian paling atas diweb ini  -->
<?php $this->load->view('Template/Topbar'); ?>

<!-- Menu navigasi dibuat disini -->
<?php $this->load->view('Template/Header', array('data' => '1')); ?>


<style>
    .gariscontainer {
        width: 80%;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
    }

    table {
        table-layout: auto;
        border-collapse: collapse;
        /* width: max-content; */

    }

    /* table td {
        overflow-wrap: break-word;
    } */
</style>



<!-- ======= selamatdatang Section ======= -->
<!-- <section id="selamatdatang" class="d-flex align-items-center">
    <div class="container">
        <h1>Selamat Datang</h1>
        <h2>Di Pendaftaran Pasien Rawat Jalan</h2>
        <a href="#alur" class="btn-get-started scrollto">Cek Alur</a>
    </div>
</section> -->
<!-- End selamatdatang -->

<main id="main">
    <!-- ======= Doctors Section ======= -->
    <section class="slidedokter " id="dokter">
        <div class="container mt-5">

            <!-- <div class="doktertitle">
            <h2>Dokter Spesialis</h2>
            <p>Berikut adalah list dokter spesialis :</p>
        </div> -->
            <div class="slidercuy">
                <div>
                    <a href="">
                        <img src="assets/img/slide 1.png" alt="slide 1">
                    </a>
                </div>
                <div>
                    <a href="">
                        <img src="assets/img/slide 2.png" alt="slide 2">
                    </a>
                </div>
                <div>
                    <a href="">
                        <img src="assets/img/slide 3.png" alt="slide 3">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= tentangkita Us Section ======= -->
    <div id="tentangkita" class="tentangkita">
        <div class="container align-center">

            <div class="row justify-content-center">
                <!-- <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Kenapa RSUD Kota Banjar?</h3>
                            <p>
                                Under Construction
                            </p>
                            <div class="text-center">
                                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div> -->
                <!-- <div class="col-lg-12 d-flex align-items-stretch"> -->

                <div class="icon-boxes d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-xl-12 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <!-- <i class="bx bx-cube-alt"></i> -->
                                <div style="text-align: center;" class="syaratketentuan">
                                    <h2>Syarat & Ketentuan</h2>
                                </div>
                                <div style="font-size: 16px;">
                                    <b>PENDAFTARAN ONLINE :</b><br><br>

                                    1. Pendaftaran Online minimal 1 (satu) hari sebelum kunjungan dan maksimal 7 hari.<br>
                                    2. Jadwal Praktek Dokter sewaktu-waktu dapat berubah.<br>
                                    3. Untuk melakukan pembatalan pendaftaran online dapat melakukan di lakukan di bagian Cari Pasien lalu masukan kode boking/kode pendaftaran/nik/no.rm pasien.<br>
                                    4. Maksimal pembatalan H-1 dari tanggal periksa.<br>
                                    5. No.antrian Periksa dokter adalah sesuai dengan no.antrian yang didapatkan saat melakukan pendaftaran online.<br>
                                    6. Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu (Minimal 10 menit s.d 30 menit sesuai dengan estimasi yang telah di tentukan pada bukti pendaftaran).<br>

                                    <br><br><b>PASIEN LAMA :</b><br>
                                    Nomor Rekam Medis, Tanggal Lahir Dan NIK merupakan data validasi pada sistem, apabila GAGAL, segera menghubungi petugas Pendaftaran untuk melalukan pemutakhiran data yang terdapat di Rumah Sakit.

                                    <br><br><b>PRASYARAT SAAT DATANG KE RUMAH SAKIT:</b><br>
                                    1. Bukti Pendaftaran Online <br>
                                    2. KTP Asli + Fotocopy<br>
                                    3. Kartu Keluarga Asli + Fotocopy<br>
                                    4. Jika anda peserta BPJS/KIS siapkan kartu yang asli + fotocopy<br>
                                    5. Kartu berobat bila sudah pernah berobat ke RSU Kota Banjar<br>
                                    6. Surat rujukan Faskes atau pengantar atau keterangan kontrol asli + fotocopy

                                </div>
                            </div>
                        </div>


                        <!-- <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Misi</h4>
                                    <ol style="text-align: left;">
                                        <li>
                                            Menyelenggarakan Pelayanan Prima
                                        </li>
                                        <li>
                                            Mengupayakan Terpenuhinya Sarana Prasarana sesuai Standar
                                        </li>
                                        <li>
                                            Meningkatkan Kualitas dan Kuantitas SDM
                                        </li>
                                        <li>
                                            Meningkatkan Kesejahteraan karyawan
                                        </li>
                                    </ol>
                                </div>
                            </div> -->
                        <!-- <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Motto</h4>
                                    <p>Pelayanan yang Baik untuk Semua</p>
                                </div>
                            </div> -->
                    </div>
                </div><!-- End .content-->
                <!-- </div> -->
            </div>

        </div>
    </div><!-- End tentangkita Section -->


    <!-- ======= About Section ======= -->
    <!-- <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch">
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
                        <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-fingerprint"></i></div>
                            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-gift"></i></div>
                            <h4 class="title"><a href="">Nemo Enim</a></h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Dine Pad</a></h4>
                            <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
                        </div>

                    </div>
                </div>

            </div>
        </section> -->
    <!-- End About Section -->

    <!-- ======= Departments/alur Section ======= -->
    <div id="alur" class="alur">
        <div class="container align-center mt-5">
            <div style="text-align: center;" class="alurtitle">
                <h2>Alur</h2>
            </div>

            <div class="row mt-5 icon-boxes">
                <div class="col-lg-7 col-sm-7">
                    <img class="img-responsive img-thumbnail" src="<?= base_url('assets/'); ?>img/alur.png" alt="">
                </div>
                <div class="col-lg-5 col-sm-6">
                    <!-- <h2 class="section-heading">Alur Pendaftaran Online</h2>
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div> -->
                    <p class="lead text-justify">Proses pendaftaran pemeriksaan rawat jalan melalui pendaftaran online sebagai berikut.</p>
                    <ol class="text-justify">
                        <li>Pendaftar menyiapkan berkas-berkas yang dibutuhkan sesuai dengan carabayar yang akan digunakan.</a></li>
                        <li>Pendaftar mengisi form pendaftaran online <a href="regonline">disini</a> sesuai dengan data yang sebenarnya. Jika pendaftaran berhasil maka pendaftar akan mendapatkan bukti pendaftaran online.</li>
                        <li>Pendaftar datang ke RSUD Kota Banjar dengan membawa berkas sesuai persyaratan dan menunjukan bukti pendaftaran online. Petugas pendaftaran akan memproses pedaftaran.</li>
                        <li>Pendaftar menuju klinik dan menunggu pemeriksaan dilakukan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section id="liveantrian" class="contact">
        <div class="container">
            <div class="lokasititle">
                <!-- <h2>Lokasi RSUD Kota Banjar</h2> -->
                <h2>Live Antrian Poliklinik</h2>

                <div class="alert alert-warning text-center">
                    <b>Data Tanggal : <span id="dt-wkturespon">15-10-2021 09:55:10</span></b>
                    <br>
                    <br>
                    <progress value="10" max="10" id="pageBeginCountdown"></progress>
                    <br>
                    <h10>Diperbaharui Dalam Waktu <span id="pageBeginCountdownText" style="color: red;">10 </span> detik.</h10>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="w-full p-3 mb-4 font-medium">
                        <div class="w-full flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-md ">
                            <div class="block rounded-t overflow-hidden text-center">
                                <div class="bg-red-500 text-white py-1 uppercase">
                                    TOTAL SELURUH ANTRIAN
                                </div>
                                <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                                    <span class="text-sm">
                                        Antrian Sudah Dilayani
                                    </span>
                                </div>
                                <div class="pt-1 border-l border-r border-white bg-white">
                                    <span class="text-6xl font-bold leading-tight" id="sudahdilayani">
                                        -
                                    </span>
                                </div>
                                <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                                    <span class="text-xs leading-normal" id="jumlahantrian">
                                        Jumlah Antrian : -
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center" id="noantrianlive">
                <!-- <div class="col-md-6 col-lg-3">
                    <div class="w-full p-3 mb-4 font-medium">
                        <div class="w-full flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-md ">
                            <div class="block rounded-t overflow-hidden text-center">
                                <div class="bg-red-500 text-white py-1 uppercase">
                                    <span id="NamaPoli">Mata</span>
                                </div>
                                <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                                    <span class="text-sm">
                                        Nomor Urut
                                    </span>
                                </div>
                                <div class="pt-1 border-l border-r border-white bg-white">
                                    <span class="text-6xl font-bold leading-tight" id="NoUrut">
                                        016
                                    </span>
                                </div>
                                <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                                    <span class="text-xs leading-normal" id="TotalAntrian">
                                        Total Antrian : 181
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-md-6 col-lg-3">
                    <div class="w-full p-3 mb-4 font-medium">
                        <div class="w-full flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-md ">
                            <div class="block rounded-t overflow-hidden text-center">
                                <div class="bg-red-500 text-white py-1 uppercase">
                                    Mata
                                </div>
                                <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1"><span class="text-sm">
                                        Nomor Urut
                                    </span></div>
                                <div class="pt-1 border-l border-r border-white bg-white"><span class="text-6xl font-bold leading-tight">
                                        016
                                    </span></div>
                                <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white"><span class="text-xs leading-normal">
                                        Total Antrian : 181
                                    </span></div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-md-6 col-lg-3">
                    <div class="w-full p-3 mb-4 font-medium">
                        <div class="w-full flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-md ">
                            <div class="block rounded-t overflow-hidden text-center">
                                <div class="bg-red-500 text-white py-1 uppercase">
                                    Mata
                                </div>
                                <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1"><span class="text-sm">
                                        Nomor Urut
                                    </span></div>
                                <div class="pt-1 border-l border-r border-white bg-white"><span class="text-6xl font-bold leading-tight">
                                        016
                                    </span></div>
                                <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white"><span class="text-xs leading-normal">
                                        Total Antrian : 181
                                    </span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="w-full p-3 mb-4 font-medium">
                        <div class="w-full flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-md ">
                            <div class="block rounded-t overflow-hidden text-center">
                                <div class="bg-red-500 text-white py-1 uppercase">
                                    Mata
                                </div>
                                <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1"><span class="text-sm">
                                        Nomor Urut
                                    </span></div>
                                <div class="pt-1 border-l border-r border-white bg-white"><span class="text-6xl font-bold leading-tight">
                                        016
                                    </span></div>
                                <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white"><span class="text-xs leading-normal">
                                        Total Antrian : 181
                                    </span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="w-full p-3 mb-4 font-medium">
                        <div class="w-full flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-md ">
                            <div class="block rounded-t overflow-hidden text-center">
                                <div class="bg-red-500 text-white py-1 uppercase">
                                    Mata
                                </div>
                                <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1"><span class="text-sm">
                                        Nomor Urut
                                    </span></div>
                                <div class="pt-1 border-l border-r border-white bg-white"><span class="text-6xl font-bold leading-tight">
                                        016
                                    </span></div>
                                <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white"><span class="text-xs leading-normal">
                                        Total Antrian : 18111
                                    </span></div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- <div class="lokasititle"> -->
            <!-- <h12 id="realtime">* Data akan diperbarui otomatis dalam 00 detik</h12> -->
            <!-- <progress value="10" max="10" id="pageBeginCountdown"></progress>
                <p> Begining in <span id="pageBeginCountdownText">10 </span> seconds</p>
            </div> -->
        </div>


        <!-- <div>
            <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=RSU%20KOTA%20BANJAR&t=m&z=10&output=embed&iwloc=near" frameborder="0" allowfullscreen></iframe>
        </div> -->
        <!-- End Counts Section -->
    </section><!-- End Contact Section -->




    <!-- ======= Doctors Section ======= -->
    <section class="slidedokter" id="jadwaldokter">
        <div class="container">
            <div class="doktertitle">
                <h2>Jadwal Poliklinik</h2>
            </div>
            <div class="gariscontainer center">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Tanggal</label>
                        <input type="text" placeholder="Tanggal Periksa" value="<?= date('d-m-Y') ?>" class="form-control" name="tglperiksa" id="tglperiksa" onchange="GetJadwalPoliklinik()">

                    </div>
                    <div class="col-lg-6">
                        <label for="">Poliklinik</label>
                        <input type="text" placeholder="Poliklinik" class="form-control" onchange="GetJadwalPoliklinik()" name="parameter" id="parameter">

                    </div>
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">No</th>
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Dokter</th>
                            </tr>
                        </thead>
                        <tbody id="jadwalpoliklinik">
                            <!-- <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </section>
    <!-- End Doctors Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="owl-carousel testimonials-carousel">

                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
    <!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <!-- <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title">
                    <h2>Gallery</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row no-gutters">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-1.jpg" class="venobox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-2.jpg" class="venobox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-4.jpg" class="venobox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-8.jpg" class="venobox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>End Gallery Section -->

    <!-- ======= Contact Section ======= -->

    <!-- <section id="services" class="contact">
        <div class="container">

            <div class="kontaktitle">
                <h2>Kontak</h2>
            </div>
        </div>
        </div>

        <section id="counts" class="counts">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-3 mt-5">
                        <div class="count-box">
                            <i class="icofont-ui-dial-phone"></i>
                            <a href="tel:0265741032">
                                <span>0265-741032</span>
                            </a>
                            <p>Telpon</p>
                        </div>

                    </div>

                    <div class="col-md-auto mt-5">
                        <div class="count-box">
                            <i class="icofont-envelope"></i>
                            <a href="mailto:contact@example.com">
                                <span>rsu_kotabanjar@yahoo.co.id</span>
                            </a>
                            <p>Email</p>
                        </div>

                    </div>

                    <div class="col col-lg-3 mt-5">

                        <div class="count-box">
                            <i class="icofont-ui-dial-phone"></i>
                            <a href="tel:0265741032">
                                <span>0265-7482204</span>
                            </a>
                            <p>Ponek 24 Jam</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col col-lg-2 mt-5">
                        <div class="count-box">
                            <i class="icofont-whatsapp"></i>
                            <a href="https://api.whatsapp.com/send?phone=628112111146" target="_blank">
                                <span>08112111146</span>
                            </a>
                            <p>Whatsapp</p>
                        </div>

                    </div>

                    <div class="col col-lg-2 mt-5">

                        <div class="count-box">
                            <i class="icofont-fax"></i>
                            <a href="tel:02657482204 ">
                                <span>0265744730</span>
                            </a>
                            <p>Fax</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section> -->


    <!-- <section class="relative">
        <div class="container">
            <div class="kontaktitle">
                <h2>Kontak Versi Baru</h2>
            </div>
        </div>
        <div class="w-full row text-center py-20">
            <div class="col-lg-4 bg-white px-4 py-6 shadow-lg rounded-lg">
                <svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto">
                    <path d="m256 60c-57.897 0-105 47.103-105 105 0 35.943 18.126 69.015 48.487 88.467 31.003 19.863 69.06 21.974 104.43 5.703 7.525-3.462 10.82-12.37 7.357-19.896-3.462-7.525-12.369-10.82-19.896-7.358-25.86 11.898-53.454 10.545-75.703-3.709-21.71-13.909-34.671-37.538-34.671-63.207 0-41.355 33.645-75 75-75s75 33.645 75 75c0 8.271-6.729 15-15 15-7.558 0-14.618-5.732-14.998-14.772-1e-3 -0.076-2e-3 -0.152-2e-3 -0.228 0-24.813-20.187-45-45-45s-45 20.187-45 45 20.187 45 45 45c11.516 0 22.031-4.353 29.999-11.494 7.967 7.142 18.484 11.494 30.001 11.494 24.813 0 45-20.187 45-45 0-57.897-47.103-105-105-105zm14.789 107.41c-1.158 7.129-7.339 12.594-14.789 12.594-8.271 0-15-6.729-15-15s6.729-15 15-15c7.691 0 14.04 5.82 14.895 13.285-0.224 1.363-0.261 2.75-0.106 4.121z"></path>
                    <path d="m481 196.98c-4e-3 -3.879-1.566-7.756-4.393-10.583l-55.606-55.606v-115.79c0-8.284-6.716-15-15-15h-300c-8.284 0-15 6.716-15 15v115.79l-55.606 55.606c-0.052 0.052-0.096 0.11-0.147 0.163-2.811 2.896-4.24 6.709-4.246 10.42 0 0.01-1e-3 0.019-1e-3 0.029v270c0 24.845 20.216 45 45 45h360c24.839 0 45-20.207 45-45v-270c0-0.01-1e-3 -0.019-1e-3 -0.029zm-59.999-23.763 23.787 23.787-23.787 23.787v-47.574zm-300-36.208v-0.01-107h270v107 0.01 113.78l-81.213 81.213h-107.57l-81.213-81.213v-113.78zm-30 36.208v47.574l-23.787-23.787 23.787-23.787zm-30 287.57v-227.57l113.79 113.79-113.79 113.79zm21.214 21.213 120-120h107.57l120 120h-347.57zm368.79-21.213-113.79-113.79 113.79-113.79v227.57z"></path>
                </svg>
            </div>
            <div class="col-lg-4 bg-white px-4 py-6 shadow-lg rounded-lg">
                <svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto">
                    <path d="m256 60c-57.897 0-105 47.103-105 105 0 35.943 18.126 69.015 48.487 88.467 31.003 19.863 69.06 21.974 104.43 5.703 7.525-3.462 10.82-12.37 7.357-19.896-3.462-7.525-12.369-10.82-19.896-7.358-25.86 11.898-53.454 10.545-75.703-3.709-21.71-13.909-34.671-37.538-34.671-63.207 0-41.355 33.645-75 75-75s75 33.645 75 75c0 8.271-6.729 15-15 15-7.558 0-14.618-5.732-14.998-14.772-1e-3 -0.076-2e-3 -0.152-2e-3 -0.228 0-24.813-20.187-45-45-45s-45 20.187-45 45 20.187 45 45 45c11.516 0 22.031-4.353 29.999-11.494 7.967 7.142 18.484 11.494 30.001 11.494 24.813 0 45-20.187 45-45 0-57.897-47.103-105-105-105zm14.789 107.41c-1.158 7.129-7.339 12.594-14.789 12.594-8.271 0-15-6.729-15-15s6.729-15 15-15c7.691 0 14.04 5.82 14.895 13.285-0.224 1.363-0.261 2.75-0.106 4.121z"></path>
                    <path d="m481 196.98c-4e-3 -3.879-1.566-7.756-4.393-10.583l-55.606-55.606v-115.79c0-8.284-6.716-15-15-15h-300c-8.284 0-15 6.716-15 15v115.79l-55.606 55.606c-0.052 0.052-0.096 0.11-0.147 0.163-2.811 2.896-4.24 6.709-4.246 10.42 0 0.01-1e-3 0.019-1e-3 0.029v270c0 24.845 20.216 45 45 45h360c24.839 0 45-20.207 45-45v-270c0-0.01-1e-3 -0.019-1e-3 -0.029zm-59.999-23.763 23.787 23.787-23.787 23.787v-47.574zm-300-36.208v-0.01-107h270v107 0.01 113.78l-81.213 81.213h-107.57l-81.213-81.213v-113.78zm-30 36.208v47.574l-23.787-23.787 23.787-23.787zm-30 287.57v-227.57l113.79 113.79-113.79 113.79zm21.214 21.213 120-120h107.57l120 120h-347.57zm368.79-21.213-113.79-113.79 113.79-113.79v227.57z"></path>
                </svg>
            </div>
            <div class="col-lg-4 bg-white px-4 py-6 shadow-lg rounded-lg">
                <svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto">
                    <path d="m256 60c-57.897 0-105 47.103-105 105 0 35.943 18.126 69.015 48.487 88.467 31.003 19.863 69.06 21.974 104.43 5.703 7.525-3.462 10.82-12.37 7.357-19.896-3.462-7.525-12.369-10.82-19.896-7.358-25.86 11.898-53.454 10.545-75.703-3.709-21.71-13.909-34.671-37.538-34.671-63.207 0-41.355 33.645-75 75-75s75 33.645 75 75c0 8.271-6.729 15-15 15-7.558 0-14.618-5.732-14.998-14.772-1e-3 -0.076-2e-3 -0.152-2e-3 -0.228 0-24.813-20.187-45-45-45s-45 20.187-45 45 20.187 45 45 45c11.516 0 22.031-4.353 29.999-11.494 7.967 7.142 18.484 11.494 30.001 11.494 24.813 0 45-20.187 45-45 0-57.897-47.103-105-105-105zm14.789 107.41c-1.158 7.129-7.339 12.594-14.789 12.594-8.271 0-15-6.729-15-15s6.729-15 15-15c7.691 0 14.04 5.82 14.895 13.285-0.224 1.363-0.261 2.75-0.106 4.121z"></path>
                    <path d="m481 196.98c-4e-3 -3.879-1.566-7.756-4.393-10.583l-55.606-55.606v-115.79c0-8.284-6.716-15-15-15h-300c-8.284 0-15 6.716-15 15v115.79l-55.606 55.606c-0.052 0.052-0.096 0.11-0.147 0.163-2.811 2.896-4.24 6.709-4.246 10.42 0 0.01-1e-3 0.019-1e-3 0.029v270c0 24.845 20.216 45 45 45h360c24.839 0 45-20.207 45-45v-270c0-0.01-1e-3 -0.019-1e-3 -0.029zm-59.999-23.763 23.787 23.787-23.787 23.787v-47.574zm-300-36.208v-0.01-107h270v107 0.01 113.78l-81.213 81.213h-107.57l-81.213-81.213v-113.78zm-30 36.208v47.574l-23.787-23.787 23.787-23.787zm-30 287.57v-227.57l113.79 113.79-113.79 113.79zm21.214 21.213 120-120h107.57l120 120h-347.57zm368.79-21.213-113.79-113.79 113.79-113.79v227.57z"></path>
                </svg>
            </div>
        </div>

    </section> -->

    <!-- ======= Kontak Section ======= -->
    <section id="contact" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Kontak</h2>
            </div>
            <!-- Div Buka row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="icofont-email"></i></div>
                        <h4><span>Email Kami</span></h4>
                        <a href="mailto:contact@example.com">
                            <span>rsu_kotabanjar@yahoo.co.id</span>
                            <br>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="icofont-ui-dial-phone"></i></div>
                        <h4><span>Telpon</span></h4>
                        <a href="tel:0265741032">
                            <span>0265-741032</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="icofont-dna-alt-2"></i></div>
                        <h4><span>Ponek 24 Jam</span></h4>
                        <a href="tel:0265741032">
                            <span>0265-7482204</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="icofont-whatsapp"></i></div>
                        <h4><span>WhatsApp (Only Chat)</span></h4>
                        <a href="https://api.whatsapp.com/send?phone=628112111146" target="_blank">
                            <span>08112111146</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="icofont-fax"></i></div>
                        <h4><span>Fax</span></h4>
                        <a href="tel:02657482204 ">
                            <span>0265744730</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Div tutup row  -->
        </div>
    </section><!-- End Kontak Section -->





</main><!-- End #main -->

<!-- copyright dari web -->
<?php $this->load->view('Template/Footer'); ?>