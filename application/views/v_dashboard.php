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
                    DASHBORD 
                </div>

                <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="myForm" name="simpleForm" novalidate id="simpleForm" action="<?php echo base_url(); ?>dashboard" method="post">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label>Unit Organisasi</label>
                                                <select class="form-control m-b" id="uo" name="uo" <?php if($UO != 'RENPROGAR'){echo "disabled";}?> >
                                                    <?php foreach($listuo as $a){?>
                                                    <option value="<?php echo $a['uo']; ?>" <?php if($UO == $a['uo']){echo "selected";}?>><?php echo $a['uo'].' - '.$a['uraianuo']; ?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
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
                            -
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


   <script>

    $(function () {
        $('#datatable').dataTable();

    });

</script>
    <?php include 'include/footer.php';?>
</body>
</html>