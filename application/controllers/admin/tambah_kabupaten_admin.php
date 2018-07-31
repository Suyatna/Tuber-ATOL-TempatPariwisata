<?php
    class tambah_kabupaten_admin extends CI_Controller
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
            $this->load->view('admin/header');
            $this->load->view('admin/tambah_kabupaten_admin');
            $this->load->view('admin/footer');
        }

        /*
        * #region Tambah Data Kabupaten
        */

        function tambahDataKabupaten()
        {
            $id_kabupaten = $this->input->post('id_kabupaten');
            $nama_kabupaten = $this->input->post('nama_kabupaten');

            $data = array (                
                'id_kabupaten' => $id_kabupaten,
                'nama_kabupaten' => $nama_kabupaten,
                'status' => 'tidak'
            );
            // echo json_encode($data);
            $this->admin_model->insertDataKabupaten($data, 'tb_kabupaten');
            redirect('admin/kabupaten_admin');
        }

        /*
        * #endregion Tambah Data Kabupaten
        */
    }
?>