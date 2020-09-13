


<?php
 $sidebar = getsidebar();
 $template_path = $config['baseurl'] . 'themes/doge/';
  $image = $config['baseurl'].'images/header/'; 
   ?>


<?php


  $dataslider = doquery('select * from galeri where published=1 order by ordering asc '); ?>  



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

                  <?php foreach ($dataslider as $row){?>

                  <div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="<?php echo $row['kategori'];?>">
                     <div href="#lb-gallery2-m" data-slide-to="<?php echo $row['id'];?>" data-toggle="modal">
                      <img src="<?php echo $config['baseurl'];?>images/galeri/<?php echo $row['image'];?>" alt="" title=""><span class="icon-focus"></span> </div>
                  </div>
                
  <?php } ?> 


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
               
                     <div class="carousel-item"><img src="<?php echo $config['baseurl'];?>images/galeri/<?php echo $row['image'];?>" alt="" title=""></div>
  <?php } ?> 
       
                  </div>
                  <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery2-m"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery2-m"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

</section>