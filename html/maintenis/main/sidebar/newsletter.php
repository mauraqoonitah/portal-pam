
<?php
		$nama_template = '7sky';
		$template_path = $config['baseurl'] . 'themes/'.$nama_template.'/';
		$res_path = $config['baseurl'] . 'res/';

$datanews = doquery('select * from news where published="1" order by created desc limit 3');
?>
                            <?php foreach($datanews as $news)
                                                        {
                                                    ?>
                             <?php $url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html'; ?>
              
                                                    <li>
                <div class="media wow fadeInDown"> <a href="<?php echo $url_berita; ?>" class="media-left">                 <?php if ($news['img_ilustrasi']==""){?>
 <img alt="" width="112px" height="112px" src="<?php echo $config['baseurl'];?>images/news/no_image.jpg">
  

                  <?php }else{?>
                    <img alt="" width="112px" height="112px" src="<?php echo $config['baseurl'];?>images/news/<?php echo $news['img_ilustrasi']; ?>">




                <?php  }?> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="<?php echo $url_berita; ?>"><?php echo $news['title']; ?></a></h4>
                    <p><?php echo substr($news['intro_text'],100,100); ?></p>
                  </div>
                </div>
              </li>
				                    
                                                              
				                    
                                                    <?php
							}
                                                    ?>	
				                



