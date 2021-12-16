function AmbilDataPasienBPJS() {
    $("#loading").addClass("overlay");
    $('#loading').fadeIn();
    // var nosrtrujukan = $('#nosuratrujukan').val();
    var nopesertaparm = $('#nopesertaparm').val();
    var tgllahir = $('#tgllahir').val();
    var norm = $('#norm').val();

    $.ajax({
        url: "regonline/AmbilDataPasienBPJS",
        method: "POST",
        data: {
            "nopeserta": nopesertaparm
        },
        // async: false,
        dataType: 'json',
        success: function(data) {
            if (data.codedata['code'] != '200') {
                message('info', data.codedata['message'], 'Informasi', false);
                setTimeout(() => {
                    $("#loading").removeClass("overlay");
                }, 100);
                $('#loading').fadeOut();
            } else {
                // if (nopeserta != data.hasil['noKartu']) {
                //     message('info', 'No. Peserta / No. Kartu Tidak Sesuai Dengan Data Rujukan.', 'Informasi', false);
                // } else {
                if (data.hasil['statuspeserta'] == 'AKTIF') {
                    if (data.hasil['noKunjungan'] == '' || data.hasil['noKunjungan'] == null) {
                        var nosrtrujukan = nopesertaparm;
                    } else {
                        var nosrtrujukan = data.hasil['noKunjungan'];
                    }
                    nopeserta = data.hasil['noKartu'];
                    document.getElementById("nosuratrujukan").value = nosrtrujukan;
                    document.getElementById("nopeserta").value = nopeserta;
                    document.getElementById("nopesertaparm").value = nopesertaparm;
                    var namapasien = data.hasil['nama'];
                    var kelaminpasien = data.hasil['jk'];
                    var tgllahirpasien = data.hasil['tglLahir'];
                    var noidentitaspasien = data.hasil['nik'];
                    var notelppasien = data.hasil['telepon'];
                    $('#polifaskes').text('Poli Rujukan : ' + data.hasil['nmpoli']);
                    $.ajax({
                        url: "regonline/GetPasienLama",
                        method: "POST",
                        data: {
                            "nocm": norm,
                            "tgllahir": tgllahir
                        },
                        // async: false,
                        dataType: 'json',
                        success: function(data) {
                            setTimeout(() => {
                                $("#loading").removeClass("overlay");
                            }, 100);
                            $('#loading').fadeOut();
                            if (data.codedata['code'] != '200') {
                                Swal.fire({
                                    title: 'Konfirmasi',
                                    // text: "Data Ditemukan didalam Sistem RSU Kota Banjar<br>Nama Pasien : " + data.hasil['namapasien'] + "",
                                    html: "Data Ditemukan Didalam Sistem BPJS Namun <b>" + data.codedata['message'] +
                                        " di Sistem Rumah Sakit</b><br>Apakah Akan Memperbaiki Pencarian ?",
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonText: 'Ya',
                                    cancelButtonText: 'Daftar Sebagai Pasien Baru',
                                    customClass: 'swal-wide'
                                }).then((result) => {
                                    if (result.value) {} else {
                                        // jika klik batal
                                        $("#pasienbaru").show();
                                        $('input:radio[name=flexRadioDefault][id=flexRadioDefault2]').click();
                                        document.getElementById("norm").value = norm;
                                        document.getElementById("nopesertaparm").value = nopesertaparm;
                                        document.getElementById("nopeserta").value = nopeserta;
                                        document.getElementById("nosuratrujukan").value = nosrtrujukan;
                                        document.getElementById("tgllahir").value = tgllahir;

                                        // set pasien baru
                                        document.getElementById("namalengkap").value = namapasien;
                                        document.getElementById("kelamin").value = kelaminpasien;
                                        document.getElementById("tgllahirbaru").value = tgllahirpasien;
                                        document.getElementById("noidentitas").value = noidentitaspasien;
                                        document.getElementById("notlp").value = notelppasien;

                                        HitungUmur(tgllahirpasien);
                                        $('#kelamin').change();
                                    }
                                });
                            } else {
                                // if (data.hasil['namapasien'].toUpperCase() == namapasien.toUpperCase()){
                                if (data.hasil['namapasien'].toUpperCase() == namapasien.toUpperCase() && new Date(tgllahirpasien).toLocaleDateString() == new Date(data.hasil['tgllahir']).toLocaleDateString() ){
                                    Swal.fire({
                                        title: 'Konfirmasi',
                                        // text: "Data Ditemukan didalam Sistem RSU Kota Banjar<br>Nama Pasien : " + data.hasil['namapasien'] + "",
                                        html: "<div class='align-left'><b>Data Ditemukan Didalam Sistem.</b>" +
                                            "<br><br>No. Rekam Medik : " + data.hasil['nocm'] +
                                            "<br>Nama Pasien : " + data.hasil['namapasien'] +
                                            "<br>Tanggal Lahir : " + data.hasil['tgllahir'] +
                                            "<br>Jenis Kelamin : " + data.hasil['jeniskelamin'] +
                                            "<br>Alamat : " + data.hasil['alamat'].toUpperCase() + " " + data.hasil['rtrw'].toUpperCase() + " " + data.hasil['kelurahan'].toUpperCase() + " " + data.hasil['kecamatan'].toUpperCase() + " " + data.hasil['kota'].toUpperCase() + " " + data.hasil['propinsi'].toUpperCase() +
                                            "<br><br><b>Apakah Akan Menggunakan Data Ini ?</b></div>",
                                        icon: 'question',
                                        showCancelButton: true,
                                        showDenyButton: true,
                                        confirmButtonText: 'Gunakan Data Ini',
                                        cancelButtonText: 'Batal',
                                        denyButtonText: 'Buat Pasien Baru',
                                        customClass: 'swal-wide'
                                    }).then((result) => {
                                        bersihkan('tab-1');
                                        if (result.value) {
                                            $("#pasienbaru").hide();
                                            $('input:radio[name=flexRadioDefault][id=flexRadioDefault1]').click();
                                            document.getElementById("norm").value = norm;
                                            document.getElementById("nopesertaparm").value = nopesertaparm;
                                            document.getElementById("nopeserta").value = nopeserta;
                                            document.getElementById("nosuratrujukan").value = nosrtrujukan;
                                            document.getElementById("tgllahir").value = tgllahir;
                                            // jika  berhasil simpan maka munculkan cetakan hasil booking, jika gagal booking maka diam di page tersebut.   
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
                                            html = "<table class='table' id ='tabelpaslama'> "
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
                                            $('#tabletab').html(html);
                                            document.getElementById("normhiddenlama").value = data.hasil['nocm'];
                                        } else if (result.value === false) {
                                            // jika klik pasien baru
                                            $("#pasienbaru").show();
                                            $('input:radio[name=flexRadioDefault][id=flexRadioDefault2]').click();
                                            document.getElementById("norm").value = norm;
                                            document.getElementById("nopesertaparm").value = nopesertaparm;
                                            document.getElementById("nopeserta").value = nopeserta;
                                            document.getElementById("nosuratrujukan").value = nosrtrujukan;
                                            document.getElementById("tgllahir").value = tgllahir;
    
                                            // set pasien baru
                                            document.getElementById("namalengkap").value = namapasien;
                                            document.getElementById("kelamin").value = kelaminpasien;
                                            document.getElementById("tgllahirbaru").value = tgllahirpasien;
                                            document.getElementById("noidentitas").value = noidentitaspasien;
                                            document.getElementById("notlp").value = notelppasien;
    
                                            HitungUmur(tgllahirpasien);
                                            $('#kelamin').change();
    
                                            // $("#norm").attr("disabled", true);
                                            // $("#nopeserta").attr("disabled", true);
                                            // $("#nosuratrujukan").attr("disabled", true);
                                            // $("#tgllahir").attr("disabled", true);
                                            // $("#namalengkap").attr("disabled", true);
                                            // $("#kelamin").attr("disabled", true);
                                            // $("#tgllahirbaru").attr("disabled", true);
                                            // $("#noidentitas").attr("disabled", true);
                                            // $("#notlp").attr("disabled", true);
    
                                        } else {
                                            // jika klik batal
                                            // message('info', 'batal', 'Informasi', false);
                                            document.getElementById("norm").value = norm;
                                            document.getElementById("nopesertaparm").value = nopesertaparm;
                                            document.getElementById("nopeserta").value = nopeserta;
                                            document.getElementById("nosuratrujukan").value = nosrtrujukan;
                                            document.getElementById("tgllahir").value = tgllahir;
                                        }
                                    })
                                }else {
                                    // message('info', new date(tgllahirpasien).toDateString("yyyy-MM-dd"), 'Peringatan', false);
                                    message('info', 'Terdapat Perbedaan Nama Pasien Pada Data BPJS dan Data Rumah Sakit.', 'Peringatan', false);
                                }
                            }

                        },
                        error: function() {
                            message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
                        }
                    });
                    // }
                    // var tmptgllahir = data.hasil['tgllahir'];
                } else {
                    message('info', 'Status Peserta : ' + data.hasil['statuspeserta'], 'Informasi', false);
                }
            }
        },
        error: function() {
            message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
        }
    });


    // setTimeout(() => {
    //     $("#loading").removeClass("overlay");
    // }, 100);
    // $('#loading').fadeOut();
}