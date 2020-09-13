

<?php


	$dataslider = doquery('select * from slider where published=1 order by ordering asc');	?>		



	






	
    <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel">
            <?php foreach ($dataslider as $row){?>
          <!-- Single Slide -->
            <div class="single-hero-slide bg-img background-overlay" style="background-image: url(<?php echo $config['baseurl'];?>images/slider/<?php echo $row['image'];?>);"></div>
      
      <?php	}			



	?>      
</div>



   
   <!-- Hero Post Slide -->
        <div class="hero-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-post-slide">
                       
                            <?php foreach ($dataslider as $row){?>
                            <div class="single-slide d-flex align-items-center">
                                    <div class="post-number">
                                        <p><?php echo $row['ordering'];?></p>
                                    </div>
                                    <div class="post-title">
                                        <a href="<?php echo $row['url'];?>"><?php echo $row['description'];?></a>
                                    </div>
                                </div>
                              

                                
<?php	}			



	?>      
                        </div>
                    </div>
                </div>
            </div>
        </div>

       









