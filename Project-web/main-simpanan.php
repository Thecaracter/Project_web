<?php include 'koneksi.php'; 
include 'funct.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Halaman Daftar Simpanan
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Petugas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <?php 
				$sql = mysqli_query($conn, "SELECT * FROM simpanan WHERE NOT nm_simpanan = 'Simpanan Pokok'");
			?>
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                   	  <th><center>No</center></th>
                      <th>Nama Simpanan</th>
                      <th><center>ID Anggota</center></th>
                      <th><center>Tanggal Simpanan</center></th>
                      <th><center>Besar Simpanan</center></th>
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
                      <td><?php echo $data['nm_simpanan']; ?></td>
                      <td><center><?php echo $data['id_anggota']; ?></center></td>
                      <td><?php echo TanggalIndo($data['tgl_simpanan']); ?></td>
                      <td><?php echo numberrupiah($data['besar_simpanan']) ?></td>
                      <td>
                      <center>
			<a href="proses.php?id_simpanan=<?php echo $data['id_simpanan'];?>&reqs=dell" title="Hapus Petugas ini" class="btn btn-danger btn-sm"  onClick="return confirm('Yakin mau di hapus?');"><span class="glyphicon glyphicon-trash"> Hapus</span> </a></center>
                      </td>
                    </tr>
                    <?php 
						$no++;
						}
					?>
                </tbody>
              </table>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>