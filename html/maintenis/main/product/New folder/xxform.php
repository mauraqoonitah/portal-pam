<?php
global $config;

?>

<script language="javascript">
$(function(){
	$('#add_img').click(function(){
		$('#table_img').append ('\
		<tr>\
		<td><input type="text" name="imgadd[]" value="'+$('#imgadd').val()+'"/></td>\
		<td><center><img src="<?php echo $config['baseurl'] .'/images/products/'?>'+$('#imgadd').val()+'" alt="" width="50%" height="50%" /></center></td>\
		</tr>');
	});
}
);



</script>

<?php
	echo widgetbackend('actionmenu',array(
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=product&do=hapus',
											 '<img src="../images/new.png">Tambah'		=> 'index.php?go=product&do=tambah',
											 '<img src="../images/list.png">Batal'	=> 'index.php?go=product',
											));
	$dbeditcat = doquery("select * from ec_category where id='".$id."'");
	$rowcat = $dbeditcat[0];
	$sql		= 'select * from ec_category order by lft ASC';
	$datainduk 	= doquery($sql);

											
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

	<div class="row">
		<label>Product Category</label>
		<select name="id_category" id="id_category">
		<?php foreach($datainduk as $rowinduk){
			echo '<option value="'.$rowinduk['id'].'">'.str_repeat('-',intval($rowinduk['level'])).' '.$rowinduk['nama_category'].'</option>';
		 }	?>
		</select>
		
	</div>
	
	<div class="row">
		<label>Product Code</label>
		<input type="text" name="kode_product" id="kode_product" value="<?php echo $row['kode_product']; ?>"/>
	</div>
	
	<div class="row">
		<label>Product Name</label>
		<input type="text" name="nama_product" id="nama_product" value="<?php echo $row['nama_product']; ?>"/>
	</div>
	
	<div class="row">
		<label>Product Image</label>
		<?php

				echo widgetbackend('image_uploader', array( 
															'field' => 'img',
															'path'	=> 'images/products',
															'value'	=> $row['img']
															));
		
		?>
		
	</div>
	
	<div class="row">
		<label>Product Icon</label>
		<input type="text" name="img_icon" id="img_icon" value="<?php echo $row['img_icon']; ?>"/>
	</div>
	
	<div class="row">
	
		<label>Add Product Image</label>
		<?php

				echo widgetbackend('image_uploader', array( 
															'field' => 'imgadd',
															'path'	=> 'images/products',
															'value'	=> '',
															));
		
		?>
		
	</div>
	<div class="row">
	<label>&nbsp;</label>
	<div style="display:block;width:80%;float:left">
	<input type="button" id="add_img" value="Add"/>
		<table id="table_img">
		<tr>
			<th width="80">File Name</th>
			<th width="150">Image</th>
		</tr>
		
		<?php
		$tampilimg = doquery("select * from ec_product_image where id_product='".$id."'");
		foreach($tampilimg as $row){	
		echo '<tr>
			<td width="80">'.$row['image'].'</td>
			<td width="150"><center><img src="'.$config['baseurl'] .'images/products/'.$row['image'].'" alt="" width="50%" height="50%"/></center></td>
		</tr>';
			}
		?>
		</table>
	</div>
	</div>
	
	<div class="row">
		<label>Product Price</label>
		<input type="text" name="price" id="price" value="<?php echo $row['price']; ?>"/>
	</div>
	

	<div class="row">
		<label>Short Desc.</label>
			<?php 
		echo widgetbackend('xheditor',array( 	'field' => 'short_desc',
												'value' => $row['short_desc'],
												'rows'	=> '5',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
		?>
	</div>
	
	<div class="row">
		<label>Long Desc.</label>
		<?php 
		echo widgetbackend('xheditor',array( 	'field' => 'long_desc',
												'value' => $row['long_desc'],
												'rows'	=> '20',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
		?>
	</div>
	
	<div class="row">
		<label>Product Weight</label>
		<input type="text" name="weight" id="weight" value="<?php echo $row['weight']; ?>"/>
	</div>
	
	<div class="row">
		<label>Product Length</label>
		<input type="text" name="length" id="length" value="<?php echo $row['length']; ?>"/>
	</div>
	
	<div class="row">
		<label>Product Width</label>
		<input type="text" name="width" id="width" value="<?php echo $row['width']; ?>"/>
	</div>
	
	<div class="row">
		<label>Product Height</label>
		<input type="text" name="height" id="height" value="<?php echo $row['height']; ?>"/>
	</div>
	
	<div class="row">
		<label>Ordering</label>
		<input type="text" name="ordering" id="ordering" value="<?php echo $row['ordering']; ?>"/>
	</div>
	
	<div class="row">
		 <label for="published">Published</label>
  			<select name="published" id="published">
    		<option value="1" 
			<?php
			if ($row['published']=='1') echo ' selected="selected"';  
			?>
			>Yes</option>
    		<option value="0"
			<?php
			if ($row['published']=='0') echo ' selected="selected"';  
			?>
			>No</option>
  			</select>
	</div>

	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Simpan"/>
	</div>	

</div>
</form>
</fieldset>

