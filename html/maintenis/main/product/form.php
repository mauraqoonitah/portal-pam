<?php global $config; ?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $config['baseurl'].'res/'; ?>jquery.tokenize.css">
<script src="<?php echo $config['baseurl'].'res/'; ?>jquery.tokenize.js"></script>
<?php


									
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

<script language="javascript">
$(document).ready(function() {
	
	/*
	String.prototype.replaceAll = function(search, replacement) {
		var target = this;
		return target.replace(new RegExp(search, 'g'), replacement);
	};
	*/
	$('#title').keyup(function(){
		var aliasnya = $(this).val();
		aliasnya = aliasnya.replace(/\s/g,'-').replace(/[^a-zA-Z 0-9\-]+/g,'-').toLowerCase();
		$('#title_alias').val(aliasnya);
	});
	
	//$("#form1").submit(function(){
	//$('#btn_simpan').click(function(){
	   
	  // var input = $('#full_text').val();
	   //alert(decodeURI(input));
	   //input = decodeURI(input);
	   //var input_modif = input.replaceAll('<iframe','[iframe');
	  // var input_modif = input_modif.replaceAll('</iframe>','[/iframe]');
	   //var input_modif = input_modif.replaceAll('<embed','[embed');
	   //var input_modif = input_modif.replaceAll('</embed>','[/embed]');
	   //var input_modif = input_modif.replaceAll('"','"');
	   //alert(input_modif);
	   //$('#full_text').val(input_modif);
	   //alert($('#full_text').val());
	   //$('#form1').submit();
	   //return false;
	//});
	//$('#btn_simpan').click(function(){
		//alert('tes');
		//var data = $('#form1').serialize();
		
		//return false;
	//});
});
</script>

<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">

			<div class="x_title">

                <h4><a href="index.php?go=<?php echo $module; ?>" title="Batal" alt="Batal"><i class="fa fa-arform-group-circle-left" aria-hidden="true"></i> </a> EDIT NEWS<br> </h4>		

                <ul class="nav navbar-right panel_toolbox">
                    <li>

                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>

                    </li>                                        

                </ul>

                <div class="clearfix"></div>

            </div>

		<div class="x_content">      
<form name="form1" class="form-horizontal" role="form" action="" method="post">	

 <div class="form-group">
		<label class="col-sm-2 control-label">Produk Kategori</label>
<div class="col-sm-3">
		<select name="id_category" id="id_category">
		<?php foreach($datainduk as $rowinduk){
			if ($idkat==$rowinduk['id']){
				$selected = ' selected="selected" ';
			} else $selected = '';
			echo '<option value="'.$rowinduk['id'].'"'.$selected.'>'.str_repeat('-',intval($rowinduk['level'])).' '.$rowinduk['nama_category'].'</option>';
		 }	?>
		</select>


</div>
</div>
	

	<div class="form-group">
		<label class="col-sm-2 control-label">Product Code</label>
	
		<div class="col-sm-3"><input type="text" name="kode_product" id="kode_product" value="<?php echo $row['kode_product']; ?>" style="width: 400px;" required></div>
	
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Product Name</label>
	
		<div class="col-sm-3"><input type="text" name="nama_product" id="nama_product" value="<?php echo $row['nama_product']; ?>" style="width: 400px;"/ required></div>
	
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">brand</label>
		 
		<div class="col-sm-3"><input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>" style="width: 400px;"/ required></div>
	
	</div>

