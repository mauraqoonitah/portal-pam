<style type="text/css">
    
        .container-3{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 5px;

    
    }
    .container-1 div, .container-2 div, .container-3 div{
        border: 1px white solid;
                padding: 10px;
        
    }
    
    .boxas-3{
        width: 20%;
        margin: 5px;
    }

</style>
<?php

$banyak             = $param['banyak'];

//overrid theme front
$config['theme'] = 'doge';




$datanews = doquery('select * from news where published="1" order by created desc limit 4');

?>


<div class="container-3">
    <?php

        foreach($datanews as $news)

                {

            $url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';

                                            

        ?>
    <div class="boxas-3">
        
         <img style=" width: 100%;
    height: 300px;" src="<?php echo $config['baseurl'];?>images/news/<?php echo $news['img_ilustrasi']; ?>" alt="">
    <a href="<?php echo $url_berita; ?>" class="headline">
        <br><br>
        <h5><?php echo $news['title']; ?></h5>
    </a>
       <p><?php echo substr($news['intro_text'], 0, 100) . '...';
#revisi ?>... 
            <a href="<?php echo $url_berita; ?>"> Read More</a></p>     
    </div>
<?php } ?>
    
</div>