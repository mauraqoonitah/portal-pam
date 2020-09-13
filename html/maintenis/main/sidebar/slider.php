<?php
$nama_template = 'brown';
$template_path = $config['baseurl'] . 'themes/'.$nama_template.'/';
$res_path = $config['baseurl'] . 'res/'; 
?>			
					<div id="slider-rev-container">
                            <div id="slider-rev">
                                <ul>
								<?php 
									$dataslider = doquery('select * from slider where published=1 order by ordering asc ');	
									foreach ($dataslider as $row){				     
								?>	
                                    <li data-transition="cube-horizontal"  data-saveperformance="on"  data-title="New Season">
                                      <img src="<?php echo $template_path;?>images/revslider/dummy.png"  alt="slidebg2" data-lazyload="<?php echo $template_path.'images/homeslider/'.$row['image']; ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"></a>          
                                    </li>
                                  <?php
									}
								  ?>
                                    
                                </ul>
                            </div><!-- End #slider-rev -->
                        </div>
<script>
    	$(function() {

            // Slider Revolution
            jQuery('#slider-rev').revolution({
                delay:5000,
                startwidth:1170,
                startheight:500,
                onHoverStop:"true",
                hideThumbs:250,
                navigationHAlign:"center",
                navigationVAlign:"bottom",
                navigationHOffset:0,
                navigationVOffset:20,
                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"center",
                soloArrowLeftHOffset:0,
                soloArrowLeftVOffset:0,
                soloArrowRightHalign:"right",
                soloArrowRightValign:"center",
                soloArrowRightHOffset:0,
                soloArrowRightVOffset:0,
                touchenabled:"on",
                stopAtSlide:-1,
                stopAfterLoops:-1,
                dottedOverlay:"none",
                fullWidth:"on",
                spinned:"spinner3",
                shadow:0,
                hideTimerBar: "on",
                // navigationStyle:"preview4"
              });
        
        });
</script>