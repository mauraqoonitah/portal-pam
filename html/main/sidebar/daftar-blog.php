<h2>DAFTAR BLOG SISWA</h2><br/>

<?php

$datablog = doquery('select * from slider');

foreach($datablog as $slider){
	echo $slider['url'].'<br/>';
}
?>