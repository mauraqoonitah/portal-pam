				<div id="slider-flexslider" class="slider flexslider" style="width: 1200px; height: 400px;">
				  
				    <ul class="slides">
<?php $dataslider = doquery('select * from slider where published=1 order by ordering asc');			

	

	foreach ($dataslider as $row){				     
?>	
		     
						<li>
				            <img src="<?php echo $config['baseurl'].'images/slider/'.$row['image']; ?>" alt="<?php echo $row['title']; ?>" title="<?php echo $row['title']; ?>" />
				            <div class="slider-caption caption-right">
				                <a href="<?php echo $row['url']; ?>"><h2><?php echo $row['title']; ?></h2>
				                <h4></h4>
				                <p><?php echo $row['description']; ?></p>
				                <p>&nbsp;</p>
				                </a>
				                <!--<span class="special-font" style="font-size:24px;">prices from 		
				                <span style="font-size: 50px;">$45</span></span>-->
				            </div>
				        </li>
				        
<?php
								}
?>

				        <!--<li>
				            <img src="<?php echo $template_path ;?>images/slider-flex/0018.jpg" alt="0018" title="0018" />
				            <div class="slider-caption caption-right">
				                <h2>A CLEAN CORPORATE THEME</h2>
				                <h4></h4>
				                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar turpis velit. Morbi rutrum, neque non pulvinar faucibus, ligula eros viverra ligula, et aliquam libero neque ac nisl.</p>
				                <p>&nbsp;</p>
				                <span class="special-font" style="font-size:24px;">prices from 		
				                <span style="font-size: 50px;">$45</span></span>
				            </div>
				        </li>
				        <li>
				            <img src="<?php echo $template_path ;?>images/slider-flex/0031.jpg" alt="0031" title="0031" />
				            <div class="slider-caption caption-right">
				                <h2>LOVE IT, ENJOY IT</h2>
				                <h4></h4>
				                <p>Curabitur pharetra accumsan sem, ac accumsan sapien tincidunt a. In hac habitasse platea dictumst. Donec lobortis purus ullamcorper risus posuere non euismod mi scelerisque. Nullam tincidunt varius metus sed elementum</p>
				            </div>
				        </li>
				        <li>
				            <img src="<?php echo $template_path ;?>images/slider-flex/0033.jpg" alt="003" title="003" />
				            <div class="slider-caption caption-right">
				                <h2>MULTIPURPOSE THEME</h2>
				                <h4></h4>
				                <p>Nam sagittis justo eget nunc hendrerit et semper magna feugiat. Proin eu dui ut elit auctor vehicula. Integer ut dui vitae felis venenatis dapibus.</p>
				            </div>
				        </li>-->
				    </ul>
				    
				</div>
				<script type="text/javascript">
				    jQuery(document).ready(function($){
				        $('#slider-flexslider.flexslider img.attachment-full').css('width', '1200px').css('height', '400px');
				    
				        var flex_caption_hide = function(slider) {
				            var currSlideElement = slider;
				            var caption_speed = 400;
				            var width = parseInt( $('.slider-caption', currSlideElement).outerWidth() );
				            var height = parseInt( $('.slider-caption', currSlideElement).outerHeight() );
				            
				            $('.caption-top', currSlideElement).animate({top:height*-1}, caption_speed);
				            $('.caption-bottom', currSlideElement).animate({bottom:height*-1}, caption_speed);
				            $('.caption-left', currSlideElement).animate({left:width*-1}, caption_speed);
				            $('.caption-right', currSlideElement).animate({right:width*-1}, caption_speed);
				        };
				    
				        var flex_caption_show = function(slider) {      
				            var nextSlideElement = slider;
				            var caption_speed = 400;
				            
				            $('.caption-top', nextSlideElement).animate({top:0}, caption_speed);
				            $('.caption-bottom', nextSlideElement).animate({bottom:0}, caption_speed);
				            $('.caption-left', nextSlideElement).animate({left:0}, caption_speed);
				            $('.caption-right', nextSlideElement).animate({right:0}, caption_speed);
				        };
				    
				    $('#slider-flexslider.flexslider').flexslider({
    				    animation: 'fade',
    				    slideshowSpeed: 8000,
    				    animationSpeed: 800,
    				    pauseOnAction: false,
    				    controlNav: false,
    				    directionNav: true,
    				    touch: false,
				            start   : flex_caption_show,
				            before  : flex_caption_hide,
				            after   : flex_caption_show
				        });
				    });
				</script>