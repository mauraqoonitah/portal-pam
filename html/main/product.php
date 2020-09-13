</div>
<?php
$merk=get('brand');
$size=get('ukuran');

//echo 'merk '.$merk;
//echo 'ukuran '.$size;

$order  = get('order');
$sort   = get('sort');
$kat    = get('kat');

//sort berdasarkan harga
if (strlen($merk)>0){
    switch ($merk) {
        case 'canon':
            $order = 'brand asc';
            break;
        case 'avision':
            $order = 'brand asc';
            break;

        case 'fujitsu':
            $order = 'brand asc';
            break;
        case 'kodak':
            $order = 'brand asc';
            break;
        
        case 'panasonic':
            $order = 'brand asc';
            break;
       
        default:
            $sort  = 'terbaru';
            $order = 'id desc';
            
    }
} else {
    //$order = 'id desc';
 //   $sort  = 'terbaru';
}

if (strlen($size)>0){
    switch ($size) {

        case 'a3':
            $order = 'ukuran asc';
            break;

        case 'a4':
            $order = 'ukuran asc';
            break;
       
        default:
            $sort  = 'terbaru';
            $order = 'id desc';
            
    }
} else {
    //$order = 'id desc';
    //$sort  = 'terbaru';
}


if (strlen($sort)>0){
    switch ($sort) {
         
        case 'termurah':
            $order = 'price asc';
            break;
        case 'termahal':
            $order = 'price desc';
            break;
        case 'terbaru':
            $order = 'id desc';
            break;
        case 'terlama':
            $order = 'id asc';
            break;
        default:
            $sort  = 'terbaru';
            $order = 'id desc';
             
    }
} else {
    $order = 'id desc';
   // $sort  = 'terbaru';
}


$where = '';


if (strlen($kat)>0){
    $idkat = doquery('select lft,rgt from ec_category where nama_category_alias='.q($kat));
    $rowkat = $idkat[0];
    
    $dbkat = doquery('select id from ec_category where lft between '.$rowkat['lft'].' and '.$rowkat['rgt']);
    $in = '';
    foreach($dbkat as $rowkat){
        $in .= ','.$rowkat['id'];
    }
    $in = substr($in,1);
    $where .= ' and id_category in ('.$in.')';
}


    

//$brand=' and brand="'.$merk.'"';

if (strlen($merk)>0){
$brand=' and brand="'.$merk.'"';

}else{
$brand = '';

}


if (strlen($size)>0){

$ukuran=' and ukuran="'.$size.'"';
}
else{

$ukuran = '';   
}

//hitung jumlah item
$sql_count = "select count(id) as banyak from ec_product where published=1 ".$where.$brand.$ukuran;
//echo $sql_count;
$reccount = doquery($sql_count);
$rowcount = $reccount[0]['banyak'];
//echo $rowcount;

//get page, per page tampilin 25
$perpage = 36;
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

$sql = 'select * from ec_product where published=1 '.$where.$brand.$ukuran.' order by '.$order. ' limit '.$sql_limit;
//echo $sql;
$dataproducts = doquery($sql);
$currentcount = count($dataproducts);
$path = $config['baseurl'].'themes/mnzweb/'; 

 $nama_template = '7sky';
   $template_pathelite = $config['baseurl'] . 'themes/elite/magexpress/';
?>

<script language="javascript">

    //$('.messageBox').hide();
