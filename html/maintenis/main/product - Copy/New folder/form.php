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
											
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ec_product where id='".$id."'");
	$row = $dbedit[0];
	$idkat = $row['id_category'];
}
	//echo "select * from ec_category where id='".$id."'";
	//$dbeditcat 	= doquery("select * from ec_category where id='".$idkat."'");
	//$rowcat 	= $dbeditcat[0];
	$sql		= 'select * from ec_category order by lft ASC';
	$datainduk 	= doquery($sql);

?>

<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form1" action="" method="POST">
<div class="wide form">
	<div class="row">
		<label>Product Category</label>
		<select name="id_category" id="id_category">
		<?php foreach($datainduk as $rowinduk){
			if ($idkat==$rowinduk['id']){
				$selected = ' selected="selected" ';
			} else $selected = '';
			echo '<option value="'.$rowinduk['id'].'"'.$selected.'>'.str_repeat('-',intval($rowinduk['level'])).' '.$rowinduk['nama_category'].'</option>';
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
		<label>Brand</label>
		<input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>"/>
	</div>
	
	<div class="row">
		<label>Size</label>
		<input type="text" name="ukuran" id="ukuran" value="<?php echo $row['ukuran']; ?>"/>
	</div>
	
	<div class="row">
		<label>Product Alias</label>
		<input type="text" name="url_alias" id="url_alias" value="<?php echo $row['url_alias']; ?>"/>
	</div>
	
	<div class="row">
		<label>Product Image</label>
		<?php
			echo widgetbackend('image_uploader', array( 
														'field' => 'img_icon',
														'path'	=> 'images/products',
														'value'	=> $row['img_icon'],
														'asfield'	=> 'true',
														));
		?>		
	</div>
	
	<div class="row">
		<label>Poster Promo</label>
		<?php
			echo widgetbackend('image_uploader', array( 
														'field' => 'imgpromo',
														'path'	=> 'images/poster',
														'value'	=> $row['imgpromo'],
														'asfield'	=> 'true',
														));
		?>		
	</div>
	
<!--	<div class="row">
		<label>Product Icon</label>
		<input type="text" name="img_icon" id="img_icon" value="<?php echo $row['img_icon']; ?>"/>
	</div>
-->
	<div class="row">
	
		<label>Logo Product</label>
		<?php

				echo widgetbackend('image_uploader', array( 
															'field' => 'logobrand',
															'path'	=> 'images/logobrand',
															'value'	=> $row['logobrand'],
															'asfield'	=> 'true',
															));
		
		?>
<!--	<input type="button" id="add_img" value="Add"/>
	
	<span class="btn" id="add_img">
	Add
	</span>	 -->
	</div>

	
	<!--<div class="row">
	
		<label>Product Image</label>
		<?php

				echo widgetbackend('image_uploader', array( 
															'field' => 'imgadd',
															'path'	=> 'images/products',
															'value'	=> '',
															'asfield'	=> 'false',
															));
		
		?>

	<span class="btn" id="add_img">
	Add
	</span>	
	</div> -->
	
	
	 <div class="row">
	<label>&nbsp;</label>
	<div style="display:block;width:80%;float:left">
	
		<table id="table_img">
		<tr>
			<th width="80">File Name</th>
			<th width="150">Image</th>
		</tr>
		
		<?php
		$tampilimg = doquery("select * from ec_product_image where id_product='".$id."'");
		foreach($tampilimg as $rowimg){	
		echo '<tr>
			<td width="80">'.$rowimg['image'].'</td>
			<td width="150"><center><img src="'.$config['baseurl'] .'images/products/'.$rowimg['image'].'" alt="" width="50%" height="50%"/></center></td>
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
		<label>Short Desc. (max. 150 chr)</label>
			<?php 
		echo widgetbackend('xheditor',array( 	'field' => 'short_desc',
												'value' => $row['short_desc'],
												'rows'	=> '3',
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
		<input type="text" name="weight" id="weight" value="<?php echo $row['weight']; ?>"/> gram
	</div>
	
	<div class="row">
		<label>Product Length</label>
		<input type="text" name="length" id="length" value="<?php echo $row['length']; ?>"/> cm
	</div>
	
	<div class="row">
		<label>Product Width</label>
		<input type="text" name="width" id="width" value="<?php echo $row['width']; ?>"/> cm
	</div>
	
	<div class="row">
		<label>Product Height</label>
		<input type="text" name="height" id="height" value="<?php echo $row['height']; ?>"/> cm
	</div>
	
	<div class="row">
		<label>Ordering</label>
		<input type="text" name="ordering" id="ordering" value="<?php echo $row['ordering']; ?>"/>
	</div>
	
	<div class="row">
		<label>Promo Product</label>
		<?php
 				echo widgetbackend('inputselect',	array('field'=>'featured',
												'option'=>array('1'=>'Ya','0'=>'Tidak'))
								 ); ?>
	</div>

	<div class="row">
		<label>Published</label>
		<?php
 echo widgetbackend('inputselect',	array('field'=>'published',
												'option'=>array('1'=>'Ya','0'=>'Tidak'))
								 ); ?>
	</div>
	
<!--	<div class="row">
		<label>Tampil di depan</label>
		<?php
 echo widgetbackend('inputselect',	array('field'=>'featured',
												'option'=>array('1'=>'Ya','0'=>'Tidak'))
								 ); ?>
	</div> -->
	
	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Simpan"/>
	</div>	

</div>
</form>
</fieldset>

