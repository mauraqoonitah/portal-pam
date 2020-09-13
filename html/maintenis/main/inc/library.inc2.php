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
$ext_default = array('PDF','JPG');
$gender = array('male'=>'PRIA','female'=>'WANITA');


function openpage($name,$param=''){
	global $content, $config, $module, $pesan, $pesan_mode, $jsHead, $cssHead, $judul;
	if (isset($_SESSION['pesan'])){
		$pesan = $_SESSION['pesan'];		
		$pesan_mode = $_SESSION['pesan_mode'];		
		unset($_SESSION['pesan']);	
		unset($_SESSION['pesan_mode']);	
	}
	$content = getcontent($name,$param);
	$sidebar = getsidebar();
	$config['meta']	= '<meta property="og:image" content="'.$config['meta_image'].'" />
        <meta property="og:title" content="'.$config['meta_title'].'" />
        <meta property="og:site_name" content="'.$config['webname'].'" />
        <meta property="og:type" content="article" />
	<meta property="og:url" content="'.$config['url'].'" />
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
	} else if ($config['dbms']=='mysql'){
		$hasil_query = mysql_query($sqlnya); 
		
		if ($hasil_query){
			$result = array();
			while ($row = mysql_fetch_assoc($hasil_query)){
				$result[] = $row;
				$recordcount++;
			}					
		} else {
			echo 'Gagal query '.mysql_error();
 		}
	}
		
	return $result;
}
function doexec($sqlnya){
	global $db, $config;
	$hasil_query = mysql_query($sqlnya);
	return $hasil_query ;
}

function doGetTable($table,$field='*',$criteria='',$order=''){
	global $db, $config;
	
	if ($criteria==''){
		$strwhere = '';	
	} else {
		$strwhere = ' where '.$criteria;
	}
	
	if ($order==''){
		$strorder = '';
	} else {
		$strorder = ' order by '.$order;
	}
	
	$sql  = 'select ' . $field . ' from ' . $table . $strwhere . $strorder;

	$hasil_query = mysql_query($sql);
		
	if ($hasil_query){
		$result = array();
		while ($row = mysql_fetch_assoc($hasil_query)){
			$result[] = $row;
			$recordcount++;
		}					
	} else {
		echo 'Gagal query '.mysql_error();
	}
	
	return $result;
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
    
	$hasil_query = mysql_query($sql);
    //if (!$hasil_query) {
        //echo $sql;
        //die();
//}
	$row = mysql_fetch_assoc($hasil_query);
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
	$sql = 'select * from '.$table.' where '.$fieldid.'="'.$id.'"';
	$hasil_query = mysql_query($sql);
	if ($hasil_query){
		$row = mysql_fetch_assoc($hasil_query);
		return $row;	
	} else {
		return false;
	}
	
}
function doGetDataValueById($table,$fieldid='id',$field_get,$id){
	$sql = 'select '.$field_get.' from '.$table.' where '.$fieldid.'="'.$id.'"';
	$hasil_query = mysql_query($sql);
	if ($hasil_query){
		$row = mysql_fetch_assoc($hasil_query);
		return $row[$field_get];	
	} else {
		return false;
	}	
}

