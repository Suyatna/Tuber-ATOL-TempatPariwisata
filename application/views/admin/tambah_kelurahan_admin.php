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
                                <h4 class="header">Tambah Kelurahan</h4>
                                <hr>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="card-panel">
                                            <div class="row">

                                                <form class="col s12" action="<?php echo base_url() .'post_kelurahan_admin'; ?>" method="POST">
                                                    
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
                                                            <input id="" name="id_kelurahan" type="text" required>
                                                            <label for="id_kelurahan">Id Kelurahan</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="nama_kelurahan" type="text" required>
                                                            <label for="nama_kelurahan">Nama Kelurahan</label>
                                                        </div>

                                                    </div>                                                    

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <button class="btn cyan waves-effect waves-light" type="submit" name="action">Tambah
                                                                <i class="mdi-content-send right"></i>
                                                            </button>
                                                            <a href="<?php echo base_url() .'kelurahan_admin'; ?>" class="btn red waves-effect waves-light right">Batal
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

                    //                  
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
        
    </script>         
</body>
</html>