
     <?php
    $sidebar = getsidebar();
    $template_path = $config['baseurl'] . 'themes/flower/';
    $template_path2 = $config['baseurl'] . 'themes/elite/';
       $template_pathss = $config['baseurl'] .  'themes/elite/artmenu/';
    registerCSS($config['baseurl'] . 'res/ecommerce.css');
$path = $config['baseurl'].'themes/elite/mnzweb/'; 
$path2 = $config['baseurl'].'images/header/'; 

 $config['theme']="";
    $nama_template = 'doctor';
        $template_path7sky = $config['baseurl'] . 'themes/'.$nama_template.'/';
        $template_pathelite = $config['baseurl'] . 'themes/elite/magexpress/';


    ?>

   





   <?php
    $datagaleri = doquery('select * from galeri where published=1 order by ordering asc');          
    foreach ($datagaleri as $row){?>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <!-- service block -->
                        <div class="service-img mb20">
                            <!-- service img -->
                            <a href="#"><img width="400px" height="200px" src="<?php echo $config['baseurl'];?>images/galeri/<?php echo $row['image'];?>
"></a>
                        </div>
                        <!-- service img -->
                 
                        <br>
                        <br>
                        <!-- service content -->
                    </div>
                    <!-- /.service block -->
                </div>

                <?php   }           
?>      
                
            </div>
        </div>
    </div>



























