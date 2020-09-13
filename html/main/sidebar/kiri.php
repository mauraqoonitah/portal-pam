<?php

$config['webtitle'] .= ' - Testing aja';

$tes = doquery('select * from content');

foreach($tes as $row){
	echo $row['title'].'<br/>';
}
?>
