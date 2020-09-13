

  <section class="mbr-gallery mbr-slider-carousel cid-r26bleNaLP" id="gallery2-5">
    <div class="container">
        <div><!-- Filter --><div class="mbr-gallery-filter container gallery-filter-active">
         <h2>
            Galeri Jasa Renovasi Bogor
</h2>
        </div><!-- Gallery -->
        <div class="mbr-gallery-row">
          <div class="mbr-gallery-layout-default">
            <div><div>
   <?php
    $datagaleri = doquery('select * from galeri where published=1 order by ordering asc');          
    foreach ($datagaleri as $row){?>

               <div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="Awesome">
                <div href="#lb-gallery2-5" data-slide-to="0" data-toggle="modal">
                            <a href="#"><img style="width:400px; height:200px;" src="<?php echo $config['baseurl'];?>images/galeri/<?php echo $row['image'];?>
"></a>
                
                 
                       </div>
              </div>

                <?php   }           
?>      
                


    </div>
              </div>
            
              
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>






