function doGetLastId(){
	return mysql_insert_id();
}
function doinsert($table, $inserts) {
	global $db, $config, $pesan_error;;
	$values = array_map('stripslashes',array_values($inserts));
	$values = array_map('mysql_real_escape_string', $values);
    //$values = array_map('mysql_real_escape_string', array_values($inserts));
    $keys = array_keys($inserts);
    $sql = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
	$sql = str_replace('\'NOW()\'','NOW()', $sql);
	$sql = str_replace('\'\'','NULL',$sql);
	$sql = str_replace('\"\"','NULL',$sql);
    $result = mysql_query($sql);
    if (!$result){
		$pesan_error = mysql_error();
	} else return $result;
}
function doinsertdebug($table, $inserts) {
	global $db, $config;
	$values = array_map('stripslashes',array_values($inserts));
	$values = array_map('mysql_real_escape_string', $values);
    //$values = array_map('mysql_real_escape_string', array_values($inserts));
    $keys = array_keys($inserts);
    $sql = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
	$sql = str_replace('\'NOW()\'','NOW()', $sql);
	$sql = str_replace('\'\'','NULL',$sql);
	$sql = str_replace('\"\"','NULL',$sql);
    $result = mysql_query($sql);
	if (!$result){
		$pesan_error = mysql_error();
		die($sql.'<br/>'.mysql_error());
	} else return $result;
}
function dodelete($table, $id){
	global $pesan_error;
	$result=FALSE;
	$sql='DELETE FROM `'.$table.'` WHERE id='.$id;
	if (strlen($id)>0){
		$result = mysql_query($sql);
	}
	
	if (!$result){
		$pesan_error = mysql_error();
	} else return $result;
}
function dodeletedebug($table, $id){
	$result=FALSE;
	$sql='DELETE FROM `'.$table.'` WHERE id='.$id;
	if (strlen($id)>0){
	$result = mysql_query($sql);
		die($sql.mysql_error());
	} else return $result;
}
function doupdate($table, $updates, $criteria) {
	global $pesan_error;
	$values = array_map('stripslashes',array_values($updates));
	$values = array_map('mysql_real_escape_string', $values);
	//$values = array_map('mysql_real_escape_string', array_values($updates));
	
	$fields = array_keys($updates);
	
	$sql = "UPDATE ".$table." SET ";
	$i = 0;
	for ($i=0; $i<=count($fields)-2; $i++) {
		$sql .= $fields[$i]."='".$values[$i]."',";
	}
	$sql .= $fields[$i]."='".$values[$i]."' WHERE ".$criteria;
	$sql = str_replace('\'NOW()\'','NOW()', $sql);
	$sql = str_replace('\'\'','NULL',$sql);
	
  	$result = mysql_query($sql);
	if (!$result){
		$pesan_error = mysql_error();
	} else return $result;
}
function doupdatedebug($table, $updates, $criteria) {
	$values = array_map('stripslashes',array_values($updates));
	$values = array_map('mysql_real_escape_string', $values);
	$fields = array_keys($updates);
	//debugvar($updates);
	$sql = "UPDATE ".$table." SET ";
	$i = 0;
	for ($i=0; $i<=count($fields)-2; $i++) {
		$sql .= $fields[$i]."='".$values[$i]."',";
	}
	$sql .= $fields[$i]."='".$values[$i]."' WHERE ".$criteria;
	$sql = str_replace('\'NOW()\'','NOW()', $sql);
	$sql = str_replace('\'\'','NULL',$sql);
	//echo $sql;
    $result = mysql_query($sql);
	if (!$result){
		die('__'.$sql.'__'.mysql_error());
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
    include($config['basepath'] . 'main/sidebar/'.$name . '.php');
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
                    $hari='Minggu';
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
    } return $hari;
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
		return strlen($_SESSION['userid'])>0 && session_name()=='frontendcms';	
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
			redirect($config['baseurl'].'index.php?go=restricted','');
			//redirect($config['baseurl'].'index.php','Hak akses anda tidak mencukupi untuk membuka halaman yang anda tuju.');	
		} 
		//else return false;
		
	//}
	
}

function cek_hak_akses($module,$action,$redirect=true){
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
			redirect($config['baseurl'].'index.php?go=restricted','');
			//redirect($config['baseurl'].'index.php','Hak akses anda tidak mencukupi untuk membuka halaman yang anda tuju.');	
		} 
		//else return false;
		
	//}
	
}

