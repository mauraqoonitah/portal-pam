<?php
$sql		= 'select * from ec_category where level>0 or level=1  order by lft ASC';
$value 		= $param['value'];
//echo $sql;
$datainduk 	= doquery($sql);
?>


<select id="kategori" name="kategori" class="selectbox" required>
<option value="" selected="selected">- Pilih Kategori -</option>
<?php foreach($datainduk as $rowinduk){
            if ($rowinduk['id']==$value){
                    $default = 'selected="selected"';
            } else {
                    $default = '';
            }
            echo '<option value="'.$rowinduk['id'].'" '.$default.'>'.str_repeat('-',intval($rowinduk['level'])).' '.$rowinduk['nama_category'].'</option>';
     }	?>
</select>

<script>
    $(function(){
       $('#kategori').selectbox({
                                    effect: "fade",
                                    onChange: function (value, inst) {
                                        
                                    }
                            }); 
    });
</script>  