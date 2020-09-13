<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <?php 

		$path = $config['baseurl'].'themes/admin_new/';	

	?>

    

    <title><?php echo $config['websitetitle'];?></title>



    <!-- Bootstrap core CSS -->


    <!--Basic Styles-->
    <link href="<?php echo $config['baseurl'];?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="<?php echo $config['baseurl'];?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo $config['baseurl'];?>assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
    <!--Beyond styles-->
    <link id="beyond-link" href="<?php echo $config['baseurl'];?>assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['baseurl'];?>assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?php echo $config['baseurl'];?>assets/css/typicons.min.css" rel="stylesheet" />
    <link href="<?php echo $config['baseurl'];?>assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    <script src="<?php echo $config['baseurl'];?>assets/js/jquery.min.js"></script>
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="<?php echo $config['baseurl'];?>assets/js/skins.min.js"></script>
    <script src="<?php echo $config['baseurl'];?>assets/js/toastr/toastr.js"></script>

    <link href="<?php echo $path;?>css/bootstrap.min.css" rel="stylesheet">



    <link href="<?php echo $path;?>fonts/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo $path;?>css/animate.min.css" rel="stylesheet">



    <!-- Custom styling plus plugins -->

    <link href="<?php echo $path;?>css/custom.css" rel="stylesheet">

    <link href="<?php echo $path;?>css/icheck/flat/green.css" rel="stylesheet">

    <!-- editor 

    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">-->

    <link href="<?php echo $path;?>css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">

    <link href="<?php echo $path;?>css/editor/index.css" rel="stylesheet">

    <!-- select2 -->

    <link href="<?php echo $path;?>css/select/select2.min.css" rel="stylesheet">

    <!-- switchery -->

    <link rel="stylesheet" href="<?php echo $path;?>css/switchery/switchery.min.css" />



    <script src="<?php echo $path;?>js/jquery.min.js"></script>

	<link rel="stylesheet" href="<?php echo $config['baseurl'];?>themes-ui/smoothness/jquery-ui-1.8.4.custom.css" type="text/css" media="screen" />

	<link rel="stylesheet" href="<?php echo $config['baseurl'];?>res/form.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo $config['baseurl'];?>res/ecommerce.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo $config['baseurl'];?>res/css/demo_page.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo $config['baseurl'];?>res/css/demo_table_jui.css" type="text/css" media="screen" />



	<style>

	.nav .open > a, .nav .open > a:hover, .nav .open > a:focus {

		background-color: #DB9253 !important;

	}

	.dropdown-menu > li > a {

		color: #000;

	}

	</style>

    <style type="text/css">
       
@media only screen and (max-width: 500px) {
     .pntl {
    color: #73879c;
    float: left !important;
    font-size: 14px;
    font-weight: bold;
    text-shadow: 1px 1px 3px #cccccc;
    padding-top: 13px;
}


.top_nav .navbar-right {
    
    margin: 0;
    
}
}
    </style>

</head>





