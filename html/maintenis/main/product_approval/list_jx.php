<?php
global $arrSort, $default_sort;

function f_url($text){
	$inputnya = $text;
	$inputnya = str_replace("/", "-", $inputnya);
	$inputnya = preg_replace("/[\']/", "_", $inputnya);
  	$inputnya = preg_replace("/[^a-zA-Z0-9\w\.\_\`\/\:\!\@\#\$\%\^\&\*\(\)\=\+\|\{\}\?\<\>\~\;\,\(\)\r]/", "-", $inputnya);
  	$inputnya = strtolower($inputnya);
	return $inputnya;
}

$arrSort            = array();
$default_sort       = array('t.id'=>'desc');
$table_name         = 'ec_product';
$config['theme']    = '';
$keyword            = post('keyword');
$sort               = $_POST['sort'];

//HANDLING SORT
if ($sort==''){
    $arrSort = $default_sort;
		
} else {    
    $arrSort = json_decode($sort, true);
    if (count($arrSort)==0) {
        $arrSort = $default_sort;
    }
}

$arrNewSort = array();

foreach ($arrSort as $name=>$order){
	$arrNewSort[] = $name.' '.$order; 
}

$order_by = ' order by '.implode(',', $arrNewSort);        

//SELESAI HANDLING SORT

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
	//$arrWhere 
	//foreach($arrKeyword as $rowKeyword){
	//	$arrWhere[] = 'r.nama_role like "%'.$rowKeyword.'%"';
	//}
	
	if (count($arrWhere)>0){
		$where      = ' where ';
        $strWhere   = '('.implode(' or ',$arrWhere).')';
	} else {
		$where      = 'where';
        $strWhere   = 't.approved=0 and t.published=1';
	}
	
	$sql_from = '	from `'.$table_name.'` t 
					left join ec_category c on c.id=t.id_category 
					left join ec_vendor v on v.id=t.id_vendor
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
	$field_select   = ' t.*,c.nama_category,c.nama_category_alias,c.deskripsi_category,v.nama_vendor,v.nama_vendor_url,v.nama_kontak_person,v.telepon ';
	
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
$header_table = array(  
		                        'kode_product'    		=> 'Kode Product',        
		                        'img_icon'	    		=> 'Foto Product',        
		                        'nama_vendor'    		=> 'Vendor',        
		                        'nama_product'    		=> 'Nama Product',        
		                        'price'    				=> 'Price',
		                        'discount_vendor'   	=> 'Discount Vendor',
		                        'fee'    				=> 'Konsinyasi',
								'discount_craftynesia'	=> 'Discount Craftynesia',
        
		                
		); 

//nama field yang akan dihidden
$header_class = array(  
						'kode_product'    		=> 'hidden-xs' ,  
						'img_icon'    			=> 'hidden-xs' ,  
						'nama_vendor'    		=> 'hidden-xs' , 
						'nama_product'    		=> 'hidden-xs' ,    
						'price'    				=> 'hidden-xs' ,   
						'discount_vendor'		=> 'hidden-xs' ,   
						'fee'    				=> 'hidden-xs' ,   
						'discount_craftynesia'	=> 'hidden-xs' ,   
		    		
);
?>

<div class="col-lg-12">
<table class="table table-striped table-bordered table-hover">
    <thead class="flip-content bordered-blue">
        <tr style="background-color: #eee;">
            <th style="text-align: center; width:50px;">
                <div class="checkbox">
                    <label>
                            <input type="checkbox" id="<?php echo $module; ?>-checkAll">
                            <span class="text"> &nbsp;</span>
                    </label>
                </div>
            </th>
			            <th class="<?php echo getClassSorting('id_category',$header_class); ?>">
                <a href="#" class="" data-name="id_category">
                      Category<span class="<?php echo getClassSortingIcon('id_category'); ?>"></span>
                </a>
            </th>
			<?php  foreach ($header_table as $nama_field=>$judul_header) { ?>                
				<th class="hidden-xs <?php echo getClassSorting($nama_field,$header_class); ?>"><a href="#" class="" data-name="<?php echo $nama_field; ?>">
                    <?php
 echo $judul_header; 
 ?><span class="<?php echo getClassSortingIcon($nama_field); ?>"></span></a></th>
            <?php  }  ?>		
			
            <th class="hidden-xs">ACTION</th>
        </tr>	
    </thead>
    <tbody>
