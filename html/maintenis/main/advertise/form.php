<?php



$module   = 'advertise';

$moduledb = 'iklan';





if (isset($_GET['id'])){

	$id = $_GET['id'];	

	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");

	$row = $dbedit[0];

}

if (isset($_POST['submit'])) {
//    disini anda menangkap variabel form, melakukan validasi dan menginsert ke database
//    dalam contoh ini saya tidak akan melakukan aksi tersebut dan aksi akan saya anggap berhasil
    
//    sebelum redirect ke tabel user, daftarkan session pesan
    $_SESSION['pesan'] = 'penambahan data berhasil';
    echo '<script>window.location="user.php"</script>';
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

			<label class="col-sm-2 control-label">Name</label>

				<div class="col-sm-7">

					<input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>"/>

				</div>	

			</div>	

										

			<div class="form-group">

			<label class="col-sm-2 control-label">Iklan</label>

			<div class="col-sm-7">

			<?php

				echo widgetbackend('image_uploader', array( 

															'field' => 'iklan',

															'path'	=> 'images/iklan',

															'value'	=> $row['iklan']

															));

			?>

		

			</div>	

			</div>	

										

			<div class="form-group">

			<label class="col-sm-2 control-label">Url</label>

				<div class="col-sm-7">

					<input type="text" class="form-control" name="url" id="url" value="<?php echo $row['url']; ?>"/>

				</div>	

			</div>	

	<!--									

			<div class="row">

			<label>Created</label>



			<input type="text" name="created" id="created" value="<?php echo $row['created']; ?>"/>

		

				</div>	

										

	-->								

									

			<div class="form-group">

				<label class="col-sm-2 control-label">Ordering</label>

				<div class="col-sm-7">

					<input type="text" class="form-control" name="ordering" value="<?php echo $row['ordering']; ?>" style="width: 50px;"/>

				</div>

			</div>



			<div class="form-group">

				<label class="col-sm-2 control-label">Published</label>

				<div class="col-sm-7">

				<?php

					echo widgetbackend('inputselect',	array('field'=>'published',

												'option'=>array('1'=>'Ya','0'=>'Tidak'))

								 ); ?>

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