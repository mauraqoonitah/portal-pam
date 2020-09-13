
<section class="cid-r3umD9KGcY" id="social-buttons3-o">
    
    <?php
$datanews = doquery('select * from award where published="1" order by id asc');

?>
    

    <div class="container">
        <div class="media-container-row">
            <div class="col-md-8 align-center">
                <h2 class="pb-3 mbr-section-title mbr-fonts-style display-2">
                    SHARE THIS PAGE!
                </h2>
                <div>
                    <div class="mbr-social-likes">
                        <?php

        foreach($datanews as $news)

                {
                                                
        ?>
                     
                        <span class="btn btn-social socicon-bg-<?php echo $news['title'];?> <?php echo $news['title'];?> mx-2" title="Share link on <?php echo $news['title'];?>">
                            <i class="socicon socicon-<?php echo $news['title'];?>"></i>
                        </span>

                     <?php

                    }

               ?>  


                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>