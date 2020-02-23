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
                    DATA MATA UANG 
                </div>

                <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-lg-4">
                                <form  action="<?php echo base_url(); ?>pengaturan/aplikasi" method="post">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Tahun Anggaran</label>
                                            <select class="form-control m-b" id="tahunanggaran" name="tahunanggaran">
                                                <?php foreach($listtahunanggaran as $b){?>
                                                <option value="<?php echo $b['tahunanggaran']; ?>" <?php if($tahun == $b['tahunanggaran']){echo "selected";}?>><?php echo $b['tahunanggaran']; ?></option>
                                                <?php } ?> 
                                            </select>
                                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-search"></i>  Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Ganti Tahun Aktif</label>
                                        <select class="form-control m-b" id="tahunanggaran_change" name="tahunanggaran">
                                            <?php foreach($listtahunanggaran as $b){?>
                                            <option value="<?php echo $b['tahunanggaran']; ?>" <?php if($tahun == $b['tahunanggaran']){echo "selected";}?>><?php echo $b['tahunanggaran']; ?></option>
                                            <?php } ?> 
                                        </select>
                                        <button type="button" data-toggle="modal" data-target="#modal-delete-tahun" class="btn btn-warning pull-right"><i class="fa fa-save"></i>  Simpan</button>
                                    </div>
                                </div>
                            </div>

                            <div id="modal-delete-tahun" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
                                <div class="modal-dialog modal-dialog-centered" role="document"">
                                    <div class="modal-content">
                                        <div class="color-line"></div>
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Konfirmasi</h4>
                                        </div>
                                        <form action="<?php echo base_url('pengaturan/ganti_tahun'); ?>" method="POST">
                                        <div class="modal-body" id="modal_body">
                                            <p id="belumPilihTahun">Silakan pilih tahun terlebih dahulu</p>
                                        </div>
                                        <div class="modal-footer" id="modal_footer">
                                            
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
        <?php if ($this->session->flashdata('msg_success')) { ?>
            <div class="alert alert-success" style="color:green"> <?php echo $this->session->flashdata('msg_success') ?> </div>
        <?php } ?>

        <?php if ($this->session->flashdata('msg_failed')) { ?>
            <div class="alert alert-danger" style="color:red"> <?php echo $this->session->flashdata('msg_failed') ?> </div>
        <?php } ?>
        </div>
    </div>
                    <div class="row">
    <div class="col-lg-12">
        <div class="hpanel hgreen">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo base_url('pengaturan/add_aplikasi');?>" class="btn btn-info"><i class="fa fa-plus"></i>  Tambah Kurs Mata Uang </a> <br>
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
                        <th>KODE</th>
                        <th>MATA UANG</th>
                        <th>NILAI TUKAR</th>
                        <th>TAHUN ANGGARAN</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody id="grid">
                        <?php $no = 1; foreach($data as $get){?>
                                        <tr>
                                            <td><?php echo $get['kodematauang']; ?></td>
                                            <td><?php echo $get['namamatauang']; ?></td>
										    <td><?php echo $get['nilaitukar']; ?></td>	
										    <td><?php echo $get['tahunanggaran']; ?></td>	
										    <td class="text-center"><a href="<?php echo base_url('pengaturan/edit_aplikasi/'.$get['id']); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> EDIT</td>	
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
<script>
    var counter = 0;
    $('#tahunanggaran_change').one('change',function () {
        $("#belumPilihTahun").remove();
        console.log(counter)
        if(counter > 0 || counter < 2){
            $('#modal_body').append('<p>Anda yakin akan mengganti tahun aktif menjadi <b>'+this.value+'</b>? <br>Sistem akan logout otomatis jika mengganti tahun untuk mengganti session.</p> <br><input type="hidden" name="tahunanggaran_value" value="'+this.value+'">');

            $('#modal_footer').append('<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tidak</button><button type="submit" class="btn btn-primary btn-sm">Ya</a>');
        }
    });
</script>
</body>
</html>