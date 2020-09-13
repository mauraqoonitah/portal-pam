<?php

$title 			= $param['title'];
$sqlnya1 		= $param['sql_data'];
$kategori 		= $param['kategori'];
$nama_template  = $config['theme'];
$template_path  = $config['baseurl'] . 'themes/'.$nama_template.'/';
$res_path 		= $config['baseurl'] . 'res/';

?>								
							<div class="col-md-4 col-sm-4 col-xs-12 widget">
        							<div class="title-bg">
										<h3><?php echo ucfirst($title); ?></h3>
									</div><!-- End .title-bg -->
        							<div class="footer-<?php echo $title; ?>-slider flexslider footerslider">
        								<ul class="slides">
										<?php 							
											//debugvar($datavalue);
											//$sqlnya1 = 'select p.*,v.nama_vendor,v.nama_vendor_url from ec_product p left join ec_vendor v on v.id=p.id_vendor order by jmllaku desc' ;
											$row	= doqueryrow($sqlnya1);
											$batas	= 3;
											$jumlah = ceil($row/$batas);
											//echo $jumlah;
											for($a=1;$a<=$jumlah;$a++){
												$posisi = ( $a - 1 ) * $batas;
												$sql1 = $sqlnya1.' limit '.$posisi.','.$batas;
												$query1 = doquery($sql1);
										?>	
        									<li>
											<?php 
												foreach($query1 as $data1){
												$data_image = doquery('select * from ec_product_image where id_product='.q($data1['id']).' order by urutan asc limit 1');
												$image_path = $config['baseurl']."images/vendor/".$data1['id_vendor']."/".$data1['id']."/";
												$default_image_path = $config['baseurl']."images/product-image.png";
											?>
        										<div class="slide-item clearfix">
        											<figure class="item-image-container">
													<?php  if (count($data_image)>0) { ?>
        												<img style="max-height:150px;max-width:150px;" src="<?php echo $image_path.$data1['img_icon']; ?>" style="width:100px;" alt="Gambar <?php echo $data1['nama_product']; ?>">
													<?php }else{ ?>
														<img style="max-height:150px;max-width:150px;" src="<?php echo $default_image_path; ?>"  style="width:100px;" alt="Gambar <?php echo $data1['nama_product']; ?>">
													<?php } ?>
        											</figure>
													<p class="item-name" style="padding:10px;">
															<a href="<?php echo $config['baseurl']."sell/".f_url($data1['nama_vendor_url'])."/".$data1['id']."-".f_url($data1['nama_product']); ?>"><?php echo $data1['nama_product']; ?></a>
															
													</p>
        											<div class="item-price-special" style="margin-top:73px;">
																Rp <?php echo number_format($data1['price']);?>
															</div>
        										</div><!-- End .related-product -->
        									<?php 
												}
											?>
        									</li>
											<?php } ?>
        								</ul>
        							</div><!-- End .related-slider -->
									<div class="md-margin visible-xs"></div><!-- space -->
        						</div><!-- End .widget -->