<script language="javascript">
$(function(){
 	
 	$("[data-toggle='tooltip']").tooltip();	
});

</script>

<?php

$table_name = 'user';

$config['theme'] = '';

$keyword = post('keyword');

$sort = post('sort');

//isi $sort_order ubah di controller
global $sort_order;
//debugvar($sort_order);
$sort_keys = array_keys($sort_order);
if ($sort==''){
	$sort = 't.ordering asc';
	
	$order_by = ' order by '.$sort;
} else {
	//echo 'sortnih..'.$sort;
	$arrSort = explode(' ',$sort);
	//debugvar($arrSort);
	$order_by = ' order by '.$sort_keys[$arrSort[0]-1].' '.$arrSort[1];
	//echo $order_by;
}
//echo 'sort='.$sort.'...'.$order_by;

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

//debugvar($_POST);
//echo $limit;
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
	
	//cari field pada kolom lain
	foreach($arrKeyword as $rowKeyword){
		$arrWhere[] = 'r.nama_role like "%'.$rowKeyword.'%"';
	}
	
	if (count($arrWhere)>0){
		$where = ' where ';
	} else {
		$where = '';
	}
	
	$strWhere = '('.implode(' or ',$arrWhere).')';
	
	$sql_from = '	from `'.$table_name.'` t 
					left join user_role r on r.id=t.role 
					left join user_profile p on p.email=t.email 
					left join fprop o on o.f_kdprop=p.f_kdprop 
					left join fdaerah d on d.f_kdprop=p.f_kdprop and d.f_kdkab=p.f_kdkab
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
} else {
	
	//on load, select pertama kali load
	
	$sql_from = '	from `'.$table_name.'` t 
					left join user_role r on r.id=t.role 
					left join user_profile p on p.email=t.email 
					left join fprop o on o.f_kdprop=p.f_kdprop 
					left join fdaerah d on d.f_kdprop=p.f_kdprop and d.f_kdkab=p.f_kdkab
					'.$order_by;
	
	//echo $sql_from;
	$sql_count = 'select count(*) as banyak '.$sql_from;
	
	//echo $sql_count;
	$dbcount = doquery($sql_count);
	$banyak = $dbcount[0]['banyak'];
	$jumlah_page = ceil($banyak / $per_page);
	if ($page>$jumlah_page){
		$page = $jumlah_page;
	}	
}

	$startRow = ($page - 1) * $per_page;

	$limit = $startRow.','.$per_page;

	//untuk menampilkan field apa saja pada grid
	
	$field_select = ' 	t.id AS id,t.email AS email, t.role as role, 
						p.nama_lengkap,p.f_kdprop,p.f_kdkab,r.nama_role,
						p.nama_lengkap,p.telepon,p.email_kontak,o.f_nmprop,d.f_nmdaerah,t.ordering ';
	
	$sql = ' select '.$field_select.' '.$sql_from . ' limit '.$limit;
	//echo $banyak;
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
		//$arrPage[] = $page;
		for ($i=$page;$i<$page+3;$i++){
			$arrPage[] = $i;
		}
	}

?>

<div class="col-lg-12">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr style="background-color: #eee;">
									<th style="text-align: center; width:50px;">
									<input type="checkbox" id="wna-checkAll"></th>
									
									<th>ID</th>
									<th>Username</th>
									
									<?php
									//daftar judul kolom yg hidden on responsive
									$arrTitleField = array(	'Role',
															'Nama Operator',
															'Provinsi',
															'Kab/Kota',
                                                            'Telepon/HP',
                                                            'Email',
															'Ordering');
									foreach($arrTitleField as $title){
									?>
										<th class="hidden-xs"><?php echo $title;?></th>	
									<?php
									}
									?>
									
									<th class="hidden-xs">Action</th>
								</tr>	
							</thead>
							<tbody>
<?php

