<?php 
if (!isset($_SESSION['password']))
{
	header('Location:login.php');
}
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-money text-success"></i> Koperasi</a>
        </div>
      </div>
      <!-- search form --><!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION </li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Anggota
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="page-anggota.php"><i class="fa fa-database"></i> Daftar Anggota</a></li>
                <li>
                  <a href="page-form-anggota.php?reqa=add"><i class="fa fa-plus"></i> Form Anggota
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Simpanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li >
              <a href="page-simpanan.php"><i class="fa fa-circle-o"></i> Data Simpanan</a>
            </li>
            <li>
              <a href="page-form-simpanan.php?reqs=add"><i class="fa fa-circle-o"></i> Form Simpanan
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Pinjaman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li >
              <a href="page-pinjaman.php"><i class="fa fa-circle-o"></i> Data Pinjaman</a>
            </li>
            <li>
              <a href="page-form-peminjaman.php?reqpin=add"><i class="fa fa-circle-o"></i> Form Pinjaman
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i> <span>Angsuran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li >
              <a href="page-angsuran.php"><i class="fa fa-circle-o"></i> Data Angsuran</a>
            </li>
            <li>
              <a href="page-form-angsuran.php?reqang=add"><i class="fa fa-circle-o"></i> Form Angsuran
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li >
              <a href="page-cetak-simpanan.php"><i class="fa fa-circle-o"></i> Cetak Simpanan</a>
            </li>
            <li>
              <a href="page-cetak-pinjaman.php"><i class="fa fa-circle-o"></i> Cetak Pinjaman
              </a>
            </li>
            <li>
              <a href="page-cetak-angsuran.php"><i class="fa fa-circle-o"></i> Cetak Angsuran
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>