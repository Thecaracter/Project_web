<?php
 //Define relative path from this script to mPDF
 $nama_file='Laporan Pinjaman'; //Beri nama file PDF hasil.
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
<body>
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
    <h3><center><strong>Data Pinjaman</strong></center></h3>
      <div class="col-xs-12 table-responsive table-bordered">
      <?php 
	  	include 'koneksi.php'; 
		include'funct.php';
		$sql = mysqli_query($conn, "SELECT p.id_pinjaman,p.nama_pinjaman,p.besar_pinjaman,p.tgl_pinjaman,p.tgl_pelunasan,a.nama FROM pinjaman p,anggota a WHERE a.id_anggota=p.id_anggota AND bln='".$_GET['bln']."'");
		$no = 1;
	  ?>
        <table class="table table-striped table-responsive">
          <thead>
          <tr class="warning">
          	<th style="font-size:12px;"><center>No</center></th>
            <th style="font-size:12px;"><center>Nama Anggota</center></th>
            <th style="font-size:12px;"><center>ID Pinjaman</center></th>
            <th style="font-size:12px;"><center>Nama Pinjaman</center></th>
            <th style="font-size:12px;"><center>Besar Pinjaman</center></th>
            <th style="font-size:12px;"><center>Tanggal Pinjaman</center></th>
            <th style="font-size:12px;"><center>Tanggal Pelunasan</center></th>
          </tr>
          </thead>
          <tbody>
          <?php while($data = mysqli_fetch_array($sql)){ ?>
          <tr>
          	<td style="font-size:12px;"><center><?php echo $no; ?></center></td>
            <td style="font-size:12px;"><?php echo $data['nama']; ?></td>
            <td style="font-size:12px;"><center><?php echo $data['id_pinjaman']; ?></center></td>
            <td style="font-size:12px;"><?php echo $data['nama_pinjaman']; ?></td>
            <td style="font-size:12px;"><?php echo numberrupiah($data['besar_pinjaman']); ?></td>
            <td style="font-size:12px;"><?php echo TanggalIndo($data['tgl_pinjaman']); ?></td>
            <td style="font-size:12px;"><?php echo TanggalIndo($data['tgl_pelunasan']); ?></td>
          </tr>
          <?php $no++; } ?>
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