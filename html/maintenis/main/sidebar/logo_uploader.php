<?php
$url_resize = $config['basepath'].'main/vendor-admin/fn_resize.php';
include_once($url_resize);
//handle POST upload
if (count($_POST)>0) {
    $config['theme'] = '';
    //debugvar($_POST);
    $post_pathtujuan = post('pathtujuan');
    $post_namafile   = post('namafile');
    $id_vendor       = getIDVendor();
    $f   = post('f');
            //echo $pathtujuan.$namafile;
            //echo '<br/>'.$f.'<br/>';
            //debugvar($_FILES);
    $allowed = array('png', 'jpg', 'gif', 'PNG', 'JPG', 'GIF');    
    foreach ($_FILES[$f]["error"] as $key => $error) {
        //debugvar($_FILES);
    $extension = pathinfo($_FILES[$f]['name'][$key], PATHINFO_EXTENSION);
    //echo 'extensi...'.$extension;
        if ($error == UPLOAD_ERR_OK) {
            
            
            if(!in_array(strtolower($extension), $allowed)){
                echo 'gagal';                
                die();
            }
            $namafile_tmp = '';
            $namafile='';
            if (post('replace')) {
                $temp_path          = $config['basepath'] . 'temp/' . $id_vendor.'/';
                make_path($temp_path);
                $namafile           = $temp_path . $post_namafile;
                $namafile_tmp       = $temp_path . '_'.$post_namafile;
                $file_url           = $config['baseurl'] . 'temp/' . $id_vendor.'/' . $post_namafile;
                $name               = pathinfo($namafile,PATHINFO_FILENAME);
            } else {
                $name               = $_FILES[$f]["name"][$key];
                $actual_name        = pathinfo($name,PATHINFO_FILENAME);
                $original_name      = $actual_name;
                $extension          = pathinfo($name, PATHINFO_EXTENSION);
                $namafile           = $config['basepath'] . 'temp/' . $id_vendor.'/'. $name;
                $namafile_tmp       = $config['basepath'] . 'temp/' . $id_vendor.'/_'. $name;
                $file_url           = $config['baseurl'] . 'temp/' . $id_vendor.'/' . $name;
                $i = 1;
                while(file_exists($pathtujuan.$actual_name.".".$extension) || file_exists($config['basepath'].'temp/'.$actual_name.".".$extension))
                {           
                    $actual_name    = (string)$original_name.$i;
                    $name           = $actual_name.".".$extension;
                    $namafile       = $config['basepath'] . 'temp/' . $id_vendor .'/'. $name;
                    $namafile_tmp   = $config['basepath'] . 'temp/' . $id_vendor .'/_'. $name;
                    $i++;
                }
            }
            //echo $namafile;
            //echo '<br/>'.$name;
            
            if (move_uploaded_file( $_FILES[$f]["tmp_name"][$key], $namafile)){			
                //echo $namafile.' prepare resize '.$namafile_tmp;
                if (!resize($namafile, $namafile_tmp, 158, 158)){
                    echo 'gagal';
                }
                //echo 'berhasil resize';
                unlink($namafile);
                rename($namafile_tmp,$namafile);
                echo $file_url;
            } else echo 'gagal';
            //echo '<br/>'.$name;
        }
    }    
    die();
}

$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$path 			= $config['basepath'] . $param['path'];
$default_value          = $param['value'];
$asfield		= $param['asfield'];
$title                  = $param['title'];
$namafile               = $param['namafile'];
$pathtujuan             = $param['pathtujuan'];
$replace                = $param['replace'];

if ($asfield=='true' || $asfield==1) {
    $str_asfield = 'name="'.$field.'"';
}
?>

<script language="javascript">
$(function(){
    $('#<?php echo $fieldid;?>').change(function(){
        var formdata = false;
        formdata = new FormData();
        jQuery.each($('#<?php echo $fieldid;?>')[0].files, function(i, file) {
            formdata.append("<?php echo $field;?>[]", file);
        });
        var pathtujuan = '<?php echo $pathtujuan;?>';
        if (pathtujuan.length>0) {
            formdata.append("pathtujuan",pathtujuan);
        }
        var namafile = '<?php echo $namafile;?>';
        if (namafile.length>0) {
            formdata.append("namafile",namafile);
        }    
        formdata.append("f",'<?php echo $fieldid;?>');
        formdata.append("replace",'<?php echo $replace;?>');
        
        $('#label<?php echo $fieldid;?>').html('<img src="<?php echo $config['baseurl'];?>images/ajax-loader.gif" align="middle" />'); 
        
        $.ajax({
                    url:  'index.php?go=sidebar/logo_uploader&p=<?php echo $param['path'];?>',
                    type: 'POST',
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        //alert(res);
                        if (res.indexOf('gagal')>-1) {
                            alert('Gagal upload logo');
                            $('#label<?php echo $fieldid;?>').html('<img src="<?php echo $config['baseurl'];?>images/logo-vendor.png" style="" title="<?php echo $title;?>"/>');
                        } else{
                            var asfield = '<?php echo $asfield;?>';
                            
                            if (asfield.length>0) {
                                var str_asfield = '<input type="hidden" name="<?php echo $field;?>" value="'+res+'" />';
                            } else {
                                var str_asfield = '';
                            }

                            $('#label<?php echo $fieldid;?>').html('');
                            $('#label<?php echo $fieldid;?>').html('<img src="'+res+'?'+Date.now()+'" style="" title="<?php echo $title;?>"/>'+str_asfield);
                        }
                    }
        });
    });
});
</script>
<style>
    #<?php echo $fieldid;?> {
        display:none;
    }
    #<?php echo $fieldid;?>,img {
        cursor: pointer;
        max-width: 158px;
        max-height: 158px;
    }
</style>

<?php   if (strlen($default_value)>0) {
            $default = $default_value;
        }  else {
            $default = $config['baseurl'].'images/logo-vendor.png';
        }
?>
<input type="file" id="<?php echo $fieldid;?>" <?php echo $str_asfield; ?>>
<label for="<?php echo $fieldid;?>" id="label<?php echo $fieldid;?>">
    <img src="<?php echo $default; ?>" style="" title="<?php echo $title;?>"/>
</label>