<!DOCTYPE html>
<html>


<body class="hold-transition sidebar-mini layout-fixed col-lg-12">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
        <div class="container-fluid">
        

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 pl-5 pr-5  mx-auto">
           
              <!-- small box -->
              <div class="small-box bg-dark mb-2 mt-4 mb-4 pt-2">

              <!-- card profile admin -->
              <div class=" text-center mx-auto" style="max-width: 350px;">
                <div class=" row no-gutters">
                  <div class="col-lg-12 p-2 ml-2 mx-auto ">
                    <img src="<?= base_url('assets/template/dist/img/') . $admin['image']; ?>" class="card-img " style="width: 100px;">
                  </div>
                  <div class="col-md-12 text-center">
                    <div class="card-body ">
                      <h3 class=""><?= $admin['name']; ?></h3>
                      <p class="card-text" style="color: lightblue;"><?= $admin['email']; ?></p>
                    </div>
                  </div>
                </div>

              </div>              
            </div>
            
            </div>

            <!-- ./col -->
            <div class="col-lg-6 pl-5 pr-5 pt-5">
              <!-- small box -->
              <div class="small-box bg-light mb-2 mt-4 mb-4 pt-2 pl-4 pr-4 pb-4"  >
             
                <div class="inner" >
                  <h5 class="font-weight-bold text-center" style="font-size: 18px;">Statistik Kunjungan Portal</h5>
                </div>
   
             <!-- visitor counter -->

             <?php
             // Mendapatkan tanggal sekarang
              $date  = date("Y-m-d"); 
              $bataswaktu = time() - 300;
              date_default_timezone_set('Asia/Jakarta');
              $timeinsert = date("Y-m-d H:i:s");
              // Hitung jumlah pengunjung hari ini
              $pengunjunghariini  = $this->db->query("SELECT * FROM visitorcount WHERE date='".$date."' GROUP BY ip")->num_rows(); 
              $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitorcount")->row(); 
              // hitung jumlah pengunjung
              $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; 
              // hitung total kunjungan
              $totalkunjungan  = "SELECT SUM(hits) as totalhits FROM visitorcount"; 
              $totalkunjungan_result = $this->db->query($totalkunjungan) ;
              $outputTotalKunjungan = $totalkunjungan_result->row()->totalhits;
            
              // hitung total pengunjung hari ini 
              $totalpengunjungHariini  = "SELECT SUM(hits) as totalhitsToday FROM visitorcount WHERE date='".$date."'" ; 
              $totalpengunjungHariini_result = $this->db->query($totalpengunjungHariini) ;
              $outputTotalPengunjungHariini =  $totalpengunjungHariini_result->row()->totalhitsToday;
  
            ?> 

              <table style="font-size: 16px;">
           
              <tr> 
                <td>Kunjungan Hari ini</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?=  $outputTotalPengunjungHariini; ?> kali</td>
              </tr>
              <tr> 
                <td>Pengunjung Hari ini</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $pengunjunghariini; ?> orang</td>
               </tr>

               <tr>
                <td> Total Kunjungan</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $outputTotalKunjungan; ?> kali</td>
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
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 pl-5 pr-5  mx-auto">
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

            <div class="col-lg-6 pl-5 pr-5 mx-auto">
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
          </div>
        </div>
      </section>
      </div>

    </div>