
<?php
registerJS($config['baseurl'] . 'res/nivoslider/jquery.nivo.slider.pack.js');
registerCSS($config['baseurl'] . 'res/nivoslider/themes/default/default.css');
registerCSS($config['baseurl'] . 'res/nivoslider/themes/pascal/pascal.css');
registerCSS($config['baseurl'] . 'res/nivoslider/themes/orman/orman.css');
registerCSS($config['baseurl'] . 'res/nivoslider/nivo-slider.css');
registerCSS($config['baseurl'] . 'res/nivoslider/style.css');
?>
		
		
<div class="slider-wrapper theme-default">
    <div class="ribbon"></div>
	<div id="slider" class="nivoSlider">
	
	<?php
	$dataslider = doquery('select * from slider where published=1 order by ordering asc');			
	
	foreach ($dataslider as $row){
	
		if ($row['url']!==NULL){
			echo '<a href="'.$row['url'].'">';
		}
		
		echo '<img src="'.$config['baseurl'].'/images/slider/'.$row['image'].'" alt="'.$row['title'].'" title="'.$row['description'].'"/>';
		
		if ($row['url']!==NULL){
			echo '</a>';
		}
	}			
	?>        
    
	</div>
</div>


<script language="javascript">
	$(document).ready(function(){
		$('#slider').nivoSlider();
	});
</script>