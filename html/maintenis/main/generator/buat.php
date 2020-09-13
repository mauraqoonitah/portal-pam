<?php
//debugvar($_SESSION);
	$sqlnya 	= 'show tables from '.$config['database'];
	$nama2table = doquery($sqlnya);

	//get nama template generator
	$field 			= 'nama_template';
	$fieldid		= str_replace(' ','_',$field);

	$path = $config['basepath'] . 'main/generator';
	$listDir = array();
    if($handler = opendir($path)) {
        while (($sub = readdir($handler)) !== FALSE) {
            if ($sub != "." && $sub != ".." && $sub != "Thumb.db" && $sub != "Thumbs.db") {
                if(is_file($path."/".$sub)) {
                    
                } else {
					$listDir[] = $sub;
				}
            }
        }
        closedir($handler);
    }
	$select_template = '<select name="'.$field.'" class="form-control" id="'.$fieldid.'">\n';
		//$select_template .= '   <option value="">- pilih -</option>';
    foreach($listDir as $img){
		$selected = '';
		if ($_SESSION['temp_gen']['nama_template'] == $img) {
			$selected = ' selected="selected" ';
		}
		$select_template .= '   <option value="'.$img.'" '.$selected.'>'.$img.'</option>\n';
	}
	$select_template .= '</select>';	
?>
<style>
input.checkbox-slider[type="checkbox"] ~ .text::before {
    content: "Tidak";
}
input.checkbox-slider[type="checkbox"]:checked ~ .text::before {
    content: "Ya";
}
</style>

<div class="page-title">
    <div class="title_left">
        <h3>Generator</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
    </span>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Generator</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form name="form_<?php echo $module; ?>" class="form-horizontal" role="form"  action="" method="POST">
	<div class="form-group">						
		<label class="col-sm-2 control-label">Judul Module</label>						
		<div class="col-sm-3">  
			<input type="text" class="form-control" name="judul_module" id="judul_module" value="<?php echo $_SESSION['temp_gen']['judul_module'];?>"/>
		</div>
	</div>
	<div class="space-12"></div>  
	<div class="form-group">						
		<label class="col-sm-2 control-label">Nama Module <br>(tanpa spasi)</label>
		<div class="col-sm-3">  
			<input type="text" class="form-control" name="nama_module" id="nama_module" value="<?php echo $_SESSION['temp_gen']['nama_module'];?>"/>
		</div>
	</div>
	<div class="form-group">						
		<label class="col-sm-2 control-label">Nama Table</label>
		<div class="col-sm-3">  
		
		
			<select class="form-control" name="nama_table">
				<?php foreach ($nama2table as $row){
					if ($row['Tables_in_'.$config['database']]==$_SESSION['temp_gen']['nama_table'])
							$selected = 'selected="selected"';
						else $selected = '';
					
					echo '<option '.$selected.' value="'.$row['Tables_in_'.$config['database']].'">'.$row['Tables_in_'.$config['database']].'</option>';
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">						
		<label class="col-sm-2 control-label">Template Code</label>
		<div class="col-sm-3">
			<?php echo $select_template; ?>
		</div>
	</div>
	<div class="form-group">						
		<label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                <div class="checkbox">
			
				<label>
                       
                       <span class="text"> <input type="checkbox" name="addtomenu" value="addtomenu"> Tambahkan ke menu admin</span>
                
			</label>
			</div>
			</div>
	</div>
	<div class="form-group">						
		<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-4">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="front" checked="checked" value="front"/> 
					<span class="text"> Generate ke Front End</span>
				</label>
			</div>
			</div>
	</div>
	<div class="form-group">						
		<label class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-sm-3">
			<input type="submit" class="form-control"  value="Generate"/>
		</div>
	</div>
</form>

                                </div>
                            </div>
                           </div>
                         </div>
