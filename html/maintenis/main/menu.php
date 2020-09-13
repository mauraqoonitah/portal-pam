<?php



global $module, $moduledb,$moduledb_file, $sort_order;



$module 	= 'menu';



$moduledb 	= 'menu';







$config['judul']    = 'Settings Menu';

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

	case 'turunkan':

		turunkan();

		break;

	case 'naikkan':

		naikkan();

		break;

	case 'hapus':



		hapus();



		break;



	default:



		include_once($module.'/list.php');



}	

function tambah(){

	global $module;



	//cek apakah di post

	if (sizeof($_POST)>0){



		$tipe = $_POST['menutype'];



		//dapatkan parent level dan nilai rgt nya

		$dataparent				= doGetDataById($module,$_POST['parent_id']);

		$parentlevel			= $dataparent['level'];

		$parentrgt				= $dataparent['rgt'];

		

		//level data yg baru

		$newlevel 				= intval($parentlevel) + 1;

		

		//siapkan variable data yg akan disimpan

		$simpanPOST 			= $_POST;

		$simpanPOST['level'] 	= $newlevel;

		$simpanPOST['lft']		= $parentrgt;

		$simpanPOST['rgt']		= $parentrgt+1;

		

		//buat space utk sisip menu baru

		$result_update = doquery('update '.$module.' set rgt=rgt+2 where rgt>'.($parentrgt-1));

		$result_update = doquery('update '.$module.' set lft=lft+2 where lft>'.($parentrgt-1));

		

		//lakukan simpan ke database menu

		$result = doinsert($module,$simpanPOST);



		//get id yg baru saja diinsert

		$lastid = dogetlastid();



		//update orderingnya

		$fields = array('ordering'=>$lastid);

		$result = doupdate($module,$fields,'id='.$lastid);



		if ($result) {

			redirect('index.php?go=menu&tipe='.$tipe,'Data telah tersimpan');

		} else {

			

		}

	}

	

	include_once($module.'/create.php');		



}



