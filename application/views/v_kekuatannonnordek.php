<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<?php include 'include/head.php';?>

<body>
<?php include 'include/header.php';?>

<?php include 'include/menu.php';?>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                
                <div class="panel-heading">
                    DATA BARU MATERIIL ALUT/NON ALUT/FASBANG - TANPA NORDEK
                </div>

                <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="myForm" name="simpleForm" novalidate id="simpleForm" action="<?php echo base_url(); ?>kekuatannonnordek" method="post">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label>Unit Organisasi</label>
                                                <select class="form-control m-b" id="uo" name="uo" <?php if($Level != 'ADMINISTRATOR'){echo "disabled";}?> >
                                                    <?php foreach($listuo as $a){?>
                                                    <option value="<?php echo $a['uo']; ?>" <?php if($uocari == $a['uo']){echo "selected";}?>><?php echo $a['uo'].' - '.$a['uraianuo']; ?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label>Tahun Anggaran</label>
                                                <select class="form-control m-b" id="tahunanggaran" name="tahunanggaran">
                                                    <?php foreach($listtahunanggaran as $b){?>
                                                    <option value="<?php echo $b['tahunanggaran']; ?>" <?php if($tahuncari == $b['tahunanggaran']){echo "selected";}?>><?php echo $b['tahunanggaran']; ?></option>
                                                    <?php } ?> 
                                                </select>
                                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-search"></i>  Filter</button>
                                                <a target="_blank" href="<?php echo base_url(); ?>kekuatannonnordek/tambahdata" class="btn btn-warning pull-right"><i class="fa fa-save"></i> Tambah Data</a> 
                                            </div>
                                           
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <br>
                    <div class="row">
                        
    <div class="col-lg-12">
        <div class="hpanel hgreen">
            <div class="panel-body">
                
                <div class="row">
                            <div class="col-lg-12" id="tablekendo">
              <div class="table-responsive">
                <table cellpadding="1" cellspacing="1" class=" tableSection table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>URAIAN</th>
                        <th>KEKUATAN</th>
                        <th>UO</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody id="grid">
                        <?php $no = 1; foreach($data as $get){?>
                                        <tr>
                                            <td><?php echo $get['uraian']; ?></td>
                                            <td><?php echo $get['kekuatan']; ?></td>
										    <td><?php echo $get['uo']; ?></td>	
										    <td><a href="<?php echo base_url(); ?>kekuatannonnordek/hapus/<?php echo $get['id'];?>"><button id="submit-buttons" type="submit" class="btn btn-success pull-left">Hapus</button></a></td>
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

<?php include 'include/phpscript.php';?>
<?php include 'include/footer.php';?>
</body>
</html>