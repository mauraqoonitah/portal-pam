<h1>Profile User</h1>
<p>&nbsp;</p>

<?php

//$config['theme'] = '';
//print_r($config);
$akun = doGetDataById('user',$_SESSION['userid'],'email');
$profile = doGetDataById('user_profile',$_SESSION['userid'],'email');

include('form.php');
?>
<ul>
	<li><a href="index.php?go=user&do=change">Ganti Password</a></li>
</ul>