function menuAktif($namamodule){
	
	if (get('go')==$namamodule){
		return 'menu-active';
	}
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

function getValue($array,$field_cari,$value_cari,$field_return){
	$hasil = false;
	foreach($array as $row){
		if ($row[$field_cari]==$value_cari){
			$hasil = $row[$field_return];
		}
	}
	return $hasil;
}

function doqueryrow($sqlnya){
	$query = mysql_query($sqlnya);
	$row = mysql_num_rows($query);
	return $row;
}

function simpan_file($post,$nama_folder_attachment,$nama_field,$newnamafile='',$arrAllowedExt=array('PDF','JPG')){
	global $config;
    
    $arrReturn = array();
    
    $deletefile = false;
    if (isset($post[$nama_field]) && !isset($post['upload_temp_'.$nama_field])) {
        if (post($nama_field)=='' && isset($post['hapus_file_diattachment_'.$nama_field])) {
            $deletefile=true;
            $namafilehapus = $config['basepath'] . 'attachment/' .$post['hapus_file_diattachment_'.$nama_field];
            //echo $namafilehapus;
            @unlink($namafilehapus);
            $arrReturn['status'] 		= true;
            $arrReturn['pesan'] 		= '';
            $arrReturn['nama_file'] 	= '';
            $arrReturn['path_file'] 	= '';
            $arrReturn['relative_file'] = '';
            //debugvar($arrReturn);
        }
    }    
    
	if (isset($post['upload_temp_'.$nama_field])){
		if (isset($_POST['hapus_file_diattachment'])){
			$file_dihapus = trim(str_replace('/','\\',$config['basepath'] . 'attachment/'.$_POST['hapus_file_diattachment']));
			@unlink($file_dihapus);
		}
		
		$oldfile = trim($config['basepath'].'temp/'.$_POST['upload_temp_'.$nama_field]);
		//echo $oldfile;
		//cek apakah mengisi nama folder, untuk menjaga double tanda /
		//echo $nama_folder_attachment.'<br/>';
		if (strlen($nama_folder_attachment)>0){
			
			$folder_attachment = $nama_folder_attachment.'/';
			$newpath = $config['basepath'].'attachment/'.$folder_attachment;
		}else {
			$newpath = $config['basepath'].'attachment/';
			$folder_attachment = '';
		}
        //echo $newpath;
		make_path($newpath);
		
		//cek apakah controller mengisi namafile dengan ext atau tdk
		$extnew = strtoupper(end(explode('.',$newnamafile)));
		if (strlen($extnew)!=3){
			$extnew='';
		}
		
		//get extension file yg diupload
		$extold = strtoupper(trim(end(explode('.', $oldfile))));
		
		//jika controller mengisi nama file tujuan dgn ext maka nama file juga pakai ext tsb
		//jika tdk maka pakai ext dr file yg diupload
		//echo $extnew;
		if (strlen($extnew)>0){			
			$newfile 		= $newpath . $newnamafile;
			$namafilelink 	= $config['baseurl'] . $folder_attachment . $newnamafile;
			$relative_file	= $folder_attachment . $newnamafile;
			$name 			= basename($newfile);
		} else {			
			$newfile		= $newpath . $newnamafile . '.' . $extold;
			//echo $newpath.'<br/>';
			$namafilelink 	= $config['baseurl'] . $folder_attachment . $newnamafile . '.' . $extold;
			$relative_file 	= $folder_attachment . $newnamafile . '.' . $extold;
			$name 			= basename($newfile);
		}
		
		$relative_file = trim(str_replace('//','/',$relative_file));
		$namafilelink = trim(str_replace('//','/',$namafilelink));
		//echo $newfile;
		//$newfile = $config['basepath'].'attachment/'.$_POST['upload_temp_'.$nama_field];
		//$oldfile = trim(str_replace('/','\\',$oldfile));
		//$ext = end(explode('.', $newfile));
		$berhasil_upload = false;
		
  //{
  //echo "Match found";
  //}
//else
  //{
  //echo "Match not found";
  //}
  		//$allowed = array_search(trim($extold),$arrAllowedExt);
		if (in_array($extold, $arrAllowedExt)){

			//file boleh diupload
			//pindahkan ke folder seharusnya			
			$newfile = trim(str_replace('//','/',$newfile));
			
            //echo $newfile;
            //AKTIFKAN BARIS DI BAWAH UTK WINDOWS
            if ($config['OS']=='WIN') {
                $newfile = trim(str_replace('/','\\',$newfile));
                $oldfile = trim(str_replace('/','\\',$oldfile));
            } else {
                //echo 'set file attr';
                chmod($oldfile,0777);
            }
			//$oldfile = trim($oldfile);
			
			//echo '<br/>'.$_SERVER['DOCUMENT_ROOT'];
			//echo '<br/>'.$oldfile;
			//echo '<br/>'.$newfile;
            //if (!file_exists($oldfile)){
            //    echo '<br/>file tidak ada '.$oldfile;
            //} else echo '<br/>file old ada '.$oldfile;
			$hasilcopy = copy($oldfile,$newfile);
			//$hasilcopy = salin($oldfile,$newfile);
            //if(!$hasilcopy) {
            //    echo '<br/>'.'Gagal copy';
            //    $errors= error_get_last();
            //    echo "COPY ERROR: ".$errors['type'];
            //    echo "<br />\n".$errors['message'];
            //}
            //$filelama = '/var/www/temp/SURAT.pdf';
            //if ($oldfile==$filelama) {
            //    echo '<br/>filenya sama aja<br/>';
            //} else echo '<br/>file tidak sama '.$oldfile.'vs'.$filelama;
            
			if (file_exists($newfile)){
                //echo '<br/>file baru ada';
				$berhasil_upload = true;
				unlink($oldfile);
			} else {
				$berhasil_upload = false;
			}
			//return $arrReturn;
			//$input['attachment']	= $_POST['upload_temp_'.$nama_field];
		} else {
			//file tidak diijinkan utk diupload
			//langsung hapus
			$berhasil_upload = false;
			@unlink($oldfile);
		}
		
		if ($berhasil_upload){
            $arrReturn['status'] 		= true;
			$arrReturn['pesan'] 		= 'Berhasil upload file';
			$arrReturn['nama_file'] 	= $name;
			$arrReturn['path_file'] 	= $namafilelink;
			$arrReturn['relative_file'] = $relative_file;			
		} else {
			$arrReturn['status']        = false;
            $arrReturn['pesan']         = 'Gagal upload file, tidak dapat menyimpan file';
            $arrReturn['nama_file'] 	= '';
			$arrReturn['path_file'] 	= '';
            $arrReturn['relative_file'] = '';	
		}		
	}
    //debugvar($arrReturn);
    //die();
    return $arrReturn;	
}

function salin($oldfile,$newfile){
    //$source = 'myfile.doc';
    //$destination = 'clonefile.doc';

    $data = file_get_contents($oldfile);

    $handle = fopen($newfile, "w");
    fwrite($handle, $data);
    fclose($handle);
    return file_exists($newfile);
}

function save_file_pdf($arr_FILES,$nama_folder_attachment,$nama_field){
	global $config;
	foreach ($arr_FILES["error"] as $key => $error) {

	    if ($error == UPLOAD_ERR_OK) {
	        $name = $arr_FILES["name"][$key];		
			
			$name_no_ext = substr($name, 0,strrpos($name,'.')); 
			
			$ext = end(explode('.', $name));
			$arrReturn = array();
			
			if (strtoupper($ext)=='PDF'){
				
				$nama_folder = $config['basepath'] . 'attachment/'.$nama_folder_attachment;
				if (!file_exists($nama_folder)) {
			   mkdir($nama_folder, 0777, true);
				}
				echo $nama_folder;
				$namafilelink =   $config['baseurl'] . $nama_folder_attachment.'/' . $name;
				$namafile =   $nama_folder.'/' . $name;
				 
				if (move_uploaded_file( $arr_FILES["tmp_name"][$key], $namafile)){			
					$arrReturn['pesan'] = 'Berhasil upload file';
					$arrReturn['status'] = true;
					$arrReturn['nama_file'] = $name;
					$arrReturn['path_file'] = $namafilelink;
					$arrReturn['relative_file'] = $nama_folder_attachment.'/' . $name;
					return $arrReturn;
				} else {
					$arrReturn['pesan'] = 'Gagal upload file, tidak dapat menyimpan file';
					$arrReturn['status'] = false;
					return $arrReturn;	
				}
			} else {
				$arrReturn['pesan'] = 'Gagal upload karena file bukan PDF';
				$arrReturn['status'] = false;
				return $arrReturn;
			}
			
			//$namafilelink = $config['baseurl']
			
	    }
	}
}

function make_path($pathname, $is_filename=false){
  if($is_filename){
      $pathname = substr($pathname, 0, strrpos($pathname, '/'));
  }

    // Check if directory already exists
    if (is_dir($pathname) || empty($pathname)) {
        return true;
    }

    // Ensure a file does not already exist with the same name
    $pathname = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $pathname);
    if (is_file($pathname)) {
        trigger_error('mkdirr() File exists', E_USER_WARNING);
        return false;
    }
    
    // Crawl up the directory tree
    $next_pathname = substr($pathname, 0, strrpos($pathname, DIRECTORY_SEPARATOR));
    if (make_path($next_pathname, $mode)) {
        if (!file_exists($pathname)) {
            $hasilcreate = mkdir($pathname, $mode);
            chmod($pathname,0777);
            return $hasilcreate;
        }
    }
    return false;
}

