<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
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
    function __construct()
    {
        parent::__construct();
        $this->load->model('akuntansi/ProyekModel');
        $this->load->model('LoginModel');
        $this->LoginModel->cek_login();
    }

    public function index()
    {
        $data['surat_jalan'] = $this->ProyekModel->surat_jalan_3();
        $this->load->view('_template/header');
        $this->load->view('akuntansi/v_proyek', $data);
        $this->load->view('_template/footer');
    }

    public function list()
    {
        $akun = $_GET['akun'];
        $data = $this->ProyekModel->list($akun);
        echo json_encode($data);
    }

    public function add()
    {
        $akun = $_GET['akun'];
        $data = $this->ProyekModel->add($akun);
        return $data;
    }

    public function transfer()
    {
        $data = $this->ProyekModel->transfer();
        return $data;
    }

    public function hapus()
    {
        $id = $this->uri->segment('4');
        $data = $this->ProyekModel->hapus($id);
        echo json_encode($data);
    }

    public function detail()
    {
        $id = $this->uri->segment('4');
        $data = $this->ProyekModel->detail($id);
        echo json_encode($data);
    }
}
