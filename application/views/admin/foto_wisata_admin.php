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
    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {            
            send_foto();            
        }        

        function send_foto() {
            $id_gambar = $_SESSION['id_gambar'];
            $id_wisata = $_SESSION['id_wisata_gambar'];
            $nama_wisata = $_SESSION['nama_wisata'];
            $akses_wilayah = $_SESSION['nama_kabupaten'];

            $target_dir = "./Foto_Wisata/" .$akses_wilayah ."/" .$nama_wisata ."/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                    $gambar = $target_dir .basename( $_FILES["fileToUpload"]["name"]);

                    // create connection
                    $conn = mysqli_connect("localhost", "root", "", "db_atol_tubes_v3");

                    // check connection
                    if(!$conn) {
                        die("Koneksi gagal: " . mysqli_connect_error());
                    }

                    $sql = "INSERT INTO tb_gambar_wisata(id_gambar, id_wisata, gambar) VALUES('$id_gambar', '$id_wisata', '$gambar')"; 

                    if (mysqli_query($conn, $sql)) {                
                        //              
                    } else {
                        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    // redirect(base_url() . 'post_foto_wisata_admin/' .$gambar);


                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

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
                            
                                    <div class="row card">
                                        <?php 
                                            foreach ($data_gambar->result_array() as $value) {
                                        ?>
                            
                                            <div class="col s12 m6 l4">
                                                <img src="<?php echo $value['gambar']; ?>" class="materialbox responsive-img card">
                                            </div>    
                                        
                                        <?php 
                                            }
                                        ?>

                                        <form class="col s12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                                        
                                            <div class = "row">                                                
                                                <div class = "file-field input-field">
                                                    <div class = "btn">
                                                        <span>Browse</span>
                                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                                    </div>
                                                    
                                                    <div class = "file-path-wrapper" style="margin-left: 50px; width: calc(40% - 100px);">
                                                        <input class = "file-path validate" type = "text"
                                                            placeholder = "Upload file" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s12" style="padding: 0 0;">
                                                    <button class="btn cyan waves-effect waves-light" type="submit" name="action">Submit
                                                        <i class="mdi-content-send right"></i>
                                                    </button>                                                    
                                                </div>
                                            </div>

                                        </form>

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