$(function(){
    $(".filter").change(function(){
        //alert("test");
        var brand = '<?php echo $merk ?>';
        var ukuran = '<?php echo $size ?>';
        //alert(brand);
        //alert(ukuran);
        if (brand.length>0 && ukuran.length>0 ){
            brand = 'product/<?php echo $merk ?>/<?php echo $size ?>/index.html';
            }
        else if (brand.length>0){
            brand = 'product/<?php echo $merk ?>/index.html';
            } 
        else {
            brand = 'product';
        }
        
        var order = '?sort='+$('#filter').val();
        
        window.location.href="<?php echo $config['baseurl']; ?>"+brand+order; 

    });
    

    $(".filter4").change(function(){
        //alert("test");
        var brand = '<?php echo $merk ?>';
        var ukuran = '<?php echo $size ?>';
        //alert(brand);
        //alert(ukuran);
        if (brand.length>0 && ukuran.length>0 ){
            brand = 'product/<?php echo $merk ?>/<?php echo $size ?>/index.html';
            }
        else if (brand.length>0){
            brand = 'product/<?php echo $merk ?>/index.html';
            } 
        else {
            brand = 'product';
        }
        
        var order = '?sort='+$('#filter4').val();
        
        window.location.href="<?php echo $config['baseurl']; ?>"+brand+order; 

    });	

	
    $(".filter2").change(function(){
        //alert("test");
        var brand = '<?php echo $merk ?>';
        var ukuran = '<?php echo $size ?>';
        //alert(brand);
        //alert(ukuran);
        if (brand.length>0 && ukuran.length>0 ){
            brand = 'product/<?php echo $merk ?>/<?php echo $size ?>/index.html';
            }
        else if (brand.length>0){
            brand = 'product/<?php echo $merk ?>/index.html';
            } 
        else {
            brand = 'product';
        }
        
        var order = '?brand='+$('#filter2').val();
        
        window.location.href="<?php echo $config['baseurl']; ?>"+brand+order; 
        
        //var order = '?sort='+$('#filter').val();
        //if (kat.length>0){
        //  kat = 'kat-<?php echo $kat ?>';
        //} else {
        //  kat = 'modul/product/';
        //}
        //var order = '?sort='+$('#filter').val();
        
        //window.location.href="<?php echo $config['baseurl']; ?>"+kat+order; 
    });
    
})

$(function(){
    $(".filter3").change(function(){
        //alert("test");
        var brand = '<?php echo $merk ?>';
        var ukuran = '<?php echo $size ?>';
        //alert(brand);
        //alert(ukuran);
        if (brand.length>0 && ukuran.length>0 ){
            brand = 'product/<?php echo $merk ?>/<?php echo $size ?>/index.html';
            }
        else if (brand.length>0){
            brand = 'product/<?php echo $merk ?>/index.html';
            } 
        else {
            brand = 'product';
        }
        
        var order = '?ukuran='+$('#filter3').val();
        
        window.location.href="<?php echo $config['baseurl']; ?>"+brand+order; 
        
        //var order = '?sort='+$('#filter').val();
        //if (kat.length>0){
        //  kat = 'kat-<?php echo $kat ?>';
        //} else {
        //  kat = 'modul/product/';
        //}
        //var order = '?sort='+$('#filter').val();
        
        //window.location.href="<?php echo $config['baseurl']; ?>"+kat+order; 
    });
    
})

    
    $("#dialog-addtocart").dialog("open");
    
    function addToCart(id_product){
        $.ajax({
             type: "POST",
             url: "<?php echo $config['baseurl']; ?>index.php?go=jx_add_cart",
             data: "id_product=" + id_product,
             success: function(msg){
                        $('#cart').load("<?php echo $config['baseurl']; ?>index.php?go=sidebar/cart&do=show");  
                        //$('.ui-widget').html(msg);    
                        $('.messageBox').html(msg);
                        $('.messageBox').show();
                        $('.messageBox').fadeIn().delay(10000).fadeOut('slow');         
                      }
        });
    }

    function tampilkan(view) {
        
        if (view == 'list') {
            $('.product-grid').attr('class', 'product-list');
            $('.product-panel').html('Tampilan <p><span id="list" class="list_on"></span><span id="grid" onclick="tampilkan(\'grid\');"></span></p>');
        } else {
            $('.product-list').attr('class', 'product-grid');                   
            //$('.product-panel').html('');
            $('.product-panel').html('Tampilan <p><span id="list" onclick="tampilkan(\'list\');"></span><span id="grid" class="grid_on"></span></p>');
        }
        $('#loader').load('<?php echo $config['baseurl'];?>index.php?go=jx_list_grid&tipelist='+view);
    }   
</script>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <title><?php echo $config['websitetitle']; ?></title>
    <?php
    $sidebar = getsidebar();
    $template_path = $config['baseurl'] . 'themes/elite/';
       $template_pathss = $config['baseurl'] .  'themes/elite/artmenu/';
    registerCSS($config['baseurl'] . 'res/ecommerce.css');
$path = $config['baseurl'].'themes/elite/mnzweb/'; 
//$config['theme']='';
    $nama_template = '7sky';
        $template_path7sky = $config['baseurl'] . 'themes/'.$nama_template.'/';
        $template_pathelite = $config['baseurl'] . 'themes/elite/magexpress/';


    ?>



