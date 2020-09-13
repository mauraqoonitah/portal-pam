<h2 class="art-postheader">Detail Data #<?php echo $_GET['id'];?></h2>

<?php echo "<?php"; ?>

$module   = '<?php echo $namamodule;?>';
$moduledb = '<?php echo $namatable;?>';

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

<?php echo "?>"; ?>
<?php
	$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
	$dataschema = doquery($sql);
?>
<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<?php 
		$field_exclude = array('id','ordering','published');
		foreach($dataschema as $schema){
			if (!in_array($schema['COLUMN_NAME'],$field_exclude)){
				?>
	<div class="row">
		<label><?php echo ucwords(str_replace('_',' ',$schema['COLUMN_NAME'])); ?></label>
		<div style="display:block;width:80%;float:left"><?php echo "<?php"; ?> echo $row['<?php echo $schema['COLUMN_NAME']; ?>']; <?php echo "?>"; ?>
	</div>				
	<?php
			}			
		}
	?>
	
</div>
</form>
</fieldset>
