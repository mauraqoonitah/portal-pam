<?php

$banyak 			= $param['banyak'];

//overrid theme front
$config['theme'] = 'mandor';


if ($banyak==''){

	$banyak = 5;

}


/* 
$datanews = doquery('	select n.id,title,title_alias,created,count(title) as banyak 

						from news n

						inner join news_hits h on h.id_news=n.id

						where n.published=1 and h.waktu >= ( CURDATE() - INTERVAL '.$hari.' DAY )

						group by title,title_alias

						order by count(title) desc limit '.$banyak);

 */


$datanews = doquery('select * from news where published="1" order by created desc limit '.$banyak);

?>

     	<?php

		foreach($datanews as $news)

				{

			$url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';

												

		?>

                     <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img style=" width: 95px;
    height: auto;" src="<?php echo $config['baseurl'];?>images/news/<?php echo $news['img_ilustrasi']; ?>" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="<?php echo $url_berita; ?>" class="headline">
                                            <h5 class="mb-0"><?php echo $news['title']; ?></h5>
                                        </a>
                                    </div>
                                </div>


      








				

			<?php

					}

			?>	



                                    





  

