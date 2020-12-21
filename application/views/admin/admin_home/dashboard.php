<!DOCTYPE html>
<html>


<body class="hold-transition sidebar-mini layout-fixed col-lg-12">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

          <div class="row mb-2 pl-4 col-lg-12 mx-auto">
            <div class="col-lg-6">
              <!-- card profile admin -->
              <div class=" mb-3 mt-3 text-center mx-auto" style="max-width: 350px;">
                <div class=" row no-gutters">
                  <div class="col-lg-12 p-2 ml-2 mx-auto ">
                    <img src="<?= base_url('assets/template/dist/img/') . $admin['image']; ?>" class="card-img " style="width: 100px;">
                  </div>
                  <div class="col-md-12 text-center">
                    <div class="card-body ">
                      <h3 class=""><?= $admin['name']; ?></h3>
                      <p class="card-text" style="color: grey"><?= $admin['email']; ?></p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-lg-4">
            
          <div class="small-box bg-dark pb-4 pt-2 pl-4 pr-4" style="margin-top: 30px">
                <div class="inner">
                  <h5 class="text-center">Statistik Pengunjung Portal</h5>
                </div>
                <div class="icon">
                  <i class="far fa-dot-circle nav-icon"></i>
                </div>
                <div class="">
             <!-- visitor counter -->

              <?php
             // Mendapatkan tanggal sekarang
              $date  = date("Y-m-d"); 
              // Hitung jumlah pengunjung hari ini
              $pengunjunghariini  = $this->db->query("SELECT * FROM visitorcount WHERE date='".$date."' GROUP BY ip")->num_rows(); 
              $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitorcount")->row(); 
              // hitung jumlah pengunjung
              $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; 
              // hitung total kunjungan
              $totalkunjungan  = "SELECT SUM(hits) as totalhits FROM visitorcount"; 
              $totalkunjungan_result = $this->db->query($totalkunjungan) ;
              $outputTotalKunjungan = $totalkunjungan_result->row()->totalhits;
            ?> 

              <table class="text-white">
              <tr>
                <td>Total Kunjungan</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $outputTotalKunjungan; ?> kali</td>
              </tr>
              <tr> 
                <td>Pengunjung Hari ini</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $visitorcount['hits']; ?> orang</td>
                <!-- <td><?= $pengunjunghariini; ?> orang</td> -->
              </tr>
              <tr>
                <td>Total Pengunjung</td> 
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $totalpengunjung; ?> orang</td>
              </tr>
              </table>
        <!-- end visitor counter -->
              </div>   
              </div>
     

              </div>
            </div>
            

          </div>
          
        </div>
        

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 pl-5 pr-5  mx-auto">

            
              <!-- small box -->
              <div class="small-box bg-info mb-4">
                <div class="inner">

                  <h5 class="text-center">List Aplikasi</h5>
                </div>
                <div class="icon">
                  <i class="far fa-dot-circle nav-icon"></i>
                </div>
                <a href="<?= base_url('Admin/Admin_list_aplikasi') ?>" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="small-box bg-info">
                <div class="inner">

                  <h5 class="text-center">Tambah Aplikasi</h5>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-code"></i>
                </div>
                <a href="<?= base_url('Admin/Admin_tambah_aplikasi') ?>" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-6 pl-5 pr-5 mx-auto">
              <!-- small box -->
              <div class="small-box bg-success  mb-4">
                <div class="inner">
                  <h5 class="text-center">List Berita</h5>
                </div>
                <div class="icon">
                  <i class="far fa-dot-circle nav-icon"></i>
                </div>
                <a href="<?= base_url('Admin/Admin_list_berita') ?>" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="small-box bg-success">
                <div class="inner">
                  <h5 class="text-center">Tambah Berita</h5>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-newspaper"></i>
                </div>
                <a href="<?= base_url('Admin/Admin_tambah_berita') ?>" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      </div>

    </div>