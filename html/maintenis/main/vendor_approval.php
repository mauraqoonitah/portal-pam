<?php


global $module, $moduledb,$moduledb_file, $sort_order;
$module 	= 'vendor_approval';
$moduledb 	= 'user';

$config['judul']    = 'Vendor Approval';



$do 	= get('do');
$tipe 	= get('tipe');

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
	case 'approve':
		approve();
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
	global $module, $moduledb, $config, $mode_edit;
		
		//cek apakah di post
		if (sizeof($_POST)>0){
		
			//lakukan simpan ke table
			$simpanPOST = $_POST;
			$save_ordering = false;
                        
			//cek format 
			
$save_ordering = true;			$result = doinsert($moduledb,$simpanPOST);
			
			if ($result) {

                            if ($simpanPOST['ordering']=='' && $save_ordering){

                                //get id yg baru saja diinsert
                                $lastid = dogetlastid();

                                //update orderingnya
                                $fields = array('ordering'=>$lastid);
                                $result = doupdate($moduledb,$fields,'id='.$lastid);				
                            }

                            redirect('index.php?go='.$module,'Data telah tersimpan');

			} else {
                            $_SESSION['temp_form'] = $_POST;
                            $_SESSION['pesan']      = '<strong>Terjadi Error!</strong> Gagal menyimpan';
                            $_SESSION['pesan_mode'] = 'warning';
			}
		}
		
		include_once($module.'/create.php');
}	

function ubah(){
	global $module, $moduledb, $config, $mode_edit;
		//cek apakah di post
		if (count($_POST)>0){
			$id = $_GET['id'];

            $simpanPOST = $_POST;
                        $result = doupdate($moduledb,$simpanPOST,"id='".$id."'");
			
			if ($result) {
				//cek profile
				redirect('index.php?go='.$module,'Data telah tersimpan','sukses');
			} else {
							$_SESSION['temp_form'] = $_POST;
                            $_SESSION['pesan']      = '<strong>Terjadi Error!</strong> Gagal menyimpan';
                            $_SESSION['pesan_mode'] = 'warning';
			}
		}
			
	include_once($module.'/edit.php');
}

function approve(){
	global $module, $moduledb, $config;
			$id = $_GET['id'];
			
            $simpanPOST['approved'] = '1';
                        $result = doupdate($moduledb,$simpanPOST,"id='".$id."'");
			
			if ($result) {
				//cek profile
				redirect('index.php?go='.$module,'Vendor Berhasil di Approve','sukses');
			} else {
							$_SESSION['temp_form'] = $_POST;
                            $_SESSION['pesan']      = '<strong>Terjadi Error!</strong> Gagal menyimpan';
                            $_SESSION['pesan_mode'] = 'warning';
			}
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

?>
