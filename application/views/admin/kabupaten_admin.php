<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Kabupaten</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS--> 
    <link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen, projection">    
    
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

</head>
<body>    
    <div id="main">
        <div class="wrapper">
            <section id="content">
                <div class="container">
                    <div class="section">
                        <div class="divider"></div>            
                            <div id="table-datatables">
                                <h4 class="header">Data Kabupaten</h4>                                
                                <hr>
                                <div class="row">            
                                    <div class="col s12 m8 19">
                                        <a href="<?php echo base_url() .'tambah_kabupaten_admin'; ?>" class="btn blue ">Tambah<i class="mdi-av-playlist-add right"></i></a>
                                        <a href="#" class="btn cyan waves-effect waves-light">Excel<i class="mdi-action-print right"></i></a>
                                        <a class="btn waves-effect waves-light indigo" href="#">PDF<i class="mdi-action-print right"></i></a>
                                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">

                                            <thead>                  
                                                <tr>                                                    
                                                    <th>Id Kota / Kabupaten</th>
                                                    <th>Nama Kabupaten</th>
                                                    <th style="text-align:center" colspan="2">Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php      
                                                    foreach ($hasil->result_array() as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_kabupaten']; ?></td>
                                                        <td><?php echo $value['nama_kabupaten']; ?></td>
                                                        <td>
                                                            <a href="#modal1" data-toggle="modal" data-target="#myModal" class="modal-trigger" style="color:red" rel="tooltip" title="Hapus"><i class="mdi-action-delete"></i>Hapus</a> &nbsp;
                                                        </td>
                                                        <td>
                                                            <a href="#modal1" data-toggle="modal" data-target="#myModal2" class="modal-trigger" style="color:blue" rel="tooltip" title="Edit"><i class="mdi-editor-mode-edit"></i>Edit</a> &nbsp;
                                                        </td>
                                                    </tr>                                                                                             
                                                <?php } ?>                                                
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
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        var tempValueId = "";

        $(document).on('hidden.bs.modal', function (e) {
            var target = $(e.target);
            target.removeData('bs.modal')
            .find(".clearable-content").html('');
        });

        $("#data-table-simple tr").click(function() {
            $(this).addClass('selected').siblings().removeClass('selected');    
            var value = $(this).find('td:first').html();
            // alert(value);            
            // console.log(value);
            tempValueId = value;                  
        });

        $('.ok').on('click', function(e){
            // alert($("#data-table-simple tr.selected td:first").html());            
        });

        function ConfirmDelete()
        {
            console.log(tempValueId);            
            location.replace("<?php echo base_url() . 'hapus_kabupaten_admin/'?>" +tempValueId +"<?php ; ?>");
        }

        function ConfirmEdit()
        {
            console.log(tempValueId);            
            location.replace("<?php echo base_url() . 'edit_kabupaten_admin/'?>" +tempValueId +"<?php ; ?>");
        }
    </script>
</body>
</html>