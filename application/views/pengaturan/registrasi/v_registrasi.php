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
                    REGISTRASI USER 
                </div>

                <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="myForm" name="simpleForm" novalidate id="simpleForm" action="<?php echo base_url(); ?>pengaturan/registrasi" method="GET">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label>Unit Organisasi</label>
                                                <select class="form-control m-b" id="uo" name="uo" <?php echo $UO == 'RENPROGRAR' ?  "" : "disabled" ;?> >
                                                    <option value="" >Semua Unit Organisasi</option>
                                                    <?php foreach($listuo as $a){?>
                                                    <option value="<?php echo $a['uo']; ?>" <?php if($UO == $a['uo']){echo "selected";}?>><?php echo $a['uo'].' - '.$a['uraianuo']; ?></option>
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
                
				<div class="table-responsive">
                <table  class=" table table-striped table-bordered table-hover" id="">
                    <thead>
                    <tr>
                        <th>NIP/NRP</th>
                        <th>NAMA</th>
                        <th>SATKER</th>
                        <th>UO</th>
                        <th>EMAIL</th>
                        <th>NO HP</th>
                        <th class="text-center">VERIFIKASI</th>
                    </tr>
                    </thead>
                    <tbody id="grid">
                        <?php $no = 1; foreach($data as $get){?>
                                        <tr>
                                            <td><?php echo $get['nip']; ?></td>
                                            <td><?php echo $get['nama']; ?></td>
                                            <td><?php echo $get['satker']; ?></td>
										    <td><?php echo $get['uraianuo']; ?></td>	
                                            <td><?php echo $get['email']; ?></td>
										    <td><?php echo $get['nohp']; ?></td>	
										    <td class="text-center">
                                                <?php if($get['verifikasi'] == '1'){ ?> 
                                                <a href="#" class="btn btn-info btn-sm" disabled>
                                                    <i class="fa fa-check"></i>Verifikasi
                                                </a>
                                                <?php }else{ ?>
                                                <a href="#" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#myModal<?php echo $get['id']; ?>">
                                                    <i class="fa fa-uncheck"></i>Verifikasi
                                                </a>
                                                <div id="myModal<?php echo $get['id']; ?>" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
                                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="color-line"></div>
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Verifikasi</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Anda yakin akan memverifikasi register ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                                            <a href="<?php echo base_url('pengaturan/register_verfikasi/'.$get['id']); ?>" class="btn btn-primary btn-sm">Verifikasi</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>

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
<Script>
    $(function () {
        $('#datatableID').dataTable();
    });
</Script>
<?php $this->load->view('include/footer.php'); ?>
</body>
</html>