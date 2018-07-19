<?php
    class tambah_kelurahan_admin extends CI_Controller
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
            // Connect query again            
            $result['data_kabupaten'] = $this->admin_model->getDataKabupaten();  

            $this->load->view('admin/header');
            $this->load->view('admin/tambah_kelurahan_admin', $result);
            $this->load->view('admin/footer');
        }

        /*
        * #region Tambah Data Kelurahan
        */

        function tambahDataKelurahan()
        {
            $id_kecamatan = $this->input->post('id_kecamatan');
            $id_kelurahan = $this->input->post('id_kelurahan');
            $nama_kelurahan = $this->input->post('nama_kelurahan');

            $data = array (
                'id_kecamatan' => $id_kecamatan,
                'id_kelurahan' => $id_kelurahan,
                'nama_kelurahan' => $nama_kelurahan                
            );
            // echo json_encode($data);
            $this->admin_model->insertDataKelurahan($data, 'tb_kelurahan');
            redirect('admin/kelurahan_admin');
        }

        /*
        * #endregion Tambah Data Kelurahan
        */
    }
?>