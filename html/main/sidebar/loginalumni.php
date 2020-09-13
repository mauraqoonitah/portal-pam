<?php
if (islogin()){
?>

<div>
<label>User: <?php echo $_SESSION['userid'] ;?></label> 
<form action="index.php?go=logout" method="POST">
<input type="submit" value="Logout"/>
</form>

</div>

<?php
} else {
?>	

<div>
<!--<form class="box login" action="index.php?go=auth" method="POST" name="formlogin">
	<fieldset class="boxBody">-->
<form class="login" action="index.php?go=authalumni" method="POST" name="formlogin">
	<fieldset class="login">	
	  <label>E-mail</label>
	  <input type="text" name="email" tabindex="1" placeholder="E-mail" required>
	  <label>Password</label>
	  <input type="password" name="password" tabindex="2" placeholder="Password" required>
	</fieldset>
	<footer>
	  <input type="submit" class="login" value="Login" tabindex="4" name="btnLogin">
	  <label>
	  <?php 
	  	//global $pesan;
		//if (isset($pesan)) echo $pesan; 
	  ?>
	  </label><br/>
	  <label><div style="font-size:11px; font-weight:bold; color: #1c02fd; margin-left: 15px;">
	  	  <a href="index.php?go=user&do=forget">Lupa Password</a><br>
	  	  <a href="index.php?go=alumni&do=register">Daftar Alumni</a>
	  </div></label>
	</footer>
</form>
</div>

<?php	
}
?>
