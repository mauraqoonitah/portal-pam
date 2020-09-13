<?php
//show iklan
$data = doquery('select * from video where published="1" order by created desc limit 1');
?>

<ul>

                                            <?php
											foreach($data as $video){
											?>
										
										    <li style="margin-left: -50px; margin-top: 10px;"> 
										   <!-- <iframe width="250"  src="//www.youtube.com/embed/<?php echo $video['youtube'] ?>" frameborder="0" allowfullscreen></iframe><br> -->
										    
                                            </li>
												
											<?php
											}
											?>
</ul>
                                    
                                
                            



