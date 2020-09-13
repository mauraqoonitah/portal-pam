<?php

if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from testimoni where id='".$id."'");
	$row = $dbedit[0];
}
?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
		<label class="col-sm-2 control-label">Name</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>"/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">E-mail</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Testimoni</label>
		<div class="col-sm-7">
			<?php 
		echo widgetbackend('textarea',array( 	'field' => 'testimoni',
												'value' => $row['testimoni'],
												'rows'	=> '15',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
		?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Ordering</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" name="ordering" id="ordering" value="<?php echo $row['ordering']; ?>"/>
		</div>
	</div>
	
	<div class="form-group">
		 <label class="col-sm-2 control-label">Published</label>
		 <div class="col-sm-7">
  			<select class="form-control" name="published" id="published">
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

<script type="text/javascript">
				CKEDITOR.replace('testimoni');
</script>
