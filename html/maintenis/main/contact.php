
			<?php


require_once 'phpmailer/class.phpmailer.php';
require_once 'phpmailer/class.smtp.php';
//ini_set('display_errors', 1);
$config['theme']="";
$mail = new PHPMailer();
$mail->isSMTP(); 
$mail->Host     = $config['host_mail']; 

$mail->SMTPDebug  = 0;  
$mail->Mailer   = "smtpd";
$mail->SMTPAuth = true; 
$mail->Priority = 1;
$mail->AddCustomHeader("X-MSMail-Priority: ".$m."");
$mail->AddCustomHeader("Importance: High");
$mail->Username = $config['username_mail']; 
$mail->Password = $config['password_mail'];
$mail->SMTPSecure   = "ssl";                            // Enable TLS encryption, `ssl` also accepted
$mail->Port         = $config['port_mail'];      
$webmaster_email = $config['email']; 
$email =$config['email'];
$name = $_POST['username'];
$mail->From = $config['username_mail'];
$mail->FromName = $config['username_mail'];
$mail->AddCC($config['cc']);
$mail->AddCC($config['cc2']);
$mail->AddCC($config['cc3']);
$mail->AddCC($config['cc4']);
$mail->AddCC($config['cc5']);
$mail->AddAddress($email,$name);
$mail->SetFrom($config['username_mail'],$config['from_name_mail']);
$mail->AddReplyTo($_POST['useremail'],$_POST['username']);
$mail->WordWrap = 50; 
$subject = $config['subject_mail'];

//$mail->AddAttachment("module.txt"); // attachment
//$mail->AddAttachment("new.jpg"); // attachment
$mail->IsHTML(true); 
$mail->Subject = $config['subject_mail']; 	
//$mail->Body =  "Name : ".$_POST['username'];
//$mail->Body =  "Email :".$_POST['useremail'];
//$mail->Body =  "Phone : ".$_POST['usertelp'];
if ($_POST['userpesan']=="") {
    
$htmlMessage = $_POST['userpesan'];
}else{
    
$htmlMessage = "Name &nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; &nbsp; ".$_POST['username']."<br>Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;  ".$_POST['usertelp']."<br>Email &nbsp;&nbsp;&nbsp;&nbsp;  : &nbsp;&nbsp;  ".$_POST['useremail']."<br><br><br>".$_POST['userpesan'];
}

$mail->Body =  $htmlMessage;

$mail->AltBody = "This is the body when user views in plain text format"; 
if(!$mail->Send())
{
//echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
	echo '<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="icon-info"></i> ' . "email berhasil dikirim" . '
            </div>';


}
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
    <meta name="description" content="Flower is free physiotherapy website template that perfectly designed for therapy center, physical therapy program courses, physiotherapy clinic and physician.">
    <meta name="keywords" content="best free website templates, html5 template, free responsive website templates,website layout,html5 website templates,template for website design, medical HTML5 templates">
   





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
 

<body>




    <div class="header">
        <div class="header-div" style="padding-right: 40px; padding-left: 40px;">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <a href="#">    <img src="<?php echo $path2; ?><?php echo $config['fotoheader']; ?>"/>
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







  <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="widget widget-contact">
                        <!-- widget search -->
                        <h3 class="widget-title">Contact Info</h3>
                        <address>
                          <strong><?php echo $config['websitetitle'];?></strong><br>
                         <?php echo $config['alamat_kontak'];?><br>
                        
                          <abbr title="Phone">P:</abbr> <?php echo $config['telp'];?>
                        </address>
                        <address>
                          <strong>Contact Name</strong><br>
                          <a href="mailto:#"><?php echo $config['email']; ?></a>
                        </address>
                         
                    </div>
                    <!-- /.widget search -->
                    <div class="widget widget-social">

                        <div class="social-circle">
                             <a href="#" class="#"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="#"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1>Contact Form</h1>
                        <p> Please complete the form below. We'll do everything we can to respond to you as quickly as possible.</p>
 
                        <form id="emailForm" class="form" method="post" enctype="multipart/form-data" name="emailForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="name">name</label>
                                    <input type="text" name="username" id="name-contact-us" placeholder="" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="phone">phone</label>
                                    <input type="text" name="usertelp" id="email-contact-us" placeholder="" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="email">email</label>
                                    <input type="text" name="useremail" id="email-contact-us" placeholder="" class="form-control">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label" for="textarea">Message</label>
                                            <textarea class="form-control" name="userpesan" id="message-contact-us" rows="6" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" value="SUBMIT" class="btn btn-default">send message</button>
                                            
                                        </div>
                                    </div>

                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
echo widget('map');
?> 




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
