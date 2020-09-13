<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $config['websitetitle']; ?></title>
    <meta name="keywords" content="" />
  <meta name="description" content="" />
    <!-- 
    Powerful Template 
    http://www.templatemo.com/tm-390-powerful
    -->
    <?php
 $sidebar = getsidebar();
 $template_path = $config['baseurl'] . 'themes/pam/';
  $image = $config['baseurl'].'images/header/'; 
   ?>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo $template_path;?>assets/css/owl.carousel.css" >
    <link rel="stylesheet" href="<?php echo $template_path;?>assets/css/owl.theme.default.min.css" >
    <link rel="stylesheet" href="<?php echo $template_path;?>assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo $template_path;?>assets/css/font-awesome.min.css" >
    <link rel="stylesheet" href="<?php echo $template_path;?>assets/css/templatemo_style.css" >

    <link rel="stylesheet" href="<?php echo $template_path;?>assets/css/circle.css" >
    <link rel="stylesheet" href="<?php echo $template_path;?>assets/css/jquery.bxslider.css"  />
    <link rel="stylesheet" href="<?php echo $template_path;?>assets/css/nivo-slider.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <script src="<?php echo $template_path;?>assets/js/modernizr.custom.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

   
  
  <link rel="stylesheet" href="<?php echo $template_path;?>assets/gallery/style.css">
  
 
  
  </head>
  <body>
    
    <?php echo widget('slider');?>

  

    

    

    
    <?php echo $content; ?>
    
   <!--  <?php echo widget('footer');?>
 -->
      <div class="bfWrap text-center">
        <div class="templatemo_footer">Copyright © 2019 PAM JAYA</div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://code.jquery.com/jquery.js"></script> -->
    <script src="<?php echo $template_path;?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo $template_path;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $template_path;?>assets/js/owl.carousel.js"></script>
    <script src="<?php echo $template_path;?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $template_path;?>assets/js/jquery.cycle2.min.js"></script>
    <script src="<?php echo $template_path;?>assets/js/jquery.cycle2.carousel.min.js"></script>
    
    <script src="<?php echo $template_path;?>assets/js/jquery.cookie.js"></script>


   
  
  
    <script type="text/javascript">
      $(function(){
          var default_view = 'grid';
          if($.cookie('view') !== 'undefined'){
              $.cookie('view', default_view, { expires: 7, path: '/' });
          } 
          function get_grid(){
              $('.list').removeClass('list-active');
              $('.grid').addClass('grid-active');
              $('.prod-cnt').animate({opacity:0},function(){
                  $('.prod-cnt').removeClass('dbox-list');
                  $('.prod-cnt').addClass('dbox');
                  $('.prod-cnt').stop().animate({opacity:1});
              });
          }
          function get_list(){
              $('.grid').removeClass('grid-active');
              $('.list').addClass('list-active');
              $('.prod-cnt').animate({opacity:0},function(){
                  $('.prod-cnt').removeClass('dbox');
                  $('.prod-cnt').addClass('dbox-list');
                  $('.prod-cnt').stop().animate({opacity:1});
              });
          }
          if($.cookie('view') == 'list'){ 
              $('.grid').removeClass('grid-active');
              $('.list').addClass('list-active');
              $('.prod-cnt').animate({opacity:0});
              $('.prod-cnt').removeClass('dbox');
              $('.prod-cnt').addClass('dbox-list');
              $('.prod-cnt').stop().animate({opacity:1}); 
          } 

          if($.cookie('view') == 'grid'){ 
              $('.list').removeClass('list-active');
              $('.grid').addClass('grid-active');
              $('.prod-cnt').animate({opacity:0});
                  $('.prod-cnt').removeClass('dboxlist');
                  $('.prod-cnt').addClass('dbox');
                  $('.prod-cnt').stop().animate({opacity:1});
          }

          $('#list').click(function(){   
              $.cookie('view', 'list'); 
              get_list()
          });

          $('#grid').click(function(){ 
              $.cookie('view', 'grid'); 
              get_grid();
          });

          /* filter */
          $('.menuSwitch ul li').click(function(){
              var CategoryID = $(this).attr('category');
              $('.menuSwitch ul li').removeClass('cat-active');
              $(this).addClass('cat-active');
              
              $('.prod-cnt').each(function(){
                  if(($(this).hasClass(CategoryID)) == false){
                     $(this).css({'display':'none'});
                  };
              });
              $('.'+CategoryID).fadeIn(); 
              
          });
      });
    </script>

    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
          prevText: '',
          nextText: '',
          controlNav: false,
        });
    });
    </script>
    <script>
      $(document).ready(function(){

        // hide #back-top first
        $("#back-top").hide();
        
        // fade in #back-top
        $(function () {
          $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
              $('#back-top').fadeIn();
            } else {
              $('#back-top').fadeOut();
            }
          });

          // scroll body to 0px on click
          $('#back-top a').click(function () {
            $('body,html').animate({
              scrollTop: 0
            }, 800);
            return false;
          });
        });

      });
      </script>
      <script type="text/javascript">
      <!--
          function toggle_visibility(id) {
             var e = document.getElementById(id);
             if(e.style.display == 'block'){
                e.style.display = 'none';
                $('#togg').text('show footer');
            }
             else {
                e.style.display = 'block';
                $('#togg').text('hide footer');
            }
          }
      //-->
      </script>
      <script type="text/javascript">
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    // nav:true,
    autoplay:100,

    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
});
</script>
      
  
</body>
</html>