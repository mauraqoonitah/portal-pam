<?php echo "<?php\n"; ?>


global $module, $moduledb,$moduledb_file, $sort_order;
$module 	= '<?php echo $namamodule;?>';
$moduledb 	= '<?php echo $namatable;?>';

$config['judul']    = '<?php echo $judulmodule;?>';



$do 	= get('do');
$tipe 	= get('tipe');

switch($do){
	case 'list':
		global $sort_order;
		include_once($module.'/list.php');
		break;
	case 'list_jx':
		global $sort_order;
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
	default:
		include_once($module.'/list.php');
}	

function tambah(){
	global $module, $moduledb, $config;
		
		//cek apakah di post
		if (sizeof($_POST)>0){
		
			//lakukan simpan ke table
			$simpanPOST = $_POST;
			
			//cek format 
			<?php
			$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
			$dataschema = doquery($sql);
			
			foreach($dataschema as $schema){
				if ($schema['data_type']=='date'){
	  echo "\$input['".$schema['COLUMN_NAME']."'] = tgl_mysql_angka(\$input['".$schema['COLUMN_NAME']."']);\n";		
				}
			}
			
			?>
			$result = doinsert($moduledb,$simpanPOST);
			
			if ($result) {
                
				redirect('index.php?go='.$module,'Data telah tersimpan');
                
			} else {
		
			}
		}
		
		include_once($module.'/create.php');
}	

function ubah(){
	global $module, $moduledb, $config;
		//cek apakah di post
		if (count($_POST)>0){
			$id = $_GET['id'];

            $simpanPOST = $_POST;
            <?php
			$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
			$dataschema = doquery($sql);
			
			foreach($dataschema as $schema){
				if ($schema['data_type']=='date'){
	  echo "\$input['".$schema['COLUMN_NAME']."'] = tgl_mysql_angka(\$input['".$schema['COLUMN_NAME']."']);\n";		
				}
			}
			
			?>
            $result = doupdatedebug($moduledb,$simpanPOST,"id='".$id."'");
			
			if ($result) {
				//cek profile
				redirect('index.php?go='.$module,'Data telah tersimpan','sukses');
			} else {

			}
		}
			
	include_once($module.'/edit.php');
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

function detail(){
	global $module, $moduledb, $config;
	include_once($module.'/detail.php');
}
<?php echo "?>\n"; ?>