function ubah(){

	global $module,$pesan_error;

	//cek apakah di post

		

		

	if (sizeof($_POST)>0){

		$id = $_GET['id'];

		$tipe = $_POST['menutype'];

		

		$dataold		= doGetDataById($module,$_GET['id']);

		$old_parent_id	= $dataold['parent_id'];

		$simpanPOST 	= $_POST;

		

		//update parent baru

		if ($old_parent_id!=$simpanPOST['parent_id']){

			//dapatkan parent level dan nilai rgt nya

			$dataparent				= doGetDataById($module,$simpanPOST['parent_id']);

			$parentlevel			= $dataparent['level'];

			$parentrgt				= $dataparent['rgt'];

			

			//level data yg baru

			$newlevel 				= intval($parentlevel) + 1;

			

			//siapkan variable data yg akan disimpan			

			$simpanPOST['level'] 	= $newlevel;

			$simpanPOST['lft']		= $parentrgt;

			$simpanPOST['rgt']		= $parentrgt+1;

			

			//buat space utk sisip menu baru

			$result_update = doquery('update '.$module.' set rgt=rgt+2 where rgt>'.($parentrgt-1));

			$result_update = doquery('update '.$module.' set lft=lft+2 where lft>'.($parentrgt-1));

		}

		

		$result = doupdate("menu",$simpanPOST,"id='".$id."'");

		

		if ($result) {

			redirect('index.php?go=menu&tipe='.$tipe,'Data telah tersimpan');

		} else {

			if (strpos($pesan_error,'Duplicate')>-1){

				redirect('','Gagal menyimpan karena isian Alias terjadi duplikat atau double dengan menu lain');

			}else{

				redirect('','Gagal menyimpan '.$pesan_error);	

			}

			

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



function turunkan(){

	global $module,$config;

	

	$id = $_GET['id'];

	$tipe = $_GET['tipe'];

	

	//get data current node

	$dbnode = doquery('select * from menu where id="'.$id.'"');

	$node = $dbnode[0];

	

	$lft 	= $node['lft'];

	$rgt	= $node['rgt'];

	$nodepoint = ($rgt - $lft) + 1;

	

	//get data node setelah ini dalam level yang sama

	$dbnodeatas = doquery('select * from menu where lft>'.$lft.' and parent_id='.$node['parent_id'].' and menutype="'.$tipe.'" order by lft asc limit 1');

	$nodeatas = $dbnodeatas[0];

	$lft_nodeatas = $nodeatas['lft'];

	$rgt_nodeatas = $nodeatas['rgt'];

	$nodepointatas = ($rgt_nodeatas - $lft_nodeatas) + 1;

	

	if (count($dbnodeatas)==0){

		redirect('index.php?go=menu&tipe='.$tipe,'Gagal menurunkan karena sudah paling bawah pada level yang sama ');

	} else  {

		

		$result = doexec('update menu set lft=lft+'.$nodepoint.',rgt=rgt+'.$nodepoint.' where lft>'.$rgt_nodeatas.' and menutype="'.$tipe.'"');

		

		//

		$increase = $nodepoint+$nodepointatas+(($lft_nodeatas - $rgt) - 1);

		

		$result = doexec('update menu set lft=lft+'.$increase.',rgt=rgt+'.$increase.' where lft between '.$lft.' and '.$rgt.' and menutype="'.$tipe.'"');

		

		$increase = $nodepoint;

		

		$result = doexec('update menu set lft=lft-'.$increase.',rgt=rgt-'.$increase.' where lft >='.$lft.' and menutype="'.$tipe.'"');

		

		if ($result) {

			redirect('index.php?go=menu&tipe='.$tipe,'Berhasil menurunkan '.$node['title']);		

		} else {

			redirect('index.php?go=menu&tipe='.$tipe,'Gagal menurunkan '.$node['title'].'nodepoint:'.$nodepoint.' lft_nodeatas='.$lft_nodeatas);		

		}

		

	}	

}



function naikkan(){

	global $module,$config;

	

	$id = $_GET['id'];

	$tipe = $_GET['tipe'];

	

	//get data current node

	$dbnode = doquery('select * from menu where id="'.$id.'"');

	$node = $dbnode[0];

	

	$lft 	= $node['lft'];

	$rgt	= $node['rgt'];

	$nodepoint = ($rgt - $lft) + 1;

	

	//get data node setelah ini dalam level yang sama

	$dbnodeatas = doquery('select * from menu where lft<'.$lft.' and parent_id='.$node['parent_id'].' and menutype="'.$tipe.'" order by lft desc limit 1');

	$nodeatas = $dbnodeatas[0];

	$lft_nodeatas = $nodeatas['lft'];

	$rgt_nodeatas = $nodeatas['rgt'];

	$nodepointatas = ($rgt_nodeatas - $lft_nodeatas) + 1;

	

	if (count($dbnodeatas)==0){

		redirect('index.php?go=menu&tipe='.$tipe,'Gagal menaikkan karena sudah paling atas pada level yang sama ');

	} else  {

		

		$result = doexec('update menu set lft=lft+'.$nodepoint.',rgt=rgt+'.$nodepoint.' where lft>='.$lft_nodeatas.' and menutype="'.$tipe.'"');

		

		$new_lft = $lft + $nodepoint;

		$new_rgt = $rgt + $nodepoint;

		$new_lft_nodeatas = $lft_nodeatas + $nodepoint;

		$new_rgt_nodeatas = $rgt_nodeatas + $nodepoint;

		

		$increase = $nodepoint+$nodepointatas+(($lft - $rgt_nodeatas) - 1);

				

		$result = doexec('update menu set lft=lft-'.$increase.',rgt=rgt-'.$increase.' where lft between '.$new_lft.' and '.$new_rgt.' and menutype="'.$tipe.'"');

		

		

		$increase = $nodepoint;

		

		$result = doexec('update menu set lft=lft-'.$increase.',rgt=rgt-'.$increase.' where lft >'.$new_rgt_nodeatas.' and menutype="'.$tipe.'"');

		

		if ($result) {

			redirect('index.php?go=menu&tipe='.$tipe,'Berhasil menaikkan '.$node['title']);		

		} else {

			redirect('index.php?go=menu&tipe='.$tipe,'Gagal menaikkan '.$node['title']);		

		}

		

	}	

}



?>