</head>

    <div id="wrapper" class="section-active">
        <div class="w1">
    <!-- Navigation -->     




    

 

















<div class="product" style="margin-left:10px; ">
 
 <section id="portfolio" class="bg-light-gray">
        <div class="container">
<div class="row">
 
            <!--
       
                
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1"><div class="art-vmenublock clearfix">
                          
        <div class="art-vmenublockheader">
            <h3 class="t">Scanner</h3>
        </div>
        <div class="art-vmenublockcontent">
      
<?php
$merk=get('brand');

?>

<?php 

        //    echo '<ul class="art-vmenu">';
        //    echo '</ul>';
        //    echo  widget('artmenu',array('tipe'=>'scannermainmenu',
        //                               'posisi'=>'vertical')); 
    
?> 
                
             
</div>
</div>


</section>

-->
     
         <!-- Portfolio Grid Section -->
   

<div class="row">
 <div class="col-lg-12 text-center">
  <h1><font color="black"> Urut Berdasarkan:</font></h1>
 <br>


 <div class="col-md-3">
<div class="single_bottom_rightbar">
            <h2>Brand</h2>
            <div class="blog_archive wow fadeInDown">
              <form action="#">
               <select name="filter2" id="filter2" class="filter2">  
                 <option value="" <?php if ($size=='') echo ' selected="selected" '; ?>>--PILIH--</option>
              <?php  $db_brand = doquery("SELECT * from ec_brand");
                              foreach ($db_brand as $row_brand ) { ?>

 <?php $sub_brand= $row_brand['id'];

                                                  ?>

     
        <option value="<?php echo $row_brand['brand']; ?>" <?php if ($merk==$row_brand['brand']) echo ' selected="selected" '; ?>>Produk <?php echo $row_brand['brand']; ?></option>
        
<?php }  ?>        
                </select>
              </form>
            </div>
          </div> </div>



           <div class="col-md-3">
<div class="single_bottom_rightbar">
            <h2>Ukuran</h2>
            <div class="blog_archive wow fadeInDown">
              <form action="#">
                <select name="filter3" id="filter3" class="filter3">  
                 <option value="" <?php if ($size=='') echo ' selected="selected" '; ?>>--PILIH--</option>
                 <option value="a3" <?php if ($size=='a3') echo ' selected="selected" '; ?>>ukuran A3</option>
        <option value="a4" <?php if ($size=='a4') echo ' selected="selected" '; ?>>ukuran A4</option>
 
                </select>
              </form>
            </div>
          </div> </div>

           <div class="col-md-3">
<div class="single_bottom_rightbar">
            <h2>Termahal-Termurah</h2>
            <div class="blog_archive wow fadeInDown">
              <form action="#">
                <select name="filter" id="filter" class="filter">  
                  <option value="" <?php if ($size=='') echo ' selected="selected" '; ?>>--PILIH--</option>
        <option value="termurah" <?php if ($sort=='termurah') echo ' selected="selected" '; ?>>Harga Termurah-Termahal</option>
        <option value="termahal" <?php if ($sort=='termahal') echo ' selected="selected" '; ?>>Harga Termahal-Termurah</option>
                </select>
              </form>
            </div>
          </div> </div>


           <div class="col-md-3">
<div class="single_bottom_rightbar">
            <h2>Terbaru-Terlama</h2>
            <div class="blog_archive wow fadeInDown">
              <form action="#">
                 <select name="filter4" id="filter4" class="filter4">  
                   <option value="" <?php if ($size=='') echo ' selected="selected" '; ?>>--PILIH--</option>
                 <option value="terbaru" <?php if ($sort=='terbaru') echo ' selected="selected" '; ?>>Produk Terbaru-Terlama</option>
				<option value="terlama" <?php if ($sort=='terlama') echo ' selected="selected" '; ?>>Produk Terlama-Terbaru</option>

                </select>
              </form>
            </div>
          </div> </div>




