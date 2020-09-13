<?php
	echo widgetbackend('actionmenu',array(
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=product&do=hapus',
											 '<img src="../images/new.png">Tambah'		=> 'index.php?go=product&do=tambah',
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