if ($banyak>0) {
	

	$i = 0;
	foreach($data as $row){
		$i++;
		
?>
							<tr>
								<td style="text-align: center;"><input type="checkbox" name="<?php echo $module;?>-check[]" id="<?php echo $module;?>-check-" value="<?php echo $row['id']?>"></td>
								<td><?php echo $row['id']; ?>
								<td><?php echo $row['email']; ?>
								
									<ul class="table-mobile-ul visible-xs list-unstyled">
										<li><?php echo $row['nama_role']; ?></li>
										<li><?php echo $row['nama_lengkap']; ?></li>
										<li><?php echo $row['ordering']; ?></li>
										<li><a href="index.php?go=<?php echo $module;?>&do=ubah&id=<?php echo $row['id'];?>" data-placement="top" data-toggle="tooltip" data-original-title="Ubah"><i class="fa fa-fw fa-pencil"></i></a></li>
									</ul>
									
								</td>
								
								<td class="hidden-xs"><?php echo $row['nama_role']; ?>
								<td class="hidden-xs"><?php echo $row['nama_lengkap']; ?>
								
								<td class="hidden-xs"><?php echo $row['f_nmprop']; ?>
								<td class="hidden-xs"><?php echo $row['f_nmdaerah']; ?>
                                    <td class="hidden-xs"><?php echo $row['telepon']; ?>
								<td class="hidden-xs"><?php echo $row['email_kontak']; ?>
								<td class="hidden-xs"><?php echo $row['ordering']; ?></td>
								
								<td class="hidden-xs col-medium center" style="text-align: center"><a href="index.php?go=<?php echo $module;?>&do=ubah&id=<?php echo $row['id'];?>" data-placement="top" data-toggle="tooltip" data-original-title="Ubah"><i class="fa fa-fw fa-pencil"></i></a></td>
							</tr>
<?php 
	} //end for
} //end if 
else {
	//jiks data masih kosong
?>
<tr style="background-color: #eee;">
									<td colspan="10" style="text-align: center;">Tidak ada data</th>
								</tr>	

<?php	
}
?>								
							</tbody>
						</table>
						<div class="space"></div>
						<div class="form-group">
							<div class="col-sm-6">
							<?php if ($banyak>0){
								?>
								<label class="col-sm-6 control-label">Jumlah: <?php echo $startRow+1; ?> - <?php echo $startRow+count($data); ?> dari <?php echo $banyak;?> Data</label>	
								<?php
							} else {
							?>
								Jumlah: 0
							<?php
							}
							?>
							</div>
							<div class="col-sm-6">
							<div style="float:right;">
								<div class="dataTables_paginate paging_bootstrap input-group">
									<ul class="pagination">
										<?php
										if ($page>1){
										?>
											<li class=""><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Awal" href="javascript:void(0);" data-page="1" class="nav-paging" ><i class="fa fa-fw fa-angle-double-left"></i></a></li>
											<li class=""><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Sebelumnya" href="javascript:void(0);" class="nav-paging" data-page="<?php echo $page-1;?>" ><i class="fa fa-fw fa-angle-left"></i></a></li>
										<?php } else { //halaman awal?>
											<li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Awal" href="javascript:void(0);"><i class="fa fa-fw fa-angle-double-left"></i></a></li>
											<li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Sebelumnya" href="javascript:void(0);"><i class="fa fa-fw fa-angle-left"></i></a></li>
										<?php } ?>
										<?php
										
										foreach($arrPage as $rowPage){
											if ($rowPage==$page){
												echo '<li class="active"><a href="javascript:void(0);" data-page="'.$rowPage.'" class="nav-paging" data-placement="top" data-toggle="tooltip" data-original-title="Halaman '.$rowPage.'" >'.$rowPage.'</a></li>';	
											} else{
												echo '<li class=""><a href="javascript:void(0);" data-page="'.$rowPage.'" class="nav-paging" data-placement="top" data-toggle="tooltip" data-original-title="Halaman '.$rowPage.'">'.$rowPage.'</a></li>';
											}
											
										}
										?>
										<?php
										if ($page==$jumlah_page){
											//pada halaman akhir, disable next dan last
										?>
										
											<li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Selanjutnya" href="javascript:void(0);" ><i class="fa fa-fw fa-angle-right"></i></a></li>
											<li class="disabled"><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Akhir" href="javascript:void(0);" ><i class="fa fa-fw fa-angle-double-right"></i></a></li>
										<?php } else { ?>
										<li><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Selanjutnya" href="javascript:void(0);" class="nav-paging" data-page="<?php echo $page+1;?>"><i class="fa fa-fw fa-angle-right"></i></a></li>
										<li><a data-placement="top" data-toggle="tooltip" data-original-title="Halaman Akhir" href="javascript:void(0);" data-page="<?php echo $jumlah_page;?>" class="nav-paging" ><i class="fa fa-fw fa-angle-double-right"></i></a></li>
										<?php } 
										
										?>
										
										<li>
											<input type="text" id="page_number" class="input-page" value="<?php echo $page;?>" data-placement="top" data-toggle="tooltip" data-original-title="Isikan nomor halaman" style="width: 50px;"/>
										</li>
										<li><button class="button-page" id="button-page" data-placement="top" data-toggle="tooltip" data-original-title="Tampilkan Halaman" >Go</button></li>
									</ul>
									
									
									
								</div>
								</div>
							</div>
						</div>
					</div>
					
					