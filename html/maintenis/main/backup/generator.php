<?php

global $module,$basepath,$folder_generator;
$module = 'generator';
$folder_generator = $config['basepath'] . 'main/generator/';
$do 	= filter_inputnya($_GET['do']);
$tipe 	= filter_inputnya($_GET['tipe']);


switch($do){
	case 'buat':
		buat();		
		break;
	case 'generate':
		generate();
		break;
	default:
		buat();
}

function buat(){
	global $module,$folder_generator, $config,$basepath;
	
	if (sizeof($_POST)>0){
		$_SESSION['temp_gen'] = $_POST;
		//debugvar($_SESSION);
		//die();
		$insert  		= $_POST;
		$namamodule 	= $_POST['nama_module'];
		$judulmodule 	= $_POST['judul_module'];
		$namatable  	= $_POST['nama_table'];
		$namatemplate  	= $_POST['nama_template'];
		$front		  	= $_POST['front'];
		
		if ($front=="front"){
			$basepath = $config['basepath'];
			$baseurl  = '';
		} else {
			$basepath = $config['basepath'];
			$baseurl  = 'backend/';
		}
		
		if (file_exists($basepath . 'main/' . $namamodule.'.php')){
			unlink($basepath . 'main/' . $namamodule.'.php');
		}
		
			//get controller
			ob_start();
			require($folder_generator . $namatemplate . '/controller.php');
    		$controller = ob_get_contents();
    		ob_end_clean();
			
			//generate controller
			$namafile = $basepath . 'main/' . $namamodule.'.php';
			file_put_contents($namafile,$controller);
			
			//buat folder
			$namadir  = $basepath . 'main/' . $namamodule;
			if (!file_exists($namadir))
				mkdir($namadir,0777,true);
				
				//get nama template generator
			$field 			= 'nama_template';
			$fieldid		= str_replace(' ','_',$field);

			$path = $folder_generator .$namatemplate;
			$listDir = array();
			$listFolder = array();
		    if($handler = opendir($path)) {
		        while (($sub = readdir($handler)) !== FALSE) {
		            if ($sub != "." && $sub != ".." && $sub != "Thumb.db" && $sub != "Thumbs.db") {
		                if(is_file($path."/".$sub)) {
		                    $listDir[] = $sub;
		                } else {
							$listFolder[] = $sub;
						}
		            }
		        }
		        closedir($handler);
		    }
			
			foreach($listDir as $filenya){
				if ($filenya<>'controller.php'){
					generate($filenya,$namamodule, $namatable, $namatemplate);	
				}
				
			}
			
			//tambah ke menu admin bagian konten
			if ($_POST['addtomenu']=="addtomenu"){
				
				$cekdatamodulemenu = doGetData("menu","*","menutype='adminmenu' and alias='atur-".$namamodule."'");
				if (count($cekdatamodulemenu)<1){
					//lakukan insert
					$dataparent = doquery("select * from menu where menutype='adminmenu' and alias='menu-konten'");
					$parent = $dataparent[0];
					
					$newlevel 				= intval($parent['level']) + 1;
					
					$insertNew = array();
					$insertNew['menutype'] 	= 'adminmenu';
					$insertNew['title'] 	= 'Atur '.ucfirst($judulmodule);
					$insertNew['alias'] 	= 'atur-'.$namamodule;
					$insertNew['link'] 		= 'index.php?go='.$namamodule;
					$insertNew['parent_id'] = $parent['id'];
					$insertNew['level'] 	= $newlevel;
					$insertNew['lft'] 		= $parent['rgt'];
					$insertNew['rgt'] 		= intval($parent['rgt']) + 1;
					
					//buat space utk sisip menu baru
					$result_update = doquery('update menu set rgt=rgt+2 where rgt>'.(intval($parent['rgt'])-1));
					$result_update = doquery('update menu set lft=lft+2 where lft>'.(intval($parent['rgt'])-1));
	
					//lakukan simpan ke database menu
					$result = doinsert('menu',$insertNew);

				}
				
				
			}

			//finishing
			if (file_exists($basepath . 'main/' . $namamodule.'.php')){
				
				$pesan = 'module '.$namamodule.' berhasil digenerate, test <a href="'.$config['baseurl'] . $baseurl . 'index.php?go='.$namamodule.'" target="_blank">di sini</a>';
				if ($_POST['addtomenu']=="addtomenu") $pesan .= ', dan link sudah ditambahkan ke menu Konten';
				redirect('index.php?go=generator',$pesan);
			}
		//}
	}
	
	include_once($module . '/buat.php');
        //unset($_SESSION['temp_gen']);
}

function generate($file,$namamodule, $namatable, $namatemplate){
	global $module,$basepath,$config,$folder_generator;
	$namafilenya = $folder_generator . $namatemplate . '/' . $file;
	//echo $namafilenya;
	ob_start();	
	require($namafilenya);
	$isifile = ob_get_contents();
	ob_end_clean();
	
	$namafile = $basepath . 'main/' . $namamodule.'/'.$file;
	file_put_contents($namafile,$isifile);
}