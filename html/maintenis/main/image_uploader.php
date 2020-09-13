<?php
$config['theme'] = '';
$f = $_GET['f'];
$p = $_GET['p'];
foreach ($_FILES["upload".$f]["error"] as $key => $error) {

    if ($error == UPLOAD_ERR_OK) {
        $name = $_FILES["upload".$f]["name"][$key];		
		
		//$name_no_ext = substr($name, 0,strrpos($name,'.')); 
		
		//$ext = end(explode('.', $name));
		
		//$namafilelink = $config['baseurl']
		$namafilelink =   $config['baseurl_front'] . $p . '/' . $name;
		$namafile =   $config['basepath_front'] . $p . '/' . $name;
		 
		//$shortnamafile = $name_no_ext . '_' . date('dmYHis').'.'.$ext;
        //echo $_FILES["upload"]["tmp_name"][$key];
		if (move_uploaded_file( $_FILES["upload".$f]["tmp_name"][$key], $namafile)){			
			echo $name;
		} else echo 'gagal';
    }
}

?>
