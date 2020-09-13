<?php 

global $breadcrumb, $config;
$param = $breadcrumb;
if (count($param)>0) {

?>
<div id="breadcrumb-container">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo $config['baseurl']; ?>">Home </a></li>
        <?php
    
    foreach($param as $label=>$link){
        if ($link=='') {
        ?>
            <li class="active"><?php echo $label; ?></li>
        <?php
        } else if (strpos($link,'http')>-1) {
        ?>
            <li><a href="<?php echo $link; ?>"><?php echo $label; ?></a></li>
        <?php
        } else {
        ?>
            <li><a href="<?php echo $config['baseurl'].$link; ?>"><?php echo $label; ?></a></li>
        <?php
        }
    }
?>
        </ul>
    </div>
</div>            
<?php            
}
?>