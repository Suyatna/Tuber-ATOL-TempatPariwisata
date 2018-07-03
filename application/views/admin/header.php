<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN</title>
    <!-- CSS--> 
    <link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<style>

    .modal-content{
        width: 520px;
        /*background:url(../images/laptop.jpg); transaparan*/
    }
    .modal-header{
        background-color: darkblue;
        color:white !important;
        text-align: center;
        font-size: 30px;
    }
    .modal-body{
        width: 450px;
        padding: 20px;
        border-radius: 5px;
        margin: 0 auto;
    }
    .modal-footer {
        background-color: #424242;
    }
    .login-block button{
        background: darkblue;
    }
    
</style>
</head>
<body>
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="blue">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="#" class="brand-logo darken-1">MARI BERWISATA</a></h1>
                </div>
            </nav>
        </div>
    </header>

    <div id="main">
        <div class="wrapper">

            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li>
                                        <a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold">
                        <a href="#" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi-action-list"></i> KOTA / KABUPATEN</a>
                    <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi-action-list"></i> KECAMATAN</a>
                    <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi-action-list"></i> KELURAHAN</a>
                    <li class="bold"><a href="<?php echo base_url().'admin_wisata' ?>"" class="waves-effect waves-cyan"><i class="mdi-action-list"></i> WISATA</a>
                    
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>        
        </div>
    </div>
</body>
</html>