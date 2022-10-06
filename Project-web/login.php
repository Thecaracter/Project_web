<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Koperasi | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
<?php session_start();
  if (isset($_POST['password']))
  {
	  
	  $password = $_POST['password'];
	  if ($password == "password")
	  {
		  $_SESSION['password'] = $_POST['password'];
		  header('Location:index.php');
	  }
	  else if ($password == "")
	  {
			echo '<div style="width:359px;" class="alert alert-danger container">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Password Tidak Boleh kosong!
		</div>'; 
	  }
	  else if ($password != "password")
	  {
		  echo '<div style="width:359px;" class="alert alert-danger container">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Password yang Anda masukkan salah!
		</div>'; 
	  }
  }
  ?>
  <div class="lockscreen-logo">
    <a href="login.php"><b>Admin</b>KSP</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Login Admin KSP</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="dist/img/log in.jpg" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="login.php">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" name="password" autofocus>

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Masukkan Password Anda dengan benar
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2022 <b>Koperasi Rizqi</b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>