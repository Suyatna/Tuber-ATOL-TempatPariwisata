<?php
    // define('BASEPATH') OR exit('No direct script access allowed');

    class admin_login extends CI_Controller
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
            $this->load->view('admin_login');
        }

        public function index_admin_dashboard(){
            $this->load->view('admin/header');
            $this->load->view('admin/dashboard');
            $this->load->view('admin/footer');
        }

        public function adminAction(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $userData = $this->admin_model->getDataByNIP($username);
                
            if ($this->input->method() != 'post')
            {
                redirect('/');
            }
            elseif ($userData->num_rows() == null)
            {
                $this->session->set_flashdata('peringatan', 'Username Tidak Ditemukan');
            }
            elseif ($userData->num_rows() != null)
            {
                foreach ($userData->result() as $data)
                {
                    $data_user['nip'] = $data->nip;
                    $data_user['nama'] = $data->nama;
                    $data_user['password'] = $data->password;
                    $data_user['akses_wilayah'] = $data->akses_wilayah;
                    
                    $_SESSION['nama'] = $data->nama;
                    $_SESSION['akses_wilayah'] = $data->akses_wilayah;
                    
                    $this->session->set_userdata($data_user);                                    

                    // if ($data->level == "SuperAdmin")
                    // {
                    //     redirect('dashboard');
                    // }
                    redirect('dashboard');
                }
            }
            else
            {
                $this->session->set_flashdata('peringatan', 'Password Salah');
            }
            
            $this->load->view('admin_login');
        }        
    }
    
?>