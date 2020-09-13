<?php
//show testimoni
$data = doquery('select * from testimoni where published="1" order by created desc');
?>
                                                               
<a href="index.php?go=testimoni-add">tambahkan testimoni >> </a>
<div style="padding-left: -50px">
                    <div class="testimonials-slider">
                                        	
					<?php
					foreach($data as $testi){
					?>
															
					<div class="slide">
							<!--<div class="testimonials-carousel-thumbnail"><img width="120" alt="" src="images/team1.jpg"></div>-->
								<div class="testimonials-carousel-context">
                                <div class="testimonials-name"><?php echo $testi['name']; ?></div>
                                <div class="testimonials-carousel-content"><?php echo $testi['testimoni']; ?></div>
                            </div>
                      </div>				
					<?php
					}
					?>	
                                                              
                    </div>
 </div>                                   
                         
                            
<script type="text/javascript">

$('.testimonials-slider').bxSlider({
       slideWidth: 260,
       minSlides: 1,
       maxSlides: 1,
       slideMargin: 32,
       auto: true,
       autoControls: true
     });
</script>
<!--
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

<div class="table0">
<div class="table0-heading"><font size="4" color="#cc6b0b">Testimonial</font></div>
	<div class="table0-content">

<p><a href="index.php?go=testimoni-add">tambahkan testimoni >> </a></p>
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

</div>
-->


