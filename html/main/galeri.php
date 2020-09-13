
            <?php



$config['theme']="";

?>
<!--
        </div>
    </div>


        <style>
    .google-maps {
        position: relative;
        padding-bottom: 5%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>
<h1><center><font color="#222">Kami beralamat di:</font></center></h1><br>
<div class="google-maps">
   <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyCxKVhOEQMXBAbKPWzgpi_wmMOQURXa79s '></script><div style='overflow:hidden;height:400px;width:1100px;'><div id='gmap_canvas' style='height:400px;width:1100px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://www.embedmap.net/'>.</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=6d707a170facc84cda489f5d08d6229fb888df8b'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(<?php echo $config['coordinat']; ?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $config['coordinat']; ?>)});infowindow = new google.maps.InfoWindow({content:'<strong><?php echo $config['nama_tempat']; ?></strong><br><?php echo $config['nama_jalan']; ?>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>

</div>


     contact section starts here -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="STIKes Banten merupakan institusi pendidikan tinggi swasta yang memberikan pendidikan dalam bidang kesehatan yang bernaung di bawahyayasan 4R 2001 Banten dengan Akta pendirian yayasan pada tanggal 21 April 2001">
    <meta name="keywords" content="STIKes Banten">
   





    <title><?php echo $config['websitetitle']; ?></title>

     <?php
    $sidebar = getsidebar();
    $template_path = $config['baseurl'] . 'themes/flower/';
    $template_path2 = $config['baseurl'] . 'themes/elite/';
       $template_pathss = $config['baseurl'] .  'themes/elite/artmenu/';
    registerCSS($config['baseurl'] . 'res/ecommerce.css');
$path = $config['baseurl'].'themes/elite/mnzweb/'; 
$path2 = $config['baseurl'].'images/header/'; 


    $nama_template = 'doctor';
        $template_path7sky = $config['baseurl'] . 'themes/'.$nama_template.'/';
        $template_pathelite = $config['baseurl'] . 'themes/elite/magexpress/';


    ?>





    <link href="<?php echo $template_path;?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $template_path;?>css/font-awesome.min.css" rel="stylesheet">
    <!-- Style -->
    <link href="<?php echo $template_path;?>css/style.css" rel="stylesheet">


    <script src="<?php echo $template_path2; ?>slider/js/jssor.slider-22.2.10.min.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
 
 <style type="text/css">
   .imgheader{

   }

   @media only screen and (max-width: 500px) {
    body {
        background-color: lightblue;
    }
    .imgheader{
      width: 236PX;
      height: 36PX;

    }

    .gtco-heading p {
    font-size: 12px;
    line-height: 1.5;
    color: #1a1a1a;
}


}
 </style>

<body>

<br>

    <div class="header">
     <div class="header-div" style="padding-right: 20px; padding-left: 20px;">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <a href="#">    <img class="imgheader" src="<?php echo $path2; ?><?php echo $config['logoheader']; ?>"/>
</a>
                </div>
                <div class="col-lg-10 col-md-2 col-sm-12 col-xs-12">
                     <div class="navigation">
                        <div id="navigation">
                              <?php echo widget('artmenu_front',array('tipe'=>'mainmenu','posisi'=>'horizontal')); ?> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




<div class="gtco-container">

 <?php
echo widget('gallery');
?> 

</div>


<?php
echo widget('footer');
?> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $template_path;?>js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $template_path;?>js/bootstrap.min.js"></script>
    <script src="<?php echo $template_path;?>js/menumaker.js"></script>
 

    <script src="<?php echo $template_path;?>js/jquery.sticky.js"></script>
    <script src="<?php echo $template_path;?>js/sticky-header.js"></script>
</body>

</html>







<!--

    <div class="row contact-message">               
        <div class="col-sm-6 col-xs-12">
                <h2>Send a message</h2>
                                <form id="emailForm" class="contact-form2" method="post" enctype="multipart/form-data" name="emailForm">
                                    <div class="usermessagea"></div>
                                    <fieldset>
                                            <input type="text" class="form-control" name="username" id="name-contact-us"  placeholder="Nama"/>
                                            <input type="text" class="form-control"  name="useremail" id="email-contact-us"  placeholder="E-mail"/>
                                            <input type="text" class="form-control"  name="usertelp" id="email-contact-us"  placeholder="No.Telp/HP"/>                                      
                                            <textarea class="form-control" name="userpesan" id="message-contact-us" rows="8" cols="30" placeholder="Pesan"></textarea>
                                            <input type="hidden" name="id_form" value="126" />
                                            <input type="submit" name="yit_sendmail" value="Send Message" class="btn btn-f-info" style="color:#fff;" />         
                                            
                                    </fieldset>
                                </form>
                            
                            <div id="comments">
                            </div>
                           
        </div>
        
    </div>
</div>-->
