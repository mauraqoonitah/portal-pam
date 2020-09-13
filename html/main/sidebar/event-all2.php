<?php

$banyak       = $param['banyak'];



if ($banyak==''){

  $banyak = 4;

}



$dataevent = doquery('select * from event where published="1" order by created desc');

?>

   <?php
   
    $template_path = $config['baseurl'] . 'themes/flower/';

?>


 <link href="<?php echo $template_path;?>css/pgwslider.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" id="camera-css" href="<?php echo $template_path;?>css/camera.css" type="text/css" media="all">

 <link href="<?php echo $template_path;?>css/stylenews.css" type="text/css" rel="stylesheet">

<link href="<?php echo $template_path;?>css/materialize.css" type="text/css" rel="stylesheet">
                                  

<div style="background-color: #eaeaea;">

<div class="row">
      <?php

    foreach($dataevent as $event)

        {

      $url_berita = $config['baseurl'].'berita/'.$event['id'].'-'.$event['title_alias'].'.html';

                        

    ?>

                    
                   
                  
                    <div class="col l3 col m6 col s12" style="padding-bottom:10px; ">
                        <!--  Vertical event Box -->
                        <div class="event vertical z-depth-1">
                            <!-- event Image -->
                            <div class="event-image">
                                <img class="responsive-img" style="width:400px;height: 200px;" src="<?php echo $config['baseurl'];?>images/event/<?php echo $event['img_ilustrasi']; ?>" alt="event Image">
                            </div>
                            <!-- event Description -->
                            <div class="event-description">
                                <div class="event-time">
                                    <i class="fa fa-clock-o"></i> <?php echo tgl_indo($event['created']).' '.date('H:i',strtotime($event['created'])); ?>  
                                </div>
                                <div class="event-title"> <a href="<?php echo $url_berita; ?>"> <?php echo $event['title']; ?></a></div>
                                  <div class="event-content"><p><?php echo substr($event['intro_text'], 0, 150); ?>...</p></div>

                                
                            </div>
                        </div>
                    </div>















        

      <?php

          }

      ?>  



                                    



                
                </div>

</div>








