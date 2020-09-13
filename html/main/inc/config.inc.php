<?php
//session_start();
ini_set("display_errors", 0);
//<!-- VER 1.2 CONFIG SUDAH DISETTING DI konfigurasi.php 03062014-->
$config = array(
		'host' 			=> 'localhost',
						//'host' 			=> 'scanner.co.id',
				//'database'		=> 'scanner1_dbnew',
				'database'		=> 'portal_pam',
				'arsippath' 	=> '',
				'username' 		=> 'portal_pam',
				'password' 		=> 'dbpam',	
				//'baseurl'		=>  'http://cendolgan.com/jasarenovasibogor/',			
			        'baseurl'		=> 'http://portal.pamjaya.co.id/',
				//'baseurl'		=>  '158.140.183.130/webstikba/',			
				'webtitle'	 	=> '',	
				//'baseurl'		=> 'http://mnz.co.id/',
				'dbms'			=> 'mysqli',
				//'kodeunikmax'	=>	'99',
				);





$config['basepath'] 		= str_replace('maintenis/','',str_replace('\\','/',getcwd()).'/');
$config['basepathbackend'] 	= $config['basepath'].'maintenis/';
$config['baseurlbackend']  	= $config['baseurl'].'maintenis/';
//echo $config['basepath'];
$config['basepath'] = str_replace('res/xheditor/','',$config['basepath']);

include_once($config['basepath'] . 'main/inc/konfigurasi.php');

$config['webname'] 			= $webname;
$config['websitetitle']		= $websitetitle;
$config['tagline_header']	= $tagline_header;
$config['logoheader']		= $logoheader;
$config['fotoheader']		= $fotoheader;
$config['email'] 			= $webemail;
$config['cc'] 				= $cc;
$config['cc2'] 				= $cc2;
$config['cc3'] 				= $cc3;
$config['cc4'] 				= $cc4;
$config['cc5'] 				= $cc5;
$config['welcome_message'] 	= $welcome_message;$config['url_welcome_message'] 	= $url_welcome_message;

$config['alamat_kontak']	= $alamat_kontak;
$config['telp']				= $telp;
$config['facebook']			= $facebook;
$config['bb']			= $bb;
$config['sms']			= $sms;
$config['whatsapp']			= $whatsapp;
$config['favicon']			= "http://portal.pamjaya/img/portal-pam.ico";
$config['twitter']			= $twitter;
$config['meta_title']		= $meta_title;
$config['meta_description']	= $meta_description;
$config['meta_keyword']		= $meta_keyword;
$config['webfooter']		= $webfooter;
$config['coordinat'] 		= $coordinat;
$config['nama_tempat'] 		= $nama_tempat;
$config['nama_jalan'] 		= $nama_jalan;
$config['host_mail'] 		= $host_mail;
$config['port_mail'] 		= $port_mail;
$config['username_mail'] 		= $username_mail;
$config['password_mail'] 		= $password_mail;
$config['from_name_mail'] 		= $from_name_mail;
$config['subject_mail'] 		= $subject_mail;



$urllengkap = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$workingurl = str_replace($config['baseurl'],'',$urllengkap);
if (strlen($workingurl)>0){
	$config['url_part']			= explode('/',removeslash($workingurl));	
}

if ($config['dbms']=='firebird'){
	$db = base_pconnect ($config['host'].':'.$config['database'], $config['username'], $config['password']) or die('tidak dapat terkoneksi ke database');	
} else if ($config['dbms']=='mysqli'){
	$db = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']) or die('tidak dapat terkoneksi ke database');
	mysqli_select_db($db,$config['database']);	
}

//get template
$datatheme = mysqli_query($db,'select nama_template from template where default_template=1');
$row = mysqli_fetch_assoc($datatheme);
$hasil = $row['nama_template'];


if (isset($_SESSION['theme'])){
	$config['theme'] = $_SESSION['theme'];		
} else {
	$config['theme'] = $hasil;	
}



function removeslash($link){
	$linkedit = $link;
	if (substr($linkedit,0,1)=='/') {
		$linkedit = substr($linkedit,1);
	}
	if (substr($linkedit,-1,1)=='/') {
		$linkedit = substr($linkedit,0,-1);
	}
	
	return $linkedit;
}

function get_base_url()
    {
        /* First we need to get the protocol the website is using */
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https://' : 'http://';

        /* returns /myproject/index.php */
        $path = $_SERVER['PHP_SELF'];

        /*
         * returns an array with:
         * Array (
         *  [dirname] => /myproject/
         *  [basename] => index.php
         *  [extension] => php
         *  [filename] => index
         * )
         */
        $path_parts = pathinfo($path);
        $directory = substr($path_parts['dirname'],1,strlen($path_parts['dirname']));
		
        
        /* Returns localhost OR mysite.com */
        $host = $_SERVER['HTTP_HOST'];
		
		//get directory
		
		if ($host=='localhost' || filter_var($host, FILTER_VALIDATE_IP)==true){
				if (strpos($directory, '/')>0){
					$directory = substr($directory, 0, strpos($directory, '/')) . '/';	
				} else {
					$directory = $directory.'/';
				}	
		} else {
			$directory = "";
		}
				
        /*
         * Returns:
         * http://localhost/mysite
         * OR
         * https://mysite.com
         */
        return $protocol . $host . '/' . $directory;
    }
?>
