<?php

if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from content where id='".$id."'");
	$row = $dbedit[0];
}
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script language="javascript">
$(function(){
	$('#title').keyup(function(){
		var aliasnya = $(this).val();
		aliasnya = aliasnya.replace(/\s/g,'-').replace(/[^a-zA-Z 0-9\-]+/g,'-').toLowerCase();
		$('#title_alias').val(aliasnya);
	});
});
</script>

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
<!-- konten start di sini -->                                        
		<div class="space-12"></div>  
		
	<div class="form-group">	
		<label class="col-sm-2 control-label">Content Title</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title']; ?>" style="width: 400px;"/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Content Title Alias</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" name="title_alias" id="title_alias" value="<?php echo $row['title_alias']; ?>" style="width: 400px;"/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Image</label>
		<div class="col-sm-7">
		<?php
			echo widgetbackend('image_uploader', array( 
														'field' => 'images',
														'path'	=> '../images/featured',
														'value'	=> $row['images'],
														'asfield'	=> 'true',
														));
		?>		
		</div>	
	</div>	

	<div class="form-group">
		<label class="col-sm-2 control-label">Intro Text</label>
		<div class="col-sm-7">	
		<?php 
		echo widgetbackend('textarea',array( 	'field' => 'intro_text',
												'value' => $row['intro_text'],
												'rows'	=> '20',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
		?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Full Text</label>
		<div class="col-sm-7">
		<?php 
		echo widgetbackend('textarea',array( 	'field' => 'full_text',
												'value' => $row['full_text'],
												'rows'	=> '30',
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
		<label class="col-sm-2 control-label">Featured *tampilkan di hal depan</label>
		<div class="col-sm-7">
		<?php echo widgetbackend('inputselect', array(	'field'	=> 'featured',
														'option'=> array('0'=>'Tidak','1'=>'Ya'),
														'value'	=> $row['featured'],
														)); ?>
		</div>
	</div>

	<div class="form-group">
		 <label class="col-sm-2 control-label">Published</label>
		 <div class="col-sm-7">
		 <?php echo widgetbackend('inputselect', array(	'field'	=> 'published',
														'option'=> array('1'=>'Ya','0'=>'Tidak'),
														'value'	=> $row['published'],
														)); ?>

		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-sm-7">
			<input type="submit" class="btn btn-primary" value="Simpan"/>
		</div>	
	</div>	

</form>
</div>			

				

		</div>	

	</div>

</div>
<script type="text/javascript">
				CKEDITOR.replace('intro_text');
				CKEDITOR.replace('full_text');
</script>		