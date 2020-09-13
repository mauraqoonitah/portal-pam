<?php echo "<?php\n"; ?>
global $arrSort, $default_sort;

$arrSort            = array();
$default_sort       = array('t.id'=>'asc');
$table_name         = '<?php echo $namatable; ?>';
$config['theme']    = '';
$keyword            = post('keyword');
$sort               = $_POST['sort'];

if ($sort==''){
    $arrSort = $default_sort;

} else {    
    $arrSort = json_decode($sort, true);
    if (count($arrSort)==0) {
        $arrSort = $default_sort;
    }

    $arrNewSort = array();
    
    foreach ($arrSort as $name=>$order){
        $arrNewSort[] = $name.' '.$order; 
    }
    
    $order_by = ' order by '.implode(',', $arrNewSort);        
	
}

//HANDLING PAGING
$per_page = post('per_page');

if ($per_page=='' && $_SESSION['per_page']==''){
	//echo 'kosong keduanya';
	$per_page=10;
	$_SESSION['per_page'] = $per_page;
} else if ($per_page=='' && strlen($_SESSION['per_page'])>0){
	$per_page=$_SESSION['per_page'];
} else {
	$_SESSION['per_page'] = $per_page;
}

$page = post('page');

if ($page=='' || (int)$page < 1){
	$page=1;
}


//HANDLING SEARCHING ALL FIELD
$arrKeyword = explode(' ',$keyword);

if (strlen($keyword)>0){
	$dbfieldnya = doquery('show columns from `'.$table_name.'`');
	$arrWhere = array();
	foreach($dbfieldnya as $rowfield){
		$arrKeywordAnd = array();
		foreach($arrKeyword as $rowKeyword){
			$arrKeywordAnd[] = 't.'.$rowfield['Field'].' like "%'.$rowKeyword.'%"';
			
		}
		//debugvar($arrKeywordAnd);
		$strKeywordAnd = implode(' and ',$arrKeywordAnd);
		$arrWhere[] = '('.$strKeywordAnd.')';
	}
}	
	//cari field pada table lain
	//foreach($arrKeyword as $rowKeyword){
	//	$arrWhere[] = 'r.nama_role like "%'.$rowKeyword.'%"';
	//}
	
	if (count($arrWhere)>0){
		$where      = ' where ';
        $strWhere   = '('.implode(' or ',$arrWhere).')';
	} else {
		$where      = '';
        $strWhere   = '';
	}
	
	$sql_from = '	from `'.$table_name.'` t 
					
				' . $where.' '.
				    $strWhere.' '.
				    $order_by;
	
	$sql_count = 'select count(*) as banyak '.$sql_from;
	
	$dbcount = doquery($sql_count);
	$banyak = $dbcount[0]['banyak'];
	$jumlah_page = ceil($banyak / $per_page);
	if ($page>$jumlah_page){
		$page = $jumlah_page;
	}	

    $startRow = ($page - 1) * $per_page;
	$limit = $startRow.','.$per_page;

	//untuk menampilkan field apa saja pada grid	
	$field_select   = ' * ';
	
    //SQL FINAL
    $sql            = ' select '.$field_select.' '.$sql_from . ' limit '.$limit;

	//echo $sql;
	
	if ($banyak>0){
		$data = doquery($sql);	
	}
	//debugvar($data);

	//menentukan angka page
	$arrPage = array();
	if ($page < 3){
		if ($jumlah_page>5){
			$max_page = 5;
		} else {
			$max_page = $jumlah_page;
		}
		for ($i=1;$i<=$max_page;$i++){
			$arrPage[] = $i;
		}
	} else if ($page > ($jumlah_page-2)){
		if ($jumlah_page-4<1){
			$start_page = 1;
		} else {
			$start_page = $jumlah_page-4;
		}
		for ($i=$start_page;$i<=$jumlah_page;$i++){
			$arrPage[] = $i;
		}
	} else {
		for ($i=$page-2;$i<$page;$i++){
			$arrPage[] = $i;
		}
		for ($i=$page;$i<$page+3;$i++){
			$arrPage[] = $i;
		}
	}

