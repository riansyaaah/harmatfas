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
                    PEJABAT PENANDATANGAN 
                </div>

                <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="myForm" name="simpleForm" novalidate id="simpleForm" action="<?php echo base_url(); ?>pengaturan/tandatangan" method="GET">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label>Unit Organisasi</label>
                                                <select class="form-control m-b" id="uo" name="uo" <?php echo $UO == 'RENPROGRAR' ?  "" : "disabled" ;?> >
                                                    <option value="" >Semua Unit Organisasi</option>
                                                    <?php foreach($listuo as $a){?>
                                                    <option value="<?php echo $a['id']; ?>" <?php if($UO == $a['uo']){echo "selected";}?>><?php echo $a['uo'].' - '.$a['uraianuo']; ?></option>
                                                    <?php } ?> 
                                                </select>
                                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-search"></i>  Filter</button>
                                            </div>
                                            
                                            
                                        </div>
                                        </form>
                            </div>
                        </div>
                        </div>
                    <br>
    <div class="row">
        <div class="col-lg-12">
        <?php if ($this->session->flashdata('msg_success')) { ?>
            <div class="alert alert-success" style="color:orange"> <?php echo $this->session->flashdata('msg_success') ?> </div>
        <?php } ?>
        </div>
    </div>

                    <div class="row">
    <div class="col-lg-12">
        <div class="hpanel hgreen">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo base_url('pengaturan/add_tandatangan');?>" class="btn btn-info"><i class="fa fa-plus"></i>  Tambah Tanda Tangan </a> <br>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                
                <div class="col-lg-12" id="tablekendo">
                
				<div class="table-responsive">
                <table cellpadding="1" cellspacing="1" class=" tableSection table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>NRP</th>
                        <th>NAMA</th>
                        <th>PANGKAT</th>
                        <th>JABATAN</th>
                        <th>UO</th>
                        <th>STATUS</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody id="grid">
                        <?php $no = 1; foreach($data as $get){?>
                                        <tr>
                                            <td><?php echo $get['nrp']; ?></td>
                                            <td><?php echo $get['nama']; ?></td>
                                            <td><?php echo $get['pangkat']; ?></td>
                                            <td><?php echo $get['jabatan']; ?></td>
										    <td><?php echo $get['uraianuo']; ?></td>	
										    <td><?php echo $get['status'] == '0' ? 'Aktif' : 'Tidak Aktif'; ?></td>	
										    <td class="text-center">
                                                <a href="<?php echo base_url('pengaturan/edit_tandatangan/'.$get['id']); ?>" class="btn btn-warning btn-sm">
                                                EDIT
                                                </a>
                                            </td>	
                                        </tr>
                        <?php $no++; } ?> 
                    </tbody>
                </table>
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