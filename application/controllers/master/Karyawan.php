<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
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
        $this->load->model('master/KaryawanModel');
        $this->load->model('LoginModel');
        $this->LoginModel->cek_login();
    }

    public function index()
    {
        $this->load->view('_template/header');
        $this->load->view('master/v_karyawan');
        $this->load->view('_template/footer');
    }
    public function gaji()
    {
        $this->load->view('_template/header');
        $this->load->view('master/v_karyawan_gaji');
        $this->load->view('_template/footer');
    }

    public function list()
    {
        $data = $this->KaryawanModel->list();
        echo json_encode($data);
    }

    public function surat_jalan_list()
    {
        $data = $this->KaryawanModel->surat_jalan_list();
        echo json_encode($data);
    }
    public function produksi_list()
    {
        $data = $this->KaryawanModel->produksi_list();
        echo json_encode($data);
    }
    public function penjualan_list()
    {
        $data = $this->KaryawanModel->penjualan_list();
        echo json_encode($data);
    }

    public function add()
    {
        $data = $this->KaryawanModel->add();
    }

    public function hapus()
    {
        $id = $this->uri->segment('4');
        $data = $this->KaryawanModel->hapus($id);
        echo json_encode($data);
    }

    public function detail()
    {
        $id = $this->uri->segment('4');
        $data = $this->KaryawanModel->detail($id);
        echo json_encode($data);
    }

    public function konfigurasi_gaji()
    {
        $this->load->view('_template/header');
        $this->load->view('master/v_konfigurasi_gaji');
        $this->load->view('_template/footer');
    }

    public function detail_konfigurasi()
    {
        $id = $this->uri->segment('4');
        $data = $this->KaryawanModel->detail_konfigurasi($id);
        echo json_encode($data);
    }

    public function add_konfigurasi()
    {
        $data = $this->KaryawanModel->add_konfigurasi();
    }
}
