<!-- Bagian ini tag head digunakan untuk penampung tag 
<title>, <style>, <meta>, <link>, <script>, and <base>. -->
<?php $this->load->view('Template/Head'); ?>

<!-- Bagian paling atas diweb ini  -->
<?php $this->load->view('Template/Topbar'); ?>

<!-- Menu navigasi dibuat disini -->
<?php $this->load->view('Template/Header', array('data' => '2')); ?>

<div class="section-title">
    <h2>PENDAFTARAN ONLINE</h2>
</div>

<main id="main">
    <!-- ======= Features Section ======= -->
    <!-- <section id="featuresok" class="featuresok"> -->
    <div class="container">

        <input type="hidden" name="regonline" id="regonline" value="1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" id="stepprogress">
                <!-- <li class="breadcrumb-item">Cara Bayar</a></li>
                <li class="breadcrumb-item "><a href="#" id="datapasienlink"> Data Pasien</a></li>
                <li class="breadcrumb-item"><a href="#" id="dataregistrasilink">Data Registrasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Selesai</li> -->
            </ol>
        </nav>
        <div class="card" id="carabayar">
            <div class="card-body">
                <h4 style="text-align: center;">Silakan pilih dan klik cara bayar.</h4>
                <!-- <br> -->
                <ul class="nav nav-pills nav-justified row justify-content-md-center d-flex ">
                    <li class="nav-item col-lg-3 mt-5 ">
                        <a class="nav-link active show" data-toggle="tab" href="#tab-1">
                            <div class="icon"><img src="assets/img/BPJS.png" width="170px" height="170px"></div>
                            <h4 style="text-align: center;">BPJS</h4>
                        </a>
                    </li>
                    <li class="nav-item col-lg-3 mt-5" hidden>
                        <a class="nav-link " data-toggle="tab" href="#tab-2">
                            <div class="icon"><img src="assets/img/ASURANSI.png" width="170px" height="170px"></div>
                            <h4 style="text-align: center;">JAMINAN LAIN</h4>
                        </a>
                    </li>
                    <li class="nav-item col-lg-3 mt-5">
                        <a class="nav-link" data-toggle="tab" href="#tab-3">
                            <div class="icon"><img src="assets/img/AVATAR_CEKLIS.png" width="170px" height="170px"></div>
                            <h4 style="text-align: center;">UMUM (MANDIRI)</h4>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-footer d-flex flex-row-reverse">
                <button id="btnlanjutcarabayar" name="btnlanjutcarabayar" type="button" onclick="prosesLanjutcarabayar()" class="btn btn-sm btn-primary p-2"><i class="fas fa-arrow-alt-circle-right"></i></i> Lanjut</button>
            </div>
        </div>

        <div class="tab-content" id="tabcarabayar" hidden>
            <div class="tab-pane active show" id="tab-1">
                <div class="row justify-content-md-center">
                    <!-- <section id="featured-services1" class="featured-services1"> -->
                    <!-- <div style="padding: 2rem 3rem; text-align: left;"> -->
                    <div class="col-lg-12">
                        <div class="card" id="carddata">
                            <div class="card-header bg-primary  text-white" id="headerdatapasien">
                                Data Kepesertaan & Data Pasien
                            </div>
                            <div class="card-body" id="isidatapasien">
                                <input type="hidden" name="nilai" id="nilai" value="0">
                                <div class="row" hidden>
                                    <div class="col-md-9">
                                        <label class="label-control"><strong>Status Pasien</strong></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" value="1" id="flexRadioDefault1" checked onclick="checkRadio(value)">
                                            <label class="form-check-label mr-5" for="flexRadioDefault1">
                                                Pasien Lama
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" value="2" id="flexRadioDefault2" onclick="checkRadio(value)">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Pasien Baru
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="pasienlama">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Kunjungan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojeniskunjungan" value="2" id="radiojeniskunjungan2" checked>
                                                <label class="form-check-label mr-4" for="radiojeniskunjungan">
                                                    Berdasarkan Rujukan
                                                </label>
                                                <input class="form-check-input" type="radio" name="radiojeniskunjungan" value="1" id="radiojeniskunjungan1">
                                                <label class="form-check-label" for="radiojeniskunjungan">
                                                    Kontrol
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>NIK / No. Rekam Medik</strong></label>
                                            <input type="number" placeholder="NIK / No. RM" class="form-control" name="norm" id="norm" onchange="updateInput(this.value,'norm')">
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tanggal Lahir</strong></label>
                                            <input type="text" placeholder="DD/MM/YYYY" value="<?= date('d-m-Y') ?>" class="form-control" name="tgllahir" id="tgllahir">
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label class="label-control"><strong>No. Kartu BPJS / No. Surat Rujukan</strong></label>
                                            <input type="text" placeholder="No Peserta / No. Surat Rujukan" class="form-control" onKeyPress="if(this.value.length==20) return false;" id="nopesertaparm" name="nopesertaparm" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'nopesertaparm')">
                                            <small>Error Message</small>
                                        </div>

                                        <h6 style="font-size: 10px; color: red;"><b><u>Syarat dan Ketentuan </u></b></h6>
                                        <h6 style="font-size: 10px; color: red;"><b>* Harus mempunyai rujukan dari faskes 1 (Puskesmas/Klinik)</b></h6>
                                        <h6 style="font-size: 10px; color: red;"><b>* Masa berlaku rujukan 90 Hari dari tanggal rujukan asalnya.</b></h6>
                                        <h6 style="font-size: 10px; color: red;"><b>* Pemilihan poli pendaftaran harus sesuai dengan poli rujukannya.</b></h6>
                                    </div>

                                    <div class="col-md-4" hidden>
                                        <div class=" form-group">
                                            <label class="label-control"><strong>No. Kartu BPJS</strong></label>
                                            <input type="number" placeholder="No Peserta / No. Surat Rujukan" class="form-control" onKeyPress="if(this.value.length==20) return false;" id="nopeserta" name="nopeserta" onchange="updateInput(this.value,'nopeserta')">
                                            <small>Error Message</small>
                                        </div>
                                    </div>

                                    <div class="col-md-4" hidden>
                                        <div class=" form-group">
                                            <label class="label-control"><strong>No. Surat Rujukan</strong></label>
                                            <input type="text" placeholder="No. Surat Rujukan" class="form-control" onKeyPress="if(this.value.length==20) return false;" id="nosuratrujukan" name="nosuratrujukan" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'nosuratrujukan')">
                                            <small>Error Message</small>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <button id="btncari" name="btncari" type="button" onclick="prosesCari()" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari</button>
                                        </div>
                                    </div>

                                    <div class="table-responsive" style="width:100%" id="tabletab">
                                    </div>

                                    <!-- <div class="col-md-5"> -->
                                    <input type="text" class="form-control" maxlength="50" name="normhiddenlama" id="normhiddenlama" hidden>
                                    <!-- </div> -->
                                </div>

                                <div class="row mt-3" id="pasienbaru">
                                    <!-- <div class="col-md-5"> -->
                                    <input type="text" class="form-control" maxlength="50" name="normhiddenbaru" id="normhiddenbaru" hidden>
                                    <!-- </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Nama Depan</strong></label>
                                            <select name="gelar" id="gelar" class="form-control" title="Pilih Gelar" onchange="updateInput(this.value,'gelar')">
                                                <option value="">-PILIH-</option>
                                                <option value="Bayi">Bayi</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Tn.">Tn.</option>
                                                <option value="Ny.">Ny.</option>
                                                <option value="Nn.">Nn.</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Nama Lengkap</strong></label>
                                            <input type="text" placeholder="Nama Pasien" class="form-control" maxlength="50" name="namalengkap" id="namalengkap" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'namalengkap')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Kelamin</strong></label>
                                            <select name="kelamin" id="kelamin" class="form-control form-control-user" title="Pilih Jenis Kelamin" onchange="updateInput(this.value,'kelamin')">
                                                <option value="">-PILIH-</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tempat Lahir</strong></label>
                                            <input type="text" placeholder="Tempat Lahir" class="form-control" maxlength="50" id="tempatlahir" name="tempatlahir" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'tempatlahir')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tanggal Lahir</strong></label>
                                            <input type="text" placeholder="DD/MM/YYYY" value="<?= date('d-m-Y') ?>" class="form-control" id="tgllahirbaru" name="tgllahirbaru" onchange="HitungUmur(this.value)">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tahun</strong></label>
                                            <input type="text" placeholder="Thn" class="form-control" disabled name="tahun" id="tahun">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Bulan</strong></label>
                                            <input type="text" placeholder="Bln" class="form-control" disabled name="bulan" id="bulan">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Hari</strong></label>
                                            <input type="text" placeholder="Hari" class="form-control" disabled name="hari" id="hari">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>No. Identitas (KTP/SIM/...)</strong></label>
                                            <input type="number" placeholder="No. Identitas" class="form-control" maxlength="20" id="noidentitas" name="noidentitas" onchange="updateInput(this.value,'noidentitas')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Alamat</strong></label>
                                            <input type="text" placeholder="Alamat" class="form-control" maxlength="100" id="alamat" name="alamat" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'alamat')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>RT</strong></label>
                                            <input type="number" placeholder="RT" class="form-control" onKeyPress="if(this.value.length==3) return false;" id="rt" name="rt" onchange="updateInput(this.value,'rt')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>RW</strong></label>
                                            <input type="number" placeholder="RW" class="form-control" onKeyPress="if(this.value.length==3) return false;" id="rw" name="rw" onchange="updateInput(this.value,'rw')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Propinsi</strong></label>
                                            <select name="propinsi" id="propinsi" class="form-control form-control-user" title="Pilih Propinsi" onchange="updateInput(this.value,'propinsi')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kota (Kabupaten)</strong></label>
                                            <select name="kota" id="kota" class="form-control form-control-user" title="Pilih Kota (Kabupaten)" onchange="updateInput(this.value,'kota')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kecamatan</strong></label>
                                            <select name="kecamatan" id="kecamatan" class="form-control form-control-user" title="Pilih Kecamatan" onchange="updateInput(this.value,'kecamatan')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kelurahan (Desa)</strong></label>
                                            <select name="kelurahan" id="kelurahan" class="form-control form-control-user" title="Pilih Kelurahan" onchange="updateInput(this.value,'kelurahan')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class=" form-group">
                                            <label class="label-control"><strong>Telepon</strong></label>
                                            <input type="number" placeholder="Telepon" class="form-control" onKeyPress="if(this.value.length==15) return false;" id="notlp" name="notlp" onchange="updateInput(this.value,'notlp')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kode Pos</strong></label>
                                            <input type="number" placeholder="Kode Pos" class="form-control" onKeyPress="if(this.value.length==5) return false;" id="kodepos" name="kodepos" onchange="updateInput(this.value,'kodepos')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header bg-primary  text-white" id="headerregonline">
                                Data Pendaftaran
                                <div class="card-footer" style="text-align: center; background-color: white; font-size: 25px;">
                                    <b id="polifaskes" class="blink">Poli Rujukan :</b>
                                </div>
                            </div>

                            <div class="card-body" id="isiregonline">
                                <input type="hidden" name="nilai" id="nilai" value="1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tgl. Pemeriksaan</strong></label>
                                            <input type="text" placeholder="DD/MM/YYYY" class=" form-control" name="tglregistrasi" id="tglregistrasi" onchange="GetPoli(this.value)">
                                            <label class="label-control" style="font-size: 11px; color: red;"> * Periode Pemeriksaan H+1 s.d H+7 Setelah Melakukan Pendaftaran Online. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Poli</strong></label>
                                            <select name="poli" id="poli" class="form-control" title="Pilih Poli" onchange="updateInput(this.value,'poli')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4" hidden>
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Permintaan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispermintaan" value="1" id="radiojenispermintaan1">
                                                <label class="form-check-label" for="radiojenispermintaan">
                                                    Antrian Pendaftaran
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispermintaan" value="2" id="radiojenispermintaan2" checked>
                                                <label class="form-check-label" for="radiojenispermintaan">
                                                    Antrian Poli
                                                </label>
                                            </div>
                                            <!-- <select name="jenispermintaan" id="jenispermintaan" class="form-control form-control-user" title="Pilih Jenis Permintaan">
                                                <option value="">-PILIH-</option>
                                                <option value="1">Ambil Antrian Pendaftaran</option>
                                                <option value="2">Pendaftaran Poli</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tujuan Pemeriksaan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiotjnpemeiksaan" value="0" id="radiotjnpemeriksaan1" checked>
                                                <label class="form-check-label" for="radiotjnpemeiksaan">
                                                    Pemeriksaan Dokter
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiotjnpemeiksaan" value="1" id="radiotjnpemeriksaan2">
                                                <label class="form-check-label" for="radiotjnpemeiksaan">
                                                    Pembuatan Surat Keterangan Sehat (KIR Dokter)
                                                </label>
                                            </div>
                                            <!-- <select name="tujuanpemeriksaan" id="tujuanpemeriksaan" class="form-control" title="Pilih Tujuan Pemeriksaan">
                                                <option value="">-PILIH-</option>
                                                <option value="0">Pemeriksaan Dokter</option>
                                                <option value="1">Pembuatan Surat Keterangan Sehat (KIR Dokter)</option>
                                            </select> -->
                                            <!-- <small>Error Message</small> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Rujukan Asal</strong></label>
                                            <select name="rujukanasal" id="rujukanasal" class="form-control form-control-user" title="Pilih Rujukan Asal" onchange="updateInput(this.value,'rujukanasal')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Poli</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispoli" value="0" id="radiojenispoli2" checked onclick="return false">
                                                <label class="form-check-label" for="radiojenispoli">
                                                    Reguler
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispoli" value="1" id="radiojenispoli1" onclick="return false">
                                                <label class="form-check-label" for="radiojenispoli">
                                                    Eksekutif
                                                </label>
                                            </div>
                                            <!-- <select name="jenispoli" id="jenispoli" class="form-control form-control-user" title="Pilih Jenis POli">
                                                <option value="">-PILIH-</option>
                                                <option value="1">Eksekutif</option>
                                                <option value="2">Reguler</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                        <label class="label-control" style="font-size: 11px; color: red;"> * Mohon maaf untuk saat ini Poli Eksekutif belum tersedia.</label>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Email</strong></label>
                                            <input type="email" placeholder="Email" class="form-control" id="email" name="email" onchange="updateInput(this.value,'email')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                        <label class="label-control" style="font-size: 11px; color: red;"> * Pastikan Email terisi dengan benar karena untuk menerima Bukti Pendaftaran.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex">
                                <!-- <button id="btncari" name="btncari" type="button" onclick="prosesCari()" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari</button> -->
                                <button id="btnkembali" name="btnkembali" type="button" onclick="prosesKembali()" class="btn btn-sm btn-primary p-2"><i class="fas fa-arrow-circle-left"></i> Kembali</button>
                                <button id="btnlanjut" name="btnlanjut" type="button" onclick="prosesLanjut()" class="btn btn-sm btn-primary ml-auto p-2"><i class="fas fa-arrow-alt-circle-right"></i> Lanjut</button>
                            </div>

                            <div class="card-body " id="sukses" style="text-align: center;">
                                <div class="form-group">
                                    <h1 id="email" hidden>-</h1>
                                    <h1 id="kodebookingval" hidden>-</h1>
                                    <h1 id="nopendaftaranval" hidden>-</h1>
                                    <h1 id="nocmval" hidden>-</h1>
                                    <h1 id="nomorantreanval" hidden>-</h1>
                                    <h1 id="jenisantreanval" hidden>-</h1>
                                    <h1 id="estimasidilayanival" hidden>-</h1>
                                    <h1 id="namapolival" hidden>-</h1>
                                    <h1 id="namadokterval" hidden>-</h1>
                                    <h1 id="statuspasienval" hidden>-</h1>

                                    <i class="far fa-check-circle fa-10x" style="color: green;"></i>
                                    <h4 style="padding-top: 10px;">Data Berhasil Disimpan.</h4>
                                    <h6 style="padding-top: 10px;" id="nobookingsimpan">No. Booking : 2003190003</h6>
                                    <h6 style="padding-top: 10px;">Silahkan cek email yang sudah didaftarkan sebelumnya untuk melihat bukti pendaftaran.</h6>
                                    <h6 style="padding-top: 10px;" id="ketnobookingsimpan">* Jika tidak menerima email silahkan lakukan kirim ulang di halaman cari pendaftaran dengan memasukan No.Booking : 2003190003 </h6>
                                    <button id="btnhome" name="btnhome" type="button" onclick="prosesHome()" class="btn btn-sm btn-danger mt-2"><i class="fas fa-home"></i> Kembali Ke Beranda</button>
                                    <button id="btnunduh" name="btnunduh" type="button" onclick="down_file('2')" class="btn btn-sm btn-danger mt-2"><i class="fas fa-download"></i> Unduh Bukti Pendaftaran</button>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- </div> -->
                    <!-- </section> -->
                </div>
            </div>

            <div class="tab-pane" id="tab-2" hidden>
                <div class="row justify-content-md-center">
                    <!-- <section id="featured-services1" class="featured-services1"> -->
                    <div class="col-lg-12">
                        <div class="card" id="carddata2">
                            <div class="card-header bg-primary  text-white" id="headerdatapasien2">
                                Data Pasien
                            </div>
                            <div class="card-body" id="isidatapasien2">
                                <input type="hidden" name="nilai2" id="nilai2" value="1">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label class="label-control"><strong>Status Pasien</strong></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault2" value="1" id="flexRadioDefault3" checked onclick="checkRadio(value)">
                                            <label class="form-check-label mr-5" for="flexRadioDefault2">
                                                Pasien Lama
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault2" value="2" id="flexRadioDefault4" onclick="checkRadio(value)">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Pasien Baru
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4" id="pasienlama2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Nomor Rekam Medik</strong></label>
                                            <input type="number" placeholder="Nomor RM" class="form-control" name="norm2" id="norm2" onchange="updateInput(this.value,'norm2')">
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tanggal Lahir</strong></label>
                                            <input type="text" placeholder="DD/MM/YYYY" value="<?= date('d-m-Y') ?>" class="form-control" name="tgllahir2" id="tgllahir2">
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <button id="btncari2" name="btncari2" type="button" onclick="prosesCari()" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari</button>
                                        </div>
                                    </div>

                                    <div class="table-responsive" style="width:100%" id="tabletab2">
                                    </div>
                                    <!-- <div class="col-md-5"> -->
                                    <input type="text" class="form-control" maxlength="50" name="normhiddenlama2" id="normhiddenlama2" hidden>
                                    <!-- </div> -->
                                </div>

                                <div class="row mt-3" id="pasienbaru2">
                                    <!-- <div class="col-md-5"> -->
                                    <input type="text" class="form-control" maxlength="50" name="normhiddenbaru2" id="normhiddenbaru2" hidden>
                                    <!-- </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Nama Depan</strong></label>
                                            <select name="gelar2" id="gelar2" class="form-control" title="Pilih Gelar" onchange="updateInput(this.value,'gelar2')">
                                                <option value="">-PILIH-</option>
                                                <option value="Bayi">Bayi</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Tn.">Tn.</option>
                                                <option value="Ny.">Ny.</option>
                                                <option value="Nn.">Nn.</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Nama Lengkap</strong></label>
                                            <input type="text" placeholder="Nama Pasien" class="form-control" maxlength="50" name="namalengkap2" id="namalengkap2" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'namalengkap2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Kelamin</strong></label>
                                            <select name="kelamin2" id="kelamin2" class="form-control form-control-user" title="Pilih Jenis Kelamin" onchange="updateInput(this.value,'kelamin2')">
                                                <option value="">-PILIH-</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tempat Lahir</strong></label>
                                            <input type="text" placeholder="Tempat Lahir" class="form-control" maxlength="50" id="tempatlahir2" name="tempatlahir2" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'tempatlahir2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tanggal Lahir</strong></label>
                                            <input type="text" placeholder="DD/MM/YYYY" value="<?= date('d-m-Y') ?>" class="form-control" id="tgllahirbaru2" name="tgllahirbaru2" onchange="HitungUmur(this.value)">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tahun</strong></label>
                                            <input type="text" placeholder="Thn" class="form-control" disabled name="tahun2" id="tahun2">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Bulan</strong></label>
                                            <input type="text" placeholder="Bln" class="form-control" disabled name="bulan2" id="bulan2">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Hari</strong></label>
                                            <input type="text" placeholder="Hari" class="form-control" disabled name="hari2" id="hari2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>No. Identitas (KTP/SIM/...)</strong></label>
                                            <input type="number" placeholder="No. Identitas" class="form-control" maxlength="20" id="noidentitas2" name="noidentitas2" onchange="updateInput(this.value,'noidentitas2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Alamat</strong></label>
                                            <input type="text" placeholder="Alamat" class="form-control" maxlength="100" id="alamat2" name="alamat2" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'alamat2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>RT</strong></label>
                                            <input type="number" placeholder="RT" class="form-control" onKeyPress="if(this.value.length==3) return false;" id="rt2" name="rt2" onchange="updateInput(this.value,'rt2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>RW</strong></label>
                                            <input type="number" placeholder="RW" class="form-control" onKeyPress="if(this.value.length==3) return false;" id="rw2" name="rw2" onchange="updateInput(this.value,'rw2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Propinsi</strong></label>
                                            <select name="propinsi2" id="propinsi2" class="form-control form-control-user" title="Pilih Propinsi" onchange="updateInput(this.value,'propinsi2')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kota (Kabupaten)</strong></label>
                                            <select name="kota2" id="kota2" class="form-control form-control-user" title="Pilih Kota (Kabupaten)" onchange="updateInput(this.value,'kota2')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kecamatan</strong></label>
                                            <select name="kecamatan2" id="kecamatan2" class="form-control form-control-user" title="Pilih Kecamatan" onchange="updateInput(this.value,'kecamatan2')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kelurahan (Desa)</strong></label>
                                            <select name="kelurahan2" id="kelurahan2" class="form-control form-control-user" title="Pilih Kelurahan" onchange="updateInput(this.value,'kelurahan2')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class=" form-group">
                                            <label class="label-control"><strong>Telepon</strong></label>
                                            <input type="number" placeholder="Telepon" class="form-control" onKeyPress="if(this.value.length==15) return false;" id="notlp2" name="notlp2" onchange="updateInput(this.value,'notlp2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kode Pos</strong></label>
                                            <input type="number" placeholder="Kode Pos" class="form-control" onKeyPress="if(this.value.length==5) return false;" id="kodepos2" name="kodepos2" onchange="updateInput(this.value,'kodepos2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header bg-primary  text-white" id="headerregonline2">
                                Data Pendaftaran
                            </div>
                            <div class="card-body" id="isiregonline2">
                                <input type="hidden" name="nilai" id="nilai" value="1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tgl. Pemeriksaan</strong></label>
                                            <input type="text" name="tglregistrasi2" id="tglregistrasi2" placeholder="DD/MM/YYYY" class="form-control" onchange="GetPoli(this.value)">
                                            <label class="label-control" style="font-size: 11px; color: red;"> * Periode Pemeriksaan H+1 s.d H+7 Setelah Melakukan Pendaftaran Online. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Poli</strong></label>
                                            <select name="poli2" id="poli2" class="form-control form-control-user" title="Pilih Poli" onchange="updateInput(this.value,'poli2')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4" hidden>
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Permintaan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispermintaan2" value="1" id="radiojenispermintaan21">
                                                <label class="form-check-label" for="radiojenispermintaa2n">
                                                    Antrian Pendaftaran
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispermintaan2" value="2" id="radiojenispermintaan22" checked>
                                                <label class="form-check-label" for="radiojenispermintaan2">
                                                    Antrian Poli
                                                </label>
                                            </div>
                                            <!-- <select name="jenispermintaan2" id="jenispermintaan2" class="form-control form-control-user" title="Pilih Jenis Permintaan">
                                                <option value="">-PILIH-</option>
                                                <option value="1">Ambil Antrian Pendaftaran</option>
                                                <option value="2">Pendaftaran Poli</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tujuan Pemeriksaan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiotjnpemeiksaan2" value="0" id="radiotjnpemeriksaan21" checked>
                                                <label class="form-check-label" for="radiotjnpemeiksaan2">
                                                    Pemeriksaan Dokter
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiotjnpemeiksaan2" value="1" id="radiotjnpemeriksaan22">
                                                <label class="form-check-label" for="radiotjnpemeiksaan2">
                                                    Pembuatan Surat Keterangan Sehat (KIR Dokter)
                                                </label>
                                            </div>
                                            <!-- <select name="tujuanpemeriksaan2" id="tujuanpemeriksaan2" class="form-control" title="Pilih Tujuan Pemeriksaan">
                                                <option value="">-PILIH-</option>
                                                <option value="0">Pemeriksaan Dokter</option>
                                                <option value="1">Pembuatan Surat Keterangan Sehat (KIR Dokter)</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label class="label-control"><strong>Cara Bayar</strong></label>
                                            <select name="carabayar2" id="carabayar2" class="form-control form-control-user" title="Pilih Cara Bayar" onchange="updateInput(this.value,'carabayar2')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Rujukan Asal</strong></label>
                                            <select name="rujukanasal2" id="rujukanasal2" class="form-control form-control-user" title="Pilih Rujukan Asal" onchange="updateInput(this.value,'rujukanasal2')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label class="label-control"><strong>No. Peserta / No. Kartu</strong></label>
                                            <input type="number" placeholder="No Peserta" class="form-control" onKeyPress="if(this.value.length==20) return false;" id="nopeserta2" name="nopeserta2" onchange="updateInput(this.value,'nopeserta2')">
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4" hidden>
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Kunjungan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojeniskunjungan2" value="2" id="radiojeniskunjungan22" checked>
                                                <label class="form-check-label" for="radiojeniskunjungan2">
                                                    Berdasarkan Rujukan
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojeniskunjungan2" value="1" id="radiojeniskunjungan21">
                                                <label class="form-check-label" for="radiojeniskunjungan2">
                                                    Kontrol
                                                </label>
                                            </div>
                                            <!-- <select name="jeniskunjungan2" id="jeniskunjungan2" class="form-control form-control-user" title="Pilih Jenis Kunjungan">
                                                <option value="">-PILIH-</option>
                                                <option value="1">Kontrol</option>
                                                <option value="2">Berdasarkan Rujukan</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Poli</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispoli2" value="0" id="radiojenispoli22" checked onclick="return false">
                                                <label class="form-check-label" for="radiojenispoli2">
                                                    Reguler
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispoli2" value="1" id="radiojenispoli21" onclick="return false">
                                                <label class="form-check-label" for="radiojenispoli2">
                                                    Eksekutif
                                                </label>
                                            </div>
                                            <!-- <select name="jenispoli2" id="jenispoli2" class="form-control form-control-user" title="Pilih Jenis POli">
                                                <option value="">-PILIH-</option>
                                                <option value="1">Eksekutif</option>
                                                <option value="2">Reguler</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                        <label class="label-control" style="font-size: 11px; color: red;"> * Mohon maaf untuk saat ini poli eksekutif belum tersedia.</label>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Email</strong></label>
                                            <input type="email" placeholder="Email" class="form-control" id="email2" name="email2" onchange="updateInput(this.value,'email2')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                        <label class="label-control" style="font-size: 11px; color: red;"> * Pastikan Email terisi dengan benar karena untuk menerima bukti Pendaftaran.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex">
                                <!-- <button id="btncari" name="btncari" type="button" onclick="prosesCari()" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari</button> -->
                                <button id="btnkembali2" name="btnkembali2" type="button" onclick="prosesKembali()" class="btn btn-sm btn-primary p-2"><i class="fas fa-arrow-circle-left"></i> Kembali</button>
                                <button id="btnlanjut2" name="btnlanjut2" type="button" onclick="prosesLanjut()" class="btn btn-sm btn-primary ml-auto p-2"><i class="fas fa-arrow-alt-circle-right"></i> Lanjut</button>
                            </div>

                            <div class="card-body " id="sukses2" style="text-align: center;">
                                <div class="form-group">
                                    <h1 id="email2" hidden>-</h1>
                                    <h1 id="kodebookingval2" hidden>-</h1>
                                    <h1 id="nopendaftaranval2" hidden>-</h1>
                                    <h1 id="nocmval2" hidden>-</h1>
                                    <h1 id="nomorantreanval2" hidden>-</h1>
                                    <h1 id="jenisantreanval2" hidden>-</h1>
                                    <h1 id="estimasidilayanival2" hidden>-</h1>
                                    <h1 id="namapolival2" hidden>-</h1>
                                    <h1 id="namadokterval2" hidden>-</h1>
                                    <h1 id="statuspasienval2" hidden>-</h1>

                                    <i class="far fa-check-circle fa-10x" style="color: green;"></i>
                                    <h4 style="padding-top: 10px;">Data Berhasil Disimpan.</h4>
                                    <h6 style="padding-top: 10px;" id="nobookingsimpan">No. Booking : -</h6>
                                    <h6 style="padding-top: 10px;">Silahkan cek email yang sudah didaftarkan sebelumnya untuk melihat bukti pendaftaran.</h6>
                                    <h6 style="padding-top: 10px;" id="ketnobookingsimpan2">* Jika tidak menerima email silahkan lakukan kirim ulang di halaman cari pendaftaran dengan memasukan No.Booking : 2003190003 </h6>
                                    <button id="btnhome2" name="btnhome2" type="button" onclick="prosesHome()" class="btn btn-sm btn-danger mt-2"><i class="fas fa-home"></i> Kembali Ke Beranda</button>
                                    <button id="btnunduh2" name="btnunduh2" type="button" onclick="down_file('2')" class="btn btn-sm btn-danger mt-2"><i class="fas fa-download"></i> Unduh Bukti Pendaftaran</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- </section> -->
                </div>
            </div>

            <div class="tab-pane" id="tab-3">
                <div class="row justify-content-md-center">
                    <!-- <section id="featured-services1" class="featured-services1"> -->
                    <div class="col-lg-12">
                        <div class="card" id="carddata3">
                            <div class="card-header bg-primary  text-white" id="headerdatapasien3">
                                Data Pasien
                            </div>
                            <div class="card-body" id="isidatapasien3">
                                <input type="hidden" name="nilai3" id="nilai3" value="1">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label class="label-control"><strong>Status Pasien</strong></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault3" value="1" id="flexRadioDefault5" checked onclick="checkRadio(value)">
                                            <label class="form-check-label mr-5" for="flexRadioDefault3">
                                                Pasien Lama
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault3" value="2" id="flexRadioDefault6" onclick="checkRadio(value)">
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Pasien Baru
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4" id="pasienlama3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>NIK / No. Rekam Medik</strong></label>
                                            <input type="number" placeholder="No. RM / NIK" class="form-control" name="norm3" id="norm3" onchange="updateInput(this.value,'norm3')">
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tanggal Lahir</strong></label>
                                            <input placeholder="DD/MM/YYYY" value="<?= date('d-m-Y') ?>" class="form-control" name="tgllahir3" id="tgllahir3">
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <button id="btncari3" name="btncari3" type="button" onclick="prosesCari()" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari</button>
                                        </div>
                                    </div>

                                    <div class="table-responsive" style="width:100%" id="tabletab3">
                                    </div>
                                    <!-- <div class="col-md-5"> -->
                                    <input type="text" class="form-control" maxlength="50" name="normhiddenlama3" id="normhiddenlama3" hidden>
                                    <!-- </div> -->
                                </div>

                                <div class="row mt-3" id="pasienbaru3">
                                    <!-- <div class="col-md-5"> -->
                                    <input type="text" class="form-control" maxlength="50" name="normhiddenbaru3" id="normhiddenbaru3" hidden>
                                    <!-- </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Nama Depan</strong></label>
                                            <select name="gelar3" id="gelar3" class="form-control" title="Pilih Gelar" onchange="updateInput(this.value,'gelar3')">
                                                <option value="">-PILIH-</option>
                                                <option value="Bayi">Bayi</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Tn.">Tn.</option>
                                                <option value="Ny.">Ny.</option>
                                                <option value="Nn.">Nn.</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Nama Lengkap</strong></label>
                                            <input type="text" placeholder="Nama Pasien" class="form-control" maxlength="50" name="namalengkap3" id="namalengkap3" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'namalengkap3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Kelamin</strong></label>
                                            <select name="kelamin3" id="kelamin3" class="form-control form-control-user" title="Pilih Jenis Kelamin" onchange="updateInput(this.value,'kelamin3')">
                                                <option value="">-PILIH-</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tempat Lahir</strong></label>
                                            <input type="text" placeholder="Tempat Lahir" class="form-control" maxlength="50" id="tempatlahir3" name="tempatlahir3" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'tempatlahir3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tanggal Lahir</strong></label>
                                            <input type="text" placeholder="DD/MM/YYYY" value="<?= date('d-m-Y') ?>" class="form-control" id="tgllahirbaru3" name="tgllahirbaru3" onchange="HitungUmur(this.value)">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tahun</strong></label>
                                            <input type="text" placeholder="Thn" class="form-control" disabled name="tahun3" id="tahun3">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Bulan</strong></label>
                                            <input type="text" placeholder="Bln" class="form-control" disabled name="bulan3" id="bulan3">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Hari</strong></label>
                                            <input type="text" placeholder="Hari" class="form-control" disabled name="hari3" id="hari3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>No. Identitas (KTP/SIM/...)</strong></label>
                                            <input type="number" placeholder="No. Identitas" class="form-control" maxlength="20" id="noidentitas3" name="noidentitas3" onchange="updateInput(this.value,'noidentitas3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Alamat</strong></label>
                                            <input type="text" placeholder="Alamat" class="form-control" maxlength="100" id="alamat3" name="alamat3" oninput="this.value = this.value.toUpperCase()" onchange="updateInput(this.value,'alamat3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>RT</strong></label>
                                            <input type="number" placeholder="RT" class="form-control" onKeyPress="if(this.value.length==3) return false;" id="rt3" name="rt3" onchange="updateInput(this.value,'rt3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="label-control"><strong>RW</strong></label>
                                            <input type="number" placeholder="RW" class="form-control" onKeyPress="if(this.value.length==3) return false;" id="rw3" name="rw3" onchange="updateInput(this.value,'rw3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Propinsi</strong></label>
                                            <select name="propinsi3" id="propinsi3" class="form-control form-control-user" title="Pilih Propinsi" onchange="updateInput(this.value,'propinsi3')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kota (Kabupaten)</strong></label>
                                            <select name="kota3" id="kota3" class="form-control form-control-user" title="Pilih Kota (Kabupaten)" onchange="updateInput(this.value,'kota3')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kecamatan</strong></label>
                                            <select name="kecamatan3" id="kecamatan3" class="form-control form-control-user" title="Pilih Kecamatan" onchange="updateInput(this.value,'kecamatan3')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kelurahan (Desa)</strong></label>
                                            <select name="kelurahan3" id="kelurahan3" class="form-control form-control-user" title="Pilih Kelurahan" onchange="updateInput(this.value,'kelurahan3')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class=" form-group">
                                            <label class="label-control"><strong>Telepon</strong></label>
                                            <input type="number" placeholder="Telepon" class="form-control" onKeyPress="if(this.value.length==15) return false;" id="notlp3" name="notlp3" onchange="updateInput(this.value,'notlp3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Kode Pos</strong></label>
                                            <input type="number" placeholder="Kode Pos" class="form-control" onKeyPress="if(this.value.length==5) return false;" id="kodepos3" name="kodepos3" onchange="updateInput(this.value,'kodepos3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header bg-primary  text-white" id="headerregonline3">
                                Data Pendaftaran
                            </div>
                            <div class="card-body" id="isiregonline3">
                                <input type="hidden" name="nilai3" id="nilai3" value="1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tgl. Pemeriksaan</strong></label>
                                            <input type="text" class="form-control form-control-user" name="tglregistrasi3" id="tglregistrasi3" placeholder="DD/MM/YYYY" onchange="GetPoli(this.value)">
                                            <label class="label-control" style="font-size: 11px; color: red;"> * Periode Pemeriksaan H+1 s.d H+7 Setelah Melakukan Pendaftaran Online. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Poli</strong></label>
                                            <select name="poli3" id="poli3" class="form-control form-control-user" title="Pilih Poli" onchange="updateInput(this.value,'poli3')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4" hidden>
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Permintaan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispermintaan3" value="1" id="radiojenispermintaan31">
                                                <label class="form-check-label" for="radiojenispermintaan3">
                                                    Antrian Pendaftaran
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispermintaan3" value="2" id="radiojenispermintaan32" checked>
                                                <label class="form-check-label" for="radiojenispermintaan3">
                                                    Antrian Poli
                                                </label>
                                            </div>
                                            <!-- <select name="jenispermintaan3" id="jenispermintaan3" class="form-control form-control-user" title="Pilih Jenis Permintaan">
                                                <option value="">-PILIH-</option>
                                                <option value="1">Ambil Antrian Pendaftaran</option>
                                                <option value="2">Pendaftaran Poli</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Tujuan Pemeriksaan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiotjnpemeiksaan3" value="0" id="radiotjnpemeriksaan31" checked>
                                                <label class="form-check-label" for="radiotjnpemeiksaan3">
                                                    Pemeriksaan Dokter
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiotjnpemeiksaan3" value="1" id="radiotjnpemeriksaan32">
                                                <label class="form-check-label" for="radiotjnpemeiksaan3">
                                                    Pembuatan Surat Keterangan Sehat (KIR Dokter)
                                                </label>
                                            </div>
                                            <!-- <select name="tujuanpemeriksaan3" id="tujuanpemeriksaan3" class="form-control" title="Pilih Tujuan Pemeriksaan">
                                                <option value="">-PILIH-</option>
                                                <option value="0">Pemeriksaan Dokter</option>
                                                <option value="1">Pembuatan Surat Keterangan Sehat (KIR Dokter)</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Rujukan Asal</strong></label>
                                            <select name="rujukanasal3" id="rujukanasal3" class="form-control form-control-user" title="Pilih Rujukan Asal" onchange="updateInput(this.value,'rujukanasal3')">
                                                <option value="">-PILIH-</option>
                                            </select>
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4" hidden>
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Kunjungan</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojeniskunjungan3" value="2" id="radiojeniskunjungan32" checked>
                                                <label class="form-check-label" for="radiojeniskunjungan3">
                                                    Berdasarkan Rujukan
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojeniskunjungan3" value="1" id="radiojeniskunjungan31">
                                                <label class="form-check-label" for="radiojeniskunjungan3">
                                                    Kontrol
                                                </label>
                                            </div>
                                            <!-- <select name="jeniskunjungan3" id="jeniskunjungan3" class="form-control form-control-user" title="Pilih Jenis Kunjungan">
                                                <option value="">-PILIH-</option>
                                                <option value="1">Kontrol</option>
                                                <option value="2">Berdasarkan Rujukan</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Jenis Poli</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispoli3" value="0" id="radiojenispoli32" checked onclick="return false">
                                                <label class="form-check-label" for="radiojenispoli3">
                                                    Reguler
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiojenispoli3" value="1" id="radiojenispoli31" onclick="return false">
                                                <label class="form-check-label" for="radiojenispoli3">
                                                    Eksekutif
                                                </label>
                                            </div>
                                            <!-- <select name="jenispoli3" id="jenispoli3" class="form-control form-control-user" title="Pilih Jenis POli">
                                                <option value="">-PILIH-</option>
                                                <option value="1">Eksekutif</option>
                                                <option value="2">Reguler</option>
                                            </select>
                                            <small>Error Message</small> -->
                                        </div>
                                        <label class="label-control" style="font-size: 11px; color: red;"> * Mohon maaf untuk saat ini poli eksekutif belum tersedia.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control"><strong>Email</strong></label>
                                            <input type="email" placeholder="Email" class="form-control" id="email3" name="email3" onchange="updateInput(this.value,'email3')">
                                            <!---->
                                            <small>Error Message</small>
                                        </div>
                                        <label class="label-control" style="font-size: 11px; color: red;"> * Pastikan Email terisi dengan benar karena untuk menerima Bukti Pendaftaran.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex">
                                <!-- <button id="btncari" name="btncari" type="button" onclick="prosesCari()" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari</button> -->
                                <button id="btnkembali3" name="btnkembali3" type="button" onclick="prosesKembali()" class="btn btn-sm btn-primary p-2"><i class="fas fa-arrow-circle-left"></i> Kembali</button>
                                <button id="btnlanjut3" name="btnlanjut3" type="button" onclick="prosesLanjut()" class="btn btn-sm btn-primary ml-auto p-2"><i class="fas fa-arrow-alt-circle-right"></i> Lanjut</button>
                            </div>

                            <div class="card-body " id="sukses3" style="text-align: center;">
                                <div class="form-group">
                                    <h1 id="email3" hidden>-</h1>
                                    <h1 id="kodebookingval3" hidden>-</h1>
                                    <h1 id="nopendaftaranval3" hidden>-</h1>
                                    <h1 id="nocmval3" hidden>-</h1>
                                    <h1 id="nomorantreanval3" hidden>-</h1>
                                    <h1 id="jenisantreanval3" hidden>-</h1>
                                    <h1 id="estimasidilayanival3" hidden>-</h1>
                                    <h1 id="namapolival3" hidden>-</h1>
                                    <h1 id="namadokterval3" hidden>-</h1>
                                    <h1 id="statuspasienval3" hidden>-</h1>

                                    <i class="far fa-check-circle fa-10x" style="color: green;"></i>
                                    <h4 style="padding-top: 10px;">Data Berhasil Disimpan.</h4>
                                    <h6 style="padding-top: 10px;" id="nobookingsimpan3">No. Booking : -</h6>
                                    <h6 style="padding-top: 10px;">Silahkan cek email yang sudah didaftarkan sebelumnya untuk melihat bukti pendaftaran.</h6>
                                    <h6 style="padding-top: 10px;" id="ketnobookingsimpan3">-</h6>
                                    <button id="btnhome3" name="btnhome3" type="button" onclick="prosesHome()" class="btn btn-sm btn-danger mt-2"><i class="fas fa-home"></i> Kembali Ke Beranda</button>
                                    <button id="btnunduh3" name="btnunduh3" type="button" onclick="down_file('2')" class="btn btn-sm btn-danger mt-2"><i class="fas fa-download"></i> Unduh Bukti Pendaftaran</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </section> -->
                </div>
            </div>
        </div>
        <!-- </section> -->
        <!-- <div id="loading"> -->
    </div>


</main>
<!-- copyright dari web -->
<?php $this->load->view('Template/Footer'); ?>