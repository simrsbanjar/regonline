$(document).ready(function () {
    var page = $("[name='regonline']").val();
    var date = new Date().toDateString("yyyy-MM-dd");
    $("#btnlanjutcarabayar").show();
    
    // const content = document.getElementById('content');
    // const bullets = [...document.querySelectorAll('.bullet')];

    // const MAX_STEPS = 4;
    // let currentStep = 1;
    // bullets[currentStep - 1].classList.add('completed');
    // currentStep += 1;

    if (page == null) {
        $("#daftar").show();
        var html = '';
        html += '<li class="active"><a href="Home"><i class="fas fa-home"></i> Home</a></li>';
        html += '<li><a href="#tentangkita"><i class="fas fa-tasks"></i> Syarat dan Ketentuan</a></li>';
        html += '<li><a href="#alur"><i class="fas fa-walking"></i> Alur </a></li>';
        html += '<li><a href="#liveantrian"><i class="fas fa-users"></i> Live Antrian Poli</a></li>';
        html += '<li><a href="#jadwaldokter"><i class="fas fa-calendar-alt"></i> Jadwal Poliklinik </a></li>';
        html += '<li><a href="#contact"><i class="far fa-address-book"></i> Kontak</a></li>';
        $('#myList').html(html);
        ProgressCountdown(10, 'pageBeginCountdown', 'pageBeginCountdownText');
        GetAntrianLive();
        GetJadwalPoliklinik();
    } else if (page == '1') {
        $("#daftar").hide();
        var html = '';
        html += '<li><a href="Home"><i class="fas fa-home"></i> Home</a></li>';
        html += '<li><a href="cariregonline"><i class="fas fa-search"></i> Cari</a></li>';
        html += '<li class="active"><a href="regonline"><i class="fas fa-clipboard-list"></i> Daftar</a></li>';
        $('#myList').html(html);
        GetHariLibur('1');
        hidetab1();
        hidetab2();
        hidetab3();
        daycount();
        getpropinsi();
        GetRujukanAsal();
        GetPoli(daystarttgl());
        GetCarabayar();
    } else {
        $("#daftar").hide();
        var html = '';
        html += '<li><a href="Home"><i class="fas fa-home"></i> Home</a></li>';
        html += '<li class="active"><a href="cariregonline"><i class="fas fa-search"></i> Cari</a></li>';
        html += '<li><a href="regonline"><i class="fas fa-clipboard-list"></i> Daftar</a></li>';
        $('#myList').html(html);
        GetHariLibur('0');
    }

    var html = '';
    html = '<li class="breadcrumb-item active" aria-current="page">Cara Bayar</a></li>';
    $('#stepprogress').html(html);
    $('#load').fadeOut();
});