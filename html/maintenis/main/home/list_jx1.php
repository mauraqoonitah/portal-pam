<?php
global $arrSort, $default_sort;

$arrSort            = array();
$default_sort       = 'bln_efektif desc, thn_efektif desc';
$table_name         = 'data_anggota';
$config['theme']    = '';
$keyword            = post('keyword');
$sort               = $_POST['sort'];
$module             = 'home';
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
		$arrWhere[] = 'nama like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'tgl_lahir like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'nrp like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'pangkat_alias like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'gol_ruang like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'jabatan like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'tmt_pertama like "%'.$rowKeyword.'%"';
		$arrWhere[] = 'tmt_pangkat like "%'.$rowKeyword.'%"';		
	}
        
        $arrKeywordAnd   = array();
        $arrKeywordAnd[] = ' (nrp,thn_efektif) not in (select nrp,thn_efektif from gaji_berkala) ';
        //$arrKeywordAnd[] = ' thn_efektif is not null ';
        //$arrKeywordAnd[] = ' thn_efektif > 0 ';
        $strKeywordAnd = implode(' and ',$arrKeywordAnd);
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
	
//	$sql_from = '	from `'.$table_name.'` t 
//					
//				' . $where.' '.
//				    $strWhere.' '.
//				    $order_by;
        //untuk menampilkan field apa saja pada grid	
        /*
	$field_select   = ' a.id,a.pendidikan,a.nama,a.tgl_lahir,a.nrp,a.pangkat,a.gol_ruang,a.jabatan,a.tmt_pertama,a.tmt_pangkat
                            ,a.mk_efektif as thn_efektif,date_add(tmt_pertama,INTERVAL mk_efektif YEAR) AS  thn_last
                            ,timestampdiff(month,date_add(tmt_pertama,INTERVAL mk_efektif YEAR) ,tmt_pangkat) bln_efektif
                            ,r.pangkat as pangkat_alias,g.gaji ';
        
        $sql_from = '	from (
                        select *, timestampdiff(year,tmt_pertama,tmt_pangkat) as mk_efektif,
                        timestampdiff(month,tmt_pertama,tmt_pangkat) as bln_efektif
                        from data_anggota) as a
                        inner join gaji_master g on g.gol_ruang=a.gol_ruang and g.tahun=a.mk_efektif
                        left join gol_ruang r on r.pangkat_lengkap=a.pangkat
        
        $field_select   = 'nama,nrp,tgl_lahir,pendidikan,pangkat,gol_ruang,jabatan,tmt_pertama,tmt_pangkat,pangkat_alias,gaji,thn_efektif,bln_efektif,
			max(tahun) thn_sebelumnya,max(gaji_sebelumnya) as gaji_sebelumnya ';
        $sql_from       = '
        from (
	select b.id,pendidikan,nama,tgl_lahir,nrp,pangkat,b.gol_ruang, jabatan,tmt_pertama,tmt_pangkat,pangkat_alias,thn_efektif,b.gaji,s.tahun,
			 s.gaji as gaji_sebelumnya,timestampdiff(month,date_add(tmt_pertama,INTERVAL thn_efektif YEAR) ,tmt_pangkat) bln_efektif 
			 from (

		select a.id,pendidikan,nama,tgl_lahir,nrp,a.pangkat,a.gol_ruang, jabatan,tmt_pertama,tmt_pangkat,thn_efektif,m.gaji,r.pangkat as pangkat_alias from 
		(
			select id,pendidikan,nama,tgl_lahir,nrp,pangkat,gol_ruang, jabatan,tmt_pertama,tmt_pangkat,
	   			 timestampdiff(year,tmt_pertama,tmt_pangkat) as thn_efektif
			from data_anggota																															
		) a 

		join gaji_master m on a.gol_ruang=m.gol_ruang and thn_efektif=m.tahun
                left join gol_ruang r on r.pangkat_lengkap=a.pangkat
		where thn_efektif>0		';
        $sql_from .= ')  b
	left join gaji_master s on s.gol_ruang=b.gol_ruang and tahun<thn_efektif 
	order by thn_efektif desc,nama,s.tahun desc
        ) c
                        '.$where.' '.$strWhere.' group by nama,nrp,tgl_lahir,pangkat,pangkat_alias,gol_ruang,jabatan,tmt_pangkat,gaji,thn_efektif ';
        */
        $field_select   = ' * ';
        $sql_from       = ' from v_kgb '.$where.' '.$strWhere;
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
                        'gol_ruang'     => 'Gol Ruang',        
                        'jabatan'       => 'Jabatan',        
                        'tmt_pertama'   => 'Tmt Pertama',        
                        'tmt_pangkat'   => 'Tmt Pangkat',                
                        'gaji_sebelumnya'          => 'Gaji Lama',
                        'gaji'          => 'Gaji Baru',                    
                        'thn_efektif'   => 'Thn Efektif',
                        'bln_efektif'   => 'Bln Efektif',
                        
		); 

