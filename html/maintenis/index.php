<?php

session_name('administratorcms');
ini_set("display_errors","Off");
session_start();




if (isset($_GET['go'])){
	$go = $_GET['go'];	
} else if (isset($_SESSION['userid'])){
	$go = 'index';
} else {
	$go = 'login';
}
require_once('../main/inc/config.inc.php');
require_once('../main/inc/library.inc.php');


//overrid theme front
$config['theme'] = 'admin_new';
//security aspect
switch ($go){
	case 'failed' :
		$pesan = get('pesan');
	include ('main/login.php&pesan='.$pesan);		
		break;

	case 'auth':

		include ('main/'.$go.'.php');

		break;

	case 'logout':

		session_destroy();

		unset($_SESSION);

		redirect('index.php');

		break;

	case 'login':

                global $config;

		include_once ('main/login.php');

		die();

}







openpagebackend($go);	



?>