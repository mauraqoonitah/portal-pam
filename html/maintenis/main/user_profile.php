<?php
global $module, $moduledb;

$module     = 'user_profile';
$moduledb   = 'user_profile';
//ini_set('display_errors',true);
$do         = get('do');
//echo "test";
switch($do){
	case 'login':
		if (islogin()) {
			profile();
		} else {
			login();
		}
		break;
	case 'profile':
		profile();
		break;
	case 'forget':
		if (islogin()) {
			profile();
		} else {
			forget();
		}
		break;
	case 'change':
		if (islogin()) {
			change();
		} else {
			register();
		}
		break;
	
	case 'sukses':
		sukses();
		break;
	case 'logout':
		session_destroy();
		unset($_SESSION);
		redirect('index.php');
		break;
	default:
		if (islogin()) {
			profile();
		} else {
			register();	
		}
}


function register(){
	global $module, $moduledb, $config;

	//cek apakah di post
	if (sizeof($_POST)>0){

		$salt					 = generate_salt();
		$password				 = mysqli_real_escape_string($_POST['reg_password']);
		$pwd 					 = hashPassword($password,$salt);
		$email					 = mysqli_real_escape_string($_POST['reg_email']);
		
		$simpanPOST = array();
		$simpanPOST['email']	 = $email;
		$simpanPOST['passwd']	 = $pwd;
		$simpanPOST['salt']		 = $salt;
		$simpanPOST['role']		 = '2';
		$simpanPOST['published'] = '1';

		//lakukan simpan ke database 
		$result = doinsertdebug($moduledb,$simpanPOST);
		$lastid = dogetlastid();
			//update orderingnya
		$fields = array('ordering'=>$lastid);
		$result = doupdate($module,$fields,'id='.$lastid);
		if ($result) {
			
			//siapkan profile
			$profilePOST = array();
			$profilePOST['email'] 			  = $email;
			$profilePOST['nama_lengkap']	  = mysqli_real_escape_string($_POST['reg_namalengkap']);
			$profilePOST['alamat_pengiriman'] = mysqli_real_escape_string($_POST['reg_alamat']);
			
			//lakukan simpan ke database 
			$resultprofile = doinsert('user_profile',$profilePOST);
			
			//register session
			session_start();
			$_SESSION['user'] 	= $email;
			$_SESSION['nama']		= mysqli_real_escape_string($_POST['reg_namalengkap']);
			$_SESSION['side']		= 'administratorcms';
			
			//siapkan email welcome
			$to 	 = '"'.$_SESSION['nama'].'" <'.$email.'>';
			$subject = 'Selamat Datang di '.$config['webname'];
			$from	 = $config['email'];
			$header  = "MIME-Version: 1.0" . "\r\n";
			$header .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$header .= 'From: "Admin '.$config['webname'].'" <'.$from.'>' . "\r\n";
			$body 	 = '<p>Selamat Datang '.$_SESSION['nama'].', </p><p>Anda telah berhasil membuat akun baru di situs '.$config['webname'].'</p>';
			$body 	.= '<p>Untuk mengubah profile silakan ke <a href="'.$config['baseurl'] . 'index.php?go=user_profile&do=profile" target="_blank">halaman ini</a><br/>';
			$body	.= '<p>&nbsp;</p><p>&nbsp;</p><p>Salam Hangat,</p><p>&nbsp;</p>Administrator '.$config['webname'];

			//kirim email welcome
			mail($to, $subject, $body, $header);
			
			redirect('index.php');
		} else {
			redirect('index.php?go=user_profile&do=register','Gagal melakukan register');
		}
	} else {
	
		include_once($module.'/register.php');	
		
	}
}

function profile(){
	global $module, $moduledb, $config;
    
	//cek apakah di post
	if (sizeof($_POST)>0){
$savePOST = $_POST;
		$email = post('reg_email');
		$file_surat_masuk                       = str_replace('/','_',$email);
		$profilePOST = array();
		$profilePOST['nama_lengkap'] 		= post('reg_namalengkap');
		$profilePOST['telepon']     		= post('reg_telepon');
		$profilePOST['email_kontak']     		= post('reg_email_kontak');
		$profilePOST['no_fax']     		= post('reg_no_fax');
		

	
			$folder_surat                  =  'user_profile/'.$file_surat_masuk."/";


			$hasil = array();
			$hasil = simpan_file($_POST,$folder_surat,'file_upload',post("upload_temp_file_upload"));
						
			if ($hasil['status']==true){
				$profilePOST['file_upload'] 	= $hasil['relative_file'];	
			}else{
				
			}

			$_SESSION['form_simpan'] = $savePOST;			
			$_SESSION['form_simpan']['referer'] = 'index.php?go='.$module.'&do=tambah';

			
		$update = doupdatedebug('user_profile',$profilePOST,'email="'.$email.'"');
		//debugvar($profilePOST);
		//debugvar($_POST);

		//die();
		if ($update){
			redirect('index.php?go=user_profile&do=profile','Data berhasil diupdate');
		}


	
	} else {

		include_once($module . '/profile.php');	

	}	
	
}

