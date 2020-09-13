
<?php
	
	$module 	= 'kategori_produk';
	$moduledb 	= 'ec_category';
	
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");
	$row = $dbedit[0];
} else {
	$tipe = $_GET['tipe'];
}

	echo widgetbackend('actionmenu',array(
		'<img src="../images/back.png">Batal'		=> 'index.php?go='.$module.'&do=list',
										));

	$sql = 'select * from '.$moduledb.' order by lft ASC';
	//echo $sql;
	$datainduk 	= doquery($sql);
?>


<script language="javascript">
$(function(){
	$('#content_id').change(function(){
		tipe = "<?php echo $tipe; ?>";
		//if (tipe.indexOf("admin")>-1) {
		//	$('#link').val('index.php?go='+$("#content_id option:selected").text());
		//} else {
			//$('#link').val('index.php?go=page&id='+$(this).val()+'&title='+$("#content_id option:selected").text());	
			
		if ($("#content_id option:selected").text()=='- pilih -'){
			$('#link').val("");
		} else {
			$('#link').val($("#content_id option:selected").text());	
			$('#module_id').val('-');
		}
			
		//}
			
		//}
	});
	
	$('#module_id').change(function(){
		tipe = "<?php echo $tipe; ?>";
		//if (tipe.indexOf("admin")>-1) {
		//	$('#link').val('index.php?go='+$("#module_id option:selected").text());
		//} else {
			//$('#link').val('index.php?go=page&id='+$(this).val()+'&title='+$("#module_id option:selected").text());	
		if ($("#module_id option:selected").text()=='- pilih -'){
			$('#link').val("");
		} else {
			$('#link').val('modul/'+$("#module_id option:selected").text());	
			$('#content_id').val('-');
		}
		//}
			
		//}
	});
	
	$('#nama_category').keyup(function(){
		var aliasnya = $(this).val();
		aliasnya = aliasnya.replace(/\s/g,'-').toLowerCase();
		$('#nama_category_alias').val(aliasnya);
	});

});

</script>
<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">

	<div class="row">
		<label>Kategori Induk</label>
		<select name="parent_id" id="parent_id">
		<?php foreach($datainduk as $rowinduk){
			if ($rowinduk['id']==$row['parent_id']){
				$default = 'selected="selected"';
			} else {
				$default = '';
			}
			echo '<option value="'.$rowinduk['id'].'" '.$default.'>'.str_repeat('-',intval($rowinduk['level'])).' '.$rowinduk['nama_category'].'</option>';
		 }	?>
		</select>
		
	</div>
	<div class="row">
		<label>Nama Kategori</label>
		<input type="text" name="nama_category" id="nama_category" value="<?php echo $row['nama_category']; ?>" style="width: 20em"/>
	</div>
	<div class="row">
		<label>Nama Kategori Alias (berguna untuk link URL)</label>
		<input type="text" name="nama_category_alias" id="nama_category_alias" value="<?php echo $row['nama_category_alias']; ?>"  style="width: 20em" required="required"/>
	</div>
	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Simpan"/>
	</div>	
</div>

</form>
</fieldset>
