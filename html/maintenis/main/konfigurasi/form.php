<!-- VER 1.2 CONFIG SUDAH DISETTING DI konfigurasi.php 03062014-->

<?php

	global $module,$config;

	

	include_once($config['basepath'] . 'main/inc/konfigurasi.php');

	$config['webtitle'] = $config['webtitle'] . ' - Konfigurasi Sistem';

	//echo $config['basepath'] . 'main/inc/konfigurasi.php';

?>

		<script language="javascript">



			$(document).ready(function() {



				



			});



		</script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>



<div class="row">



	<div class="col-md-12 col-sm-12 col-xs-12">



        <div class="x_panel">



			<div class="x_title">



                <h4>KONFIGURASI SISTEM</h4>		



                <ul class="nav navbar-right panel_toolbox">



                    <li>



                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>



                    </li>                                        



                </ul>



                <div class="clearfix"></div>



            </div>



		<div class="x_content">                



<form name="konfigurasi" class="form-horizontal" role="form" action="" method="post">					

	<!-- konten start di sini -->                                        

	<div class="space-12"></div>  

	<div class="form-group">	

		<label class="col-sm-2 control-label">Nama Website</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="webname" id="config_webname" value="<?php echo $config['webname']; ?>" style="width: 40%;"/></div>

	</div>	

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Judul Website</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="websitetitle" id="config_webtitle" value="<?php echo $config['websitetitle']; ?>" style="width: 40%;"/></div>

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">Tag Line</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="tagline_header" id="config_tagline_header" value="<?php echo $config['tagline_header']; ?>" style="width: 40%;"/></div>

	</div>





	<div class="form-group">

		<label class="col-sm-2 control-label">Welcome Message</label>

		<div class="col-sm-7"><textarea class="form-control" name="welcome_message" id="welcome_message" cols="40" rows="5"><?php echo $config['welcome_message']; ?></textarea></div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Url Welcome Message</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="url_welcome_message" id="url_welcome_message" value="<?php echo $config['url_welcome_message']; ?>" style="width: 40%;"/></div>

	</div>



	

		<div class="form-group">

		<label class="col-sm-2 control-label">logo FrontEnd(.png)</label>

		<div class="col-sm-7">

		<?php

			echo widgetbackend('image_uploader', array( 

														'field' => 'logoheader', //field_name

														'path'	=> '../images/header',

														'jenis'	=> 'header',

														'value'	=> $config['logoheader'],

														'asfield'	=> 'true',

														));

		?>		

		</div>

	</div>

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Logo BeckEnd(.png)</label>

		<div class="col-sm-7">

		<?php

			echo widgetbackend('image_uploader', array( 

														'field' => 'fotoheader', //field_name

														'path'	=> '../images/header',

														'jenis'	=> 'header',

														'value'	=> $config['fotoheader'],

														'asfield'	=> 'true',

														));

		?>		

		</div>

	</div>



	<div class="form-group">

		<label class="col-sm-2 control-label">Logo Favicon(.png)</label>

		<div class="col-sm-7">

		<?php

			echo widgetbackend('image_uploader', array( 

														'field' => 'favicon', //field_name

														'path'	=> '../images/header',

														'jenis'	=> 'header',

														'value'	=> $config['favicon'],

														'asfield'	=> 'true',

														));

		?>		

		</div>

	</div>





	<hr>



	<div class="form-group">

		<label class="col-sm-2 control-label">Host Mail</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="host_mail" id="host_mail" value="<?php echo $config['host_mail']; ?>" style="width: 40%;"/></div>

	</div>



	<div class="form-group">

		<label class="col-sm-2 control-label">Port</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="port_mail" id="port_mail" value="<?php echo $config['port_mail']; ?>" style="width: 40%;"/></div>

	</div>



	<div class="form-group">

		<label class="col-sm-2 control-label">From Name</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="from_name_mail" id="from_name_mail" value="<?php echo $config['from_name_mail']; ?>" style="width: 40%;"/></div>

	</div>	

		<div class="form-group">

		<label class="col-sm-2 control-label">Subject Mail</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="subject_mail" id="subject_mail" value="<?php echo $config['subject_mail']; ?>" style="width: 40%;"/></div>

	</div>	

	<div class="form-group">

		<label class="col-sm-2 control-label">Username Mail</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="username_mail" placeholder="sebagai pengirim" id="username_mail" value="<?php echo $config['username_mail']; ?>" style="width: 40%;"/></div>*email sebagai pengirim

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">Password Mail</label>

		<div class="col-sm-7"><input type="password" class="form-control" name="password_mail" id="password_Mail" value="<?php echo $config['password_mail']; ?>" style="width: 40%;"/></div>

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">Email Sistem Website</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="webemail" placeholder="menampilkan email di contact" id="config_webemail" value="<?php echo $config['email']; ?>" style="width: 40%;"/></div>*email yang ditampilkan pada menu contact 

	</div>	

	

	<div class="form-group">

		<label class="col-sm-2 control-label">CC Email Sistem Website</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="cc" id="config_cc" placeholder="isi sebagai penerima email" value="<?php echo $config['cc']; ?>" style="width: 40%;"/></div>*ini sebagai penerima 

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">CC 2</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="cc2" id="config_cc" placeholder="isi sebagai penerima email" value="<?php echo $config['cc2']; ?>" style="width: 40%;"/></div>*ini sebagai penerima 2

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">CC 3</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="cc3" id="config_cc" placeholder="isi sebagai penerima email" value="<?php echo $config['cc3']; ?>" style="width: 40%;"/></div>*ini sebagai penerima  3

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">CC 4</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="cc4" id="config_cc" placeholder="isi sebagai penerima email" value="<?php echo $config['cc4']; ?>" style="width: 40%;"/></div>*ini sebagai penerima  4

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">CC 5</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="cc5" id="config_cc" placeholder="isi sebagai penerima email" value="<?php echo $config['cc5']; ?>" style="width: 40%;"/></div>*ini sebagai penerima  5

	</div>	

			

	<hr>							

	<div class="form-group">

		<label class="col-sm-2 control-label">Alamat Kontak</label>

		<div class="col-sm-7"><textarea class="form-control" name="alamat_kontak" id="alamat_kontak" cols="40" rows="5"><?php echo $config['alamat_kontak']; ?></textarea>	</div>	

	</div>

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Telepon</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="telp" id="config_telp" value="<?php echo $config['telp']; ?>" style="width: 40%;"/></div>

	</div>		

		<div class="form-group">

		<label class="col-sm-2 control-label">Kontak</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="whatsapp" id="config_whatsapp" value="<?php echo $config['whatsapp']; ?>" style="width: 40%;"/></div>

	</div>	



		<div class="form-group">

		<label class="col-sm-2 control-label">Sms</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="sms" id="config_sms" value="<?php echo $config['sms']; ?>" style="width: 40%;"/></div>

	</div>		



			<div class="form-group">

		<label class="col-sm-2 control-label">Pin BB</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="bb" id="config_bb" value="<?php echo $config['bb']; ?>" style="width: 40%;"/></div>

	</div>		



			<div class="form-group">

		<label class="col-sm-2 control-label">Fax</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="fac" id="config_fax" value="<?php echo $config['fax']; ?>" style="width: 40%;"/></div>

	</div>		

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Facebook</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="facebook" id="config_telp" value="<?php echo $config['facebook']; ?>" style="width: 40%;"/></div>

	</div>	

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Twitter</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="twitter" id="config_telp" value="<?php echo $config['twitter']; ?>" style="width: 40%;"/></div>

	</div>	

	

		

	<div class="form-group">

		<label class="col-sm-2 control-label">Meta Title</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo $config['meta_title']; ?>" style="width: 60%;"/></div>

	</div>	

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Meta Description</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="meta_description" id="meta_description" value="<?php echo $config['meta_description']; ?>" style="width: 60%;"/></div>

	</div>	

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Meta Keyword</label>

		<div class="col-sm-7"><input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="<?php echo $config['meta_keyword']; ?>" style="width: 60%;"/></div>

	</div>	

	

	<div class="form-group">

		<label class="col-sm-2 control-label">Footer Website</label>

		<div class="col-sm-7"><textarea class="form-control" name="webfooter" id="webfooter" cols="40" rows="5"><?php echo $config['webfooter']; ?></textarea></div>

	</div>	

