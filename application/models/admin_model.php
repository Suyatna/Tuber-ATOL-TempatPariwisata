<?php
    // if (!define('BASEPATH')) {
    //     exit('No direct script access allowed');
    // }

    class admin_model extends CI_Model
    {
        // Login Admin
        function getDataByUsername($username)
        {
            $query = $this->db->get_where('tb_admin', ['username' => $username]);
            return $query;
        }

        // Calling table tb_wisata
        function getDataWisata()
        {
            $query = $this->db->query("SELECT * FROM tb_wisata");            
            return $query;
        }
    }
    
?>