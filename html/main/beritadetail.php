<?php







 



    $sidebar = getsidebar();





    ?>











<?php



//echo get('id');



$data_news = doquery('select * from news where id='.get('id'));



//debugvar($data_news);







//echo widget('news-all');



?> 















<div class="gtco-container">







 <div class="container">







      <div class="row">







        <!-- Post Content Column -->



        <div class="col-lg-8">







          <!-- Title -->



          <h1 class="mt-4"><?php echo $data_news[0]['title']; ?></h1>







          







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



      <!-- /.row -->







    </div>



    <!-- /.container -->



















</div>