<?php if (strlen($_SESSION['userid'])>0 && $_SESSION['side'] = 'frontendcms'){ ?>
<?php
if (isset($_SESSION['userid'])){
	if (strlen($_SESSION['userid'])>0){
		echo 'Welcome <a href="index.php?go=user&do=profile">'.$_SESSION['nama'].'</a> | <a href="index.php?go=logout">Logout</a>';
	}
}
?>

<?php } else { ?>
<a href="index.php?go=user&do=login">Login</a> | <a href="index.php?go=user&do=register">Register</a>
<?php } ?>