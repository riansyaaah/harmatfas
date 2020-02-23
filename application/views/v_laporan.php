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
					<div class="panel-body">
						<div class="tab-content">
							<div id="active" class="p-m tab-pane active">

								<div class="row">
    <div class="col-lg-12">
        <div class="hpanel hgreen">
            <div class="panel-body">
                <form action="<?php echo base_url(); ?>laporan/cetak" method="POST" target="_blank"> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="usr">Pilih Jenis Laporan</label>
                        <div class="radio">
                            <input type="radio" name="pilihhasil" id="pilihhasil2" value="a1">
                            <label for="radio1">
                                Anggaran Harwat UO
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="pilihhasil" id="pilihhasil3" value="a2">
                            <label for="radio2">
                                Kelompok Anggaran
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="pilihhasil" id="pilihhasil4" value="a3">
                            <label for="radio2">
                                Anggaran Harwat Detail
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="pilihhasil" id="pilihhasil5" value="a4">
                            <label for="radio2">
                                Anggaran Pemeliharaan
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="pilihhasil" id="pilihhasil6" value="a5">
                            <label for="radio2">
                                Rekapitulasi Anggaran
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="pilihhasil" id="pilihhasil7" value="a6">
                            <label for="radio2">
                                Kekuatan Tanpa Nordek
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="pilihhasil" id="pilihhasil8" value="a7">
                            <label for="radio2">
                                Pagu Anggaran 
                            </label>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                <div class="form-group">
                    <select class="form-control m-b" id="uo" name="uo" <?php if($UO != 'RENPROGAR'){echo "disabled";}?> >
                                                    <?php foreach($listuo as $a){?>
                                                    <option value="<?php echo $a['uo']; ?>" <?php if($UO == $a['uo']){echo "selected";}?>><?php echo $a['uo'].' - '.$a['uraianuo']; ?></option>
                                                    <?php } ?> 
                                                </select>
                    </div>
                <div class="form-group">
                    <select class="form-control m-b" id="tahunanggaran" name="tahunanggaran">
                                                    <?php foreach($listtahunanggaran as $b){?>
                                                    <option value="<?php echo $b['tahunanggaran']; ?>" <?php if($tahun == $b['tahunanggaran']){echo "selected";}?>><?php echo $b['tahunanggaran']; ?></option>
                                                    <?php } ?> 
                                                </select>
                    </div>
                        <div class="form-group">
                    <select class="form-control m-b" id="kekuatan" name="kekuatan">
                                                    <option value="dengan" >Dengan Kekuatan</option>
                                                    <option value="tanpa" >Tanpa Kekuatan</option>
                                                </select>
                    </div>
                        <div class="form-group">
                    <select class="form-control m-b" id="tandatangan" name="tandatangan">
                                                    <option value="dengan" >Dengan Tanda Tangan</option>
                                                    <option value="tanpa" >Tanpa Tanda Tangan</option>
                                                </select>
                    </div>
                    <div class="col-sm-6">
                    <button type="submit" id="submit" name="pdf" class="btn btn-success pull-left"><i class="fa fa-print"></i> PDF</button>
                    <button type="submit" id="submit" name="excel" class="btn btn-success pull-left"><i class="fa fa-file-excel-o"></i> EXCEL</button>
                    </div>
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
<?php include 'include/footer.php';?>
</body>
</html>