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
        function getDataByNIP($username)
        {
            $query = $this->db->get_where('tb_admin', ['nip' => $username]);
            return $query;
        }

        // Calling table tb_wisata
        function getDataWisata($akses_wilayah)
        {
            // connect query
            $query = $this->db->query("SELECT * FROM `tb_kabupaten` WHERE nama_kabupaten = '$akses_wilayah'");
            foreach ($query->result() as $data)
            {
                $data_user['id_kabupaten'] = $data->id_kabupaten;
                $data_user['nama_kabupaten'] = $data->nama_kabupaten;
                $data_user['status'] = $data->status;

                $_SESSION['id_kabupaten'] = $data->id_kabupaten;
                $_SESSION['nama_kabupaten'] = $data->nama_kabupaten;
                
                $this->session->set_userdata($data_user);
            }

            $id_kabupaten = $_SESSION['id_kabupaten'];

            // connect query
            $query = $this->db->query("SELECT * FROM tb_wisata WHERE aktifasi='T' AND id_kabupaten = '$id_kabupaten'");
            return $query;
        }

        /*        
        * #endregion Tampilan Login
        */

        /*        
        * #region Data Kecamatan dan Data Kelurahan
        */        

        function getDataKecamatan($akses_wilayah)
        {
            // connect query
            $query = $this->db->query("SELECT * FROM `tb_kabupaten` WHERE nama_kabupaten = '$akses_wilayah'");
            foreach ($query->result() as $data)
            {
                $data_user['id_kabupaten'] = $data->id_kabupaten;
                $data_user['nama_kabupaten'] = $data->nama_kabupaten;
                $data_user['status'] = $data->status;

                $_SESSION['id_kabupaten'] = $data->id_kabupaten;
                $_SESSION['nama_kabupaten'] = $data->nama_kabupaten;
                
                $this->session->set_userdata($data_user);
            }

            $id_kabupaten = $_SESSION['id_kabupaten'];

            // connect query  
            $query = $this->db->query("SELECT * FROM tb_kecamatan WHERE id_kabupaten = '$id_kabupaten' AND status = 'tidak'");            
            return $query;
        }

        function getDataKelurahan($akses_wilayah)
        {            

            // connect query
            $query = $this->db->query("SELECT * FROM `tb_kabupaten` WHERE nama_kabupaten = '$akses_wilayah'");
            foreach ($query->result() as $data)
            {
                $data_user['id_kabupaten'] = $data->id_kabupaten;
                $data_user['nama_kabupaten'] = $data->nama_kabupaten;
                $data_user['status'] = $data->status;

                $_SESSION['id_kabupaten'] = $data->id_kabupaten;
                $_SESSION['nama_kabupaten'] = $data->nama_kabupaten;
                
                $this->session->set_userdata($data_user);
            }

            $id_kabupaten = $_SESSION['id_kabupaten'];

            // connect query  
            $query = $this->db->query("SELECT * FROM tb_kecamatan WHERE id_kabupaten = '$id_kabupaten' AND status = 'tidak'");
            foreach ($query->result() as $data)
            {
                $data_user['id_kecamatan'] = $data->id_kecamatan;
                $data_user['nama_kecamatan'] = $data->nama_kecamatan;

                $_SESSION['id_kecamatan'] = $data->id_kecamatan;
                $_SESSION['nama_kecamatan'] = $data->nama_kecamatan;
                
                $this->session->set_userdata($data_user);
            }

            $id_kecamatan = $_SESSION['id_kecamatan'];

            // connect query
            $query = $this->db->query("SELECT * FROM tb_kelurahan WHERE id_kecamatan = '$id_kecamatan'");            
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

        function deleteDataKabupaten($id, $action)
        {
            $this->db->set('status', 'hapus');
            $this->db->where('id_kabupaten', $id);
            $this->db->update('tb_kabupaten');
        }

        function deleteDataKecamatan($id, $action)
        {
            $this->db->set('status', 'hapus');
            $this->db->where('id_kecamatan', $id);
            $this->db->update('tb_kecamatan');
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

        function deleteDataWisata($id, $table)
        {
            $this->db->set('aktifasi', 'Y');
            $this->db->where('id_wisata', $id);
            $this->db->update('tb_wisata');
        }

        function updateDataWisata($id, $data)
        {
            $this->db->where('id_wisata', $id);
            $this->db->update('tb_wisata', $data);
        }

        function detailWisata($idWisata)
        {
            // connect query
            $query = $this->db->query("SELECT * FROM tb_detail_wisata WHERE id_wisata = '$idWisata';");            
            return $query;
        }

        function insertDataDetailWisata($data, $table)
        {
            $this->db->insert($table, $data);
        }

        // Give me data from tb_kabupaten please!
        function getDataKabupaten()
        {
            // connect query
            $query = $this->db->query("SELECT * FROM tb_kabupaten WHERE status ='tidak';");            
            return $query;
        }

        function updateDataKabupaten($idKabupaten, $data)
        {
            $this->db->where('id_kabupaten', $id);
            $this->db->update('tb_kabupaten', $data);
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

        function getIdGambar()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(id_gambar) as ID FROM tb_gambar_wisata");            
            return $query;
        }

        // Calling tb_gambar_wisata
        function getDataGambar($idWisata)
        {
            // connect query
            $query = $this->db->query("SELECT * FROM tb_wisata WHERE id_wisata = '$idWisata'");
            foreach ($query->result() as $data)
            {
                $data_user['nama_wisata'] = $data->nama_wisata;                
                $data_user['alamat'] = $data->alamat;

                $_SESSION['nama_wisata'] = $data->nama_wisata;                
                $_SESSION['alamat'] = $data->alamat;                
                
                $this->session->set_userdata($data_user);
            }
            
            // connect query
            $query = $this->db->query("SELECT * FROM tb_gambar_wisata WHERE id_wisata = '$idWisata'");
            return $query;
        }

        function insertDataGambar($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function countAdmin()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(nip) as nip FROM tb_admin");
            return $query;
        }

        function countKabupaten()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(id_kabupaten) as id_kabupaten FROM tb_kabupaten");
            return $query;
        }

        function countKecamatan()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(id_kecamatan) as id_kecamatan FROM tb_kecamatan");
            return $query;
        }

        function countKelurahan()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(id_kelurahan) as id_kelurahan FROM tb_kelurahan");
            return $query;
        }

        function countWisata()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(id_wisata) as id_wisata FROM tb_wisata");
            return $query;
        }

        function countGambarWisata()
        {
            // connect query
            $query = $this->db->query("SELECT COUNT(id_gambar) as id_gambar FROM tb_gambar_wisata");
            return $query;
        }

        /*        
        * #endregion Data Wisata
        */
    }    
?>