<?php
    class tambah_kecamatan_admin extends CI_Controller
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
            $this->load->view('admin/tambah_kecamatan_admin', $result);
            $this->load->view('admin/footer');
        }

        /*
        * #region Tambah Data kecamatan
        */
        
        function tambahDataKecamatan()
        {            
            $id_kabupaten = $this->input->post('id_kabupaten');
            $id_kecamatan = $this->input->post('id_kecamatan');
            $nama_kecamatan = $this->input->post('nama_kecamatan');

            $data = array (                
                'id_kabupaten' => $id_kabupaten,
                'id_kecamatan' => $id_kecamatan,
                'nama_kecamatan' => $nama_kecamatan
            );
            // echo json_encode($data);
            $this->admin_model->insertDataKecamatan($data, 'tb_kecamatan');
            redirect('admin/kecamatan_admin');
        }

        /*
        * #endregion Tambah Data kecamatan
        */
    }
?>