<?php

$banyak 			= $param['banyak'];



if ($banyak==''){

	$banyak = 2;

}



$datanews = doquery('select * from event where published="1" order by created desc limit '.$banyak);

?>

   <?php
   
    $template_path = $config['baseurl'] . 'themes/flower/';

?>


 <link href="<?php echo $template_path;?>css/pgwslider.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" id="camera-css" href="<?php echo $template_path;?>css/camera.css" type="text/css" media="all">

 <link href="<?php echo $template_path;?>css/stylenews.css" type="text/css" rel="stylesheet">

<link href="<?php echo $template_path;?>css/materialize.css" type="text/css" rel="stylesheet">
                                  



<div class="row">
     	<?php

		foreach($datanews as $news)

				{

			$url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';

												

		?>

                    
                   
                  
                    <div class="col l3 col m6 col s12">
                        <!--  Vertical News Box -->
                        <div class="news vertical z-depth-1">
                            <!-- News Image -->
                            <div class="news-image">
                                <img class="responsive-img" style="width:400px;height: 200px;" src="<?php echo $config['baseurl'];?>images/event/<?php echo $news['img_ilustrasi']; ?>" alt="news Image">
                            </div>
                            <!-- News Description -->
                            <div class="news-description">
                                <div class="news-time">
                                    <i class="fa fa-clock-o"></i> <?php echo tgl_indo($news['created']).' '.date('H:i',strtotime($news['created'])); ?>  
                                </div>
                                <div class="news-title"> <a href="<?php echo $url_berita; ?>"> <?php echo $news['title']; ?></a></div>
                                  <div class="news-content"><p><?php echo substr($news['intro_text'], 0, 150); ?>...</p></div>

                                
                            </div>
                        </div>
                    </div>




















				

			<?php

					}

			?>	



                                    



								
                </div>