<?php
if ($banyak>0) {
	$i = 0;
	foreach($data as $row){
		$i++;

?>	<tr data-id="<?php echo $row['id']; ?>">
								<td style="text-align: center;">
									 <div class="checkbox">
										<label>
											<input type="checkbox" name="<?php echo $module; ?>-check[]" id="<?php echo $module; ?>-check-" value="<?php echo $row['id'] ?>">
											<span class="text"> &nbsp;</span>
										</label>
									 </div>
								</td>
										<td data-id="<?php echo $row['id']; ?>"><?php
 echo $row['nama_category']; 
?>                                    <ul class="table-mobile-ul visible-xs list-unstyled">
                                        <?php
 foreach ($header_table as $nama_field=>$judul_header) { 
?>                                        <li><?php
 echo $judul_header; 
?>: <?php
 echo $row[$nama_field]; 
?></li>
                                        <?php
 } 
?>                                        <li><a href="index.php?go=<?php echo $module; ?>&do=approve&id=<?php echo $row['id']; ?>" data-placement="top" data-toggle="tooltip" data-original-title="Approve"><i class="fa fa-fw fa-check"></i></a></li>
                                    </ul>
                                </td>
<?php
								foreach ($header_table as $nama_field=>$judul_header) {
									if ($nama_field=='price') {
										if (intval($row['normal_price'])>0){
											$harga_awal = '<del>'.number_format($row['normal_price'],0,',','.').'</del><br/>';
										} else {
											$harga_awal = '';
										}
										echo '<td  class="hidden-xs" data-id="'.$row['id'].'">'.$harga_awal.' '.number_format($row['price'],0,',','.').'</td>';
									} else if ($nama_field=='fee') {
										if (intval($row['fee'])>0){
											
											echo '<td  class="hidden-xs" data-id="'.$row['id'].'">'.$row['fee'].'%</td>';
										} else {
											echo '<td  class="hidden-xs" data-id="'.$row['id'].'"></td>';
										}
									} else if ($nama_field=='discount_vendor') {
										if (intval($row['discount_vendor'])>0){
											echo '<td  class="hidden-xs" data-id="'.$row['id'].'">'.$row['discount_vendor'].'%</td>';
										} else {
											echo '<td  class="hidden-xs" data-id="'.$row['id'].'"></td>';
										}
									} else if ($nama_field=='discount_craftynesia'){
										?>
										<td>
										<input type="text" class="form-control discount_craftynesia" id="diskon_<?php echo $row['id'];?>" value="<?php echo $row['discount_craftynesia'];?>" style="width:50px;">
										<button class="btn btn-xs btn_simpan" data-id="<?php echo $row['id'];?>"><i class="fa fa-save"></i></button>
										</td>
										<?php
									} else if ($nama_field=='img_icon'){
										?>
										<td>
											<img height="200" src="<? echo 'http://craftynesia.com/'.'images/vendor/'.$row['id_vendor'].'/'.$row['id'].'/'.$row['img_icon']; ?>">
										</td>
										<?php
									} else { ?>
								<td  class="hidden-xs" data-id="<?php echo $row['id']; ?>"><?php echo $row[$nama_field]; ?></td>
                                <?php
									}
								}
?>
                                
								<td  class="hidden-xs col-medium center" style="text-align: center">
								<a href="<?php echo $config['baseurl_front']."sell/".f_url($row['nama_vendor'])."/".$row['id'].'-'.f_url($row['nama_product']);?>" target="_blank" class="btn btn-default btn-xs blue" data-placement="top" data-toggle="tooltip" data-original-title="Preview"><i class="fa fa-search"></i> Preview</a>
									<a href="index.php?go=<?php echo $module; ?>&do=approve&id=<?php echo $row['id']; ?>" class="btn btn-default btn-xs blue" data-placement="top" data-toggle="tooltip" data-original-title="Approve">
										<i class="fa fa-check"></i> Approve
									</a>
									
								</td>
							</tr>
<?php
 
	} //end for
} //end if 
else {
	//jiks data masih kosong

?>        <tr style="background-color: #eee;">
            <td colspan="10" style="text-align: center;">Tidak ada data</th>
	</tr>	
<?php
	
}

