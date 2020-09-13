<?php



ini_set('session.use_cookies', 'On');

ini_set('session.use_trans_sid', 'Off');

ini_set("display_errors","Off");

session_name('frontendcms');			

session_set_cookie_params(0, '/');

session_start();



require_once('main/inc/config.inc.php');

require_once('main/inc/library.inc.php');


//overrid theme front
$config['theme'] = 'pam';
//security aspect

if (isset($_GET['go'])){

	$go = get('go');

} else $go = 'index';





switch ($go){

	case 'failed' :

		$pesan = get('pesan');

		include ('main/login.php&pesan='.$pesan);

		$pesan = '';		

		break;

	case 'auth':

		include ('main/'.$go.'.php');

		break;

	case 'logout':

		session_destroy();

		unset($_SESSION);

		redirect('index.php');

		break;

}



openpage($go);	



?>