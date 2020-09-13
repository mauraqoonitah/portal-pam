<?php

$banyak 			= $param['banyak'];

if ($banyak==''){
	$banyak = 2;
}
//echo $banyak;
$datanews = doquery('select * from news where published="1" order by created desc limit '.$banyak);
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
								



