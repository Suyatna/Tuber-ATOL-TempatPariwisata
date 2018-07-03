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
            $query['hasil'] = $this->admin_model->getDataWisata();          
            
            // $colors['warna'] = array("red", "green", "blue", "yellow");

            $this->load->view('admin/header');
            $this->load->view('admin/wisata', $query);
            $this->load->view('admin/footer');
        }        
    }
?>