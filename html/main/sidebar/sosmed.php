<?php

$banyak 			= $param['banyak'];

//overrid theme front
$config['theme'] = 'mandor';




/* 
$datanews = doquery('	select n.id,title,title_alias,created,count(title) as banyak 

						from news n

						inner join news_hits h on h.id_news=n.id

						where n.published=1 and h.waktu >= ( CURDATE() - INTERVAL '.$hari.' DAY )

						group by title,title_alias

						order by count(title) desc limit '.$banyak);

 */


$datanews = doquery('select * from award where published="1" order by id asc');

?>
   <div class="widget-content">

 <div class="social-area d-flex justify-content-between">
     	<?php

		foreach($datanews as $news)

				{

		
												

		?>

                                     <a href="#"> <img style=" width: 95px; height: auto;" src="<?php echo $config['baseurl'];?>images/award/<?php echo $news['image']; ?>" alt=""></a>
                         

      








				

			<?php

					}

			?>	

    </div>

                  </div>                   





  

