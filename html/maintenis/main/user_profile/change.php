<?php $config['judul']        = 'Ganti Password'; ?>
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

<form name="form_change_password" action="" method="POST">
<div class="wide form">
<fieldset style="width: 100%">
<legend accesskey=I> Informasi Login </legend>

    <div class="form-group">
		<label class="col-sm-3 control-label">Password Awal</label>
		<input type="password" name="reg_password_awal" id="reg_password_awal" class="form-control" value="" style="width: 15em" required="required" placeholder="Password Awal" class="password" maxlength="50" value="" /><span id="error_reg_password_awal"></span>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Password Pengganti * <small>(min. 6 char)</small></label>
		<input type="password" name="reg_password_ganti" id="reg_password_ganti" value="" class="form-control" style="width: 15em" required="required" placeholder="Password Pengganti" class="password" maxlength="50" value="" /><span id="error_reg_password"></span>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Konfirmasi Password Pengganti*</label>
		<input type="password" name="reg_password_ganti_confirm" id="reg_password_ganti_confirm" class="form-control" value="" style="width: 15em" required="required" placeholder="Password Pengganti" class="password" maxlength="50" value=""/><span id="error_reg_passwordconfirm"></span>
	</div>
</fieldset>
<br/>
<div class="form-group">
    <label class="col-sm-3 control-label">&nbsp;</label>
    
    <input type="submit" value="Submit" id="submit" class="btn btn-primary" />
</div>	

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