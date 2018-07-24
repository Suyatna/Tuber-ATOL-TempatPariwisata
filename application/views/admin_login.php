<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css">
</head>
<body>
    <center>
        <br><br>
        <h4>ADMINISTRATOR</h4>
        <br><br><br>

        <div class="container">
            <div class="z-depth-1 grey lighten-4 rows" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                <form action="<?php echo base_url().'login' ?>" class="form" method="post">                    
                    <?php

                        if ($this->session->flashdata('peringatan'))
                        {
                            // isi data
                    ?>
                        <p align="center"><font color="red"><i><b><?php echo $this->session->flashdata('peringatan'); ?></b></i></font></p>
                    <?php
                            // penutupan isi data
                        }
                    ?>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="username" id="username" value="" required/>
                            <label for="username">Username</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password" name="password" id="password" value="" required/>
                            <label for="password">Password</label>
                        </div>
                        <label style="float: right;">
                            <a href="#" class="pink-text"><b>Lupa Password?</b></a>
                        </label>
                    </div>

                    <br />
                    <center>
                        <div class="row">
                            <button type="submit" name="" class="col s12 btn btn-large waves-effect indigo">Login</button>                            
                        </div>
                    </center>
                    
                </form>                
            </div>
        </div>
        
        <br>
        <a href="#!">Create account</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
</body>
</html>