<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah Kabupaten</title>
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
                                <h4 class="header">Tambah Kabupaten</h4>
                                <hr>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="card-panel">
                                            <div class="row">

                                                <form class="col s12" action="<?php echo base_url() .'post_kabupaten_admin'; ?>" method="POST">
                                                
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="id_kabupaten" type="number" required>
                                                            <label for="id_kabupaten">Id Kabupaten</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="" name="nama_kabupaten" type="text" required>
                                                            <label for="nama_kabupaten">Nama Kabupaten</label>
                                                        </div>

                                                    </div>                                                    

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <button class="btn cyan waves-effect waves-light" type="submit" name="action">Tambah
                                                                <i class="mdi-content-send right"></i>
                                                            </button>
                                                            <a href="<?php echo base_url() .'kabupaten_admin'; ?>" class="btn red waves-effect waves-light right">Batal
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
</body>
</html>