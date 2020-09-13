 <?php
$datanews = doquery('select * from jasa_banner where published="1" order by id asc');

?>
<section class="features13 cid-r3ulBoQM5L" id="features13-h">

    

    
    <div class="container">
        <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2">
            Images with text on them

        </h2>
        <div class="media-container-row container">
         <?php foreach($datanews as $news)

                {
                                                
        ?>
        
            <div class="card col-12 col-md-6 p-5 m-3 align-center col-lg-4">
                <div class="card-img">
                    <img style="width: 360px" height="173"  src="<?php echo $config['baseurl'];?>images/jasa_banner/<?php echo $news['image'];?>" alt="Mobirise">>
                </div>
                <h4 class="card-title py-2 mbr-fonts-style display-5">
                    <?php echo $news['title'];?>
                </h4>
                <p class="mbr-text mbr-fonts-style display-7">
                    <?php echo $news['description'];?>
                </p>
            </div>

            <?php

                    }

               ?>  

            
</div></section>