<?php
    class tambah_wisata_admin extends CI_Controller
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
            // Connect query
            $query = $this->admin_model->getIdWisata();

            foreach ($query->result_array() as $row) {
                $result['id_wisata'] = $row['ID'] + 1;
            }

            // Connect query again
            $result['data_kabupaten'] = $this->admin_model->getDataKabupaten();                        

            $this->load->view('admin/header');
            $this->load->view('admin/tambah_wisata_admin', $result);
            $this->load->view('admin/footer');
        }

        public function getKecamatan($idKabupaten) {
            $kabupaten = $idKabupaten;
            
            $kecamatan = $this->admin_model->getDataKecamatanByKabupaten($kabupaten)->result();
            echo json_encode($kecamatan);
        }

        public function getKelurahan($idKecamatan) {
            $kecamatan = $idKecamatan;
            
            $kelurahan = $this->admin_model->getDataKelurahanByKecamatan($kecamatan)->result();
            echo json_encode($kelurahan);
        }
    }    
?>