//nama field table isikan 
<?php
	$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
	$dataschema = doquery($sql);
 ?>
$header_table = array(  
		<?php 
		$hit = 0;
		$field_exclude = array('id','ordering','published');
		foreach($dataschema as $schema){
			$hit++;
			$komennya 			= $schema['COLUMN_COMMENT'];
			$komennya_stripped 	= str_replace('combobox=','',$komennya);
			$combobox 			= false;
			
			$array_replace = array("_", "id");
			if (!in_array($schema['COLUMN_NAME'],$field_exclude)){	
				if($hit>2){
	    ?>
                        '<?php echo $schema['COLUMN_NAME']; ?>'    => '<?php echo ucwords(str_replace($array_replace,' ',$schema['COLUMN_NAME'])); ?>',
        
		<?php
				}
			}
		}
        ?>                
		); 

//nama field yang akan dihidden
$header_class = array(  
	<?php 
		$hit = 0;
		$field_exclude = array('id','ordering','published');
		foreach($dataschema as $schema){
			$hit++;
			$komennya 			= $schema['COLUMN_COMMENT'];
			$komennya_stripped 	= str_replace('combobox=','',$komennya);
			$combobox 			= false;

			if (!in_array($schema['COLUMN_NAME'],$field_exclude)){
					if($hit>2){
	    ?>
						'<?php echo $schema['COLUMN_NAME']; ?>'    => 'hidden-xs' ,  
		<?php
					}
			}
		}
        ?>    		
);
<?php echo "?>\n"; ?>

<div class="col-lg-12">
<table class="table table-striped table-bordered table-hover">
    <thead class="flip-content bordered-blue">
        <tr style="background-color: #eee;">
            <th style="text-align: center; width:50px;">
                <div class="checkbox">
										<label>
											<input type="checkbox" id="<?php echo "<?php"; ?> echo $module; <?php echo "?>"; ?>-checkAll">
											<span class="text"> &nbsp;</span>
										</label>
				</div>
            </th>
			<?php 
		$hit = 0;
		$field_exclude = array('id','ordering','published');
		foreach($dataschema as $schema){
			$hit++;
			$komennya 			= $schema['COLUMN_COMMENT'];
			$komennya_stripped 	= str_replace('combobox=','',$komennya);
			$combobox 			= false;
			$array_replace = array("_", "id");
			if (!in_array($schema['COLUMN_NAME'],$field_exclude)){
					if($hit==2){
	    ?>
            <th class="<?php echo "<?php"; ?> echo getClassSorting('<?php echo $schema['COLUMN_NAME']; ?>',$header_class); <?php echo "?>"; ?>">
                <a href="#" class="" data-name="<?php echo $schema['COLUMN_NAME']; ?>">
                    <?php echo ucwords(str_replace($array_replace,' ',$schema['COLUMN_NAME'])); ?><span class="<?php echo "<?php"; ?> echo getClassSortingIcon('<?php echo $schema['COLUMN_NAME']; ?>'); <?php echo "?>"; ?>"></span>
                </a>
            </th>
		<?php 
					}
			}
		}
		?>
				<?php echo "<?php\n"; ?>  foreach ($header_table as $nama_field=>$judul_header) { <?php echo "?>\n"; ?>
                <th class="hidden-xs <?php echo "<?php"; ?> echo getClassSorting($nama_field,$header_class); <?php echo "?>"; ?>"><a href="#" class="" data-name="<?php echo "<?php"; ?> echo $nama_field; <?php echo "?>"; ?>">
                    <?php echo "<?php\n"; ?> echo $judul_header; <?php echo "\n ?>"; ?><span class="<?php echo "<?php"; ?> echo getClassSortingIcon($nama_field); <?php echo "?>"; ?>"></span></a></th>
            <?php echo "<?php\n"; ?>  } <?php echo "\n ?>"; ?>
		
			
            <th class="hidden-xs">ACTION</th>
        </tr>	
    </thead>
    <tbody>
