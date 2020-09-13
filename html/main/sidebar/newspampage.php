<?php

$banyak             = $param['banyak'];
//overrid theme front

$config['theme'] = 'pam';

$datanews = doquery('select * from news where published="1" order by created desc');

?>
<div id="templatemo_portfolio" class="section2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secHeader">
              <h1 class="text-center">BERITA</h1>
              
            </div>
            <div class="glView">
              <div class="switcher">
                <ul>
                  <li id="grid" class="grid"><i class="fa fa-th-large"></i></li>
                  <li id="list" class="list"><i class="fa fa-align-justify"></i></li>
                </ul>
              </div>
              <div class="menuSwitch">
                <ul>
                  <li class="cat-active" category="prod-cnt">All</li>
                  <li class="" category="webdesign">Web Design</li>
                  <li class="" category="graphic">Graphic</li>
                  <li class="" category="inspiration">Inspiration</li>
                  <li class="" category="creative">Creative</li>
                </ul>
              </div>

              <div class="imgSwitch">
                <div class="row">
                   <?php



        foreach($datanews as $news)



                {



            $url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';



                                            



        ?>
                  <div class="col-xs-6 col-sm-3 col-md-3 dbox prod-cnt graphic">
                    <div class="itemCont">
                      <a href="#">
                        <div class="thumb"> <!-- <img class="img-responsive center-block" alt="Blue Gate" src="images/grids/img1.jpg"> --></div>
                        <div class="itemInfo">
                          
                          <a href="<?php echo $url_berita; ?>" class="headline"> </a>
                          <h5><?php echo $news['title']; ?></h5>
                           </a>
                           <?php echo $news['created']; ?>
                                               
          
       

   

      



                        </div>
                        <p><?php echo substr($news['intro_text'], 0, 220) . '...';

#revisi ?>... 

            </p> 

                     
                      <button type="button" class="btn btn-primary goto"><a href="<?php echo $url_berita; ?>"> <p style="color: white">view</p></a></button>
                    </div>
                  </div>
              
                  <?php } ?>
                </div>
                <div class="loadit"><button type="button" class="btn btn-primary">Load More</button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- e/o section2 -->