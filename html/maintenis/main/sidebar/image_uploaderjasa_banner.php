<?php



echo $param['value'];



$field 			= $param['field'];



$jenis 			= $param['jenis'];



$value 			= $param['value'];



$readonly 			= $param['readonly'];



$fieldid		= str_replace(' ','_',$field);



$path 			= $config['basepathbackend'] . $param['path'];



if($param['value']==""){



	$default_value  = "images/upload-icon.png";



}else{



	if($param['jenis']==""){



		$default_value  = "../images/jasa_banner/".$param['value'];



	}else{



		$default_value  = "../images/".$jenis."/".$param['value'];



	}



}



$asfield		= $param['asfield'];







if (!file_exists($path))



	mkdir($path,0777,true);



				



		$listDir = array();



        if($handler = opendir($path)) {



            while (($sub = readdir($handler)) !== FALSE) {



                if ($sub != "." && $sub != ".." && $sub != "Thumb.db" && $sub != "Thumbs.db") {



                    if(is_file($path."/".$sub)) {



                        $listDir[] = $sub;



                    }



                }



            }



            closedir($handler);



        }



		if ($asfield=='false'){



			$select_image = '<select class="form-control"  id="'.$fieldid.'">\n';	



		} else {



			$select_image = '<select class="form-control" id="'.$fieldid.'" name="'.$field.'">\n';



		}



		



			if(!empty($value)){



				$select_image .= '   <option value="'.$value.'">'.$value.'</option>';



			}else{



				$select_image .= '   <option value="">- pilih -</option>';



			}



        foreach($listDir as $img){



			$selected = '';



			if ($default_value == $img) {



				$selected = ' selected="selected" ';



			}



			$select_image .= '   <option value="'.$img.'" '.$selected.'>'.$img.'</option>\n';



		}



		$select_image .= '</select>';



		



?>







<script language="javascript">



$(function(){



        $(document).on('change','#<?php echo $fieldid;?>',function(){



		var pathnya = '<?php echo $config['baseurl'] . '/' . $param['path'] . '/'; ?>';



		$('#imageview_<?php echo $fieldid;?>').attr('src',pathnya + $('#<?php echo $fieldid;?>').val());



	});



        $(document).on('change','#upload<?php echo $fieldid;?>',function(){



		var formdata = false;



			formdata = new FormData();



			jQuery.each($('#upload<?php echo $fieldid;?>')[0].files, function(i, file) {



    			formdata.append("upload<?php echo $fieldid;?>[]", file);



			});



			$('#response').html('<img src="<?php echo $config['baseurl'];?>images/ajax-loader.gif" align="middle" />');



			



			$.ajax({



				url:  'index.php?go=image_uploader&f=<?php echo $fieldid;?>&p=<?php echo $param['path'];?>',



				type: 'POST',



				data: formdata,



				processData: false,



				contentType: false,



				success: function (res) {



					



					if (res=='gagal') {					



						$('#response').html(res);



					} else {



						



						$('#<?php echo $fieldid;?>').append(new Option(res, res, true, true));



						var pathnya = '<?php echo $config['baseurl'] . '/' . $param['path'] . '/'; ?>';



						$('#imageview_<?php echo $fieldid;?>').attr('src',pathnya + res).val();



						



						$('#response').html('');



					}



				},



				error:



				function(e)



				{



					alert('gagal');



					$('#response').html(e);



					



				}



			});



		



	});



});



</script>



<style type="text/css">







.hide_file {

    position: absolute;

    z-index: 1000;

    opacity: 0;

    cursor: pointer;

    right: 0;

    top: 0;

    height: 100%;

    font-size: 24px;

    width: 100%;

    

}



.filehide{



	



    -moz-opacity: 0;



    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);



	-moz-border-bottom-colors: none;



    -moz-border-left-colors: none;



    -moz-border-right-colors: none;



    -moz-border-top-colors: none;



	-moz-transform: translate(-100px, 0px) scale(4);



    cursor: pointer;



	direction: ltr;



	border-color: transparent;



    border-image: none;



    border-style: solid;



    border-width: 0 0 100px 200px;



    margin: 0;



    right: 0;



    top: 0;



	



}









.btna{



	



    margin-right: 4px;



    overflow: hidden;



    position: relative;	



	background-color: #5BB75B;



    background-image: -moz-linear-gradient(center top , #62C462, #51A351);



    background-repeat: repeat-x;



    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);



	border-image: none;



    border-radius: 4px 4px 4px 4px;



    border-style: solid;



    border-width: 1px;



    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);



	cursor: pointer;



    margin-bottom: 0;



    text-align: center;



    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);



    vertical-align: middle;



	display: inline-block;



	width: 130px;



	height: 35px;



	color: #FFFFFF;



        padding-top:6px;



	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);



}



.btna:hover {



    background-image: -moz-linear-gradient(center top , #62C462, #51A351);



    background-repeat: repeat-x;



	border-image: none;



    border-style: solid;



    border-width: 1px;



	color: #FFFFFF;



    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);    



	box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);



}    





.tulisan_btna{



	text-align: center;



}



.kiri{



	float: left;



}



</style>



<div style="display: block;position:relative;float: left;">



<span class="kiri"><?php echo $select_image; ?>&nbsp;</span>







	<div class="btna">

UPLOAD GAMBAR

	<input type="file" <?php echo $readonly; ?> <?php echo $disabled; ?> id="upload<?php echo $fieldid;?>" multiple size="1" class="hide_file" /></span><span id="response">

</div>

	</span><br/>



        <div class="row">



                <div class="col-md-12">



                    <div style="" id="container_img_<?php echo $fieldid;?>">



                        <img width="40%" src="<?php echo $config['baseurl'] . '/' . $default_value; ?>" id="imageview_<?php echo $fieldid;?>" />



                    </div>



                </div>



        </div>



    



</div>







