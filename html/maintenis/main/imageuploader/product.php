
<?php

global $module,$moduledb,$modulecat,$moduledbcat,	$moduledbimg;
$module = 'product';
$moduledb = 'ec_product';
$modulecat = 'product_category';
$moduledbcat = 'ec_category';
$moduledbimg = 'ec_product_image';



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
//	case 'addpic':
//		addpic();
//		break;	
	default:
		include_once($module.'/list.php');
}	
function tambah(){
	global $module,$moduledb, $moduledbimg;
	//cek apakah di post
		if (sizeof($_POST)>0){
			//lakukan simpan ke table product
			$input=$_POST;
			//unset($input['uploadimg']);
			unset($input['imgadd']);
			$input['created']=date('Y-m-d H:i:s');
			//$input['created_by']=$_SESSION['userid'];
			
			//lakukan simpan ke database product
			$result = doinsertdebug($moduledb,$input);
			if (!$result)
				die($result);	
						
			//get id yg baru saja diinsert
			$lastid = dogetlastid();

			//update orderingnya
			$fields = array('ordering'=>$lastid);
			$result = doupdate($moduledb,$fields,'id='.$lastid);		
			
			//menambahkan gambar ke id di table product
			//$postgambar = $_POST['imgadd'];	
			//foreach($postgambar as $gambar){
			//	$inputgambar = array ('id_product'=>$lastid,'image'=>$gambar);
			//	doinsert($moduledbimg,$inputgambar);
				
			//}
			
			if ($result) {
				redirect('index.php?go=product','Data telah tersimpan');
				 //redirect('index.php?go=product&do=addpic&id='.$lastid,'Data telah tersimpan');
			} else {
		
			}
		}
		
		include_once($module.'/create.php');
}	
		
function ubah(){
	global $module,$moduledb,$modulecat,$moduledbcat,$moduledbimg;
		//cek apakah di post
		if (sizeof($_POST)>0){
			$id = $_GET['id'];
			$input=$_POST;
			//unset($input['uploadimg']);
			unset($input['imgadd']);
			//$input['modified_by']=$_SESSION['userid'];
			$result = doupdate($moduledb,$input,"id='".$id."'");
			doexec('DELETE FROM ec_product_image WHERE id_product='.$id);
			//$postgambar = $_POST['imgadd'];	
			//foreach($postgambar as $gambar){
			//	$inputgambar = array ('id_product'=>$id,'image'=>$gambar);
			//	doinsert($moduledbimg,$inputgambar);
			//}
						
			if ($result) {
				redirect('index.php?go=product','Data telah tersimpan');
				// redirect('index.php?go=product&do=addpic&id='.$lastid,'Data telah tersimpan');				
			} else {
			//$_SESSION['pesan']="error"	;
			}
		}
		
		include_once($module.'/edit.php');
}
		
function hapus(){
	global $module,$moduledb,$config,$moduledbimg;
	
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

//function addpic(){
//	global $module,$moduledb,$config;$moduledbimg;
//	include_once($module.'/addpic.php');
//}

?>