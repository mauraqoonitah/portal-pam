<h1>User Login</h1>
<p>&nbsp;</p>
<?php
	
	registerCSS($config['baseurl'] . 'res/reset.css');
	registerCSS($config['baseurl'] . 'res/structure.css');
	
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=280443085390286";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	  
	<form class="box login" action="index.php?go=auth" method="POST">
	<fieldset class="boxBody">
	  <label>Alamat Email</label>
	  <input type="text" name="email" tabindex="1" placeholder="Email" required>
	  <label>Password</label>
	  <input type="password" name="password" tabindex="2" placeholder="Password" required>
	</fieldset>
	<footer>
	  
	  <span style="text-align:center;position:relative;float:right;"><input type="submit" class="art-button" value="Login" tabindex="3" name="btnLogin"></span><br/>
	  <?php 
	  	//global $pesan;
		//if (isset($pesan)) echo $pesan; 
	  ?><br/>
	  <a href="index.php?go=user_profile&do=forget">Lupa Password</a> | 
	  <a href="index.php?go=user_profile&do=register">Register</a>



      

	</footer>
</form>	  
<div style="position:absolute;left:37%;float:right;text-align:center;"><br/>
atau anda dapat login menggunakan akun <br/><br/>

</div>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
require $config['baseurl'] . 'res/fb/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '280443085390286',
  'secret' => '26616dc6ddd1078ac356de7d92edc39c',
));

// Get User ID
$user = $facebook->getUser();
echo 'userid facebook anda: '.$user;


if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	//print htmlspecialchars(print_r($user_profile,true));
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
} else {
	$loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'email,publish_stream', // Permissions to request from the user
		'redirect_uri'	=> 'http://sevensky.co.id/index.php?go=user&do=login', // URL to redirect the user to once the login/authorization process is complete.
		));
	echo '<a href="'.$loginUrl.'">Login</a>';
}

echo '<br/>Alamat Email: '.$user_profile['email'];
echo '<br/>Nama: '.$user_profile['name'];
?>
