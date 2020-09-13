<?php

$id = $_GET['id'];



$dataview = doquery('select * from content where title_alias="'.$id.'"');

if (count($dataview)<1){

    require($config['basepath'] . 'main/404.php');

} else {

    $row = $dataview[0];

?>

<section class="mbr-section content5 cid-r3Sm5GHAF0 mbr-parallax-background" id="content5-g"  style="background-image: url(images/slider/bg1.jpg); background-repeat: no-repeat; width: 100%;">

    

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                   <?php echo $row['title']; ?>
                </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
                    Article header with background image and parallax effect
                </h3>
                
                
            </div>
        </div>
    </div>

</section>
<br>

<section class="engine"><a href="https://mobiri.se/c">free web builder</a></section><section class="mbr-section article content1 cid-r3Sm8XZKCT" id="content1-h">
    
     

    <div class="container">
        <div class="media-container-row">
             <img class="img-fluid rounded" style="width: 40%;" src="<?php echo $config['baseurl']; ?>images/featured/<?php echo $row['images']; ?>" alt="">
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
                <?php echo $row['full_text']; ?>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article content1 cid-r3Sm9SM4zR" id="content2-i">

     

    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
                <blockquote> <strong>Make your own website in a few clicks!</strong> Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface. Mobirise Website Builder creates responsive, retina and <strong>mobile friendly websites</strong> in a few clicks. Mobirise is one of the easiest website development tools <a href="https://mobirise.com/">available</a> today. It also gives you the freedom to develop as many websites as you like given the fact that it is a desktop app.</blockquote>
            </div>
        </div>
    </div>
</section>

<section class="footer4 cid-r3SmFy8wXH" id="footer4-m">

    
<?php

}

?>
    

    