

<?php


	$dataslider = doquery('select * from slider where published=1 order by ordering asc');	?>		



	






   
   <!-- Hero Post Slide -->
        <div class="hero-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-post-slide">
                       
                            <?php foreach ($dataslider as $row){?>
                            <div class="single-slide d-flex align-items-center">
                                    <div class="post-number">
                                        <p><?php echo $row['id'];?></p>
                                    </div>
                                    <div class="post-title">
                                        <a href="single-blog.html"><?php echo $row['description'];?></a>
                                    </div>
                                </div>
                              

                                
<?php	}			



	?>      
                        </div>
                    </div>
                </div>
            </div>
        </div>

       