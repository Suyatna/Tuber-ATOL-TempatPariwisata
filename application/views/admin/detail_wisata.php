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
                                <!-- Image Gallery -->
                                <div class="container ">                                                    
                                    <h1><?php echo $_SESSION['nama_wisata'] ?></h1>
                                    <p><?php echo $_SESSION['alamat'] ?></p>
                            
                                    <div id="card-stats">
                                        <div class="row">                                            

                                            <div class="col s12 m6 l3">
                                                <div class="card">
                                                    <div class="card-content blue-grey white-text">
                                                        <p class="card-stats-title">
                                                            <i class="mdi-action-trending-up"> Fasilitas Wisata</i>
                                                        </p>

                                                        <?php 
                                                            foreach ($data_wisata->result_array() as $value) {
                                                        ?>              
                                                            <h4 class="card-stats-number"><?php echo $value['fasilitas_wisata']; ?></h4>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </div>                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <h4 class="header">Tambah Detail Wisata</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="card-panel">
                                                <div class="row">

                                                    <form class="col s12" action="<?php echo base_url() .'tambah_detail_wisata'; ?>" method="POST">
                                                    
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <textarea name="fasilitas" id="textarea1" class="materialize-textarea"></textarea>
                                                                <label for="fasilitas">Fasilitas</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="btn cyan waves-effect waves-light" type="submit" name="action">Tambah
                                                                    <i class="mdi-content-send right"></i>
                                                                </button>
                                                                <a href="<?php echo base_url() .'detail_wisata'; ?>" class="btn red waves-effect waves-light right">Batal
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
                </div>
            </section>
        </div>
    </div>
</body>
</html>