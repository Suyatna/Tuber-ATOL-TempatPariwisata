<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Kecamatan</title>
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
                        <div class="divider"></div>            
                            <div id="table-datatables">
                                <h4 class="header">Data Kecamatan</h4>
                                <hr>
                                <div class="row">            
                                    <div class="col s12 m8 19">
                                        <a href="<?php echo base_url() .'tambah_kecamatan_admin'; ?>" class="btn blue ">Tambah<i class="mdi-av-playlist-add right"></i></a>
                                        <a href="#" class="btn cyan waves-effect waves-light">Excel<i class="mdi-action-print right"></i></a>
                                        <a class="btn waves-effect waves-light indigo" href="#">PDF<i class="mdi-action-print right"></i></a>
                                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">

                                            <thead>                  
                                                <tr>                                                    
                                                    <th>Id Kecamatan</th>
                                                    <th>Id Kabupaten</th>
                                                    <th>Nama Kecamatan</th>
                                                    <th style="text-align:center" colspan="2">Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php 
                                                    foreach ($hasil->result_array() as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_kecamatan']; ?></td>
                                                        <td><?php echo $value['id_kabupaten']; ?></td>
                                                        <td><?php echo $value['nama_kecamatan']; ?></td>
                                                        <td>
                                                            <a href="#modal1" data-target="modal1" class="modal-trigger" style="color:red" rel="tooltip" title="Hapus"><i class="mdi-action-delete"></i>Hapus</a> &nbsp;
                                                        </td>
                                                        <td>
                                                            <a href="#modal1" data-target="modal1" class="modal-trigger" style="color:blue" rel="tooltip" title="Edit"><i class="mdi-editor-mode-edit"></i>Edit</a> &nbsp;
                                                        </td>
                                                    </tr>                                                                                             
                                                <?php } ?>

                                                <!-- Modal Structure -->
                                                <div id="modal1" class="modal">
                                                    <div class="modal-content">
                                                        <h4>Peringatan!</h4>
                                                        <p>Apakah anda ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a class="modal-action modal-close waves-effect waves-green btn-flat" id="alert_close" aria-hidden="true"> Tidak</a>

                                                    <a href="#!" class="modal-action waves-effect waves-blue btn-flat">Ya</a>
                                                    </div>
                                                </div>
                                            </tbody>

                                        </table>                            
                                    </div>
                                </div>
                            </div> 
                            <br>       
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
</body>
</html>