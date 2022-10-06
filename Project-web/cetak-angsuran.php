<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Koperasi Simpan Pinjam | Cetak Pinjaman</title>
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
      <div class="col-xs-12 table-responsive table-bordered">
      <?php 
	  	include 'koneksi.php'; 
		include'funct.php';
		$sql = mysqli_query($conn, "SELECT * FROM angsuran s,anggota a WHERE a.id_anggota='".$_GET['id_anggota']."'");
		$data = mysqli_fetch_array($sql);
	  ?>
        <table class="table table-striped table-responsive">
          <thead>
          <tr class="warning">
            <th><center>Nama</center></th>
            <th><center>ID Angsuran</center></th>
            <th><center>Angsuran Ke</center></th>
            <th><center>Besar Angsuran</center></th>
            <th><center>Tanggal Bayar</center></th>
            <th><center>Tanggal Jatuh Tempo</center></th>
            <th><center>Denda</center></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td style="font-size:12px;"><?php echo $data['nama']; ?></td>
            <td style="font-size:12px;"><center><?php echo $data['id_angsuran']; ?></center></td>
            <td style="font-size:12px;"><center><?php echo $data['angsuran_ke']; ?></center></td>
            <td style="font-size:12px;"><?php echo numberrupiah($data['besar_angsuran']); ?></td>
            <td style="font-size:12px;"><center><?php echo TanggalIndo($data['tgl_pembayaran']); ?></center></td>
            <td style="font-size:12px;"><center><?php echo TanggalIndo($data['tgl_jatuh_tempo']); ?></center></td>
            <td style="font-size:12px;"><?php echo numberrupiah($data['denda']); ?></td>
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
