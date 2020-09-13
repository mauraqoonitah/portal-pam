<?php

global $module, $moduledb;
$module 	= 'status_pesanan';
$moduledb 	= 'ec_order_status';

$do 	= $_GET['do'];
$tipe 	= $_GET['tipe'];

switch($do){
	case 'list':
		include_once($module.'/list.php');
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
	default:
		include_once($module.'/list.php');
}	

function tambah(){
	global $module, $moduledb, $config;
		
		//cek apakah di post
		if (sizeof($_POST)>0){
		
			//lakukan simpan ke table
			$input=$_POST;
			
			//cek format 
						$result = doinsert($moduledb,$input);
			
			if ($result) {
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
			$input=$_POST;

			//cek format 
			
			$result = doupdate($moduledb,$input,"id='".$id."'");
			
			if ($result) {
				redirect('index.php?go='.$module,'Data telah tersimpan');
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
