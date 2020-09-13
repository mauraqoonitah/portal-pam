<?php


global $module, $moduledb,$moduledb_file, $sort_order;
$module 	= 'reporting';
$moduledb 	= 'absensi';

$config['judul']    = 'Reporting';



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
	default:
		include_once($module.'/list.php');
}	

function tambah(){
	global $module, $moduledb, $config;
		
		//cek apakah di post
		if (sizeof($_POST)>0){
		
			//lakukan simpan ke table
			$simpanPOST = $_POST;
			
			//cek format 
						$result = doinsert($moduledb,$simpanPOST);
			
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
		if (count($_POST)>0){
			$id = $_GET['id'];

            $simpanPOST = $_POST;
                        $result = doupdatedebug($moduledb,$simpanPOST,"id='".$id."'");
			
			if ($result) {
				//cek profile
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
		$result = dodelete($moduledb,$item);
	}
	
	
	if ($result){
		echo 'Sukses menghapus data '.$_POST['itemGroup'];
	} else {
		echo 'Gagal menghapus data '.$_POST['itemGroup'];
	}
	
}

function detail(){
	global $module, $moduledb, $config;
	include_once($module.'/detail.php');
}
?>
