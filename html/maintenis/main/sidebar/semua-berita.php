<?php
		$nama_template = '7sky';
		$template_path = $config['baseurl'] . 'themes/'.$nama_template.'/';
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
             
             <!-- START PRIMARY -->
				<div id="primary" class="sidebar-right">
				    <div class="inner group">
				        <!-- START CONTENT -->
				        <div id="content-blog" class="content group">
<?php
foreach($datanews as $news){
	$url_berita = $config['baseurl'].'berita/'.$news['id'].'-'.$news['title_alias'].'.html';
?>				            
				            <div class="sticky hentry hentry-post blog-big group">
				                <!-- post featured & title -->
				                <div class="thumbnail">
				                    <!-- post title -->
				                    <h2 class="post-title" style="opacity: 0.9; box-shadow: 1px 1px 5px #888"><a href="<?php echo $url_berita; ?>"><?php echo $news['title']; ?></a></h2>
				                    <!-- post featured -->
				                    <div class="image-wrap">
				                        <img src="<?php echo $config['baseurl'];?>images/news/<?php echo $news['image']; ?>" alt="<?php echo $news['title']; ?>" title="<?php echo $news['title']; ?>" style="height:280px;""/>        
				                    </div>
				                    <p class="date">
				                        <span class="month"><?php echo date('M',strtotime($news['created'])); ?></span>
				                        <span class="day"><?php echo date('d',strtotime($news['created'])); ?></span>
				                    </p>
				                </div>
				                <!-- post meta -->
				                <div class="meta group">
				                    <p class="author"><span>by <?php echo $news['email']; ?></span></p>
				                   <!-- <p class="categories"><span>In: <a href="#" title="View all posts in Happyness" rel="category tag">Happyness</a>, <a href="#" title="View all posts in Romantic Vintage" rel="category tag">Romantic Vintage</a></span></p>
				                    <p class="comments"><span><a href="article.html#respond" title="Comment on Section shortcodes &amp; sticky posts!">No comments</a></span></p> -->
				                </div>
				                <!-- post content -->
				                <div class="the-content group">
				                 <p align="justify"><?php echo $news['intro_text']; ?> </p>  
								<p><a href="<?php echo $url_berita; ?>" class="btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ baca lanjutannya</a></p>
				                </div>
				                <div class="clear"></div>
				            </div>
					<div class="border-line"></div> 				            
				         
<?php
}
?>				            
	
	<div class="general-pagination group">
<?php
// tampilin page nya
require( $config['basepath'].'main/inc/paging.class.php' ); 
$paging = new paging; 

if (strlen($sort)>0) {
$paging->assign ($config['baseurl'].str_replace('//','/', 'news/'.$merk.'/'.$size.'/index.html?sort='.$sort), $rowcount, $perpage  ); 
}

else{
$paging->assign ($config['baseurl'].'index.php?go=news', $rowcount, $perpage  ); 	 	
}

$paging->use_first_last  = true;

if ($rowcount<1)
{
echo "<div style='text-align:center; font-size:14px;'><p><br><br><br><br><br><br>";	
echo "<div style=' font-weight:bold; background-color:#E8E8E8; padding:5px'>Belum Ada Data</div>";	
echo "<br><br><br><br><br></p></div>";	
}

else {	
echo '<div style="text-align: center">';
echo $paging->fetch(); 
echo ' record: '.$currentcount.'/'.$rowcount.'</div>';
}
?>	</div>			            
				            
				        </div>
				        <!-- END CONTENT -->
				        
                        <!-- START SIDEBAR -->
				        <div id="sidebar-blog-sidebar" class="sidebar group">
				            
				            <div class="widget-first widget recent-posts">
				            <h2 class="heading2"><span>Berita Terbaru</span></h2>
				            <?php echo widget('newsletter'); ?>   
				            </div>
				            
				            <div id="last-tweets-2" class="widget last-tweets">
				                <h2 class="heading2"><span>Tweets Terbaru</span></h2>
				            <a class="twitter-timeline" href="https://twitter.com/7sky_studio" data-widget-id="572680638398885888">Tweets by @7sky_studio</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				            </div>     
				            </div>
				            
				            <div class="widget-last widget recent-comments">
				           
				            
				        </div>
				        <!-- END SIDEBAR -->
                        
				    </div>
				</div>
				<!-- END PRIMARY -->