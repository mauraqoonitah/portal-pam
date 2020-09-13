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
              <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <span class="title_text">Latest Updates</span> </h2>



<?php
foreach($datanews as $news){
	$url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';
?>				            

  <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                  <li>
                  <div class="catgimg2_container"> <a href="<?php echo $url_berita; ?>">
                  <?php if ($news['img_ilustrasi']==""){?>

  <img alt="" src="<?php echo $config['baseurl'];?>images/news/no_image.jpg">

                  <?php }else{?>
                   
  <img alt="" src="<?php echo $config['baseurl'];?>images/news/<?php echo $news['img_ilustrasi']; ?>">



                <?php  }?>
                  </a> </div>
                    <h2 class="catg_titile"><a href="<?php echo $url_berita; ?>"><?php echo $news['title']; ?></a></h2>
                    <div class="comments_box">
                                      

                                        <div class="comments_box"> <span class="meta_date"><?php echo date('d',strtotime($news['created'])); ?><?php echo date('M',strtotime($news['created'])); ?><?php echo date('y',strtotime($news['created'])); ?></span> <span class="meta_comment"><a href="#">by <?php echo $news['email']; ?></a></span><span class="meta_more"><a  href="<?php echo $url_berita; ?>">Read More...</a></span> </div> </div>
                    <p><?php echo substr($news['intro_text'],100,100); ?></p>
                  </li>
                </ul>
              </div>

				         			            
				         
<?php
}
?>		
            







            </div>
          </div>
        </div>

        	
<div style="margin-top: 10px">
<?php


// tampilin page nya
require( $config['basepath'].'main/inc/paging.class.php' ); 
$paging = new paging; 



if (strlen($sort)>0) {
$paging->assign ($config['baseurl'].str_replace('//','/', 'news/'.$merk.'/'.$size.'/index.html?sort='.$sort), $rowcount, $perpage  ); 
}

else{
$paging->assign ($config['baseurl'].str_replace('//','/', 'news/'.$merk.'/'.$size.'/index.html'), $rowcount, $perpage  );        
}

$paging->use_first_last  = true;

if ($rowcount<1)
{
echo "<div style='text-align:center; font-size:14px;'><p><br><br><br><br><br><br>"; 
echo "<div style=' font-weight:bold; background-color:#E8E8E8; padding:5px'>Belum Ada Data</div>";  
echo "<br><br><br><br><br></p></div>";  
}

else {
    echo"&nbsp;";
echo $paging->fetch(); 
echo ' &nbsp;&nbsp;record: '.$currentcount.'/'.$rowcount;
}




?>
</div>

        <div class="pagination_area">
          <nav>
            <ul class="pagination">
              <li><a href="#"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <div class="single_bottom_rightbar">
            <h2>Recent Post</h2>
            <ul class="small_catg popular_catg wow fadeInDown">

             <?php echo widget('newsletter'); ?>
              
            </ul>
          </div>
         
          
          
        </div>
      </div>
    </div>
  </section>
</div>



     
