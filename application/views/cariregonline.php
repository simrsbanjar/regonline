<!-- Bagian ini tag head digunakan untuk penampung tag 
<title>, <style>, <meta>, <link>, <script>, and <base>. -->
<?php $this->load->view('Template/Head'); ?>

<!-- Bagian paling atas diweb ini  -->
<?php $this->load->view('Template/Topbar'); ?>

<!-- Menu navigasi dibuat disini -->
<?php $this->load->view('Template/Header', array('data' => '3')); ?>

<div class="section-title">
    <h2>PENDAFTARAN ONLINE</h2>
</div>

<div class="container">
    <div class="row justify-content-md-center" style="margin-bottom: 80px;">
        <div class="col-lg-8 mt-3">
            <div class="card">
                <!-- penambahan breadcrumb -->
                <!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cari</li>
                    </ol>
                </nav> -->
                <div class="card-header bg-primary text-white">
                    Cari Data Pendaftaran
                </div>
                <div class="card-body card-block">
                    <input type="hidden" name="regonline" id="regonline" value="2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div class="form-group">
                                    <label class="label-control">Kode Booking / No. Pendaftaran</label>
                                    <input type="number" name="nopendaftaran" id="nopendaftaran" class="form-control" placeholder="Kode Bookinng / No. Pendaftaran">
                                    <small>Error Message</small>
                                </div> -->
                                <div class="form-group">
                                    <label class="label-control"><strong>Kriteria Pencarian</strong></label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col col-6 col-lg-4">
                                                <input class="form-check-input" type="radio" name="radiokriteria" value="0" id="radiokriteriakdbooking" checked onclick="checkRadioCari(value)">
                                                <label class="form-check-label" for="radiokriteria">
                                                    Kode Booking
                                                </label>
                                            </div>
                                            <div class="col col-6 col-lg-4">
                                                <input class="form-check-input" type="radio" name="radiokriteria" value="1" id="radiokriterianopendaftaran" onclick="checkRadioCari(value)">
                                                <label class="form-check-label" for="radiokriteria">
                                                    No. Pendaftaran
                                                </label>
                                            </div>
                                            <div class="col col-6 col-lg-4">
                                                <input class="form-check-input" type="radio" name="radiokriteria" value="2" id="radiokriterianopendaftaran" onclick="checkRadioCari(value)">
                                                <label class="form-check-label" for="radiokriteria">
                                                    NIK / No. Rekam Medik
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-12" id="classinputkodebooking">
                                <label class="form-check-label" for="radiokriteria" id="txtnoboking" hidden>Kode Booking</label>
                                <div class="form-group">
                                    <input type="number" name="nopendaftaran" id="nopendaftaran" class="form-control" placeholder="Kode Booking" onchange="updateInput(this.value,'nopendaftaran')">
                                    <small>Error Message</small>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6" id="tglperiksahead" hidden>
                                <label class="form-check-label" for="radiokriteria">Tgl. Periksa</label>
                                <div class="form-group">
                                    <input type="text" placeholder="DD/MM/YYYY" value="<?= date('d-m-Y') ?>" class="form-control" name="tglperiksacari" id="tglperiksacari">
                                    <small>Error Message</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <button id="btncari" type="button" onclick="caripasienbooking()" class="btn btn-sm btn-primary ml-auto p-2"><i class="nav-icon fas fa-search"></i> Cari</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <center>Hasil Pencarian </center>
                </div>

                <div class="row" style="padding-left: 10px;">
                    <!-- DOKUMENTASI -->
                    <!-- col-lg-4 tampilan ketika desktop -->
                    <!-- TAMPILAN MOBILE -->
                    <!-- col-7 tampilan extra small <576px -->
                    <!-- col-sm-6 tampilan small ≥576px <768px -->
                    <!-- col-md-5 tampilan medium 720px -->
                    <div class="col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>Kode Booking</dt>
                            <dd id="kodebooking">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>No Pendaftaran</dt>
                            <dd id="noreg">-</dd>
                        </dl>
                    </div>
                    <div class="col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>No. Rekam Medik</dt>
                            <dd id="norm">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>No. Antrian</dt>
                            <dd id="noantrian">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>Jenis Antrian</dt>
                            <dd id="jenisantrian">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>Estimasi Dilayani</dt>
                            <dd id="estimasidilayani">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>Poli Tujuan</dt>
                            <dd id="politujuan">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>Dokter Tujuan</dt>
                            <dd id="doktertujuan">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5">
                        <dl>
                            <dt>Status Pasien</dt>
                            <dd id="statuspasien">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5" hidden>
                        <dl>
                            <dt>Status Pasien</dt>
                            <dd id="email">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5" hidden>
                        <dl>
                            <dt>Status Pasien</dt>
                            <dd id="namapasien">-</dd>
                        </dl>
                    </div>
                    <div class=" col-lg-4 col-7 col-sm-6 col-md-5" hidden>
                        <dl>
                            <dt>Status Pasien</dt>
                            <dd id="tgllahirpasien">-</dd>
                        </dl>
                    </div>
                </div>

                <div class="d-flex justify-content-end card-footer">
                    <button id="btnhapus" type="button" onclick="HapusBooking()" class="btn btn-sm btn-danger mr-2" disabled value="1"><i class="fa fa-trash"></i> Batalkan Data Pendaftaran</button>
                    <button id="btncetak" type="button" onclick="CetakBooking()" class="btn btn-sm btn-danger mr-1" disabled value="2"><i class="fas fa-print"></i> Kirim Bukti Pendaftaran</button>
                    <button id="btnunduh" type="button" onclick="down_file('1')" class="btn btn-sm btn-danger mr-1" disabled value="3"><i class="fas fa-download"></i> Unduh Bukti Pendaftaran</button>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright dari web -->
    <?php $this->load->view('Template/Footer'); ?>