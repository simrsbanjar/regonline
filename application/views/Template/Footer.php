<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top" id="footer">
        <div class="container">
            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <strong> RSUD KOTA BANJAR </strong> <?= date('Y'); ?></span>
                    <br>
                    <span>Powered by SIMRS. <strong> Version 1.0 </strong></span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/vendor/sweetalert/sweetalert.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Slick JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="assets/js/slide.js"></script>

<!-- Pemanggilan Function -->
<script src="assets/js/function/f_getharilibur.js"></script>
<script src="assets/js/function/f_documentready.js"></script>
<script src="assets/js/function/f_ambildatapasienbpjs.js"></script>

<!-- JS Faltpickr Tanggal  -->
<script src="assets/js/flatpickr.js"></script>

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script> -->

<script>
    //start kebutuhan enable/disable kirim saran di home
    $('#name').change(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        if ((name != null && name != '') && (email != null && email != '') && (subject != null && subject != '') && (message != null && message != '')) {
            $("#btnkirim").attr("disabled", false);
        } else {
            $("#btnkirim").attr("disabled", true);
        }
    });

    $('#email').change(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        if ((name != null && name != '') && (email != null && email != '') && (subject != null && subject != '') && (message != null && message != '')) {
            $("#btnkirim").attr("disabled", false);
        } else {
            $("#btnkirim").attr("disabled", true);
        }
    });

    $('#subject').change(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        if ((name != null && name != '') && (email != null && email != '') && (subject != null && subject != '') && (message != null && message != '')) {
            $("#btnkirim").attr("disabled", false);
        } else {
            $("#btnkirim").attr("disabled", true);
        }
    });

    $('#message').change(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        if ((name != null && name != '') && (email != null && email != '') && (subject != null && subject != '') && (message != null && message != '')) {
            $("#btnkirim").attr("disabled", false);
        } else {
            $("#btnkirim").attr("disabled", true);
        }
    });
    //end kebutuhan enable/disable kirim saran di home

    function checkRadioCari(value) {
        if (value == '0') { // kode booking
            $("#txtnoboking").attr("hidden", true);
            $("#tglperiksahead").attr("hidden", true);
            document.getElementById("classinputkodebooking").className =
                document.getElementById("classinputkodebooking").className.replace(/(?:^|\s)col-lg-6(?!\S)/g, ' col-lg-12')
            document.getElementsByName('nopendaftaran')[0].placeholder = 'Kode Booking';
            document.getElementById("nopendaftaran").value = '';
        } else if (value == '1') { // no pendaftaran
            $("#txtnoboking").attr("hidden", true);
            $("#tglperiksahead").attr("hidden", true);;
            document.getElementById("classinputkodebooking").className =
                document.getElementById("classinputkodebooking").className.replace(/(?:^|\s)col-lg-6(?!\S)/g, ' col-lg-12')
            document.getElementsByName('nopendaftaran')[0].placeholder = 'No. Pendaftaran';
            document.getElementById("nopendaftaran").value = '';
        } else { // nik/norm
            $('#txtnoboking').text('No. Pendaftaran');
            $('#txtnoboking').text('NIK / No. Rekam Medik');
            $("#txtnoboking").attr("hidden", false);
            $("#tglperiksahead").attr("hidden", false);
            document.getElementById("classinputkodebooking").className =
                document.getElementById("classinputkodebooking").className.replace(/(?:^|\s)col-lg-12(?!\S)/g, ' col-lg-6')
            document.getElementsByName('nopendaftaran')[0].placeholder = 'NIK / No. Rekam Medik';
            document.getElementById("nopendaftaran").value = '';
            document.getElementById("tglperiksacari").value = daystarttgl();
        }

        setSuccessFor(document.getElementById('nopendaftaran'));
    }

    function GedateRealtime() {
        var hari = '00' + new Date().getDate().toString();
        var bulan = ("00" + (new Date().getMonth() + 1)).toString();
        var tahun = '0000' + new Date().getFullYear().toString();
        var jam = '00' + new Date().getHours().toString();
        var menit = '00' + new Date().getMinutes().toString();
        var detik = '00' + new Date().getSeconds().toString();

        return hari.substr(-2) + "-" + bulan.substr(-2) + "-" + tahun.substr(-4) + " " + jam.substr(-2) + ":" + menit.substr(-2) + ":" + detik.substr(-2);
    }

    function ProgressCountdown(timeleft, bar, text) {
        var timeleftlocal = timeleft + 1;
        return new Promise((resolve, reject) => {
            var countdownTimer = setInterval(() => {
                timeleft--;

                timeleft = '00' + timeleft;

                document.getElementById(bar).value = timeleft.substr(-2);
                document.getElementById(text).textContent = timeleft.substr(-2);

                if (timeleft <= 0) {
                    timeleft = timeleftlocal;
                    GetAntrianLive();
                    // clearInterval(countdownTimer);
                    // resolve(true);
                }
            }, 1000);
        });
    }



    function GetAntrianLive() {
        var TglPeriksa = new Date().toDateString("yyyy-MM-dd");
        var KodePoli = '';
        var html = '';
        var mod = 1;
        var warna = '';
        var sudahdilayani = 0;
        var totalantrian = 0;
        // var hari = '00' + new Date().getDate().toString();
        // var bulan = '00' + new Date().getMonth().toString();
        // var tahun = '0000' + new Date().getFullYear().toString();
        // var jam = '00' + new Date().getHours().toString();
        // var menit = '00' + new Date().getMinutes().toString();
        // var detik = '00' + new Date().getSeconds().toString();


        $('#dt-wkturespon').text(GedateRealtime);
        // $('#dt-wkturespon').text((new Date().getDate() + "-" + new Date().getMonth() + "-" + new Date().getFullYear() + " " + new Date().getHours() + ":" + new Date().getMinutes() + ":" + new Date().getSeconds()));

        $.ajax({
            url: "Home/GetAntrianLive",
            method: "POST",
            // async: false,
            dataType: 'json',
            data: {
                "tglperiksa": TglPeriksa,
                "kodepoli": KodePoli
            },
            success: function(data) {
                for (i = 0; i < data.length; i++) {
                    mod = i % 2

                    if (mod == 0) {
                        warna = 'bg-blue-500';
                    } else {
                        warna = 'bg-green-500';
                    }
                    // $("#NamaPoli").text(data[i].namapoli);
                    // $("#NoUrut").text(data[i].jumlahterlayani);
                    // $("#TotalAntrian").text("Total Antrian : " + data[i].totalantrian);
                    html += "<div class='col-md-6 col-lg-4'>";
                    html += "<div class='w-full p-3 mb-4 font-medium'>";
                    html += "<div class='w-full flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-md '>";
                    html += "<div class='block rounded-t overflow-hidden text-center'>";
                    html += "<div class='" + warna + " text-white py-1 uppercase'>";
                    html += "<span>" + data[i].namapoli + "</span>";
                    html += "</div>";
                    html += "<div class='border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1'>";
                    html += "<span class='text-sm'>";
                    html += "Antrian Saat Ini";
                    html += "</span>";
                    html += "</div>";
                    html += "<div class='pt-1 border-l border-r border-white bg-white'>";
                    html += "<span class='text-6xl font-bold leading-tight' id='NoUrut'>";
                    html += data[i].jumlahterlayani;
                    html += "</span>";
                    html += "</div>";
                    html += "<div class='pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white'>";
                    html += "<span class='text-xs leading-normal' id='TotalAntrian'>";
                    html += "Total Antrian : " + data[i].totalantrian;
                    html += "</span>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";
                    $('#noantrianlive').html(html);

                    sudahdilayani = (parseInt(sudahdilayani) + parseInt(data[i].jumlahterlayani));
                    totalantrian = (parseInt(totalantrian) + parseInt(data[i].totalantrian));

                    // $('#NoUrut')
                    //     .animateNumber({
                    //             number: parseInt(data[i].jumlahterlayani)
                    //         },
                    //         'normal',
                    //         function() {
                    //             $('#NoUrut').text('001')
                    //         }
                    //     );
                }

                sudahdilayani = '000' + sudahdilayani.toString();
                totalantrian = '000' + totalantrian.toString();

                $('#sudahdilayani').text(sudahdilayani.substr(-3));
                $('#jumlahantrian').text('Total Antrian : ' + totalantrian.substr(-3));


            },
            error: function() {
                html = "<div class='col-md-6 col-lg-4'>";
                html += "<div class='w-full p-3 mb-4 font-medium'>";
                html += "<div class='w-full flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-md '>";
                html += "<div class='block rounded-t overflow-hidden text-center'>";
                html += "<div class='bg-red-500 text-white py-1 uppercase'>";
                html += "<span>-</span>";
                html += "</div>";
                html += "<div class='border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1'>";
                html += "<span class='text-sm'>";
                html += "Antrian Saat Ini";
                html += "</span>";
                html += "</div>";
                html += "<div class='pt-1 border-l border-r border-white bg-white'>";
                html += "<span class='text-6xl font-bold leading-tight' id='NoUrut'>";
                html += "-";
                html += "</span>";
                html += "</div>";
                html += "<div class='pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white'>";
                html += "<span class='text-xs leading-normal' id='TotalAntrian'>";
                html += "Total Antrian : -";
                html += "</span>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                $('#noantrianlive').html(html);

                $('#sudahdilayani').text('-');
                $('#jumlahantrian').text('Total Antrian : ' + '-');
            }
        });
        // setTimeout(GetAntrianLive, 10000)
    }


    function GetJadwalPoliklinik() {
        var TglPeriksa = $("[name='tglperiksa']").val();
        // var TglPeriksa = new Date().toDateString("yyyy-MM-dd");
        var Parameter = $("[name='parameter']").val();
        var html = "";
        var nourut = 0;

        $.ajax({
            url: "Home/GetJadwalPoliklinik",
            method: "POST",
            // async: false,
            dataType: 'json',
            data: {
                "tglperiksa": TglPeriksa,
                "parameter": Parameter
            },
            success: function(data) {
                for (i = 0; i < data.length; i++) {
                    nourut++;

                    html += "<tr>";
                    html += "<td scope='row' style='text-align: center;'>" + nourut + "</td>";
                    html += "<td>" + data[i].NamaRuangan + "</td>";
                    html += "<td>" + data[i].Hari + "</td>";
                    html += "<td>" + data[i].NamaPegawai + "</td>";
                    html += "</tr>";
                    $('#jadwalpoliklinik').html(html);
                }
            },
            error: function() {
                html += "<tr>";
                html += "<td scope='row'>Tidak Ada Data</td>";
                html += "<td>Tidak Ada Data</td>";
                html += "<td>Tidak Ada Data</td>";
                html += "<td>Tidak Ada Data</td>";
                html += "</tr>";
                $('#jadwalpoliklinik').html(html);
            }
        });
        // setTimeout(GetAntrianLive, 100000)
    }

    function daycount() {
        return <?php
                $jumlah = 0;
                for ($x = 0; $x <= 7; $x++) {
                    $Date = date("Y-m-d");
                    $timestamp = strtotime($Date . ' + ' . $x . ' days');
                    // echo date('N', $timestamp);
                    if (date('N', $timestamp) == 7) {
                        $jumlah = (int)$jumlah + 1;
                    }
                }
                echo $jumlah;
                ?>;
    }

    function daystart() {
        return <?php
                $Date = date("Y-m-d");
                $timestamp = strtotime($Date . ' + 1 days');
                // echo date('N', $timestamp);
                if (date('N', $timestamp) == 7) {
                    $jumlah = 2;
                } else {
                    $jumlah = 1;
                }
                echo $jumlah;
                ?>;

    }

    function daystarttgl() {

        return "<?php
                $Date = date("Y-m-d");
                $timestamp = strtotime($Date . ' + 1 days');
                // echo date('N', $timestamp);
                if (date('N', $timestamp) == 7) {
                    $tanggal =  date('Y-m-d', strtotime($Date . ' + 2 days'));
                } else {
                    $tanggal =  date('Y-m-d', strtotime($Date . ' + 1 days'));
                }

                echo date('d-m-Y', strtotime($tanggal));
                ?>";

    }

    $("#tglperiksa").flatpickr({
        //disable mobile berfungsi sebagai settingan supaya ketika menggunakan mobile tidak memakai tampilan tgl mobile
        disableMobile: "true",
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: "<?= date("d-m-Y") ?>",
        // maxDate: new Date().fp_incr(7),
        onOpen: function(selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        },
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }
    });

    $("#tgllahir").flatpickr({
        //disable mobile berfungsi sebagai settingan supaya ketika menggunakan mobile tidak memakai tampilan tgl mobile
        disableMobile: "true",
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: '01-01-1900',
        maxDate: new Date(),
        onOpen: function(selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        },
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }

    });

    $("#tgllahir2").flatpickr({
        disableMobile: "true",
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: '01-01-1900',
        maxDate: new Date(),
        onOpen: function(selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        },
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }
    });

    $("#tgllahir3").flatpickr({
        disableMobile: "true",
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: '01-01-1900',
        maxDate: new Date(),
        onOpen: function(selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        },
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }
    });

    $("#tgllahirbaru").flatpickr({
        disableMobile: "true",
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: '01-01-1900',
        maxDate: new Date(),
        onOpen: function(selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        },
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }
    });

    $("#tgllahirbaru2").flatpickr({
        disableMobile: "true",
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: '01-01-1900',
        maxDate: new Date(),
        onOpen: function(selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        },
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }
    });

    $("#tgllahirbaru3").flatpickr({
        disableMobile: "true",
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: '01-01-1900',
        maxDate: new Date(),
        onOpen: function(selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        },
        "locale": {
            "firstDayOfWeek": 1 // set start day of week to Monday
        }
    });

    // function GetHariLibur() {
    //     var hasil = '';
    //     var jumlah = 0;
    //     $.ajax({
    //         url: "regonline/GetHariLibur",
    //         data: {
    //             "jumlahhari": 7 + daycount()
    //         },
    //         method: "POST",
    //         async: false,
    //         dataType: 'json',
    //         success: function(data) {
    //             hasil = data;
    //             jumlah = hasil.length;
    //         },
    //         error: function() {
    //             message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
    //         }
    //     });

    //     $("#tglregistrasi").flatpickr({
    //         enableTime: false,
    //         dateFormat: "d-m-Y",
    //         minDate: new Date().fp_incr(daystart()),
    //         maxDate: new Date().fp_incr(7 + jumlah), // 7 days from now
    //         onOpen: function(selectedDates, dateStr, instance) {
    //             instance.setDate(instance.input.value, false);
    //         },
    //         "disable": hasil,
    //         "locale": {
    //             "firstDayOfWeek": 1 // set start day of week to Monday
    //         }
    //     });

    //     $("#tglregistrasi2").flatpickr({
    //         enableTime: false,
    //         dateFormat: "d-m-Y",
    //         minDate: new Date().fp_incr(daystart()),
    //         maxDate: new Date().fp_incr(7 + jumlah), // 7 days from now
    //         onOpen: function(selectedDates, dateStr, instance) {
    //             instance.setDate(instance.input.value, false);
    //         },
    //         "disable": hasil,
    //         "locale": {
    //             "firstDayOfWeek": 1 // set start day of week to Monday
    //         }
    //     });

    //     $("#tglregistrasi3").flatpickr({
    //         enableTime: false,
    //         dateFormat: "d-m-Y",
    //         minDate: new Date().fp_incr(daystart()),
    //         maxDate: new Date().fp_incr(7 + jumlah), // 7 days from now
    //         onOpen: function(selectedDates, dateStr, instance) {
    //             instance.setDate(instance.input.value, false);
    //         },
    //         "disable": hasil,
    //         "locale": {
    //             "firstDayOfWeek": 1 // set start day of week to Monday
    //         }
    //     });

    //     document.getElementById("tglregistrasi").value = daystarttgl();
    //     document.getElementById("tglregistrasi2").value = daystarttgl();
    //     document.getElementById("tglregistrasi3").value = daystarttgl();
    // }

    // function AmbilDataPasienBPJS() {
    //     $("#loading").addClass("overlay");
    //     $('#loading').fadeIn();
    //     // var nosrtrujukan = $('#nosuratrujukan').val();
    //     var nopesertaparm = $('#nopesertaparm').val();
    //     var tgllahir = $('#tgllahir').val();
    //     var norm = $('#norm').val();

    //     $.ajax({
    //         url: "regonline/AmbilDataPasienBPJS",
    //         method: "POST",
    //         data: {
    //             "nopeserta": nopesertaparm
    //         },
    //         // async: false,
    //         dataType: 'json',
    //         success: function(data) {
    //             if (data.codedata['code'] != '200') {
    //                 message('info', data.codedata['message'], 'Informasi', false);
    //                 setTimeout(() => {
    //                     $("#loading").removeClass("overlay");
    //                 }, 100);
    //                 $('#loading').fadeOut();
    //             } else {
    //                 // if (nopeserta != data.hasil['noKartu']) {
    //                 //     message('info', 'No. Peserta / No. Kartu Tidak Sesuai Dengan Data Rujukan.', 'Informasi', false);
    //                 // } else {
    //                 if (data.hasil['statuspeserta'] == 'AKTIF') {
    //                     if (data.hasil['noKunjungan'] == '' || data.hasil['noKunjungan'] == null) {
    //                         var nosrtrujukan = nopesertaparm;
    //                     } else {
    //                         var nosrtrujukan = data.hasil['noKunjungan'];
    //                     }
    //                     nopeserta = data.hasil['noKartu'];
    //                     document.getElementById("nosuratrujukan").value = nosrtrujukan;
    //                     document.getElementById("nopeserta").value = nopeserta;
    //                     document.getElementById("nopesertaparm").value = nopesertaparm;
    //                     var namapasien = data.hasil['nama'];
    //                     var kelaminpasien = data.hasil['jk'];
    //                     var tgllahirpasien = data.hasil['tglLahir'];
    //                     var noidentitaspasien = data.hasil['nik'];
    //                     var notelppasien = data.hasil['telepon'];
    //                     $('#polifaskes').text('Poli Rujukan : ' + data.hasil['nmpoli']);
    //                     $.ajax({
    //                         url: "regonline/GetPasienLama",
    //                         method: "POST",
    //                         data: {
    //                             "nocm": norm,
    //                             "tgllahir": tgllahir
    //                         },
    //                         // async: false,
    //                         dataType: 'json',
    //                         success: function(data) {
    //                             setTimeout(() => {
    //                                 $("#loading").removeClass("overlay");
    //                             }, 100);
    //                             $('#loading').fadeOut();
    //                             if (data.codedata['code'] != '200') {
    //                                 Swal.fire({
    //                                     title: 'Konfirmasi',
    //                                     // text: "Data Ditemukan didalam Sistem RSU Kota Banjar<br>Nama Pasien : " + data.hasil['namapasien'] + "",
    //                                     html: "Data Ditemukan Didalam Sistem BPJS Namun <b>" + data.codedata['message'] +
    //                                         " di Sistem Rumah Sakit</b><br>Apakah Akan Memperbaiki Pencarian ?",
    //                                     icon: 'question',
    //                                     showCancelButton: true,
    //                                     confirmButtonText: 'Ya',
    //                                     cancelButtonText: 'Daftar Sebagai Pasien Baru',
    //                                     customClass: 'swal-wide'
    //                                 }).then((result) => {
    //                                     if (result.value) {} else {
    //                                         // jika klik batal
    //                                         $("#pasienbaru").show();
    //                                         $('input:radio[name=flexRadioDefault][id=flexRadioDefault2]').click();
    //                                         document.getElementById("norm").value = norm;
    //                                         document.getElementById("nopesertaparm").value = nopesertaparm;
    //                                         document.getElementById("nopeserta").value = nopeserta;
    //                                         document.getElementById("nosuratrujukan").value = nosrtrujukan;
    //                                         document.getElementById("tgllahir").value = tgllahir;

    //                                         // set pasien baru
    //                                         document.getElementById("namalengkap").value = namapasien;
    //                                         document.getElementById("kelamin").value = kelaminpasien;
    //                                         document.getElementById("tgllahirbaru").value = tgllahirpasien;
    //                                         document.getElementById("noidentitas").value = noidentitaspasien;
    //                                         document.getElementById("notlp").value = notelppasien;

    //                                         HitungUmur(tgllahirpasien);
    //                                         $('#kelamin').change();
    //                                     }
    //                                 });
    //                             } else {
    //                                 Swal.fire({
    //                                     title: 'Konfirmasi',
    //                                     // text: "Data Ditemukan didalam Sistem RSU Kota Banjar<br>Nama Pasien : " + data.hasil['namapasien'] + "",
    //                                     html: "<div class='align-left'><b>Data Ditemukan Didalam Sistem.</b>" +
    //                                         "<br><br>No. Rekam Medik : " + data.hasil['nocm'] +
    //                                         "<br>Nama Pasien : " + data.hasil['namapasien'] +
    //                                         "<br>Tanggal Lahir : " + data.hasil['tgllahir'] +
    //                                         "<br>Jenis Kelamin : " + data.hasil['jeniskelamin'] +
    //                                         "<br>Alamat : " + data.hasil['alamat'].toUpperCase() + " " + data.hasil['rtrw'].toUpperCase() + " " + data.hasil['kelurahan'].toUpperCase() + " " + data.hasil['kecamatan'].toUpperCase() + " " + data.hasil['kota'].toUpperCase() + " " + data.hasil['propinsi'].toUpperCase() +
    //                                         "<br><br><b>Apakah Akan Menggunakan Data Ini ?</b></div>",
    //                                     icon: 'question',
    //                                     showCancelButton: true,
    //                                     showDenyButton: true,
    //                                     confirmButtonText: 'Gunakan Data Ini',
    //                                     cancelButtonText: 'Batal',
    //                                     denyButtonText: 'Buat Pasien Baru',
    //                                     customClass: 'swal-wide'
    //                                 }).then((result) => {
    //                                     bersihkan('tab-1');
    //                                     if (result.value) {
    //                                         $("#pasienbaru").hide();
    //                                         $('input:radio[name=flexRadioDefault][id=flexRadioDefault1]').click();
    //                                         document.getElementById("norm").value = norm;
    //                                         document.getElementById("nopesertaparm").value = nopesertaparm;
    //                                         document.getElementById("nopeserta").value = nopeserta;
    //                                         document.getElementById("nosuratrujukan").value = nosrtrujukan;
    //                                         document.getElementById("tgllahir").value = tgllahir;
    //                                         // jika  berhasil simpan maka munculkan cetakan hasil booking, jika gagal booking maka diam di page tersebut.   
    //                                         if (data.hasil['tempatlahir'] === null) {
    //                                             var tmptgllahir = data.hasil['tgllahir'];
    //                                         } else {
    //                                             var tmptgllahir = data.hasil['tempatlahir'] + ', ' + data.hasil['tgllahir'];
    //                                         };

    //                                         if (data.hasil['kodepos'] === null) {
    //                                             var alamat = data.hasil['alamat'] + ' RT/RW ' + data.hasil['rtrw'] + ' KELURAHAN ' + data.hasil['kelurahan'].toUpperCase() +
    //                                                 ' KECAMATAN ' + data.hasil['kecamatan'].toUpperCase() + ' ' + data.hasil['kota'].toUpperCase() + ' ' + data.hasil['propinsi'].toUpperCase();
    //                                         } else {
    //                                             var alamat = data.hasil['alamat'] + ' RT/RW ' + data.hasil['rtrw'] + ' KELURAHAN ' + data.hasil['kelurahan'].toUpperCase() +
    //                                                 ' KECAMATAN ' + data.hasil['kecamatan'].toUpperCase() + ' ' + data.hasil['kota'].toUpperCase() + ' ' + data.hasil['propinsi'].toUpperCase() + ' ' + data.hasil['kodepos'];
    //                                         };
    //                                         if (data.hasil['notelp'] === null) {
    //                                             var notlp = '-';
    //                                         } else {
    //                                             var notlp = data.hasil['notelp'];
    //                                         };

    //                                         var html = '';
    //                                         html = "<table class='table' id ='tabelpaslama'> "
    //                                         html += "<tr style='text-align: center;'> "
    //                                         html += "<th scope='col'>No.RM </th> "
    //                                         html += "<th scope='col'>Nama</th>"
    //                                         html += "<th scope='col'>Tgl. Lahir</th> "
    //                                         html += "<th scope='col'>Jenis Kelamin</th> "
    //                                         html += "<th scope='col'>Alamat</th> "
    //                                         html += "<th scope='col'>No. Telp</th> "
    //                                         html += "</tr>"
    //                                         html += "<tr>"
    //                                         html += "<td>" + data.hasil['nocm'] + "</td>";
    //                                         html += "<td>" + data.hasil['titlepasien'] + ' ' + data.hasil['namapasien'] + "</td>";
    //                                         html += "<td>" + tmptgllahir + "</td>";
    //                                         html += "<td>" + data.hasil['jeniskelamin'] + "</td>";
    //                                         html += "<td>" + alamat + "</td>";
    //                                         html += "<td>" + notlp + "</td>";
    //                                         html += "</tr>"
    //                                         html += "</table>"
    //                                         $('#tabletab').html(html);
    //                                         document.getElementById("normhiddenlama").value = data.hasil['nocm'];
    //                                     } else if (result.value === false) {
    //                                         // jika klik pasien baru
    //                                         $("#pasienbaru").show();
    //                                         $('input:radio[name=flexRadioDefault][id=flexRadioDefault2]').click();
    //                                         document.getElementById("norm").value = norm;
    //                                         document.getElementById("nopesertaparm").value = nopesertaparm;
    //                                         document.getElementById("nopeserta").value = nopeserta;
    //                                         document.getElementById("nosuratrujukan").value = nosrtrujukan;
    //                                         document.getElementById("tgllahir").value = tgllahir;

    //                                         // set pasien baru
    //                                         document.getElementById("namalengkap").value = namapasien;
    //                                         document.getElementById("kelamin").value = kelaminpasien;
    //                                         document.getElementById("tgllahirbaru").value = tgllahirpasien;
    //                                         document.getElementById("noidentitas").value = noidentitaspasien;
    //                                         document.getElementById("notlp").value = notelppasien;

    //                                         HitungUmur(tgllahirpasien);
    //                                         $('#kelamin').change();

    //                                         // $("#norm").attr("disabled", true);
    //                                         // $("#nopeserta").attr("disabled", true);
    //                                         // $("#nosuratrujukan").attr("disabled", true);
    //                                         // $("#tgllahir").attr("disabled", true);
    //                                         // $("#namalengkap").attr("disabled", true);
    //                                         // $("#kelamin").attr("disabled", true);
    //                                         // $("#tgllahirbaru").attr("disabled", true);
    //                                         // $("#noidentitas").attr("disabled", true);
    //                                         // $("#notlp").attr("disabled", true);

    //                                     } else {
    //                                         // jika klik batal
    //                                         // message('info', 'batal', 'Informasi', false);
    //                                         document.getElementById("norm").value = norm;
    //                                         document.getElementById("nopesertaparm").value = nopesertaparm;
    //                                         document.getElementById("nopeserta").value = nopeserta;
    //                                         document.getElementById("nosuratrujukan").value = nosrtrujukan;
    //                                         document.getElementById("tgllahir").value = tgllahir;
    //                                     }
    //                                 })
    //                             }

    //                         },
    //                         error: function() {
    //                             message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
    //                         }
    //                     });
    //                     // }
    //                     // var tmptgllahir = data.hasil['tgllahir'];
    //                 } else {
    //                     message('info', 'Status Peserta : ' + data.hasil['statuspeserta'], 'Informasi', false);
    //                 }
    //             }
    //         },
    //         error: function() {
    //             message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
    //         }
    //     });


    //     // setTimeout(() => {
    //     //     $("#loading").removeClass("overlay");
    //     // }, 100);
    //     // $('#loading').fadeOut();
    // }
    
    function bersihkan(tab) {
        var numtab = '';
        var setvalue = '';
        if (tab == 'tab-1') {
            numtab = '';
            setvalue = '02';
            $('#tabletab').html('');
        } else if (tab == 'tab-2') {
            numtab = '2';
            setvalue = '01';
            $('#tabletab2').html('');
        } else {
            numtab = '3';
            setvalue = '01';
            $('#tabletab3').html('');
        }

        document.getElementById("normhiddenbaru" + numtab).value = "";
        document.getElementById("normhiddenlama" + numtab).value = "";
        document.getElementById("norm" + numtab).value = "";
        document.getElementById("tgllahir" + numtab).value = "<?= date("d-m-Y") ?>";
        document.getElementById("gelar" + numtab).value = "";
        document.getElementById("namalengkap" + numtab).value = "";
        document.getElementById("kelamin" + numtab).value = "";
        document.getElementById("tempatlahir" + numtab).value = "";
        document.getElementById("tgllahirbaru" + numtab).value = "<?= date("d-m-Y") ?>";
        document.getElementById("tahun" + numtab).value = "";
        document.getElementById("bulan" + numtab).value = "";
        document.getElementById("hari" + numtab).value = "";
        document.getElementById("noidentitas" + numtab).value = "";
        document.getElementById("alamat" + numtab).value = "";
        document.getElementById("rt" + numtab).value = "";
        document.getElementById("rw" + numtab).value = "";
        document.getElementById("propinsi" + numtab).value = "";
        document.getElementById("kota" + numtab).value = "";
        document.getElementById("kecamatan" + numtab).value = "";
        document.getElementById("kelurahan" + numtab).value = "";
        document.getElementById("notlp" + numtab).value = "";
        document.getElementById("kodepos" + numtab).value = "";
        document.getElementById("tglregistrasi" + numtab).value = daystarttgl();
        document.getElementById("poli" + numtab).value = "";
        document.getElementById("rujukanasal" + numtab).value = setvalue;
        document.getElementById("email" + numtab).value = "";
        if (tab == 'tab-1') {
            document.getElementById("nopesertaparm" + numtab).value = "";
            document.getElementById("nopeserta" + numtab).value = "";
            document.getElementById("nosuratrujukan" + numtab).value = "";
            $('input:radio[name=flexRadioDefault][id=flexRadioDefault1]').click();
        } else if (tab == 'tab-2') {
            document.getElementById("carabayar" + numtab).value = "";
            document.getElementById("nopeserta" + numtab).value = "";
            $('input:radio[name=flexRadioDefault2][id=flexRadioDefault3]').click();
        } else {
            $('input:radio[name=flexRadioDefault3][id=flexRadioDefault5]').click();
        }
        GetPoli(daystarttgl());

        setSuccessFor(document.getElementById('norm' + numtab));
        setSuccessFor(document.getElementById("gelar" + numtab));
        setSuccessFor(document.getElementById("namalengkap" + numtab));
        setSuccessFor(document.getElementById("kelamin" + numtab));
        setSuccessFor(document.getElementById("tempatlahir" + numtab));
        setSuccessFor(document.getElementById("tahun" + numtab));
        setSuccessFor(document.getElementById("bulan" + numtab));
        setSuccessFor(document.getElementById("hari" + numtab));
        setSuccessFor(document.getElementById("noidentitas" + numtab));
        setSuccessFor(document.getElementById("alamat" + numtab));
        setSuccessFor(document.getElementById("rt" + numtab));
        setSuccessFor(document.getElementById("rw" + numtab));
        setSuccessFor(document.getElementById("propinsi" + numtab));
        setSuccessFor(document.getElementById("kota" + numtab));
        setSuccessFor(document.getElementById("kecamatan" + numtab));
        setSuccessFor(document.getElementById("kelurahan" + numtab));
        setSuccessFor(document.getElementById("notlp" + numtab));
        setSuccessFor(document.getElementById("kodepos" + numtab));
        setSuccessFor(document.getElementById("poli" + numtab));
        setSuccessFor(document.getElementById("rujukanasal" + numtab));
        setSuccessFor(document.getElementById("email" + numtab));
    }

    function HitungUmur(tgllahir) {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        if (idtabs == 'tab-1') {
            numtab = '';
        } else if (idtabs == 'tab-2') {
            numtab = '2';
        } else {
            numtab = '3';
        }
        var kelamin = $('#kelamin' + numtab).val();
        $.ajax({
            url: "regonline/hitung_umur",
            method: "POST",
            data: {
                "tgllahir": tgllahir
            },
            // async: false,
            dataType: 'json',
            success: function(data) {
                document.getElementById("tahun" + numtab).value = data.tahun;
                document.getElementById("bulan" + numtab).value = data.bulan;
                document.getElementById("hari" + numtab).value = data.hari;

                var gelar = SetValueGelar(kelamin, data.tahun, data.bulan, data.hari);
                document.getElementById("gelar" + numtab).value = gelar;

            }
        });



    }

    function hidetab1() {
        $("#headerregonline").hide();
        $("#isiregonline").hide();
        $("#headerdatapasien").hide();
        $("#isidatapasien").hide();
        $("#cardfooter").hide();
        $("#btnkembali").hide();
        $("#btnlanjut").hide();
        $("#carddata").hide();
        $("#sukses").hide();
    }

    function hidetab2() {
        $("#pasienlama").show();
        $("#pasienbaru").hide();
        $("#headerdatapasien2").hide();
        $("#isidatapasien2").hide();
        $("#headerregonline2").hide();
        $("#isiregonline2").hide();
        $("#btnkembali2").hide();
        $("#btnlanjut2").hide();
        $("#carddata2").hide();
        $("#sukses2").hide();
    }

    function hidetab3() {
        $("#pasienlama").show();
        $("#pasienbaru").hide();
        $("#isidatapasien3").hide();
        $("#headerregonline3").hide();
        $("#isiregonline3").hide();
        $("#btnkembali3").hide();
        $("#btnlanjut3").hide();
        $("#carddata3").hide();
        $("#sukses3").hide();
    }

    function checkRadio(value) {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        if (idtabs == 'tab-1') {
            numtab = '';
        } else if (idtabs == 'tab-2') {
            numtab = '2';
        } else {
            numtab = '3';
        }
        if (idtabs == 'tab-1') {
            var norm = document.getElementById('norm');
            if (value == "1") {
                $("#pasienlama").show();
                $("#pasienbaru").hide();
                // $("#btnlanjut").html('<i class="fas fa-search"></i> Cari');
            } else {
                $("#pasienlama").hide();
                $("#pasienbaru").show();
                // $("#btnlanjut").html('<i class="fas fa-arrow-alt-circle-right"></i> Lanjut');
            }
        } else if (idtabs == 'tab-2') {
            var norm = document.getElementById('norm2');
            if (value == "1") {
                $("#pasienlama2").show();
                $("#pasienbaru2").hide();
                // $("#btnlanjut2").html('<i class="fas fa-search"></i> Cari');
            } else {
                $("#pasienlama2").hide();
                $("#pasienbaru2").show();
                // $("#btnlanjut2").html('<i class="fas fa-arrow-alt-circle-right"></i> Lanjut');
            }
        } else {
            var norm = document.getElementById('norm3');
            if (value == "1") {
                $("#pasienlama3").show();
                $("#pasienbaru3").hide();
                // $("#btnlanjut3").html('<i class="fas fa-search"></i> Cari');
            } else {
                $("#pasienlama3").hide();
                $("#pasienbaru3").show();
                // $("#btnlanjut3").html('<i class="fas fa-arrow-alt-circle-right"></i> Lanjut');
            }
        }
        setSuccessFor(norm);

        document.getElementById("norm" + numtab).value = "";
        document.getElementById("tgllahir" + numtab).value = "<?= date("d-m-Y") ?>";
        document.getElementById("gelar" + numtab).value = "";
        document.getElementById("namalengkap" + numtab).value = "";
        document.getElementById("kelamin" + numtab).value = "";
        document.getElementById("tempatlahir" + numtab).value = "";
        document.getElementById("tgllahir" + numtab).value = "<?= date("d-m-Y") ?>";
        document.getElementById("tahun" + numtab).value = "";
        document.getElementById("bulan" + numtab).value = "";
        document.getElementById("hari" + numtab).value = "";
        document.getElementById("noidentitas" + numtab).value = "";
        document.getElementById("alamat" + numtab).value = "";
        document.getElementById("rt" + numtab).value = "";
        document.getElementById("rw" + numtab).value = "";
        document.getElementById("propinsi" + numtab).value = "";
        document.getElementById("kota" + numtab).value = "";
        document.getElementById("kecamatan" + numtab).value = "";
        document.getElementById("kelurahan" + numtab).value = "";
        document.getElementById("notlp" + numtab).value = "";
        document.getElementById("kodepos" + numtab).value = "";
        $('#tabletab').html('');
        $('#tabletab2').html('');
        $('#tabletab3').html('');
    }

    function down_file(source) {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';

        if (idtabs == 'tab-1') {
            numtab = '';
        } else if (idtabs == 'tab-12') {
            numtab = '2';
        } else {
            numtab = '3';
        }

        // source = 1 dari cari regonline, source = 2 dari simpan regonline 
        if (source == '1') {
            var id = $('#email').text();
            var nobooking = $('#kodebooking').text();
            var noreg = $('#noreg').text();
            var norm = $('#norm').text();
            var noantrian = $('#noantrian').text();
            var jenisantrian = $('#jenisantrian').text();
            var estimasidilayani = $('#estimasidilayani').text();
            var politujuan = $('#politujuan').text();
            var doktertujuan = $('#doktertujuan').text();
            var statuspasien = $('#statuspasien').text();
        } else {
            var id = $('#email' + numtab).text();
            var nobooking = $('#kodebookingval' + numtab).text();
            var noreg = $('#nopendaftaranval' + numtab).text();
            var norm = $('#nocmval' + numtab).text();
            var noantrian = $('#nomorantreanval' + numtab).text();
            var jenisantrian = $('#jenisantreanval' + numtab).text();
            var estimasidilayani = $('#estimasidilayanival' + numtab).text();
            var politujuan = $('#namapolival' + numtab).text();
            var doktertujuan = $('#namadokterval' + numtab).text();
            var statuspasien = $('#statuspasienval' + numtab).text();
        }

        var url = "assets/pdf/RSUBANJAR_" + nobooking + ".pdf";
        var name = "RSUBANJAR_" + nobooking + ".pdf";
        var a = $("<a>")
            .attr("href", url)
            .attr("download", name)
            .appendTo("body");

        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah yakin akan mengunduh file dengan Kode Booking " + nobooking + "?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {

                if (source == '1') {
                    var namapasien = $('#namapasien').text();
                    var tgllahirpasien = $('#tgllahirpasien').text();
                    
                    let flatpickrInstance
                    Swal.fire({
                        title: 'Verifikasi Data',
                        html:   '<input class="swal2-input" id="namalengkapvalid" placeholder="Nama Lengkap Pasien">'+'<input class="swal2-input" id="tgllahirvalid" placeholder="Tgl. Lahir Pasien">',
                        stopKeydownPropagation: false,
                        showCancelButton: true,
                        focusConfirm: false,
                        preConfirm: () => {
                            if (flatpickrInstance.selectedDates[0] > new Date()) {
                                Swal.showValidationMessage('Tgl.Lahir tidak boleh lebih bisar dari hari ini')
                            }
    
                            const namalengkap = Swal.getPopup().querySelector('#namalengkapvalid').value
                            const tgllahir = Swal.getPopup().querySelector('#tgllahirvalid').value
                            
                            if (!tgllahir) {
                                Swal.showValidationMessage('Tanggal Lahir Pasien Tidak Boleh Kosong.')
                            }
                            if (!namalengkap) {
                                Swal.showValidationMessage('Nama Pasien Tidak Boleh Kosong.')
                            }
    
                            return {namalengkap: namalengkap, tgllahir: tgllahir }
                            
                        },
                        willOpen: () => {
                            flatpickrInstance = flatpickr(
                            Swal.getPopup().querySelector('#tgllahirvalid')
                            )
                        }
                    }).then((result) => {
                        if (namapasien.toUpperCase().trim() == result.value.namalengkap.toUpperCase().trim() && tgllahirpasien == result.value.tgllahir){
                            // jika  berhasil simpan maka munculkan cetakan hasil booking, jika gagal booking maka diam di page tersebut.   
                            LoadingPopup('Mohon Tunggu', 'Sedang Mengunduh Data.....');
    
                            $.ajax({
                                url: "cariregonline/Cetak",
                                method: "POST",
                                data: {
                                    "email": id,
                                    "kodebookingval": nobooking,
                                    "nopendaftaranval": noreg,
                                    "nocmval": norm,
                                    "nomorantreanval": noantrian,
                                    "jenisantreanval": jenisantrian,
                                    "estimasidilayanival": estimasidilayani,
                                    "namapolival": politujuan,
                                    "namadokterval": doktertujuan,
                                    "statuspasienval": statuspasien,
                                    "idcetak": '2'
                                },
                                dataType: 'json',
                                success: function(data) {
                                    swal.close();
                                    if (data.hasil['code'] != '200') {
                                        message('info', data.hasil['message'], 'Informasi', false);
                                    } else {
                                        a[0].click();
                                        a.remove();
    
                                        $.ajax({
                                            url: "cariregonline/RemoveFile",
                                            method: "POST",
                                            data: {
                                                "kodebooking": nobooking
                                            },
                                            dataType: 'json',
                                            success: function(data) {
                                                swal.close();
                                                if (data.hasil['code'] != '200') {
                                                    message('info', data.hasil['message'], 'Informasi', false);
                                                }
    
                                            },
                                            error: function() {
                                                swal.close();
                                                message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                                            }
                                        });
            
                                        // unlink('assets/pdf/' . $nobooking . '.pdf');
    
                                        // setInterval(unlink('assets/img/qrcode/' + nobooking + '.png'), 100);
                                        // setInterval(unlink('assets/pdf/' + nobooking) + '.pdf', 100);
    
    
                                        // message('success', data.hasil['message'], 'Informasi', false);
                                    }
    
                                },
                                error: function() {
                                    swal.close();
                                    message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                                }
                            });
                        }else {
                            message('warning', 'Verifikasi Data Gagal Karena Data Pasien Tidak Sesuai.', 'Informasi', false);
                        }
                    })
                }else {
                    LoadingPopup('Mohon Tunggu', 'Sedang Mengunduh Data.....');
                    $.ajax({
                        url: "cariregonline/Cetak",
                        method: "POST",
                        data: {
                            "email": id,
                            "kodebookingval": nobooking,
                            "nopendaftaranval": noreg,
                            "nocmval": norm,
                            "nomorantreanval": noantrian,
                            "jenisantreanval": jenisantrian,
                            "estimasidilayanival": estimasidilayani,
                            "namapolival": politujuan,
                            "namadokterval": doktertujuan,
                            "statuspasienval": statuspasien,
                            "idcetak": '2'
                        },
                        dataType: 'json',
                        success: function(data) {
                            swal.close();
                            if (data.hasil['code'] != '200') {
                                message('info', data.hasil['message'], 'Informasi', false);
                            } else {
                                a[0].click();
                                a.remove();

                                $.ajax({
                                    url: "cariregonline/RemoveFile",
                                    method: "POST",
                                    data: {
                                        "kodebooking": nobooking
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        swal.close();
                                        if (data.hasil['code'] != '200') {
                                            message('info', data.hasil['message'], 'Informasi', false);
                                        }

                                    },
                                    error: function() {
                                        swal.close();
                                        message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                                    }
                                });
    
                                // unlink('assets/pdf/' . $nobooking . '.pdf');

                                // setInterval(unlink('assets/img/qrcode/' + nobooking + '.png'), 100);
                                // setInterval(unlink('assets/pdf/' + nobooking) + '.pdf', 100);


                                // message('success', data.hasil['message'], 'Informasi', false);
                            }

                        },
                        error: function() {
                            swal.close();
                            message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                        }
                    });
                }
            } else {
                // jika klik batal
            }
        })

    }

    function caripasienbooking() {
        var nopendaftaran = $("[name='nopendaftaran']").val();
        var kriteria = $("input[name='radiokriteria']:checked").val();
        var text = '';
        if (kriteria == '0') {
            text = "No. Booking Tidak Boleh Kosong";
        } else if (kriteria == '1') {
            text = "No. Pendaftaran Tidak Boleh Kosong";
        } else {
            text = "NIK / No. Rekam Medik Tidak Boleh Kosong";
        }

        if (nopendaftaran == null || nopendaftaran == '') {
            var nopendaftaran = document.getElementById('nopendaftaran');
            var nopendaftaranValue = nopendaftaran.value.trim();
            if (nopendaftaranValue === '') {
                setErrorFor(nopendaftaran, text);
                return;
            } else {
                setSuccessFor(nopendaftaran);
            }
        } else {
            setSuccessFor(document.getElementById('nopendaftaran'));
            var kriteriacari = $('input[name="radiokriteria"]:checked').val();
            var tglperiksa = $('#tglperiksacari').val();

            $("#loading").addClass("overlay");
            $('#loading').fadeIn();
            $.ajax({
                url: "cariregonline/GetBookingPasien",
                method: "POST",
                data: {
                    "nopendaftaran": nopendaftaran,
                    "kriteria": kriteriacari,
                    "tglperiksa": tglperiksa
                },
                // async: false,
                dataType: 'json',
                success: function(data) {
                    if (data.codedata['code'] != '200') {
                        message('info', data.codedata['message'], 'Informasi', false);
                        $('#kodebooking').text('-');
                        $('#noreg').text('-');
                        $('#norm').text('-');
                        $('#noantrian').text('-');
                        $('#jenisantrian').text('-');
                        $('#estimasidilayani').text('-');
                        $('#politujuan').text('-');
                        $('#doktertujuan').text('-');
                        $('#statuspasien').text('-');
                        $('#email').text('-');
                        $('#namapasien').text('-');
                        $('#tgllahirpasien').text('-');
                        $("#btnhapus").attr("disabled", true);
                        $("#btncetak").attr("disabled", true);
                        $("#btnunduh").attr("disabled", true);
                        // document.getElementById("kdbookingsubmit").value = '';
                        setTimeout(() => {
                            $("#loading").removeClass("overlay");
                        }, 100);
                        $('#loading').fadeOut();
                    } else {
                        $('#kodebooking').text(data.hasil['kodebooking']);
                        $('#noreg').text(data.hasil['nopendaftaran']);
                        $('#norm').text(data.hasil['nocm']);
                        $('#noantrian').text(data.hasil['nomorantrean']);
                        $('#jenisantrian').text(data.hasil['jenisantrean']);
                        $('#estimasidilayani').text(data.hasil['estimasidilayani']);
                        $('#politujuan').text(data.hasil['namapoli']);
                        $('#doktertujuan').text(data.hasil['namadokter']);
                        $('#statuspasien').text(data.hasil['statuspasien']);
                        $('#email').text(data.hasil['email']);
                        $('#namapasien').text(data.hasil['namapasien']);
                        $('#tgllahirpasien').text(data.hasil['tgllahir']);

                        $("#btnhapus").attr("disabled", false);
                        $("#btncetak").attr("disabled", false);
                        $("#btnunduh").attr("disabled", false);
                        setTimeout(() => {
                            $("#loading").removeClass("overlay");
                        }, 100);
                        $('#loading').fadeOut();
                    }

                },
                error: function() {
                    message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                    $('#kodebooking').text('-');
                    $('#noreg').text('-');
                    $('#norm').text('-');
                    $('#noantrian').text('-');
                    $('#jenisantrian').text('-');
                    $('#estimasidilayani').text('-');
                    $('#politujuan').text('-');
                    $('#doktertujuan').text('-');
                    $('#statuspasien').text('-');
                    $('#email').text('-');
                    $('#namapasien').text('-');
                    $('#tgllahirpasien').text('-');

                    $("#btnhapus").attr("disabled", true);
                    $("#btncetak").attr("disabled", true);
                    $("#btnunduh").attr("disabled", true);
                    setTimeout(() => {
                        $("#loading").removeClass("overlay");
                    }, 100);
                    $('#loading').fadeOut();
                }
            });

        }


    }

    function prosesLanjutcarabayar() {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        var nametab = '';
        if (idtabs == 'tab-1') {
            numtab = '';
            nametab = 'Data Kepesertan & Data Pasien';
        } else if (idtabs == 'tab-2') {
            numtab = '2';
            nametab = 'Data Pasien';
        } else {
            numtab = '3';
            nametab = 'Data Pasien';
        }

        var statuspasien = $("input[name='flexRadioDefault" + numtab + "']:checked").val();
        if (statuspasien == '1') {
            $("#pasienlama" + numtab).show();
            $("#pasienbaru" + numtab).hide();
            $("#headerdatapasien" + numtab).show();
            $("#isidatapasien" + numtab).show();
            $("#headerregonline" + numtab).hide();
            $("#isiregonline" + numtab).hide();
            $("#btnkembali" + numtab).show();
            $("#btnlanjut" + numtab).show();
            $("#carddata" + numtab).show();
        } else {
            $("#headerdatapasien" + numtab).show();
            $("#isidatapasien" + numtab).show();
            $("#headerregonline" + numtab).hide();
            $("#isiregonline" + numtab).hide();
            $("#pasienbaru" + numtab).show();
            $("#carddata" + numtab).show();
            $("#pasienlama" + numtab).hide();
            $("#btnkembali" + numtab).show();
            $("#btnlanjut" + numtab).show();
        }
        $("#btnkembali").show();
        $("#btnlanjut").show();
        document.getElementById("nilai" + numtab).value = "1";
        var norm = document.getElementById("norm" + numtab);
        setSuccessFor(norm);


        $("#carabayar").hide();
        $("#btncarabayar").hide();
        $("#btnlanjutcarabayar").hide();

        var html = '';
        html = "<li class='breadcrumb-item'><a href='#' onclick='StepCarabayar();'>Cara Bayar</a></li>";
        html += "<li class='breadcrumb-item active' aria-current='page'>" + nametab + "</a></li>";
        $('#stepprogress').html(html);

        $("#tabcarabayar").attr("hidden", false);
    }

    function StepCarabayar() {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        if (idtabs == 'tab-1') {
            numtab = '';
        } else if (idtabs == 'tab-2') {
            numtab = '2';
        } else {
            numtab = '3';
        }

        var norm = document.getElementById("norm" + numtab);

        Swal.fire({
            title: 'Konfirmasi',
            text: "Jika kembali data yang telah dimasukan akan hilang, Apakah anda yakin?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                // $("#pasienlama" + numtab).hide();
                // $("#btnlanjutcarabayar").show();
                // $("#carabayar").show();
                // $("#headerregonline" + numtab).hide();
                // $("#isiregonline" + numtab).hide();
                // $("#headerdatapasien" + numtab).hide();
                // $("#isidatapasien" + numtab).hide();
                // $("#cardfooter" + numtab).hide();
                // $("#btnkembali" + numtab).hide();
                // $("#btnlanjut" + numtab).hide();
                // $("#carddata" + numtab).hide();
                // bersihkan(idtabs);

                // var html = '';
                // html = '<li class="breadcrumb-item active" aria-current="page">Cara Bayar</a></li>';
                // $('#stepprogress').html(html);
                prosesHome();
            }
            document.getElementById("nilai" + numtab).value = '1';
        })

        $("#btnlanjut" + numtab).html('<i class="fas fa-arrow-alt-circle-right"></i> Lanjut');

        setSuccessFor(norm);

    }

    function StepDataPasien() {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        var nametab = '';
        if (idtabs == 'tab-1') {
            numtab = '';
            nametab = 'Data Kepesertaan & Data Pasien';
        } else if (idtabs == 'tab-2') {
            numtab = '2';
            nametab = 'Data Pasien';
        } else {
            numtab = '3';
            nametab = 'Data Pasien';
        }

        var nilai = $("[name='nilai" + numtab + "']").val();
        var statuspasien = $("input[name='flexRadioDefault" + numtab + "']:checked").val();
        var norm = document.getElementById("norm" + numtab);

        if (statuspasien == '1') {
            $("#pasienlama" + numtab).show();
            $("#pasienbaru" + numtab).hide();
            $("#headerdatapasien" + numtab).show();
            $("#isidatapasien" + numtab).show();
            $("#headerregonline" + numtab).hide();
            $("#isiregonline" + numtab).hide();
            $("#btnkembali" + numtab).show();
            $("#btnlanjut" + numtab).show();
            $("#carabayar").hide();
            $("#btncarabayar").hide();
            $("#btnlanjutcarabayar").hide();
            $("#carddata" + numtab).show();
        } else {
            $("#headerdatapasien" + numtab).show();
            $("#isidatapasien" + numtab).show();
            $("#headerregonline" + numtab).hide();
            $("#isiregonline" + numtab).hide();
            $("#pasienbaru" + numtab).show();
        }
        $("#btnkembali" + numtab).show();
        $("#btnlanjut" + numtab).show();
        document.getElementById("nilai" + numtab).value = '1';

        var html = '';
        html = "<li class='breadcrumb-item'><a href='#' onclick='StepCarabayar();'>Cara Bayar</a></li>";
        html += "<li class='breadcrumb-item active' aria-current='page'><a href='#' onclick='StepDataPasien();'>" + nametab + "</a></li>";
        $('#stepprogress').html(html);

        $("#btnlanjut" + numtab).html('<i class="fas fa-arrow-alt-circle-right"></i> Lanjut');
    }

    function StepSelesai() {
        message('info', 'Langkah tidak dapat dikembalikan lagi, silahkan kembali ke Beranda.', 'Peringatan', false);
        return;
    }

    function prosesKembali() {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        if (idtabs == 'tab-1') {
            numtab = '';
        } else if (idtabs == 'tab-2') {
            numtab = '2';
        } else {
            numtab = '3';
        }

        var nilai = $("[name='nilai" + numtab + "']").val();
        var statuspasien = $("input[name='flexRadioDefault" + numtab + "']:checked").val();
        var norm = document.getElementById("norm" + numtab);

        if (nilai == '1') {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Jika kembali data yang telah dimasukan akan hilang, Apakah anda yakin?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    // $("#pasienlama" + numtab).hide();
                    // $("#btnlanjutcarabayar").show();
                    // $("#carabayar").show();
                    // $("#headerregonline" + numtab).hide();
                    // $("#isiregonline" + numtab).hide();
                    // $("#headerdatapasien" + numtab).hide();
                    // $("#isidatapasien" + numtab).hide();
                    // $("#cardfooter" + numtab).hide();
                    // $("#btnkembali" + numtab).hide();
                    // $("#btnlanjut" + numtab).hide();
                    // $("#carddata" + numtab).hide();
                    // bersihkan(idtabs);
                    // document.getElementById("nilai" + numtab).value = Number(nilai) - 1;

                    // var html = '';
                    // html = '<li class="breadcrumb-item active" aria-current="page">Cara Bayar</a></li>';
                    // $('#stepprogress').html(html);
                    prosesHome();
                } else {
                    document.getElementById("nilai" + numtab).value = '1';
                }
            })

        } else {
            if (statuspasien == '1') {
                $("#pasienlama" + numtab).show();
                $("#pasienbaru" + numtab).hide();
                $("#headerdatapasien" + numtab).show();
                $("#isidatapasien" + numtab).show();
                $("#headerregonline" + numtab).hide();
                $("#isiregonline" + numtab).hide();
                $("#btnkembali" + numtab).show();
                $("#btnlanjut" + numtab).show();
                $("#carabayar").hide();
                $("#btncarabayar").hide();
                $("#btnlanjutcarabayar").hide();
                $("#carddata" + numtab).show();
            } else {
                $("#headerdatapasien" + numtab).show();
                $("#isidatapasien" + numtab).show();
                $("#headerregonline" + numtab).hide();
                $("#isiregonline" + numtab).hide();
                $("#pasienbaru" + numtab).show();
            }
            $("#btnkembali" + numtab).show();
            $("#btnlanjut" + numtab).show();
            document.getElementById("nilai" + numtab).value = Number(nilai) - 1;

            var html = '';
            html = "<li class='breadcrumb-item'><a href='#' onclick='StepCarabayar();'>Cara Bayar</a></li>";
            html += "<li class='breadcrumb-item active' aria-current='page'><a href='#' onclick='StepDataPasien();'>Data Pasien</a></li>";
            $('#stepprogress').html(html);
        }

        if (Number(nilai) - 1 <= '2') {
            $("#btnlanjut" + numtab).html('<i class="fas fa-arrow-alt-circle-right"></i> Lanjut');
        } else {
            $("#btnlanjut" + numtab).html('<i class="fas fa-save"></i> Simpan');
        }

        setSuccessFor(norm);

    }

    function prosesCari() {
        var idtabs = $(".tab-pane.active").attr("id");
        if (idtabs == 'tab-1') {
            var statuspasien = $('input[name="flexRadioDefault"]:checked').val();
            var nilai = $("[name='nilai']").val();
        } else if (idtabs == 'tab-2') {
            var statuspasien = $('input[name="flexRadioDefault2"]:checked').val();
            var nilai = $("[name='nilai2']").val();
        } else {
            var statuspasien = $('input[name="flexRadioDefault3"]:checked').val();
            var nilai = $("[name='nilai3']").val();
        }


        if (validasi(statuspasien, nilai) == false) {
            return
        }

        if (idtabs == 'tab-1') {
            if (AmbilDataPasienBPJS() != '200') {
                return
            }
        } else {
            if (GetPasienLama() != '200') {
                return
            }
        }


    }

    function HapusBooking() {
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah anda yakin akan membatalkan pendaftaran?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                var nobooking = $('#kodebooking').text();
                var namapasien = $('#namapasien').text();
                var tgllahirpasien = $('#tgllahirpasien').text();
                
                let flatpickrInstance
                Swal.fire({
                    title: 'Verifikasi Data',
                    html:   '<input class="swal2-input" id="namalengkapvalid" placeholder="Nama Lengkap Pasien">'+'<input class="swal2-input" id="tgllahirvalid" placeholder="Tgl. Lahir Pasien">',
                    stopKeydownPropagation: false,
                    showCancelButton: true,
                    focusConfirm: false,
                    preConfirm: () => {
                        if (flatpickrInstance.selectedDates[0] > new Date()) {
                            Swal.showValidationMessage('Tgl.Lahir tidak boleh lebih bisar dari hari ini')
                        }

                        const namalengkap = Swal.getPopup().querySelector('#namalengkapvalid').value
                        const tgllahir = Swal.getPopup().querySelector('#tgllahirvalid').value
                        
                        if (!tgllahir) {
                            Swal.showValidationMessage('Tanggal Lahir Pasien Tidak Boleh Kosong.')
                        }
                        if (!namalengkap) {
                            Swal.showValidationMessage('Nama Pasien Tidak Boleh Kosong.')
                        }

                        return {namalengkap: namalengkap, tgllahir: tgllahir }
                        
                    },
                    willOpen: () => {
                        flatpickrInstance = flatpickr(
                        Swal.getPopup().querySelector('#tgllahirvalid')
                        )
                    }
                }).then((result) => {
                    if (namapasien.toUpperCase().trim() == result.value.namalengkap.toUpperCase().trim() && tgllahirpasien == result.value.tgllahir){
                        LoadingPopup('Mohon Tunggu', 'Sedang Menghapus Data.....');
                        $.ajax({
                            url: "cariregonline/HapusBooking",
                            method: "POST",
                            data: {
                                "nobooking": nobooking
                            },
                            // async: false,
                            dataType: 'json',
                            success: function(data) {
                                if (data.codedata['code'] != '200') {
                                    swal.close();
                                    message('info', data.codedata['message'], 'Informasi', false);
                                } else {
                                    swal.close();
                                    message('success', data.hasil, 'Informasi', false);

                                    $('#kodebooking').text('-');
                                    $('#noreg').text('-');
                                    $('#norm').text('-');
                                    $('#noantrian').text('-');
                                    $('#jenisantrian').text('-');
                                    $('#estimasidilayani').text('-');
                                    $('#politujuan').text('-');
                                    $('#doktertujuan').text('-');
                                    $('#statuspasien').text('-');
                                    $("#btnhapus").attr("disabled", true);
                                    $("#btncetak").attr("disabled", true);
                                    $("#btnunduh").attr("disabled", true);

                                    document.getElementById("nopendaftaran").value = "";
                                }

                            },
                            error: function() {
                                swal.close();
                                message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                            }
                        });
                    }else {
                        message('warning', 'Verifikasi Data Gagal Karena Data Pasien Tidak Sesuai.', 'Informasi', false);
                    }
                })
            } else {
                // document.getElementById("nilai").value = Number(hasilnum) - 1;
            }
        })
    }

    function LoadingPopup(titlevar, htmlvar) {
        let timerInterval
        Swal.fire({
            title: titlevar,
            html: htmlvar,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        })
    }

    function gantiemail(email) {
        var a = email.split("@");
        var b = a[0];
        var newstr = "";
        for (var i in b) {
            if (i > 2 && i < b.length - 1) newstr += "*";
            else newstr += b[i];
        }

        return newstr + "@" + a[1];
    }

    async function CetakBooking(status) {
        // var id = `${email}`;
        var id = $('#email').text();
        var nobooking = $('#kodebooking').text();
        var noreg = $('#noreg').text();
        var norm = $('#norm').text();
        var noantrian = $('#noantrian').text();
        var jenisantrian = $('#jenisantrian').text();
        var estimasidilayani = $('#estimasidilayani').text();
        var politujuan = $('#politujuan').text();
        var doktertujuan = $('#doktertujuan').text();
        var statuspasien = $('#statuspasien').text();

        if (id == '' || id == null) {
            message('info', 'Alamat Email tidak Ditemukan.', 'Informasi', false);
        } else {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah yakin dikirim ke alamat email " + gantiemail(id) + " ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    var email = $('#email').text();
                    
                    let flatpickrInstance
                    Swal.fire({
                        title: 'Verifikasi Data',
                        html:   '<input class="swal2-input" id="emailvalid" placeholder="Email">',
                        stopKeydownPropagation: false,
                        showCancelButton: true,
                        focusConfirm: false,
                        preConfirm: () => {
                            const email = Swal.getPopup().querySelector('#emailvalid').value
                            
                            if (!email) {
                                Swal.showValidationMessage('Email Tidak Boleh Kosong.')
                            }
    
                            return {email: email}
                            
                        }
                    }).then((result) => {
                        if (email.toUpperCase().trim() == result.value.email.toUpperCase().trim()){
                            // jika  berhasil simpan maka munculkan cetakan hasil booking, jika gagal booking maka diam di page tersebut.   
                            LoadingPopup('Mohon Tunggu', 'Sedang Mengirim Data.....');

                            $.ajax({
                                url: "cariregonline/Cetak",
                                method: "POST",
                                data: {
                                    "email": id,
                                    "kodebookingval": nobooking,
                                    "nopendaftaranval": noreg,
                                    "nocmval": norm,
                                    "nomorantreanval": noantrian,
                                    "jenisantreanval": jenisantrian,
                                    "estimasidilayanival": estimasidilayani,
                                    "namapolival": politujuan,
                                    "namadokterval": doktertujuan,
                                    "statuspasienval": statuspasien,
                                    "idcetak": '1'
                                },
                                dataType: 'json',
                                success: function(data) {
                                    swal.close();
                                    if (data.hasil['code'] != '200') {
                                        message('info', data.hasil['message'], 'Informasi', false);
                                    } else {
                                        message('success', data.hasil['message'], 'Informasi', false);
                                    }

                                },
                                error: function() {
                                    swal.close();
                                    message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                                }
                            });
                        }else {
                            message('warning', 'Verifikasi Data Gagal Karena Data Pasien Tidak Sesuai.', 'Informasi', false);
                        }
                    })

                } else {
                    // jika klik batal
                }
            })
        }

        // const {
        //     value: email
        // } = await Swal.fire({
        //     title: 'Kirim Ulang Bukti Pendaftaran Online',
        //     input: 'email',
        //     inputLabel: 'Masukan Alamat Email Anda',
        //     inputPlaceholder: 'Email'
        // })
        // if (email) {
        // LoadingPopup('Mohon Tunggu', 'Sedang Mengirim Data.....');


        // }

    }

    function prosesLanjut() {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        if (idtabs == 'tab-1') {
            numtab = '';
        } else if (idtabs == 'tab-2') {
            numtab = '2';
        } else {
            numtab = '3';
        }

        var statuspasien = $("input[name='flexRadioDefault" + numtab + "']:checked").val();
        var nilai = $("[name='nilai" + numtab + "']").val();
        var hasilnum = Number(nilai) + 1;
        if (nilai > '2') {
            hasilnum = '2';
        } else {
            hasilnum = Number(nilai) + 1;
        }

        if (validasi(statuspasien, nilai) == false) {
            return
        }

        //cek proses pencarian pasien lama ada tidak,jika tidak ada maka munculkan validasi
        if (nilai == '1' && statuspasien == '1') {
            if (numtab != '' || numtab != null) {
                if (document.getElementById("tabelpaslama" + numtab) == null) {
                    message('info', 'Silahkan lakukan pencarian pasien terlebih dahulu.', 'Peringatan', false);
                    setTimeout(() => {
                        $("#loading").removeClass("overlay");
                    }, 100);
                    $('#loading').fadeOut();
                    return
                }
            }
        }

        if (hasilnum == '1') {
            $("#btnlanjut" + numtab).html('<i class="fas fa-arrow-alt-circle-right"></i> Lanjut');
        } else {
            $("#btnlanjut" + numtab).html('<i class="fas fa-save"></i> Simpan');
        }

        // jika simpan terakhir
        if (hasilnum == '3') {
            SimpanRegistrasi()

        } else {
            document.getElementById("nilai" + numtab).value = hasilnum;

            var html = '';
            html = "<li class='breadcrumb-item'><a href='#' onclick='StepCarabayar();'>Cara Bayar</a></li>";
            html += "<li class='breadcrumb-item'><a href='#' onclick='StepDataPasien();'>Data Pasien</a></li>";
            html += "<li class='breadcrumb-item active' aria-current='page'>Data Pendaftaran</a></li>";
            $('#stepprogress').html(html);
        }

        $("#headerdatapasien" + numtab).hide();
        $("#isidatapasien" + numtab).hide();
        $("#headerregonline" + numtab).show();
        $("#isiregonline" + numtab).show();
        $("#btnkembali" + numtab).show();

    }

    function validasi(statuspasien, nilai) {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        if (idtabs == 'tab-1') {
            numtab = '';
        } else if (idtabs == 'tab-2') {
            numtab = '2';
        } else {
            numtab = '3';
        }

        if (nilai == '1') {

            // jika carabayar bpjs
            if ((numtab == '' || numtab == null) && statuspasien == '1') {
                var norm = document.getElementById('norm');
                var normValue = norm.value.trim();
                if (normValue === '') {
                    setErrorFor(norm, 'No.RM / NIK Tidak Boleh Kosong');
                    return false;
                } else {
                    setSuccessFor(norm);
                }
                var nopeserta = document.getElementById('nopesertaparm');
                var nopesertaValue = nopeserta.value.trim();
                if (nopesertaValue === '') {
                    setErrorFor(nopeserta, 'No. Peserta Tidak Boleh Kosong');
                    return false;
                } else {
                    setSuccessFor(nopeserta);
                }

                // var nosuratrujukan = document.getElementById('nosuratrujukan');
                // var nosuratrujukanValue = nosuratrujukan.value.trim();
                // if (nosuratrujukanValue === '') {
                //     setErrorFor(nosuratrujukan, 'No. Surat Rujukan Tidak Boleh Kosong');
                //     return false;
                // } else {
                //     setSuccessFor(nosuratrujukan);
                // }
            } else {
                if (statuspasien == '1') { //jika pasien lama
                    var norm = document.getElementById('norm' + numtab);
                    var normValue = norm.value.trim();
                    if (normValue === '') {
                        setErrorFor(norm, 'No.RM / NIK Tidak Boleh Kosong');
                        return false;
                    } else {
                        setSuccessFor(norm);
                    }
                    var tgllahir = document.getElementById('tgllahir' + numtab);
                    var tgllahirValue = tgllahir.value.trim();
                    if (tgllahirValue === '') {
                        setErrorFor(tgllahir, 'Tgl. Lahir Tidak Boleh Kosong');
                        return false;
                    } else {
                        setSuccessFor(tgllahir);
                    }

                } else { //jika pasien baru
                    var gelar = document.getElementById('gelar' + numtab);
                    var gelarValue = gelar.value.trim();
                    if (gelarValue === '') {
                        setErrorFor(gelar, 'Nama Depan Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(gelar);
                    }
                    var namalengkap = document.getElementById('namalengkap' + numtab);
                    var namalengkap = document.getElementById('namalengkap' + numtab);
                    var namalengkapValue = namalengkap.value.trim();
                    if (namalengkapValue === '') {
                        setErrorFor(namalengkap, 'Nama Lengkap Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(namalengkap);
                    }
                    var kelamin = document.getElementById('kelamin' + numtab);
                    var kelaminValue = kelamin.value.trim();
                    if (kelaminValue === '') {
                        setErrorFor(kelamin, 'Jenis Kelamin Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(kelamin);
                    }
                    var tempatlahir = document.getElementById('tempatlahir' + numtab);
                    var tempatlahirValue = tempatlahir.value.trim();
                    if (tempatlahirValue === '') {
                        setErrorFor(tempatlahir, 'Tempat Lahir Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(tempatlahir);
                    }
                    var noidentitas = document.getElementById('noidentitas' + numtab);
                    var noidentitasValue = noidentitas.value.trim();
                    if (noidentitasValue === '') {
                        setErrorFor(noidentitas, 'No. Identitas Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(noidentitas);
                    }
                    var alamat = document.getElementById('alamat' + numtab);
                    var alamatValue = alamat.value.trim();
                    if (alamatValue === '') {
                        setErrorFor(alamat, 'Alamat Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(alamat);
                    }
                    var rt = document.getElementById('rt' + numtab);
                    var rtValue = rt.value.trim();
                    if (rtValue === '') {
                        setErrorFor(rt, 'Harus Diisi.');
                        return false;
                    } else {
                        setSuccessFor(rt);
                    }
                    var rw = document.getElementById('rw' + numtab);
                    var rwValue = rw.value.trim();
                    if (rwValue === '') {
                        setErrorFor(rw, 'Harus Diisi.');
                        return false;
                    } else {
                        setSuccessFor(rw);
                    }
                    var propinsi = document.getElementById('propinsi' + numtab);
                    var propinsiValue = propinsi.value.trim();
                    if (propinsiValue === '') {
                        setErrorFor(propinsi, 'Propinsi Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(propinsi);
                    }
                    var kota = document.getElementById('kota' + numtab);
                    var kotaValue = kota.value.trim();
                    if (kotaValue === '') {
                        setErrorFor(kota, 'Kota Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(kota);
                    }
                    var kecamatan = document.getElementById('kecamatan' + numtab);
                    var kecamatanValue = kecamatan.value.trim();
                    if (kecamatanValue === '') {
                        setErrorFor(kecamatan, 'Kecamatan Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(kecamatan);
                    }
                    var kelurahan = document.getElementById('kelurahan' + numtab);
                    var kelurahanValue = kelurahan.value.trim();
                    if (kelurahanValue === '') {
                        setErrorFor(kelurahan, 'Kelurahan Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(kelurahan);
                    }
                    var notlp = document.getElementById('notlp' + numtab);
                    var notlpValue = notlp.value.trim();
                    if (notlpValue === '') {
                        setErrorFor(notlp, 'No. Telp Tidak Boleh Kosong.');
                        return false;
                    } else {
                        setSuccessFor(notlp);
                    }

                }
            }

        } else {
            // var tujuanpemeriksaan = document.getElementById('radiotjnpemeriksaan1');
            // var tujuanpemeriksaanValue = ($("input[id='radiotjnpemeriksaan1']:checked").val());
            // if (tujuanpemeriksaanValue == null) {
            // message('warning', 'Tujuan Pemeriksaan Harus Dipilih', 'Peringatan', false);
            // var formGroup = input.parentElement;
            // var small = formGroup.querySelector('small');
            // formGroup.className = 'form-group error';
            // small.innerText = 'Tujuan Pemeriksaan Harus Dipilih';

            // setErrorFor(tujuanpemeriksaan, 'Tujuan Pemeriksaan Harus Dipilih');
            //     return false;
            // } else {
            // setSuccessFor(tujuanpemeriksaan);
            // }
            if (idtabs == 'tab-2') {
                var carabayar = document.getElementById('carabayar' + numtab);
                var carabayarValue = carabayar.value.trim();
                if (carabayarValue === '') {
                    setErrorFor(carabayar, 'Cara Bayar Harus Dipilih.');
                    return false;
                } else {
                    setSuccessFor(carabayar);
                }
            }
            var poli = document.getElementById('poli' + numtab);
            var poliValue = poli.value.trim();
            if (poliValue === '') {
                setErrorFor(poli, 'Poli Harus Dipilih');
                return false;
            } else {
                setSuccessFor(poli);
            }
            var rujukanasal = document.getElementById('rujukanasal' + numtab);
            var rujukanasalValue = rujukanasal.value.trim();
            if (rujukanasalValue === '') {
                setErrorFor(rujukanasal, 'Rujukan Asal Harus Dipilih');
                return false;
            } else {
                setSuccessFor(rujukanasal);
            }

            var email = document.getElementById('email' + numtab);
            var emailValue = email.value.trim();
            if (emailValue === '') {
                setErrorFor(email, 'Email Tidak Boleh Kosong');
                return false;
            } else {
                setSuccessFor(email);
            }
            // var jeniskunjungan = document.getElementById('jeniskunjungan' + numtab);
            // var jeniskunjunganValue = jeniskunjungan.value.trim();
            // if (jeniskunjunganValue === '') {
            //     setErrorFor(jeniskunjungan, 'Jenis Kunjungan Harus Dipilih.');
            //     return false;
            // } else {
            //     setSuccessFor(jeniskunjungan);
            // }
            // var jenispermintaan = document.getElementById('jenispermintaan' + numtab);
            // var jenispermintaanValue = jenispermintaan.value.trim();
            // if (jenispermintaanValue === '') {
            //     setErrorFor(jenispermintaan, 'Jenis Permintaan Harus Dipilih.');
            //     return false;
            // } else {
            //     setSuccessFor(jenispermintaan);
            // }
            // var jenispoli = document.getElementById('jenispoli' + numtab);
            // var jenispoliValue = jenispoli.value.trim();
            // if (jenispoliValue === '') {
            //     setErrorFor(jenispoli, 'Jenis Poli Harus Dipilih.');
            //     return false;
            // } else {
            //     setSuccessFor(jenispoli);
            // }
        }
    }

    function setErrorFor(input, message) {
        var formGroup = input.parentElement;
        var small = formGroup.querySelector('small');
        formGroup.className = 'form-group error';
        small.innerText = message;
    }

    function setSuccessFor(input) {
        var formGroup = input.parentElement;
        formGroup.className = 'form-group success';
    }

    function getpropinsi() {
        $.ajax({
            url: "regonline/GetPropinsi",
            method: "POST",
            // async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html += "<option value=''>-PILIH-</option>";
                for (i = 0; i < data.length; i++) {
                    html += "<option value = '" + data[i].KdPropinsi + "'>" + data[i].NamaPropinsi + "</option>";
                }
                $('#propinsi').html(html);
                $('#propinsi2').html(html);
                $('#propinsi3').html(html);

            },
            error: function() {
                var html = '';
                html += "<option value=''>-PILIH-</option>";
                $('#propinsi').html(html);
                $('#propinsi2').html(html);
                $('#propinsi3').html(html);

                return false;
            }
        });
    }

    function GetKota() {
        var idtabs = $(".tab-pane.active").attr("id");
        var tabelkota = '';
        var id = '';
        if (idtabs == 'tab-1') {
            id = $('#propinsi').val();
            tabelkota = $('#kota');
        } else if (idtabs == 'tab-2') {
            id = $('#propinsi2').val();
            tabelkota = $('#kota2');
        } else {
            id = $('#propinsi3').val();
            tabelkota = $('#kota3');
        }

        $.ajax({
            url: "regonline/GetKota",
            method: "POST",
            data: {
                "propinsi": id
            },
            // async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html += "<option value=''>-PILIH-</option>";
                for (i = 0; i < data.length; i++) {
                    html += "<option value = '" + data[i].KdKotaKabupaten + "'>" + data[i].NamaKotaKabupaten + "</option>";
                }
                tabelkota.html(html);

            },
            error: function() {
                var html = '';
                html += "<option value=''>-PILIH-</option>";
                tabelkota.html(html);

                return false;
            }
        });
    }

    function GetKecamatan() {
        var idtabs = $(".tab-pane.active").attr("id");
        var tabelkota = '';
        var id = '';
        if (idtabs == 'tab-1') {
            id = $('#kota').val();
            tabelkota = $('#kecamatan');
        } else if (idtabs == 'tab-2') {
            id = $('#kota2').val();
            tabelkota = $('#kecamatan2');
        } else {
            id = $('#kota3').val();
            tabelkota = $('#kecamatan3');
        }

        $.ajax({
            url: "regonline/GetKecamatan",
            method: "POST",
            data: {
                "kota": id
            },
            // async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html += "<option value=''>-PILIH-</option>";
                for (i = 0; i < data.length; i++) {
                    html += "<option value = '" + data[i].KdKecamatan + "'>" + data[i].NamaKecamatan + "</option>";
                }
                tabelkota.html(html);

            },
            error: function() {
                var html = '';
                html += "<option value=''>-PILIH-</option>";
                tabelkota.html(html);

                return false;
            }
        });
    }

    function GetKelurahan() {
        var idtabs = $(".tab-pane.active").attr("id");
        var tabelkota = '';
        var id = '';
        if (idtabs == 'tab-1') {
            id = $('#kecamatan').val();
            tabelkota = $('#kelurahan');
        } else if (idtabs == 'tab-2') {
            id = $('#kecamatan2').val();
            tabelkota = $('#kelurahan2');
        } else {
            id = $('#kecamatan3').val();
            tabelkota = $('#kelurahan3');
        }

        $.ajax({
            url: "regonline/GetKelurahan",
            method: "POST",
            data: {
                "kecamatan": id
            },
            // async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html += "<option value=''>-PILIH-</option>";
                for (i = 0; i < data.length; i++) {
                    html += "<option value = '" + data[i].KdKelurahan + "'>" + data[i].NamaKelurahan + "</option>";
                }
                tabelkota.html(html);

            },
            error: function() {
                var html = '';
                html += "<option value=''>-PILIH-</option>";
                tabelkota.html(html);

                return false;
            }
        });
    }

    function GetRujukanAsal() {
        $.ajax({
            url: "regonline/GetRujukanAsal",
            method: "POST",
            // async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html += "<option value=''>-PILIH-</option>";
                for (i = 0; i < data.length; i++) {
                    html += "<option value = '" + data[i].KdRujukanAsal + "'>" + data[i].RujukanAsal + "</option>";
                }
                $('#rujukanasal').html(html);
                $('#rujukanasal2').html(html);
                $('#rujukanasal3').html(html);

                document.getElementById("rujukanasal").value = '02';
                document.getElementById("rujukanasal2").value = '01';
                document.getElementById("rujukanasal3").value = '01';
            },
            error: function() {
                var html = '';
                html += "<option value=''>-PILIH-</option>";
                $('#rujukanasal').html(html);
                $('#rujukanasal2').html(html);
                $('#rujukanasal3').html(html);

                return false;
            }
        });
    }

    function GetPoli(id) {
        $.ajax({
            url: "regonline/GetPoli",
            method: "POST",
            data: {
                "tglregistrasi": id
            },
            // async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html += "<option value=''>-PILIH-</option>";
                for (i = 0; i < data.length; i++) {
                    html += "<option value = '" + data[i].KdPoli + "'>" + data[i].NamaPoli + "</option>";
                }
                $('#poli').html(html);
                $('#poli2').html(html);
                $('#poli3').html(html);

            },
            error: function() {
                var html = '';
                html += "<option value=''>-PILIH-</option>";
                $('#poli').html(html);
                $('#poli2').html(html);
                $('#poli3').html(html);
                // message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                // return false;
            }
        });
    }

    function GetCarabayar() {
        $.ajax({
            url: "regonline/GetCarabayar",
            method: "POST",
            // async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html += "<option value=''>-PILIH-</option>";
                for (i = 0; i < data.length; i++) {
                    html += "<option value = '" + data[i].KdCarabayar + "'>" + data[i].NamaCarabayar + "</option>";
                }
                $('#carabayar2').html(html);

            },
            error: function() {
                var html = '';
                html += "<option value=''>-PILIH-</option>";
                $('#carabayar2').html(html);

                return false;
            }
        });
    }

    function message(icon, text, title, confirm) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
            showConfirmButton: false,
            showCancelButton: false,
            timer: 3000,
            // timerProgressBar: true,
            showConfirmButton: confirm,
            showCancelButton: confirm,
            confirmButtonText: 'Ok'
        })
    }

    function GetPasienLama() {
        $("#loading").addClass("overlay");
        var idtabs = $(".tab-pane.active").attr("id");
        var varreturn = '200'
        var tabelid = '';
        var nocm = '';
        var tgllahir = '';

        if (idtabs == 'tab-1') {
            tabid = $('#tabletab');
            tabelid = 'tabelpaslama';
            nocm = $('#norm').val();
            tgllahir = $('#tgllahir').val();
            numtab = '';
        } else if (idtabs == 'tab-2') {
            tabid = $('#tabletab2');
            tabelid = 'tabelpaslama2';
            nocm = $('#norm2').val();
            tgllahir = $('#tgllahir2').val();
            numtab = '2';
        } else {
            tabid = $('#tabletab3');
            tabelid = 'tabelpaslama3';
            nocm = $('#norm3').val();
            tgllahir = $('#tgllahir3').val();
            numtab = '3';
        }


        $.ajax({
            url: "regonline/GetPasienLama",
            method: "POST",
            data: {
                "nocm": nocm,
                "tgllahir": tgllahir
            },
            // async: false,
            dataType: 'json',
            success: function(data) {
                if (data.codedata['code'] != '200') {
                    message('info', data.codedata['message'], 'Informasi', false);
                } else {
                    if (data.hasil['tempatlahir'] === null) {
                        var tmptgllahir = data.hasil['tgllahir'];
                    } else {
                        var tmptgllahir = data.hasil['tempatlahir'] + ', ' + data.hasil['tgllahir'];
                    };

                    if (data.hasil['kodepos'] === null) {
                        var alamat = data.hasil['alamat'] + ' RT/RW ' + data.hasil['rtrw'] + ' KELURAHAN ' + data.hasil['kelurahan'].toUpperCase() +
                            ' KECAMATAN ' + data.hasil['kecamatan'].toUpperCase() + ' ' + data.hasil['kota'].toUpperCase() + ' ' + data.hasil['propinsi'].toUpperCase();
                    } else {
                        var alamat = data.hasil['alamat'] + ' RT/RW ' + data.hasil['rtrw'] + ' KELURAHAN ' + data.hasil['kelurahan'].toUpperCase() +
                            ' KECAMATAN ' + data.hasil['kecamatan'].toUpperCase() + ' ' + data.hasil['kota'].toUpperCase() + ' ' + data.hasil['propinsi'].toUpperCase() + ' ' + data.hasil['kodepos'];
                    };
                    if (data.hasil['notelp'] === null) {
                        var notlp = '-';
                    } else {
                        var notlp = data.hasil['notelp'];
                    };

                    var html = '';
                    html = "<table class='table' id ='" + tabelid + "'> "
                    html += "<tr style='text-align: center;'> "
                    html += "<th scope='col'>No.RM </th> "
                    html += "<th scope='col'>Nama</th>"
                    html += "<th scope='col'>Tgl. Lahir</th> "
                    html += "<th scope='col'>Jenis Kelamin</th> "
                    html += "<th scope='col'>Alamat</th> "
                    html += "<th scope='col'>No. Telp</th> "
                    html += "</tr>"
                    html += "<tr>"
                    html += "<td>" + data.hasil['nocm'] + "</td>";
                    html += "<td>" + data.hasil['titlepasien'] + ' ' + data.hasil['namapasien'] + "</td>";
                    html += "<td>" + tmptgllahir + "</td>";
                    html += "<td>" + data.hasil['jeniskelamin'] + "</td>";
                    html += "<td>" + alamat + "</td>";
                    html += "<td>" + notlp + "</td>";
                    html += "</tr>"
                    html += "</table>"
                    tabid.html(html);
                    document.getElementById("normhiddenlama" + numtab).value = data.hasil['nocm'];
                }

            },
            error: function() {
                message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                return false;
            }
        });

        setTimeout(() => {
            $("#loading").removeClass("overlay");
        }, 100);
        $('#loading').fadeOut();
    }

    async function SimpanRegistrasi() {
        var idtabs = $(".tab-pane.active").attr("id");
        var numtab = '';
        var carabayar = '';
        var nopeserta = '';
        var nosuratrujukan = '';
        var nocm = '';
        var jeniskunjungan = '';
        var nilai = $("[name='nilai" + numtab + "'").val();
        var hasilnum = Number(nilai) + 1;

        if (idtabs == 'tab-1') {
            numtab = '';
            carabayar = '14'; // hardcode bpjs kode 14
            nopeserta = $('#nopeserta' + numtab).val();
            nosuratrujukan = $('#nosuratrujukan' + numtab).val();
            jeniskunjungan = $('input[name="radiojeniskunjungan"]:checked').val();
        } else if (idtabs == 'tab-2') {
            numtab = '2';
            carabayar = $('#carabayar' + numtab).val(); // mengambil dari inputan

        } else {
            numtab = '3';
            carabayar = '01'; // hardcode umum kode 01
        }

        var statuspasien = $('input[name="flexRadioDefault' + numtab + '"]:checked').val();
        if (statuspasien == '1') {
            statuspasien = 'LAMA'
        } else {
            statuspasien = 'BARU'
        }
        var tujuanpemeriksaan = $('input[name="radiotjnpemeiksaan' + numtab + '"]:checked').val();

        if (statuspasien == 'LAMA') {
            nocm = $('#normhiddenlama' + numtab).val();
            var tgllahir = $('#tgllahir' + numtab).val();
        } else {
            var gelar = $('#gelar' + numtab).val();
            var namalengkap = $('#namalengkap' + numtab).val();
            var jeniskelamin = $('#kelamin' + numtab).val();
            var tempatlahir = $('#tempatlahir' + numtab).val();
            var tgllahir = $('#tgllahirbaru' + numtab).val();
            var noidentitas = $('#noidentitas' + numtab).val();
            var alamat = $('#alamat' + numtab).val();
            var rtrw = $('#rt' + numtab).val() + '/' + $('#rw' + numtab).val();

            // mengambil value/id
            // var propinsi = $('#propinsi' + numtab).val();
            // var kota = $('#kota' + numtab).val();
            // var kecamatan = $('#kecamatan' + numtab).val();
            // var kelurahan = $('#kelurahan' + numtab).val();

            // mengambil nama/text
            var propinsi = $.trim($("#propinsi" + numtab).children("option:selected").text());
            var kota = $.trim($("#kota" + numtab).children("option:selected").text());
            var kecamatan = $.trim($("#kecamatan" + numtab).children("option:selected").text());
            var kelurahan = $.trim($("#kelurahan" + numtab).children("option:selected").text());
            var notlp = $('#notlp' + numtab).val();
            var kodepos = $('#kodepos' + numtab).val();
        }

        var tglregistrasi = $('#tglregistrasi' + numtab).val();
        var jenispermintaan = $('input[name="radiojenispermintaan' + numtab + '"]:checked').val();
        var tujuanpemeriksaan = $('input[name="radiotjnpemeiksaan' + numtab + '"]:checked').val();
        var rujukanasal = $('#rujukanasal' + numtab).val();
        var poli = $('#poli' + numtab).val();
        var jenispoli = $('input[name="radiojenispoli' + numtab + '"]:checked').val();
        var email = $('#email' + numtab).val();

        // var bool = true;

        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah anda yakin akan menyimpan data?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                // jika  berhasil simpan maka munculkan cetakan hasil booking, jika gagal booking maka diam di page tersebut.
                Swal.close();
                LoadingPopup('Mohon Tunggu', 'Sedang Menyimpan Data.....');

                $.ajax({
                    url: "regonline/SimpanRegistrasi",
                    method: "POST",
                    data: {
                        "statuspasien": statuspasien,
                        "tujuanperiksa": tujuanpemeriksaan,
                        "jenispasien": carabayar,
                        "namapasien": namalengkap,
                        "titlepasien": gelar,
                        "tempatlahir": tempatlahir,
                        "tgllahir": tgllahir,
                        "jeniskelamin": jeniskelamin,
                        "alamat": alamat,
                        "propinsi": propinsi,
                        "kota": kota,
                        "kecamatan": kecamatan,
                        "kelurahan": kelurahan,
                        "rtrw": rtrw,
                        "kodepos": kodepos,
                        "nocm": nocm,
                        "nomorkartu": nopeserta,
                        "nik": noidentitas,
                        "notelp": notlp,
                        "tanggalperiksa": tglregistrasi,
                        "kodepoli": poli,
                        "kdrujukanasal": rujukanasal,
                        "nomorreferensi": nosuratrujukan,
                        "jenisreferensi": jeniskunjungan,
                        "jenisrequest": jenispermintaan,
                        "polieksekutif": jenispoli,
                        "email": email
                    },
                    // async: false,
                    dataType: 'json',
                    success: function(data) {
                        if (data.codedata['code'] != '200') {
                            swal.close();
                            message('warning', data.codedata['message'], 'Informasi', false);
                            // document.getElementById("nilai" + numtab).value = Number(hasilnum) - 1;
                            // bool = false;

                            $('#email' + numtab).text('-');
                            $('#kodebookingval' + numtab).text('-');
                            $('#nopendaftaranval' + numtab).text('-');
                            $('#nocmval' + numtab).text('-');
                            $('#nomorantreanval' + numtab).text('-');
                            $('#jenisantreanval' + numtab).text('-');
                            $('#estimasidilayanival' + numtab).text('-');
                            $('#namapolival' + numtab).text('-');
                            $('#namadokterval' + numtab).text('-');
                            $('#statuspasienval' + numtab).text('-');

                        } else {
                            swal.close();
                            var nobooking = data.hasil['kodebooking'];

                            $("#headerregonline" + numtab).hide();
                            $("#isiregonline" + numtab).hide();
                            $("#btnkembali" + numtab).hide();
                            $("#btnlanjut" + numtab).hide();
                            $("#sukses" + numtab).show();
                            $("#nobookingsimpan" + numtab).text('No. Booking : ' + nobooking);
                            $("#ketnobookingsimpan" + numtab).text('* Jika tidak menerima email silahkan lakukan kirim ulang di halaman cari pendaftaran dengan memasukan No. Booking.');
                            // setInterval(location.reload(), 5000);
                            document.getElementById("nilai" + numtab).value = Number(hasilnum) + 1;

                            $('#email' + numtab).text(email);
                            $('#kodebookingval' + numtab).text(nobooking);
                            $('#nopendaftaranval' + numtab).text(data.hasil['nopendaftaran']);
                            $('#nocmval' + numtab).text(data.hasil['nocm']);
                            $('#nomorantreanval' + numtab).text(data.hasil['nomorantrean']);
                            $('#jenisantreanval' + numtab).text(data.hasil['jenisantrean']);
                            $('#estimasidilayanival' + numtab).text(data.hasil['estimasidilayani']);
                            $('#namapolival' + numtab).text(data.hasil['namapoli']);
                            $('#namadokterval' + numtab).text(data.hasil['namadokter']);
                            $('#statuspasienval' + numtab).text(data.hasil['statuspasien']);

                            // LoadingPopup('Mohon Tunggu', 'Sedang Mengirim Bukti Pendaftarakan ke Email.');
                            // kirim bukti registrasi ke email
                            $.ajax({
                                url: "regonline/Cetak",
                                method: "POST",
                                data: {
                                    "email": email,
                                    "kodebookingval": nobooking,
                                    "nopendaftaranval": data.hasil['nopendaftaran'],
                                    "nocmval": data.hasil['nocm'],
                                    "nomorantreanval": data.hasil['nomorantrean'],
                                    "jenisantreanval": data.hasil['jenisantrean'],
                                    "estimasidilayanival": data.hasil['estimasidilayani'],
                                    "namapolival": data.hasil['namapoli'],
                                    "namadokterval": data.hasil['namadokter'],
                                    "statuspasienval": data.hasil['statuspasien'],
                                    "idcetak": '1'
                                },
                                dataType: 'json',
                                // async = false,
                                success: function(data) {
                                    swal.close();
                                    // if (data.hasil['code'] != '200') {
                                    // message('info', data.hasil['message'], 'Informasi', false);
                                    // } else {
                                    // message('success', data.hasil['message'], 'Informasi', false);
                                    // }
                                    // message('success', 'Data Berhasil Disimpan.', 'Informasi', false);
                                    // bool = true;

                                    // $("#headerregonline" + numtab).hide();
                                    // $("#isiregonline" + numtab).hide();
                                    // $("#btnkembali" + numtab).hide();
                                    // $("#btnlanjut" + numtab).hide();
                                    // $("#sukses" + numtab).show();
                                    // $("#nobookingsimpan" + numtab).text('No. Booking : ' + nobooking);
                                    // $("#ketnobookingsimpan" + numtab).text('* Jika tidak menerima email silahkan lakukan kirim ulang di halaman cari pendaftaran dengan memasukan No. Booking : ' + nobooking);
                                    // // setInterval(location.reload(), 5000);
                                    // document.getElementById("nilai" + numtab).value = Number(hasilnum) + 1;
                                },
                                error: function() {
                                    swal.close();
                                    // message('error', 'Gagal Kirim Email, Silahkan lakukan kirim ulang di halaman pencarian.', 'Peringatan', false);
                                }
                            });

                            var html = '';
                            html = "<li class='breadcrumb-item'><a href='#' onclick='StepSelesai();'>Cara Bayar</a></li>";
                            html += "<li class='breadcrumb-item'><a href='#' onclick='StepSelesai();'>Data Pasien</a></li>";
                            html += "<li class='breadcrumb-item'><a href='#' onclick='StepSelesai();'>Data Pendaftaran</a></li>";
                            html += "<li class='breadcrumb-item active' aria-current='page'>Selesai</a></li>";
                            $('#stepprogress').html(html);

                        }

                    },
                    error: function() {
                        swal.close();
                        message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);

                        $('#email' + numtab).text('-');
                        $('#kodebookingval' + numtab).text('-');
                        $('#nopendaftaranval' + numtab).text('-');
                        $('#nocmval' + numtab).text('-');
                        $('#nomorantreanval' + numtab).text('-');
                        $('#jenisantreanval' + numtab).text('-');
                        $('#estimasidilayanival' + numtab).text('-');
                        $('#namapolival' + numtab).text('-');
                        $('#namadokterval' + numtab).text('-');
                        $('#statuspasienval' + numtab).text('-');
                        // document.getElementById("nilai" + numtab).value = Number(hasilnum) - 1;
                        // bool = false;
                    }
                });
            } else {
                // jika klik batal
                // document.getElementById("nilai" + numtab).value = Number(hasilnum) - 1;
                // bool = false;
            }
        })

        // return bool;

    }

    function prosesHome() {
        location.reload();
    }

    function SetValueGelar(id, tahun, bulan, hari) {
        if (tahun == null || tahun == '') {
            return 'Bayi';
        } else {
            if (tahun > '13') {
                if (id == 'L') {
                    return 'Tn.';
                } else {
                    if (tahun <= '19') {
                        return 'Nn.';
                    } else {
                        return 'Ny.';
                    }
                }
            } else {
                if (tahun >= '5' && tahun <= '13') {
                    return 'Anak';
                } else {
                    return 'Bayi';
                }
            }
        }
    }

    $('#propinsi').change(function() {
        GetKota();
        GetKecamatan();
        GetKelurahan();
    });
    $('#propinsi2').change(function() {
        GetKota();
        GetKecamatan();
        GetKelurahan();
    });
    $('#propinsi3').change(function() {
        GetKota();
        GetKecamatan();
        GetKelurahan();
    });

    $('#kota').change(function() {
        GetKecamatan();
        GetKelurahan();
    });
    $('#kota2').change(function() {
        GetKecamatan();
        GetKelurahan();
    });
    $('#kota3').change(function() {
        GetKecamatan();
        GetKelurahan();
    });

    $('#kecamatan').change(function() {
        GetKelurahan();
    });
    $('#kecamatan2').change(function() {
        GetKelurahan();
    });
    $('#kecamatan3').change(function() {
        GetKelurahan();
    });

    $('#kelamin').change(function() {
        var tahun = $('#tahun').val();
        var bulan = $('#bulan').val();
        var hari = $('#hari').val();
        var kelamin = $('#kelamin').val();

        var gelar = SetValueGelar(kelamin, tahun, bulan, hari);
        document.getElementById("gelar").value = gelar;
    });
    $('#kelamin2').change(function() {
        var tahun = $('#tahun2').val();
        var bulan = $('#bulan2').val();
        var hari = $('#hari2').val();
        var kelamin = $('#kelamin2').val();

        var gelar = SetValueGelar(kelamin, tahun, bulan, hari);
        document.getElementById("gelar2").value = gelar;
    });
    $('#kelamin3').change(function() {
        var tahun = $('#tahun3').val();
        var bulan = $('#bulan3').val();
        var hari = $('#hari3').val();
        var kelamin = $('#kelamin3').val();

        var gelar = SetValueGelar(kelamin, tahun, bulan, hari);
        document.getElementById("gelar3").value = gelar;
    });

    function updateInput(id, getid) {
        if (id != '' || id != null) {
            setSuccessFor(document.getElementById(getid));
        }
    }

    // semua input number akan dihilangkan karakter  "-", "e", "+", "E"
    var invalidChars = ["-", "e", "+", "E"];

    $("input[type='number']").on("keydown", function(e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });
</script>

</body>

</html>
