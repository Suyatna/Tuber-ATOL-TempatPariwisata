<?php
    class detail_wisata extends CI_Controller
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
            $_SESSION['id_wisata'] = $idWisata;

            // Connect query
            $query['data_wisata'] = $this->admin_model->detailWisata($idWisata);

            $this->load->view('admin/header');            
            $this->load->view('admin/detail_wisata', $query);
            $this->load->view('admin/footer');
        }

        function insertFasilitas()
        {
            $id_wisata = $_SESSION['id_wisata'] + 1;
            $fasilitas_wisata = $this->input->post('fasilitas');

            $data = array (
                'id_wisata' => $id_wisata,
                'fasilitas_wisata' => $fasilitas_wisata,
                'hrg_tkt_fasilitas' => 0
            );
            echo json_encode($data);
            $this->admin_model->insertDataDetailWisata($data, 'tb_detail_wisata');
            redirect('admin/wisata_admin');
        }
    }    
?>