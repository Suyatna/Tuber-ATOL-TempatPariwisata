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
                            <div id="table-datatables">
                                <h4 class="header">Data Wisata</h4>
                                <hr>
                                <div class="row">            
                                    <div class="col s12 m8 19">
                                        <a href="<?php echo base_url().'tambah_wisata_admin'; ?>" class="btn blue ">Tambah<i class="mdi-av-playlist-add right"></i></a>
                                        <a href="#" class="btn cyan waves-effect waves-light">Excel<i class="mdi-action-print right"></i></a>
                                        <a class="btn waves-effect waves-light indigo" href="#">PDF<i class="mdi-action-print right"></i></a>
                                        <br>
                                        <br>
                                        <table id="example" class="responsive-table display" cellspacing="0">

                                            <thead>                  
                                                <tr>
                                                    <th>Id Wisata</th>
                                                    <th>Id Kota / Kabupaten</th>
                                                    <th>Id Kecamatan</th>
                                                    <th>Id Kelurahan</th>
                                                    <th>Nama Wisata</th>
                                                    <th> Latitude </th>
                                                    <th> Langitude </th>
                                                    <th> Alamat </th>
                                                    <th>Nomor Telepon</th>
                                                    <th>Tiket Dewasa</th>
                                                    <th>Tiket Anak</th>
                                                    <th> Deskripsi </th>
                                                    <th style="text-align:center" colspan="2">Detail</th>
                                                    <th style="text-align:center" colspan="2">Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php 
                                                    foreach ($hasil->result_array() as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_wisata']; ?></td>
                                                        <td><?php echo $value['id_kabupaten']; ?></td>
                                                        <td><?php echo $value['id_kecamatan']; ?></td>
                                                        <td><?php echo $value['id_kelurahan']; ?></td>
                                                        <td><?php echo $value['nama_wisata']; ?></td>
                                                        <td><?php echo $value['latitude']; ?></td>
                                                        <td><?php echo $value['langitude']; ?></td>
                                                        <td><?php echo $value['alamat']; ?></td>
                                                        <td><?php echo $value['no_tlp']; ?></td>
                                                        <td><?php echo $value['tiket_dewasa']; ?></td>
                                                        <td><?php echo $value['tiket_anak']; ?></td>
                                                        <td><?php echo $value['deskripsi']; ?></td>
                                                        <td>
                                                            <a href="#" data-toggle="#" data-target="#" class="modal-trigger" style="color:purple" rel="tooltip" title="Foto"><i class="material-icons">insert_photo</i>Foto</a> &nbsp;
                                                        </td>
                                                        <td>
                                                            <a href="#" data-toggle="#" data-target="#" class="modal-trigger" style="color:purple" rel="tooltip" title="Deskripsi"><i class="material-icons">description</i>Deskripsi</a> &nbsp;
                                                        </td>
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

        $('.ok').on('click', function(e) {
            // alert($("#data-table-simple tr.selected td:first").html());            
        });

        function ConfirmDelete()
        {
            console.log(tempValueId);            
            location.replace("<?php echo base_url() . 'hapus_wisata_admin/'?>" +tempValueId +"<?php ; ?>");
        }

        function ConfirmEdit()
        {
            console.log(tempValueId);
            location.replace("<?php echo base_url() . 'edit_wisata_admin/'?>" +tempValueId +"<?php ; ?>");
        }

        
    </script>
</body>
</html>