function parse_Where_DCT_DPRD($id_anggota){
    
    $f_kdprop       = substr($id_anggota, 0,2);
    $f_kdkab        = substr($id_anggota, 2,2);
    $f_kddpkab      = substr($id_anggota, 4,2);
    $f_kdpartai     = substr($id_anggota, 6,2);
    $f_kdanggota    = substr($id_anggota, 8,2);
    
    $return_id_calon = 'f_kdprop='.q($f_kdprop).' and f_kdkab='.q($f_kdkab).' and f_kddpkab='.q($f_kddpkab).' and f_kdpartai='.q($f_kdpartai).' and f_kdcalon='.q($f_kdanggota);
    $return_id_anggota = 'f_kdprop='.q($f_kdprop).' and f_kdkab='.q($f_kdkab).' and f_kddpkab='.q($f_kddpkab).' and f_kdpartai='.q($f_kdpartai).' and f_kdanggota='.q($f_kdanggota);
    
    $arrReturn = array();
    $arrReturn['anggota']   = $return_id_anggota;
    $arrReturn['calon']     = $return_id_calon;
    return $arrReturn;
}

function strip_dot($value){
        $ret  = str_replace('.', '', $value);
    return $ret;
}

function getWhereSession(){
    if ($_SESSION['role']=='KPU Kabupaten/Kota') {
            $strWhere = ' and f_kdprop_wil="'.$_SESSION['kdprop'].'" and f_kdkab_wil="'.$_SESSION['kdkab'].'" ';
        } else if ($_SESSION['role']=='KPU Provinsi') {
            $strWhere = ' and f_kdprop_wil="'.$_SESSION['kdprop'].'"';
        } else if ($_SESSION['role']=='KPU Pusat') {
            $strWhere = ' and f_kdprop_wil="" and f_kdkab_wil="" ';
        } else if ($_SESSION['role']=='ADMINISTRATOR') {
            $strWhere = '';
        }
    return $strWhere;
}

