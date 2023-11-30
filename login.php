<!DOCTYPE html>
<html lang="en">

<head>


  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="logincss.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="../dist/img/logo2.png" rel="icon">
  <link href="../dist/img/logo2.png" rel="tittle1">
  <script src="admin/js/jquery.min.js"></script>

  <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style type="text/css">
    body {
      background-color: #008B8B;
    }

    h1 {
      text-align: center;
      font-size: 1.4em;
      font-weight: 700;
      color: #2F4F4F;
      margin-bottom: 24px;
    }

    #mybutton {
      position: relative;
      z-index: 1;
      left: 90%;
      top: -30px;
      cursor: pointer;
    }

    h5 {
      text-align: center;
      margin-top: 5px;
      color: #2F4F4F;
    }
  </style>
</head>

<body>

  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
      echo "<script>
    alert('Username Atau Password Salah');
    window.location='login.php'
    </script>";
    } else if ($_GET['pesan'] == "logout") {
      echo "Anda telah berhasil logout";
    } else if ($_GET['pesan'] == "belum_login") {
      echo "<script>
    alert('Anda Harus Login Terlebih Dahulu');
    window.location='login.php'
    </script>";;
    }
  }
  ?>

  <form method="POST" action="act_login.php">
    <h1><span>Login Admin</h1> <br>
    <input placeholder="Masukkan User" type="text" name="username" /> <br><br>
    <input class="" placeholder="Masukkan Password" type="password" name="password" id="pass" />
    <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span>
    <button class="btn">Log in</button> <br><br><br>
    <a href="index.php">
      <h5>Kembali Ke Beranda</h5>
    </a>

  </form>
  <footer>

  </footer>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
<script type="text/javascript">
  function change() {
    var x = document.getElementById('pass').type;

    if (x == 'password') {
      document.getElementById('pass').type = 'text';
      document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
    } else {
      document.getElementById('pass').type = 'password';
      document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
    }
  }
</script>

</html>