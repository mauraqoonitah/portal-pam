<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">    <meta http-equiv="refresh" content="120" > 
    <title><?php echo $config['websitetitle']; ?></title>
	<?php echo $config['meta']; ?>
	<?php
	$nama_template = 'elud';
	$template_path = $config['baseurl'] . 'themes/'.$nama_template.'/';
	$res_path = $config['baseurl'] . 'res/';
	?>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
       <link rel="stylesheet" href="<?php echo $template_path;?>style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="<?php echo $template_path;?>style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="<?php echo $template_path;?>style.responsive.css" media="all">
	<link rel="stylesheet" href="<?php echo $res_path;?>form.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Chewy|Didact+Gothic&amp;subset=latin">
    <script src="<?php echo $template_path;?>jquery.js"></script>
    <script src="<?php echo $template_path;?>script.js"></script>
    <script src="<?php echo $template_path;?>script.responsive.js"></script>
<meta name="description" content="Description">
<meta name="keywords" content="Keywords">
</head>
<body>
<div id="art-main">
<header class="art-header">


    <div class="art-shapes">
<div class="art-object526880572" data-left="1.69%"></div>

            </div>




                
                    
</header>
<nav class="art-nav">
    <?php echo widget('artmenu',array('tipe'=>'mainmenu','posisi'=>'horizontal')); ?> 
    </nav>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
        <?php
//$config['theme'] = '';
echo widget('nivoslidernew');
?>
</div>
<?php echo $content; ?>
<div class="art-content-layout-wrapper layout-item-9">
<div class="art-content-layout layout-item-5">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-15" style="width: 25%" >
        <h1><span style="background-color: rgb(251, 213, 45);"><span style="color: rgb(92, 3, 0);">&nbsp;Link</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></h1><p><span style="color: rgb(255, 255, 255);"></span></p><ul><li style="line-height: 16px; color: rgb(71, 2, 0);"><a href="#">Company</a></li><li style="line-height: 16px;"><a href="#">Terms</a></li></ul><ul><li style="line-height: 16px;"><a href="#">Map</a></li><li style="line-height: 16px;"><a href="#">Address</a></li><li style="line-height: 16px;"><a href="#">Contact Us</a></li></ul><ul><li style="line-height: 16px;"><a href="#">Welcome</a></li><li style="line-height: 16px;"><a href="#">People</a></li><li style="line-height: 16px;"><a href="#">Management</a></li></ul><p>
        </p>
    </div><div class="art-layout-cell layout-item-15" style="width: 25%" >
        <h1><span style="background-color: rgb(251, 213, 45);"><span style="color: rgb(92, 3, 0);">&nbsp;Kontak Kami</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></h1><div style="margin-left: 10px;margin-right: 10px;">Jl. Raya Mangun Jaya Tanjatan, GG. Amal Bakti,<br>Tambun Bekasi,<br>Telp: (021) 7144 0072 </div>
    </div><div class="art-layout-cell layout-item-15" style="width: 25%" >
        <h1><span style="background-color: rgb(251, 213, 45);"><span style="color: rgb(92, 3, 0);">&nbsp;Facebook</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></h1><div style="margin-left: 5px;"><p>&nbsp;<a href="" class="art-facebook-tag-icon" style="line-height: 32px;">Elud Bakery</a>&nbsp;<br></p></div>
    </div><div class="art-layout-cell layout-item-16" style="width: 25%" >
        <h1><span style="background-color: rgb(251, 213, 45);"><span style="color: rgb(92, 3, 0);">&nbsp;Twitter</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></h1><div style="margin-left: 5px;"><p>&nbsp;<a href="" class="art-twitter-tag-icon" style="line-height: 32px;">@Elud_Bakery</a>&nbsp;<br></p></div>
    </div>
    </div>
</div>
</div>
</div>
                                
                

</article></div>
                    </div>
                </div>
            </div>
    </div>
<footer class="art-footer">
  <div class="art-footer-inner">
<div class="art-content-layout layout-item-0">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-1" style="width: 20%">
        <p style="font: 18px Arial; color: #444444">INFO</p>
        <br>
        <ul>
        <li><a href="#">Welcome</a></li>
        <li><a href="#">People</a></li>
        <li><a href="#">Management</a></li>
        </ul>
    </div><div class="art-layout-cell layout-item-1" style="width: 20%">
        <p style="font: 18px Arial; color: #444444">LOCATION</p>
        <br>
        <ul>
        <li><a href="#">Map</a></li>
        <li><a href="#">Address</a></li>
        <li><a href="#">Contact Us</a></li>
        </ul>
    </div><div class="art-layout-cell layout-item-1" style="width: 20%">
        <p style="font: 18px Arial; color: #444444">ABOUT</p>
        <br>
        <ul>
        <li><a href="#">Company</a></li>
        <li><a href="#">Terms</a></li>
        </ul>
    </div><div class="art-layout-cell layout-item-1" style="width: 40%">
        <p style="text-align:right"><br>
        <br>
         <span style="color: #5C0300;"><?php echo $config['webfooter']; ?></span></p>
    </div>
    </div>
</div>

  </div>
</footer>

</div>


</body></html>