<?php
//
// Library created by Erwan Novianto

// version 1.6
// penambahan meta link rel untuk peningkatan SEO share facebook
//
// version 1.5
//
// History:
// version 1.5
// - hilangkan tanda slash pada server tertentu
// version 1.2
// - perbaikan pada function filter_input
// - penambahan function romawi
// version 1.1.1
// - update pada openpage
//   penambahan config['meta'] untuk tujuan SEO
//
function openpage($name,$param=''){
	global $content, $config, $pesan, $jsHead, $cssHead;
	if (isset($_SESSION['pesan'])){
		$pesan = $_SESSION['pesan'];		
		unset($_SESSION['pesan']);	
	}
	
	//$sidebar = getsidebar();
	$content = getcontent($name,$param);
  $sidebar = getsidebar();
  $config['meta']  = '<meta property="og:image" content="'.$config['meta_image'].'" />
        <meta property="og:title" content="'.$config['meta_title'].'" />
        <meta property="og:site_name" content="'.$config['webname'].'" />
        <meta property="og:type" content="article" />
  <meta property="og:url" content="'.$config['meta_url'].'" />
  <meta property="og:description" content="'.$config['meta_description'].'" />  
        <meta name="title" content="'.$config['meta_title'].'" />
  <meta name="description" content="'.$config['meta_description'].'" />
  <meta name="keyword" content="'.$config['meta_keyword'].'" />            
  <link rel="image_src" href="'.$config['meta_image'].'" />
  ';
	if ($config['theme'] == ''){
		echo $content;	
	} else {
		//get template
		ob_start();
		require($config['basepath'] . 'themes/'.$config['theme'].'/index.php');
    	$template = ob_get_contents();
    	ob_end_clean();
		
		if(isset($jsHead) && sizeof($jsHead)>0){
			//isi js head
			foreach($jsHead as $jsurl){
				$jsHeadhtml .= '<script type="text/javascript" src="'.$jsurl.'"></script>';
			}
			$count=0;
        	$template=preg_replace('/(<\\/head\s*>)/is','<###head###>$1',$template,1,$count);
        	if($count)
            	$template=str_replace('<###head###>',$jsHeadhtml,$template);
        	else
            	$template=$jsHeadhtml.$template;		
		}
		if (isset($cssHead) && sizeof($cssHead)>0){
			foreach($cssHead as $cssurl){
				$cssHeadhtml .= '<link rel="stylesheet" href="'.$cssurl.'" type="text/css" media="screen" />';
			}
			$count=0;
        	$template=preg_replace('/(<\\/head\s*>)/is','<###head###>$1',$template,1,$count);
        	if($count)
            	$template=str_replace('<###head###>',$cssHeadhtml,$template);
        	else
            	$outputcss=$cssHeadhtml.$template;
		}
		
        
		echo $template;
		
		//include($config['basepath'] . 'themes/'.$config['theme'].'/index.php');
	}
	return true;
}
function openpagebackend($name,$param=''){
	global $content, $config, $pesan, $jsHead, $cssHead;
	if (isset($_SESSION['pesan'])){
		$pesan = $_SESSION['pesan'];
		$pesan_mode = $_SESSION['pesan_mode'];
		unset($_SESSION['pesan']);	
		unset($_SESSION['pesan_mode']);	
	}
	$content = getcontentbackend($name,$param);
	//$sidebar = getsidebar();
	if ($config['theme'] == ''){
		echo $content;	
	} else {
			//get template
		ob_start();
		require($config['basepath'] . 'themes/'.$config['theme'].'/index.php');
		
    	$template = ob_get_contents();
    	ob_end_clean();
		
		if(isset($jsHead) && sizeof($jsHead)>0){
			//isi js head
			foreach($jsHead as $jsurl){
				$jsHeadhtml .= '<script type="text/javascript" src="'.$jsurl.'"></script>';
			}
			$count=0;
        	$template=preg_replace('/(<\\/head\s*>)/is','<###head###>$1',$template,1,$count);
        	if($count)
            	$template=str_replace('<###head###>',$jsHeadhtml,$template);
        	else
            	$template=$jsHeadhtml.$template;		
		}
		
		if (isset($cssHead) && sizeof($cssHead)>0){
			foreach($cssHead as $cssurl){
				$cssHeadhtml .= '<link rel="stylesheet" href="'.$cssurl.'" type="text/css" media="screen" />';
			}
			$count=0;
        	$template=preg_replace('/(<\\/head\s*>)/is','<###head###>$1',$template,1,$count);
        	if($count)
            	$template=str_replace('<###head###>',$cssHeadhtml,$template);
        	else
            	$outputcss=$cssHeadhtml.$template;
		}
		
        
		echo $template;
		
		
	}
	return true;
}
function getcontent($name,$param=''){	
	global $config, $sidebar;

	ob_start();    
	if (strlen($param)>0){
		$params = '?'.$param;
	}
	
	if ($name=='index'){
		if (file_exists($config['basepath'] . 'themes/'.$config['theme'].'/home.php')){
			$sidebar = getsidebar();
			require($config['basepath'] . 'themes/'.$config['theme'].'/home.php');			
		} else {
			$sidebar = getsidebar();
			require($config['basepath'] . 'main/'.$name . '.php'.$params);
		}		
	} else if (file_exists($config['basepath'] . 'main/'.$name . '.php')){
		$sidebar = getsidebar();
		require($config['basepath'] . 'main/'.$name . '.php'.$params);	
	} else {
		require($config['basepath'] . 'main/404.php');
	}
    
    $contents = ob_get_contents();
    ob_end_clean();
	
	return $contents;
}
function getcontentbackend($name,$param=''){	
	global $config;
	ob_start();    
	if (strlen($param)>0){
		$params = '?'.$param;
	}
	
	//if ($name!='index'){
	require($config['basepathbackend'] . 'main/'.$name . '.php'.$params);	
	//}
    
    $contents = ob_get_contents();
    ob_end_clean();
	
	return $contents;
}
function getsidebar(){
	$datasidebar = doquery('select * from sidebar where published=1 order by posisi, ordering asc');
	
	foreach($datasidebar as $rowsidebar){
	$header = ' <div class="art-block clearfix">
        		<div class="art-blockheader">
                    <h3 class="t">'.$rowsidebar['nama'].'</h3>
                </div>
                <div class="art-blockcontent">
				';
	$footer = '		
                </div>
				</div>';
				
		
		//echo $rowsidebar['id'];
		
		
		//if ($rowsidebar['id']==24){
		//ob_start();
		//eval ($param);
		//$hasilparam = ob_get_clean();		
		//debugvar($param);
		//die();
		//}
		//echo 'tes';
		//echo $param;
		//eval($param);
		//$tes = '<?php echo "tes";' .$param .
		//debugvar($tes);
		//die();
		//}
		$konten = getcontentsidebar($rowsidebar['widget'].'.php',$rowsidebar['id']);
		if (strlen($konten)>0){
			if ($rowsidebar['desain_sesuai_template']==1){
				$sidebar[$rowsidebar['posisi']] .= $header.$konten.$footer;	
			} else {
				$sidebar[$rowsidebar['posisi']] .= $konten;	
			}
		} else {
			if ($rowsidebar['desain_sesuai_template']==1){
				$sidebar[$rowsidebar['posisi']] .= $header.$rowsidebar['keterangan'].$footer;
			} else {
				$sidebar[$rowsidebar['posisi']] .= $rowsidebar['keterangan'];
			}
		}
	}
	return $sidebar;
}

