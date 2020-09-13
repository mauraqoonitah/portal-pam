<?php


$datanews = doquery('select * from jasa_banner where published="1" order by id asc');

?>
     	<?php

		foreach($datanews as $news)
				{
		?>

                                  

                <div class="col-12 col-md-6 col-lg-4">
      

                    <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.6s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img style="width:300; heigth:150px; " src="<?php echo $config['baseurl'];?>images/jasa_banner/<?php echo $news['image']; ?>" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                                <div><a href="<?php echo $news['description']; ?>"></a></div>
                                <!-- Headline -->
                                <a href="<?php echo $news['description']; ?>" class="headline">
                                    <h5><?php echo $news['description']; ?></h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                






				

			<?php

					}

			?>	
                          





  

