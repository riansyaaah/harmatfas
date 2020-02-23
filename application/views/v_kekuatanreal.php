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
                    DATA KEKUATAN REAL 
                </div>

                <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="myForm" name="simpleForm" novalidate id="simpleForm" action="<?php echo base_url(); ?>kekuatanreal/data/<?php echo $id;?>" method="post">
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
				<div class="table-responsive" style="margin-left: auto;margin-right: auto;overflow-y: scroll;overflow-x: hidden;width: 100%; height: 500px;">
                <table cellpadding="1" cellspacing="1" class=" tableSection table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>PEMELIHARAAN/JENIS/KELOMPOK/SUB KELOMPOK/TIPE/SUB TIPE/DETAIL</th>
                        <th>SATUAN</th>
                        <th>KEKUATAN REAL</th>
                    </tr>
                    </thead>
                    <tbody id="grid">
                        <?php $no = 1; foreach($kekuatan as $get){?>
                                        <tr>
                                            <td><?php echo $get['uraian']; ?></td>
                                            <td><?php echo $get['satuan']; ?></td>
                                            <?php if($Level == 'ADMINISTRATOR'){?>
                                            <td style="text-align:right;"><?php echo $get['kekuatanreal']; ?></td>
                                            <?php }else{ ?>
										    <td style="text-align:right;" contenteditable="true" onBlur="saveToDatabasekelompok(this,'kekuatanreal','<?php echo $get['kode']; ?>')" onClick="showEdit(this);"><?php echo $get['kekuatanreal']; ?></td>
                                            
                                            <?php } ?>
										    
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
						
                        <style>

    /*horizontal Grid scrollbar should appear if the browser window is shrinked too much*/
    #grid table
    {
        min-width: 1190px;
    }

</style>
                    
                    
                    
                    
                    
                    </div>
                </div>
            </div>
        </div>
    <div id="snackbar"></div>
    <div id="snackbar_failed"></div>
    </div>
<?php include 'include/phpscript.php';?>
    <script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		function saveToDatabasekelompok(editableObj,column,id) {
			var checkConnection = navigator.onLine;
            console.log(checkConnection);
            // $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
            
            if(checkConnection == true){
                $.ajax({
                    url: "<?php echo base_url();?>kekuatanreal/updatekekuatanreal",
                    type: "POST",
                    data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
                    success: function(data){
                        if(data){
                            console.log(data);
                            var obj = JSON.parse(data);
                            console.log(obj.msg);
                            
                            var x = document.getElementById("snackbar");
                            x.className = "show";
                            x.innerHTML = obj.msg;
                            setTimeout(
                                function(){ 
                                    x.className = x.className.replace("show", ""); 
                                }, 
                            3000);
                        }else{
                            var x_failed = document.getElementById("snackbar_failed");
                            x_failed.className = "show";
                            x_failed.innerHTML = "Data Gagal di Simpan, harap periksa koneksi anda";
                            setTimeout(
                                function(){ 
                                    x_failed.className = x_failed.className.replace("show", ""); 
                                }, 
                            3000);
                        }


                        $(editableObj).css("background","#FDFDFD");
                    }        
                });
            }else{
                var x_failed = document.getElementById("snackbar_failed");
                x_failed.className = "show";
                x_failed.innerHTML = "Data Gagal di Simpan, harap periksa koneksi anda";
                setTimeout(
                    function(){ 
                        x_failed.className = x_failed.className.replace("show", ""); 
                    }, 
                10000);
            }    
		}
        </script>
<?php include 'include/footer.php';?>
</body>
</html>