function getsidebarparam($id_sidebar){
		
	$db_param = doquery('select * from sidebar_param where id_sidebar='.q($id_sidebar));
	
	ob_start();	
	$param = array();
	//echo '<?php ';
	//if (count($db_param)>0){	
		echo "\$param = array(";	
	//}	
	foreach($db_param as $row_param){
		$param[$row_param['nama_param']] = $row_param['value_param'];
		echo "'".$row_param['nama_param']."' => '".$row_param['value_param']."',";
	}
	
	//if (count($db_param)>0){
		echo ');';
	//}
	
	$contents = ob_get_contents();	
	ob_end_clean();
	
	return $contents;
	//return $param;
}

function getcontentsidebar($name,$id_sidebar){
	global $config;
	ob_start();    
	$param  = getsidebarparam($id_sidebar);
	eval($param);
	//debugvar($param);
	if (file_exists($config['basepath'] . 'main/sidebar/'.$name)==true)
    	require($config['basepath'] . 'main/sidebar/'.$name);
    $contents = ob_get_contents();
    ob_end_clean();
	
	return $contents;	
}

function ceksecurity(){
	global $go;
	if (!isset($_SESSION['userid']) || $_SESSION['side']!=session_name()){
		unset($_SESSION);
		redirect('index.php?go=login');			
		die();
	} else {
		$username 	= $_SESSION['username'];
		$login 		= doGetDataById('user',$username,'email');
		$profile 	= doGetDataById('user_profile',$username,'email');
		$role 		= doGetDataById('user_role',$login['role'],'id');

		$_SESSION['id_role'] 		= $login['role']; //id role
		$_SESSION['role']	 		= $role['nama_role'];
		$_SESSION['allow_frontend'] = $role['frontend'];
		$_SESSION['allow_backend'] 	= $role['backend'];
		$_SESSION['nama'] 			= $profile['nama_lengkap'];
		
		return true;
	}
	
}
function redirect($lokasi,$pesannya='',$pesan_mode='info') {
	//pesan_mode = info , warning, success
	ob_end_clean();
	$_SESSION['pesan'] = $pesannya;
	$_SESSION['pesan_mode'] = $pesan_mode;
	
	header('Location: '.$lokasi);
	echo '<script type="text/javascript">';
    echo '    window.location="'.$lokasi.'"';
    echo '</script>';
}
function doquery($sqlnya) {
	global $db, $recordcount, $config;
	
	$recordcount = 0;
	
	if ($config['dbms']=='firebird'){
		$hasil_query = ibase_query ($db, $sqlnya); 
		
		$result = array();
		while ($row = ibase_fetch_assoc($hasil_query)){
			$result[] = $row;
			$recordcount++;
		}
	} else if ($config['dbms']=='mysqli'){
		$hasil_query = mysqli_query($db, $sqlnya); 
		
		if ($hasil_query){
			$result = array();
			while ($row = mysqli_fetch_assoc($hasil_query)){
				$result[] = $row;
				$recordcount++;
			}					
		} else {
			echo 'Gagal query '.mysqli_error();
 		}
	}
		
	return $result;
}
function doexec($sqlnya){
	global $db, $config;
	$hasil_query = mysqli_query($db,$sqlnya);
	return $hasil_query ;
}


