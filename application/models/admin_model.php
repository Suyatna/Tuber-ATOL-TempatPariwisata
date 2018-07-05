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
            // connect query
            $query = $this->db->query("SELECT * FROM tb_wisata");            
            return $query;
        }

        // Looking for last id_wisata (FK)
        function getIdWisata()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(id_wisata) as ID FROM tb_wisata");            
            return $query;            
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
    }    
?>