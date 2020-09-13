<?php
?>

<?php

$module   = 'hak_akses';
$moduledb = 'hak_akses';


if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");
	$row = $dbedit[0];
}

	

?>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
			<div class="x_title">
                <h4><a href="index.php?go=<?php echo $module; ?>" title="Batal" alt="Batal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> </a> EDIT HALAMAN<br> </h4>		
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>
                    </li>                                        
                </ul>
                <div class="clearfix"></div>
            </div>

<div class="x_content"> 
<form class="form-horizontal" name="form_<?php echo $module; ?>" action="" method="POST">
	
			<div class="form-group">
			<label class="col-sm-2 control-label">Nama Module</label>
			<div class="col-sm-7">
					<?php
					$value_field = $row['module'];
					$fieldid = 'module';
					$field = 'module';
					global $config;
					
					
					
					$path 			= $config['basepath'] . 'maintenis/main';
					$listDir = array();
						if($handler = opendir($path)) {
							while (($sub = readdir($handler)) !== FALSE) {
								if ($sub != "." && $sub != ".." && $sub != "Thumb.db" && $sub != "Thumbs.db" && stripos($sub,'.php')>0) {
									
									if(is_file($path."/".$sub)) {
										$sub = str_replace('.php','',$sub);
										$listDir[] = $sub;
									}
								}
							}
							closedir($handler);
						}
						if ($asfield=='false'){
							$select_image = '<select class="form-control" id="'.$fieldid.'">\n';	
						} else {
							$select_image = '<select class="form-control" id="'.$fieldid.'" name="'.$field.'">\n';
						}
						
							$select_image .= '   <option value="">- pilih -</option>';
						foreach($listDir as $img){
							$selected = '';
							if ($value_field == $img) {
								$selected = ' selected="selected" ';
							}
							$select_image .= '   <option value="'.$img.'" '.$selected.'>'.$img.'</option>\n';
						}
						$select_image .= '</select>';
						
					?>
			<!--<input type="text" name="module" id="module" value="<?php echo $row['module']; ?>" style="width:400px;"/>-->
			<?php echo $select_image; ?>		
				</div>	
			</div>	
										
			<div class="form-group">
			<label class="col-sm-2 control-label">Jenis Hak Akses</label>
				<div class="col-sm-7">
					<?php //echo widgetbackend('inputselect',array('field'=>'allow_deny','value'=>$row['allow_deny'],'option'=>array('empty'=>'- pilih -','ALLOW'=>'ALLOW','DENY'=>'DENY'))); ?>
					<?php echo widgetbackend('inputselect',array('field'=>'allow_deny','value'=>$row['allow_deny'],'option'=>array('DENY'=>'DENY','ALLOW'=>'ALLOW'))); ?>		
				</div>	
			</div>	
										
			<div class="form-group">
			<label class="col-sm-2 control-label">Role</label>
				<div class="col-sm-7">
					<?php $dataid_role = doquery('select id,nama_role from user_role order by id asc'); ?>
					<?php echo widgetbackend('inputselect',array('field'=>'id_role','value'=>$row['id_role'],'kosong'=>'- pilih -','option'=>$dataid_role)); ?>				
				</div>	
			</div>	
						
			<?php
			/*			<div class="row">
						<label>User</label>
			*/
			?>
			<?php //$dataid_user = doquery('select id,email from user order by id asc'); ?>
			<?php //echo widgetbackend('inputselect',array('field'=>'id_user','value'=>$row['id_user'],'kosong'=>'- pilih -','option'=>$dataid_user)); ?>		
			<?php
			//</div>	
			?>
										
			<div class="form-group">
			<label class="col-sm-2 control-label">Action</label>
				<div class="col-sm-7">
					<?php
					if (strlen($row['action'])>0){
						$default_isi = $row['action'];
					} else {
						$default_isi = '*';
					}
					?>
				<input type="text" class="form-control" name="action" id="action" value="<?php echo $default_isi; ?>"/> note: isi spesifik action "do" seperti "tambah" atau tanda * untuk semua action
				</div>
			</div>
										
				
			<div class="form-group">
				<label class="col-sm-2 control-label">&nbsp;</label>
				<div class="col-sm-7">
					<input type="submit" value="Simpan" class="btn btn-primary" />
				</div>	
			</div>	


</form>				

		</div>			

				

		</div>	
 
	</div>

</div>