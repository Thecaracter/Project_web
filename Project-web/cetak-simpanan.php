<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Koperasi Simpan Pinjam | Cetak Simpanan</title>
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
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Koperasi Simpan Pinjam, Inc.
          <small class="pull-right">Tanggal: <?php echo date('d F Y'); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
    <h1 class="text-center">DATA SIMPANAN</h1>
      <div class="col-xs-12 table-responsive table-bordered">
      <?php 
	  	include 'koneksi.php'; 
		include'funct.php';
		$sql = mysqli_query($conn, "SELECT * FROM simpanan s,anggota a WHERE a.id_anggota='".$_GET['id_anggota']."' AND bln='".$_GET['bln']."'");
		$data = mysqli_fetch_array($sql);
	  ?>
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Nama</th>
            <th>ID Anggota</th>
            <th>Alamat</th>
            <th>Tampat , Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Nomor Handphone</th>
            <th>Nama Simpanan</th>
            <th>Tanggal Simpanan</th>
            <th>Besar Simpanan</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['id_anggota']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['tmp_lahir'].' , '.$data['tgl_lahir']; ?></td>
            <td><?php echo $data['j_kel']; ?></td>
            <td><?php echo $data['no_telp']; ?></td>
            <td><?php echo $data['nm_simpanan']; ?></td>
            <td><?php echo $data['tgl_simpanan']; ?></td>
            <td><?php echo $data['besar_simpanan']; ?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
