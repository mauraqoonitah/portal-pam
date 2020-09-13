<?php
global $arrSort, $default_sort;

$arrSort            = array();
$default_sort       = 'b.id desc';
$table_name         = 'v_kgb';
$config['theme']    = '';
$keyword            = post('keyword');
$sort               = $_POST['sort'];
$module             = 'daftar_kgb';
//echo 'sooort'.$sort;
if ($sort=='' || $sort=='{}'){
    
    $order_by = ' order by '.$default_sort.' ';
    
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
//echo '...'.$per_page;
if ($per_page=='' && $_SESSION['per_page']==''){
	//echo 'kosong keduanya';
	$per_page=10;
	$_SESSION['per_page'] = $per_page;
} else if ($per_page=='' && strlen($_SESSION['per_page'])>0){
    //echo 'perpage kosong dan ada session';
	$per_page=$_SESSION['per_page'];
} else {
    //echo 'perpage ada timpa session';
	$_SESSION['per_page'] = $per_page;
}
//echo '...'.$per_page;
$page = post('page');

if ($page=='' || (int)$page < 1){
	$page=1;
}


//HANDLING SEARCHING ALL FIELD
if (strlen($keyword)>0) {
    $arrKeyword = explode(' ',$keyword);
} else $arrKeyword = array();



if (strlen($keyword)>0){

	
/*        
 * 	$dbfieldnya = doquery('show columns from `'.$table_name.'`');
	foreach($dbfieldnya as $rowfield){
		$arrKeywordAnd = array();
		foreach($arrKeyword as $rowKeyword){
			$arrKeywordAnd[] = 't.'.$rowfield['Field'].' like "%'.$rowKeyword.'%"';
			
		}
		//debugvar($arrKeywordAnd);
		$strKeywordAnd = implode(' and ',$arrKeywordAnd);
		$arrWhere[] = '('.$strKeywordAnd.')';
	}
 *
 */
}	
        $arrWhere        = array();
        //echo count($arrKeyword);
        //debugvar($arrKeyword);
	foreach($arrKeyword as $rowKeyword){
		$arrWhere[] = 'a.nama like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'a.tgl_lahir like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'b.nrp like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'g.pangkat like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'g.gol_ruang like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'a.jabatan like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'a.tmt_pertama like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'a.tmt_pangkat like "%'.$rowKeyword.'%"';		
		$arrWhere[] = 'a.pendidikan like "%'.$rowKeyword.'%"';		
	}
        
        //$arrKeywordAnd   = array();
        //$arrKeywordAnd[] = ' (nrp,thn_efektif) not in (select nrp,thn_efektif from gaji_berkala) ';
        //$arrKeywordAnd[] = ' thn_efektif is not null ';
        //$arrKeywordAnd[] = ' thn_efektif > 0 ';
        //$strKeywordAnd = implode(' and ',$arrKeywordAnd);
        //$arrKeyword[] = '('.$strKeywordAnd.')';
	//cari field pada table lain
        
	if (count($arrWhere)>0 || count($arrKeywordAnd)>0){
            $where      = ' where ';
            if (count($arrWhere)==0) {
                $strWhereOr = '';
            } else $strWhereOr = implode(' or ',$arrWhere);
            if (strlen($strWhereOr)>0) {
                $strWhere   = '('.$strWhereOr.')'; 
                if (strlen($strKeywordAnd)>0) {
                    $strWhere .= ' and '.$strKeywordAnd;
                } else {
                    
                }
               // and ' .$strKeywordAnd;
                } else if (strlen($strKeywordAnd)>0) {
                $strWhere = $strKeywordAnd;
}        
	} else {
            $where      = '';
            $strWhere   = '';
	}
	
        $field_select   =   ' a.*,b.*, b.id as id,g.pangkat as pangkat_alias ';
        $sql_from       =   ' from gaji_berkala b left join data_anggota a on a.nrp=b.nrp '
                            .' left join gol_ruang g on g.pangkat_lengkap=b.pangkat'
                            .$where.' '.$strWhere;
	$sql_count      = 'select count(*) as banyak '.$sql_from;
	
        //echo '<pre>'.$sql_count.'</pre>';
	$dbcount = doquery($sql_count);
	$banyak = $dbcount[0]['banyak'];
        //echo 'banyak='.$banyak;
	$jumlah_page = ceil($banyak / $per_page);
	if ($page>$jumlah_page){
		$page = $jumlah_page;
	}	
//echo 'page='.$page.' dan perpage='.$per_page;
    $startRow = ($page - 1) * $per_page;
	$limit = $startRow.','.$per_page;

	
	//echo 'orderby'.$order_by;
    //SQL FINAL
    $sql            = ' select '.$field_select.' '.$sql_from .' '.$order_by. ' limit '.$limit;
            //echo '<pre>'.htmlentities($sql).'</pre>';
	//echo '<pre>'.$sql.'</pre>';
	//debugvar($sql);
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
                        'nrp'           => 'NRP',
                        'tgl_lahir'     => 'Tgl Lahir',        
                        'pendidikan'    => 'Pendidikan',
                        'pangkat_alias' => 'Pangkat',        
                        //'gol_ruang'     => 'Gol Ruang',        
                        'jabatan'       => 'Jabatan',        
                        'tmt_pertama'   => 'Tmt Pertama',        
                        //'tmt_pangkat'   => 'Tmt Pangkat',                
                        'gaji_sebelumnya'          => 'Gaji Lama',
                        //'gaji'          => 'Gaji Baru',                    
                        'thn_efektif'   => 'Thn Efektif',
                        //'bln_efektif'   => 'Bln Efektif',
                        
		); 

