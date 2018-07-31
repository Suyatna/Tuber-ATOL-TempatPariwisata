<?php
    class kecamatan_admin extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin_model');
            $this->load->library('session'); 
            $this->load->database();          
            $this->load->helper('url');

            date_default_timezone_set('Asia/Jakarta');
        }

        public function index()
        {
            $akses_wilayah = $_SESSION['akses_wilayah'];
            $query['hasil'] = $this->admin_model->getDataKecamatan($akses_wilayah);                              

            $this->load->view('admin/header');
            $this->load->view('admin/kecamatan_admin', $query);
            $this->load->view('admin/footer');
        }

        public function hapusKecamatanAdmin($idKecamatan)
        {         
            $id = $idKecamatan;   
            $data = array (
                'status' => 'hapus'
            );

            $this->admin_model->deleteDataKecamatan($id, $data);
            redirect('admin/kecamatan_admin');
        }
    }
?>