<?php

$banyak 		= $param['banyak'];
$hari 			= $param['hari'];

if ($hari==''){
	$hari='29';
}

if ($banyak==''){
	$banyak = 2;
}
//echo $banyak;
$datanews = doquery('	select n.id,title,title_alias,created,count(title) as banyak 
						from news n
						inner join news_hits h on h.id_news=n.id
						where n.published=1 and h.waktu >= ( CURDATE() - INTERVAL '.$hari.' DAY )
						group by title,title_alias
						order by count(title) desc limit '.$banyak);
//debugvar($datanews);
?>
								
								<div class="xspan3">
                                <div class="xsidewidt">
                                  
                                    <div style="padding: 2px 2px 2px 2px">
                                        <ul>
                                            <?php
											foreach($datanews as $news){
												$url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';
											?>
											<li><span style="font-size: 10px"> <?php echo tgl_indo($news['created']).' '.date('H:i',strtotime($news['created'])); ?> </span> 
												<h6> <b>
		<a href="<?php echo $url_berita; ?>"><?php echo $news['title']; ?> </a></b> </h6></li>
                                       
                                            
											<hr color="#D4D4D4">
											<?php
											}
											?>	
                                        </ul>
                              
                                    </div>
                                    
                                </div>
								</div>
								



