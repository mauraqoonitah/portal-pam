<?php



global $module, $moduledb,$moduledb_file, $sort_order;



$module 	= 'content';



$moduledb 	= 'content';



$config['judul']    = 'Settings Content';

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

			//lakukan simpan ke table content

			$input=$_POST;

			$input['created']=date('Y-m-d H:i:s');

			$input['created_by']=$_SESSION['userid'];

			$result = doinsert('content',$input);

			

			$lastid = dogetlastid();

			//update orderingnya

			$fields = array('ordering'=>$lastid);

			$result = doupdate($module,$fields,'id='.$lastid);

			if ($result) {

				redirect('index.php?go=content','Data telah tersimpan');

			} else {

		

			}

		}

		

		include_once($module.'/create.php');

}	

		

function ubah(){

	global $module;

		//cek apakah di post

		if (sizeof($_POST)>0){

			$id = $_GET['id'];

			$input=$_POST;

			$input['modified_by']=$_SESSION['userid'];

			$result = doupdate("content",$input,"id='".$id."'");

						

			if ($result) {

				redirect('index.php?go=content','Data telah tersimpan');

			} else {

			//$_SESSION['pesan']="error"	;

			}

		}

		

		include_once($module.'/edit.php');

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



function detail(){

	global $module;

	include_once($module.'/detail.php');

}





?>