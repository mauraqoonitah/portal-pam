<?php

global $module, $moduledb,$moduledb_file, $sort_order;

$module 	= 'template';

$moduledb 	= 'template';

$config['judul']    = 'Settings Template';
$do 	= $_GET['do'];
$tipe 	= $_GET['tipe'];


switch($do){

	case 'list':

		global $sort_order;

		include_once($module.'/list.php');

		break;

	case 'list_jx':

		global $sort_order;

		unset($_SESSION['temp_form']);

		include_once($module.'/list_jx.php');

		break;

	case 'tambah':

		tambah();

		break;

	case 'ubah':

		ubah();

		break;

	case 'view':

		include_once($module.'/view.php');

		break;		
	case 'hapus':

		hapus();

		break;

	default:

		include_once($module.'/list.php');

}	

function tambah(){
	global $module,$pesan_error;

	//cek apakah di post
	if (sizeof($_POST)>0){

		//siapkan variable data yg akan disimpan
		$simpanPOST 			= $_POST;
		
		//lakukan simpan ke database template
		$result = doinsert($module,$simpanPOST);

		if ($result) {
			redirect('index.php?go=template','Data telah tersimpan');
		} else {
			if (strpos($pesan_error,'Duplicate')>-1){
				redirect('','Gagal menyimpan karena isian Alias terjadi duplikat atau double dengan menu lain');
			}else{
				redirect('','Gagal menyimpan '.$pesan_error);	
			}
		}
	}
	
	include_once($module.'/form.php');		

}

function ubah(){
	global $module;
		//cek apakah di post
	if (sizeof($_POST)>0){
		$id = $_GET['id'];
		$result = doupdate("template",$_POST,"id='".$id."'");
		
		if ($result) {
			redirect('index.php?go=template','Data telah tersimpan');
		} else {
			
		}
	}

	include_once($module.'/edit.php');

}

function detail(){
	global $module;
	include_once($module.'/detail.php');
}

function hapus(){
	global $module,$config;
	
	$config['theme']='';
	
	$items = explode(',', rtrim($_POST['itemGroup'], ','));
    $num = 0; 
	
	foreach($items as $item){
		$result = dodelete($module,$item);
	}
	
	
	if ($result){
		echo 'Sukses menghapus data '.$_POST['itemGroup'];
	} else {
		echo 'Gagal menghapus data '.$_POST['itemGroup'];
	}
	
}
?>