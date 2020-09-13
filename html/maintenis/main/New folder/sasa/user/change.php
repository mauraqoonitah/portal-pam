<h1>Ganti Password</h1>
<p>&nbsp;</p>
<form name="form_change_password" action="" method="POST">
<div class="wide form">
<fieldset style="width: 100%">
<legend accesskey=I> Informasi Login </legend>
	<div class="row">
		<label>Password Awal</label>
		<input type="password" name="reg_password_awal" id="reg_password_awal" value="" style="width: 15em" required="required" placeholder="Password Awal" class="password" maxlength="50" value="" /><span id="error_reg_password_awal"></span>
	</div>
	<div class="row">
		<label>Password Pengganti * <small>(min. 6 char)</small></label>
		<input type="password" name="reg_password_ganti" id="reg_password_ganti" value="" style="width: 15em" required="required" placeholder="Password Pengganti" class="password" maxlength="50" value="" /><span id="error_reg_password"></span>
	</div>
	<div class="row">
		<label>Konfirmasi Password Pengganti*</label>
		<input type="password" name="reg_password_ganti_confirm" id="reg_password_ganti_confirm" value="" style="width: 15em" required="required" placeholder="Password Pengganti" class="password" maxlength="50" value=""/><span id="error_reg_passwordconfirm"></span>
	</div>
</fieldset>
<fieldset style="width: 100%">
<legend accesskey=P> Submit </legend>
	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Submit" id="submit" />
	</div>	
</fieldset>
</div>
</form>