//nama field yang akan dihidden
$header_class = array(  
                        'nrp'               => 'hidden-xs' ,  
                        'tgl_lahir'         => 'hidden-xs' ,  
                        'pendidikan'        => 'hidden-xs',
                        'pangkat_alias'     => 'hidden-xs' ,  
                        'gol_ruang'         => 'hidden-xs' ,  
                        'jabatan'           => 'hidden-xs' ,  
                        'tmt_pertama'       => 'hidden-xs' ,  
                        'tmt_pangkat'       => 'hidden-xs' ,  
                        'gaji_sebelumnya'              => 'hidden-xs',
                        'gaji'              => 'hidden-xs',
                        'thn_efektif'       => 'hidden-xs',
                        'bln_efektif'       => 'hidden-xs',                
		    	
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
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('gol_ruang',$header_class); ?>">
                        <a href="#" class="" data-name="gol_ruang"> Gol Ruang<br/><span class="<?php echo getClassSortingIcon('gol_ruang'); ?>"></span></a>
                         </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('jabatan',$header_class); ?>">
                        <a href="#" class="" data-name="jabatan"> Jabatan<br/><span class="<?php echo getClassSortingIcon('jabatan'); ?>"></span></a>
                         </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('tmt_pertama',$header_class); ?>">
                        <a href="#" class="" data-name="tmt_pertama"> TMT Pertama<br/><span class="<?php echo getClassSortingIcon('tmt_pertama'); ?>"></span></a>
                         </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('tmt_pangkat',$header_class); ?>">
                        <a href="#" class="" data-name="tmt_pangkat"> TMT Pangkat<br/><span class="<?php echo getClassSortingIcon('tmt_pangkat'); ?>"></span></a>
                    </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('gaji_sebelumnya',$header_class); ?>">
                        <a href="#" class="" data-name="gaji_sebelumnya"> Gaji Lama<br/><span class="<?php echo getClassSortingIcon('gaji_sebelumnya'); ?>"></span></a>
                    </th>
                    <th style="vertical-align: middle" rowspan="2" class="hidden-xs column-title <?php echo getClassSorting('gaji',$header_class); ?>">
                        <a href="#" class="" data-name="gaji"> Gaji Baru<br/><span class="<?php echo getClassSortingIcon('gaji'); ?>"></span></a>
                    </th>

                    <th style="vertical-align: middle; text-align: center;" colspan="2" class="hidden-xs column-title ">MK Efektif </th>
                    <th style="vertical-align: middle;text-align: center;" rowspan="2" class="hidden-xs column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
             </tr>
             <tr class="headings">
                 
                 <th style="vertical-align: middle" class="hidden-xs column-title <?php echo getClassSorting('thn_efektif',$header_class); ?>">
                 <a href="#" class="" data-name="thn_efektif"> Tahun<span class="<?php echo getClassSortingIcon('thn_efektif'); ?>"></span></a>
                 </th>
                 <th style="vertical-align: middle" class="hidden-xs column-title <?php echo getClassSorting('bln_efektif',$header_class); ?>">
                     <a href="#" class="" data-name="bln_efektif"> Bulan<span class="<?php echo getClassSortingIcon('bln_efektif'); ?>"></span></a>
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
                                    if ($nama_field=='gaji' || $nama_field=='gaji_sebelumnya') {
                                        echo number_format($row[$nama_field],0,',','.');
                                    } else {
                                ?>
                                    <?php echo $row[$nama_field]; ?></td>
                                <?php }} ?>		                             
                                
                                <td  class="hidden-xs col-medium center" style="text-align: center">
                                                                        
                                    <a href="<?php echo $config['baseurl'];?>index.php?go=kgb&do=proses&id=<?php echo $row['id']; ?>&ret=kgb" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Ubah">
                                                <i class="fa fa-money"></i> Proses KGB
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
					
					