<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Regonline extends CI_Controller
{
    public function index()
    {
        $this->load->view('regonline');
    }

    function __construct()
    {
        parent::__construct();
         $this->API = "https://simrs.rsukotabanjar.co.id/wg-rsubanjar";
        // $this->API = "http://172.16.0.3/wg-rsubanjar";
        // $this->API = "http://172.16.0.3/wg-rsubanjar";
        // $this->API = "http://localhost/wg-rsubanjar";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function time_convert($timestamp)
    {
        // $timestamp = '1597078800';
        return date('d-m-Y H:m', $timestamp / 1000);
    }

    function hitung_umur()
    {
        $birthDate = new DateTime($this->input->post('tgllahir'));
        $today = new DateTime("today");
        if (($birthDate > $today) || ($birthDate < new DateTime("1900-01-01"))) {
            $y = '0';
            $m = '0';
            $d = '0';
        } else {
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;
        }
        $data = array(
            'tahun' => $y,
            'bulan' => $m,
            'hari' => $d

        );

        echo json_encode($data);
    }

    function GetToken()
    {
        $parm = array(
            'username'       =>  'registrasionline',
            'password'      =>  'rsu@b4nj4r'
        );

        $hasil = json_decode($this->curl->simple_post($this->API . '/gettoken', $parm, array(CURLOPT_BUFFERSIZE => 10,CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0)));
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $data   = array(
            'response' => $response,
            'metadata' => $metadata
        );

        // jika respon 200/sukses maka tidak perlu di balikan namun jika gagal maka balikan gagalnya 
        return $data['response']->token;
    }

    function GetRujukanAsal()
    {
        $token     =  $this->GetToken();
        $url = $this->API . '/getlistrujukanasal';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        // $data = ['name' => 'Hardik', 'email' => 'itsolutionstuff@gmail.com'];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );

        // $lines = file(base_url("assets/file/rujukanasal.txt"));
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            $data[] = array(
                'KdRujukanAsal' => $line->Kode,
                'RujukanAsal' => $line->Nama
            );
        }
        echo json_encode($data);
    }

    function GetPropinsi()
    {
        $token     =  $this->GetToken();
        $url = $this->API . '/getlistpropinsi';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        // $data = ['name' => 'Hardik', 'email' => 'itsolutionstuff@gmail.com'];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );

        // $lines = file(base_url("assets/file/rujukanasal.txt"));
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            $data[] = array(
                'KdPropinsi' => $line->Kode,
                'NamaPropinsi' => $line->Nama
            );
        }
        echo json_encode($data);
    }

    function GetKota()
    {
        $propinsi = $this->input->post('propinsi');

        $token     =  $this->GetToken();
        $url = $this->API . '/getlistkota';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        $parm = ['kdPropinsi' => "" . $propinsi . ""];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            $data[] = array(
                'KdKotaKabupaten' => $line->Kode,
                'NamaKotaKabupaten' => $line->Nama
            );
        }
        echo json_encode($data);
    }

    function GetKecamatan()
    {
        $kodekota = $this->input->post('kota');

        $token     =  $this->GetToken();
        $url = $this->API . '/getlistkecamatan';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        $parm = ['kdKota' => "" . $kodekota . ""];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            $data[] = array(
                'KdKecamatan' => $line->Kode,
                'NamaKecamatan' => $line->Nama
            );
        }
        echo json_encode($data);
    }

    function GetKelurahan()
    {
        $kodekecamatan = $this->input->post('kecamatan');

        $token     =  $this->GetToken();
        $url = $this->API . '/getlistkelurahan';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        $parm = ['kdKecamatan' => "" . $kodekecamatan . ""];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            $data[] = array(
                'KdKelurahan' => $line->Kode,
                'NamaKelurahan' => $line->Nama
            );
        }


        echo json_encode($data);
    }

    function GetPoli()
    {
        $tglregistrasi = date('Y-m-d', strtotime($this->input->post('tglregistrasi')));
        // var_dump($tglregistrasi);

        $token     =  $this->GetToken();
        $url = $this->API . '/getlistpoli';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        $parm =  ['tanggalperiksa' => "" . $tglregistrasi . ""];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            $data[] = array(
                'KdPoli' => $line->Kode,
                'NamaPoli' => $line->Nama
            );
        }

        echo json_encode($data);
    }

    function GetCarabayar()
    {
        $token     =  $this->GetToken();
        $url = $this->API . '/getlistjenispasien';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        // $data = ['name' => 'Hardik', 'email' => 'itsolutionstuff@gmail.com'];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );

        // $lines = file(base_url("assets/file/rujukanasal.txt"));
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            // selain carabayar umum,bpjs pbi dan bpjs non pbi
            if ($line->Kode != '01' && $line->Kode != '14' && $line->Kode != '15') {
                $data[] = array(
                    'KdCarabayar' => $line->Kode,
                    'NamaCarabayar' => $line->Nama
                );
            }
        }
        echo json_encode($data);
    }

    function GetPasienLama()
    {
        $norm = $this->input->post('nocm');
        $tgllahir = date('Y-m-d', strtotime($this->input->post('tgllahir')));
        // $norm = '384600'; //'386123'; //'417191';
        // $tgllahir = '1968-01-16'; //'1961-03-15'; //'1991-04-04';

        $token     =  $this->GetToken();
        if (strlen(trim($norm)) <= '6') {
            $norm = substr(('000000' . $norm), -6);
            $url = $this->API . '/getdatapasienbynocm';
            /* Array Parameter Data */
            $parm =  ['nocm' => "" . $norm . "", 'tgllahir' => "" . $tgllahir . ""];
        } else {
            $url = $this->API . '/getdatapasienbynik';
            /* Array Parameter Data */
            $parm =  ['nik' => "" . $norm . "", 'tgllahir' => "" . $tgllahir . ""];
        }

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $data['hasil'] = null;

        if ($metadata->code == '200') {
            if ($response->jeniskelamin == 'L') {
                $jeniskelamin = 'Laki-laki';
            } else {
                $jeniskelamin = 'Perempuan';
            };

            $data['hasil'] = array(
                'nocm' => $response->nocm,
                'namapasien' => $response->namapasien,
                'titlepasien' => $response->titlepasien,
                'tempatlahir' => $response->tempatlahir,
                'tgllahir' =>  date('d-m-Y', strtotime($response->tgllahir)),
                'jeniskelamin' => $jeniskelamin,
                'alamat' => $response->alamat,
                'propinsi' => $response->propinsi,
                'kota' => $response->kota,
                'kecamatan' => $response->kecamatan,
                'kelurahan' => $response->kelurahan,
                'rtrw' => $response->rtrw,
                'kodepos' => $response->kodepos,
                'notelp' => $response->notelp
            );
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );

        echo json_encode($data);
    }

    function SimpanRegistrasi()
    {
        $statuspasien = $this->input->post('statuspasien');
        $tujuanperiksa = $this->input->post('tujuanperiksa');
        $jenispasien = $this->input->post('jenispasien');
        $namapasien = $this->input->post('namapasien');
        $titlepasien = $this->input->post('titlepasien');
        $tempatlahir = $this->input->post('tempatlahir');
        $tgllahir = date('Y-m-d', strtotime($this->input->post('tgllahir')));
        $jeniskelamin = $this->input->post('jeniskelamin');
        $alamat = $this->input->post('alamat');
        $propinsi = $this->input->post('propinsi');
        $kota = $this->input->post('kota');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $rtrw = $this->input->post('rtrw');
        $kodepos = $this->input->post('kodepos');
        $nocm = substr(('000000' . $this->input->post('nocm')), -6);
        $nomorkartu = $this->input->post('nomorkartu');
        $nik = $this->input->post('nik');
        $notelp = $this->input->post('notelp');
        $tanggalperiksa = date('Y-m-d', strtotime($this->input->post('tanggalperiksa')));
        $kodepoli = $this->input->post('kodepoli');
        $kdrujukanasal = $this->input->post('kdrujukanasal');
        $nomorreferensi = $this->input->post('nomorreferensi');
        $jenisreferensi = $this->input->post('jenisreferensi');
        $jenisrequest = $this->input->post('jenisrequest');
        $polieksekutif = $this->input->post('polieksekutif');
        $email = $this->input->post('email');

        $parm =  [
            'statuspasien'          => "" . $statuspasien . "",
            'tujuanpemeriksaan'     => "" . $tujuanperiksa . "",
            'jenispasien'           => "" . $jenispasien . "",
            'namapasien'            => "" . $namapasien . "",
            'titlepasien'           => "" . $titlepasien . "",
            'tempatlahir'           => "" . $tempatlahir . "",
            'tgllahir'              => "" . $tgllahir . "",
            'jeniskelamin'          => "" . $jeniskelamin . "",
            'alamat'                => "" . $alamat . "",
            'propinsi'              => "" . $propinsi . "",
            'kota'                  => "" . $kota . "",
            'kecamatan'             => "" . $kecamatan . "",
            'kelurahan'             => "" . $kelurahan . "",
            'rtrw'                  => "" . $rtrw . "",
            'kodepos'               => "" . $kodepos . "",
            'nocm'                  => "" . $nocm . "",
            'nomorkartu'            => "" . $nomorkartu . "",
            'nik'                   => "" . $nik . "",
            'notelp'                => "" . $notelp . "",
            'tanggalperiksa'        => "" . $tanggalperiksa . "",
            'kodepoli'              => "" . $kodepoli . "",
            'kdrujukanasal'         => "" . $kdrujukanasal . "",
            'nomorreferensi'        => "" . $nomorreferensi . "",
            'jenisreferensi'        => "" . $jenisreferensi . "",
            'jenisrequest'          => "" . $jenisrequest . "",
            'polieksekutif'         => "" . $polieksekutif . "",
            'email'                 => "" . $email . ""
        ];

        // var_dump($parm);
        // die;

        $token     =  $this->GetToken();
        $url = $this->API . '/registrasionline';
        /* Array Parameter Data */

        // var_dump($parm);
        // die;

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $data['hasil'] = null;

        if ($metadata->code == '200') {
            $estimasidilayani   = $this->time_convert($response->estimasidilayani);

            $data['hasil'] = array(
                "nomorantrean" => $response->nomorantrean,
                "kodebooking" => $response->kodebooking,
                "nopendaftaran" => $response->nopendaftaran,
                "nocm" => $response->nocm,
                "jenisantrean" => $response->jenisantrean,
                "estimasidilayani" => $estimasidilayani,
                "namapoli" => $response->namapoli,
                "namadokter" => $response->namadokter,
                "statuspasien" => $response->statuspasien
            );
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );

        /* 
        //sementara dummy dulu untuk mmencoba nya dan hasil nya sukses
        */

        // $data['hasil'] = array(
        //     "nomorantrean" => "001",
        //     "kodebooking" => "2106230001",
        //     "nopendaftaran" => "2106240001",
        //     "nocm" => "012987",
        //     "jenisantrean" => "2",
        //     "estimasidilayani" => "2021-06-24 07:29",
        //     "namapoli" => "Poli Jantung",
        //     "namadokter" => "dr. Asep Sopandiana, Sp.JP., FIHA",
        //     "statuspasien" => "LAMA"
        // );

        // $data['codedata'] = array(
        //     'code' => '201',
        //     'message' => 'OK'
        // );


        echo json_encode($data);
    }

    function SendMail($email, $subject, $mesage, $filedata)
    {
        // configurasi library email
        /* $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://rsukotabanjar.co.id',
            'smtp_user' => 'regonline@rsukotabanjar.co.id',
            'smtp_pass' => 'RegOnline3',
            'smtp_port' => 465, 
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ]; */
		
		$config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'simrsrsukotabanjar@gmail.com',
            'smtp_pass' => 'Simrs321',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        // send email
        $this->email->from('simrsrsukotabanjar@gmail.com', 'RSU BANJAR REGISTRASI ONLINE');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($mesage);
        $this->email->attach($filedata);

        if ($this->email->send()) {
            $data['hasil'] =  array(
                'code' => '200',
                'message' => 'Email Berhasil Dikirim'
            );
        } else {
            $data['hasil'] =  array(
                'code' => '201',
                'message' => $this->email->print_debugger()
            );
        }

        return $data;
    }

    function Cetak()
    {
        $idcetak = $this->input->post('idcetak');
        $kodebooking = $this->input->post('kodebookingval');
        $nopendaftaran = $this->input->post('nopendaftaranval');
        $nocm = $this->input->post('nocmval');
        $nomorantrean = $this->input->post('nomorantreanval');
        $jenisantrean = $this->input->post('jenisantreanval');
        $estimasidilayani = $this->input->post('estimasidilayanival');
        $namapoli = $this->input->post('namapolival');
        $namadokter = $this->input->post('namadokterval');
        $statuspasien = $this->input->post('statuspasienval');
        $email = $this->input->post('email');
        $subject    = 'Bukti Registrasi Online';
        $mesage     = 'Silahkan bawa bukti hasil registrasi online ini saat daftar ulang ke Rumah Sakit.';
        $this->GenerateQrcode($kodebooking, $estimasidilayani);

        $data['cetak'] = [
            'kodebooking' => $kodebooking,
            'nopendaftaran' => $nopendaftaran,
            'nocm' => $nocm,
            'nomorantrean' => $nomorantrean,
            'jenisantrean' => $jenisantrean,
            'estimasidilayani' => $estimasidilayani,
            'namapoli' => $namapoli,
            'namadokter' => $namadokter,
            'statuspasien' => $statuspasien
        ];

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        // $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        // filename dari pdf ketika didownload
        $file_pdf = 'RSUBANJAR_' . $kodebooking . '.pdf';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('Cetak_noantrian', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        // $this->load->view('Cetak_noantrian', $data);

        // 1. jika kirim email 2. jika unduh file
        $filedata   =  'assets/pdf/' . $file_pdf;
        if ($idcetak == '1') {
            $data = $this->SendMail($email, $subject, $mesage, $filedata);
            unlink($filedata);
            unlink('assets/img/qrcode/' . $kodebooking . '.png');
        } else {
            $data['hasil'] =  array(
                'code' => '200',
                'message' => 'File Berhasil Diunduh'
            );
        }
        echo json_encode($data);
    }

    function RemoveFile()
    {
        $kodebooking = $this->input->post('kodebooking');
        if (unlink('assets/pdf/RSUBANJAR_' . $kodebooking . '.pdf')) {
            if (unlink('assets/img/qrcode/' . $kodebooking . '.png')) {
                $data['hasil'] =  array(
                    'code' => '200',
                    'message' => 'Email Berhasil Dikirim'
                );
            } else {
                $data['hasil'] =  array(
                    'code' => '201',
                    'message' => $this->email->print_debugger()
                );
            }
        } else {
            $data['hasil'] =  array(
                'code' => '201',
                'message' => $this->email->print_debugger()
            );
        }

        echo json_encode($data);
    }

    function GenerateQrcode($kodebooking, $estimasidilayani)
    {
        // date('d-m-Y', strtotime($response->tgllahir))
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/img/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $kodebooking . '.png'; //buat name dari qr code sesuai dengan kodebooking

        $params['data'] = $kodebooking . date('dmY', strtotime($estimasidilayani)); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }

    function AmbilDataPasienBPJS()
    {
        $parmpeserta = $this->input->post('nopeserta');
        if (strlen(trim($parmpeserta)) > '13') {
            $data = $this->GetBPJSByNoRujukan($parmpeserta);
        } else {
            $data = $this->GetBPJSByNoPeserta($parmpeserta);
        }

        echo json_encode($data);
    }

    function GetBPJSByNoRujukan($nosrtrujukan)
    {
        // $nosrtrujukan = $this->input->post('nosrtrujukan');
        // $nosrtrujukan = '102312020721P000038';

        $token     =  $this->GetToken();
        $url = $this->API . '/getpolirujukan';

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        $parm =  ['NoRujukan' => "" . $nosrtrujukan . ""];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $data['hasil'] = null;

        if ($metadata->code == '200') {
            // if ($response->jk == 'L') {
            //     $jeniskelamin = 'Laki-laki';
            // } else {
            //     $jeniskelamin = 'Perempuan';
            // };

            $data['hasil'] = array(
                'noKartu' => $response->noKartu,
                'noKunjungan' => '',
                'nik' => $response->nik,
                'noRM' => $response->noRM,
                'nama' => $response->nama,
                'tglLahir' => date('d-m-Y', strtotime($response->tglLahir)),
                'telepon' => $response->telepon,
                'jk' => $response->jk,
                'statuspeserta' => $response->statuspeserta,
                'kdpoli' => $response->kdpoli,
                'nmpoli' => $response->nmpoli
            );
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );

        return $data;
    }

    function GetBPJSByNoPeserta($nopeserta)
    {
        // $nopeserta = $this->input->post('nopeserta');
        // $nosrtrujukan = '102312020721P000038';
        $token     =  $this->GetToken();
        $url = $this->API . '/getrujukanbpjspeserta';

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        $parm =  ['NoPeserta' => "" . $nopeserta . ""];

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $data['hasil'] = null;

        if ($metadata->code == '200') {
            // if ($response->jk == 'L') {
            //     $jeniskelamin = 'Laki-laki';
            // } else {
            //     $jeniskelamin = 'Perempuan';
            // };

            $data['hasil'] = array(
                'noKartu' => $response->noKartu,
                'noKunjungan' => $response->noKunjungan,
                'nik' => $response->nik,
                'noRM' => $response->noRM,
                'nama' => $response->nama,
                'tglLahir' =>  date('d-m-Y', strtotime($response->tglLahir)),
                'telepon' => $response->telepon,
                'jk' => $response->jk,
                'statuspeserta' => $response->statuspeserta,
                'kdpoli' => $response->kdpoli,
                'nmpoli' => $response->nmpoli
            );
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );
        // var_dump($data);
        // die;
        return $data;
    }

    function GetHariLibur()
    {
        $jumlahhari = $this->input->post('jumlahhari');
        
		$arrContextOptions=array(
								"ssl"=>array(
									"verify_peer"=>false,
									"verify_peer_name"=>false,
								),
							); 

        // $jumlahhari     = 30;
		
		$array  = json_decode(file_get_contents("https://www.googleapis.com/calendar/v3/calendars/id.indonesian.official%23holiday%40group.v.calendar.google.com/events?key=AIzaSyC3Bcn-hLwhY_lhffxKLvFjIT7vwhLKqu8",false, stream_context_create($arrContextOptions)),true);
		
		
		// date_default_timezone_set("Asia/Jakarta");
        // $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"), true);
        
		//$array = json_decode(file_get_contents("https://www.googleapis.com/calendar/v3/calendars/id.indonesian.official%23holiday%40group.v.calendar.google.com/events?key=AIzaSyC3Bcn-hLwhY_lhffxKLvFjIT7vwhLKqu8"), true);
        
		 //var_dump($array["items"]);
        // var_dump($array["items"][0]["start"]["date"]);
        // var_dump(array_search('2020-08-17', array_column($array["items"][1], 'date')));
        

        $tglawal        = date('Y-m-d');

        $a = 1;
        while ($a <= $jumlahhari) {
            $tanggal = date('Y-m-d', strtotime($tglawal . ' + ' . $a . ' days'));

            foreach ($array["items"] as $key => $value) {
                // var_dump($value["summary"], date($value["start"]["date"]), $value["end"]["date"]);
                if (date($value["start"]["date"]) <= $tanggal &&  date($value["end"]["date"] > $tanggal)) {
                    $tanggallibur = $tanggal;
                    goto end;
                } else {
                    $tanggallibur = '';
                }
            }

            // die;
            //jika hari libur atau hari minggu
            end:
            if (($tanggallibur != '' && $tanggallibur != null) || Date('N', strtotime($tanggal)) === '7') {
                $hasiltanggal[] = date('d-m-Y', strtotime($tanggal));
            }
            $a++;
        }


        // $a = 1;
        // while ($a <= $jumlahhari) {
        //     $tanggal = date('Ymd', strtotime($tglawal . ' + ' . $a . ' days'));

        //     //jika hari libur atau hari minggu
        //     if (isset($array[$tanggal]) || Date('N', strtotime($tanggal)) === '7') {
        //         $hasiltanggal[] = date('Y-m-d', strtotime($tanggal));
        //     }
        //     $a++;
        // }
         //var_dump($hasiltanggal);
         //die;

        echo json_encode($hasiltanggal);
    }
}
