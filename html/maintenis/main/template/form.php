<?php

if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from template where id='".$id."'");
	$row = $dbedit[0];

} else {

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
		<label class="col-sm-2 control-label">Nama Template</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" name="nama_template" id="nama_template" value="<?php echo $row['nama_template']; ?>" class="inputtext" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Default</label>
		<div class="col-sm-7">
			<select class="form-control" name="default_template">
				<option value="" <?php if ($row['default_template']=='') echo 'selected="selected"';?>>- pilih -</option>
				<option value="1" <?php if ($row['default_template']=='1') echo 'selected="selected"';?>>Ya</option>
				<option value="0" <?php if ($row['default_template']=='0') echo 'selected="selected"';?>>Tidak</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-sm-7">
			<input type="submit" value="Simpan" class="btn btn-primary"/>
		</div>	
	</div>	

</form>				

		</div>			

				

		</div>	
 
	</div>

</div>