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

$(function(){
	$('#url').keyup(function(){
		var aliasnya = $(this).val();
		aliasnya = aliasnya.replace(/\s/g,'-').replace(/[^a-zA-Z 0-9\-]+/g,'-').toLowerCase();
		$('#url_alias').val(aliasnya);
	});
});
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
		<label>Nama Product</label>
		<input type="text" name="nama_product" id="nama_product" value="<?php echo $row['nama_product']; ?>"/>
	</div>
	
	<div class="row">
		<label>Product Alias</label>
		<input type="text" name="url_alias" id="url_alias" value="<?php echo $row['url_alias']; ?>"/>
	</div>
	
	<!-- <div class="row">
		<label>Brand</label>
		<input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>"/>
	</div>
	
	<div class="row">
		<label>Size</label>
		<input type="text" name="ukuran" id="ukuran" value="<?php echo $row['ukuran']; ?>"/>
	</div>
	
 -->
	
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
		<label>Harga Normal</label>
		<input type="text" name="normal_price" id="normal_price" value="<?php echo $row['normal_price']; ?>"/> * Harga sebelum diskon ditampilkan dalam bentuk <span style="text-decoration: line-through;">dicoret</span>
	</div>
	
	<div class="row">
		<label>Harga Jual</label>
		<input type="text" name="price" id="price" value="<?php echo $row['price']; ?>"/> * Harga setelah diskon (yang dibayar oleh customer)
	</div>
	

	<div class="row">
		<label>Keterangan singkat (maks. 500 char)</label>
			<?php 
		echo widgetbackend('xheditor',array( 	'field' => 'short_desc',
												'value' => $row['short_desc'],
												'rows'	=> '10',
												'cols'	=> '50',
												'height'=> '100',
												'width'	=> '80%',
											)); 
		?>
	</div>
	
	<div class="row">
		<label>Berat Packing</label>
		<input type="text" name="berat_packing" id="berat_packing" value="<?php echo $row['berat_packing']; ?>"/> gram (angka ini akan digunakan dalam perhitungan ongkos kirim)
	</div>
	
	<div class="row">
		<label>Berat Produk</label>
		<input type="text" name="weight" id="weight" value="<?php echo $row['weight']; ?>"/> gram 
	</div>
	
	<div class="row">
		<label>Panjang Dimensi</label>
		<input type="text" name="length" id="length" value="<?php echo $row['length']; ?>"/> cm
	</div>
	
	<div class="row">
		<label>Lebar Dimensi</label>
		<input type="text" name="width" id="width" value="<?php echo $row['width']; ?>"/> cm
	</div>
	
	<div class="row">
		<label>Tinggi Dimensi</label>
		<input type="text" name="height" id="height" value="<?php echo $row['height']; ?>"/> cm
	</div>
	
	<div class="row">
		<label>Featured Product</label>
		<?php
 				echo widgetbackend('inputselect',	array('field'=>'featured',
												'option'=>array('1'=>'Ya','0'=>'Tidak'))
								 ); ?>
	</div>

	<div class="row">
		<label>Sale</label>
		<?php
 				echo widgetbackend('inputselect',	array('field'=>'sale',
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

