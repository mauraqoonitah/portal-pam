  <!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $config['websitetitle']; ?></title>

     <?php
    $sidebar = getsidebar();
    $template_path = $config['baseurl'] . 'themes/doctor/';
    $template_path2 = $config['baseurl'] . 'themes/elite/';
       $template_pathss = $config['baseurl'] .  'themes/elite/artmenu/';
    registerCSS($config['baseurl'] . 'res/ecommerce.css');
$path = $config['baseurl'].'themes/elite/mnzweb/'; 
$path2 = $config['baseurl'].'images/header/'; 

 $config['theme']="";
    $nama_template = 'doctor';
        $template_path7sky = $config['baseurl'] . 'themes/'.$nama_template.'/';
        $template_pathelite = $config['baseurl'] . 'themes/elite/magexpress/';


    ?>

<link href="<?php echo $template_path2; ?>css/agency.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/page-assets.css">
            <!-- include the helping elements stylesheets of  the page  -->
            <link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/helper-elements.css">
            <!-- include the site stylesheet  -->
            <link rel="stylesheet" type="text/css" href="<?php echo $path;?>style.css">
            <!-- include the site color stylesheet  -->
            <link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/color/ucla-gold.css">





    <link rel="stylesheet" href="<?php echo $template_path; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $template_path; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $template_path; ?>css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
<script src="<?php echo $template_path2; ?>slider/js/jssor.slider-22.2.10.min.js" type="text/javascript"></script>

    <script src="<?php echo $template_path; ?>js/modernizr.js"></script>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>$template_path7sky
    <![endif]-->
</head>
 <header class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-2 header-logo">
                    <br>
                    <a href="index.html"><img src="<?php echo $path2; ?><?php echo $config['fotoheader']; ?>" width="150px" height="45px" alt="" class="img-responsive logo"></a>
                </div>

                <div class="col-md-10">

                    <nav id="nav" class="navbar navbar-default">
                        <div class="container-fluid nav-bar">
                            <a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>
                            <div class="nav-holder">
                                
                                <?php echo widget('artmenu_front',array('tipe'=>'mainmenu','posisi'=>'horizontal')); ?> 
                         
                            </div>
                            </div>
                        </nav>

                </div>
            </div>
        </div>
    </header> <!-- end of header area -->


  
<section>
    <br>
    <br>
    <br>
    <br>

<?php
echo widget('slideruniversal7sky');
?> 

</section>

 <section class="service" id="service">
<?php
echo widget('gallery');
?> 
</section>

    <!-- about section 
    <section class="about text-center" id="about">
        <div class="container">
            <div class="row">
                <h2>about us</h2>
                <h4>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</h4>
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail clearfix">
                        <div class="about-img">
                            <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/item1.jpg" alt="">
                        </div>
                        <div class="about-details">
                            <div class="pentagon-text">
                                <h1>C</h1>
                            </div>
                            <h3>Children’s specialist</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail">
                        <div class="about-img">
                            <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/item2.jpg" alt="">
                        </div>
                        <div class="about-details">
                            <div class="pentagon-text">
                                <h1>W</h1>
                            </div>

                            <h3>Children’s specialist</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail">
                        <div class="about-img">
                            <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/item3.jpg" alt="">
                        </div>
                        <div class="about-details">
                            <div class="pentagon-text">
                                <h1>M</h1>
                            </div>
                            <h3>Children’s specialist</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of about section 


    <!-- service section starts here 
    <section class="service text-center" id="service">
        <div class="container">
            <div class="row">
                <h2>our services</h2>
                <h4>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</h4>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service">
                        <div class="single-service-img">
                            <div class="service-img">
                                <img class="heart img-responsive" src="<?php echo $template_path7sky; ?>img/service1.png" alt="">
                            </div>
                        </div>
                        <h3>Heart problem</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service">
                        <div class="single-service-img">
                            <div class="service-img">
                                <img class="brain img-responsive" src="<?php echo $template_path7sky; ?>img/service2.png" alt="">
                            </div>
                        </div>
                        <h3>brain problem</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service">
                        <div class="single-service-img">
                            <div class="service-img">
                                <img class="knee img-responsive" src="<?php echo $template_path7sky;?>img/service3.png" alt="">
                            </div>
                        </div>
                        <h3>knee problem</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service">
                        <div class="single-service-img">
                            <div class="service-img">
                                <img class="bone img-responsive" src="<?php echo $template_path7sky; ?>img/service4.png" alt="">
                            </div>
                        </div>
                        <h3>human bones problem</h3>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of service section -->
