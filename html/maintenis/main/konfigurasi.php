<?php
global $module,$config;
$module 	= 'konfigurasi';
	//debugvar($_POST);
	if (sizeof($_POST)>0){
		//lakukan simpan ke table
		
		$input=$_POST;	
		$values = array_map('stripslashes',array_values($input));
		//$values = array_map('mysqli_real_escape_string', array_values($values));
    	$keys = array_keys($input);
		
		//debugvar($values);
		//die();
		$konfigurasi = '<?php 
		
';
		for($i=0;$i<count($values);$i++){
			$konfigurasi .= '$'.$keys[$i].'="'.nl2br($values[$i]).'";
';
		}
		$konfigurasi .= ' 
		
?>';
		$namafile = $config['basepath'].'main/inc/konfigurasi.php';
		file_put_contents($namafile,$konfigurasi);
		//move imageheader
		$oldfile = $config['basepath'].'temp/'.$_POST['imageheader'];
		if (strlen($_POST['imageheader'])>0){
			if (file_exists($oldfile)){
				$newfile = $config['basepath'].'images/alumni/'.$_POST['imageheader'];
				$oldfile = trim(str_replace('/','//',$oldfile));
				$newfile = trim(str_replace('/','//',$newfile));
				rename("$oldfile","$newfile");				
			}
		}
		
		redirect('index.php?go='.$module,'Konfigurasi telah tersimpan');
	} else {
		
		include_once($module . '/form.php');
		
	}

	
?>