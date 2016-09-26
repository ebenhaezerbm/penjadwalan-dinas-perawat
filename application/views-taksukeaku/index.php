<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->

    <title><?php echo $title; ?></title>
    
    <!-- DATEPICKER -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

    <!-- BOOTSTRAP CORE STYLE -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    
    <!-- BOOTSTRAP DROPDOWN HOVER STYLE -->
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap-dropdownhover.min.css'); ?>" rel="stylesheet" />

    <!-- FONT AWESOME ICONS -->
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet" />
    
    <!-- SWEETALERT -->
    <link href="<?php echo base_url('assets/css/sweetalert.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/sweetalert.min.js'); ?>"></script>

    <!-- CUSTOM STYLE -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet" />
    
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        var base_url ='<?php echo base_url(); ?>';
    </script>
</head>
<body>
	<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@yourdomain.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-897-678-44
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->

    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="<?php echo base_url('assets/img/logo.png'); ?>" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="<?php echo base_url('assets/img/64-64.jpg'); ?>" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr />
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->

    <?php $user = $this->session->userdata('user'); ?>

    <section class="menu-section">
        
        <div class="container">
            
            <div class="row">
                
                <div class="col-md-12">

                    <div class="collapse navbar-collapse">
                        
                        <ul id="menu-top" class="nav navbar-nav" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
                            <li>
                                <a <?php echo ( $section == 'home' ) ? 'class="menu-top-active"': ''; ?> href="<?php echo base_url('c_Dashboard'); ?>">Home</a>
                            </li>

                            <?php if( $user ) : ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Manage <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdownhover-bottom" role="menu">
                                        <li class="dropdown">
                                            <a href="<?php echo base_url('c_Perawat'); ?>">
                                                Data Perawat <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu dropdownhover-right">
                                                <li><a href="<?php echo base_url('c_Perawat'); ?>">Semua Perawat</a></li>
                                                <li><a href="<?php echo base_url('c_Perawat/add_perawat'); ?>">Tambah Perawat</a></li>
                                            </ul>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="dropdown">
                                            <a href="<?php echo base_url('c_Jabatan'); ?>">
                                                Jabatan <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu dropdownhover-right">
                                                <li><a href="<?php echo base_url('c_Jabatan'); ?>">Daftar Jabatan</a></li>
                                                <li><a href="<?php echo base_url('c_Jabatan/add_jabatan'); ?>">Tambah Jabatan</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="<?php echo base_url('c_Pendidikan'); ?>">
                                                Jenjang Pendidikan <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu dropdownhover-right">
                                                <li><a href="<?php echo base_url('c_Pendidikan'); ?>">Daftar Jenjang Pendidikan</a></li>
                                                <li><a href="<?php echo base_url('c_Pendidikan/add_pendidikan'); ?>">Tambah Jenjang Pendidikan</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <li>
                                <a <?php echo ( $section == 'schedule' ) ? 'class="menu-top-active"': ''; ?> href="<?php echo base_url('c_Schedule'); ?>">View Schedule</a>
                            </li>
                        </ul>
                        
                        <?php 
                            if( $user ) : ?>
                                <ul class="nav navbar-nav navbar-right" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            Account <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu dropdownhover-top" role="menu" style="bottom: 100%; top: auto;">
                                            <li>
                                                <a href="<?php echo base_url('c_User'); ?>">Profile</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('c_User/change_password'); ?>">Change Password</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?php echo base_url('c_User/logout'); ?>">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <?php 
                            else : ?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="<?php echo base_url('Login'); ?>">Login</a>
                                    </li>
                                </ul>
                                <?php 
                            endif;
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <?php $this->load->view( $template ); ?>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->

    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>

    <!-- JQUERY DATEPICKER -->
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

    <!-- BOOTSTRAP DROPDOWN HOVER JS -->
    <script src="<?php echo base_url('assets/js/bootstrap-dropdownhover.min.js'); ?>"></script>

    <!-- CUSTOM SCRIPTS  -->
    <script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
</body>
</html>