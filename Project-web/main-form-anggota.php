<?php 
include 'koneksi.php';
if(isset($_GET['reqa']) && $_GET['reqa'] == 'edit'){
	$namaform = "<i class = 'fa fa-edit'></i> Edit";
	$id_anggota 	= $_GET['id_anggota'];
	$query 			= mysqli_query($conn, "SELECT * FROM anggota a , k_simpanan b WHERE a.id_anggota='".$id_anggota."' AND b.id='1'");
	$data 			= mysqli_fetch_array($query);
	$nama 			= $data['nama'];
	$alamat 		= $data['alamat'];
	$tgl_lahir 		= $data['tgl_lahir'];
	$tmp_lahir 		= $data['tmp_lahir'];
	$j_kel 			= $data['j_kel'];
	$no_telp 		= $data['no_telp'];
	$hasilkode 		= $data['id_anggota'];
	$button 		= "<i class='fa fa-save'></i> Update";
}elseif (isset($_GET['reqa']) && $_GET['reqa'] == 'add') {
	$namaform 		= "<i class='fa fa-plus'></i> Tambah";
	$carikode = mysqli_query($conn, "SELECT MAX(id_anggota) FROM anggota") or die (mysqli_error($koneksi));
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) 
    {   
     $nilaikode = substr($datakode[0], 3);
     $kode = (int) $nilaikode;
     $kode = $kode + 1;
     $hasilkode = "AGT".str_pad($kode, 3, "0", STR_PAD_LEFT);
    }
	$_SESSION['id_anggota'] = $hasilkode;
	$nama 			= '';
	$alamat 		= '';
	$tgl_lahir 		= '';
	$tmp_lahir 		= '';
	$j_kel 			= '';
	$no_telp 		= '';
	$tgl_simpanan 	= date('Y-m-d');
	$button 		= "<i class='fa fa-save'></i> Simpan";	
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php  echo $namaform; ?> Daftar Anggota</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php 
				if (isset($_GET['id_salah']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					ID Anggota Anda Salah!!!
					</div>';
				}
				else if (isset($_GET['nama']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Nama anda belum di isi!!!
					</div>';
				}
				else if (isset($_GET['alamat']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Alamat anda belum di isi!!!
					</div>';
				}
				else if (isset($_GET['tgl_lahir']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Tanggal Lahir anda belum di isi!!!
					</div>';
				}
				else if (isset($_GET['tmp_lahir']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Tempat Lahir Anda Kosong!!!
					</div>';
				}
				else if (isset($_GET['j_kel']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Pilih jenis kelamin dengan tepat!!!
					</div>';
				}
				else if (isset($_GET['no_telp']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Nomor Handphone Anda Kosong!!!
					</div>';
				}
				else if (isset($_GET['nm_simpanan']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Nama Simpanan Tidak Dapat di Ubah!!!
					</div>';
				}
				else if (isset($_GET['besar_simpanan']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Besar Simpanan Tidak Dapat di Ubah!!!
					</div>';
				}
				else if (isset($_GET['tgl_simpanan']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Tanggal Simpanan Tidak Dapat di Ubah!!!
					</div>';
				}
				else if (isset($_GET['ket_simpanan']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Keterangan Simpanan Tidak Dapat di Ubah!!!
					</div>';
				}
			
			?>
           <form role="form" action="proses.php" method="POST">
           <input type="hidden" name="reqa" value="<?php echo $_GET['reqa'] ?>">
           <input type="hidden" name="id_anggota" value="<?php echo $id_anggota ?>">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">ID</label>
                  <input type="text" class="form-control" name="id_anggota" id="exampleInputEmail1" placeholder="ID" value="<?php echo $hasilkode ?>" <?php if ($_GET['reqa'] == 'edit' && isset($_GET['reqa']) == 'edit') {echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama" value="<?php echo $nama ?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </div>
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="tgl_lahir" value="<?php echo $tgl_lahir ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tmp_lahir" value="<?php echo $tmp_lahir ?>" id="exampleInputEmail1" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="j_kel" >
                  	<option selected value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki" <?php if($j_kel == "Laki-Laki") {echo 'selected="selected"';}?>>Laki-Laki</option>
                    <option value="Perempuan" <?php if($j_kel == "Perempuan") {echo 'selected="selected"';}?>>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Handphone</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $no_telp ?>" placeholder="Nomor Handphone" name="no_telp">
                </div>
                <?php if (isset($_GET['reqa']) && $_GET['reqa'] == 'add') { ?>
                <h2 style="text-align:center;">Simpanan Pokok</h2>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Simpanan</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="Simpanan Pokok" placeholder=" Simpanan Wajib" name="nm_simpanan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Besar Simpanan</label>
                  <input type="number" class="form-control"  id="exampleInputPassword1" value="50000" placeholder="Besar Simpanan" name="besar_simpanan">
                </div>
                <label for="exampleInputEmail1">Tanggal Simpanan</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" value="<?php echo $tgl_simpanan ?>"  class="form-control" name="tgl_simpanan"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
                <div class="form-group">
                  <label>Keterangan Simpanan</label>
                  <textarea class="form-control" name="ket_simpanan" rows="3" placeholder="Keterangan Simpanan">Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja</textarea>
                </div>
                <?php } ?>
              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
              </div>
            </form>
            </div>
         </div>
    </section>
    <!-- /.content -->
  </div>