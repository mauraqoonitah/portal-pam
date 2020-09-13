<?php
registerJS($config['baseurl'].'themes/brown/js/owl.carousel.min.js');
$title 			= $param['title'];
$classnya               = strtolower(str_replace(" ","_",$title)).'-items';
$variablenya            = str_replace(" ","",$title).'Items';
$desc 			= $param['desc'];
$datavalue 		= $param['value'];
$nama_template          = $config['theme'];
$template_path          = $config['baseurl'] . 'themes/'.$nama_template.'/';
$res_path 		= $config['baseurl'] . 'res/';
//debugvar($datavalue);
?>	

                        <div class="<?php echo strtolower(str_replace(" ","_",$title)); ?>-items carousel-wrapper">
                            <header class="content-title">
                                <div class="title-bg">
                                    <h2 class="title"><?php echo $title; ?></h2>
                                </div><!-- End .title-bg -->
                                <p class="title-desc"><?php echo $desc; ?></p>
                            </header>

                            <div class="carousel-controls">
                                <div id="<?php echo strtolower(str_replace(" ","_",$title)); ?>-items-slider-prev" class="carousel-btn carousel-btn-prev">
                                </div><!-- End .carousel-prev -->
                                <div id="<?php echo strtolower(str_replace(" ","_",$title)); ?>-items-slider-next" class="carousel-btn carousel-btn-next carousel-space">
                                </div><!-- End .carousel-next -->
                            </div><!-- End .carousel-controls -->

                            <div class="<?php echo strtolower(str_replace(" ","_",$title)); ?>-items-slider owl-carousel">
                            <?php 							
                                //debugvar($datavalue);
                                foreach ($datavalue  as $row){	
                                    //echo 'recommended nih';
                                    //debugvar($row);
                                    //$data_image = doquery('select * from ec_product_image where id_product='.q($row['id']).' order by urutan asc limit 2');
                                    //$image_path = $config['baseurl']."images/vendor/".$row['id_vendor']."/".$row['id']."/";
                                    //$image_path_abs = $config['basepath']."images/vendor/".$row['id_vendor']."/".$row['id']."/";
                                    //$default_image_path = $config['baseurl']."images/product-image.png";
									//debugvar($row);
									//echo get_url_detail_product($row);
									//debugvar($row);
                                    echo widgetbackend('product_image',array('data'=>$row));
                                } ?>
                            </div><!--bestseller-items-slider -->
                        </div><!-- End .bestseller-items -->
<script>
    $(document).ready(function(){
	"use strict";
    var  <?php echo $variablenya;?> = $('.<?php echo $classnya;?>-slider.owl-carousel');
			//if (self.checkSupport(<?php echo $variablenya;?>, $.fn.owlCarousel)) {
		        <?php echo $variablenya;?>.owlCarousel({
		            items: 4,
		            itemsDesktop : [1199,4],
		            itemsDesktopSmall: [979,3],
		            itemsTablet: [768,2],
		            itemsMobile : [479,1],
		            slideSpeed: 400,
		            autoPlay: 8000,
		            stopOnHover: true,
		            navigation: false,
		            pagination: false,
		            responsive: true,
		            mouseDrag: false,
		            autoHeight : true
		        }).data('navigationBtns', ['#<?php echo $classnya;?>-slider-prev', '#<?php echo $classnya;?>-slider-next']);
		    //}
    });
</script>