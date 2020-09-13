<?php echo "<?php\n"; ?>
$config['judul'] = '<a href="'.$config['baseurl'].'index.php?go='.$module.'">'.$config['judul'].'</a>';	
$action = 'Tambah Data Baru';    
include("main/".$module."/form.php");
<?php echo "?>\n"; ?>