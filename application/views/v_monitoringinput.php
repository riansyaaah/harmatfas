<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<?php include 'include/head.php';?>
<style type="text/css">
                div.k-spreadsheet-formula-bar
/*        div.k-spreadsheet-tabstrip,
        div.k-spreadsheet-toolbar*/
        {
            display: none;
        }
       
       table ,tr td{
    border:1px solid red
}
tbody {
    display:block;
    height:400px;
    overflow:auto;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;/* even columns width , fix width of table too*/
}
thead {
    width: calc( 100%)/* scrollbar is average 1em/16px width, remove it from thead width */
}
table {
    width:400px;
}
    </style>  
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
                    DATA LOG PENGINPUTAN OLEH USER UO 
                </div>

                <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label>Unit Organisasi</label>
                                                <select class="form-control m-b" id="uo" name="uo" <?php if($UO != 'RENPROGAR'){echo "disabled";}?> >
                                                    <?php foreach($listuo as $a){?>
                                                    <option value="<?php echo $a['uo']; ?>" <?php if($UO == $a['uo']){echo "selected";}?>><?php echo $a['uo'].' - '.$a['uraianuo']; ?></option>
                                                    <?php } ?> 
                                                </select>
                                                <a target="_blank" href="<?php echo base_url(); ?>monitoringinput/printmonitoring" class="btn btn-success pull-right"><i class="fa fa-print"></i> CETAK MONITORING INPUT DATA</a>
                                            </div>
                                            
                                        </div>
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
                            <div class="form-group col-lg-12 table-responsive">
												 <table class="table table-striped table-bordered table-hover">
													<thead>
														<th>NO</th>
                                                        <th>TANGGAL</th>
														<th>IP</th>
														<th>USER</th>
														<th>UO</th>
														<th>URAIAN</th>
														<th>KETERANGAN</th>
													</thead>
													<tbody id = 'list'>
														
													<tbody>
                                                        
												</table>
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
    <script type="text/javascript">
           
    var txtid = 0;
 var auto_refresh = setInterval(function()
 {
 
     
var url="<?php echo base_url(); ?>monitoringinput/datamonitoring/"+txtid;
 $.getJSON(url,function(result){
 console.log(result);
     var html = "";
     
 $.each(result, function(i, field){
     var txttanggal=field.tanggal;
     var txtip=field.ip;
     var txtuser=field.username;
     var txtuo=field.uo;
     var txturaian=field.uraian;
     var txtketerangan=field.keterangan;
     var newtxtid = field.id;
     
     html += "<tr><td>"+txtid+"</td><td>"+txttanggal+"</td><td>"+txtip+"</td><td>"+txtuser+"</td><td>"+txtuo+"</td><td>"+txturaian+"</td><td>"+txtketerangan+"</td></tr>";
     txtid=newtxtid;
 });
     $("#list").append(html);
     document.getElementById("list")[0];
     document.getElementById("list").scrollTop = document.getElementById("list").scrollHeight;
     var myDiv = document.getElementById('list');
myDiv.innerHTML = variableLongText;
myDiv.scrollTop = 0;
 });
 
 }, 1000);
 </script>
<?php include 'include/footer.php';?>
</body>
</html>