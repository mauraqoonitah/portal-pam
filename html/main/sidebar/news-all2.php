<?php

$banyak 			= $param['banyak'];

//overrid theme front
$config['theme'] = 'mandor';




$datanews = doquery('select * from news where published="1" order by created desc');

?>
<div class="row">

     	<?php

		foreach($datanews as $news)

				{

			$url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';

												

		?>

                   <div class="col-md-6">  
                         <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img style=" width: 300px;
    height: auto;" src="<?php echo $config['baseurl'];?>images/news/<?php echo $news['img_ilustrasi']; ?>" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="<?php echo $url_berita; ?>" class="headline">
                                                <h5><?php echo $news['title']; ?></h5>
                                            </a>
                                            <p><?php echo $news['intro_text']; ?>... <a href="<?php echo $url_berita; ?>"> Read More</a></p> 
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p><a href="<?php echo $url_berita; ?>" class="post-author"></a> on <a href="#" class="post-date"><?php echo tgl_indo($news['created']).' '.date('H:i',strtotime($news['created'])); ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>


</div>







				

			<?php

					}

			?>	



                                




  
</div>