<!--

    <!-- team section
    <section class="team" id="team">
        <div class="container">
            <div class="row">
                <div class="team-heading text-center">
                    <h2>our team</h2>
                    <h4>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</h4>
                </div>
                <div class="col-md-2 single-member col-sm-4">
                    <div class="person">
                        <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/member1.jpg" alt="member-1">
                    </div>
                    <div class="person-detail">
                        <div class="arrow-bottom"></div>
                        <h3>Dr. M. Weiner, M.D.</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    </div>
                </div>
                <div class="col-md-2 single-member col-sm-4">
                    <div class="person-detail">
                        <div class="arrow-top"></div>
                        <h3>Dr. Danielle, M.D.</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    </div>
                    <div class="person">
                        <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/member2.jpg" alt="member-2">
                    </div>
                </div>
                <div class="col-md-2 single-member col-sm-4">
                    <div class="person">
                        <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/member3.jpg" alt="member-3">
                    </div>
                    <div class="person-detail">
                        <div class="arrow-bottom"></div>
                        <h3>Dr. Caitlin, M.D.</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    </div>
                </div>
                <div class="col-md-2 single-member col-sm-4">
                    <div class="person-detail">
                        <div class="arrow-top"></div>
                        <h3>Dr. Joseph, M.D.</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    </div>
                    <div class="person">
                        <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/member4.jpg" alt="member-4">
                    </div>
                </div>
                <div class="col-md-2 single-member col-sm-4">
                    <div class="person">
                        <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/member5.jpg" alt="member-5">
                    </div>
                    <div class="person-detail">
                        <div class="arrow-bottom"></div>
                        <h3>Dr. Michael, M.D.</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    </div>
                </div>
                <div class="col-md-2 single-member col-sm-4">
                    <div class="person-detail">
                        <div class="arrow-top"></div>
                        <h3>Dr. Hasina, M.D.</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    </div>
                    <div class="person">
                        <img class="img-responsive" src="<?php echo $template_path7sky; ?>img/member6.jpg" alt="member-5">
                    </div>
                </div>
            </div>
        </div>
    </section> end of team section -->

    <!-- map section -->
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
                   <center>
        <label class="col-sm-2 control-label">MAP</label>
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyCxKVhOEQMXBAbKPWzgpi_wmMOQURXa79s '></script><div style='overflow:hidden;height:450px;width:1200px;'><div id='gmap_canvas' style='height:450px;width:1200px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://www.embedmap.net/'>.</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=6d707a170facc84cda489f5d08d6229fb888df8b'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(<?php echo $config['coordinat']; ?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $config['coordinat']; ?>)});infowindow = new google.maps.InfoWindow({content:'<strong><?php echo $config['nama_tempat']; ?></strong><br><?php echo $config['nama_jalan']; ?>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
    </center>
                </div>
            </div>
        </div>
    </div><!-- end of map section -->


    <!-- footer starts here -->

    <footer style="background-color: white">
        <div class="container">
            <div class="row">
               
               <div class="col-md-12">
                    <ul class="list-inline social-buttons">
                        
                        <li><a href="<?php echo $config['facebook'];?>"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="<?php echo $config['telp'];?>"><i class="fa fa-phone"></i></a>
                        </li>
                         <li><a href="<?php echo $config['twitter'];?>"><i class="fa fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-12">
                    <ul class="list-inline quicklinks">
                     
                    </ul>
                </div>
                 <div class="col-md-12">
                    <span class="copyright"> <?php echo $config['webfooter'];?></span>
                </div>
            </div>
        </div>
    </footer><div class="fa fa-chevron-up" id="gotoTop" style="display: block;"></div>


    <script src="<?php echo $template_path; ?>js/jquery-2.1.1.js"></script>
   
    <script src="<?php echo $template_path; ?>js/gmaps.js"></script>
    <script src="<?php echo $template_path; ?>js/smoothscroll.js"></script>
    <script src="<?php echo $template_path; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $template_path; ?>js/custom.js"></script>
</body>
</html>


