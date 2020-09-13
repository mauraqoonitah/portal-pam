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
	global $module, $moduledb, $config, $mode_edit;
		
		//cek apakah di post
		if (sizeof($_POST)>0){
		
			//lakukan simpan ke table
			$simpanPOST = $_POST;
			$save_ordering = false;
                        
			//cek format 
			<?php
			$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
			$dataschema = doquery($sql);
			
			foreach($dataschema as $schema){
                            if ($schema['COLUMN_NAME']=='created_by') {
                                echo "\n\$simpanPOST['".$schema['COLUMN_NAME']."'] = \$_SESSION['username'];\n";
                            } else if ($schema['COLUMN_NAME']=='created_date') {
                                echo "\$simpanPOST['".$schema['COLUMN_NAME']."'] = 'NOW()';\n";
                            } else if ($schema['data_type']=='date'){
                                echo "\$simpanPOST['".$schema['COLUMN_NAME']."'] = tgl_mysql_angka(post('".$schema['COLUMN_NAME']."'));\n";		
                            } else if ($schema['COLUMN_NAME']=='ordering') {
                                echo "\n\$save_ordering = true;";
                            }
			}
			
			?>
			$result = doinsert($moduledb,$simpanPOST);
			
			if ($result) {

                            if ($simpanPOST['ordering']=='' && $save_ordering){

                                //get id yg baru saja diinsert
                                $lastid = dogetlastid();

                                //update orderingnya
                                $fields = array('ordering'=>$lastid);
                                $result = doupdate($moduledb,$fields,'id='.$lastid);				
                            }

                            redirect('index.php?go='.$module,'Data telah tersimpan');

			} else {
                            $_SESSION['temp_form'] = $_POST;
                            $_SESSION['pesan']      = '<strong>Terjadi Error!</strong> Gagal menyimpan';
                            $_SESSION['pesan_mode'] = 'warning';
			}
		}
		
		include_once($module.'/create.php');
}	

function ubah(){
	global $module, $moduledb, $config, $mode_edit;
		//cek apakah di post
		if (count($_POST)>0){
			$id = $_GET['id'];

            $simpanPOST = $_POST;
            <?php
			$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
			$dataschema = doquery($sql);
			
			foreach($dataschema as $schema){
                            if ($schema['COLUMN_NAME']=='modified_by') {
                                echo "\$simpanPOST['".$schema['COLUMN_NAME']."'] = \$_SESSION['username'];\n";
                            } else if ($schema['COLUMN_NAME']=='modified_date') {
                                echo "\$simpanPOST['".$schema['COLUMN_NAME']."'] = 'NOW()';\n";
                            } else if ($schema['data_type']=='date'){
	  echo "\$simpanPOST['".$schema['COLUMN_NAME']."'] = tgl_mysql_angka(post('".$schema['COLUMN_NAME']."'));\n";		
				}
			}
			
			?>
            $result = doupdate($moduledb,$simpanPOST,"id='".$id."'");
			
			if ($result) {
				//cek profile
				redirect('index.php?go='.$module,'Data telah tersimpan','sukses');
			} else {
							$_SESSION['temp_form'] = $_POST;
                            $_SESSION['pesan']      = '<strong>Terjadi Error!</strong> Gagal menyimpan';
                            $_SESSION['pesan_mode'] = 'warning';
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

<?php echo "?>\n"; ?>