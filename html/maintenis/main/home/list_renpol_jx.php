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
		$arrWhere[] = 'pendidikan like "%'.$rowKeyword.'%"';		
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
                        //'gol_ruang'     => 'Gol Ruang',        
                        'jabatan'       => 'Jabatan',        
                        'tmt_pertama'   => 'Tmt Pertama',        
                        //'tmt_pangkat'   => 'Tmt Pangkat',                
                        'gaji_sebelumnya'          => 'Gaji Lama',
                        //'gaji'          => 'Gaji Baru',                    
                        'thn_efektif'   => 'Thn Efektif',
                        'thn_gol'   => 'Thn Gol',
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
                        'thn_gol'       => 'hidden-xs',
                        //'bln_efektif'       => 'hidden-xs',                
		    	
);

?>

<div class="col-lg-12">
    <style>        
        .column-title > a {
            color: #fff;
        }
    </style>    
<?php echo widgetbackend('tahunanggota'); ?>	
<div class="space"></div>

</div>
					
					