function getWhereSessionNoWil(){
    if ($_SESSION['role']=='KPU Kabupaten/Kota') {
            $strWhere = ' and f_kdprop="'.$_SESSION['kdprop'].'" and f_kdkab="'.$_SESSION['kdkab'].'" ';
        } else if ($_SESSION['role']=='KPU Provinsi') {
            $strWhere = ' and f_kdprop="'.$_SESSION['kdprop'].'" and f_kdkab="" ';
        } else if ($_SESSION['role']=='KPU Pusat') {
            $strWhere = ' and f_kdprop="" and f_kdkab="" ';
        } else if ($_SESSION['role']=='ADMINISTRATOR') {
            $strWhere = '';
        }
    return $strWhere;
}

function getWhereSessionPropNoWil(){
    if ($_SESSION['role']=='KPU Kabupaten/Kota') {
            $strWhere = ' and f_kdprop="'.$_SESSION['kdprop'].'" ';
        } else if ($_SESSION['role']=='KPU Provinsi') {
            $strWhere = ' and f_kdprop="'.$_SESSION['kdprop'].'" ';
        } else if ($_SESSION['role']=='KPU Pusat') {
            $strWhere = ' and f_kdprop="" and f_kdkab="" ';
        } else if ($_SESSION['role']=='ADMINISTRATOR') {
            $strWhere = '';
        }
    return $strWhere;
}