<?php echo "<?php\n"; ?>
if ($banyak>0) {
	$i = 0;
	foreach($data as $row){
		$i++;
<?php echo "\n?>"; ?>
	<tr data-id="<?php echo "<?php"; ?> echo $row['id']; <?php echo "?>"; ?>">
								<td style="text-align: center;">
									 <div class="checkbox">
										<label>
											<input type="checkbox" name="<?php echo "<?php"; ?> echo $module; <?php echo "?>"; ?>-check[]" id="<?php echo "<?php"; ?> echo $module; <?php echo "?>"; ?>-check-" value="<?php echo "<?php"; ?> echo $row['id'] <?php echo "?>"; ?>">
											<span class="text"> &nbsp;</span>
										</label>
									 </div>
								</td>
		<?php 
		$hit = 0;
		$field_exclude = array('id','ordering','published');
		foreach($dataschema as $schema){
			$hit++;
			$komennya 			= $schema['COLUMN_COMMENT'];
			$komennya_stripped 	= str_replace('combobox=','',$komennya);
			$combobox 			= false;

			if (!in_array($schema['COLUMN_NAME'],$field_exclude)){
					if($hit==2){
	    ?>
								<td><?php echo "<?php\n"; ?> echo $row['<?php echo $schema['COLUMN_NAME']; ?>']; <?php echo "\n?>"; ?>
                                    <ul class="table-mobile-ul visible-xs list-unstyled">
                                        <?php echo "<?php\n"; ?> foreach ($header_table as $nama_field=>$judul_header) { <?php echo "\n?>"; ?>
                                        <li><?php echo "<?php\n"; ?> echo $judul_header; <?php echo "\n?>"; ?>: <?php echo "<?php\n"; ?> echo $row[$nama_field]; <?php echo "\n?>"; ?></li>
                                        <?php echo "<?php\n"; ?> } <?php echo "\n?>"; ?>
                                        <li><a href="index.php?go=<?php echo "<?php"; ?> echo $module; <?php echo "?>"; ?>&do=ubah&id=<?php echo "<?php"; ?> echo $row['id']; <?php echo "?>"; ?>" data-placement="top" data-toggle="tooltip" data-original-title="Ubah"><i class="fa fa-fw fa-pencil"></i></a></li>
                                    </ul>
                                </td>
		<?php
                    }
			}
		}	
		?>
                                <?php echo "<?php\n"; ?> foreach ($header_table as $nama_field=>$judul_header) { <?php echo "\n?>"; ?>
								<td  class="hidden-xs"><?php echo "<?php"; ?> echo $row[$nama_field]; <?php echo "?>"; ?>							
                                <?php echo "<?php\n"; ?> } <?php echo "\n?>"; ?>
		                             
                                </td>
								<td  class="hidden-xs col-medium center" style="text-align: center">
									<a href="index.php?go=<?php echo "<?php"; ?> echo $module; <?php echo "?>"; ?>&do=ubah&id=<?php echo "<?php"; ?> echo $row['id']; <?php echo "?>"; ?>" class="btn btn-default btn-xs blue" data-placement="top" data-toggle="tooltip" data-original-title="Ubah">
										<i class="fa fa-edit"></i> Edit
									</a>
								</td>
							</tr>
<?php echo "<?php\n"; ?> 
	} //end for
} //end if 
else {
	//jiks data masih kosong
<?php echo "\n?>"; ?>
        <tr style="background-color: #eee;">
            <td colspan="10" style="text-align: center;">Tidak ada data</th>
	</tr>	
<?php echo "<?php\n"; ?>	
}
<?php echo "\n?>"; ?>								
    </tbody>
