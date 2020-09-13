<?php
$config['judul']        = 'Profile User';
//debugvar($_SESSION);
$akun = doGetDataById('user',$_SESSION['username'],'email');
$profile = doGetDataById('user_profile',$_SESSION['username'],'email');

include('form.php');
?>
<ul>
	<li><a href="index.php?go=user_profile&do=change">Ganti Password</a></li>
</ul>