<body class="nav-md">



    <div class="container body">





        <div class="main_container">



            <div class="col-md-3 left_col">

                <div class="left_col ">



                    <div class="navbar nav_title" style="border: background-color: white; 0;text-align: center;">

                        <a href="<?php echo $config['baseurl']; ?>" class="site_title"><img class="lgo" src="<?php echo '../images/header/'; ?><?php echo $config['fotoheader']; ?>"> <span><?php echo $config['instansi'];?></span></a>

                    </div>

                    <div class="clearfix"></div>





                    <!-- menu prile quick info -->

                    <div class="profile">

                        

                        <div class="profile_info">

                            <span>Welcome</span>


                            <h2><?php echo $_SESSION['nama']; ?></h2>
                   

                        </div>

                    </div>

                    <div class="row"></div>

                    <!-- /menu prile quick info -->



                    <br />



                    <!-- sidebar menu -->

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">



                        <div class="menu_section">

							<?php echo widgetbackend('artmenu',array('tipe'=>'adminmenu','posisi'=>'vertical')); ?>

							<!--

                            <ul class="nav side-menu">

								

                                <li><a href="<?php echo $config['baseurl'];?>index.php"><i class="fa fa-home"></i> Home </a></li>

                                <li><a><i class="fa fa-check"></i> Manage Project <span class="fa fa-chevron-down"></span></a>

                                    <ul class="nav child_menu" style="display: none">

                                        <li><a href="<?php echo $config['baseurl'].'index.php?go=project_category'; ?>">Category</a></li>

                                        <li><a href="<?php echo $config['baseurl'].'index.php?go=project_list'; ?>">Project</a></li>

                                    </ul>

                                </li>

								<li><a href="<?php echo $config['baseurl'].'index.php?go=news'; ?>"><i class="fa fa-globe"></i> Manage News </a></li>

								<li><a href="<?php echo $config['baseurl'].'index.php?go=news'; ?>"><i class="fa fa-cog"></i> Settings </a></li>

                            </ul>

							-->

                        </div>

                        



                    </div>

                    <!-- /sidebar menu -->



                    <!-- /menu footer buttons -->

                    <div class="sidebar-footer hidden-small">

                        <a data-toggle="tooltip" data-placement="top" title="Settings">

                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>

                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">

                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>

                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="Lock">

                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>

                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="Logout">

                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>

                        </a>

                    </div>

                    <!-- /menu footer buttons -->

                </div>

            </div>



            <!-- top navigation -->

            <div class="top_nav">



                <div class="nav_menu">

                    <nav class="" role="navigation">

                        <div class="nav toggle">

                            <a id="menu_toggle"><i class="fa fa-bars"></i></a> 

                        </div>



                        <ul class="nav navbar-nav navbar-right">

                            <li class="">

                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                                    <?php echo $_SESSION['nama']; ?>

                                    <span style="font-size:30px; font-weight:bold;" class=" fa fa-angle-down"></span>

                                </a>

                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">

                               

                                    </li>                                    

                                    <li><a href="<?php echo $config['baseurl']; ?>maintenis/index.php?go=user&do=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>

                                    </li>
                                    <li><a href="<?php echo $config['baseurl']; ?>maintenis/index.php?go=user_profile&do=change"> Ganti Password</a>

                                    </li>

                                </ul>                                                                                                  

                            </li>

                            <li class="pntl">Admin Panel</li>



                        </ul>

                    </nav>

                </div>



            </div>

            <!-- /top navigation -->



            <!-- page content -->

            <div class="right_col" role="main">

                <div class="">

                                        <div class="page-title">

                        <div class="title_left">

                            <h3><?php echo $config['judul']; ?></h3>

                        </div>

                        <div class="title_right">

                            

                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <?php

            	global $pesan;

            	//echo($pesan);            	

            	//debugvar($pesan);

            	if (strlen($pesan)>0){

					if($pesan_mode=='info'){

						?>

						<div class="alert alert-info">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <span class="entypo-info-circled"></span>

                            <?php echo $pesan;?>

                        </div>

					<?php

					} else if($pesan_mode=='sukses'){

					?>

					<div class="alert alert-success">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <span class="entypo-thumbs-up"></span>

                            <?php echo $pesan;?>

                        </div>

					<?php

					} else if($pesan_mode=='warning'){

					?>

					<div class="alert alert-warning">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <span class="entypo-cancel-circled"></span>

                            <?php echo $pesan;?>

                        </div>

					<?php

					}

				unset($pesan);

				unset($pesan_mode);

				}

            	?>

                    <?php echo $content; ?>

                </div>

                <!-- /page content -->



                <!-- footer content -->

                <footer>

                    <div class="">

                        <p class="pull-right"><?php echo $config['webfooter']; ?>

                        </p>

                    </div>

                    <div class="clearfix"></div>

                </footer>

                <!-- /footer content -->



            </div>



        </div>

    </div>



        <div id="custom_notifications" class="custom-notifications dsp_none">

            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">

            </ul>

            <div class="clearfix"></div>

            <div id="notif-group" class="tabbed_notifications"></div>

        </div>

