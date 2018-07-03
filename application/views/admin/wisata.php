<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
                                        <a href="#" class="btn blue ">Tambah<i class="mdi-av-playlist-add right"></i></a>
                                        <a href="#" class="btn cyan waves-effect waves-light">Excel<i class="mdi-action-print right"></i></a>
                                        <a class="btn waves-effect waves-light indigo" href="#">PDF<i class="mdi-action-print right"></i></a>
                                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">

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
                                                    <th> Aksi </th>
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
                                                            <a href="#" data-target="modal1" class="modal-trigger" style="color:red" rel="tooltip" title="Hapus"><i class="mdi-action-delete"></i>Hapus</a> &nbsp;
                                                        </td>
                                                    </tr>
                                                    
                                                <!-- Modal Structure -->
                                                <div id="modal1" class="modal">
                                                <div class="modal-content">
                                                    <h4>Apakah Yakin Dihapus?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="modal-action modal-close waves-effect waves-green btn-flat" id="alert_close" aria-hidden="true"> Tidak</a>
                                                    <a href="#" class="modal-action waves-effect waves-blue btn-flat">Ya</a>
                                                </div>
                                                </div> 
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
</body>
</html>