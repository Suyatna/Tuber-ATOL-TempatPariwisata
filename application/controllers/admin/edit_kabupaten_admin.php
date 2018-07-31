<?php
    class edit_kabupaten_admin extends CI_Controller
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

        public function index($idKabupaten)
        {
            $query['id_kabupaten'] = $idKabupaten;

            // Connect query again            
            $this->load->view('admin/header');
            $this->load->view('admin/edit_kabupaten_admin', $query);
            $this->load->view('admin/footer');
        }

        public function updateKabupatenAdmin()
        {
            $id_kabupaten = $this->input->post('id_kabupaten');
            $nama_kabupaten = $this->input->post('nama_kabupaten');            

            $data = array (                
                'id_kabupaten' => $id_kabupaten,
                'nama_kabupaten' => $nama_kabupaten,
                'status' => 'tidak'
            );
            // echo json_encode($data);
            $this->admin_model->updateDataWisata($id_kabupaten, $data);
            redirect('admin/wisata_admin');
        }
    }
?>