function limit_description($string, $limit, $break=" ", $ujungnya="...")
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

function get_url_kategori($current_lft,$current_rgt){
    $sql_breadcrumb = "select * from ec_category where lft <= ".$current_lft." and rgt>=".$current_rgt." and `level`>0 order by `level` asc";
    $db_breadcrumb  = doquery($sql_breadcrumb);

    $url_kategori = '';
    foreach($db_breadcrumb as $row_breadcrumb){
        $url_kategori .= $row_breadcrumb['nama_category_alias'].'/';    
    }
    
    return $url_kategori;
}

function get_breadcrumb($current_lft,$current_rgt,$detail=false){
    global $config;
    $sql_breadcrumb = "select * from ec_category where lft <= ".$current_lft." and rgt>=".$current_rgt." and `level`>0 order by `level` asc";
    $db_breadcrumb  = doquery($sql_breadcrumb);
    ob_start();
    
    ?>
    <ul class="breadcrumb"> 
            <li><a href="<?php echo $config['baseurl'];?>">Home</a></li>
            <?php 
            $url_kategori = '';
            foreach($db_breadcrumb as $row_breadcrumb){
                $url_kategori .= $row_breadcrumb['nama_category_alias'].'/';
                if ($row_breadcrumb['level']==count($db_breadcrumb)) {
                    //tampilkan current kategori
            ?>
                    <li class="active">
					<?php if($detail=true){?>
                        <a href="<?php echo $config['baseurl'];?>kategori/<?php echo $url_kategori; ?>"><?php echo $row_breadcrumb['nama_category']; ?></a>
					<?php
						  } else{ 
							echo $row_breadcrumb['nama_category']; 
						  } 
					?>
                    </li>
            <?php
                } else {
            ?>            
                    <li><a href="<?php echo $config['baseurl'];?>kategori/<?php echo $url_kategori; ?>"><?php echo $row_breadcrumb['nama_category']; ?></a></li>
            <?php } ?>  
            <?php } ?>  
            
            
        </ul>
        <?php
        $template = ob_get_contents();
    	ob_end_clean();
        return $template;
}

function interval_date($str_date){
     $now = time(); // or your date as well
     $tgl = strtotime($str_date);
     $datediff = abs($now - $tgl);
     return floor($datediff/(60*60*24));
}

function getVendor($url){
    $sql = 'select * from ec_vendor where nama_vendor_url='.q($url);
    //echo $sql;
    $data_vendor = doquery($sql);
    //debugvar($data_vendor);
    $row_vendor = $data_vendor[0];
    //debugvar($row_vendor);
    return $row_vendor;
}

function getVendorID($id){
    $sql = 'select * from ec_vendor where id='.q($id);
    //echo $sql;
    $data_vendor = doquery($sql);
    //debugvar($data_vendor);
    $row_vendor = $data_vendor[0];
    //debugvar($row_vendor);
    return $row_vendor;
}

?>