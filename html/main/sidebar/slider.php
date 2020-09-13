<style type="text/css">
  .secHeader {
    width: 100%;
    margin: 0 auto;
    height: 50px;
    
    
    
    
    
    

}
</style>
<!-- <?php

 $sidebar = getsidebar();

 $template_path = $config['baseurl'] . 'themes/doge/';

  $image = $config['baseurl'].'images/header/'; 

   ?>


<?php


    $dataslider = doquery('select * from slider where published=1 order by ordering asc '); ?>   -->
    <?php
 $sidebar = getsidebar();
 $template_path = $config['baseurl'] . 'themes/pam/';
  $image = $config['baseurl'].'images/header/'; 
   ?>


   

    <div class="mWrapper">
      <div class="container">

        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="logo" style="margin-top: -20px;">
              <a href="#"><img src="<?php echo $config['baseurl'];?>assets/images/pamjaya-logo.png" style="max-width: 150px; float: left; " alt=""></a>
              

              <h1 class="text-center" style="color: #00ACE9; padding-top: 25px; letter-spacing: 2px; font-size: 42px; font-weight: 600; margin-bottom: 20px; text-transform: uppercase;">PORTAL PAM JAYA</h1>

              
            
            </div>

          </div>
          <div class="col-sm-8 col-md-8">
            <nav class="mainMenu">
              <ul class="nav">
                <!-- <li><a href="<?php echo $config['baseurl'];?>index.php">Home</a></li> -->
               <!--  <li><a href="<?php echo $config['baseurl'];?>modul/newspagewidget">News</a></li> -->
                <!-- <li><a href="<?php echo $config['baseurl'];?>modul/gallerypam">Gallery</a></li> -->
                <!-- <li><a href="#templatemo_about">About</a></li> -->
               <!--  <li><a href="#templatemo_contact">Contact</a></li> -->
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

   <!-- 


<div id="wowslider-container1">

    <div class="ws_images">

        <ul>

            <li>

                <iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe> 

                <img src="<?php echo $template_path;?>assets/data1/images/gd0m4qchfpu.png" alt="03 06082018 INA Community Empowerment to Improve Education Service in Disadvantaged Villages" title="03 06082018 INA Community Empowerment to Improve Education Service in Disadvantaged Villages" id="wows1_0" />

            </li>

            <li>

                <iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe> 

                <img src="<?php echo $template_path;?>assets/data1/images/3iylhirpo.png" alt="MAROS" title="MAROS" id="wows1_1" />

            </li>
             <?php foreach ($dataslider as $row){?>


            <li>

                <img src="<?php echo $template_path.'assets/data1/images/'.$row['image']; ?>" alt="DJI_0007" title="DJI_0007" id="wows1_2" />

            </li>
<?php   }   ?> 
            
        </ul>

    </div>

    <div class="ws_bullets">

        <div> <a href="#" title="03 06082018 INA Community Empowerment to Improve Education Service in Disadvantaged Villages"><span><img src="<?php echo $template_path;?>assets/data1/tooltips/gd0m4qchfpu.png" alt="03 06082018 INA Community Empowerment to Improve Education Service in Disadvantaged Villages"/>1</span></a>

            <a href="#" title="MAROS"><span><img src="<?php echo $template_path;?>assets/data1/tooltips/3iylhirpo.png" alt="MAROS"/>2</span></a>

            <a href="#" title="DJI_0007"><span><img src="<?php echo $template_path;?>assets/data1/tooltips/dji_0007.png" alt="DJI_0007"/>3</span></a>

            <a href="#" title="DJI_0046"><span><img src="<?php echo $template_path;?>assets/data1/tooltips/dji_0046.png" alt="DJI_0046"/>4</span></a>

            <a href="#" title="DJI_0048"><span><img src="<?php echo $template_path;?>assets/data1/tooltips/dji_0048.png" alt="DJI_0048"/>5</span></a>

            <a href="#" title="DJI_0070"><span><img src="<?php echo $template_path;?>assets/data1/tooltips/dji_0070.png" alt="DJI_0070"/>6</span></a>

           

        </div>

    </div>

    <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">bootstrap carousel</a> by WOWSlider.com v8.8</div>

    <div class="ws_shadow"></div>

</div> -->