<div class="form-group">
		<label class="col-sm-2 control-label">Size</label>
	
		<div class="col-sm-3"><input type="text" name="ukuran" id="ukuran" value="<?php echo $row['ukuran']; ?>" style="width: 400px;"/ required></div>
	
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Product Alias</label>
	
		<div class="col-sm-3"><input type="text" name="url_alias" id="url_alias" value="<?php echo $row['url_alias']; ?>" style="width: 400px;"/ required></div>
	
	</div>




    
	<div class="form-group">
		<label class="col-sm-2 control-label">Product Image</label>
		<div class="col-sm-3">
		<?php
			echo widgetbackend('image_uploader', array( 
                                                                    'field' => 'img_icon',
                                                                    'path'	=> '../images/products',
                                                                    'value'	=> $row['img_icon'],
                                                                    'asfield'	=> 'true',
                                                                    ));
		?>	* Recommended: 1200 x 630 atau 600 x 315 pixel
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Poster Promo</label>
		<div class="col-sm-3">
		<?php
			echo widgetbackend('image_uploader', array( 
                                                                    'field' => 'imgpromo',
                                                                    'path'	=> '../images/poster',
                                                                    'value'	=> $row['imgpromo'],
                                                                    'asfield'	=> 'true',
                                                                    ));
		?>	* Recommended: 1200 x 630 atau 600 x 315 pixel
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Logo Product</label>
		<div class="col-sm-3">
		<?php
			echo widgetbackend('image_uploader', array( 
                                                                    'field' => 'logobrand',
                                                                    'path'	=> '../images/logobrand',
                                                                    'value'	=> $row['logobrand'],
                                                                    'asfield'	=> 'true',
                                                                    ));
		?>	* Recommended: 1200 x 630 atau 600 x 315 pixel
		</div>
	</div>







<div class="form-group">
		<label class="col-sm-2 control-label">PRoduct Price</label>
	
		<div class="col-sm-3"><input type="text" name="price" id="price" value="<?php echo $row['price']; ?>" style="width: 400px;"/ required></div>
	
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Short Desc</label>
		<div class="col-sm-7">	
		<?php 
		echo widgetbackend('textarea',array( 	'field' => 'short_desc',
												'value' => $row['short_desc'],
												'rows'	=> '20',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
		?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Long_desc</label>
		<div class="col-sm-7">
		<?php 
		echo widgetbackend('textarea',array( 	'field' => 'long_desc',
												'value' => $row['long_desc'],
												'rows'	=> '30',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
		?>
		</div>
	</div>



<div class="form-group">
		<label class="col-sm-2 control-label">Product Weight</label>
	
		<div class="col-sm-3"><input type="text" name="weight" id="weight" value="<?php echo $row['weight']; ?>"/> Gram <style="width: 400px;"/></div>
	
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Product Length</label>
	
		<div class="col-sm-3"><input type="text" name="length" id="length" value="<?php echo $row['length']; ?>"/> sCm <style="width: 400px;"/></div>
	
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Product Width</label>
	
		<div class="col-sm-3"><input type="text" name="width" id="width" value="<?php echo $row['width']; ?>"/> Cm <style="width: 400px;"/></div>
	
	</div>


	<div class="form-group">
		<label class="col-sm-2 control-label">Product Height</label>
	
		<div class="col-sm-3"><input type="text" name="height" id="height" value="<?php echo $row['height']; ?>"/> Cm <style="width: 400px;"/></div>
	
	</div>



	
	<div class="form-group">
		<label class="col-sm-2 control-label">Ordering</label>
		<div class="col-sm-3"><input type="text" name="ordering" id="ordering" value="<?php echo $row['ordering']; ?>"/></div>
	</div>

	
	<div class="form-group">
		<label class="col-sm-2 control-label">Promo Product</label>
		<div class="col-sm-3">
		<?php echo widgetbackend('inputselect', array(	'field'	=> 'featured',
														'option'=> array('0'=>'Tidak','1'=>'Ya'),
														'value'	=> $row['featured'],
														)); ?>
		</div>
	</div>



	<div class="form-group">
		<label class="col-sm-2 control-label" for="published">Published</label>
		<div class="col-sm-3">
		<?php echo widgetbackend('inputselect', array(	'field'	=> 'published',
														'option'=> array('1'=>'Ya','0'=>'Tidak'),
														'value'	=> $row['published'],
														)); ?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-sm-3">
			<a href="<?php echo $config['baseurl'];?>backend/index.php?go=news" class="btn btn-danger">Tutup</a>
			<button type="submit" id="btn_simpan" class="btn btn-primary">Simpan</button>
			
		</div>	
	</div>	

</form>				

		</div>			

				

		</div>	
 
	</div>

</div>
<script type="text/javascript">
				CKEDITOR.replace('short_desc');
				CKEDITOR.replace('long_desc');
</script>