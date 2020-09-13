<?php
//registerJS($config['baseurl'].'res/autoNumeric/autoNumeric.js');
$module   = 'status';
$moduledb = 'aset_status';

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
                    <label class="col-sm-2 control-label">Nama Status<?php if ($mode_edit) { echo ' *'; } ?></label>
		<div class="col-sm-3">  
<?php	echo widgetbackend('textbox',array('field'    => 'nama_status',
                                                            'mode_edit' => $mode_edit,
                                                            'null'      => 'NO',
                                                            'placeholder'  => 'Nama Status',
                                                            'value'     => $row['nama_status'],
                                                            'maxlength' => '150',
                        ));?>		</div>					
		</div>                    
                    <div class="form-group">						
                    <label class="col-sm-2 control-label">Urutan</label>
                    <div class="col-sm-1">
                        <input type="text" name="ordering" id="ordering" value="<?php
 echo $row['ordering'];?>
" class="form-control"/>
                    </div>
                    </div>
                <?php $arrPubpublished = array('1'=>'Ya','0'=>'Tidak'); ?>                    <div class="form-group">						
                    <label class="col-sm-2 control-label">Published</label>
                    <div class="col-sm-1">
                        <?php echo widgetbackend('inputselectform',array('mode_edit'=>$mode_edit,'field'=>'published','value'=>$row['published'],'kosong'=>'- pilih -','option'=>$arrPubpublished)); ?>                        
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
		