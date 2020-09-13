<h2 class="art-postheader">Tambah Data Baru</h2>

<?php
$module   = 'user';
$moduledb = 'user';

if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select u.*,r.nama_role from ".$moduledb." u left join user_role r on r.id=u.role where u.id='".$id."'");
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
		<label>Email</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['email']; ?>	</div>				
		<div class="row">
		<label>Role</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['nama_role']; ?>	</div>				
		<div class="row">
		<label>Ordering</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['ordering']; ?>	</div>

	<div class="row">
		<label>Published</label>
		<div style="display:block;width:80%;float:left"><?php echo YaTidak($row['published']); ?>	</div>
	
</div>
</form>
</fieldset>