<hr>

	<div class="form-group">

		<label class="col-sm-2 control-label">MAP</label>


     <iframe src="<?php echo $config['coordinat']; ?>" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">URL Map / Peta</label>

		<div class="col-sm-7"><textarea class="form-control" name="coordinat" id="coordinat" ><?php echo $config['coordinat']; ?></textarea></div>

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">nama tempat</label>

		<div class="col-sm-7"><textarea class="form-control" name="nama_tempat" id="nama_tempat" ><?php echo $config['nama_tempat']; ?></textarea></div>

	</div>	



	<div class="form-group">

		<label class="col-sm-2 control-label">adreas tempat</label>

		<div class="col-sm-7"><textarea class="form-control" name="nama_jalan" id="nama_jalan" ><?php echo $config['nama_jalan']; ?></textarea></div>

	</div>	

<hr>



	

	<div class="form-group">

		<label class="col-sm-2 control-label">&nbsp;</label>

		<div class="col-sm-7"><button type="submit" class="btn btn-primary" style="width: 100px;"><span class="fa fa-check icon-only"></span> Simpan</button></div>

	</div>	

	



</form>				



		</div>			

		</div>			



				



		</div>	



	</div>

<?php

function br2nl($string)

{

    return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);

}	

?>

<script type="text/javascript">

	

</script>