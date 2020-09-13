<?php echo "<?php\n"; ?>
//registerJS($config['baseurl'].'res/autoNumeric/autoNumeric.js');
$action  = 'Detail Data';    
if (isset($_GET['id'])){	
	$id = get('id');		
	$sql = "select * from ".$moduledb." t where id=$id";    
	//echo $sql;	
	$dbedit = doquery($sql);	
	$row = $dbedit[0];
}
<?php echo "?>\n"; ?>
<script language="javascript">
$(document).ready(function() {
	
        });
</script>
<style>    
.right{        
	text-align: right;    
}    
.bold{        
font-weight: 600;    
}
</style>
<div class="row">
	<div class="col-lg-12">	
		<div class="widget">	
			<div class="widget-header  with-footer">		
				<div class="widget-caption">            
					<h4><?php echo "<?php"; ?>  echo $action; <?php echo "?>"; ?></h4>		
				</div>		
			<div class="clearfix"></div>	
			</div>		
<?php
	$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
	$dataschema = doquery($sql);
?>
			<div class="panel-collapse collapse in" id="ft-0">			
				<div class="widget-body">		
							<form class="form-horizontal" role="form" action="" method="post">
								<!-- konten start di sini -->                                        
								<div class="space-12"></div> 
								<?php 
									$field_exclude = array('id','ordering','published');
									foreach($dataschema as $schema){
										if (!in_array($schema['COLUMN_NAME'],$field_exclude)){
								?>
									<div class="form-group">                       
										<div class="col-sm-2 right bold"><?php echo ucwords(str_replace('_',' ',$schema['COLUMN_NAME'])); ?></div>
											<div class="col-sm-3">                           
												<?php echo "<?php"; ?> echo $row['<?php echo $schema['COLUMN_NAME']; ?>']; <?php echo "?>"; ?>  
											</div>
									</div>                    
									<?php } } ?>	            				
									<div class="space-12"></div>                    
									<hr class="separator" />                   
									<div class="form-group">
										<label class="col-sm-2 control-label">&nbsp;</label>
									<div class="col-sm-3">                            
										<a class="btn" href="<?php echo "<?php"; ?> echo $config['baseurl'].'index.php?go='.$module;<?php echo "?>"; ?>">
											<span class="fa fa-arrow-circle-left"></span> Kembali</a>
											<a class="btn btn-primary" href="<?php echo "<?php"; ?> echo $config['baseurl'].'index.php?go='.$module.'&do=ubah&id='.$id; <?php echo "?>"; ?>" style="width: 100px;">
												<span class="fa fa-pencil icon-only"></span> Edit
											</a>
									</div>
									</div>	<!-- konten selesai di sini -->
							</form>
					</div>			
				</div>		
			</div>	
		</div>
	</div>
</div>