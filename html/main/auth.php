<?php

$email = mysqli_real_escape_string($_POST['email']);
$password = mysqli_real_escape_string($_POST['password']);

if (strlen($email)>0 && strlen($password)>0){

	$login = doGetDataById('user',$email,'email');
	$profile = doGetDataById('user_profile',$email,'email');
	
	if (sizeOf($login)>0){
		$pwd = hashPassword($password,$login['salt']);
		if ($email==$login['email'] && $pwd==$login['passwd'] && session_name()=='frontendcms'){
			session_start();
			$_SESSION['userid'] 	= $email;
			$_SESSION['nama'] 		= $profile['nama_lengkap'];
			$_SESSION['side']		= 'frontendcms';
			redirect('index.php');
		} else {
			unset($_SESSION);
			redirect('index.php?go=user&do=login&pesan=Email/password anda salah');
		}
	} else {
		echo 'Gagal login';
	}
} else {
	echo 'Gagal login';
}

?>