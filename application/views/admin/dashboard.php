<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Wisata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS--> 
    <link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Modal Structure -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <h4>Peringatan!</h4>
            <p>Apakah anda ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
            <a class="modal-action modal-close waves-effect waves-green btn-flat" data-dismiss="modal" id="alert_close" aria-hidden="true"> Tidak</a>
            <a href="#!" onclick = "ConfirmDelete()" class="modal-action waves-effect waves-blue btn-flat">Ya</a>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="myModal2" class="modal">
        <div class="modal-content">
            <h4>Peringatan!</h4>
            <p>Apakah anda ingin mengedit data ini?</p>
        </div>
        <div class="modal-footer">
            <a class="modal-action modal-close waves-effect waves-green btn-flat" data-dismiss="modal" id="alert_close" aria-hidden="true"> Tidak</a>

            <a href="#!" onclick = "ConfirmEdit()" class="modal-action waves-effect waves-blue btn-flat">Ya</a>
        </div>
    </div>

    <style>
        .mrm {
            margin-right:10px;
        }
    </style>

</head>
<body>
    <div id="main">
        <div class="wrapper">
            <section id="content">
                <div class="container">
                    <div class="section">
                        <div class="divider"></div>            
                            
                            <div id="card-stats">
                                <div class="row">

                                    <div class="col s12 m6 l3">
                                        <div class="card">
                                            <div class="card-content  green white-text">
                                                <p class="card-stats-title">
                                                    <i class="mdi-social-group-add"> Jumlah Admin</i>
                                                </p>                                                
                                                <h4 class="card-stats-number"><?php echo $nip; ?></h4>
                                            </div>
                                            <br>
                                            <div class="card-content  green white-text">
                                                <p class="card-stats-title">
                                                    <i class="mdi-social-group-add"> Jumlah Kota / Kabupaten</i>
                                                </p>                                                
                                                <h4 class="card-stats-number"><?php echo $id_kabupaten; ?></h4>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="col s12 m6 l3">
                                        <div class="card">
                                            <div class="card-content purple white-text">
                                                <p class="card-stats-title">
                                                    <i class="mdi-social-group-add"> Jumlah Kecamatan</i>
                                                </p>
                                                <h4 class="card-stats-number"><?php echo $id_kecamatan; ?></h4>
                                            </div>
                                            <br>
                                            <div class="card-content purple white-text">
                                                <p class="card-stats-title">
                                                    <i class="mdi-social-group-add"> Jumlah Kelurahan</i>
                                                </p>
                                                <h4 class="card-stats-number"><?php echo $id_kelurahan; ?></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col s12 m6 l3">
                                        <div class="card">
                                            <div class="card-content blue-grey white-text">
                                                <p class="card-stats-title">
                                                    <i class="mdi-action-trending-up"> Jumlah Wisata</i>
                                                </p>
                                                <h4 class="card-stats-number"><?php echo $id_wisata; ?></h4>
                                            </div>
                                            <br>
                                            <div class="card-content blue-grey white-text">
                                                <p class="card-stats-title">
                                                    <i class="mdi-action-trending-up"> Jumlah Foto Wisata</i>
                                                </p>
                                                <h4 class="card-stats-number"><?php echo $id_gambar; ?></h4>
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
</body>
</html>