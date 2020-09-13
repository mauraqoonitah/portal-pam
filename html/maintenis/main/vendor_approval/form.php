<?php
//registerJS($config['baseurl'].'res/autoNumeric/autoNumeric.js');
$module   = 'vendor_approval';
$moduledb = 'user';

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
                    <label class="col-sm-2 control-label">Email<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'email',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Email',
                                                            'value'     => $row['email'],
                                                            'maxlength' => '100',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Username<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'username',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Username',
                                                            'value'     => $row['username'],
                                                            'maxlength' => '100',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Passwd<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'passwd',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Passwd',
                                                            'value'     => $row['passwd'],
                                                            'maxlength' => '50',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Salt<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'salt',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Salt',
                                                            'value'     => $row['salt'],
                                                            'maxlength' => '30',
                        ));?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Role<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php $datarole = doquery('select id,nama_role from user_role order by ordering asc'); ?>
<?php echo widgetbackend('inputselect',array('field'=>'role','value'=>$row['role'],'kosong'=>'- pilih -','option'=>$datarole)); ?>		</div>					
		</div>                    
		
		<div class="form-group">						
                    <label class="col-sm-2 control-label">Approved<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'approved',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Approved',
                                                            'value'     => $row['approved'],
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
                        <?php echo widgetbackend('inputselect',array('field'=>'published','value'=>$row['published'],'kosong'=>'- pilih -','option'=>$arrPubpublished)); ?>                        
                    </div>
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
		