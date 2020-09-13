<?php

$banyak             = $param['banyak'];
//overrid theme front

$datanews = doquery('select * from news where published="1" order by created desc limit 5');
?>
<!-- 
<?php foreach ($datanews as $slide) {?>

<?php }?> -->
<style type="text/css">
 .container {
  max-width: 1100px;
  margin: 0 auto;
}

.cards {
 height: 200px;
  margin: 2px;
  border-radius: 10px;
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
  margin-top: 15px;
  padding: 1.5%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.card {
  position: relative;
  margin-bottom: 20px;
  padding-bottom: 30px;
  background: #fefff9;
  color: #363636;
  text-decoration: none;
  -moz-box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  -webkit-box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
@media (max-width: 700px) {
  .card {
    height: 200px;
    width: 100%;
  }
}
@media (min-width: 700px) {
  .card {
    max-width: 720px;
    margin-right: 20px;
    margin-bottom: 20px;
  }
  .card:nth-child(even) {
    margin-right: 0;
  }
}
@media (min-width: 980px) {
  .card:nth-child(even) {
    margin-right: 20px;
  }
  .card:nth-child(3n) {
    margin-right: 0;
  }
}
.card span {
  display: block;
}
.card .card-summary {
  padding: 5% 5% 3% 5%;
}
.card .card-header {
  position: relative;
  height: 175px;
  overflow: hidden;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-color: rgba(255, 255, 255, 0.15);
  background-blend-mode: overlay;
  -moz-border-radius: 4px 4px 0 0;
  -webkit-border-radius: 4px;
  border-radius: 4px 4px 0 0;
}
.card .card-header:hover, .card .card-header:focus {
  background-color: rgba(255, 255, 255, 0);
}
.card .card-title {
  background: #00ACE9;
  padding: 3.5% 0 2.5% 0;
  color: white;
  font-family: 'Roboto Condensed', sans-serif;
  text-transform: uppercase;
  position: absolute;
  bottom: 0;
  width: 100%;
}
.card .card-title h3 {
  font-size: 1.2em;
  line-height: 1.2;
  padding: 0 3.5%;
  margin: 0;
}
.card .card-meta {
  max-height: 0;
  overflow: hidden;
  color: #666;
  font-size: .78em;
  text-transform: uppercase;
  position: absolute;
  bottom: 5%;
  padding: 0 5%;
  -moz-transition-property: max-height;
  -o-transition-property: max-height;
  -webkit-transition-property: max-height;
  transition-property: max-height;
  -moz-transition-duration: 0.4s;
  -o-transition-duration: 0.4s;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  -moz-transition-timing-function: ease-in-out;
  -o-transition-timing-function: ease-in-out;
  -webkit-transition-timing-function: ease-in-out;
  transition-timing-function: ease-in-out;
}
.card:hover, .card:focus {
  background: white;
  -moz-box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
  -webkit-box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
  box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
}
.card:hover .card-title, .card:focus .card-title {
  background: rgba(157, 187, 63, 0.95);
}
.card:hover .card-meta, .card:focus .card-meta {
  max-height: 1em;
}

img {
  max-width: 100%;
}

body {
  background-image: url("http://portal.pamjaya.co.id/images/galeri/background.jpg");
  background: #f0f0f0;
  font-size: 17px;
  line-height: 1.4;
  font-family: 'Jaldi', sans-serif;
}

* {
  -moz-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -moz-transform;
  -o-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -o-transform;
  -webkit-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -webkit-transform;
  transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, transform;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  -webkit-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -moz-transition-timing-function: linear;
  -o-transition-timing-function: linear;
  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}

}
button.owl-next, .owl-carousel button.owl-dot {
    color: inherit;
    font: inherit;
    color: blue;
}

</style>
<div class="container">
  
<div class="owl-carousel owl-theme">
 <?php



        foreach($datanews as $news)



                {



            $url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';



                                            



        ?>
   <div class="item">
      <div class="cards">
        <a class="card" href="<?php echo $url_berita; ?>">  
         
            
      
      <span class="card-title">
          <h3 style="text-align: center;"><?php echo $news['title']; ?></h3>
        
      </span>
       <span class="card-summary">
       <?php echo substr($news['intro_text'], 0, 120) . '...'; ?>
      </span>
      <!-- <span class="card-meta">
        Published: June 18th, 2015
      </span> -->
      </div>
    </a>
    </div>

    
<?php } ?>
    
   
  </div>
</div>

<!-- <style type="text/css">
 .container {
  max-width: 1100px;
  margin: 0 auto;
}

.cards {
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
  margin-top: 15px;
  padding: 1.5%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.card {
  position: relative;
  margin-bottom: 20px;
  padding-bottom: 30px;
  background: #fefff9;
  color: #363636;
  text-decoration: none;
  -moz-box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  -webkit-box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
@media (max-width: 700px) {
  .card {
    width: 100%;
  }
}
@media (min-width: 700px) {
  .card {
    max-width: 320px;
    margin-right: 20px;
    margin-bottom: 20px;
  }
  .card:nth-child(even) {
    margin-right: 0;
  }
}
@media (min-width: 980px) {
  .card:nth-child(even) {
    margin-right: 20px;
  }
  .card:nth-child(3n) {
    margin-right: 0;
  }
}
.card span {
  display: block;
}
.card .card-summary {
  padding: 5% 5% 3% 5%;
}
.card .card-header {
  position: relative;
  height: 175px;
  overflow: hidden;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-color: rgba(255, 255, 255, 0.15);
  background-blend-mode: overlay;
  -moz-border-radius: 4px 4px 0 0;
  -webkit-border-radius: 4px;
  border-radius: 4px 4px 0 0;
}
.card .card-header:hover, .card .card-header:focus {
  background-color: rgba(255, 255, 255, 0);
}
.card .card-title {
  background: #00ACE9;
  padding: 3.5% 0 2.5% 0;
  color: white;
  font-family: 'Roboto Condensed', sans-serif;
  text-transform: uppercase;
  position: absolute;
  bottom: 0;
  width: 100%;
}
.card .card-title h3 {
  font-size: 1.2em;
  line-height: 1.2;
  padding: 0 3.5%;
  margin: 0;
}
.card .card-meta {
  max-height: 0;
  overflow: hidden;
  color: #666;
  font-size: .78em;
  text-transform: uppercase;
  position: absolute;
  bottom: 5%;
  padding: 0 5%;
  -moz-transition-property: max-height;
  -o-transition-property: max-height;
  -webkit-transition-property: max-height;
  transition-property: max-height;
  -moz-transition-duration: 0.4s;
  -o-transition-duration: 0.4s;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  -moz-transition-timing-function: ease-in-out;
  -o-transition-timing-function: ease-in-out;
  -webkit-transition-timing-function: ease-in-out;
  transition-timing-function: ease-in-out;
}
.card:hover, .card:focus {
  background: white;
  -moz-box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
  -webkit-box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
  box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
}
.card:hover .card-title, .card:focus .card-title {
  background: rgba(157, 187, 63, 0.95);
}
.card:hover .card-meta, .card:focus .card-meta {
  max-height: 1em;
}

img {
  max-width: 100%;
}

body {
  background: #f0f0f0;
  font-size: 17px;
  line-height: 1.4;
  font-family: 'Jaldi', sans-serif;
}

* {
  -moz-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -moz-transform;
  -o-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -o-transform;
  -webkit-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -webkit-transform;
  transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, transform;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  -webkit-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -moz-transition-timing-function: linear;
  -o-transition-timing-function: linear;
  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}

}
</style>
 -->
<!-- <div class="container">
  <div class="cards">
    <a class="card" href="#">
      <span class="card-header" style="background-image: url(http://placeimg.com/400/200/animals);">
        <span class="card-title">
          <h3>This is a title for a card</h3>
        </span>
      </span>
      <span class="card-summary">
        A summary will also be present. Usually two to three brief sentences about the content on the detail page.
      </span>
      <span class="card-meta">
        Published: June 18th, 2015
      </span>
    </a>

    <a class="card" href="#">
      <span class="card-header" style="background-image: url(http://placeimg.com/640/480/nature);">
        <span class="card-title">
          <h3>This is a title for a card that is a bit longer in length</h3>
        </span>
      </span>
      <span class="card-summary">
        Each card is created from an &lt;a&gt; tag so the whole card is linked.
      </span>
      <span class="card-meta">
        Published: June 18th, 2015
      </span>
    </a>
    
    <a class="card" href="#">
      <span class="card-header" style="background-image: url(http://placeimg.com/400/400/people)">
        <span class="card-title">
          <h3>This is a title for a card</h3>
        </span>
      </span>
      <span class="card-summary">
        Using Flexbox is such a an easy, well supported way for grid-style content, such as cards. The cards height will expand to match the longest item.
      </span>
      <span class="card-meta">
        Published: June 18th, 2015
      </span>
    </a>

   
  </div>
</div> -->
<!-- <style type="text/css">
  
  h5 {
    margin-left: 120px;
  }

  p {
    margin-left: 120px;
  }
</style>
<div id="templatemo_portfolio" class="section2" style="margin-top: -80px">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secHeader">
              <h1 class="text-center">INFORMASI</h1>
              
            </div>
            <div class="glView">
              <div class="switcher">
                
              </div>
              <div class="menuSwitch">
               
              </div>

              <div class="imgSwitch">
                <div class="row">
                   <?php



        foreach($datanews as $news)



                {



            $url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';



                                            



        ?>
                  <div class="col-xs-6 col-sm-3 col-md-3 dbox prod-cnt graphic" >
                    <div class="itemCont">
                      <a href="#">
                        <div class="thumb">  <img class="img-responsive center-block" alt="" src="<?php echo $config['baseurl'];?>images/news/<?php echo $news['img_ilustrasi']; ?>"></div>
                        <div class="itemInfo">
                          
                          <a href="<?php echo $url_berita; ?>" class="headline"> </a>
                          <h5><?php echo $news['title']; ?></h5>
                           </a>
                                               
                    
       

   

      



                        </div>
                        <p><?php echo substr($news['intro_text'], 0, 220) . '...';

#revisi ?>... 

            </p> 

                     
                      <button type="button" class="btn btn-primary goto"><a href="<?php echo $url_berita; ?>"> <p style="color: white">view</p></a></button> -->
                   <!--  </div>
                  </div>
              
                  <?php } ?>
                </div>
                <div class="loadit"><button type="button" class="btn btn-primary">Load More</button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --> <!-- e/o section2 -->
