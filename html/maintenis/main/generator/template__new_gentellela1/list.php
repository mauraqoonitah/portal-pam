<?php echo "<?php\n"; ?>

//isi $sort_order ubah di controller
global $sort_order, $default_sort, $judul_module;
$default_sort   = array('t.id'=>'asc');
$sort_json      = json_encode($default_sort);
$action         = 'List Data ';
<?php echo "?>\n"; ?>

<script language="javascript">	
	$(document).ready(function() {		//load grid pertama kali      
	$("body").tooltip({ selector: '[data-toggle=tooltip]' });
        //alert('test');
          var sort = {};
        		$('#datalist').load('index.php?go=<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>&do=list_jx');
        		$(document).on('click','.nav-paging',function(){
					cari($(this).attr('data-page'));
				});
		$(document).on('click','#button-page',function(){
			cari($('#page_number').val());
		});
			$('#cari').keyup(function( event ) {
				if ( event.which == 13 ) {				
					cari($('#page_number').val());
				}		
			});
		$('#per_page').on('change',function(){
			cari($('#page_number').val());
		});
    //jika row diklik maka tampilkan data detail    
		$(document).on('click','tbody td[data-id]',function(){        
			var id = $(this).attr('data-id');        
			window.location = '<?php echo "<?php"; ?> echo $config['baseurl'].'index.php?go='.$module.'&do=view&id=';<?php echo "?>"; ?>'+id;
			console.log('id klik: '+id);
			//alert($id);    
		});    		
		//tambahan filter di sini sebagai contoh ekseskusi saat jenis_izin diganti selain default		
		//$('#jenis_izin').on('change',function(){		
		//	cari($('#page_number').val());		
		//});				
		$('#hapus').bind('click', function(){
			var nama_model = '<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>';	            
			var itemGroup = '';	            
			var num = 0;
			var baseUrl = 'index.php?go=<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>&do=hapus';
			$('input[type=checkbox]:checked').each(function(){
				if ($(this).attr('name')!='<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>-checkAll'){
					itemGroup = itemGroup +  $(this).val() +  ',';
					num++;						
				}	            
			});                                
				if (itemGroup.length <= 0){                    
					alert('Silakan pilih data yang ingin dihapus');                    
					return false;	            
				}				
				if (confirm('Anda yakin ingin menghapus record ini?')){	
					$.post( baseUrl, {itemGroup: itemGroup}, function(msg){
						data: $(this).serialize()							
						$(".ui-widget").html('<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"><p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>'+msg+'</p></div>');							
						if (msg.indexOf('Sukses')>-1){
							$('input[type=checkbox]:checked').each(function(){	
								$(this).parent().parent().remove();                                    
								cari($('#page_number').val());								
							});							
						}	                
					});					
					return false;	        	
				}			
		});				
		function cari(current_page){			
			$('#datalist').html('<div  style="text-align: center"><img src="images/ajax-loader.gif" /></div>');			
				var page = (typeof current_page === "undefined") ? "1" : current_page;			
					if (sort.length==0) {                
						var sort_order = '{"t.id":"asc"}';            
					} else {                
						var sort_order = JSON.stringify(sort);            
					}                       
					//kalau ada filter tambahan pasang di sini            
					//$filter_tambahan = '&jenis_izin='+$('#jenis_izin').val();           
					$filter_tambahan = '';            			
					var kirim = 'keyword='+$('#cari').val()+'&per_page='+$('#per_page').val()+'&page='+page+'&sort='+sort_order+$filter_tambahan;				
						$.ajax({		            
							url:'index.php?go=<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>&do=list_jx',		            
							type:'post',		            
							cache : false,		            
							data: kirim,		            
							success: 
							function(responsetext) {		            	
								$('#datalist').html(responsetext);			   		
							}				
						});		
	 }			
	 //klik checkbox paling atas akan meng checked semua checkbox di bawah		        
	 $(document).on('click','#<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>-checkAll',
		function(){			
			var checked=this.checked;			
			$("input[name='<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>-check\[\]']").each(function() {
				this.checked=checked;
			});		        
		});		
	//jika sudah checkAll kemudian menguncheck salah satu checkbox dibawah		
		$("input[name='<?php echo "<?php"; ?> echo $module;?>-check\[\]']").on('click', function() {
			$('#<?php echo "<?php"; ?> echo $module;?>-checkAll').prop('checked', $("input[name='<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>-check\[\]']").length==$("input[name='<?php echo "<?php"; ?> echo $module;<?php echo "?>"; ?>-check\[\]']:checked").length);
		});		
		//supaya bisa klik checkbox		
							
			$('#deleteSelected').bind('click', function(){			
				var nama_model = '<?php echo "<?php"; ?> echo $module; <?php echo "?>"; ?>';            
				var itemGroup = '';            
				var num = 0;			
				var baseUrl = 'index.php?go=<?php echo "<?php"; ?> echo $module; <?php echo "?>"; ?>&do=hapus';			
				$('input[type=checkbox]:checked').each(function(){							
					if ($(this).attr('name')!='<?php echo "<?php"; ?> echo $module; <?php echo "?>"; ?>-checkAll'){						
						itemGroup = itemGroup +  $(this).val() +  ',';						
						num++;					
					}            
				});			
					if (itemGroup.length <= 0){                    
						alert('Silakan pilih data yang ingin dihapus');                    
						return false;           						
					}					
					if (confirm('Anda yakin ingin menghapus record ini?')){                
						$.post( baseUrl, {itemGroup: itemGroup}, function(msg){						
							data: $(this).serialize()						
							$(".ui-widget").html('<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"><p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>'+msg+'</p></div>');
							if (msg.indexOf('Sukses')>-1){							
								$('input[type=checkbox]:checked').each(function(){								
									$(this).parent().parent().remove();							
								});						
							}                
						});				
						return false;        	
					}		
			});             
			$(document).on('mouseenter','.sorting',function(){                
				$(this).find('.normal').addClass('asc');        
				$(this).find('.normal').removeClass('normal');             
			});          
			$(document).on('mouseleave','.sorting',function(){        
				$(this).find('.asc').addClass('normal');
				$(this).find('.asc').removeClass('asc');     
			});          
			$(document).on('click','.sorting',function(){        
				$(this).find('.normal').addClass('asc');        
				$(this).find('.normal').removeClass('normal');                
				$(this).addClass('sorting-asc');        
				$(this).removeClass('sorting');                
				var sort_field = $(this).find('a').attr('data-name');        
				if (!(sort_field in sort)) {            
					delete sort[sort_field];        
				}                
				sort[sort_field] = 'asc';        
				cari($('#page_number').val());     
			});               
			$(document).on('mouseenter','.sorting-asc',function(){ 
				$(this).find('.asc').addClass('desc');        
				$(this).find('.asc').removeClass('asc');     
			});          
			$(document).on('mouseleave','.sorting-asc',function(){        
				$(this).find('.desc').addClass('asc');
				$(this).find('.desc').removeClass('desc');     
			});          
			$(document).on('click','.sorting-asc',function(){        
				$(this).find('.asc').addClass('desc');        
				$(this).find('.asc').removeClass('asc');        
				$(this).addClass('sorting-desc');       
				$(this).removeClass('sorting-asc');                
				var sort_field = $(this).find('a').attr('data-name');
					if (!(sort_field in sort)) {            
						delete sort[sort_field]; //delete sort field ini yg pernah ada        
					}                
					sort[sort_field] = 'desc';        
					cari($('#page_number').val());     
			});          
			$(document).on('mouseenter','.sorting-desc',function(){        
				$(this).find('.desc').addClass('normal');        
				$(this).find('.desc').removeClass('desc');     
			});          
			$(document).on('mouseleave','.sorting-desc',function(){        
				$(this).find('.normal').addClass('desc');        
				$(this).find('.normal').removeClass('normal');     
			});         
			$(document).on('click','.sorting-desc',function(){        
				$(this).find('.desc').addClass('normal');        
				$(this).find('.desc').removeClass('desc');       
				$(this).addClass('sorting');        
				$(this).removeClass('sorting-desc');                
			var sort_field = $(this).find('a').attr('data-name');        
			if ((sort_field in sort)) {            
				delete sort[sort_field]; //delete sort field ini yg pernah ada        
			}                
			cari($('#page_number').val());     
			});     	
			});
