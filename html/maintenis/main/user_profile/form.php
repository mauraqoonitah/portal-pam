<script language="javascript">
$(function(){
	var email = '<?php echo $akun["email"]; ?>'
	var is_pwdsama= false;
	var is_pwdmin = false;
	var is_ok_email = false;
	var is_setuju = false;
	
	if (email.length>0) {
		is_edit = true;
	}
	
	function validateEmail(sEmail) {
  	var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

  		if(!sEmail.match(reEmail)) {
    		return false;
  		} else {
			return true;
		}
	}

	$('#reg_email').change(function(){
		
		if (!validateEmail($('#reg_email').val())){
			$('#error_reg_email').html('<img src="images/warning.png" style="vertical-align:middle;"> Email tidak valid');
			is_ok_email = false;
			return false;
		} else {
			
			$('#error_reg_email').html('<img src="images/ajax-loader.gif">');
		
			var datanya = 'cekemail='+$('#reg_email').val();
		
			$.ajax({
				url:'index.php?go=jx_cek_email',
		        type:'post',
		        cache : false,
		        data: datanya,
		        success: function(responsetext) {	
							$('#error_reg_email').html(responsetext);
							if (responsetext.indexOf('tick')!=-1){
								is_ok_email = true;
							} else {
								is_ok_email = false;
							}
							
	            }
			});
		}
	});
	
	$('.password').keyup(function(){
		if ($('#reg_password').val().length>0 && $('#reg_passwordconfirm').val().length>0){
			if ($('#reg_password').val()!=$('#reg_passwordconfirm').val()){
				$('#error_reg_passwordconfirm').html('<img src="images/warning.png" style="vertical-align: middle;"> password tidak sama');
				is_pwdsama = false;
			} else {
				$('#error_reg_passwordconfirm').html('<img src="images/tick.png" style="vertical-align: middle;">');
				is_pwdsama = true;
			}
		}
	});
	
	$('#reg_password').change(function(){
		if ($('#reg_password').val().length<6){
			$('#error_reg_password').html('<img src="images/warning.png" style="vertical-align: middle;"> password minimal 6 karakter');	
			is_pwdmin = false;
		} else {
			$('#error_reg_password').html('<img src="images/tick.png" style="vertical-align: middle;">');
			is_pwdmin = true;
		}
	});
	
	$('#submit').click(function(){
		if ($('#reg_setuju').is(':checked')){
			is_setuju = true;
		} else {
			is_setuju = false;
		}
		
		if (is_edit){
			is_setuju = true;
			if ($('#reg_password').val().length==0 && $('#reg_passwordconfirm').val().length==0){
				is_pwdmin = true;
				is_pwdsama = true;
			}
			is_ok_email = true;
		}
		
		if (is_pwdmin && is_pwdsama && is_ok_email && is_setuju) {
			return true;
		} else {
			if (!is_setuju){
				alert('Anda belum setuju dengan syarat dan kondisi');
			} else {
				alert('Silakan cek isian yang belum benar');	
			}			
			return false;
		}
		
	});
});
</script>

<div class="row">
<div class="col-lg-12">
	<div class="portlet">
	<div class="portlet-heading dark">
		<div class="portlet-title">
			<h4>Form Profile User</h4>
		</div>
		<div class="clearfix"></div>
	</div>
		<div class="panel-collapse collapse in" id="ft-0">
			<div class="portlet-body">
				<div class="form-horizontal" role="form">
				<!-- konten start di sini -->
<form name="form_register" action="" method="POST">




<div class="wide form">
<fieldset style="width: 95%">
<legend accesskey=I> Informasi Login </legend>

    <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-4">
            <input type="email" name="reg_email" id="reg_email" placeholder="Username" value="<?php echo $akun['email'];?>" class="form-control" required="required" style="width: 25em;" maxlength="100" <?php if (strlen($akun['email'])>0) echo 'readonly="readonly"'; ?>/><span id="error_reg_email"></span>
        </div>
    </div>

  

	
					

</fieldset>
<fieldset style="width: 100%">
<legend accesskey=P> Informasi Personal </legend>



	<div class="form-group">
								<label class="col-sm-2 control-label">Foto Profil</label>
	<div class="col-sm-4">
	<?php $foto = $config['baseurl'].'attachment/'; ?>
	<?php
if($profile['file_upload']==''){?>

	<img src="<?php echo $foto; ?>user_profile/avatar.jpg" height="200px" width="200px" alt="">
<?php } else {?>

	<img src="<?php echo $foto; ?><?php echo $profile['file_upload'];?>" height="200px" width="200px" alt="">
<?php } ?>
	
	</div>
 </div>			
	<div class="form-group">			

								<label class="col-sm-2 control-label"></label>

								<div class="col-sm-6" style="padding-top: 7px;">
								
                                <?php echo widget(  'file_uploader', 
                                            array(	'field'		=> 'file_upload',
                                                    'path'		=> 'attachment',
                                                    'disabled'  => $disabled_edit,
                                                    'value'		=> $profile['file_upload'],
                                      ));
                                ?>

							
								</div>									
							</div>

     <div class="form-group">                        
  
   
        <label class="col-sm-2 control-label">Nama Lengkap *</label>
        <div class="col-sm-4">
            <input type="text" name="reg_namalengkap" id="reg_namalengkap" class="form-control" value="<?php echo $profile['nama_lengkap']; ?>" style="width: 30em" required="required" placeholder="Nama Lengkap" maxlength="100"/> <small>* wajib diisi</small>
        </div>
           
                        </div>
                        </div>

                        
    <div class="form-group">
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Telepon / HP *</label>
        <div class="col-sm-4">
            <input type="text" name="reg_telepon" id="reg_telepon" class="form-control" value="<?php echo $profile['telepon']; ?>" style="width: 30em" required="required" placeholder="Telepon / HP" maxlength="100"/> <small>* wajib diisi</small>
                
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Email *</label>
        <div class="col-sm-4">
            <input type="text" name="reg_email_kontak" id="reg_email_kontak" class="form-control" value="<?php echo $profile['email_kontak']; ?>" style="width: 30em" required="required" placeholder="Email" maxlength="100"/> <small>* wajib diisi</small>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">No fax</label>
        <div class="col-sm-4">
            <input type="text" name="reg_no_fax" id="reg_no_fax" class="form-control" value="<?php echo $profile['no_fax']; ?>" style="width: 30em" placeholder="no_fax" maxlength="100"/>
        </div>
    </div>
</fieldset>
	<br/>
	<div class="row">
		<label class="col-sm-2 control-label">&nbsp;</label>
        
		<?php 
		
		if (strlen($akun['email'])>0){
			echo '<input type="submit" value="Update" id="update" class="btn btn-primary" />';
		} else {
			echo '<input type="submit" value="Submit" id="submit" class="btn btn-primary" />';	
		}
		?>
	</div>	


</form>
                <!-- konten selesai di sini -->
					<div class="space"></div>
				</div>
			</div>
		</div>        
    </div>
</div>                        
</div>