</body>
<link rel="stylesheet" href="css/animate.css">
    <script src="<?php echo $path;?>js/owl.carousel.min.js"></script>
        <script src="<?php echo $path;?>js/bootstrap.min.js"></script>



        <!-- chart js -->

        <script src="<?php echo $path;?>js/chartjs/chart.min.js"></script>

        <!-- bootstrap progress js -->

        <script src="<?php echo $path;?>js/progressbar/bootstrap-progressbar.min.js"></script>

        <script src="<?php echo $path;?>js/nicescroll/jquery.nicescroll.min.js"></script>

        <!-- icheck -->

        <script src="<?php echo $path;?>js/icheck/icheck.min.js"></script>

        <!-- tags -->

        <script src="<?php echo $path;?>js/tags/jquery.tagsinput.min.js"></script>

        <!-- switchery -->

        <script src="<?php echo $path;?>js/switchery/switchery.min.js"></script>

        <!-- daterangepicker -->

        <script type="text/javascript" src="<?php echo $path;?>js/moment.min2.js"></script>

        <script type="text/javascript" src="<?php echo $path;?>js/datepicker/daterangepicker.js"></script>

        <!-- richtext editor -->

        <script src="<?php echo $path;?>js/editor/bootstrap-wysiwyg.js"></script>

        <script src="<?php echo $path;?>js/editor/external/jquery.hotkeys.js"></script>

        <script src="<?php echo $path;?>js/editor/external/google-code-prettify/prettify.js"></script>

        <!-- select2 -->

        <script src="<?php echo $path;?>js/select/select2.full.js"></script>

        <!-- form validation -->

        <script type="text/javascript" src="<?php echo $path;?>js/parsley/parsley.min.js"></script>

        <!-- textarea resize -->

        <script src="<?php echo $path;?>js/textarea/autosize.min.js"></script>

        <script>

            autosize($('.resizable_textarea'));

        </script>

        <!-- Autocomplete -->

        <script type="text/javascript" src="<?php echo $path;?>js/autocomplete/countries.js"></script>

        <script src="<?php echo $path;?>js/autocomplete/jquery.autocomplete.js"></script>

        <script type="text/javascript">

            $(function () {

                'use strict';

                var countriesArray = $.map(countries, function (value, key) {

                    return {

                        value: value,

                        data: key

                    };

                });

                // Initialize autocomplete with custom appendTo:

                $('#autocomplete-custom-append').autocomplete({

                    lookup: countriesArray,

                    appendTo: '#autocomplete-container'

                });

            });

        </script>

        <script src="<?php echo $path;?>js/custom.js"></script>





        <!-- select2 -->

        <script>

            $(document).ready(function () {

                $('#single_cal1').daterangepicker({

                    singleDatePicker: true,

                    format: 'DD/MM/YYYY',

                    calender_style: "picker_1"

                }, function (start, end, label) {

                    //console.log(start.toISOString(), end.toISOString(), label);

                });

                $(".select2_single").select2({

                    placeholder: "Select a state",

                    allowClear: true

                });

                $(".select2_group").select2({});

                $(".select2_multiple").select2({

                    maximumSelectionLength: 4,

                    placeholder: "With Max Selection limit 4",

                    allowClear: true

                });

            });

        </script>

        <!-- /select2 -->

        <!-- input tags -->

        <script>

            function onAddTag(tag) {

                alert("Added a tag: " + tag);

            }



            function onRemoveTag(tag) {

                alert("Removed a tag: " + tag);

            }



            function onChangeTag(input, tag) {

                alert("Changed a tag: " + tag);

            }



            $(function () {

                $('#tags_1').tagsInput({

                    width: 'auto'

                });

            });

        </script>

        <!-- /input tags -->

        <!-- form validation -->

        <script type="text/javascript">

            $(document).ready(function () {

                $.listen('parsley:field:validate', function () {

                    validateFront();

                });

                $('#demo-form .btn').on('click', function () {

                    $('#demo-form').parsley().validate();

                    validateFront();

                });

                var validateFront = function () {

                    if (true === $('#demo-form').parsley().isValid()) {

                        $('.bs-callout-info').removeClass('hidden');

                        $('.bs-callout-warning').addClass('hidden');

                    } else {

                        $('.bs-callout-info').addClass('hidden');

                        $('.bs-callout-warning').removeClass('hidden');

                    }

                };

            });



            $(document).ready(function () {

                $.listen('parsley:field:validate', function () {

                    validateFront();

                });

                $('#demo-form2 .btn').on('click', function () {

                    $('#demo-form2').parsley().validate();

                    validateFront();

                });

                var validateFront = function () {

                    if (true === $('#demo-form2').parsley().isValid()) {

                        $('.bs-callout-info').removeClass('hidden');

                        $('.bs-callout-warning').addClass('hidden');

                    } else {

                        $('.bs-callout-info').addClass('hidden');

                        $('.bs-callout-warning').removeClass('hidden');

                    }

                };

            });

            try {

                hljs.initHighlightingOnLoad();

            } catch (err) {}

        </script>

        <!-- /form validation -->

        <!-- editor -->

        <script>

            $(document).ready(function () {

                $('.xcxc').click(function () {

                    $('#descr').val($('#editor').html());

                });

            });



            $(function () {

                function initToolbarBootstrapBindings() {

                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',

                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',

                'Times New Roman', 'Verdana'],

                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');

                    $.each(fonts, function (idx, fontName) {

                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));

                    });

                    $('a[title]').tooltip({

                        container: 'body'

                    });

                    $('.dropdown-menu input').click(function () {

                            return false;

                        })

                        .change(function () {

                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');

                        })

                        .keydown('esc', function () {

                            this.value = '';

                            $(this).change();

                        });



                    $('[data-role=magic-overlay]').each(function () {

                        var overlay = $(this),

                            target = $(overlay.data('target'));

                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());

                    });

                    if ("onwebkitspeechchange" in document.createElement("input")) {

                        var editorOffset = $('#editor').offset();

                        $('#voiceBtn').css('position', 'absolute').offset({

                            top: editorOffset.top,

                            left: editorOffset.left + $('#editor').innerWidth() - 35

                        });

                    } else {

                        $('#voiceBtn').hide();

                    }

                };



                function showErrorAlert(reason, detail) {

                    var msg = '';

                    if (reason === 'unsupported-file-type') {

                        msg = "Unsupported format " + detail;

                    } else {

                        console.log("error uploading file", reason, detail);

                    }

                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +

                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');

                };

                initToolbarBootstrapBindings();

                $('#editor').wysiwyg({

                    fileUploadError: showErrorAlert

                });

                window.prettyPrint && prettyPrint();

            });

        </script>

        <!-- /editor -->





</html>