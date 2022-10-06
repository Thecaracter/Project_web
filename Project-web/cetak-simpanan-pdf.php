<?php
 //Define relative path from this script to mPDF
 $nama_file='Laporan Simpanan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/');
//define("_JPGRAPH_PATH", '../mpdf60/graph_cache/src/');

//define("_JPGRAPH_PATH", '../jpgraph/src/'); 
 
include(_MPDF_PATH . "mpdf.php");
//include(_MPDF_PATH . "graph.php");

//include(_MPDF_PATH . "graph_cache/src/");

$mpdf=new mPDF('utf-8', 'A3'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 

$mpdf->useGraphs = true;

?>
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
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Koperasi Simpan Pinjam
        </h2>
      </div>
      <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
    <h3 class="text-center">Laporan Simpanan</h3>
      <div class="col-xs-12 table-responsive table-bordered">
      <?php 
	  	include 'koneksi.php'; 
		include'funct.php';
		$sql = mysqli_query($conn, "SELECT a.nama,s.id_anggota,s.nm_simpanan,s.tgl_simpanan,s.besar_simpanan AS total FROM simpanan s,anggota a WHERE a.id_anggota=s.id_anggota AND bln='".$_GET['bln']."'");
		$no = 1;
	  ?>
        <table class="table table-striped table-bordered">
          <thead>
          <tr class="success">
          	<th><center>No</center></th>
            <th><center>Nama</center></th>
            <th><center>ID Anggota</center></th>
            <th><center>Nama Simpanan</center></th>
            <th><center>Tanggal Simpanan</center></th>
            <th><center>Besar Simpanan</center></th>
          </tr>
          </thead>
          <tbody>
          <?php  while($data = mysqli_fetch_array($sql)){?>
          <tr>
          	<td><center><?php echo $no; ?></center></td>
            <td><?php echo $data['nama']; ?></td>
            <td><center><?php echo $data['id_anggota']; ?></center></td>
            <td><?php echo $data['nm_simpanan']; ?></td>
            <td><center><?php echo TanggalIndo($data['tgl_simpanan']); ?></center></td>
            <td><?php echo numberrupiah($data['total']); ?></td>
          </tr>
          <?php $no++; } ?>
          <tr>
          <?php 
		  $query = mysqli_query($conn, "SELECT a.nama,s.id_anggota,s.nm_simpanan,s.tgl_simpanan,SUM(s.besar_simpanan) AS total FROM simpanan s,anggota a WHERE a.id_anggota=s.id_anggota AND bln='".$_GET['bln']."'");
		  $total = mysqli_fetch_array($query);
		  ?>
          	<td colspan="5">&nbsp;</td>
            <td>Jumlah : <?php echo numberrupiah($total['total']); ?></td>
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
<?php

$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,1);

$mpdf->Output($nama_file."-".$data['no_sj'].".pdf" ,'I');

 


exit;
?>