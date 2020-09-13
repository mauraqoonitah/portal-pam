<?php
$id = $_GET['id'];

$dataview = doquery('select * from content where title_alias="'.$id.'"');
if (count($dataview)<1){
	require($config['basepath'] . 'main/404.php');
} else {
	$row = $dataview[0];
?>

<div class="art-box art-post">
    <div class="art-box-body art-post-body">
		<div class="art-post-inner art-article">
			
			<div class="art-postcontent">
			<div class="art-content-layout">
			
			    <div class="art-content-layout-row">
				<div class="art-layout-cell layout-item-0" style="width: 100%;">
					<h1 class="art-postheader"><?php echo $row['title']; ?></h1>
					<div><?php echo $row['intro_text']; ?></div>
					<div><?php echo $row['full_text']; ?>    </div>
				</div>
				</div>
				
			</div>
		    </div>
		    <div class="cleared"></div>
			
		</div>
		<div class="cleared"></div>
    </div>
</div>

<?php
}
?>