?>								
    </tbody>
</table>
<div class="space"></div>
<div class="row DTTTFooter">
    <div class="col-sm-6">
	<?php
 if ($banyak>0){ 
?>            <div id="simpledatatable_info" class="dataTables_info" role="status" aria-live="polite">Jumlah: <?php echo $startRow+1; ?> - <?php echo $startRow+count($data); ?> dari <?php echo $banyak;?> Data</div>	
	<?php
 } else {	?>            Jumlah: 0
	<?php }	
?>    </div>
    <div class="col-sm-6">
	<div style="float:right;">
       <div  id="simpledatatable_paginate"  class="dataTables_paginate paging_bootstrap">
		<ul class="pagination">
                    <?php
   if ($page>1){   
?>			<li class=""><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Awal" href="javascript:void(0);" data-page="1" class="nav-paging" ><i class="fa fa-fw fa-angle-double-left"></i>&nbsp;</a></li>
			<li class=""><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Sebelumnya" href="javascript:void(0);" class="nav-paging" data-page="<?php echo $page-1;?>" ><i class="fa fa-fw fa-angle-left"></i>&nbsp;</a></li>
                    <?php
 } else { 
					//halaman awal
					
?>			<li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Awal" href="javascript:void(0);" class="nav-paging"><i class="fa fa-fw fa-angle-double-left"></i>&nbsp;</a></li>
			<li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Sebelumnya" href="javascript:void(0);" class="nav-paging"><i class="fa fa-fw fa-angle-left"></i>&nbsp;</a></li>
                    <?php
 } 
?>                    <?php
			foreach($arrPage as $rowPage){
				if ($rowPage==$page){
                                    echo '<li class="active"><a href="javascript:void(0);" data-page="'.$rowPage.'" data-placement="top" data-toggle="tooltip" class="nav-paging" data-original-title="Halaman '.$rowPage.'" >'.$rowPage.'</a></li>';	
				} else{
                                    echo '<li class=""><a href="javascript:void(0);" data-page="'.$rowPage.'" data-placement="top" data-toggle="tooltip" class="nav-paging" data-original-title="Halaman '.$rowPage.'">'.$rowPage.'</a></li>';
				}
											
			}
                    
?>                    <?php
			if ($page==$jumlah_page){
				//pada halaman akhir, disable next dan last
                    ?>                            <li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Selanjutnya" class="nav-paging" href="javascript:void(0);" ><i class="fa fa-fw fa-angle-right"></i>&nbsp;</a></li>
                            <li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Akhir" class="nav-paging" href="javascript:void(0);" ><i class="fa fa-fw fa-angle-double-right"></i>&nbsp;</a></li>
                    <?php
 } else { 
?>                            <li><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Selanjutnya" class="nav-paging" href="javascript:void(0);"  data-page="<?php echo $page+1;?>"><i class="fa fa-fw fa-angle-right"></i>&nbsp;</a></li>
                            <li><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Akhir" class="nav-paging" href="javascript:void(0);" data-page="<?php echo $jumlah_page;?>"  ><i class="fa fa-fw fa-angle-double-right"></i>&nbsp;</a></li>
                    <?php
 } 
?>                            <li>
				<input type="text" id="page_number" class="input-page" value="<?php echo $page;?>" data-placement="top" data-toggle="tooltip" data-original-title="Isikan nomor halaman" style="width: 35px; height:35px;"/>
                            </li>
                            <li><button class="button-page" id="button-page" data-placement="top" data-toggle="tooltip" data-original-title="Tampilkan Halaman" >Go</button></li>
		</ul>
            </div>
	</div>
    </div>
</div>
</div>
					
					