function doGetData($table,$field='*',$criteria=''){
	global $db, $config;
	if ($criteria==''){
		$strwhere = '';	
	} else {
		$strwhere = ' where '.$criteria;
	}
	$sql  = 'select '.$field.' from '.$table.$strwhere;
	//echo $sql;
    
	$hasil_query = mysqli_query($db,$sql);
    //if (!$hasil_query) {
        //echo $sql;
        //die();
//}
	$row = mysqli_fetch_assoc($hasil_query);
	//debugvar($row);
	$hasil = $row;
	return $hasil;
}
function registerJS($jsURL){
	global $jsHead;
	if (!isset($jsHead)) {
		$jsHead = array();
	}
	if (!in_array($jsURL,$jsHead)){
		$jsHead[] = $jsURL;
	}	
}
function registerCSS($cssURL){
	global $cssHead;
	if (!isset($cssHead)) {
		$cssHead = array();
	}
	if (!in_array($cssURL,$cssHead)){
		$cssHead[] = $cssURL;
	}		
}
function doGetDataById($table,$id,$fieldid='id'){
	global $db;
	$sql = 'select * from '.$table.' where '.$fieldid.'="'.$id.'"';
	$hasil_query = mysqli_query($db,$sql);
	if ($hasil_query){
		$row = mysqli_fetch_assoc($hasil_query);
		return $row;	
	} else {
		return false;
	}
	
}
function doGetDataValueById($table,$fieldid='id',$field_get,$id){
	global $db;
	$sql = 'select '.$field_get.' from '.$table.' where '.$fieldid.'="'.$id.'"';
	$hasil_query = mysqli_query($db,$sql);
	if ($hasil_query){
		$row = mysqli_fetch_assoc($hasil_query);
		return $row[$field_get];	
	} else {
		return false;
	}	
}

