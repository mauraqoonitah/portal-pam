<?php 
global $edit_mode;

//file ini digunakan sbg widget dan juga sbg ajax, jadi menggunakan post dan param
$row = post('data');

$id          = post('id');
$id_anggota  = post('id_anggota');
$edit_mode  = post('edit_mode');
//echo $id;
if ($id=='') {
    $id             = $param['id'];
    $row            = $param['data'];
    $id_anggota     = $param['id_anggota'];
    
    
} else {
    $config['theme'] = '';
}

if ($edit_mode) {
    $disabled_edit = '';
}else $disabled_edit = 'disabled';
//echo $edit_mode;
//echo $disabled_edit;

if ($row['f_status_paw']=='SELESAI') { 
        $disabled_edit = 'disabled';
    }
//echo $disabled_edit;    

//echo $id;
?>
					<div class="col-sm-12"><h3>File Pendukung</h3></div>
					<div class="col-sm-6">
						<div class="form-group">			
							<label class="control-label">File SK Penetapan Calon Terpilih</label>
							<br/>
							<?php echo widget(  'file_uploader', 
										array(	'field'		=> 'f_file_sk_penetapan_terpilih_'.$id_anggota,
                                                'id'        => 'f_file_sk_penetapan_terpilih_' . $id_anggota,
												'path'		=> 'attachment',
                                                'disabled'  => $disabled_edit,
												'value'		=> $row['f_file_sk_penetapan_terpilih'],
								  ));
							?>							
						</div>									
					</div>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<div class="form-group">			
							<label class="control-label">File SK Pengesahan Pemberhentian Anggota</label>
							<br/>
							<?php echo widget(  'file_uploader', 
										array(	'field'		=> 'f_file_sk_pemberhentian_'.$id_anggota,
                                            	'id'   		=> 'f_file_sk_pemberhentian_'.$id_anggota,
												'path'		=> 'attachment',
                                                'disabled'  => $disabled_edit,
												'value'		=> $row['f_file_sk_pemberhentian'],
								  ));
                            //echo $row['f_file_sk_pemberhentian'].'......';
                            //debugvar($row);
							?>
						</div>									
					</div>
					
					<div class="clearfix"></div>

					<div class="col-sm-6">
						<div class="form-group">			
							<label class="control-label">File Berita Acara Penetapan Calon Terpilih (Formulir EB)</label>
							<br/>
							<?php echo widget(  'file_uploader', 
										array(	'field'		=> 'f_file_ba_penetapan_terpilih_'.$id_anggota,
                                            	'id'   		=> 'f_file_ba_penetapan_terpilih_'.$id_anggota,
												'path'		=> 'attachment',
                                                'disabled'  => $disabled_edit,
												'value'		=> $row['f_file_ba_penetapan_terpilih'],
								  ));
							?>
						</div>									
					</div>

					<div class="col-sm-1"></div>
                    
					<div class="col-sm-5">
						<div class="form-group">			
							<label class="control-label">File Data Pendukung Pemberhentian Anggota</label>
							<br/>
							<?php echo widget(  'file_uploader', 
										array(	'field'		=> 'f_file_pendukung_pemberhentian_'.$id_anggota,
                                            	'id'		=> 'f_file_pendukung_pemberhentian_'.$id_anggota,
												'path'		=> 'attachment',
                                                'disabled'  => $disabled_edit,
												'value'		=> $row['f_file_pendukung_pemberhentian'],
								  ));
							?>
						</div>									
					</div>
					
						<div class="clearfix"></div>
					
					<div class="col-sm-6">
					<div class="form-group">			
						<label class="control-label">File Formulir DCT</label>
							<br/>
							<?php echo widget(  'file_uploader', 
										array(	'field'		=> 'f_file_formulir_dct_'.$id_anggota,
                                            	'id'		=> 'f_file_formulir_dct_'.$id_anggota,
												'path'		=> 'attachment',
                                                'disabled'  => $disabled_edit,
												'value'		=> $row['f_file_formulir_dct'],
								  ));
							?>
						</div>									
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-12"><h3>Klarifikasi Surat Permintaan PAW</h3></div>
					<div class="col-sm-6">
					<div class="form-group">
						
						<label class="control-label">File Surat Klarifikasi 1</label>
							<br/>
							<?php echo widget(  'file_uploader', 
										array(	'field'		=> 'f_file_klarifikasi1_'.$id_anggota,
                                                'id'		=> 'f_file_klarifikasi1_'.$id_anggota,
												'path'		=> 'attachment',
                                                'disabled'  => $disabled_edit,
												'value'		=> $row['f_file_klarifikasi1'],
								  ));
							?>
						</div>									
					</div>
                    <div class="col-sm-1"></div>
					<div class="col-sm-5">
					<div class="form-group">
						
						<label class="control-label">File Surat Klarifikasi 2</label>
							<br/>
							<?php echo widget(  'file_uploader', 
										array(	'field'		=> 'f_file_klarifikasi2_'.$id_anggota,
                                            	'id'		=> 'f_file_klarifikasi2_'.$id_anggota,
												'path'		=> 'attachment',
                                                'disabled'  => $disabled_edit,
												'value'		=> $row['f_file_klarifikasi2'],
								  ));
							?>
						</div>									
					</div>