<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CariReservasi extends CI_Controller
{
    public function index()
    {
        $this->load->view('CariReservasi');
    }

    function __construct()
    {
        parent::__construct();
        $this->API = "http://simrs.rsukotabanjar.co.id/wg-rsubanjar";
        //$this->API = "http://172.16.0.3/wg-rsubanjar";
        // $this->API = "http://localhost/wg-rsubanjar";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->helper("file");
    }

    public function time_convert($timestamp)
    {
        // $timestamp = '1597078800';
        return date('d-m-Y H:m', $timestamp / 1000);
    }

    function GetToken()
    {
        $parm = array(
            'username'       =>  'registrasionline',
            'password'      =>  'rsu@b4nj4r'
        );

        $hasil = json_decode($this->curl->simple_post($this->API . '/gettoken', $parm, array(CURLOPT_BUFFERSIZE => 10)));
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $data   = array(
            'response' => $response,
            'metadata' => $metadata
        );

        // jika respon 200/sukses maka tidak perlu di balikan namun jika gagal maka balikan gagalnya 
        return $data['response']->token;
    }

    function GetBookingPasienbynoreg($nopendaftaran)
    {
        $token     =  $this->GetToken();

        $url = $this->API . '/getdataregistrasibynoreg';
        $parm =  ['nopendaftaran' => "" . $nopendaftaran . ""];

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
            if ($response->jenisantrean == '1') {
                $jenisantrian = 'Antrian Registrasi';
            } else {
                $jenisantrian = 'Antrian Poli';
            }
            $data['hasil'] = array(
                'kodebooking' => $response->kodebooking,
                'nomorantrean' => $response->nomorantrean,
                'nopendaftaran' => $response->nopendaftaran,
                'jenisantrean' => $jenisantrian,
                'estimasidilayani' => $estimasidilayani,
                'namapoli' => $response->namapoli,
                'namadokter' => $response->namadokter,
                'nocm' => $response->nocm,
                'statuspasien' => $response->statuspasien,
                'email' => $response->email
            );
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );

        return $data;
    }

    function GetBookingPasienbynobooking($nopendaftaran)
    {
        $token     =  $this->GetToken();

        $url = $this->API . '/getdataregistrasibykdbooking';
        $parm =  ['kdbooking' => "" . $nopendaftaran . ""];

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
            if ($response->jenisantrean == '1') {
                $jenisantrian = 'Antrian Registrasi';
            } else {
                $jenisantrian = 'Antrian Poli';
            }
            $data['hasil'] = array(
                'kodebooking' => $response->kodebooking,
                'nomorantrean' => $response->nomorantrean,
                'nopendaftaran' => $response->nopendaftaran,
                'jenisantrean' => $jenisantrian,
                'estimasidilayani' => $estimasidilayani,
                'namapoli' => $response->namapoli,
                'namadokter' => $response->namadokter,
                'nocm' => $response->nocm,
                'statuspasien' => $response->statuspasien,
                'email' => $response->email
            );
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );

        return $data;
    }

    function GetBookingPasienbyNoCm($nopendaftaran, $tglperiksa)
    {
        $nopendaftaran = substr(('000000' . $nopendaftaran), -6);
        $tglperiksa = date('Y-m-d', strtotime($this->input->post('tglperiksa')));

        $token     =  $this->GetToken();

        $url = $this->API . '/getdataregistrasibynocm';
        $parm =  ['NoCm' => "" . $nopendaftaran . "", 'TglPeriksa' => "" . $tglperiksa . ""];

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
            if ($response->jenisantrean == '1') {
                $jenisantrian = 'Antrian Registrasi';
            } else {
                $jenisantrian = 'Antrian Poli';
            }
            $data['hasil'] = array(
                'kodebooking' => $response->kodebooking,
                'nomorantrean' => $response->nomorantrean,
                'nopendaftaran' => $response->nopendaftaran,
                'jenisantrean' => $jenisantrian,
                'estimasidilayani' => $estimasidilayani,
                'namapoli' => $response->namapoli,
                'namadokter' => $response->namadokter,
                'nocm' => $response->nocm,
                'statuspasien' => $response->statuspasien,
                'email' => $response->email
            );
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );

        return $data;
    }

    function GetBookingPasienbyNik($nopendaftaran, $tglperiksa)
    {
        $tglperiksa = date('Y-m-d', strtotime($this->input->post('tglperiksa')));

        $token     =  $this->GetToken();

        $url = $this->API . '/getdataregistrasibynik';
        $parm =  ['Nik' => "" . $nopendaftaran . "", 'TglPeriksa' => "" . $tglperiksa . ""];

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
            if ($response->jenisantrean == '1') {
                $jenisantrian = 'Antrian Registrasi';
            } else {
                $jenisantrian = 'Antrian Poli';
            }
            $data['hasil'] = array(
                'kodebooking' => $response->kodebooking,
                'nomorantrean' => $response->nomorantrean,
                'nopendaftaran' => $response->nopendaftaran,
                'jenisantrean' => $jenisantrian,
                'estimasidilayani' => $estimasidilayani,
                'namapoli' => $response->namapoli,
                'namadokter' => $response->namadokter,
                'nocm' => $response->nocm,
                'statuspasien' => $response->statuspasien,
                'email' => $response->email
            );
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );

        return $data;
    }

    function GetBookingPasien()
    {
        $nopendaftaran = $this->input->post('nopendaftaran');
        $kriteria = $this->input->post('kriteria');
        $tglperiksa = $this->input->post('tglperiksa');
        // $nopendaftaran = '2105100010';

        if ($kriteria == '0') {
            $data = $this->GetBookingPasienbynobooking($nopendaftaran);
        } else if ($kriteria == '1') {
            $data = $this->GetBookingPasienbynoreg($nopendaftaran);
        } else {
            if (strlen(trim($nopendaftaran)) <= '6') {
                $data = $this->GetBookingPasienbyNoCm($nopendaftaran, $tglperiksa);
            } else {
                $data = $this->GetBookingPasienbyNik($nopendaftaran, $tglperiksa);
            }
        }

        echo json_encode($data);
    }

    function HapusBooking()
    {
        $nobooking = $this->input->post('nobooking');
        $token     =  $this->GetToken();

        $url = $this->API . '/batalregistrasi';
        $parm =  ['KdBooking' => "" . $nobooking . ""];

        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parm);

        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /* execute request */
        $result = curl_exec($ch);

        /* close cURL resource */
        curl_close($ch);
        $hasil = json_decode($result);
        $response = $hasil->response;
        $metadata = $hasil->metadata;

        $data['hasil'] = null;

        if ($metadata->code == '200') {
            $data['hasil'] = $response;
        }

        $data['codedata'] = array(
            'code' => $metadata->code,
            'message' => $metadata->message
        );

        echo json_encode($data);
    }

    function SendMail($email, $subject, $mesage, $filedata)
    {
        // configurasi library email
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://rsukotabanjar.co.id',
            'smtp_user' => 'regonline@rsukotabanjar.co.id',
            'smtp_pass' => 'RegOnline3',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


        $this->load->library('email', $config);
        $this->email->initialize($config);

        // send email
        $this->email->from('regonline@rsukotabanjar.co.id', 'RSU BANJAR REGISTRASI ONLINE');
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

        $image_name = $kodebooking  . '.png'; //buat name dari qr code sesuai dengan kodebooking

        $params['data'] = $kodebooking . date('dmY', strtotime($estimasidilayani)); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }
}
