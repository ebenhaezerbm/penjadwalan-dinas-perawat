<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title><?php echo $title; ?></title>
  <meta name="description" content="and aku adalah cangak" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" type'="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>" type'="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" type'="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font.css'); ?>" type'="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/js/calendar/bootstrap_calendar.css'); ?>" type'="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css'); ?>" type'="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
  <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?php echo base_url('assets/images/logo.png'); ?>" class="m-r-sm">SIBEJADSUS</a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
        <?php $user = $this->session->userdata('user');
if ($user) {
    ?>

      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
        <li class="hidden-xs">
          <a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="badge badge-sm up bg-danger m-l-n-sm count">2</span>
          </a>
          <section class="dropdown-menu aside-xl">
            <section class="panel bg-white">
              <header class="panel-heading b-light bg-light">
                <strong>You have <span class="count">2</span> notifications</strong>
              </header>
              <div class="list-group list-group-alt animated fadeInRight">
                <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="assets/images/avatar.jpg" alt="John said" class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                </a>
                <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                </a>
              </div>
              <footer class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </footer>
            </section>
          </section>
        </li>
        <li class="dropdown hidden-xs">
          <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a>
          <section class="dropdown-menu aside-xl animated fadeInUp">
            <section class="panel bg-white">
              <form role="search">
                <div class="form-group wrapper m-b-none">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </div>
              </form>
            </section>
          </section>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="assets/images/avatar.jpg">
            </span>

<?php
echo $user['username'];
    ?>
<b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li>
              <a href="#">Settings</a>
            </li>
            <li>
              <a href="profile.html">Profile</a>
            </li>
            <li>
              <a href="#">
                <span class="badge bg-danger pull-right">3</span>
                Notifications
              </a>
            </li>
            <li>
              <a href="docs.html">Help</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?php echo base_url('c_User/logout'); ?>">Logout</a>
            </li>
          </ul>
        </li>
      </ul> <?php }?>
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
<?php if ($user) {?>
        <aside class="bg-dark lter aside-md hidden-print" id="nav">
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li  class=" <?php echo ($section == 'home') ? 'active' : ''; ?>">
                      <a href="<?php echo base_url('c_Dashboard'); ?>"   <?php echo ($section == 'home') ? 'active' : ''; ?>>
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>Home</span>
                      </a>
                    </li>
                    <li class="<?php echo (strpos($section, 'perawat') !== false) ? 'active' : ''; ?>">
                      <a href="#perawat"  class="<?php echo (strpos($section, 'perawat') !== false) ? 'active' : ''; ?>">
                        <i class="fa fa-ambulance">
                          <b class="bg-warning"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Perawat</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="<?php echo base_url('c_Perawat'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>Semua Perawat</span>
                          </a>
                        </li>
                        <li >
                          <a href="<?php echo base_url('c_Perawat/add_perawat'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>Tambah Perawat</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="<?php echo (strpos($section, 'jabatan') !== false) ? 'active' : ''; ?>">
                      <a href="#jabatan" class="<?php echo (strpos($section, 'jabatan') !== false) ? 'active' : ''; ?>" >
                        <i class="fa fa-plane icon">

                          <b class="bg-success"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Jabatan</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="<?php echo base_url('c_Jabatan'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>Semua Jabatan</span>
                          </a>
                        </li>
                        <li >
                          <a href="<?php echo base_url('c_Jabatan/add_jabatan'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>Tambah Jabatan</span>
                          </a>
                        </li>
                      </ul>
                    </li>
<li class="<?php echo (strpos($section, 'pendidikan') !== false) ? 'active' : ''; ?>">
                      <a href="#layout"  class="<?php echo (strpos($section, 'jabatan') !== false) ? 'active' : ''; ?>">
                        <i class="fa fa-book icon">
                          <b class="bg-primary"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Pendidikan</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="<?php echo base_url('c_Pendidikan'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>Semua Pendidikan</span>
                          </a>
                        </li>
                        <li >
                          <a href="<?php echo base_url('c_Pendidikan/add_pendidikan'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>Tambah Pendidikan</span>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="<?php echo (strpos($section, 'jadwal') !== false) ? 'active' : ''; ?>">
                      <a href="#layout"  class="<?php echo (strpos($section, 'jadwal') !== false) ? 'active' : ''; ?>">
                        <i class="fa fa-book icon">
                          <b class="bg-primary"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Jadwal</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="<?php echo base_url('c_Schedule'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>Semua Jadwal</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>

            <footer class="footer lt hidden-xs b-t b-dark">

              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>

            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <?php }?>
        <section id="content">
          <section class="vbox">
             <section class="scrollable padder">
                <?php $this->load->view($template);?>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
  <!-- App -->
  <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.plugin.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/charts/easypiechart/jquery.easy-pie-chart.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/charts/sparkline/jquery.sparkline.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.tooltip.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.resize.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/charts/flot/jquery.flot.grow.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/charts/flot/demo.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/calendar/bootstrap_calendar.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/calendar/demo.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/sortable/jquery.sortable.js'); ?>"></script>

</body>
</html>
