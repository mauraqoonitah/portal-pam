
<?php 
registerJS($config['baseurl'].'res/carouFredSel-6.0.6/jquery.carouFredSel-6.0.6.js');

?>

<script type="text/javascript">
$(document).ready(function() {

	// Using custom configuration
	$("#testi").carouFredSel({
		items				: 3,
		direction			: "up",
		scroll : {
			items			: 1,
			duration		: 500,		
			mousewheel      : true,					
			pauseOnHover	: true
		},
		auto		: {
			play			: true
		}			
	});	
});
</script>


<?php
//show news
$data = doquery('select * from testimoni where published="1" order by created desc');
?>

	<div class="table0-content">

<p><a href="index.php?go=testimoni-add">tambahkan arttestimoni >> </a></p>
<div id="testi">
<?php

foreach($data as $testi){
?>

<div class="kotak-testimoni">
<div class="caroufredsel_wrapper" style="text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; margin: 0px; width: 185px; height:130px;overflow: hidden;">

<div class="txt2">
<div><b><?php echo $testi['name']; ?></b></div>
<?php echo $testi['testimoni']; ?>
<br/>

</div>
</div>
</div>
<?php
}
?>
</div>
<div class="txt2">
<p><a href="index.php?go=testimoni">lihat selengkapnya >> </a><br></p>

</div>
	</div>	

