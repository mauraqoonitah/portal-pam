<h2 class="art-postheader">Detail Data #</h2>

<?php
$module   = 'status_pesanan';
$moduledb = 'ec_order_status';

if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");
	$row = $dbedit[0];
}
	echo widgetbackend('actionmenu',array(
											 '<img src="../images/back.png">Batal'		=> 'index.php?go='.$module,
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go='.$module.'&do=hapus',
											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go='.$module.'&do=ubah&id='.$id,
											));

?><fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_generator" action="" method="POST">
<div class="wide form">
		<div class="row">
		<label>Nama Status</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['nama_status']; ?>	</div>				
		
</div>
</form>
</fieldset>
