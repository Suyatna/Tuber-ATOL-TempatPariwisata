<?php
    class wisata_admin extends CI_Controller
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
            $query['hasil'] = $this->admin_model->getDataWisata($akses_wilayah);

            $this->load->view('admin/header');
            $this->load->view('admin/wisata_admin', $query);
            $this->load->view('admin/footer');
        }
        
        public function hapusWisataAdmin($idWisata)
        {         
            $id = $idWisata;   
            $data = array (
                'status' => 'hapus'
            );

            $this->admin_model->deleteDataWisata($id, $data);
            redirect('admin/wisata_admin');
        }
    }
?>