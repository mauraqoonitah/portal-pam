<?php
		$nama_template = '7sky';
		$template_path = $config['baseurl'] . 'themes/'.$nama_template.'/';



$template_pathelite = $config['baseurl'] . 'themes/elite/magexpress/';


		$res_path = $config['baseurl'] . 'res/';

$datanews = doquery('select news.*, user.email from news left join user 
					on news.created_by = user.id 
					order by news.ordering desc');

//hitung jumlah item
$sql_count = "select count(id) as banyak from news where published=1";
//echo $sql_count;
$reccount = doquery($sql_count);
$rowcount = $reccount[0]['banyak'];
//echo $rowcount;

//get page, record yg ditampilkan per page
$perpage = 5;
if (isset($_GET['page'])){
	
	$page = get('page');
	$total_page = ceil($rowcount / $perpage);
	
	if ($page>$total_page){
		$page = $total_page;
	} else if ($page < 1 ){
		$page = 1;
	}
	$sql_limit = $perpage * ($page - 1).','.$perpage;
	
} else {
	$page = 1;
	$sql_limit = '0,'.$perpage;
}


?>
<Style>img
{
    border: none;
}
img:hover
{
    opacity: .75;
}

</Style>


  <section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_category wow fadeInDown">
            <div class="archive_style_1">
              <div style="margin-top:15px;">
                <ol class="breadcrumb">
                  <!--<li><a href="#">Home</a></li>
                  <li><a href="#">Technology</a></li>
                  <li class="active">Duis quis erat non nunc fringilla </li>-->
                </ol>
              </div>
              <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <span class="title_text">Latest Updates</span> </h2><br>



<?php
foreach($datanews as $news){
	$url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';
?>				            









  <div class="col-md-12">              
      <ul class="fashion_catgnav">
        <li>
                  <div class="catgimg2_container"> <a href="<?php echo $url_berita; ?>">
                  <?php if ($news['img_ilustrasi']==""){?>

                  <img alt=""  src="<?php echo $config['baseurl'];?>images/news/no_image.jpg">

                  <?php }else{?>
                   
                  <img alt="" width="390px" height="240px" src="<?php echo $config['baseurl'];?>images/news/<?php echo $news['img_ilustrasi']; ?>">



                <?php  }?>
                  </a> </div>
                  <div></div>

                   <h2><a href="<?php echo $url_berita; ?>"><font color="black"><br><?php echo $news['title']; ?></font></a></h2><br>
                    <div class="comments_box">
                                      

                                        <div class="comments_box"> <span class="meta_date"><?php echo date('d',strtotime($news['created'])); ?><?php echo date('M',strtotime($news['created'])); ?><?php echo date('y',strtotime($news['created'])); ?></span> <span class="meta_comment"><a href="#">by <?php echo $news['email']; ?></a></span><span class="meta_more"><a  href="<?php echo $url_berita; ?>">Read More...</a></span> </div> </div>
                    <p><?php echo substr($news['intro_text'],0,250); ?>...<a  href="<?php echo $url_berita; ?>">Read More...</a></p> <br>
                  </li>
                </ul>
              </div>

				         			            
				         
<?php
}
?>		
            







            </div>
          </div>
        </div>


        
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <div class="single_bottom_rightbar"><br>
            <h2>Recent Post</h2>
            <ul class="small_catg popular_catg wow fadeInDown">

             <?php echo widget('newsletter'); ?>
              
            </ul>
          </div>
         
          
          
        </div>
      </div>
    </div>
  </section>



     
