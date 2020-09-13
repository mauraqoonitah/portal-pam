<div class="table">
<div class="art-blockheader">
    <h3 class="t">Kategori</h3>
</div>
<div class="art-blockcontent">
	<div><ul><li><a href="<?php echo $config['baseurl'].'modul/product';?>">Semua</a></li></ul></div>
<?php

$where = '';
$kat 	= $_GET['kat'];
if (strlen($kat)>0){
	$idkat = doquery('select lft,rgt from ec_category where nama_category_alias='.q($kat));
	$rowkat = $idkat[0];
	
	$dbkat = doquery('select id from ec_category where lft between '.$rowkat['lft'].' and '.$rowkat['rgt']);
	$in = '';
	foreach($dbkat as $rowkat){
		$in .= ','.$rowkat['id'];
	}
	$in = substr($in,1);
	$where .= ' or id in ('.$in.')';
}

$dbcat = doquery('select * from ec_category where (level=1 '.$where.') and published=1 order by ordering asc ');

foreach($dbcat as $rowcat) {
	$spasi = ($rowcat['level']-1) * 3;
	$spasinya = '';	
	for ($i=0;$i<$spasi;$i++){
		$spasinya .= '&nbsp;';
	}
	echo '<div><ul>'.$spasinya.'<li><a href="'.$config['baseurl'].'kat-'.$rowcat['nama_category_alias'].'">'.$rowcat['nama_category'].'</a></li></ul></div>';
}
?>
	</ul></div>
</div>