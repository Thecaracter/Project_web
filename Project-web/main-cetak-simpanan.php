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
              <h3 class="box-title">Cari Data Simpanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <form role="form" action="page-cetak-simpanan.php" method="GET">
           	<div class="input-group">
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="false" name="bln" id="id_pinjaman">
                  <option selected="selected" value="">-Pilih-</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                  
                </select>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Tampilkan</button>
                    </span>
              </div>
            </form>
            
            <?php 
			if (isset($_GET['bln']))
			{
				include 'koneksi.php'; 
				include'funct.php';
				$sql = mysqli_query($conn, "SELECT * FROM simpanan s,anggota a WHERE s.id_anggota=a.id_anggota AND s.bln='".$_GET['bln']."'");
				$jum = mysqli_num_rows($sql);
				
				if ($jum > 0)
				{
			?>
            
            	<table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                   	  <th><center>No</center></th>
                      <th><center>Nama Anggota</center></th>
                      <th><center>ID Anggota</center></th>
                      <th><center>Nama Simpanan</center></th>
                      <th><center>Tanggal Simpanan</center></th>
                      <th><center>Besar Simpanan</center></th>
                      <th><center>ket</center></th>
                      <th><center>Action</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
						$no=1;
						while($data = mysqli_fetch_array($sql)){
					?>
                      <td><center><?php echo $no; ?></center></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td><center><?php echo $data['id_anggota'] ?></center></td>
                      <td><?php echo $data['nm_simpanan'] ?></td>
                      <td><center><?php  echo TanggalIndo($data['tgl_simpanan']) ?></center></td>
                      <td><center><?php echo numberrupiah($data['besar_simpanan']) ?></center></td>
                      <td><?php echo $data['ket_simpanan']; ?></td>
                      <td>
                          <center><a href="cetak-simpanan.php?id_anggota=<?php echo $data['id_anggota'];?>&bln=<?php echo $data['bln']; ?>" title="Edit Data ini" class="btn btn-info btn-sm"><i class="fa fa-print "></i> Print</a>
                      </td>
                    </tr>
                    <?php 
						$no++;
						}
					?>
                </tbody>
              </table>
              <a href="cetak-simpanan-pdf.php?bln=<?php echo $_GET['bln'] ?>" class="btn btn-primary pull-right" style="margin-right: 5px; margin-top:10px;">
            <i class="fa fa-download"></i> Generate PDF </a>	
			<?php 
			}else
			{
				echo '<div class="alert alert-danger" style="height:100px; font-size:50px;" align="center">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					DATA BELUM ADA!!!
					</div>';
			}
			}
			?>
            
            <br>
            </div>
         </div>
    </section>
    <!-- /.content -->
  </div>