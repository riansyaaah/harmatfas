<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<?php $this->load->view('include/head.php'); ?>

<body>
<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/menu.php'); ?>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                
                <div class="panel-heading">
                    <?php echo $statusdata == 'add' ?  "TAMBAH" : "EDIT"; ?> DATA PEJABATAN TANDA TANGAN
                </div>
                    <div class="row">
                        
    <div class="col-lg-12">
        <div class="hpanel hgreen">
            <div class="panel-body">
                <div class="row">
                            

                        
                        <div class="tab-content">
							<div id="active" class="p-m tab-pane active">
                                <form id="myForm" name="simpleForm" novalidate id="simpleForm" action="<?php echo base_url(); ?>pengaturan/action_tandatangan" method="post">
								<div class="row">
									
									<div class="col-lg-12">
										<div class="row">
											<div class="form-group col-lg-3">
												<label>NRP</label>
                                                <input type="hidden" value="<?php echo (isset($statusdata)) ? $statusdata : ""; ?>" id="statusdata" name="statusdata" class="form-control" placeholder="statusdata" required>
                                                <input type="hidden" value="<?php echo (isset($edit_id)) ? $edit_id : ""; ?>" id="id" name="id" class="form-control" placeholder="id" required>
												<input type="text" value="<?php echo (isset($edit_nrp)) ? $edit_nrp : ""; ?>" id="nrp" name="nrp" class="form-control" placeholder="NRP" required>
											</div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-5" >
												<label>Nama</label> 
												<input type="text" value="<?php echo (isset($edit_nama)) ? $edit_nama : ""; ?>" id="nama" name="nama" class="form-control" placeholder="Nama" required>
											</div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-5" >
												<label>Pangkat</label> 
												<input type="text" value="<?php echo (isset($edit_pangkat)) ? $edit_pangkat : ""; ?>" id="pangkat" name="pangkat" class="form-control" placeholder="Pangkat" required>
											</div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-5" >
												<label>Jabatan</label> 
												<input type="text" value="<?php echo (isset($edit_jabatan)) ? $edit_jabatan : ""; ?>" id="jabatan" name="jabatan" class="form-control" placeholder="Jabatan" required>
											</div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-3">
												<label>UO</label>
												<select class="form-control m-b" id="uo" name="uo">
                                                    <option value="" > Pilih </option>
                                                    <?php foreach($listuo as $r){?>
                                                    <option value="<?php echo $r['id']; ?>" 
                                                        <?php echo $edit_uo == $r['id'] ? "selected" : ""; ?>> 
                                                        <?php echo $r['uo']; ?>
                                                    </option>
                                                    <?php } ?> 
                                                </select>
											</div>
                                        </div>
                                        
                                        <div class="row">
                                        	<div class="form-group col-lg-3">
												<label>Status </label>
												<select class="form-control m-b" id="status" name="status" >
                                                    <option <?php echo $edit_status == '0' ? "selected" : "" ;?> value="0">Aktif</option>
                                                    <option <?php echo $edit_status == '1' ? "selected" : "" ;?> value="1">Tidak Aktif</option>
                                                </select>
											</div>
										</div>

									</div>
								</div>

								<div class="text-right m-t-xs">
									<hr>
									<button type="reset" class="btn btn-warning"><span class="pe-7s-refresh"></span> Reset</button>
									<button type="submit" class="btn btn-info"><span class="pe-7s-play"></span> Simpan</button>
								</div>
                                     </form>
							</div>

                         </div>
                   
                        </div>
            </div>
            
        </div>
    </div>
    
</div>
						
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('include/phpscript.php'); ?>
<?php $this->load->view('include/footer.php'); ?>
</body>
</html>