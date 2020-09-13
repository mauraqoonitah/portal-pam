<?php

$module   = 'user';
$moduledb = 'user';

if (isset($_GET['id'])){
	//echo 'tes';
	$id = get('id');	
	$sql = "	select t.id AS id,t.email AS email, t.role as role, 
						p.nama_lengkap,r.nama_role,
						p.nama_lengkap,p.telepon,p.email_kontak,
                                                t.ordering
						from ".$moduledb." t 
						left join user_role r on t.role=r.id 
						left join user_profile p on p.email=t.email						
						where t.id='".$id."' order by id asc";
						//echo $sql;
	$dbedit = doquery($sql);
	$row = $dbedit[0];
}
//debugvar($row);

	//echo widgetbackend('actionmenu',array('<img src="../images/back.png">Batal'=> 'index.php?go='.$module));
?>


<script language="javascript">
$(document).ready(function() { 				
	var default_role = '<?php echo $row['role'];?>';
	//$('.selectpicker').selectpicker('show');
		
	//1 administrator
	//2 pusat
	//3 prov
	//4 kab
	//5 user
	$('#groupprovinsi').hide();
	$('#groupkabupaten').hide();

	if (default_role=='3' || default_role=='4'){
		$('#groupprovinsi').show();
	} else if (default_role=='4'){
		$('#groupkabupaten').show();
	}
	
	$('#role').change(function(){
		$('#groupprovinsi').hide();
		$('#groupkabupaten').hide();
		
		var role = $('#role').val();
		
		if (role=='3' || role=='4'){
			//alert('show prov')
			$('#groupprovinsi').show();
		}
		if (role=='4'){
			$('#groupkabupaten').show();
			//load ajax
		}
		
		//alert(role);	
	});
	
	$('#f_kdprop').change(function(){
		$('#areakab').html('<img src="<?php echo $config['baseurl'].'images/ajax-loader.gif';?>"/>');
		
		var kdprop = $('#f_kdprop').val();
		var code = '9uasd98ausd7ysdf8s';
		var data = 'kdprop='+kdprop+'&code='+code;
		$.ajax({
				url 	: "<?php echo $config['baseurl'];?>index.php?go=sidebar/kab_jx",
				type	: 'post',
				cache 	: false,
				data 	: data ,
				success : function(r) {
							//alert(r)
							$("#areakab").html(r);
				}
			});	
	});
	
	
})	
</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
			<div class="x_title">
                <h4><a href="index.php?go=<?php echo $module; ?>" title="Batal" alt="Batal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> </a> EDIT HALAMAN<br> </h4>		
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>
                    </li>                                        
                </ul>
                <div class="clearfix"></div>
            </div>

<div class="x_content"> 
<form class="form-horizontal" name="form_<?php echo $module; ?>" action="" method="POST">
					<!-- konten start di sini -->
					<div class="form-group">
						<label class="col-sm-2 control-label">Username Login</label>
						<div class="col-sm-4">
							<input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-3">
							<input class="form-control" type="password" name="passwd" id="passwd" value=""/> 
						
						</div>
						<div class="col-sm-6"><small>* tidak perlu diisi jika tidak ingin merubah password</small></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Lengkap</label>
						<div class="col-sm-4">
							<input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" class="form-control"/>
						</div>
					</div>
                    
                    <div class="form-group">
						<label class="col-sm-2 control-label">Nomor Telepon / HP</label>
						<div class="col-sm-4">
							<input type="text" name="telepon" id="telepon" value="<?php echo $row['telepon']; ?>" class="form-control"/>
						</div>
					</div>
					
                    <div class="form-group">
						<label class="col-sm-2 control-label">Email Kontak</label>
						<div class="col-sm-4">
							<input type="text" name="email_kontak" id="email_kontak" value="<?php echo $row['email_kontak']; ?>" class="form-control"/>
						</div>
					</div>
             
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Role</label>
						<div class="col-sm-3">
                            <?php $datarole = doquery('select id,nama_role from user_role order by ordering asc'); ?>
                            <?php echo widgetbackend('inputselect',array(	'field'=>'role',
                                                                                                'value'=>$row['role'],
                                                                                                'kosong'=>'- pilih -',
                                                                                                'option'=>$datarole,
                                                                                                'class'=>'form-control  btn-success',
                                                                                                'data-live-search'=>'true',
                                                                                                'data-style'=>'btn-warning',
                                                                                                )); 
                                                                                                ?>
						</div>
					</div>
					
					

					<div class="form-group">
						<label class="col-sm-2 control-label">Publish</label>
						<div class="col-sm-3">
							<?php echo widgetbackend('inputselect',	array('field'=>'published', 'option'=>array('1'=>'Ya','0'=>'Tidak'))); ?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-3">
                            <a class="btn" href="<?php echo $config['baseurl'].'index.php?go='.$module;?>"><span class="fa fa-arrow-circle-left"></span> Batal</a>
							<button type="submit" class="btn btn-primary" style="width: 100px;"><span class="fa fa-check icon-only"></span> Simpan</a>
						</div>
					</div>

		
	
	
	<!-- konten selesai di sini -->
</form>				

		</div>			

				

		</div>	
 
	</div>

</div>