<?php
    class foto_wisata_admin extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin_model');
            $this->load->library('session'); 
            $this->load->database();          
            $this->load->helper('url');

            $this->load->helper(array('form', 'url'));

            date_default_timezone_set('Asia/Jakarta');
        }

        public function index($idWisata)
        {
            $query['id_wisata'] = $idWisata;

            $_SESSION['id_wisata_gambar'] = $idWisata;

            // Connect query
            $result = $this->admin_model->getIdGambar();

            foreach ($result->result_array() as $row) {
                $query['id_gambar'] = $row['ID'] + 2;

                $_SESSION['id_gambar'] = $query['id_gambar'];
            }

            // Connect query
            $query['data_gambar'] = $this->admin_model->getDataGambar($idWisata);

            $this->load->view('admin/header');            
            $this->load->view('admin/foto_wisata_admin', array('error' => ' ',  'data_gambar' => $query['data_gambar']));
            $this->load->view('admin/footer');
        }        

        public function insertPhoto($gambar)
        {
            $id_gambar = $_SESSION['id_gambar'];
            $id_wisata = $_SESSION['id_wisata_gambar'];
            $tempGambar = $gambar;           

            $data = array (
                'id_gambar' => $id_gambar,
                'id_wisata' => $id_wisata,
                'gambar' => $tempGambar
            );
            echo json_encode($data);
            $this->admin_model->insertDataGambar($data, 'tb_gambar_wisata');
            redirect('admin/wisata_admin');
        }
    }    
?>