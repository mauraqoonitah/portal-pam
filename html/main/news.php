  <?php



 

    $sidebar = getsidebar();



    ?>





<?php

//echo get('id');

$data_news = doquery('select * from news where id='.get('id'));

//debugvar($data_news);



//echo widget('news-all');

?> 







<link href="<?php echo $template_path;?>css/blog-post.css" rel="stylesheet">

    <link href="<?php echo $template_path;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



<div class="gtco-container">



 <div class="container">



      <div class="row">



        <!-- Post Content Column -->
<a href="http://portal.pamjaya.co.id/" class="btn btn-info" style="width: 100px;">                            

                  <span></span> Kembali

                </a>
        <div class="col-lg-8">



          <!-- Title -->

          <h1 class="mt-4"><?php echo $data_news[0]['title']; ?></h1>



          



          <hr>



          <!-- Date/Time -->

          <p>Posted on <?php echo $data_news[0]['created']; ?></p>



          <hr>



          <!-- Preview Image -->

         



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















