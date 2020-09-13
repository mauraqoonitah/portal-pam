<?php
//show iklan
$data = doquery('select * from iklan where published="1" order by created desc limit 3');
?>

<ul>

                                            <?php
											foreach($data as $iklan){
											?>
										
										    <li style="margin-left: -50px; margin-top: 10px;"> 
										    <a href="#" target="_blank">
										    <p><img style="max-width: 292px" alt="<?php echo $iklan['nama'];?>" class="art-lightbox" alt="<?php echo $iklan['nama'];?>" src="<?php echo $config['baseurl']; ?>images/iklan/<?php echo $iklan['iklan'];?>"></p>
										    </a>
										    
                                            </li>
												
											<?php
											}
											?>
</ul>
                                    
                                
                            



