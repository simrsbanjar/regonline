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

                <div class="card-header bg-primary text-white">
                    Cari Data Pendaftaran
                </div>
                <div class="card-body card-block">
                    <input type="hidden" name="reservasi" id="reservasi" value="2">
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
                                        <input class="form-check-input" type="radio" name="radiokriteria" value="0" id="radiokriteriakdbooking" checked>
                                        <label class="form-check-label mr-5" for="radiokriteria">
                                            Kode Booking
                                        </label>
                                        <!-- </div> -->
                                        <!-- <div class="form-check"> -->
                                        <input class="form-check-input" type="radio" name="radiokriteria" value="1" id="radiokriterianopendaftaran">
                                        <label class="form-check-label" for="radiokriteria">
                                            No. Pendaftaran
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" name="nopendaftaran" id="nopendaftaran" class="form-control" placeholder="Kode Bookinng / No. Pendaftaran">
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
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <button id="btnhapus" type="button" onclick="HapusBooking()" class="btn btn-sm btn-danger mr-2" disabled value="1"><i class="fa fa-trash"></i> Batalkan Data Registrasi</button>
                    <button id="btncetak" type="button" onclick="CetakBooking()" class="btn btn-sm btn-danger mr-1" disabled value="2"><i class="fas fa-print"></i> Kirim Bukti Registasi</button>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright dari web -->
    <?php $this->load->view('Template/Footer'); ?>