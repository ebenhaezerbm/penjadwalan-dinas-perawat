<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Notebook | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css'); ?>" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>

  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xxl">

      <a class="navbar-brand block" href="/">SIBEJADSUS</a>
                                <?php
if ($message) {
    echo '<div class="alert alert-' . $type . ' text-center">' . $message . '</div>';

}
?>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Sign in</strong>
        </header>
        <form action="<?php echo base_url('Login/validate_user'); ?>" class="panel-body wrapper-lg"  method="POST">
          <div class="form-group">
            <label class="control-label">Username</label>
            <input name ="username" type="text" placeholder="username" id="username" class="form-control input-lg">


          </div>
          <div class="form-group">
            <label class="control-label">password</label>
            <input name="password"  type="password" id="inputPassword" placeholder="Password" class="form-control input-lg">
          </div>
          <!-- <div class="checkbox">
            <label>
              <input type="checkbox"> Keep me logged in
            </label>
          </div> -->
          <!-- <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>
 -->          <button type="submit" class="btn btn-primary">Sign in</button>
          <div class="line line-dashed"></div>
          <a href="#" class="btn btn-facebook btn-block"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
          <a href="#" class="btn btn-twitter btn-block"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
          <a href="#" class="btn btn-gplus btn-block"><i class="fa fa fa-google pull-left"></i>Sign in with Google</a>

        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Sistem Informasi Belajar Jadwal Suster<br>&copy; 2016</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
  <!-- App -->
  <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.plugin.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

</body>
</html>