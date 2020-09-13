<?php
if ($_SESSION['wil']!='ADMIN') {
	redirect('index.php','');
}
global $module, $moduledb, $sort_order;
$module 	= 'user';
$moduledb 	= 'user';


$sort_order = array('t.id'						=>'ID',
					't.email'					=>'Username',
					'p.nama_lengkap'			=>'Nama Operator',
					't.nama_role'				=>'Role',
					't.ordering'				=>'Ordering'
					);


$do 	= get('do');
$tipe 	= get('tipe');

switch($do){
	case 'list':
		global $sort_order;
		include_once($module.'/list.php');
		break;
	case 'list_jx':
		global $sort_order;
		include_once($module.'/list_jx.php');
		break;
	case 'tambah':
		tambah();
		break;
	case 'ubah':
		ubah();
		break;
	case 'detail':
		detail();
		break;		
	case 'hapus':
		hapus();
		break;
	case 'logout':
		session_destroy();
		unset($_SESSION);
		redirect('index.php');
		break;
	case 'switch_aktif':
		switch_aktif();
		break;
	case 'change':
		change();
		break;
	default:
		include_once($module.'/list.php');
}	


function switch_aktif(){
	global $config,$module,$moduledb;
	$id = get('id');
	$act = get('act');
	if (intval($id)>0){
		$simpan = array();
		$simpan['aktif'] = $act;
		$hasil = doupdate($moduledb,$simpan,'id='.$id);
		if ($hasil){
				if ($act=='AKTIF'){
					$data_login= doquery("select * from user where id=$id");
					include_once('email_config.php');
					$to      = $data_login[0]['mail'];
				$kirim_nama = 'Administrator PGRI';
				$subject = '[ASIK PGRI] Aktifasi Akun Pengurus ASIK';
				$message = "Selamat! Akun Pengurus PGRI anda telah berhasil diaktifasi. Berikut ini data login anda:<br><br>

							User ID Login: ".$data_login[0]['id_user']." <br>
							Gunakan Password yang pernah dikirimkan melalui email pendaftaran sebelum ini<br>
							
							Anda dapat mengakses aplikasi ASIK PGRI di <a href='http://pgri.or.id/asik/v2'>http://pgri.or.id/asik/v2</a>
							<br><br><br>
							Administrator PGRI
							";
			
				//kirim email ke admin kab
				if (!empty($to)){
					kirim_email($to, $kirim_nama, $subject, $message);
				}
				
				
					
					//$to      = $email;
					//$subject = '[ASIK PGRI] Aktifasi Akun Pengurus ASIK';
					/*
					$message = "Selamat! Akun Pengurus PGRI anda telah berhasil diaktifasi. Berikut ini data login anda:<br><br>

								User ID Login: ".$data_login[0]['id_user']." <br><br>
								
								Anda dapat mengakses aplikasi ASIK PGRI di <a href='http://pgri.or.id/asik/v2'>http://pgri.or.id/asik/v2</a>
								<br><br><br>
								Administrator PGRI
								";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: Administrator PGRI<adminsupport@pgri.or.id>' . "\r\n";
					$headers .= 'Cc: frozen_java@gmail.com' . "\r\n";

					//mail($to,$subject,$message,$headers);
					*/
				}
			redirect('index.php?go=user','Sukses update status aktif');
		}
	}
}

function tambah(){
	global $module, $moduledb, $config;
		
		//cek apakah di post
		if (sizeof($_POST)>0){
		
			//lakukan simpan ke table
			//$simpanPOST=$_POST;
			
			$salt					 = generate_salt();
			$password				 = mysql_real_escape_string(post('passwd'));
			$pwd 					 = hashPassword($password,$salt);
			$email					 = mysql_real_escape_string(post('email'));
			$role					 = post('role');
			
			$simpanPOST = array();
			$simpanPOST['email']	 = $email;
			$simpanPOST['passwd']	 = $pwd;
			$simpanPOST['salt']		 = $salt;
			$simpanPOST['role']		 = $role;
			$simpanPOST['published'] = '1';
			
			//cek format 
			$result = doinsert($moduledb,$simpanPOST);
			
			if ($result== true && $simpanPOST['ordering']==''){
				
				//get id yg baru saja diinsert
				$lastid = dogetlastid();

				//update orderingnya
				$fields = array('ordering'=>$lastid);
				$result = doupdate($moduledb,$fields,'id='.$lastid);								
				
			}
			
			
			if ($result) {
				
				//simpan ke profile
				$profilePOST = array();
				$profilePOST['email'] = $email;
				$profilePOST['nama_lengkap'] = post('nama_lengkap');
				$profilePOST['telepon']      = post('telepon');
				$profilePOST['email_kontak'] = post('email_kontak');
				$profilePOST['jabatan']      = post('jabatan');				
				doinsertdebug('user_profile',$profilePOST);
				
				redirect('index.php?go='.$module,'Data telah tersimpan');
			} else {
		
			}
		}
		
		include_once($module.'/create.php');
}	

function ubah(){
	global $module, $moduledb, $config;

		//cek apakah di post
		if (sizeof($_POST)>0){
			$id = $_GET['id'];
			if (strlen($_POST['passwd'])>0){
				$salt					 = generate_salt();
				$password				 = mysql_real_escape_string($_POST['passwd']);
				$pwd 					 = hashPassword($password,$salt);	
			}
			
			$email					 = mysql_real_escape_string($_POST['email']);
			
			$simpanPOST = array();
			$simpanPOST['email']	 = $email;
			if (strlen($_POST['passwd'])>0){
				$simpanPOST['passwd']	 = $pwd;
				$simpanPOST['salt']		 = $salt;
			}
			$role = post('role');
			$simpanPOST['role']		 = $role;
			$simpanPOST['published'] = '1';
			//debugvar($simpanPOST);
			$result = doupdatedebug($moduledb,$simpanPOST,"id='".$id."'");
			
			if ($result) {
				//cek profile
				$dbcekprofile = doquery('select * from user_profile where email='.q($email));
				
				//simpan ke profile
				$profilePOST = array();
				$profilePOST['email'] = $email;
				$profilePOST['nama_lengkap'] = post('nama_lengkap');
				$profilePOST['telepon']      = post('telepon');
				$profilePOST['email_kontak'] = post('email_kontak');
				$profilePOST['jabatan']      = post('jabatan');
				
				if (count($dbcekprofile)==0) {
					//insert profile
					doinsertdebug('user_profile',$profilePOST);
				} else {
					//update profile
					doupdatedebug('user_profile',$profilePOST,"email='".$email."'");	
				}
				//debugvar($profilePOST);
				
				//die();
				redirect('index.php?go='.$module,'Data telah tersimpan','sukses');
			} else {

			}
		}
			
	include_once($module.'/edit.php');
}

	
function hapus(){
	global $module, $moduledb, $config;
	
	$config['theme']='';
	
	$items = explode(',', rtrim($_POST['itemGroup'], ','));
    $num = 0; 
	
	foreach($items as $item){
        $data_user = $login 		= doGetDataById('user',$item);
		
        $result_profile = doquery('delete from user_profile where email='.q($data_user['email']));
        
        $result = dodelete($moduledb,$item);
        
	}
	
	
	if ($result){
		echo 'Sukses menghapus data '.$_POST['itemGroup'];
	} else {
		echo 'Gagal menghapus data '.$_POST['itemGroup'];
	}
	
}

function detail(){
	global $module;
	include_once($module.'/detail.php');
}

?>
