<?php
include '../../koneksi.php';
session_start();
if ($_SESSION['status'] != "login") {
  header("location:../../login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Balittas</title>
  <link href="../../dist/img/logo1.png" rel="icon">
  <link href="../../dist/img/logo1.png" rel="tittle1">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.min.css" />


  <script src="datepicker/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="../datepicker/datepicker.css">
  <!-- Load file css jquery-ui -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/Chart.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a class="logo">
        <span class="logo1.png"><b>PK</b></span>
        <span class="logo1.png"><b></b>Balittas</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <ul class="dropdown-menu">

              <li>
                <ul class="menu">
                </ul>
              </li>
            </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../../dist/img/logo1.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../../dist/img/logo1.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['username']; ?>
                    <small>Admin</small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-user"></i> Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../../dist/img/logo1.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['username']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN MENU</li>
          <li>
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>Home</span>
            </a>
          </li>
          <li>
            <a href="akun.php">
              <i class="fa fa-th"></i> <span>Data Admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
              <i class="fa fa-file-archive-o"></i>
              <span>Penilaian Kinerja</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <ul class="sidebar-menu" style="padding-left: 20px;">
                  <li>
                    <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#menuPK" aria-expanded="true" aria-controls="menuPK">
                      <i class="fa fa-file-text"></i>
                      <span>Sasaran</span>
                    </a>
                    <div id="menuPK" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        <ul class="sidebar-menu" style="padding-left: 20px;">
                          <?php
                          $data = mysqli_query(
                            $koneksi,
                            "SELECT * FROM tb_user WHERE hak_akses LIKE '%pk%' ORDER BY hak_akses ASC"
                          );
                          while ($d = mysqli_fetch_array($data)) {
                          ?>
                            <li>
                              <a class="collapse-item" href="pk.php?pk=<?= $d['hak_akses'] ?>"><i class="fa fa-user" aria-hidden="true"></i>
                                <span><?= strtoupper($d['hak_akses']); ?></span>
                              </a>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li>
                    <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#menuCP" aria-expanded="true" aria-controls="menuCP">
                      <i class="fa fa-line-chart"></i>
                      <span>Capaian</span>
                    </a>
                    <div id="menuCP" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        <ul class="sidebar-menu" style="padding-left: 20px;">
                          <?php
                          $data = mysqli_query(
                            $koneksi,
                            "SELECT * FROM tb_user WHERE hak_akses LIKE '%pk%' ORDER BY hak_akses ASC"
                          );
                          while ($d = mysqli_fetch_array($data)) {
                          ?>
                            <li>
                              <a class="collapse-item" href="cp.php?pk=<?= $d['hak_akses'] ?>"><i class="fa fa-user" aria-hidden="true"></i>
                                <span><?= strtoupper($d['hak_akses']); ?></span>
                              </a>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class=" example-modal">
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title">Apakah Anda Yakin Ingin Keluar ? </h3>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              <a class="btn btn-danger" href="../../logout.php">Keluar</a>
            </div>
          </div>
        </div>
      </div>