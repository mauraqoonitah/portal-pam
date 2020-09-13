


<?php
 $sidebar = getsidebar();
 $template_path = $config['baseurl'] . 'themes/doge/';
  $image = $config['baseurl'].'images/header/'; 
   ?>


<?php


	$dataslider = doquery('select * from galeri where published=1 order by ordering asc ');	?>	


<style type="text/css" media="screen">
  
.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px
}

.pagination>li {
  display: inline
}

.pagination>li>a,
.pagination>li>span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #000000;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd
}

.pagination>li:first-child>a,
.pagination>li:first-child>span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px
}

.pagination>li:last-child>a,
.pagination>li:last-child>span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px
}

.pagination>li>a:focus,
.pagination>li>a:hover,
.pagination>li>span:focus,
.pagination>li>span:hover {
  z-index: 2;
  color: #23527c;
  background-color: #eee;
  border-color: #ddd
}

.pagination>.active>a,
.pagination>.active>a:focus,
.pagination>.active>a:hover,
.pagination>.active>span,
.pagination>.active>span:focus,
.pagination>.active>span:hover {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #000000;
  border-color: #000000
}

.pagination>.disabled>a,
.pagination>.disabled>a:focus,
.pagination>.disabled>a:hover,
.pagination>.disabled>span,
.pagination>.disabled>span:focus,
.pagination>.disabled>span:hover {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd
}

.pagination-lg>li>a,
.pagination-lg>li>span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333
}

.pagination-lg>li:first-child>a,
.pagination-lg>li:first-child>span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px
}

.pagination-lg>li:last-child>a,
.pagination-lg>li:last-child>span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px
}

.pagination-sm>li>a,
.pagination-sm>li>span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5
}

.pagination-sm>li:first-child>a,
.pagination-sm>li:first-child>span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px
}

.pagination-sm>li:last-child>a,
.pagination-sm>li:last-child>span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px
}

.pager {
  padding-left: 0;
  margin: 20px 0;
  text-align: center;
  list-style: none
}

.pager li {
  display: inline
}

.pager li>a,
.pager li>span {
  display: inline-block;
  padding: 5px 14px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 15px
}

.pager li>a:focus,
.pager li>a:hover {
  text-decoration: none;
  background-color: #eee
}

.pager .next>a,
.pager .next>span {
  float: right
}

.pager .previous>a,
.pager .previous>span {
  float: left
}

.pager .disabled>a,
.pager .disabled>a:focus,
.pager .disabled>a:hover,
.pager .disabled>span {
  color: #777;
  cursor: not-allowed;
  background-color: #fff
}

.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em
}

a.label:focus,
a.label:hover {
  color: #fff;
  text-decoration: none;
  cursor: pointer
}

.label:empty {
  display: none
}

.btn .label {
  position: relative;
  top: -1px
}


 .imgthumbgallery{
   width:400px; height:200px;
 }

</style>
<section class="mbr-gallery mbr-slider-carousel cid-r3umhLB339" id="gallery2-m">

    

   <div class="container">
   <div>
      <!-- Filter -->
      <div class="mbr-gallery-filter container gallery-filter-active">
         <ul buttons="0">
            <li class="mbr-gallery-filter-all"><a class="btn btn-md btn-primary-outline active display-7" href="">All</a></li>
         </ul>
      </div>
      <!-- Gallery -->

      <div class="mbr-gallery-row">
         <div class="mbr-gallery-layout-default">
            <div>
               <div>

               	  <?php
          // Include / load file koneksi.php
       global $db, $recordcount, $config;


          
          // Cek apakah terdapat data page pada URL
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          $limit = 8;
          $limit_start = ($page - 1) * $limit;
          $sql = doquery('select * from galeri limit '.$limit_start.','.$limit);  
          $no = $limit_start + 1; // Untuk penomoran tabel
          foreach ($sql as $row) {
          ?>



                  <div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="<?php echo $row['kategori'];?>">
                     <div href="#lb-gallery2-m" data-slide-to="<?php echo $row['id'];?>" data-toggle="modal">
                     	<img  alt="<?php echo $row['title']; ?>" class="imgthumbgallery" src="<?php echo $config['baseurl'];?>images/galeri/<?php echo $row['image'];?>"></a> <span class="icon-focus"></span> </div>
                  </div>
                
  <?php	}	?> 


               </div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
      <!-- Lightbox -->
      <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery2-m">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="carousel-inner">

                     <div class="carousel-item active"><img src="<?php echo $template_path;?>assets/images/gallery00.jpg" alt="" title=""></div>
       
               	  <?php foreach ($dataslider as $row){?>
               
                     <div class="carousel-item"><img src="<?php echo $config['baseurl'];?>images/fauna/<?php echo $row['image'];?>" alt="" title=""></div>
  <?php	}	?> 
       
                  </div>
                  <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery2-m"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery2-m"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
               </div>
            </div>
         </div>
      </div>
<ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a title="paging" href="#">First</a></li>
          <li class="disabled"><a title="paging" href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a title="paging" href="index.php?page=1">First</a></li>
          <li><a title="paging" href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <!-- LINK NUMBER -->
        <?php
        // Buat query untuk menghitung semua jumlah data
        $sql2 = mysqli_query($db, "SELECT COUNT(*) AS jumlah FROM galeri");
       //  $sql2 = doquery("SELECT COUNT(*) AS jumlah FROM galeri");  
        $get_jumlah = mysqli_fetch_array($sql2);
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a title="Jasa renovasi bogor" href="<?php echo $config['baseurl'];?>modul/gallery?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($page == $jumlah_page){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a title="raquo" href="<?php echo $config['baseurl'];?>modul/gallery?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a title="jumlah" href="<?php echo $config['baseurl'];?>modul/gallery?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul>
   </div>
</div>

</section>