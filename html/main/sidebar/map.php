

<style>
    .google-maps {
        position: relative;
        padding-bottom: 3%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>



    <div class="space-small bg-primary">
        <!-- call to action --><center><h1 class="cta-title">MAP</h1></center>
        <div class="container">
<div class="google-maps">
        <font color="black">
    <div style='overflow:hidden;height:400px;width:1200px;'><div id='gmap_canvas' style='height:450px;width:1200px;'>
        <strong><?php echo $config['nama_tempat']; ?> </strong>terletak pada lokasi <br /><iframe src="<?php echo $config['coordinat']; ?>" width="800" height="400" frameborder="0" style="border:0"></iframe>
        </div>
        </div>
        </div>
        <br />
        
    </div></font>

        
</div>
</div>
</div>