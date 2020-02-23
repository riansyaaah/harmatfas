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
                    DATA REFERENSI NORMA INDEK
                </div>

                <div class="panel-body">
                    </div>
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
                        <th>MATA UANG</th>
                        <th>NILAI NORMA</th>
                        <th>NILAI INDEK</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody id="grid">
                        <?php $no = 1; foreach($kekuatan as $get){?>
                                        <tr>
                                            <td><?php echo $get['uraian']; ?></td>
                                            <td><?php echo $get['satuan']; ?></td>
										    <td><?php echo $get['matauang']; ?></td>	
                                            <td style="text-align:right;"><?php echo number_format(intval($get['nilnorma']),2); ?></td>
                                            <td style="text-align:right;"><?php echo number_format(intval($get['nilindex']),2); ?></td>
                                           <td><a href="<?php echo base_url(); ?>referensi/gunakan/<?php echo $get['kode'];?>"><button id="submit-buttons" type="button" class="btn btn-success pull-left">Gunakan</button></a></td>
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
    </div>
<?php include 'include/phpscript.php';?>
<?php include 'include/footer.php';?>
</body>
</html>