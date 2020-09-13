<?php
//	echo widgetbackend('actionmenu',array(
//											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=product&do=hapus',
//											 '<img src="../images/new.png">Tambah'		=> 'index.php?go=product&do=tambah',
//											));
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ec_product where id='".$id."'");
	$row = $dbedit[0];
}
?>

<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form1" action="" method="POST">
<div class="wide form">



</div>
</form>
</fieldset>

