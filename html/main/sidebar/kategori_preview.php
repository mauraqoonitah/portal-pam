<?php
$title 			= $param['title'];
$desc 			= $param['desc'];
$datavalue 		= $param['value'];
$nama_template = 'brown';
$template_path = $config['baseurl'] . 'themes/'.$nama_template.'/';
$res_path = $config['baseurl'] . 'res/';

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
									$image_path = $config['baseurl']."images/vendor/".$row['id_vendor']."/".$row['id']."/";
									
							?>	
                                <div class="item item-hover">
                                    <div class="item-image-wrapper">
                                        <figure class="item-image-container">
                                            <a href="product.html">
                                                <img src="<?php echo $image_path.$row['img_icon']; ?>" alt="item<?php echo $row['id']; ?>" class="item-image">
                                                <img src="<?php echo $image_path.$row['img_hover']; ?>" alt="item<?php echo $row['id']; ?>  Hover" class="item-image-hover">
                                            </a>
                                        </figure>
                                        <div class="item-price-container">
                                                    <?php if ($row['price']!=$row['normal_price']) { ?>
														<span class="old-price"><span class="sub-price">Rp <?php echo number_format($row['normal_price']);?></span></span>
                                                    <?php } ?>
														<span class="item-price"><span class="sub-price">Rp <?php echo number_format($row['price'],0,',','.'); ?></span></span>
										</div><!-- End .item-price-container -->
                                    </div><!-- End .item-image-wrapper -->
                                    <div class="item-meta-container">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-result" data-result="80"></div>
                                            </div><!-- End .ratings -->
                                            <span class="ratings-amount">
                                                4 Reviews
                                            </span>
                                        </div><!-- End .rating-container -->
                                        <h3 class="item-name"><a href="<?php echo $config['baseurl']."jual/".$row['url_alias']; ?>"><?php echo $row['nama_product']; ?></a></h3>
                                        <div class="item-action">
                                            <a href="#" class="item-add-btn">
                                                <span class="icon-cart-text">Add to Cart</span>
                                            </a>
                                            <div class="item-action-inner">
                                                <a href="#" class="icon-button icon-like">Favourite</a>
                                                <a href="#" class="icon-button icon-compare">Checkout</a>
                                            </div><!-- End .item-action-inner -->
                                        </div><!-- End .item-action -->
                                    </div><!-- End .item-meta-container --> 
                                </div><!-- End .item -->
							<?php } ?>
                            </div><!--bestseller-items-slider -->
                        </div><!-- End .bestseller-items -->
