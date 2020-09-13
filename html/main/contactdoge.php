<br><br>

    <?php


require_once("PHPMailer-master/PHPMailerAutoload.php");
ini_set('display_errors', 0);


$mail = new PHPMailer();

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

$mail->isSMTP(); 
$mail->Host     = $config['host_mail']; 

$mail->SMTPDebug  = 0;  
$mail->Mailer   = "smtp";
$mail->SMTPAuth = true; 
$mail->AddCustomHeader("X-MSMail-Priority: ".$m."");
$mail->AddCustomHeader("Importance: High");
$mail->Username = $config['username_mail']; 
$mail->Password = $config['password_mail'];
$mail->SMTPSecure   = "tls";                            // Enable TLS encryption, `ssl` also accepted
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
$mail->AddAddress();
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

    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            	<br>
                <div class="google-map"><iframe frameborder="0" style="border:0" width="480px" height="470px" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJn6wOs6lZwokRLKy1iqRcoKw" allowfullscreen=""></iframe></div>
            </div>
            <div class="col-md-6">
                <h2 class="pb-3 align-left mbr-fonts-style display-2">
                    Drop a Line
                </h2>
                <div>
                    <div class="icon-block pb-3">
                        <span class="icon-block__icon">
                            <span class="mbri-letter mbr-iconfont"></span>
                        </span>
                        <h4 class="icon-block__title align-left mbr-fonts-style display-5">
                            Don't hesitate to contact us
                        </h4>
                    </div>
                    <div class="icon-contacts pb-3">
                        <h5 class="align-left mbr-fonts-style display-7">
                            Ready for offers and cooperation
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            Phone: +1 (0) 000 0000 001 <br>
                            Email: youremail@mail.com
                        </p>
                    </div>
                </div>
                <div data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                    </div>
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

