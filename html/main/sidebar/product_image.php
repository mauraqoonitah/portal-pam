<?php 
$row = $param['data'];
$image_path = $config['baseurl']."images/vendor/".$row['id_vendor']."/".$row['id']."/";
$image_path_abs = $config['basepath']."images/vendor/".$row['id_vendor']."/".$row['id']."/";
$default_image_path = $config['baseurl']."images/product-image.png";
//debugvar($row);
//echo $image_path_abs.$row['img_icon'];
?>

<div class="item item-hover">
    <div class="row">
    <h2 class="item-vendor" align="left">
        <div class="row">
            <div class="col-md-10 col-lg-10 col-xs-10">
                <a href="#" class="favorite-vendor"><i class="fa fa-star-o"></i></a> <a href="<?php echo $config['baseurl']."vendor/".$row['nama_vendor_url']; ?>"><?php echo $row['nama_vendor']; ?></a>
            </div>            
        </div>
    </h2>
    
    <div class="item-image-wrapper">
        <figure class="item-image-container">
            <a href="<?php echo get_url_detail_product($row); ?>">

            <?php 
            $gambar1 = $default_image_path;
            if (strlen($row['img_icon'])>0) {
                if (file_exists($image_path_abs.$row['img_icon'])) { 
                    $gambar1 = $image_path.$row['img_icon'];
                }
            }
            ?>

            <?php    

            $gambar2 = $gambar1;
            if (strlen($row['img_hover'])>0) {
                if (file_exists($image_path_abs.$row['img_hover'])) { 
                    $gambar2 = $image_path.$row['img_hover'];
                    $str_gambar2 = '<img src="'.$gambar2.'" alt="Gambar '. $row['nama_product'].' Hover" class="item-image-hover">';
                } else $str_gambar2 = '';
            } else $str_gambar2 = '';
            ?>
            <img src="<?php echo $gambar1; ?>" alt="Gambar <?php echo $row['nama_product']; ?>" class=""/>
            <?php echo $str_gambar2; ?>


            </a>
            
        </figure>
        
        <div class="item-price-container">
                    <?php if ($row['price']!=$row['normal_price'] && $row['normal_price']>0) { ?>
                            <span class="old-price"><span class="sub-price">Rp <?php echo number_format($row['normal_price']);?></span></span>
                    <?php } ?>
                            <span class="item-price"><span class="sub-price">Rp <?php echo number_format($row['price'],0,',','.'); ?></span></span>
        </div><!-- End .item-price-container -->
        
    </div><!-- End .item-image-wrapper -->
    <div class="item-name col-lg-12 col-md-12 col-xs-12" align="left">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-xs-1">
                <a href="#"><i class="fa fa-heart-o"></i></a>
            </div>
            <div class="col-lg-10 col-md-10 col-xs-10">
                <a href="<?php echo get_url_detail_product($row); ?>"><b><?php echo $row['nama_product']; ?></b></a>
            </div>
        </div>
    </div>
</div>    
</div><!-- End .item -->