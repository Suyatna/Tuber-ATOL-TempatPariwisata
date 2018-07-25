<?php
    class admin_logout extends CI_Controller
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
            // Finally, destroy the session.            
            session_unset(); 
            session_destroy();

            redirect('/');
        }
    }
?>