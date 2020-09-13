<?php global $config; ?>



<script type="text/javascript" src="ckeditor/ckeditor.js"></script>



<link rel="stylesheet" type="text/css" href="<?php echo $config['baseurl'].'res/'; ?>jquery.tokenize.css">



<script src="<?php echo $config['baseurl'].'res/'; ?>jquery.tokenize.js"></script>



<?php











$selected_tag = array();        



if (isset($_GET['id'])){



    $id = $_GET['id'];	



    $dbedit = doquery("select n.*,c.nama_category_alias from news n left join news_category c on c.id=n.id_kategori where n.id='".$id."' order by n.created desc");



    $row = $dbedit[0];







    $selected_tag = doquery('select id,id_tag from news_tag where id_news='.q($id));



	



	



}



?>







<script language="javascript">



$(document).ready(function() {



	



	/*



	String.prototype.replaceAll = function(search, replacement) {



		var target = this;



		return target.replace(new RegExp(search, 'g'), replacement);



	};



	*/



	$('#title').keyup(function(){



		var aliasnya = $(this).val();



		aliasnya = aliasnya.replace(/\s/g,'-').replace(/[^a-zA-Z 0-9\-]+/g,'-').toLowerCase();



		$('#title_alias').val(aliasnya);



	});



	



	//$("#form1").submit(function(){



	//$('#btn_simpan').click(function(){



	   



	  // var input = $('#full_text').val();



	   //alert(decodeURI(input));



	   //input = decodeURI(input);



	   //var input_modif = input.replaceAll('<iframe','[iframe');



	  // var input_modif = input_modif.replaceAll('</iframe>','[/iframe]');



	   //var input_modif = input_modif.replaceAll('<embed','[embed');



	   //var input_modif = input_modif.replaceAll('</embed>','[/embed]');



	   //var input_modif = input_modif.replaceAll('"','"');



	   //alert(input_modif);



	   //$('#full_text').val(input_modif);



	   //alert($('#full_text').val());



	   //$('#form1').submit();



	   //return false;



	//});



	//$('#btn_simpan').click(function(){



		//alert('tes');



		//var data = $('#form1').serialize();



		



		//return false;



	//});



});



</script>







<div class="row">







	<div class="col-md-12 col-sm-12 col-xs-12">







        <div class="x_panel">







			<div class="x_title">







                <h4><a href="index.php?go=<?php echo $module; ?>" title="Batal" alt="Batal"><i class="fa fa-arform-group-circle-left" aria-hidden="true"></i> </a> EDIT NEWS<br> </h4>		







                <ul class="nav navbar-right panel_toolbox">



                    <li>







                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>







                    </li>                                        







                </ul>







                <div class="clearfix"></div>







            </div>







		<div class="x_content">      



<form name="form1" class="form-horizontal" role="form" action="" method="post">	







	<div class="form-group">



		<label class="col-sm-2 control-label">News Title</label>



		<div class="col-sm-3"><input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" style="width: 400px;"/></div>



	</div>



	<div class="form-group">



		<label class="col-sm-2 control-label">News Title Alias</label>



		<div class="col-sm-3"><input type="text" name="title_alias" id="title_alias" value="<?php echo $row['title_alias']; ?>" style="width: 400px;"/></div>



	</div>



    <?php $data_kategori = doquery('select * from news_category where level>0 order by lft asc'); ?>



    <div class="form-group">



		<label class="col-sm-2 control-label">Kategori</label>



		<div class="col-sm-3">



                <?php echo widgetbackend('inputselect',array(	'field'	=> 'id_kategori',



                                                                'option'=> $data_kategori,



                                                                'value'	=> $row['id_kategori'],



                                                                )); ?>



		



		</div>



	</div>



    



	<!-- <div class="form-group">



		<label class="col-sm-2 control-label">Illustration Image</label>



		<div class="col-sm-3">



		<?php



			echo widgetbackend('image_uploader', array( 



                                                                    'field' => 'img_ilustrasi',



                                                                    'path'	=> '../images/news',



                                                                    'value'	=> $row['img_ilustrasi'],



                                                                    'asfield'	=> 'true', 




                                                                    ));



		?>	* Recommended: 1200 x 630 atau 600 x 315 pixel



		</div>



	</div> -->







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



    



    <!-- <div class="form-group">



        <label class="col-sm-2 control-label">Tag </label>



		<div class="col-sm-7">



            <?php $data_tag = doquery("select id,nama_tag from tag order by nama_tag ASC"); ?>



            <?php echo widgetbackend('multitag',array(  'field' => 'tag[]',



                                                        'field_ref'=> 'id_tag',



                                                        'value' => $selected_tag,



                                                        'kosong'=> '- pilih -',



                                                        'option'=> $data_tag,



                                                        'style' => 'max-width:200px;cols:100',



                                                        'class' => 'tokenize-sample ')); ?>



        



		</div>



    </div> -->



	



	<!-- <div class="form-group">



		<label class="col-sm-2 control-label">Ordering</label>



		<div class="col-sm-3"><input type="text" name="ordering" id="ordering" value="<?php echo $row['ordering']; ?>"/></div>



	</div> -->







	



	<div class="form-group">



		<label class="col-sm-2 control-label">Tampilkan di depan</label>



		<div class="col-sm-3">



		<?php echo widgetbackend('inputselect', array(	'field'	=> 'featured',



														'option'=> array('0'=>'Tidak','1'=>'Ya'),



														'value'	=> $row['featured'],



														)); ?>



		</div>



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



		<div class="col-sm-3">



			<a href="index.php?go=news" class="btn btn-danger">Tutup</a>



			<button type="submit" id="btn_simpan" class="btn btn-primary">Simpan</button>



			



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