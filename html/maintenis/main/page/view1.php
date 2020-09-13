<?php

$id = get('id');

$dataview = doquery('select * from content where title_alias="'.$id.'"');
if (count($dataview)<1){
	require($config['basepath'] . 'main/404.php');
} else {
	$row = $dataview[0];
?>
	<div class="art-tampilan">	
				<div id="page-meta">
				    <div class="inner group">
				        <h3  style="margin-top: 20px"><?php echo $row['title']; ?></h3>
	<div class="art-postcontent" style="margin-top: 30px"><?php echo $row['intro_text']; ?>
	<?php echo $row['full_text']; ?>    
	</div>
				    </div>
				</div>	


	</div>
	
<?php
}

?>