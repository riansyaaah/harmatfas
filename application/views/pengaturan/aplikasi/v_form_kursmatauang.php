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
                    <?php echo $statusdata == 'add' ?  "TAMBAH" : "EDIT"; ?> KURS MATA UANG
                </div>
                    <div class="row">
                        
    <div class="col-lg-12">
        <div class="hpanel hgreen">
            <div class="panel-body">
                <div class="row">
                            

                        
                        <div class="tab-content">
							<div id="active" class="p-m tab-pane active">
                                <form id="myForm" name="simpleForm" novalidate id="simpleForm" action="<?php echo base_url(); ?>pengaturan/action_aplikasi" method="post">
								<div class="row">
									
									<div class="col-lg-12">
                                        <div class="row">
                                            <div class="form-group col-lg-3">
												<label>TAHUN ANGGARAN</label>
												<select class="form-control m-b" id="tahunanggaran" name="tahunanggaran">
                                                    <option value="" > Pilih </option>
                                                    <?php foreach($listtahunanggaran as $r){?>
                                                    <option value="<?php echo $r['tahunanggaran']; ?>" 
                                                        <?php echo $edit_tahunanggaran == $r['tahunanggaran'] ? "selected" : ""; ?>> 
                                                        <?php echo $r['tahunanggaran']; ?>
                                                    </option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-1">
                                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                <button type="button" class="btn btn-info" id="button_add_tahunanggaran"><i class="fa fa-plus"></i></button>
                                            </div>
                                            <div class="form-group col-lg-3" id="div_add_tahunanggaran">
                                                <!-- FORM INPUR TAMBAH TAHUN ANGGARAN -->
                                            </div>
                                        </div>

										<div class="row">
											<div class="form-group col-lg-3">
												<label>KODE MATA UANG</label>
                                                <input type="hidden" value="<?php echo (isset($statusdata)) ? $statusdata : ""; ?>" id="statusdata" name="statusdata" class="form-control" placeholder="statusdata" required>
                                                <input type="hidden" value="<?php echo (isset($edit_id)) ? $edit_id : ""; ?>" id="id" name="id" class="form-control" placeholder="id" required>
                                                
                                                <?php if($statusdata == 'edit'){ ?>
                                                <input type="hidden" value="<?php echo $edit_kodematauang; ?>" id="old_kodematauang" name="old_kodematauang" class="form-control" placeholder="KODE MATA UANG" required>
                                                <input type="hidden" value="<?php echo $edit_tahunanggaran; ?>" id="old_tahunanggaran" name="old_tahunanggaran" class="form-control" placeholder="KODE TAHUN ANGGARAN" required>
                                                <?php } ?>

                                                <input type="text" value="<?php echo (isset($edit_kodematauang)) ? $edit_kodematauang : ""; ?>" id="kodematauang" name="kodematauang" class="form-control" placeholder="KODE MATA UANG" required>


                                            </div>
                                            <div id="validasi-kodematauang" class="form-group col-lg-12" style="text-align:left; display:none;">
                                                <span style="color:red">MATA UANG SUDAH ADA</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-5" >
												<label>NAMA MATA UANG</label> 
												<input type="text" value="<?php echo (isset($edit_namamatauang)) ? $edit_namamatauang : ""; ?>" id="namamatauang" name="namamatauang" class="form-control" placeholder="NAMA MATA UANG" required>
											</div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-5" >
												<label>NILAI TUKAR</label> 
												<input type="text" value="<?php echo (isset($edit_nilaitukar)) ? $edit_nilaitukar : ""; ?>" id="nilaitukar" name="nilaitukar" class="form-control" placeholder="NILAI TUKAR" required>
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
<script>

    var counter = 0;
    $('#button_add_tahunanggaran').one('click',function() {
        if(counter > 0 || counter < 2){
            $('#div_add_tahunanggaran').append('<label>TAMBAH TAHUN ANGGARAN</label>'+
                                                '<div class="input-group"> <input type="number"  id="new_tahunanggaran" name="new_tahunanggaran" class="form-control" > <span class="input-group-btn"><button class="btn btn-warning" type="button" id="submit_add_tahunanggaran" >SIMPAN</button></span> ');
            counter++;
        }
    });
    
    $('#div_add_tahunanggaran').on('click', '#submit_add_tahunanggaran', function() {
        var new_tahunanggaran = document.getElementById("new_tahunanggaran").value;
        console.log("new tahun anggaran : " + new_tahunanggaran);
        if(new_tahunanggaran != ''){
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('pengaturan/action_tahunanggaran'); ?>",
                data: {
                    'new_tahunanggaran': new_tahunanggaran
                },
                success: function (data) {
                    console.log("Result Json tahunanggaran : " + data)
                    window.location.reload();
                }
            });
        }
    });

    $(document).ready(function() {
        $('#kodematauang').change(function () {
            var tahunanggaran = $("#tahunanggaran").val();
            console.log("kodematauang : " + this.value);
            console.log("tahunanggaran : " + tahunanggaran);
            if(this.value != '' || tahunanggaran != ''){
                console.log("POST DATA check_kodematauang");
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('pengaturan/check_kodematauang'); ?>",
                    data: {
                        'kodematauang': this.value,
                        'tahunanggaran': tahunanggaran
                    },
                    success: function (data) {
                        console.log("Result Json kodematauang : " + data)
                        if(data == 'false'){
                            console.log("Show Validasi kodematauang");
                            $("#kodematauang").val('');
                            $('#validasi-kodematauang').show();
                        }else{
                            console.log("Hide Validasi kodematauang");
                            $('#validasi-kodematauang').hide();
                        }
                    }
                });
            }else{
                $('#validasi-kodematauang').hide();
            }
        });
    });
</script>
<?php $this->load->view('include/footer.php'); ?>
</body>
</html>