function doGetLastId(){
	global $db;
	return mysqli_insert_id($db);
}
function doinsert($table, $inserts) {
	global $db, $config, $pesan_error;;
	$values = array_map('stripslashes',array_values($inserts));
$values = array_map(array($db,'real_escape_string'), $values);
    //$values = array_map('mysqli_real_escape_string', array_values($inserts));
    $keys = array_keys($inserts);
    $sql = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
	$sql = str_replace('\'NOW()\'','NOW()', $sql);
	$sql = str_replace('\'\'','NULL',$sql);
	$sql = str_replace('\"\"','NULL',$sql);
    $result = mysqli_query($db,$sql);
    if (!$result){
		$pesan_error = mysqli_error();
	} else return $result;
}
function doinsertdebug($table, $inserts) {
	global $db, $config;
	$values = array_map('stripslashes',array_values($inserts));
	$values = array_map(array($db,'real_escape_string'), $values);
    //$values = array_map('mysqli_real_escape_string', array_values($inserts));
    $keys = array_keys($inserts);
    $sql = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
	$sql = str_replace('\'NOW()\'','NOW()', $sql);
	$sql = str_replace('\'\'','NULL',$sql);
	$sql = str_replace('\"\"','NULL',$sql);
    $result = mysqli_query($db,$sql);
	if (!$result){
		$pesan_error = mysqli_error();
		die($sql.'<br/>'.mysqli_error());
	} else return $result;
}

function doinsertupdate($table, $inserts) {
    global $db, $config, $pesan_error;;
    $values = array_map('stripslashes',array_values($inserts));
    $values = array_map(array($db,'real_escape_string'), $values);
    //$values = array_map('mysqli_real_escape_string', array_values($inserts));
    $keys = array_keys($inserts);
    foreach($keys as $key){
        $_updatevalue .= ','.$key.'=values('.$key.')';
    }
    //$updatevalue = implode(,$keys);
    $updatevalue = substr($_updatevalue, 1);
    $sql = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\') ON DUPLICATE KEY UPDATE '.$updatevalue;
    $sql = str_replace('\'NOW()\'','NOW()', $sql);
    $sql = str_replace('\'\'','NULL',$sql);
    $sql = str_replace('\"\"','NULL',$sql);
    //echo $sql;
    //die();
    $result = mysqli_query($db,$sql);
    if (!$result){
		$pesan_error = mysqli_error();
	} else return $result;
}

function dodelete($table, $id){
	global $db;
	global $pesan_error;
	$result=FALSE;
	$sql='DELETE FROM `'.$table.'` WHERE id='.$id;
	if (strlen($id)>0){
		$result = mysqli_query($db,$sql);
	}
	
	if (!$result){
		$pesan_error = mysqli_error();
	} else return $result;
}
function dodeletedebug($table, $id){
global $db;
	$result=FALSE;
	$sql='DELETE FROM `'.$table.'` WHERE id='.$id;
	if (strlen($id)>0){
	$result = mysqli_query($db,$sql);
		die($sql.mysqli_error());
	} else return $result;
}
function doupdate($table, $updates, $criteria) {
global $db;
	global $pesan_error;
	$values = array_map('stripslashes',array_values($updates));
	$values = array_map(array($db,'real_escape_string'), $values);
	//$values = array_map('mysqli_real_escape_string', array_values($updates));
	
	$fields = array_keys($updates);
	
	$sql = "UPDATE ".$table." SET ";
	$i = 0;
	for ($i=0; $i<=count($fields)-2; $i++) {
		$sql .= $fields[$i]."='".$values[$i]."',";
	}
	$sql .= $fields[$i]."='".$values[$i]."' WHERE ".$criteria;
	$sql = str_replace('\'NOW()\'','NOW()', $sql);
	$sql = str_replace('\'\'','NULL',$sql);
	
  	$result = mysqli_query($db,$sql);
	if (!$result){
		$pesan_error = mysqli_error();
	} else return $result;
}
function doupdatedebug($table, $updates, $criteria) {
global $db;
	global $pesan_error;
	$values = array_map('stripslashes',array_values($updates));
	$values = array_map(array($db,'real_escape_string'), $values);
	//$values = array_map('mysqli_real_escape_string', array_values($updates));
	
	$fields = array_keys($updates);
	
	$sql = "UPDATE ".$table." SET ";
	$i = 0;
	for ($i=0; $i<=count($fields)-2; $i++) {
		$sql .= $fields[$i]."='".$values[$i]."',";
	}
	$sql .= $fields[$i]."='".$values[$i]."' WHERE ".$criteria;
	$sql = str_replace('\'NOW()\'','NOW()', $sql);
	$sql = str_replace('\'\'','NULL',$sql);
	
  	$result = mysqli_query($db,$sql);
	if (!$result){
		$pesan_error = mysqli_error();
	} else return $result;
}
function YaTidak($value){
	if ($value=='1') {
		$hasil = 'Ya';
	} else if ($value=='0') {
		$hasil = 'Tidak';
	} else {
		$hasil = '';
	}
	return $hasil;
}
function widget($name,$param=array()){	
	global $config;
	ob_start();    
    include($config['basepath'] . 'main/sidebar/'.$name . '.php');
    $contents = ob_get_contents();
    ob_end_clean();	
	return $contents;
}
function widgetbackend($name,$param=array()){	
	global $config;
	ob_start();    	
    include($config['basepathbackend'] . 'main/sidebar/'.$name . '.php');
    $contents = ob_get_contents();
    ob_end_clean();
	return $contents;
}
function tgl_indo_angka($value){
	$thn = substr($value,0,4);
	if ($value=='') {
		return '';
	} else if (stripos($thn,'-')){
		//berarti dd-mm-yyyy
		$dd = substr($value,0,2);
		$mm = substr($value,3,2);
		$yyyy = substr($value,6,4);
							
		return  $dd.'-'.$mm.'-'.$yyyy;
	} else {
		//berarti yyyy-mm-dd
		$dd = substr($value,8,2);
		$mm = substr($value,5,2);
		$yyyy = substr($value,0,4);
							
		return  $dd.'-'.$mm.'-'.$yyyy;
	}
	
}
function tgl_mysql_angka($value){
	$thn = substr($value,0,4);
	if ($value=='') {
		return '';
	} else if (stripos($thn,'-')){
		//berarti dd-mm-yyyy
		$dd = substr($value,0,2);
		$mm = substr($value,3,2);
		$yyyy = substr($value,6,4);
							
		return  $yyyy.'-'.$mm.'-'.$dd;
	} else {
		//berarti yyyy-mm-dd
		$dd = substr($value,8,2);
		$mm = substr($value,5,2);
		$yyyy = substr($value,0,4);
							
		return  $yyyy.'-'.$mm.'-'.$dd;
	}
	
}
function hari_indo($dd) {
	$hari=intval($dd);

    switch($hari){     
        case 0 : {
                    $hari='Ahad';
                }break;
        case 1 : {
                    $hari='Senin';
                }break;
        case 2 : {
                    $hari='Selasa';
                }break;
        case 3 : {
                    $hari='Rabu';
                }break;
        case 4 : {
                    $hari='Kamis';
                }break;
        case 5 : {
                    $hari="Jum'at";
                }break;
        case 6 : {
                    $hari='Sabtu';
                }break;
        default: {
                    $hari='UnKnown';
                }break;
    }
}

