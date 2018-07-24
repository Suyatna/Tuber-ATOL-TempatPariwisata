<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah Wisata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS--> 
    <link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>
<body>
    <div id="main">
        <div class="wrapper">
            <section id="content">
                <div class="container">
                    <div class="section">
                        <div class="divider">
                        </div>
                        <!--Basic Form-->
                        <div id="basic-form" class="section">
                            <div id="table-datatables">
                                <h4 class="header">Tambah Tempat Wisata</h4>
                                <hr>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="card-panel">
                                            <div class="row">

                                                <form class="col s12" action="<?php echo base_url() .'edit_wisata_admin'; ?>" method="POST">

                                                    <div class="row">
                                                        <div class="input-field col s1">
                                                            <input id="" name="id_wisata" type="text" value="<?php echo $id_wisata; ?>" required readonly>
                                                            <label for="id_wisata" class="active">ID Wisata</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <select id="data-kabupaten" name="id_kabupaten">
                                                                <option name="id_kabupaten" value="" disabled selected>Pilih</option>
                                                                <?php
                                                                    foreach ($data_kabupaten->result_array() as $row) {
                                                                        // isi perulangan                                                                    
                                                                ?>                                                                        
                                                                        <option value="<?php echo $row['id_kabupaten']; ?>"><?php echo $row['id_kabupaten'] .' - ' .$row['nama_kabupaten']; ?></option>                                                                        
                                                                <?php 
                                                                        // penutupan perulangan
                                                                    }
                                                                ?>

                                                            </select>
                                                            <label>ID Kota / Kabupaten</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <select id="data-kecamatan" name="id_kecamatan" class="materialSelect">
                                                                <option value="" disabled selected>Pilih Kabupaten Terlebih Dahulu</option>
                                                            
                                                            </select>
                                                            <label>ID Kecamatan</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <select id="data-kelurahan" name="id_kelurahan" class="materialSelect">
                                                                <option  value="" disabled selected>Pilih Kecamatan Terlebih Dahulu</option>
                                                                
                                                            </select>
                                                            <label>ID Kelurahann</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="nama_wisata" type="text" required>
                                                            <label for="nama_wisata">Nama Wisata</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="latitude" type="number" required>
                                                            <label for="latitude">Latitude</label>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="langitude" type="number" required>
                                                            <label for="langitude">Langitude</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <textarea name="alamat" id="textarea1" class="materialize-textarea"></textarea>
                                                            <label for="alamat">Alamat</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="no_telp" type="number" required>
                                                            <label for="no_telp">Nomor Telp</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="tiket_dewasa" type="number" required>
                                                            <label for="tiket_dewasa">Harga Tiket Dewasa</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="tiket_anak" type="number" required>
                                                            <label for="tiket_anak">Harga Tiket Anak-anak</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <textarea name="deskripsi" id="textarea1" class="materialize-textarea"></textarea>
                                                            <label for="deskripsi">Deskripsi</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <button class="btn cyan waves-effect waves-light" type="submit" name="action">Tambah
                                                                <i class="mdi-content-send right"></i>
                                                            </button>
                                                            <a href="<?php echo base_url() .'wisata_admin'; ?>" class="btn red waves-effect waves-light right">Batal
                                                                <i class="mdi-content-undo right"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script>        
        $(document).ready(function(){
                                   
            $('.materialSelect').material_select();

            $('.materialSelect').on('contentChanged', function() {
                $(this).material_select();
            });

            // update function for demo purposes
            $("select#data-kabupaten").change(function() {
                
                let idKabupaten = $(this).val()                

                $.ajax({
                    url:'api/kecamatan/'+idKabupaten,
                    method: 'GET',
                    dataType: 'json'
                }).done(function(response) {

                    TampilDataKecamatan(response);
                    HapusDataKelurahan();    
                })            
            });

            // update function for demo purposes
            $("select#data-kecamatan").change(function() {
                
                let idKecamatan = $(this).val()                

                $.ajax({
                    url:'api/kelurahan/'+idKecamatan,
                    method: 'GET',
                    dataType: 'json'
                }).done(function(response) {

                    TampilDataKelurahan(response);                   
                })          
            });
        })

        function TampilDataKecamatan(response) {
            let hasilTemplate = '';

            $("select#data-kecamatan").empty();            

            for(let index in response) {
                console.log(response[index]);

                hasilTemplate += "<option value='"+response[index].id_kecamatan+"'>"+response[index].id_kecamatan+" - "+response[index].nama_kecamatan+"</option>"
            }                            

            $('select#data-kecamatan').html(hasilTemplate)            

            // fire custom event anytime you've updated select
            $("select#data-kecamatan").trigger('contentChanged');
        }

        function TampilDataKelurahan(response) {
            let hasilTemplate = '';

            $("select#data-kelurahan").empty();

            for(let index in response) {
                console.log(response[index]);

                hasilTemplate += "<option value='"+response[index].id_kelurahan+"'>"+response[index].id_kelurahan+" - "+response[index].nama_kelurahan+"</option>"
            }                            

            $('select#data-kelurahan').html(hasilTemplate)

            // fire custom event anytime you've updated select
            $("select#data-kelurahan").trigger('contentChanged');
        }

        function HapusDataKelurahan() {
            $("select#data-kelurahan").empty();

            $('select#data-kelurahan').html('<option value="" disabled selected>Pilih Kecamatan Terlebih Dahulu</option>')

            // fire custom event anytime you've updated select
            $("select#data-kelurahan").trigger('contentChanged');
        }
        
    </script>        
</body>
</html>