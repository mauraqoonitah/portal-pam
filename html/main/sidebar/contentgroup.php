



<?php $dataslider = doquery('select * from content where featured=1 order by ordering asc limit 6');			







	foreach ($dataslider as $row){				     



?>	







										<div class="related_project">



						                    <div class="overlay_a related_img">



						                        <div class="overlay_wrapper">



						                            <img src="<?php echo $config['baseurl'] .'images/featured/'. $row['images']; ?>" alt="<?php echo $row['title']; ?>" title="<?php echo $row['title']; ?>" />	<br />					



						                            <div class="overlay">



						                                <a class="overlay_img" href="<?php echo $config['baseurl'] .'images/featured/'. $row['images']; ?>" rel="lightbox" title=""></a>



						                                <a class="overlay_project" href="<?php echo $config['baseurl'].$row['title_alias']; ?>"></a>



						                                <span class="overlay_title"><?php echo $row['title']; ?></span>



						                            </div>



						                        </div>



						                    </div>



						                    <h4><a href="<?php echo $config['baseurl'].$row['title_alias']; ?>"><?php echo $row['title']; ?></a></h4><br />



						                    <p align="justify"><?php echo substr(strip_tags($row['intro_text']),0,250); ?>[...]</p>



						                </div>



				        



<?php



								}







/*































						                <div class="related_project">



						                    <div class="overlay_a related_img">



						                        <div class="overlay_wrapper">



						                            <img src="<?php echo $config['baseurl'] .'images/featured/'. $row['images']; ?>" alt="<?php echo $row['title']; ?>" title="<?php echo $row['title']; ?>" />						



						                            <div class="overlay">



						                                <a class="overlay_img" href="<?php echo $config['baseurl'] .'images/featured/'. $row['images']; ?>" rel="lightbox" title=""></a>



						                                <a class="overlay_project" href="<?php echo $config['baseurl'].$row['title_alias']; ?>"></a>



						                                <span class="overlay_title"><?php echo $row['title']; ?></span>



						                            </div>



						                        </div>



						                    </div>



						                    <h4><a href="<?php echo $config['baseurl'].$row['title_alias']; ?>"><?php echo $row['title']; ?></a></h4>



						                    <p><?php echo substr($row['intro_text'],0,300); ?>  [...]



						                </div>



*/



?>



