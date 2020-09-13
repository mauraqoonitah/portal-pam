<?php

$banyak             = $param['banyak'];
//overrid theme front

$config['theme'] = 'pam';

$datanews = doquery('select * from portal where published="1" order by ordering, id asc  ');

?>

<style type="text/css">
  .hexagon-a a.hlinktop:hover .hexa-a {
    background: white;
  }
  .section1, .section2, .section3, .section4, .section5 {

     
     margin-top: -110px;
    border-bottom: 1px solid #E4E4E4;
}
</style>
<div id="templatemo_services" class="section1" style="margin-top: -110px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- <div class="secHeader">
              <h1 class="text-center">PORTAL PAM JAYA</h1>
              
            </div> -->
            <div class="row">

              <?php

        foreach($datanews as $news)
                {
            //$url_berita = $config['baseurl'].'portal/'.$news['id'].'-'.$news['title_alias'].'.html';

        ?>



              <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="blok text-center" style="margin-top: -40px;">
                  <div class="hexagon-a" style="">
                    <a class="hlinktop" href="#">
                      <div class="hexa-a">
                        <div class="hcontainer-a">
                          <div class="vertical-align-a">
                            <a href="<?php echo $news['kategori']; ?>" target="_blank">
                            <img style=" width: 70%; 
    height: auto;" src="<?php echo $config['baseurl'];?>images/galeri/<?php echo $news['image']; ?>" alt=""> </a>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>  
                  <div class="hexagon">
                    <a class="hlinkbott" href="">
                      <div class="hexa">
                        <div class="hcontainer">
                          <div class="vertical-align" style="background-color: black">
                            <span class="texts"></span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <h4 style="margin-top: -15px; margin-bottom: 15px;"><?php echo $news['title']; ?></h4>
                  
                </div>
              </div>
             <?php } ?>
            
          </div>
          </div>
        </div>
      </div>
    </div> <!-- e/o section1 -->
