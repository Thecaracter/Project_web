<?php 
include 'koneksi.php';
if(isset($_GET['reqpin']) && $_GET['reqpin'] == 'edit')
{
	$namaform = "<i class = 'fa fa-edit'></i> Edit";
	$id_pinjaman 	= $_GET['id_pinjaman'];
	$query 			= mysqli_query($conn, "SELECT * FROM pinjaman WHERE id_pinjaman='".$id_pinjaman."'");
	$data 			= mysqli_fetch_array($query);
	$hasilkode 		= $data['id_pinjaman'];
	$nama_pinjaman  = $data['nama_pinjaman'];
	$id_anggota		= $data['id_anggota'];
	$besar_pinjaman = $data['besar_pinjaman'];
	$tgl_pengajuan_pinjaman = $data['tgl_pengajuan_pinjaman'];
	$tgl_acc_pinjaman = $data['tgl_acc_pinjaman'];
	$tgl_pinjaman 	= $data['tgl_pinjaman'];
	$tgl_pelunasan 	= $data['tgl_pelunasan'];
	$tambah_lunas_pendek = mktime(0,0,0,date('m')+9,date('d')+2,date('Y')+0);
   $tanggal_lunas_pendek = date('Y-m-d',$tambah_lunas_pendek);
   $tambah_lunas_menengah = mktime(0,0,0,date('m')+20,date('d')+2,date('Y')+0);
   $tanggal_lunas_menengah = date('Y-m-d',$tambah_lunas_menengah);
   $tambah_lunas_panjang = mktime(0,0,0,date('m')+30,date('d')+2,date('Y')+0);
   $tanggal_lunas_panjang = date('Y-m-d',$tambah_lunas_panjang);
	$button 		= "<i class='fa fa-save'></i> Update";
}
elseif (isset($_GET['reqpin']) && $_GET['reqpin'] == 'add') 
{
	$nama_pinjaman     	= '';
	$id_anggota			= '';
	$besar_pinjaman    	= '';
	$tgl_pelunasan 		= '';
	$namaform = "<i class = 'fa fa-plus'></i> Tambah";
	$carikode = mysqli_query($conn, "select max(id_pinjaman) from pinjaman") or die (mysqli_error());
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) 
    {   
     $nilaikode = substr($datakode[0], 3);
     $kode = (int) $nilaikode;
     $kode = $kode + 1;
     $hasilkode = "PMJ".str_pad($kode, 3, "0", STR_PAD_LEFT);
    }
	$_SESSION['id_pinjaman'] = $hasilkode;
	 date_default_timezone_get('Asia/Jakarta');
	 $tgl_pengajuan_pinjaman = date('Y-m-d');
	 $tambah_tanggal = mktime(0,0,0,date('m')+0,date('d')+1,date('Y')+0);
	 $tgl_acc_pinjaman = date('Y-m-d',$tambah_tanggal);
	 $tambah_tanggal_pinjaman = mktime(0,0,0,date('m')+0,date('d')+2,date('Y')+0);
	 $tgl_pinjaman = date('Y-m-d',$tambah_tanggal_pinjaman);
	 
	 $tambah_lunas_pendek = mktime(0,0,0,date('m')+10,date('d')+2,date('Y')+0);
	 $tanggal_lunas_pendek = date('Y-m-d',$tambah_lunas_pendek);
	 $tambah_lunas_menengah = mktime(0,0,0,date('m')+20,date('d')+2,date('Y')+0);
	 $tanggal_lunas_menengah = date('Y-m-d',$tambah_lunas_menengah);
	 $tambah_lunas_panjang = mktime(0,0,0,date('m')+30,date('d')+2,date('Y')+0);
	 $tanggal_lunas_panjang = date('Y-m-d',$tambah_lunas_panjang);
	 
	$button = "<i class='fa fa-save'></i> Simpan";
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
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><?php echo $namaform ?>
                <small>PINJAMAN</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad" style="display: block;">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> NB!</h4>
                <ul>
                    <li>Jika Pinjaman Jangka Pendek Maka Kita Harus Mengangsur selama 10 Bulan</li>
                    <li>Jika Pinjaman Jangka Menengah Maka Kita Harus Mengangsur selama 20 Bulan</li>
                    <li>Jika Pinjaman Jangka Panjang Maka Kita Harus Mengangsur selama 30 Bulan</li>
                 </ul>
              </div>
               <?php
				if (isset($_GET['id_pinjaman']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					ID Pinjaman Tidak Dapat di ubah!!
					</div>';
				}
				else if (isset($_GET['nama_pinjaman']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Nama Pinjaman Belum Di Isi!!
					</div>';
				}
				else if (isset($_GET['id_anggota']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Anda Belum Memilih ID Anggota!!!
					</div>';
				}
				else if (isset($_GET['besar_pinjaman']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Masukkan Besar Pinjaman Anda!!!
					</div>';
				}
				else if (isset($_GET['belum_lunas']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Pinjaman Anda Belum Lunas , Harap Lunaskan terlebih dahulu agar bisa meminjam lagi!
					</div>';
				}
			
			?>
              <form role="form" action="proses.php" method="POST">
           <input type="hidden" name="reqpin" value="<?php echo $_GET['reqpin'] ?>">
           <input type="hidden" name="id_pinjaman" value="<?php echo $id_pinjaman ?>">
           <script>
			var carMAP = [];
			
			carMAP ["Pinjaman Jangka Pendek"] ='<?php echo $tanggal_lunas_pendek ?>';
			carMAP ["Pinjaman Jangka Menengah"] ='<?php echo $tanggal_lunas_menengah ?>';
			carMAP ["Pinjaman Jangka Panjang"] ='<?php echo $tanggal_lunas_panjang ?>';
			
			
			function inTEXTbox(cVAL) { 
			var txt = document.getElementById("MicampoTXTO") ;
			txt.value = carMAP[cVAL] ;
			}
		   </script>
              <div class="box-body">
              <div class="form-group">
                  <label>ID Pinjaman</label>
                  <p style="color:#F00;"<small>*id pinjaman tidak dapat di ubah</small></p>
                  <input type="text" value="<?php echo $hasilkode ?>" class="form-control" name="id_pinjaman" rows="3" placeholder="ID Pinjaman">
                </div>
                <div class="form-group">
                  <label>Nama Pinjaman</label>
                  <select class="form-control" name="nama_pinjaman" onchange="inTEXTbox(this.value)" >
                  	<option selected="selected" value="">-Pilih-</option>
						<?php
                    $result = mysqli_query($conn, "select * from k_pinjaman");    
                    while ($row = mysqli_fetch_array($result)) 
					{   
					?>
                        <option value="<?php echo $row['nama_pinjaman']; ?>"
                        <?php 
							if (isset($_GET['reqpin']) && $_GET['reqpin'] == 'edit')
							{
								if ($data['nama_pinjaman'] == $row['nama_pinjaman'])
								{
									echo 'selected="selected"';
								}
							}
						?>
                        ><?php echo $row['nama_pinjaman']; ?></option> 
                    
					<?php  } ?>    
                  </select>
                </div>
                <div class="form-group">
                <label>Nama Anggota</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="false" name="id_anggota">
                  <option selected="selected" value="">-Pilih-</option>
                  <?php 
				  
				  $sql = mysqli_query($conn, "SELECT * FROM anggota WHERE status='1'");
				  while ($r = mysqli_fetch_array($sql)) {
				  ?>
                  <option value="<?php echo $r['id_anggota']?>" 
                  <?php 
							if (isset($_GET['reqpin']) && $_GET['reqpin'] == 'edit')
							{
								if ($data['id_anggota'] == $r['id_anggota'] || $data['id_anggota'] == $r['nama'])
								{
									echo 'selected="selected"';
								}
							}
				  ?>>
				  	<?php
						echo $r['id_anggota']. "&nbsp;|&nbsp;".$r['nama'];
					?>
                  </option>
                  <?php } ?>
                </select>
              	</div>

                
                <div class="form-group">
                  <label>Besar Pinjaman</label>
                  <input type="number" value="<?php echo $besar_pinjaman ?>" class="form-control" name="besar_pinjaman" rows="3" placeholder="Contoh 1000000">
                </div>
                <label for="exampleInputEmail1">Tanggal Pengajuan Pinjaman</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="tgl_pengajuan_pinjaman" value="<?php echo $tgl_pengajuan_pinjaman ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
                <label for="exampleInputEmail1">Tanggal Acc Peminjam</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="tgl_acc_peminjam" value="<?php echo $tgl_acc_pinjaman ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
                <label for="exampleInputEmail1">Tanggal Pinjaman</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="tgl_pinjaman" value="<?php echo $tgl_pinjaman ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
                <label for="exampleInputEmail1">Tanggal Pelunasan</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" id="MicampoTXTO" name="tgl_pelunasan" value="<?php echo $tgl_pelunasan ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
              </div>
            </form>
            </div>
          </div>
        <!-- /.box --></div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>