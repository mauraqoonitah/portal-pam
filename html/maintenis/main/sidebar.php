<?php

global $module, $moduledb,$moduledb_file, $sort_order;

$module 	= 'sidebar';

$moduledb 	= 'sidebar';

$config['judul']    = 'Settings Sidebar';
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
	global $module, $moduledb, $config;
		
		//cek apakah di post
		if (sizeof($_POST)>0){
		
			//lakukan simpan ke table
			$input=$_POST;
			
			if (isset($_POST['param'])){
				$param = $_POST['param'];
				unset($input['param']);
			} 
			
			//cek format 
			$result = doinsertdebug($moduledb,$input);
			
			//get id yg baru saja diinsert
			$lastid = dogetlastid();
			
			if ($input['ordering']==''){
				
				//update orderingnya
				$fields = array('ordering'=>$lastid);
				doupdatedebug($moduledb,$fields,'id='.$lastid);
				
			}
			
			if (isset($_POST['param'])){
				
				//masukin param yg baru
				foreach($param as $key=>$value){
					$input_param = array('nama_param'	=>  $key,
										 'value_param'	=>	$value,
										 'id_sidebar'	=>	$lastid,
										);
					 $result_param = doinsertdebug('sidebar_param',$input_param);
				}
			}
			
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

			if (isset($_POST['param'])){
				$param = $_POST['param'];
				unset($input['param']);
			} 
			
			
			$result = doupdatedebug($moduledb,$input,"id='".$id."'");
			
			if (isset($_POST['param'])){
				//delete param yg lama
				$result_delete = doexec('delete from sidebar_param where id_sidebar='.q($id));
				
				//masukin param yg baru
				foreach($param as $key=>$value){
					$input_param = array('nama_param'	=>  $key,
										 'value_param'	=>	$value,
										 'id_sidebar'	=>	$id,
										);
					 $result_param = doinsertdebug('sidebar_param',$input_param);
				}
			}
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
		doexec('delete from sidebar_param where id_sidebar='.$item);
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
