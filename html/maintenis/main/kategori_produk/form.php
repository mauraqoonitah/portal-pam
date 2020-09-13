
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

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
			<div class="x_title">
                <h4><a href="index.php?go=<?php echo $module; ?>" title="Batal" alt="Batal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> </a> Batal<br> </h4>		
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>
                    </li>                                        
                </ul>
                <div class="clearfix"></div>
            </div>
<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<div class="x_content"> 
<form class="form-horizontal" name="form_<?php echo $module; ?>" action="" method="POST">


<div class="form-group">
		<label class="col-sm-2 control-label">Kategori Induk</label>
		<div class="col-sm-7">
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
	</div>

<div class="form-group">
		<label class="col-sm-2 control-label">Nama Kategori</label>
		<div class="col-sm-7">
		<input type="text" name="nama_category" id="nama_category" value="<?php echo $row['nama_category']; ?>" style="width: 20em"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Nama Kategori Alias (berguna untuk link URL)</label>
		<div class="col-sm-7">
	<input type="text" name="nama_category_alias" id="nama_category_alias" value="<?php echo $row['nama_category_alias']; ?>"  style="width: 20em" required="required"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-sm-7">
		<input type="submit" value="Simpan"/>
		</div>
	</div>

</div>

</form>
</fieldset>
</div>	

	</div>

</div>
