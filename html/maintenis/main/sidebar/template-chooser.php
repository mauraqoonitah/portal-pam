<form method="POST" action="<?php echo $config['baseurl'];?>index.php?go=template_chooser">
<?php
	$dbdefault = doquery('select nama_template,nama_template as judul_template from template where default_template=1');
	$default_template = $dbdefault[0]['nama_template'];
	
	$dbtemplate = doquery('select nama_template,nama_template as judul_template from template');
	echo widgetbackend('inputselect',array('field'=>'nama_template',
											'option'=>$dbtemplate,
											'value'	=>$_SESSION['theme'],
											))
?>
<input type="submit" name="submit" value="Ganti Template"/>
</form>