function bulan_indo($mm) {
		    if (intval($mm)==1) $mmm = 'Januari';
		elseif (intval($mm)==2) $mmm = 'Februari';
		elseif (intval($mm)==3) $mmm = 'Maret';
		elseif (intval($mm)==4) $mmm = 'April';
		elseif (intval($mm)==5) $mmm = 'Mei';
		elseif (intval($mm)==6) $mmm = 'Juni';
		elseif (intval($mm)==7) $mmm = 'Juli';
		elseif (intval($mm)==8) $mmm = 'Agustus';
		elseif (intval($mm)==9) $mmm = 'September';
		elseif (intval($mm)==10) $mmm = 'Oktober';
		elseif (intval($mm)==11) $mmm = 'November';
		elseif (intval($mm)==12) $mmm = 'Desember';
		
	return $mmm;
}
function bulan_indo_short($mm) {
		    if (intval($mm)==1) $mmm = 'Jan';
		elseif (intval($mm)==2) $mmm = 'Feb';
		elseif (intval($mm)==3) $mmm = 'Mar';
		elseif (intval($mm)==4) $mmm = 'Apr';
		elseif (intval($mm)==5) $mmm = 'Mei';
		elseif (intval($mm)==6) $mmm = 'Jun';
		elseif (intval($mm)==7) $mmm = 'Jul';
		elseif (intval($mm)==8) $mmm = 'Agu';
		elseif (intval($mm)==9) $mmm = 'Sep';
		elseif (intval($mm)==10) $mmm = 'Okt';
		elseif (intval($mm)==11) $mmm = 'Nov';
		elseif (intval($mm)==12) $mmm = 'Des';
		
	return $mmm;
}
function tgl_indo($value){
	$thn = substr($value,0,4);
	if ($value=='0000-00-00') {
		return '';
	} else if (stripos($thn,'-')){
		//berarti dd-mm-yyyy
		$dd = substr($value,0,2);
		$mm = substr($value,3,2);
		$yyyy = substr($value,6,4);
					
		    if ($mm=='01') $mmm = 'Januari';
		elseif ($mm=='02') $mmm = 'Februari';
		elseif ($mm=='03') $mmm = 'Maret';
		elseif ($mm=='04') $mmm = 'April';
		elseif ($mm=='05') $mmm = 'Mei';
		elseif ($mm=='06') $mmm = 'Juni';
		elseif ($mm=='07') $mmm = 'Juli';
		elseif ($mm=='08') $mmm = 'Agustus';
		elseif ($mm=='09') $mmm = 'September';
		elseif ($mm=='10') $mmm = 'Oktober';
		elseif ($mm=='11') $mmm = 'November';
		elseif ($mm=='12') $mmm = 'Desember';
		
		return  $dd.' '.$mmm.' '.$yyyy;
	} else {
		//berarti yyyy-mm-dd
		$dd = substr($value,8,2);
		$mm = substr($value,5,2);
		$yyyy = substr($value,0,4);
					
		    if ($mm=='01') $mmm = 'Januari';
		elseif ($mm=='02') $mmm = 'Februari';
		elseif ($mm=='03') $mmm = 'Maret';
		elseif ($mm=='04') $mmm = 'April';
		elseif ($mm=='05') $mmm = 'Mei';
		elseif ($mm=='06') $mmm = 'Juni';
		elseif ($mm=='07') $mmm = 'Juli';
		elseif ($mm=='08') $mmm = 'Agustus';
		elseif ($mm=='09') $mmm = 'September';
		elseif ($mm=='10') $mmm = 'Oktober';
		elseif ($mm=='11') $mmm = 'November';
		elseif ($mm=='12') $mmm = 'Desember';
		
		return  $dd.' '.$mmm.' '.$yyyy;
	}
}