function login(){
	global $module;
	include_once($module . '/login.php');
}

function forget(){
	global $module, $config;
	if (sizeof($_POST)>0){
		
		$email = trim($_POST['reg_email_lupa']);
		$login = doGetDataById('user',$email,'email');
		$profile = doGetDataById('user_profile',$email,'email');
		
		if ($login){
			
			//generate password baru
			$newpwd = generatePassword();
			$pwd 	= hashPassword($newpwd,$login['salt']);
			
			$simpanPOST = array();
			$simpanPOST['passwd'] = $pwd;
			
			//update ke database
			$result = doupdate('user',$simpanPOST,'email="'.$email.'"');
			
			//catat logs
			catatlog('forget password', 'reset password dikirim ke '.$email);
			
			if ($result){
			
				//kirim ke email user tersebut
				if (strlen($profile['nama_lengkap'])>0){
					$nama = $profile['nama_lengkap'];
				} else {
					$nama = $email;
				}
				
				$to 	 = '"'.$nama.'" <'.$email.'>';
				$subject = 'Reset Password';				
				$from	 = $config['email'];
				$header  = "MIME-Version: 1.0" . "\r\n";
				$header .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$header .= 'From: "Admin '.$config['webname'].'" <'.$from.'>' . "\r\n";
				$body 	 = '<p>Password anda telah direset menjadi:</p>';
				$body 	.= '<p><strong>'.$newpwd.'</strong></p>';
				//$body 	.= '<p>Silakan login ke <a href="'.$config['baseurl'] . 'index.php?go=user_profile&do=login">Halaman ini</a></p><br/>';
				$body	.= '<p>&nbsp;</p><p>&nbsp;</p><p>Salam Hangat,</p><p>&nbsp;</p>Administrator '.$config['webname'];
				
				//kirim email
				if (mail($to, $subject, $body, $header)) {
					//redirect('index.php?go=user_profile&do=change','Berhasil mengganti password. Password baru anda telah dikirim ke email '.$email);
					//digunakan dibagian alumni
					redirect('index.php','Berhasil mengganti password. Password baru anda telah dikirim ke email '.$email);
				}

			} else {
				redirect('index.php?go=user_profile&do=forget','Gagal reset password, tidak dapat tersimpan ke database');
			}
		} else {
			redirect('index.php?go=user_profile&do=forget','Gagal reset password, email '.$email.' tersebut tidak terdaftar di dalam database');
		}
		
	} else {
	
		include_once($module . '/forget.php');
		
	}
}

function change(){

	global $module,$config;
	
	if (sizeof($_POST)>0){
		//debugvar($_SESSION);
		$email = $_SESSION['userid'];
		$login = doGetDataById('user',$email,'id');
		// debugvar($_POST);
		//debugvar($login);

		$pwdAwal = hashPassword(($_POST['reg_password_awal']),$login['salt']);
debugvar($pwdAwal);

		
		if ($pwdAwal == $login['passwd']){

			if ($_POST['reg_password_ganti'] == $_POST['reg_password_ganti_confirm']) {
				$pwdChg = hashPassword(($_POST['reg_password_ganti']),$login['salt']);
				
				$simpanPOST = array();
				$simpanPOST['passwd'] = $pwdChg;
				$result = doupdate('user',$simpanPOST,'id="'.$email.'"');
				
				if ($result){
					redirect('index.php?go=user_profile&do=change','Berhasil mengganti password');
				}
				
			} else {
				redirect('index.php?go=user_profile&do=change','Gagal mengganti password, password pengganti tidak cocok dgn password pengganti confirm');
			}
		} else {
			// die();
			redirect('index.php?go=user_profile&do=change','Gagal mengganti password, password awal tidak cocok');
		}
	}
	include_once($module . '/change.php');
}


?>