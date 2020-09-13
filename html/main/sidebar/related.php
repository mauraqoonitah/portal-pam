<?php

$title 			= $param['title'];
$kategori 		= $param['kategori'];
$nama_template  = $config['theme'];
$template_path  = $config['baseurl'] . 'themes/'.$nama_template.'/';
$res_path 		= $config['baseurl'] . 'res/';

?>								
							<div class="widget related col-xs-12">
        							<h3><?php echo $title; ?></h3>
        							
        							<div class="related-slider flexslider sidebarslider">
        								<ul class="related-list clearfix">
										<?php 							
											//debugvar($datavalue);
											$sqlnya1 = 'select p.*,v.nama_vendor,v.nama_vendor_url from ec_product p left join ec_vendor v on v.id=p.id_vendor where p.id_category='.$kategori.' order by jmllaku desc' ;
											$row	= doqueryrow($sqlnya1);
											$batas	= 1;
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
        										<div class="related-product clearfix">
        											<figure>
													<?php  if (count($data_image)>0) { ?>
        												<img style="max-height:150px;max-width:150px;" src="<?php echo $image_path.$data_image[0]['image']; ?>" style="width:100px;" alt="Gambar <?php echo $data1['nama_product']; ?>">
													<?php }else{ ?>
														<img style="max-height:150px;max-width:150px;" src="<?php echo $default_image_path; ?>"  style="width:100px;" alt="Gambar <?php echo $data1['nama_product']; ?>">
													<?php } ?>
        											</figure>
        											<h5><a href="<?php echo $config['baseurl']."sell/".f_url($data1['nama_vendor_url'])."/".$data1['id']."-".f_url($data1['nama_product']); ?>"><?php echo $data1['nama_product']; ?></a></h5>
        											<div class="related-price">
															Rp <?php echo number_format($data1['price']);?>
													</div><!-- End .related-price -->
        										</div><!-- End .related-product -->
        									<?php 
												}
											?>
        									</li>
											<?php } ?>
        								</ul>
        							</div><!-- End .related-slider -->
        						</div><!-- End .widget -->