<?php

use Dompdf\Dompdf;

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
        // $this->API = "http://simrs.rsukotabanjar.co.id/ws-rsubanjar";
        $this->API = "http://172.16.0.3/wg-rsubanjar";
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
                'statuspasien' => $response->statuspasien
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
                'statuspasien' => $response->statuspasien
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
        // $nopendaftaran = '2105100010';

        $data = $this->GetBookingPasienbynoreg($nopendaftaran);
        if ($data['codedata']['code'] != '200') {
            $data = $this->GetBookingPasienbynobooking($nopendaftaran);
        }

        echo json_encode($data);
    }

    function Cetak()
    {
        $kodebooking = $this->input->post('kodebooking');
        $nopendaftaran = $this->input->post('nopendaftaran');
        $nocm = $this->input->post('nocm');
        $nomorantrean = $this->input->post('nomorantrean');
        $jenisantrean = $this->input->post('jenisantrean');
        $estimasidilayani = $this->input->post('estimasidilayani');
        $namapoli = $this->input->post('namapoli');
        $namadokter = $this->input->post('namadokter');
        $statuspasien = $this->input->post('statuspasien');

        $this->GenerateQrcode($kodebooking);

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

        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->filename = "Laporan-Dompdf-Codeigniter.pdf";
        // $this->pdf->load_view('CetakBuktiReservasi', $data);

        $this->load->view('Cetak_noantrian', $data);
    }

    function GenerateQrcode($kodebooking)
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

        $image_name = $kodebooking . '.png'; //buat name dari qr code sesuai dengan kodebooking

        $params['data'] = $kodebooking; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }
}
