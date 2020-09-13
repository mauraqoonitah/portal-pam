<?php

	

	$module 	= 'menu';

	$moduledb 	= 'menu';

	

if (isset($_GET['id'])){

	$id = $_GET['id'];	

	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");

	$row = $dbedit[0];

	$tipe = $row['menutype'];

} else {

	$tipe = $_GET['tipe'];

}







	$sql		= 'select * from menu where menutype="'.$tipe.'" or level=0 order by lft ASC';

	//echo $sql;

	$datainduk 	= doquery($sql);

?>



<script language="javascript">

$(function(){

	$('#content_id').change(function(){

		tipe = "<?php echo $tipe; ?>";

		//if (tipe.indexOf("admin")>-1) {

		//	$('#link').val('index.php?go='+$("#content_id option:selected").text());

		//} else {

			//$('#link').val('index.php?go=page&id='+$(this).val()+'&title='+$("#content_id option:selected").text());	

			

		if ($("#content_id option:selected").text()=='- pilih -'){

			$('#link').val("");

		} else {

			$('#link').val($("#content_id option:selected").text());	

			$('#module_id').val('-');

		}

			

		//}

			

		//}

	});

	

	$('#module_id').change(function(){

		tipe = "<?php echo $tipe; ?>";

		//if (tipe.indexOf("admin")>-1) {

		//	$('#link').val('index.php?go='+$("#module_id option:selected").text());

		//} else {

			//$('#link').val('index.php?go=page&id='+$(this).val()+'&title='+$("#module_id option:selected").text());	

		if ($("#module_id option:selected").text()=='- pilih -'){

			$('#link').val("");

		} else {

			if (tipe=='mainmenu'){

				$('#link').val('modul/'+$("#module_id option:selected").text());	

				$('#content_id').val('-');

			} else {

				$('#link').val('index.php?go='+$("#module_id option:selected").text());

			}

		}

		//}

			

		//}

	});

	$('#menutype').change(function(){



			window.location = 'index.php?go=menu&do=tambah&tipe='+$(this).val();



		});

	$('#title').keyup(function(){

		var aliasnya = $(this).val();

		aliasnya = aliasnya.replace(/\s/g,'-').toLowerCase();

		$('#alias').val(aliasnya);

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

	<div class="form-group">

		<label class="col-sm-2 control-label">Tipe Menu</label>

		<div class="col-sm-7">

			<?php 

				$pilihmenutype = doquery('select menutype,nama_menu from menu_tipe');

				echo widgetbackend('inputselect',array('field'=>'menutype','option'=>$pilihmenutype,'value'=>$tipe,'kosong'=>'- Pilih -','required'=>'required')); 

			?> 

		</div>

	</div>

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Menu Induk</label>

		<div class="col-sm-7">

		<select class="form-control" name="parent_id" id="parent_id">

		<?php foreach($datainduk as $rowinduk){

			if ($rowinduk['id']==$row['parent_id']){

				$default = 'selected="selected"';

			} else {

				$default = '';

			}

			echo '<option value="'.$rowinduk['id'].'" '.$default.'>'.str_repeat('-',intval($rowinduk['level'])).' '.$rowinduk['title'].'</option>';

		 }	?>

		</select>

		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Judul</label>

		<div class="col-sm-7"><input class="form-control" type="text" name="title" id="title" value="<?php echo $row['title']; ?>" style="width: 40em"/></div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Alias</label>

		<div class="col-sm-7"><input class="form-control" type="text" name="alias" id="alias" value="<?php echo $row['alias']; ?>" required="required"/></div>

	</div>





	<?php

	$fieldid = 'module_id';

	global $config;

	

	if (stripos($tipe,'admin')>-1){

		$path 			= $config['basepath'] . 'maintenis/main';

	} else {

		$path 			= $config['basepath'] . 'main';

	}

	

	

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

			$select_image = '<select id="'.$fieldid.'">\n';	

		} else {

			$select_image = '<select class="form-control" id="'.$fieldid.'" name="'.$field.'">\n';

		}

		

			$select_image .= '   <option value="">- pilih -</option>';

        foreach($listDir as $img){

			$selected = '';

			if ($default_value == $img) {

				$selected = ' selected="selected" ';

			}

			$select_image .= '   <option value="'.$img.'" '.$selected.'>'.$img.'</option>\n';

		}

		$select_image .= '</select>';

		

	?>

		<?php

		$datacontent = doquery('select id,title_alias from content where published=1');

		$pilihcontent = array(''=>'- pilih -');

		foreach($datacontent as $rowkonten){

			$pilihcontent[$rowkonten['id']] = $rowkonten['title_alias'];

		}

		?>

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Modul</label>

		<div class="col-sm-7">

		<?php echo $select_image; ?>		

<?php

	if (stripos($tipe,'admin')>-1){

		

	} else {

			

?>

		 atau <strong>Konten</strong>

		<?php echo widgetbackend('inputselect',array('field'=>'content_id','option'=>$pilihcontent)); ?> 

 

<?php		

	} 

	//else {

?>	



		</div>	

	</div>	



<?php //} ?>





	<div class="form-group">

		<label class="col-sm-2 control-label">role</label>

		<div class="col-sm-7">


			<?php 

				$pilihmenutype = doquery('select id,nama_role from menu_role');

				echo widgetbackend('inputselect',array('field'=>'role','option'=>$pilihmenutype,'value'=>$row['role'],'kosong'=>'- Pilih -')); 

			?> 

		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Link</label>

		<div class="col-sm-7"><input class="form-control" type="text" name="link" id="link" value="<?php echo $row['link']; ?>" style="width: 50em"/></div> 

	</div>




	





	<div class="form-group">

		<label class="col-sm-2 control-label" for="published">Published</label>

		<div class="col-sm-3">

		<?php echo widgetbackend('inputselect', array(	'field'	=> 'published',

														'option'=> array('1'=>'Ya','0'=>'Tidak'),

														'value'	=> $row['published'],

														)); ?>

		</div>

	</div>

	



	

	<div class="form-group">

		<label class="col-sm-2 control-label">&nbsp;</label>

		<div class="col-sm-7"><input class="btn btn-primary" type="submit" value="Simpan"/></div>

	</div>	



</form>

</div>			



				



		</div>	



	</div>



</div>