function tgl_hari_indo($value){
	
}

function islogin()
{
	if (isset($_SESSION['userid'])){
		return strlen($_SESSION['userid'])>0 && session_name()=='administratorcms';	
	} return false;
	
}
function hashPassword($password,$salt)
{
	return md5($salt.$password.'1q2a3z4e5d6c');		
}
function generate_salt(){
	return uniqid('',true);
}
function generatePassword($length = 6){
    $password = "";
	
	//karakter yg muncul, huruf yg mirip angka dihilangkan
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    $maxlength = strlen($possible);
  
    if ($length > $maxlength) {
      $length = $maxlength;
    }
	
    // counter
    $i = 0; 
    
    // tambahkan karakter selama blm mencapat panjang yg dibutuhkan
    while ($i < $length) { 
      // pilih acak
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // apakah karakter ini sudah terpilih sebelumnya?
      if (!strstr($password, $char)) { 
        // jika belum maka tambahkan
        $password .= $char;
        
        $i++;
      }
    }
    return $password;
}
function catatlog($halaman,$aktivitas){
	if (!islogin()){
		$usernya = $_SERVER['REMOTE_ADDR'];
	} else {
		$usernya = $_SESSION['userid'];
	}
	
	return mysql_query('INSERT INTO `logs` (`tgl`,`oleh`,`halaman`,`aktivitas`) VALUES (now(),`'.$usernya.'`,`'.$halaman.'`,`'.$aktivitas.'`)');
}
function q($text){
	return "'".$text."'";
}
function str($var) {
	$var = strip_tags($var);
	$var = str_replace(array("'", '"', 'concat(', '\\'),array("", '', '(',''), $var);
	return $var;
}
function s($var) {
	if ($var <> '')
	return "'".mysql_real_escape_string($var)."'";
	else return "NULL";
}
function slike($var) {
	if ($var <> '')
	return "'%".mysql_real_escape_string($var)."%'";
    //return "'".str($var)."'";
	else return "'%%'";
}
function i($var) {
	return abs(intval($var));
}
function ss($varname) {
	//grab posted variabel
	return s($_POST[$varname]);
}
function si($varname) {
	return i($_POST[$varname]);
}
function sd($varname) {
	return doubleval($_POST[$varname]);
}
function debugvar($varname){
	ob_start();
	echo '<pre>';
	print_r($varname);
	echo '</pre>';	
    $hasil = ob_get_contents();
    ob_end_clean();
	echo $hasil;
	return true;
}
function terbilang($bilangan){
 $bilangan = abs($bilangan);
 
$angka = array("","Satu","Dua","Tiga","Empat","Lima","Enam","Tujuh","Delapan","Sembilan","Sepuluh","Sebelas");
 $temp = "";
 
if($bilangan < 12){
 $temp = " ".$angka[$bilangan];
 }else if($bilangan < 20){
 $temp = terbilang($bilangan - 10)." Belas";
 }else if($bilangan < 100){
 $temp = terbilang($bilangan/10)." Puluh".terbilang($bilangan % 10);
 }else if ($bilangan < 200) {
 $temp = " Seratus".terbilang($bilangan - 100);
 }else if ($bilangan < 1000) {
 $temp = terbilang($bilangan/100). " Ratus". terbilang($bilangan % 100);
 }else if ($bilangan < 2000) {
 $temp = " Seribu". terbilang($bilangan - 1000);
 }else if ($bilangan < 1000000) {
 $temp = terbilang($bilangan/1000)." Ribu". terbilang($bilangan % 1000);
 }else if ($bilangan < 1000000000) {
 $temp = terbilang($bilangan/1000000)." Juta". terbilang($bilangan % 1000000);
 }else if ($bilangan < 1000000000000){
 $temp = terbilang($bilangan/1000000000)." Milyar". terbilang($bilangan % 1000000000);
 }
 
return $temp;
}
function Romawi($n){
$hasil = "";
$iromawi = array("","I","II","III","IV","V","VI","VII","VIII","IX","X",20=>"XX",30=>"XXX",40=>"XL",50=>"L",
60=>"LX",70=>"LXX",80=>"LXXX",90=>"XC",100=>"C",200=>"CC",300=>"CCC",400=>"CD",500=>"D",600=>"DC",700=>"DCC",
800=>"DCCC",900=>"CM",1000=>"M",2000=>"MM",3000=>"MMM");
if(array_key_exists($n,$iromawi)){
$hasil = $iromawi[$n];
}elseif($n >= 11 && $n <= 99){
$i = $n % 10;
$hasil = $iromawi[$n-$i] . Romawi($n % 10);
}elseif($n >= 101 && $n <= 999){
$i = $n % 100;
$hasil = $iromawi[$n-$i] . Romawi($n % 100);
}else{
$i = $n % 1000;
$hasil = $iromawi[$n-$i] . Romawi($n % 1000);
}
return $hasil;
}
function hari_lewat($timestamp)
{
    $diff = time() - (int)$timestamp;
    if ($diff == 0) 
         return 'baru saja';
    $intervals = array
    (
        1                   => array('Tahun',    31556926),
        $diff < 31556926    => array('Bulan',   2628000),
        $diff < 2629744     => array('Minggu',    604800),
        $diff < 604800      => array('Hari',     86400),
        $diff < 86400       => array('',    3600),
    );
	if ($diff<86400){
		$return_value = " Hari Ini";
	} else {
		$value = floor($diff/$intervals[1][1]);
		if ($value.' '.$intervals[1][0]=='1 Hari'){
			$return_value = ' Kemarin';
		} else {
			$return_value = $value.' '.$intervals[1][0].' Yang Lalu';
		}
	}
     
	return $return_value;
}
function filter_inputnya($text){
	$inputnya = $text;
	$inputnya = preg_replace("/[\']/", "`", $inputnya);
  	$inputnya = preg_replace("/[^a-zA-Z0-9 \.\-\_\`\/\:\!\@\#\$\%\^\&\*\(\)\=\+\|\{\}\?\<\>\~\;\,\(\)\r]/", "", $inputnya);
	return $inputnya;

}

