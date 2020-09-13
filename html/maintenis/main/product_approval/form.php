<?php
//registerJS($config['baseurl'].'res/autoNumeric/autoNumeric.js');
$module   = 'product_approval';
$moduledb = 'ec_product';

if (count($_SESSION['temp_form'])>0){
    $row = $_SESSION['temp_form'];
    //unset($_SESSION['temp_form']);
}            
if (isset($_GET['id'])){	
	$id = get('id');
        if (count($_SESSION['temp_form'])>0){
            $row = $_SESSION['temp_form'];
            //unset($_SESSION['temp_form']);
        } else {
        
            $sql = "select * from ".$moduledb." t 				
                    where id=$id";   
                    //echo $sql;	
                    $dbedit = doquery($sql);	
                    $row = $dbedit[0];
        }
}
?>
		<script language="javascript">
			$(document).ready(function() {
				
			});
		</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
			<div class="x_title">
                <h4></h4>		
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>
                    </li>                                        
                </ul>
                <div class="clearfix"></div>
            </div>
		<div class="x_content">                
		<form class="form-horizontal" role="form" action="" method="post">					
		<!-- konten start di sini -->                                        
		<div class="space-12"></div>  
		
		<div class="form-group">
                    <label class="col-sm-2 control-label">  Category<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'id_category',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => '  Category',
                                                            'value'     => $row['id_category'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Kode Product<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'kode_product',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Kode Product',
                                                            'value'     => $row['kode_product'],
                                                            'maxlength' => '50',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">  Vendor<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'id_vendor',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => '  Vendor',
                                                            'value'     => $row['id_vendor'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">  Merk<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'id_merk',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => '  Merk',
                                                            'value'     => $row['id_merk'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Logobrand<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'logobrand',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Logobrand',
                                                            'value'     => $row['logobrand'],
                                                            'maxlength' => '255',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Brand<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'brand',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Brand',
                                                            'value'     => $row['brand'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Nama Product<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'nama_product',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Nama Product',
                                                            'value'     => $row['nama_product'],
                                                            'maxlength' => '50',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Url Alias<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'url_alias',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Url Alias',
                                                            'value'     => $row['url_alias'],
                                                            'maxlength' => '255',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Ukuran<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'ukuran',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Ukuran',
                                                            'value'     => $row['ukuran'],
                                                            'maxlength' => '255',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Short Desc<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php    echo widgetbackend('textarea',array('field'    => 'short_desc',
                                                            'mode_edit' => $mode_edit,
                                                            'rows' 		=> '5',
                                                            'value'     => $row['short_desc'],
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Long Desc<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php    echo widgetbackend('textarea',array('field'    => 'long_desc',
                                                            'mode_edit' => $mode_edit,
                                                            'rows' 		=> '5',
                                                            'value'     => $row['long_desc'],
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Short Desc En<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php    echo widgetbackend('textarea',array('field'    => 'short_desc_en',
                                                            'mode_edit' => $mode_edit,
                                                            'rows' 		=> '5',
                                                            'value'     => $row['short_desc_en'],
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Long Desc En<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php    echo widgetbackend('textarea',array('field'    => 'long_desc_en',
                                                            'mode_edit' => $mode_edit,
                                                            'rows' 		=> '5',
                                                            'value'     => $row['long_desc_en'],
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Created<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'created',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Created',
                                                            'value'     => $row['created'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Modified<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'modified',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Modified',
                                                            'value'     => $row['modified'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Berat Packing<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'berat_packing',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Berat Packing',
                                                            'value'     => $row['berat_packing'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Weight<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'weight',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Weight',
                                                            'value'     => $row['weight'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Length<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'length',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Length',
                                                            'value'     => $row['length'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">W Th<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'width',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'W Th',
                                                            'value'     => $row['width'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Height<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'height',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Height',
                                                            'value'     => $row['height'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Price<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'price',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Price',
                                                            'value'     => $row['price'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Normal Price<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'normal_price',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Normal Price',
                                                            'value'     => $row['normal_price'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Stock<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'stock',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Stock',
                                                            'value'     => $row['stock'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
                    <div class="form-group">						
                    <label class="col-sm-2 control-label">Ordering</label>
                    <div class="col-sm-1">
                        <input type="text" name="ordering" id="ordering" value="<?php
 echo $row['ordering'];?>
" class="form-control"/>
                    </div>
                    </div>
                		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Img Icon<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'img_icon',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Img Icon',
                                                            'value'     => $row['img_icon'],
                                                            'maxlength' => '100',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Img Hover<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'img_hover',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Img Hover',
                                                            'value'     => $row['img_hover'],
                                                            'maxlength' => '100',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Featured<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'featured',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Featured',
                                                            'value'     => $row['featured'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Sale<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'sale',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Sale',
                                                            'value'     => $row['sale'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
<?php $arrPubpublished = array('1'=>'Ya','0'=>'Tidak'); ?>                    <div class="form-group">						
                    <label class="col-sm-2 control-label">Published</label>
                    <div class="col-sm-1">
                        <?php echo widgetbackend('inputselect',array('field'=>'published','value'=>$row['published'],'kosong'=>'- pilih -','option'=>$arrPubpublished)); ?>                        
                    </div>
                    </div>
                		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Imgpromo<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'imgpromo',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Imgpromo',
                                                            'value'     => $row['imgpromo'],
                                                            'maxlength' => '255',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Jmllaku<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'jmllaku',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Jmllaku',
                                                            'value'     => $row['jmllaku'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Min Order<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'min_order',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Min Order',
                                                            'value'     => $row['min_order'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Hits<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'hits',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Hits',
                                                            'value'     => $row['hits'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Approved<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'approved',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Approved',
                                                            'value'     => $row['approved'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		                
		<div class="space-12"></div>                    
		<hr class="separator" />                  
		<div class="form-group">						
		<label class="col-sm-2 control-label">&nbsp;</label>						
		<div class="col-sm-3">                           
		<a class="btn" href="<?php
 echo $config['baseurl'].'index.php?go='.$module;?>
"><span class="fa fa-arrow-circle-left"></span> Batal</a>
		<?php if ($mode_edit==true) { ?>		<button type="submit" class="btn btn-primary" style="width: 100px;"><span class="fa fa-check icon-only"></span> Simpan</button>
		<?php } else { ?>                <a href="<?php echo $config['baseurl'].'index.php?go='.$module.'&do=ubah&id='.$id;?>" class="btn btn-primary" style="width: 100px;"><span class="fa fa-pencil icon-only"></span> Edit</a>
                <?php } ?>		</div>					
		</div>	<!-- konten selesai di sini -->					
		</form>				
		</div>			
				
		</div>	
	</div>
</div>
		