</div>
</div>


  <div class="urut" style="margin-right: 0px">


        
       
        </div><br><br><br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    
                   
  
                </div>
            </div>



        <div class="row">

        <?php
        foreach($dataproducts as $product) 
        {
        ?>

                <div class="col-md-3 col-sm-5 portfolio-item">
                    <a href="#portfolioModal<?php echo $product['id'];?>" class="portfolio-link" data-toggle="modal2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <?php if($product['img_icon']==""){?>
                        <img border="20" src="<?php echo $config['baseurl']; ?>images/products/kosong.jpg"  width="200px" height="160px" alt="">
 <?php }else{?>
 <img src="<?php echo $config['baseurl']; ?>images/products/<?php echo $product['img_icon'];?>"  width="200px" height="160px" alt="">
  <?php }?>
                        
                    </a>
                    <div class="portfolio-caption">
                        <h4></h4>
                         <?php if($product['logobrand']==""){?>

                        <br>&nbsp;

 <?php }else{?>

  <?php 
        $logomerk='<img src="'.$config['baseurl'].'images/logobrand/'.$product['logobrand'].'" alt="'.$merk.'" height="20"> ';
         echo $logomerk; ?>
 <?php }?>

 <?php if($product['ukuran']==""){?>
                       <p class="text-muted">&nbsp;</p>
<?php }else{?>
                        <p class="text-muted"><?php echo $product['ukuran'];?></p>
 <?php }?>



                        <?php if($product['nama_product']==""){?>
                        <p class="text-muted">&nbsp;</p>
                      
<?php }else{?>
                        <p class="text-muted"><?php if($product['nama_product']=="Scanner Fi-5000N (Network Adapter)"){

                            echo str_replace('(Network Adapter)','N A',$product['nama_product']);
                        }else if($product['nama_product']=="Scanner AV-8350"){

                            echo str_replace('Scanner AV-8350','Scanner AV-8350<br><br>',$product['nama_product']);
                        }else if($product['nama_product']=="Scanner S1500 Windows"){

                            echo str_replace('Scanner S1500 Windows','Scanner S1500 Windows<br><br>',$product['nama_product']);
                        }else{
                            



                            echo str_replace('(Network Scanner)','NETSCAN',$product['nama_product']);
                            }
                            ?></p>
 <?php }?>
                        

                    </div>
                </div>
                
            

        


        <?php
        }
        ?>
          


        </div>
    </section>

<div style="margin-top: 10px">
<?php


// tampilin page nya
require( $config['basepath'].'main/inc/paging.class.php' ); 
$paging = new paging; 



if (strlen($sort)>0) {
$paging->assign ($config['baseurl'].str_replace('//','/', 'product/'.$merk.'/'.$size.'/index.html?sort='.$sort), $rowcount, $perpage  ); 
}

else{
$paging->assign ($config['baseurl'].str_replace('//','/', 'product/'.$merk.'/'.$size.'/index.html'), $rowcount, $perpage  );        
}

$paging->use_first_last  = true;

if ($rowcount<1)
{
echo "<div style='text-align:center; font-size:14px;'><p><br><br><br><br><br><br>"; 
echo "<div style=' font-weight:bold; background-color:#E8E8E8; padding:5px'>Belum Ada Data</div>";  
echo "<br><br><br><br><br></p></div>";  
}else {
    
echo $paging->fetch(); 
echo "<br><br>".'record: '.$currentcount.'/'.$rowcount;
}?>
</div>



<p id="loader">&nbsp;</p>
<div class="container">
<div class="art-sheet">
</div>

</div>

       

  <?php
        foreach($dataproducts as $product) 
        {?>
            <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $product['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
            <br>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                
                               <h3><font color="black"><?php echo $product['nama_product'];?><br></h3></font></h3>
<center>
                                <img class="img-responsive img-centered" src="<?php echo $config['baseurl']; ?>images/products/<?php echo $product['img_icon'];?>"  height="400px" width="320px" alt=""> <p class="item-intro text-muted"> <?php 
        $logomerk='<img src="'.$config['baseurl'].'images/logobrand/'.$product['logobrand'].'" alt="'.$merk.'" height="40"> ';
         echo $logomerk; ?></p>
</center>
                               
                                <p> <?php echo $product['short_desc'];?></p>
                               
                                <hr>
                             
                                <center><p> <?php echo $product['long_desc'];?> </p></center>
                             
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>tutup </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


       <?php }
        ?>







</div>
</div>
    
   


    <script src="<?php echo $template_path; ?>vendor/jquery/jquery.min.js"></script>

 
    <script src="<?php echo $template_path; ?>vendor/bootstrap/js/bootstrap.min.js"></script>



</body>

</html>

