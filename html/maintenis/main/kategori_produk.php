<?php

global $module, $moduledb;
$module = 'kategori_produk';
$moduledb = 'ec_category';

	$do 	= $_GET['do'];
	$tipe 	= $_GET['tipe'];


switch($do){
	case 'list':
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
	case 'detail':
		detail();
		break;
	case 'hapus':
		hapus();
		break;
	case 'turunkan':
		turunkan();
		break;
	case 'naikkan':
		naikkan();
		break;
	default:
		include_once($module.'/list.php');
}

function tambah(){
	global $module;
	global $moduledb;

	//cek apakah di post
	if (sizeof($_POST)>0){

		//dapatkan parent level dan nilai rgt nya
		$dataparent				= doGetDataById($moduledb,$_POST['parent_id']);
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
		$sql = 'update '.$moduledb.' set rgt=rgt+2 where rgt>'.($parentrgt-1);
		//echo $sql;
		$result_update = doquery('update '.$moduledb.' set rgt=rgt+2 where rgt>'.($parentrgt-1));
		$result_update = doquery('update '.$moduledb.' set lft=lft+2 where lft>'.($parentrgt-1));
		
		//lakukan simpan ke database menu
		$result = doinsert($moduledb,$simpanPOST);

		//get id yg baru saja diinsert
		$lastid = dogetlastid();

		//update orderingnya
		$fields = array('ordering'=>$lastid);
		$result = doupdate($moduledb,$fields,'id='.$lastid);

		if ($result) {
			redirect('index.php?go='.$module,'Data telah tersimpan');
		} else {
			
		}
	}
	
	include_once($module.'/create.php');		

}

function ubah(){
	global $module,$moduledb;
	//cek apakah di post
		
	if (sizeof($_POST)>0){
		$id = $_GET['id'];
		
		$dataold		= doGetDataById($moduledb,$_GET['id']);
		$old_parent_id	= $dataold['parent_id'];
		$simpanPOST 	= $_POST;
		
		//update parent baru
		if ($old_parent_id!=$simpanPOST['parent_id']){
			//dapatkan parent level dan nilai rgt nya
			$dataparent				= doGetDataById($moduledb,$simpanPOST['parent_id']);
			$parentlevel			= $dataparent['level'];
			$parentrgt				= $dataparent['rgt'];
			
			//level data yg baru
			$newlevel 				= intval($parentlevel) + 1;
			
			//siapkan variable data yg akan disimpan			
			$simpanPOST['level'] 	= $newlevel;
			$simpanPOST['lft']		= $parentrgt;
			$simpanPOST['rgt']		= $parentrgt+1;
			
			//buat space utk sisip menu baru
			$result_update = doquery('update '.$moduledb.' set rgt=rgt+2 where rgt>'.($parentrgt-1));
			$result_update = doquery('update '.$moduledb.' set lft=lft+2 where lft>'.($parentrgt-1));
		}
		
		$result = doupdate($moduledb,$simpanPOST,"id='".$id."'");
		
		if ($result) {
			redirect('index.php?go='.$module,'Data telah tersimpan');
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
	global $module,$moduledb,$config;
	
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

function turunkan(){
	global $module,$config;
	
	$id 		= $_GET['id'];
	$module 	= 'kategori_produk';
	$moduledb 	= 'ec_category';
	
	//get data current node
	$dbnode = doquery('select * from '.$moduledb.' where id="'.$id.'"');
	$node = $dbnode[0];
	
	$lft 	= $node['lft'];
	$rgt	= $node['rgt'];
	$nodepoint = ($rgt - $lft) + 1;
	
	//get data node setelah ini dalam level yang sama
	$dbnodeatas = doquery('select * from '.$moduledb.' where lft>'.$lft.' and parent_id='.$node['parent_id'].' order by lft asc limit 1');
	$nodeatas = $dbnodeatas[0];
	$lft_nodeatas = $nodeatas['lft'];
	$rgt_nodeatas = $nodeatas['rgt'];
	$nodepointatas = ($rgt_nodeatas - $lft_nodeatas) + 1;
	
	if (count($dbnodeatas)==0){
		redirect('index.php?go='.$module,'Gagal menurunkan karena sudah paling bawah pada level yang sama ');
	} else  {
		
		$result = doexec('update '.$moduledb.' set lft=lft+'.$nodepoint.',rgt=rgt+'.$nodepoint.' where lft>'.$rgt_nodeatas.' ');
		
		//
		$increase = $nodepoint+$nodepointatas+(($lft_nodeatas - $rgt) - 1);
		
		$result = doexec('update '.$moduledb.' set lft=lft+'.$increase.',rgt=rgt+'.$increase.' where lft between '.$lft.' and '.$rgt.' ');
		
		$increase = $nodepoint;
		
		$result = doexec('update '.$moduledb.' set lft=lft-'.$increase.',rgt=rgt-'.$increase.' where lft >='.$lft.' ');
		
		if ($result) {
			redirect('index.php?go='.$module,'Berhasil menurunkan '.$node['nama_category']);		
		} else {
			redirect('index.php?go='.$module,'Gagal menurunkan '.$node['nama_category'].'nodepoint:'.$nodepoint.' lft_nodeatas='.$lft_nodeatas);		
		}
		
	}	
}

function naikkan(){
	global $module,$config;
	
	$id 		= $_GET['id'];
	$module 	= 'kategori_produk';
	$moduledb 	= 'ec_category';
	
	//get data current node
	$dbnode = doquery('select * from '.$moduledb.' where id="'.$id.'"');
	$node = $dbnode[0];
	
	$lft 	= $node['lft'];
	$rgt	= $node['rgt'];
	$nodepoint = ($rgt - $lft) + 1;
	
	//get data node setelah ini dalam level yang sama
	$dbnodeatas = doquery('select * from '.$moduledb.' where lft<'.$lft.' and parent_id='.$node['parent_id'].' order by lft desc limit 1');
	$nodeatas = $dbnodeatas[0];
	$lft_nodeatas = $nodeatas['lft'];
	$rgt_nodeatas = $nodeatas['rgt'];
	$nodepointatas = ($rgt_nodeatas - $lft_nodeatas) + 1;
	
	if (count($dbnodeatas)==0){
		redirect('index.php?go='.$module,'Gagal menaikkan karena sudah paling atas pada level yang sama ');
	} else  {
		
		$result = doexec('update '.$moduledb.' set lft=lft+'.$nodepoint.',rgt=rgt+'.$nodepoint.' where lft>='.$lft_nodeatas.' ');
		
		$new_lft = $lft + $nodepoint;
		$new_rgt = $rgt + $nodepoint;
		$new_lft_nodeatas = $lft_nodeatas + $nodepoint;
		$new_rgt_nodeatas = $rgt_nodeatas + $nodepoint;
		
		$increase = $nodepoint+$nodepointatas+(($lft - $rgt_nodeatas) - 1);
				
		$result = doexec('update '.$moduledb.' set lft=lft-'.$increase.',rgt=rgt-'.$increase.' where lft between '.$new_lft.' and '.$new_rgt.' ');
		
		$increase = $nodepoint;
		
		$result = doexec('update '.$moduledb.' set lft=lft-'.$increase.',rgt=rgt-'.$increase.' where lft >'.$new_rgt_nodeatas.' ');
		
		if ($result) {
			redirect('index.php?go='.$module,'Berhasil menaikkan '.$node['nama_category']);		
		} else {
			redirect('index.php?go='.$module,'Gagal menaikkan '.$node['nama_category']);		
		}
		
	}	
}

?>