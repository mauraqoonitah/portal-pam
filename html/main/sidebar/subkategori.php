<?php
$config['theme']='';
if($_REQUEST)
{
	$id 	= $_REQUEST['parent_id'];
?> 
	
	<select  id="subkategori" name="subkategori" class="form-control" required >
		<option value="" selected="selected">- Pilih Sub Kategori -</option>
	<?php 
												$query_subkategori = mysql_query("select * from ec_category where parent_id='$id'");
												while($array_sub_kategori = mysql_fetch_array($query_subkategori)){
											?>
												<option  value="<?php echo $array_sub_kategori['id']; ?>"><?php echo $array_sub_kategori['nama_category']; ?></option>
											<?php } ?>
	</select>	
	
<?php	
}
?>