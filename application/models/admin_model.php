<?php
    // if (!define('BASEPATH')) {
    //     exit('No direct script access allowed');
    // }

    class admin_model extends CI_Model
    {
        /*        
        * #region Tampilan Login
        */
        // Login Admin
        function getDataByUsername($username)
        {
            $query = $this->db->get_where('tb_admin', ['username' => $username]);
            return $query;
        }

        // Calling table tb_wisata
        function getDataWisata()
        {
            // connect query
            $query = $this->db->query("SELECT * FROM tb_wisata WHERE aktifasi='T'");            
            return $query;
        }

        /*        
        * #endregion Tampilan Login
        */

        /*        
        * #region Data Kecamatan dan Data Kelurahan
        */        

        function getDataKecamatan()
        {
            // connect query
            $query = $this->db->query("SELECT * FROM tb_kecamatan");            
            return $query;
        }

        function getDataKelurahan()
        {
            // connect query
            $query = $this->db->query("SELECT * FROM tb_kelurahan");            
            return $query;
        }

        function insertDataKabupaten($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function insertDataKecamatan($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function insertDataKelurahan($data, $table)
        {
            $this->db->insert($table, $data);
        }

        /*        
        * #endregion Data Kecamatan dan Data Kelurahan
        */

        /*        
        * #region Data Wisata
        */

        // Looking for last id_wisata (FK)
        function getIdWisata()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(id_wisata) as ID FROM tb_wisata");            
            return $query;            
        }

        function insertDataWisata($data, $table)
        {
            $this->db->insert($table, $data);
        }

        // Give me data from tb_kabupaten please!
        function getDataKabupaten()
        {
            // connect query
            $query = $this->db->query("SELECT * FROM tb_kabupaten");            
            return $query;
        }

        // Give me data from tb_kecamatan also
        function getDataKecamatanByKabupaten($idKabupaten)
        {
            // connect query
            $query = $this->db->query("SELECT id_kecamatan, nama_kecamatan FROM tb_kecamatan LEFT JOIN tb_kabupaten ON tb_kabupaten.id_kabupaten = tb_kecamatan.id_kabupaten WHERE tb_kabupaten.id_kabupaten = ".$idKabupaten);            
            return $query;
        }

        // And give me data from tb_kelurahan
        function getDataKelurahanByKecamatan($idKecamatan)
        {
            // connect query
            $query = $this->db->query("SELECT id_kelurahan, nama_kelurahan FROM tb_kelurahan WHERE id_kecamatan = ".$idKecamatan);            
            return $query;
        }

        /*        
        * #endregion Data Wisata
        */
    }    
?>