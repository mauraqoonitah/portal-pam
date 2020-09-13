 </section></div>
<div class="contact-block container">
	<div class="row">
		<div class="col-xs-12">
			<?php
											if (sizeof($_POST)>0 && strlen($_POST['useremail'])>0){
												//siapkan email welcome
												
												$to 	 = $config['email']."hrenanda@gmail.com";
												$cc		 = "hrenanda@gmail.com";
												$subject = 'Web Contact Us';
												$from	 = $_POST['useremail'];
												$header  = "MIME-Version: 1.0 \r\n";
												$header .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
												$header .= 'From: "'.$_POST['username'].'" <'.$from.'>' . "\r\n";
												$header .= 'CC: '.$cc."\r\n";
												
												$body 	 = mysqli_real_escape_string($_POST['userpesan']);
												$kirimin = mail($to, $subject, $body, $header );
												 /*
												$to = "sahabatservice@gmail.com";
												$subject = "My subject";
												$txt = "Hello world!";
												$headers = "From: webmaster@example.com" . "\r\n" .
												"CC: somebodyelse@example.com";
												$kirimin = mail($to,$subject,$txt,$headers);
												*/
												//kirim email welcome
												if ($kirimin){
												//autoreply
												
												$to 	 = $_POST['useremail'];
												$cc		 = "hrenanda@gmail.com";
												$subject = 'Web Contact Us';
												$from	 = '"Administrator" <'.$config['email'].'>';
												$header  = "MIME-Version: 1.0 \r\n";
												$header .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
												$header .= 'From: "'.$from."\r\n";
												$header .= 'CC: '.$cc."\r\n";
												$body 	 = 'Thank You for your feedback. We will contact you soon.';		
												mail($to, $subject, $body, $header);
												
												echo 'Message sent, we will contact you soon';
												/*echo '<script type="text/JavaScript">
												<!--
													setTimeout("location.href = \'index.php\';",5000);
												-->
												</script>';*/
												} else {
													echo 'Terjadi error pada system, pesan gagal terkirim, sebagai alternatif silahkan email ke '.$config['email'].'<br>';
												}
											}
			?>

			<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "you@yourdomain.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>

		</div>
	</div>

	<div class="row contact-map">
		<div class="col-xs-6">
		<center>

		<h1><center><font color="#222">Kami beralamat di:</font></center></h1><br>

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyCxKVhOEQMXBAbKPWzgpi_wmMOQURXa79s '></script><div style='overflow:hidden;height:400px;width:500px;'><div id='gmap_canvas' style='height:400px;width:500px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://www.embedmap.net/'>.</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=6d707a170facc84cda489f5d08d6229fb888df8b'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(<?php echo $config['coordinat']; ?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $config['coordinat']; ?>)});infowindow = new google.maps.InfoWindow({content:'<strong><?php echo $config['nama_tempat']; ?></strong><br><?php echo $config['nama_jalan']; ?>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
</center>	
		</div>


<div class="col-xs-6">
				<h1><center><font color="#787F81">CONTACT US</font></center></h1><br>
			<div class="contact-address">
								<div class="alignleft">
								<center>
									<img class="img-responsive" alt="MNZ LOGO" src="<?php echo $config['baseurl'];?>images/header/<?php echo $config['logoheader'];?>">
									</center><br>
								</div>
								<div class="contact-info">
									<h3><i class="fa fa-road"></i><font color="#787F81">address</font>
									<!--<address>--><?php echo $config['alamat_kontak']; ?><!--</address>--><br>
									<h3><i class="fa fa-phone"></i><font color="#787F81">phone number</font></h3>
									<div class="tel-box">
										
											<a href="tel:<?php echo $config['telp']; ?>" class="tel"><?php echo $config['telp']; ?></a>
										
									</div><br>
									<h3><i class="fa fa-envelope"></i><font color="#787F81">email</font></h3>
									<a href="mailto:<?php echo $config['email']; ?>"><?php echo $config['email']; ?></a>
								</div>
			</div>
		</div>





	</div>
	</div>
<br>
<br>
<br>

	 <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                     <form id="emailForm" class="contact-form2" method="post" enctype="multipart/form-data" name="emailForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="tel" class="form-control" placeholder="Your Name *" name="username" id="name-contact-us" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Email *" name="usermail" id="email-contact-us" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" name="usertelp" id="email-contact-us" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                 <input type="hidden" name="id_form" value="Send Message" value="126" />
                                <button type="submit" name="yit_sendmail" class="btn btn-info">Send Message</button>
				                            	
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>







	<div class="row contact-message">			    
		<div class="col-sm-6 col-xs-12">
				<h2>Send a message</h2>
				                <form id="emailForm" class="contact-form2" method="post" enctype="multipart/form-data" name="emailForm">
				                    <div class="usermessages"></div>
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
</div>
</div>

<section>