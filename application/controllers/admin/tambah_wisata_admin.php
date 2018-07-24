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

        /*
        * #region Tampil Data Wisata
        */

        public function getKecamatan($idKabupaten)
        {
            $kabupaten = $idKabupaten;
            
            $kecamatan = $this->admin_model->getDataKecamatanByKabupaten($kabupaten)->result();
            echo json_encode($kecamatan);
        }

        public function getKelurahan($idKecamatan)
        {
            $kecamatan = $idKecamatan;
            
            $kelurahan = $this->admin_model->getDataKelurahanByKecamatan($kecamatan)->result();
            echo json_encode($kelurahan);
        }

        /*
        * #endregion Tampil Data Wisata
        */

        /*
        * #region Tambah Data Wisata
        */

        function tambahDataWisata()
        {
            $id_wisata = $this->input->post('id_wisata');
            $id_kabupaten = $this->input->post('id_kabupaten');
            $id_kecamatan = $this->input->post('id_kecamatan');
            $id_kelurahan = $this->input->post('id_kelurahan');
            $nama_wisata = $this->input->post('nama_wisata');
            $latitude = $this->input->post('latitude');
            $langitude = $this->input->post('langitude');
            $alamat = $this->input->post('alamat');
            $no_telp = $this->input->post('no_telp');
            $tiket_dewasa = $this->input->post('tiket_dewasa');
            $tiket_anak = $this->input->post('tiket_anak');
            $deskripsi = $this->input->post('deskripsi');
            $aktifasi = 'T';

            $data = array (
                'id_wisata' => $id_wisata,
                'id_kabupaten' => $id_kabupaten,
                'id_kecamatan' => $id_kecamatan,
                'id_kelurahan' => $id_kelurahan,
                'nama_wisata' => $nama_wisata,
                'latitude' => $latitude,
                'langitude' => $langitude,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'tiket_dewasa' => $tiket_dewasa,
                'tiket_anak' => $tiket_anak,
                'deskripsi' => $deskripsi,
                'aktifasi' => $aktifasi
            );
            // echo json_encode($data);
            $this->admin_model->insertDataWisata($data, 'tb_wisata');
            redirect('admin/wisata_admin');
        }

        /*
        * #endregion Tambah Data Wisata
        */
    }    
?>