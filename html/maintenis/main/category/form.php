<?php
//registerJS($config['baseurl'].'res/autoNumeric/autoNumeric.js');
$module   = 'category';
$moduledb = 'ec_category';

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
                    <label class="col-sm-2 control-label">Nama Category<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'nama_category',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Nama Category',
                                                            'value'     => $row['nama_category'],
                                                            'maxlength' => '255',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Nama Category Alias<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'nama_category_alias',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Nama Category Alias',
                                                            'value'     => $row['nama_category_alias'],
                                                            'maxlength' => '255',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Deskripsi Category<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php    echo widgetbackend('textarea',array('field'    => 'deskripsi_category',
                                                            'mode_edit' => $mode_edit,
                                                            'rows' 		=> '5',
                                                            'value'     => $row['deskripsi_category'],
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Icon<?php if ($mode_edit) { echo ''; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'icon',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'YES',
                                                            'placeholder'  => 'Icon',
                                                            'value'     => $row['icon'],
                                                            'maxlength' => '255',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Parent  <?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'parent_id',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Parent  ',
                                                            'value'     => $row['parent_id'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Level<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'level',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Level',
                                                            'value'     => $row['level'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Lft<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'lft',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Lft',
                                                            'value'     => $row['lft'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Rgt<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'rgt',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Rgt',
                                                            'value'     => $row['rgt'],
                                                            'maxlength' => '',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Root<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'root',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Root',
                                                            'value'     => $row['root'],
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
                <?php $arrPubpublished = array('1'=>'Ya','0'=>'Tidak'); ?>                    <div class="form-group">						
                    <label class="col-sm-2 control-label">Published</label>
                    <div class="col-sm-1">
                        <?php echo widgetbackend('inputselect',array( 'field'=>'published',
                                                    'value'=>$row['published'],
                                                    'mode_edit'=>$mode_edit,
                                                    'kosong'=>'- pilih -',
                                                    'option'=>$arrPubpublished)); ?>                        
                    </div>
                    </div>
                		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Frontend<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'frontend',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Frontend',
                                                            'value'     => $row['frontend'],
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
		<?php if ($mode_edit=='true') { ?>		<button type="submit" class="btn btn-primary" style="width: 100px;"><span class="fa fa-check icon-only"></span> Simpan</button>
		<?php } else { ?>                <a href="<?php echo $config['baseurl'].'index.php?go='.$module.'&do=ubah&id='.$id;?>" class="btn btn-primary" style="width: 100px;"><span class="fa fa-pencil icon-only"></span> Edit</a>
                <?php } ?>		</div>					
		</div>	<!-- konten selesai di sini -->					
		</form>				
		</div>			
				
		</div>	
	</div>
</div>
		