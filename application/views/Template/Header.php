<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto">
            <marquee>RSUD Kota Banjar</marquee>
        </h1>

        <nav class="nav-menu d-none d-lg-block mr-auto">
            <ul id="myList">
                <!-- <li><a href="cariregonline"><i class="fas fa-search"></i> Cariiiii</a></li> -->
                <!-- di set di javasvript karena apabila klik daftar maka akan muncul menu yg beda-->

                <!-- // var_dump($name);
                // if ($name == null) {
                //     echo '<li class="active"><a href="Home">Home</a></li>';
                // } else if ($name == 1) {
                //     echo '<li><a href="#tentangkita">Tentang Kita</a></li>';
                // } else {
                //     echo '<li><a href="#tentangkita">Tentang Kita</a></li>';
                // } -->



                <!-- <li class="active"><a href="Home">Home</a></li>
                <li><a href="#tentangkita">Tentang Kita</a></li>
                <li><a href="#alur">Alur</a></li>
                <li><a href="#dokter">Dokter</a></li>
                <li><a href="#contact">Kontak</a></li>
                <li><a href="#lokasi">Lokasi</a></li> -->
                <?php if ($data == '1') { ?>
                    <!-- home -->
                    <li class="active"><a href="Home"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#tentangkita"><i class="fas fa-tasks"></i> Syarat dan Ketentuan</a></li>
                    <li><a href="#alur"><i class="fas fa-walking"></i> Alur </a></li>
                    <li><a href="#liveantrian"><i class="fas fa-users"></i> Live Antrian Poli</a></li>
                    <li><a href="#jadwaldokter"><i class="fas fa-calendar-alt"></i> Jadwal Poliklinik </a></li>
                    <li><a href="#contact"><i class="far fa-address-book"></i> Kontak</a></li>

                <?php } elseif ($data == '2') { ?>
                    <!-- daftar -->
                    <li><a href="Home"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="cariregonline"><i class="fas fa-search"></i> Cari</a></li>
                    <li class="active"><a href="regonline"><i class="fas fa-clipboard-list"></i> Daftar</a></li>

                <?php } else { ?>
                    <!-- cari -->
                    <li><a href="Home"><i class="fas fa-home"></i> Home</a></li>
                    <li class="active"><a href="cariregonline"><i class="fas fa-search"></i> Cari</a></li>
                    <li><a href="regonline"><i class="fas fa-clipboard-list"></i> Daftar</a></li>
                <?php } ?>


            </ul>
        </nav>

        <!-- .nav-menu -->

        <a href="<?= base_url('regonline'); ?>" class="appointment-btn scrollto" id="daftar">Daftar / Cari Pasien</a>

    </div>
</header><!-- End Header -->