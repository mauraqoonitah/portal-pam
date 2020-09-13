
            <?php



$config['theme']="";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="STIKes Banten merupakan institusi pendidikan tinggi swasta yang memberikan pendidikan dalam bidang kesehatan yang bernaung di bawahyayasan 4R 2001 Banten dengan Akta pendirian yayasan pada tanggal 21 April 2001">
    <meta name="keywords" content="STIKes Banten   ">
   





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

    
<style type="text/css">
   .imgheader{
 max-width:225%; height: auto;

   }

   @media only screen and (max-width: 500px) {
    body {
        background-color: lightblue;
    }
    .imgheader{
      max-width:100%; height: auto;

    }

    .gtco-heading p {
    font-size: 12px;
    line-height: 1.5;
    color: #1a1a1a;
}




}
 </style>
</head>
 

<body>
    



    <div class="header">
        <div class="header-div" style="padding-right: 20px; padding-left: 2q0px;">
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
<div style="border-bottom: 30px solid #fff;">
  </div>
<div style="background-color: #eaeaea;">
<div class="gtco-container">
<br>


 <?php
echo widget('event-all2');
?> 
</div>
<br>
<br>
  </div>
<div style="border-bottom: 30px solid #fff;">
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