//nama field yang akan dihidden
$header_class = array(  
                        'nrp'               => 'hidden-xs' ,  
                        'tgl_lahir'         => 'hidden-xs' ,  
                        'pendidikan'        => 'hidden-xs',
                        'pangkat_alias'     => 'hidden-xs' ,  
                        //'gol_ruang'         => 'hidden-xs' ,  
                        'jabatan'           => 'hidden-xs' ,  
                        'tmt_pertama'       => 'hidden-xs' ,  
                        //'tmt_pangkat'       => 'hidden-xs' ,  
                        'gaji_sebelumnya'              => 'hidden-xs',
                        //'gaji'              => 'hidden-xs',
                        'thn_efektif'       => 'hidden-xs',
                        //'bln_efektif'       => 'hidden-xs',                
		    	
);

?>

<div class="col-lg-12">
    <style>        
        .column-title > a {
            color: #fff;
        }
    </style>    
<table class="table table-striped responsive-utilities jambo_table bulk_action">
            <thead>
                <tr class="headings" style="">
                    <th rowspan="2" style="text-align: center; width:50px;vertical-align: middle">
                        <div class="checkbox">
                            <label>
                                    <input type="checkbox" id="<?php echo $module; ?>-checkAll">
                                    <span class="text"> &nbsp;</span>
                            </label>
                        </div>
                    </th>
                    <th style="vertical-align: middle" rowspan="2" class="column-title <?php echo getClassSorting('nama',$header_class); ?>">
                        <a href="#" class="judul_table" data-name="nama"> Nama<br/><span class="<?php echo getClassSortingIcon('nama'); ?>"></span></a>
                    </th>                    
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('nrp',$header_class); ?>">
                        <a href="#" class="" data-name="nrp"> NRP<br/><span class="<?php echo getClassSortingIcon('nrp'); ?>"></span></a>
                    </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('tgl_lahir',$header_class); ?>">
                        <a href="#" class="" data-name="tgl_lahir"> Tgl Lahir<br/><span class="<?php echo getClassSortingIcon('tgl_lahir'); ?>"></span></a>
                    </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('pendidikan',$header_class); ?>">
                        <a href="#" class="" data-name="pendidikan"> Pendidikan<br/><span class="<?php echo getClassSortingIcon('pendidikan'); ?>"></span></a>
                        </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('pangkat',$header_class); ?>">
                        <a href="#" class="" data-name="pangkat"> Pangkat<br/><span class="<?php echo getClassSortingIcon('pangkat'); ?>"></span></a>
                        </th>
                    <!--<th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('gol_ruang',$header_class); ?>">
                        <a href="#" class="" data-name="gol_ruang"> Gol Ruang<br/><span class="<?php echo getClassSortingIcon('gol_ruang'); ?>"></span></a>
                         </th>-->
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('jabatan',$header_class); ?>">
                        <a href="#" class="" data-name="jabatan"> Jabatan<br/><span class="<?php echo getClassSortingIcon('jabatan'); ?>"></span></a>
                         </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('tmt_pertama',$header_class); ?>">
                        <a href="#" class="" data-name="tmt_pertama"> TMT<br/><span class="<?php echo getClassSortingIcon('tmt_pertama'); ?>"></span></a>
                         </th>
                    <!--<th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('tmt_pangkat',$header_class); ?>">
                        <a href="#" class="" data-name="tmt_pangkat"> TMT Pangkat<br/><span class="<?php echo getClassSortingIcon('tmt_pangkat'); ?>"></span></a>
                    </th>-->
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('gaji_sebelumnya',$header_class); ?>">
                        <a href="#" class="" data-name="gaji_sebelumnya"> Gaji<br/><span class="<?php echo getClassSortingIcon('gaji_sebelumnya'); ?>"></span></a>
                    </th>
                    <!--<th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('gaji',$header_class); ?>">
                        <a href="#" class="" data-name="gaji"> Gaji Baru<br/><span class="<?php echo getClassSortingIcon('gaji'); ?>"></span></a>
                    </th>-->

                    <th style="vertical-align: middle" class="hidden-xs column-title <?php echo getClassSorting('thn_efektif',$header_class); ?>">
                 <a href="#" class="" data-name="thn_efektif"> Masa Kerja<span class="<?php echo getClassSortingIcon('thn_efektif'); ?>"></span></a>
                 </th>
                    <th style="vertical-align: middle;text-align: center;" rowspan="2" class="hidden-xs column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
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
										<td><?php
 echo $row['nama']; 
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
?>                                        <li><a href="index.php?go=<?php echo $module; ?>&do=ubah&id=<?php echo $row['id']; ?>" data-placement="top" data-toggle="tooltip" data-original-title="Ubah"><i class="fa fa-fw fa-pencil"></i></a></li>
                                    </ul>
                                </td>
                                
		                <?php
                                foreach ($header_table as $nama_field=>$judul_header) { ?>
                                <td  class="hidden-xs">
                                <?php 
                                    //if ($nama_field=='gaji' || $nama_field=='gaji_sebelumnya') {
                                    //    echo number_format($row[$nama_field],0,',','.');
									if ($nama_field=='gaji_sebelumnya') {
                                        echo 'Lama: '.number_format($row[$nama_field],0,',','.').'<br/>Baru: '.number_format($row['gaji'],0,',','.');
                                    } else if ($nama_field=='tmt_pertama'){
										echo 'Pertama: '.$row['tmt_pertama'].'<br/>Pangkat: '.$row['tmt_pangkat'];
                                    } else if ($nama_field=='pangkat_alias'){
										echo $row['pangkat_alias'].' / '.$row['gol_ruang'];
                                    } else if ($nama_field=='thn_efektif') {
                                        echo $row['thn_efektif'].' THN 00 BLN';
                                    } else {
                                ?>
                                <?php echo $row[$nama_field]; ?>
                                </td>
                                <?php }} ?>		                             
                                
                                <td  class="hidden-xs col-medium center" style="text-align: center">
                                    <a href="<?php echo $config['baseurl'];?>index.php?go=kgb&do=view&id=<?php echo $row['id']; ?>&ret=daftar_kgb" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Tampilkan">
                                        <i class="fa fa-search"></i> Tampilkan
                                    </a>
                                </td>
                        </tr>
<?php
 
	} //end for
} //end if 
else {
	//jiks data masih kosong

?>        <tr style="background-color: #eee;">
            <td colspan="<?php echo count($header_table)+3; ?>" style="text-align: center;">Tidak ada data</th>
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
?>            <div id="simpledatatable_info" class="dataTables_info" role="status" aria-live="polite">Jumlah: <?php echo $startRow+1; ?> - <?php echo $startRow+count($data); ?> dari <?php echo number_format($banyak,0,',','.');?> Data</div>	
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

?>

                    <div class="input-group">
                        <input type="text" class="form-control" id="page_number" value="<?php echo $page;?>" data-placement="top" data-toggle="tooltip" data-original-title="Isikan nomor halaman" style="width: 70px; height:35px;">                                        
                        <button class="btn btn-primary" id="button-page" data-placement="top" data-toggle="tooltip" data-original-title="Tampilkan Halaman">Go!</button> 
                    </div>

		</ul>
            </div>
	</div>
    </div>
</div>
</div>
					
					