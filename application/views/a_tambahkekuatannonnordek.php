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
                </div><br>
                    <div class="row">
                        
    <div class="col-lg-12">
        <div class="hpanel hgreen">
            <div class="panel-body">
                <div class="row">
                            

                        
                        <div class="tab-content">
							<div id="active" class="p-m tab-pane active">
                                <form id="myForm" name="simpleForm" novalidate id="simpleForm" action="<?php echo base_url(); ?>kekuatannonnordek/simpandata" method="post">
								<div class="row">
									
									<div class="col-lg-12">
										<div class="row">
											<div class="form-group col-lg-6">
												<label>UO</label>
												<input type="text" value="<?php echo $UO; ?>" id="uo" name="uo" class="form-control" placeholder="UO" readonly>
											</div>
											<div class="form-group col-lg-3" >
												<label>User</label> 
												<input type="text" value="<?php echo $NamaLengkap; ?>" id="" class="form-control"   readonly>
											</div>
                                            <div class="form-group col-lg-3" >
												<label>TA</label> 
												<input type="text" value="<?php echo $tahun; ?>" id="tahunanggaran" name="tahunanggaran" class="form-control"   readonly>
											</div>
											<div class="form-group col-lg-6">
												<label>PEMELIHARAAN </label>
												<select class="form-control m-b" id="pemeliharaan" name="pemeliharaan" >
                                <option value="">PILIH PEMELIHARAAN</option>
                                <option value="1">ALAT UTAMA TNI</option>
                                <option value="2">NON ALAT UTAMA TNI</option>
                                <option value="3">FASILITAS DAN BANGUNAN</option>
                            </select>
											</div>
                                            <div class="form-group col-lg-6">
												<label>KELOMPOK </label>
												<select class="form-control m-b" id="kelompok" name="kelompok"></select>
											</div>
											<div class="form-group col-lg-6">
												<label>URAIAN</label>
												<input type="text" value="<?php echo (isset($uraian)) ? $uraian : ""; ?>" id="uraian" name="uraian" class="form-control"  placeholder="Uraian" name="uraian">
											</div>
                                            <div class="form-group col-lg-6">
												<label>SATUAN</label>
												<input type="text" value="<?php echo (isset($satuan)) ? $satuan : ""; ?>" id="satuan" name="satuan" class="form-control"  placeholder="Satuan" name="satuan">
											</div>
                                            <div class="form-group col-lg-6">
												<label>MATA UANG</label>
												<select class="form-control m-b" id="matauang" name="matauang">
                                                    <?php foreach($listmatauang as $b){?>
                                                    <option value="<?php echo $b['kodematauang']; ?>" ><?php echo $b['kodematauang']; ?></option>
                                                    <?php } ?> 
                                                </select>
											</div>
                                            <div class="form-group col-lg-6">
												<label>KEKUATAN</label>
												<input type="text" value="<?php echo (isset($kekuatan)) ? $kekuatan : ""; ?>" name="kekuatan" class="form-control" placeholder="kekuatan" >
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

<?php include 'include/phpscript.php';?>
    <script type="text/javascript">


    $(document).ready(function() {
        $('select[name="pemeliharaan"]').on('change', function() {
            var kodeparrent = $(this).val();
            if(kodeparrent) {
                $.ajax({
                    url: '<?php echo base_url(); ?>kekuatannonnordek/getkelompok/'+kodeparrent,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="kelompok"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kelompok"]').append('<option value="'+ value.kodechild +'">'+ value.uraian +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="kelompok"]').empty();
            }
        });
    });
</script>
<?php include 'include/footer.php';?>
</body>
</html>