function f($text){
	$inputnya = $text;
	$inputnya = preg_replace("/[\']/", "`", $inputnya);
  	$inputnya = preg_replace("/[^a-zA-Z0-9 \.\-\_\`\/\:\!\@\#\$\%\^\&\*\(\)\=\+\|\{\}\?\<\>\~\;\,\(\)\r]/", "", $inputnya);
	return $inputnya;
}

function waktu_lewat($timestamp)
{
    $diff = time() - (int)$timestamp;
    if ($diff == 0) 
         return 'baru saja';
    $intervals = array
    (
        1                   => array('tahun',    31556926),
        $diff < 31556926    => array('bulan',   2628000),
        $diff < 2629744     => array('minggu',    604800),
        $diff < 604800      => array('hari',     86400),
        $diff < 86400       => array('jam',    3600),
        $diff < 3600        => array('menit',  60),
        $diff < 60          => array('detik',  1)
    );
     $value = floor($diff/$intervals[1][1]);
     return $value.' '.$intervals[1][0].($value > 1 ? '' : '').' yang lalu';
}
function get($var){
	return f($_GET[$var]);
}
function post($var){
	return f($_POST[$var]);
}

function file_size($url){
    $size = filesize($url);
    if($size >= 1073741824){
        $fileSize = round($size/1024/1024/1024) . ' GB';
    }elseif($size >= 1048576){
        $fileSize = round($size/1024/1024) . ' MB';
    }elseif($size >= 1024){
        $fileSize = round($size/1024) . ' KB';
    }else{
        $fileSize = $size . ' bytes';
    }
    return $fileSize;
}

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
      if ($ip=='::1'){
	  	$ip = 'localhost';
	  }
    }
    return $ip;
}

