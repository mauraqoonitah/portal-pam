<?php
global $module, $moduledb , $sidebar;

$module = 'page';
$moduledb = 'content';

$do 	= $_GET['do'];

switch($do){
	case 'view':
		view();
		break;
	default:
		view();
}

function view(){
	global $module, $moduledb, $config, $sidebar;
	
	include_once($module.'/view.php');	
}
?>