<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.4.2
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title><?php echo $config['webtitle']; ?> - Login</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $config['baseurl'];?>assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="<?php echo $config['baseurl'];?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="<?php echo $config['baseurl'];?>assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="<?php echo $config['baseurl'];?>assets/css/beyond.min.css" rel="stylesheet" />
    <link href="<?php echo $config['baseurl'];?>assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?php echo $config['baseurl'];?>assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="<?php echo $config['baseurl'];?>assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
<?php
	$query_instansi = mysql_query("select * from instansi");
	$array_instansi = mysql_fetch_array($query_instansi);
?>  
<form class="box" action="index.php?go=auth" method="POST" >
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">Tata Naskah Dinas Elektronik</div>
            <div class="loginbox-title" style="font-size:16px;"><strong><?php echo $array_instansi['nama_instansi']; ?></strong></div>
            <div class="loginbox-social">
                <img style="width:150px;margin-top:20px;" src="<?php echo $config['baseurl'];?>attachment/<?php echo $array_instansi['foto']; ?>"/>
            </div>
    <?php 	  	
	if (isset($_GET['pesan'])){
    ?>
            <div class="alert alert-warning fade in">
                <button data-dismiss="alert" class="close"> × </button>
                    <i class="fa-fw fa fa-warning"></i>
                        <?php echo $_GET['pesan']; ?>.
            </div>
    <?php
        }
    ?>
            <div class="loginbox-textbox">
                <input type="text" class="form-control" name="username" placeholder="Username" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </div>
            <div class="loginbox-forgot">
                <a href="">Forgot Password?</a>
            </div>
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" value="Login">
            </div>
            
        </div>
        <div class="logobox">
			<p align="center">
				<a href="#">Crafted with love by 7SkyStudio</a>
			</p>
        </div>
    </div>
</form>
    
    <!--Basic Scripts-->
    <script src="<?php echo $config['baseurl'];?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $config['baseurl'];?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $config['baseurl'];?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="<?php echo $config['baseurl'];?>assets/js/beyond.js"></script>
    <script src="<?php echo $config['baseurl'];?>assets/js/toastr/toastr.js"></script>
    
</body>
<!--Body Ends-->
</html>
