<?php
$berhasil = false;

$template = post('nama_template');

if (strlen(get('nama_template'))>0){
	$template = get('nama_template');
}

if (strlen($template)>0){
	$_SESSION['theme'] = $template;
	$berhasil = true;
}

if ($berhasil){
	redirect('index.php','Template berhasil diganti khusus untuk sesi ini');

} else {
	echo 'Gagal mengganti template';
}
?>