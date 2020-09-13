<h2 class="art-postheader">Detail Data #</h2>

<?php
$module   = 'hak_akses';
$moduledb = 'm_hak_akses';

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
		<label>Module</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['module']; ?>	</div>				
		<div class="row">
		<label>Allow Deny</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['allow_deny']; ?>	</div>				
		<div class="row">
		<label>Id Role</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['id_role']; ?>	</div>				
		<div class="row">
		<label>Id User</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['id_user']; ?>	</div>				
		<div class="row">
		<label>Action</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['action']; ?>	</div>				
		
</div>
</form>
</fieldset>
