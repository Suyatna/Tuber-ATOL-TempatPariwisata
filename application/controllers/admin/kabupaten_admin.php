<?php
    class kabupaten_admin extends CI_Controller
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
            $query['hasil'] = $this->admin_model->getDataKabupaten();                              

            $this->load->view('admin/header');
            $this->load->view('admin/kabupaten_admin', $query);
            $this->load->view('admin/footer');
        }
    }
?>