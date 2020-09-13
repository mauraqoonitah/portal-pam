<?php
$config['theme'] = '';
$widget = post('widget');
//echo $widget;
if (file_exists($config['basepath'].'main/sidebar/'.$widget.'-param.php')){
	include_once($config['basepath'].'main/sidebar/'.$widget.'-param.php');
	
?>
	<div class="row">
		<label>Parameter</label>
		
		<div style="display: block;float: left;">
		<?php

		foreach($param as $key=>$value){
			echo '<span style="display:inline-block;width:100px;margin-left:30px;">'.$key.'</span><input type="text" name="param['.$key.']" /><br/>';
		}
		
		?>
		</div>
	</div>
<?php
}
?>