<?php 
include 'koneksi.php';
if(isset($_GET['reqang']) && $_GET['reqang'] == 'add')
{
	$id_pinjaman	= '';
	$id_anggota		= '';
	$nama_pinjaman	= '';
	$angsuran_ke = '';
	$besar_angsuran	= '';
	$tgl_jatuh_tempo = date('Y-m-d');
	$namaform = "<i class = 'fa fa-plus'></i> Tambah";
	$carikode = mysqli_query($conn, "select max(id_angsuran) from angsuran") or die (mysqli_error());
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) 
    {   
     $nilaikode = substr($datakode[0], 3);
     $kode = (int) $nilaikode;
     $kode = $kode + 1;
     $hasilkode = "ANG".str_pad($kode, 3, "0", STR_PAD_LEFT);
    }
	$_SESSION['id_anggota'] = $hasilkode;
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
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php  echo $namaform; ?> Data Angsuran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            <?php
				/*if (isset($_GET['nama']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Nama Tidak Boleh Kosong!!!
					</div>';
				}
				else if (isset($_GET['alamat']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Alamat Anda Kosong!!!
					</div>';
				}
				else if (isset($_GET['no_hp']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					No Handphone Anda Kosong!!!
					</div>';
				}
				else if (isset($_GET['tmp_lahir']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Tempat Lahir Anda Kosong!!!
					</div>';
				}
				else if (isset($_GET['tgl_lahir']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Tanggal Lahir Anda Kosong!!!
					</div>';
				}
				else if (isset($_GET['ket']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Keterangan Anda Kosong!!!
					</div>';
				}*/
			
			?>
           <form role="form" action="proses.php" method="POST">
           <input type="hidden" name="reqang" value="<?php echo $_GET['reqang'] ?>">
           <input type="hidden" name="id_angsuran" value="<?php echo $id_angsuran ?>">
              <div class="box-body">
              <div class="form-group">
                  <label>ID Angsuran</label>
                  <input type="text" value="<?php echo $hasilkode ?>" class="form-control" name="id_angsuran" rows="3" placeholder="ID Pinjaman">
                </div>
                <?php 
				$s = date('m');
				$t = date('Y');
				?>
                <div class="form-group">
                <label>ID Pinjaman</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="false" name="id_pinjaman" id="id_pinjaman">
                  <option selected="selected" value="">-Pilih-</option>
                  <?php
				  $sql = mysqli_query($conn, "SELECT * FROM pinjaman WHERE ket='0' AND NOT bln='".$s."' OR NOT thn='".$t."'");
				  while ($r = mysqli_fetch_array($sql)) {
				  ?>
                  <option 
                  	id_anggota="<?php echo $r['id_anggota'] ?>"
                    besar_angsuran=
                    "<?php 
						if($r['nama_pinjaman']=="Pinjaman Jangka Pendek")
						{
							$bayar =  $r['besar_pinjaman'] / 10;
							$bunga =  $bayar * 0.1;
							
							echo $angsuran = $bayar + $bunga;
						}
						else if($r['nama_pinjaman'] == "Pinjaman Jangka Menengah")
						{
							$bayar =  $r['besar_pinjaman'] / 20;
							$bunga =  $bayar * 0.1;
							
							echo $angsuran = $bayar + $bunga;
						}
						else if($r['nama_pinjaman']=="Pinjaman Jangka Panjang")
						{
							$bayar =  $r['besar_pinjaman'] / 30;
							$bunga =  $bayar * 0.1;
							
							echo $angsuran = $bayar + $bunga;
						}
					?>"
                    nama_simpanan ="<?php echo $r['nama_pinjaman'] ?>" 
                    angsuran_ke="<?php 
						$gg = mysqli_query($conn, "SELECT max(angsuran_ke) AS angsuran_ke FROM angsuran WHERE id_anggota='".$r['id_anggota']."' AND nama_pinjaman='".$r['nama_pinjaman']."'");
						$data1 = mysqli_fetch_array($gg);
						
						
						if ($r['nama_pinjaman'] == 'Pinjaman Jangka Pendek')
						{
							if ($data1['angsuran_ke'] >= 10)
							{
								echo '';
							}
							else 
							{
								echo $data1['angsuran_ke']+1;
							}
						}
						else if ($r['nama_pinjaman'] == 'Pinjaman Jangka Menengah')
						{
							if ($data1['angsuran_ke'] >= 20)
							{
								echo '';
							}
							else 
							{
								echo $data1['angsuran_ke']+1;
							}
						}
						else if ($r['nama_pinjaman'] == 'Pinjaman Jangka Panjang')
						{
							if ($data1['angsuran_ke'] >= 30)
							{
								echo '';
							}
							else 
							{
								echo $data1['angsuran_ke']+1;
							}
						}
						
					?>"
                    tgl_jatuh_tempo="<?php 
					
						$gg1 = mysqli_query($conn, "SELECT tgl_acc_pinjaman,bln FROM pinjaman WHERE id_anggota='".$r['id_anggota']."' AND tgl_acc_pinjaman='".$r['tgl_acc_pinjaman']."'");
						$data2 = mysqli_fetch_array($gg1);
						if ($r['nama_pinjaman'] == 'Pinjaman Jangka Pendek')
						{
								$tgl1 = $data2['tgl_acc_pinjaman'];
								$tgl2 = date('Y/m/d', strtotime('+1 month', strtotime($tgl1)));
								echo $tgl2;
							
						}
						else if ($r['nama_pinjaman'] == 'Pinjaman Jangka Menengah')
						{
									$tgl1 = $data2['tgl_acc_pinjaman'];
									$tgl2 = date('Y/m/d', strtotime('+1 month', strtotime($tgl1)));
									echo $tgl2;
								
						}
						else if ($r['nama_pinjaman'] == 'Pinjaman Jangka Panjang')
						{
								$tgl1 = $data2['tgl_acc_pinjaman'];
								$tgl2 = date('Y/m/d', strtotime('+1 month', strtotime($tgl1)));
								echo $tgl2;
							
						}
					?>"
                    tgl_pembayaran="<?php echo $tgl_pembayaran = date('Y-m-d'); ?>"
                    value="<?php echo $r['id_pinjaman']?>" 
                  <?php 
							if (isset($_GET['reqang']) && $_GET['reqang'] == 'edit')
							{
								if ($data['id_pinjaman'] == $r['id_pinjaman'])
								{
									echo 'selected="selected"';
								}
							}
				  ?>>
				  	<?php
						echo $r['id_pinjaman']. "&nbsp;|&nbsp;".$r['id_anggota'];
					?>
                  </option>
                  <?php } ?>
                </select>
              	</div>
                <div class="form-group">
                  <label>Nama Pinjaman</label>
                  <input type="text" id="nama_simpanan" value="<?php echo $nama_pinjaman ?>" class="form-control" name="nama_pinjaman" rows="3" placeholder="Nama Pinjaman">
                </div>
				 <div class="form-group">
                  <label>ID Anggota</label>
                  <input type="text" id="id_anggota" value="<?php echo $id_anggota ?>" class="form-control" name="id_anggota" rows="3" placeholder="ID Anggota">
                </div>
                <label for="exampleInputEmail1">Tanggal Pembayaran</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran"data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
               <div class="form-group">
                  <label>Angsuran Ke</label>
                  <input type="number" value="<?php echo $angsuran_ke ?>" id="<?php if(isset($_GET['reqang']) && $_GET['reqang'] == 'add'){ ?>angsuran_ke<?php } ?>" class="form-control" name="angsuran_ke" rows="3" placeholder="Angsuran Ke">
                </div>
                <label for="exampleInputEmail1">Tanggal Jatuh Tempo</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="tgl_jatuh_tempo" class="form-control" name="tgl_jatuh_tempo" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
                <script>
				  $("#id_pinjaman").on("change", function(){
				
					// ambil nilai
					var id_anggota = $("#id_pinjaman option:selected").attr("id_anggota");
					var nama_simpanan = $("#id_pinjaman option:selected").attr("nama_simpanan");
					var besar_angsuran = $("#id_pinjaman option:selected").attr("besar_angsuran");
					var angsuran_ke = $("#id_pinjaman option:selected").attr("angsuran_ke");
					var tgl_jatuh_tempo = $("#id_pinjaman option:selected").attr("tgl_jatuh_tempo");
					var tgl_pembayaran = $("#id_pinjaman option:selected").attr("tgl_pembayaran");
					// pindahkan nilai ke input
					$("#id_anggota").val(id_anggota);
					$("#nama_simpanan").val(nama_simpanan);
					$("#besar_angsuran").val(besar_angsuran);
					$("#angsuran_ke").val(angsuran_ke);
					$("#tgl_jatuh_tempo").val(tgl_jatuh_tempo);
					$("#tgl_pembayaran").val(tgl_pembayaran);
				  });
				</script>
                <div class="form-group">
                  <label>besar angsuran</label>
                  <input type="number" id="besar_angsuran" value="<?php echo $besar_angsuran ?>" class="form-control"Y rows="3" placeholder="Besar Angsuran" name="besar_angsuran">
                </div>
                
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