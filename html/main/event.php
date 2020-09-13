  <?php

 
    $sidebar = getsidebar();
    $template_path = $config['baseurl'] . 'themes/elite/blog';
    $template_path2 = $config['baseurl'] . 'themes/elite/';
       $template_pathss = $config['baseurl'] .  'themes/elite/artmenu/';
    registerCSS($config['baseurl'] . 'res/ecommerce.css');
$path = $config['baseurl'].'themes/elite/mnzweb/'; 
$path2 = $config['baseurl'].'images/header/'; 


    $nama_template = 'doctor';
        $template_path7sky = $config['baseurl'] . 'themes/'.$nama_template.'/';
        $template_pathelite = $config['baseurl'] . 'themes/elite/magexpress/';


    ?>


<?php
//echo get('id');
$data_news = doquery('select * from event where id='.get('id'));
//debugvar($data_news);

//echo widget('news-all');
?> 



<link href="<?php echo $template_path;?>css/blog-post.css" rel="stylesheet">
    <link href="<?php echo $template_path;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<div class="gtco-container">

 <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $data_news[0]['intro_text']; ?></h1>

          

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo $data_news[0]['created']; ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" style="width: 40%;" src="<?php echo $config['baseurl']; ?>images/news/<?php echo $data_news[0]['img_ilustrasi']; ?>" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $data_news[0]['intro_text']; ?></p>

         

          <p><?php echo $data_news[0]['full_text']; ?></p>

          <hr>

       

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->




</div>







