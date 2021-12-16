<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('Home/Index');
        // $this->load->view('coba');
    }

    function __construct()
    {
        parent::__construct();
        $this->API = "http://simrs.rsukotabanjar.co.id/wg-rsubanjar";
        //$this->API = "http://172.16.0.3/wg-rsubanjar";
        // $this->API = "http://172.16.0.3/wg-rsubanjar_dani";
        // $this->API = "http://localhost/wg-rsubanjar";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
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

    function GetAntrianLive()
    {
        $tglperiksa = date('Y-m-d', strtotime($this->input->post('tglperiksa')));
        $kodepoli = $this->input->post('kodepoli');

        $token     =  $this->GetToken();
        $url = $this->API . '/getrekapantrianpoli';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        /* Array Parameter Data */
        $parm =  ['tanggalperiksa' => "" . $tglperiksa . "", 'kodepoli' => "" . $kodepoli . ""];

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

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );

        // $lines = file(base_url("assets/file/rujukanasal.txt"));
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            $data[] = array(
                'namapoli' => $line->namapoli,
                'totalantrian' => substr(('000' . $line->totalantrian), -3),
                'jumlahterlayani' => substr(('000' . $line->jumlahterlayani), -3)
            );
        }
        echo json_encode($data);
    }

    function GetJadwalPoliklinik()
    {
        $tglperiksa = date('Y-m-d', strtotime($this->input->post('tglperiksa')));
        $parameter = $this->input->post('parameter');

        $token     =  $this->GetToken();
        $url = $this->API . '/getjadwalpoliklinik';
        $headers = array(
            'x-token:' . $token . "",
        );

        /* Init cURL resource */
        $ch = curl_init($url);

        /* Array Parameter Data */
        /* Array Parameter Data */
        $parm =  ['TanggalPraktek' => "" . $tglperiksa . "", 'Poliklinik' => "" . $parameter . ""];
        // $parm =  ['TanggalPraktek' => "" . $tglperiksa . ""];

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

        $hasilakhir   = array(
            'response' => $response,
            'metadata' => $metadata
        );

        // $lines = file(base_url("assets/file/rujukanasal.txt"));
        $lines = $hasilakhir['response']->list;
        foreach ($lines as  $line) {

            $data[] = array(
                'KodeRuangan' => $line->KodeRuangan,
                'NamaRuangan' => $line->NamaRuangan,
                'IdPegawai' => $line->IdPegawai,
                'NamaPegawai' => $line->NamaPegawai,
                'Hari' => $line->Hari
            );
        }
        echo json_encode($data);
    }

    function upload_file()
    {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('attachment')) {
            return $this->upload->data();
        } else {
            return $this->upload->display_errors();
        }
    }

    public function KirimEmail()
    {
        $file_data = $this->upload_file();
        // configurasi library email
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $pesan = $this->input->post('message');

        $pesan = 'Nama : ' . $name . '; Email : ' . $email . '; Subject : ' . $subject . '; Pesan : ' . $pesan;

        if (is_array($file_data)) {
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
            $this->email->from('regonline@rsukotabanjar.co.id', $name);
            $this->email->to("simrsrsukotabanjar@gmail.com");
            $this->email->subject($subject);
            $this->email->message($pesan);
            $this->email->attach($file_data['full_path']);

            if ($this->email->send()) {
                if (delete_files($file_data['file_path'])) {
                    $this->session->set_flashdata('message', 'Data Berhasil Dikirim.');
                    redirect('Home');
                }
            } else {
                if (delete_files($file_data['file_path'])) {
                    $this->session->set_flashdata('message', 'Data Gagal Dikirim.');
                    redirect('Home');
                }
            };
        };
    }
}
