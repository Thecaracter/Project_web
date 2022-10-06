<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
      	Dashboard <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php include 'koneksi.php'; 
				$query = mysqli_query($conn, "SELECT * FROM simpanan");
				$jum_simpanan = mysqli_num_rows($query);
			?>
              <h3><?php echo $jum_simpanan ?></h3>
              <p>Jumlah Data Simpanan</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
				$query = mysqli_query($conn, "SELECT * FROM anggota");
				$jum_anggota = mysqli_num_rows($query);
			?>
              <h3><?php  echo $jum_anggota ?></h3>
              <p>Jumlah Anggota</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people-outline"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php 
				$query = mysqli_query($conn, "SELECT * FROM petugas");
				$jum_petugas = mysqli_num_rows($query);
			?>
              <h3><?php echo $jum_petugas ?></h3>
				<p>Jumlah Petugas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
				$query = mysqli_query($conn, "SELECT * FROM pinjaman");
				$jum_peminjam = mysqli_num_rows($query);
			?>
              <h3><?php  echo $jum_peminjam ?></h3>
              <p>Jumlah Data peminjam</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
   		<div class="box box-default">
			<div class="box-header with-border">
				<center><h2 class="box-title"><strong>Visi Koperasi Simpan Pinjam</strong></h2></center>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body" style="display: block;">
            <ol style="text-align:justify; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
			<li>
				Mengajak seluruh potensi yang ada dalam masyarakat dengan tanpa membedakan suku,ras,golongan dan agama, agar mereka dapat bersama-sama, bersatu padu dan beritikad baik dalam membangun ekonomi kerakyatan secara bergotong royong dalam bentuk koperasi.
			</li>
			<li>
				Membantu para pedagang kecil dan menengah didalam mobilisasi permodalan demi kelancaran usaha sehingga dapat meningkatkan kesejahteraan mereka.
			</li>
			<li>
				Turut membantu pembangunan ekonomi dan menunjang pelaksanaan kegiatan usaha secara aktif dengan mengajak mitra usaha lainnya baik BUMN,swasta, perbankan maupun gerakan koperasi lainnya.
			</li>
			<li>
				 Sebagai penyeimbang system perekonomian Indonesia dalam bentuk organisasi masyarakat.
			</li>
			<li>
				Memberikan kredit berbunga rendah kepada para pedagang kecil.
			</li>
		</ol>
            </div>
		</div>
        <div class="box box-default">
			<div class="box-header with-border">
				<center><h2 class="box-title"><strong>Misi Koperasi Simpan Pinjam</strong></h2></center>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body" style="display: block;">
            <ol style="text-align:justify; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
			<li>
				Mewujudkan SDM pengelola Koperasi dan UMKM yang Profesional.
			</li>
			<li>
				Mewujudkan iklim usaha yang kondusif bagi perkembangan Koperasi dan UMKM.
			</li>
			<li>
				Menumbuh kembangkan lembaga keuangan mikro (KOPERASI SIMPAN PINJAM/ UNIT SIMPAN PINJAM KOPERASI-Koperasi) sampai di wilayah perdesaan.
			</li>
			<li>
				Membangun dan mengembangkan jaringan distribusi dan networking ekonomi sampai perdesaan.
			</li>
			<li>
				Mengembangkan Koperasi dan UMKM berbasis produk unggulan daerah yang tertumpu pada sumber daya lokal.
			</li>
			<li>
				Penumbuhan wirausaha baru dan perluasan kesempatan kerja.
			</li>
		</ol>
            </div>
		</div>
        <div class="box box-default">
			<div class="box-header with-border">
				<center><h2 class="box-title"><strong>Tujuan Koperasi Simpan Pinjam</strong></h2></center>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body" style="display: block;">
            <ol style="text-align:justify; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">
			<li>
				Meningkatkan tali persaudaraan dan kebersamaan diantara sesama anggota Koperasi
			</li>
			<li>
				Memberdayakan kegiatan Koperasi hingga fungsinya lebih maksimal, efisien, efektif dan produktif dalam meningkatkan kesejahteraan anggotanya
			</li>
			<li>
				Meningkatkan pendapatan serta pemerataan kesejahteraan anggota Koperasi secara profesional
			</li>
			<li>
				Membuka lapangan pekerjaan baru yang terbuka bagi anggota koperasi dan keluarganya
			</li>
		</ol>
            </div>
		</div>
    </section>
    <!-- /.content -->
  </div>