function cek_hak_akses_backend($module,$action,$redirect=true){
	global $config,$blokir;
	
	//secara default semua module dan page dapat diakses semua oleh user backend
	$blokir = false;
	//if ($blokir==false){
	//	echo 'false';
	//}
	$sql = ' select * from hak_akses where module='.q($module).' and (id_role='.q($_SESSION['id_role']).
		   ' or id_user='.q($_SESSION['id_user']).') and allow_deny="DENY"';
		   
	//echo $sql;
	$db_hak_akses_deny = doquery($sql);
	
	//debugvar($db_hak_akses_deny);

	//jika ada module yang di ALLOW utk role tertentu maka beri flag jangan blokir
	if (count($db_hak_akses_deny)>0 && $_SESSION['allow_backend']== 'Y'){
		//redirect($config['baseurl'].'index.php?go=restricted','');
		//redirect($config['baseurl'].'backend/index.php?go=restricted','');
		$blokir = true;
	} 
	
	//if ($blokir==false){
	//	echo 'false';
	//} else if ($blokir==true){
	//	echo 'true';
	//}
	
	//echo 'xxx'.$blokir;
	if ($action == '')
		$actstr = '';
	else $actstr = ' or action='.q($actstr);
	
	$sql = 'select * from hak_akses where module='.q($module).' and (id_role='.q($_SESSION['id_role']).
			' or id_user='.q($_SESSION['id_user']).') and allow_deny="ALLOW" and (action="*"'.$actstr.')';
	//echo $sql;
	$db_hak_akses_allow = doquery($sql);
	//debugvar($db_hak_akses_allow);
	//debugvar($_SESSION);
	//die();
	//echo '...'.$blokir.'ooo';
	if (count($db_hak_akses_allow)>0 && $_SESSION['allow_backend']== 'Y'){
		//echo 'gagal';
		$blokir = false;
		//return true;
	} 
	//echo '...'.$blokir.'ooo';
	//else {
		if ($blokir) {
			redirect($config['baseurl'].'backend/index.php?go=restricted','');
			//redirect($config['baseurl'].'index.php','Hak akses anda tidak mencukupi untuk membuka halaman yang anda tuju.');	
		} 
		//else return false;
		
	//}
	
}

function limit_description($string, $limit, $break=".", $ujungnya="...")
{
  //return tanpa perubahan jika lebih pendek
  if(strlen($string) <= $limit) return $string;

  // cek apakah $break ada antara $limit dan karakter terakhir
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $ujungnya;
    }
  }

  return $string;
}

function cekAda($array,$field,$value){
    $hasil = false;
    foreach($array as $row){
            if ($row[$field]==$value){
                    $hasil = true;
            }
    }
    return $hasil;
}

function getClassSorting($field_name,$header_class=array()){
    global $arrSort;
    if (array_key_exists($field_name, $arrSort)) {
        if ($arrSort[$field_name]=='asc') {
            $class = 'sort_order-asc';
        } else if ($arrSort[$field_name]=='desc') {
            $class = 'sort_order-desc';
        } else {
            $class = 'sort_order';
        }
    } else {
        $class =  'sort_order';
    }
    $hasil = trim($class.' '.$header_class[$field_name]);
    return $hasil;
}    
    
function getClassSortingIcon($field_name){
    global $arrSort;
    if (array_key_exists($field_name, $arrSort)) {
        
        return $arrSort[$field_name];
        
    } else {
        return 'normal';
    }
}    
setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $replace=array(), $delimiter='-') {
	if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
}
?>