</script>

<style>
.sorting, 
.sorting-asc , 
.sorting-desc  {    
	text-decoration: none !important;
	cursor: pointer; 
}
.normal{    
	padding-top:5px;    
	margin-top: 5px;    
	width: 16px;    
	height:16px;    
	display:inline-block;                    
	background: url('<?php echo "<?php"; ?> echo $config['baseurl'];<?php echo "?>"; ?>images/sort_both.png') no-repeat;        
}    
.asc{    
	padding-top:5px;    
	margin-top: 5px;    
	width: 16px;    
	height:16px;    
	display:inline-block;                    
	background: url('<?php echo "<?php"; ?> echo $config['baseurl'];<?php echo "?>"; ?>images/sort_asc.png') no-repeat;        
}   
.desc{    
	padding-top:5px;    
	margin-top: 5px;    
	width: 16px;    
	height:16px;    
	display:inline-block;                    
	background: url('<?php echo "<?php"; ?> echo $config['baseurl'];<?php echo "?>"; ?>images/sort_desc.png') no-repeat;        
}     
.button-page{	
	height: 34px;
}
.space{	
	height: 5px;	
	display: block;	
	clear: both;	
	margin: 5px;
}
.space1{	
	height: 10px;	
	display: block;	
	clear: both;	
	margin: 5px;
}
th{    
	text-align:center;
}
.table tr{    
	cursor: pointer;
}
</style>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
			<div class="x_title">
				<h4><?php  echo $action; ?></h4>		
			</div>		
			<div class="clearfix"></div>	
			<div class="panel-collapse collapse in" id="ft-0">			
				<div class="widget-body">				
					<div class="form-horizontal" role="form">				
					<!-- konten start di sini -->					
						<div class="col-lg-12">						
							<a href="<?php echo "<?php"; ?> echo $config['baseurl'].'index.php?go='.$module.'&do=tambah'; <?php echo "?>"; ?>" class="btn btn-info" style="width: 100px;">                            
								<span class="glyphicon glyphicon-plus"></span> Baru</a>					
							</div>					
						    <div class="space1"></div>					
							<div class="space1"></div>	            	
							<div class="col-lg-2">	            		
								<div class="input-group date">	            			
									<span class="input-group-addon ">Per Halaman</span>	            			
										<?php echo "<?php\n"; ?>	            			
											$option = array(		            								
												'5'=>'5',	            								
												'10'=>'10',	            								
												'15'=>'15',	            								
												'20'=>'20',	            								
												'25'=>'25',	            								
												'50'=>'50',	            								
												'100'=>'100',	            						
											);	            				            			
											$per_page = $_SESSION['per_page'];	            			
											if ($per_page==''){								
												$per_page = 10;							
											}	            			
											echo widget('inputselect',array(
												'field'=>'per_page',	            											
												'option'=>$option,	            											
												'value'=>$per_page,	            			
											));	            			
							<?php echo "\n?>"; ?>					
								</div>					
							</div>										                                        
					<div class="col-lg-6"> </div>					
					<div class="col-lg-4">						
						<div class="input-group date">							
							<span class="input-group-addon"><i class="glyphicon glyphicon-search blue"></i></span>							
							<input type="text" name="cari" id="cari" class="form-control" />						
						</div>					
					</div>					
					<div class="space1"></div>					
					<!-- tempat menampung data record -->					
					<div id="datalist"></div>					
					<div class="col-lg-12">					
						<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" id="hapus"><span class="fa fa-fw fa-times"></span>Hapus</button>					
					</div>                    <!-- konten selesai di sini -->					
					<div class="space"></div>				
				</div>			
			</div>		
		</div>   
	</div>
</div>
</div>