</table>
<div class="space"></div>
<div class="row DTTTFooter">
    <div class="col-sm-6">
	<?php echo "<?php\n"; ?> if ($banyak>0){ <?php echo "\n?>"; ?>
            <div id="simpledatatable_info" class="dataTables_info" role="status" aria-live="polite">Jumlah: <?php echo "<?php"; ?> echo $startRow+1; <?php echo "?>"; ?> - <?php echo "<?php"; ?> echo $startRow+count($data); <?php echo "?>"; ?> dari <?php echo "<?php"; ?> echo $banyak;<?php echo "?>"; ?> Data</div>	
	<?php echo "<?php\n"; ?> } else {	<?php echo "?>"; ?>
            Jumlah: 0
	<?php echo "<?php"; ?> }	<?php echo "\n?>"; ?>
    </div>
    <div class="col-sm-6">
	<div style="float:right;">
       <div  id="simpledatatable_paginate"  class="dataTables_paginate paging_bootstrap">
		<ul class="pagination">
                    <?php echo "<?php\n"; ?>   if ($page>1){   <?php echo "\n?>"; ?>
			<li class=""><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Awal" href="javascript:void(0);" data-page="1" class="nav-paging" ><i class="fa fa-fw fa-angle-double-left"></i></a></li>
			<li class=""><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Sebelumnya" href="javascript:void(0);" class="nav-paging" data-page="<?php echo "<?php"; ?> echo $page-1;<?php echo "?>"; ?>" ><i class="fa fa-fw fa-angle-left"></i></a></li>
                    <?php echo "<?php\n"; ?> } else { 
					//halaman awal
					<?php echo "\n?>"; ?>
			<li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Awal" href="javascript:void(0);" class="nav-paging"><i class="fa fa-fw fa-angle-double-left"></i></a></li>
			<li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Sebelumnya" href="javascript:void(0);" class="nav-paging"><i class="fa fa-fw fa-angle-left"></i></a></li>
                    <?php echo "<?php\n"; ?> } <?php echo "\n?>"; ?>
                    <?php echo "<?php\n"; ?>
			foreach($arrPage as $rowPage){
				if ($rowPage==$page){
                                    echo '<li class="active"><a href="javascript:void(0);" data-page="'.$rowPage.'" data-placement="top" data-toggle="tooltip" class="nav-paging" data-original-title="Halaman '.$rowPage.'" >'.$rowPage.'</a></li>';	
				} else{
                                    echo '<li class=""><a href="javascript:void(0);" data-page="'.$rowPage.'" data-placement="top" data-toggle="tooltip" class="nav-paging" data-original-title="Halaman '.$rowPage.'">'.$rowPage.'</a></li>';
				}
											
			}
                    <?php echo "\n?>"; ?>
                    <?php echo "<?php\n"; ?>
			if ($page==$jumlah_page){
				//pada halaman akhir, disable next dan last
                    <?php echo "?>"; ?>
                            <li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Selanjutnya" class="nav-paging" href="javascript:void(0);" ><i class="fa fa-fw fa-angle-right"></i></a></li>
                            <li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Akhir" class="nav-paging" href="javascript:void(0);" ><i class="fa fa-fw fa-angle-double-right"></i></a></li>
                    <?php echo "<?php\n"; ?> } else { <?php echo "\n?>"; ?>
                            <li><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Selanjutnya" class="nav-paging" href="javascript:void(0);"  data-page="<?php echo "<?php"; ?> echo $page+1;<?php echo "?>"; ?>"><i class="fa fa-fw fa-angle-right"></i></a></li>
                            <li><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Akhir" class="nav-paging" href="javascript:void(0);" data-page="<?php echo "<?php"; ?> echo $jumlah_page;<?php echo "?>"; ?>"  ><i class="fa fa-fw fa-angle-double-right"></i></a></li>
                    <?php echo "<?php\n"; ?> } <?php echo "\n?>"; ?>
                            <li>
				<input type="text" id="page_number" class="input-page" value="<?php echo "<?php"; ?> echo $page;<?php echo "?>"; ?>" data-placement="top" data-toggle="tooltip" data-original-title="Isikan nomor halaman" style="width: 35px; height:35px;"/>
                            </li>
                            <li><button class="button-page" id="button-page" data-placement="top" data-toggle="tooltip" data-original-title="Tampilkan Halaman" >Go</button></li>
		</ul>
            </div>
	</div>
    </div>
</div>
</div>
					
					