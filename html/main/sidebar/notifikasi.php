<?php

global $pesan;

if (strlen($pesan)>0){
?>
<section id="content">    
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
<?php
    if($pesan_mode=='info'){
                            ?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $pesan;?>
    </div><!-- End .alert-info -->
                    <?php
                    } else if($pesan_mode=='sukses'){
                    ?>
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <span class="entypo-info-circled"></span>
        <?php echo $pesan;?>
    </div>
                    <?php
                    } else if($pesan_mode=='warning'){
                    ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $pesan;?>
    </div><!-- End .alert-warning -->
                    <?php
                    }
?>
        </div> 
    </div>
</div>
</section>
<?php            
            }
?>
