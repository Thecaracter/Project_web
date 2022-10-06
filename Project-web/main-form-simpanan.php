<?php
include 'koneksi.php';
if (isset($_GET['reqs']) && $_GET['reqs'] == 'add') 
{
	$namaform = "<i class = 'fa fa-plus'></i> Tambah";
	$nm_simpanan 	= '';
	$id_anggota 	= '';
	$tgl_simpanan 	= date('Y-m-d');
	$besar_simpanan = '';
	$ket			= '';
	$ket			= '';
	$kata			= "* tidak dapat di ubah";
	$button 		= "<i class='fa fa-save'></i> Simpan";
	$_SESSION['tgl_simpanan'] = date('Y-m-d');
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
              <h3 class="box-title"><?php  echo $namaform; ?> Data Simpanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php 
				if (isset($_GET['nm_simpanan']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Anda Belum Memilih Nama Simpanan!!!
					</div>';
				}
				else if (isset($_GET['tgl_simpanan']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Tanggal Simpanan Anda Belum di Isi!!!
					</div>';
				}
				else if (isset($_GET['nama']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Anda Belum Memilih Nama Anda!!!
					</div>';
				}
				else if (isset($_GET['besar_simpanan']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Besar Simpanan Salah!!!
					</div>';
				}
				else if (isset($_GET['ket']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Keterangan Anda Kosong!!!
					</div>';
				}
				else if (isset($_GET['sudah']))
				{
					echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Anda Sudah Membayar Simpanan Wajib Di Bulan Sekarang!!
					</div>';
				}
			
			?>
           <form role="form" action="proses.php" method="POST">
           <input type="hidden" name="reqs" value="<?php echo $_GET['reqs'] ?>">
           <input type="hidden" name="id_simpanan" value="<?php echo $id_simpanan ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Simpanan</label>
                  <select class="form-control" name="nm_simpanan" id="sim" onchange="changeValue(this.value)" >
                  	<option selected="selected" value="">-Pilih-</option>
						<?php
                    $result = mysqli_query($conn, "select * from k_simpanan WHERE NOT nm_simpanan='Simpanan Pokok'");   
                    $jsArray = "var Sim = new Array();\n";       
                    while ($row = mysqli_fetch_array($result)) 
					{   
					?>
                        <option value="<?php echo $row['nm_simpanan']; ?>"
                        <?php 
							if (isset($_GET['reqs']) && $_GET['reqs'] == 'edit')
							{
								if ($data['nm_simpanan'] == $row['nm_simpanan'])
								{
									echo 'selected="selected"';
								}
							}
						?>
                        ><?php echo $row['nm_simpanan']; ?></option>   
                        <?php 
						$jsArray .= "Sim['" . $row['nm_simpanan'] . "'] = {ket:'" . addslashes($row['ket_simpanan'])."', besar_simpanan:'" . addslashes($row['besar_simpanan'])."'};\n"; ?>
					<?php } ?>  
                      
                  </select>
                </div>
                <div class="form-group">
                <label>Nama Anggota</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="id_anggota">
                  <option selected="selected" value="">-Pilih-</option>
                  <?php 
				  
				  $sql = mysqli_query($conn, "SELECT * FROM anggota WHERE status='1' order by id_anggota");
				  while ($r = mysqli_fetch_array($sql)) {
				  ?>
                  <option value="<?php echo $r['id_anggota']?>" 
                  <?php 
							if (isset($_GET['reqs']) && $_GET['reqs'] == 'edit')
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
                <label for="exampleInputEmail1">Tanggal Simpanan</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="tgl_simpanan" value="<?php echo $tgl_simpanan ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                </div>
                <div class="form-group">
                  <label>Besar Simpanan</label>
                  <input type="number" value="<?php echo $besar_simpanan ?>" class="form-control" name="besar_simpanan" rows="3" placeholder="Besar Simpanan" id="besar_simpanan">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <p style="color:#F00;"><?php echo $kata ?></p>
                  <textarea class="form-control" name="ket" rows="3" placeholder="Keterangan" id="ket_simpanan"><?php echo $ket ?></textarea>
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