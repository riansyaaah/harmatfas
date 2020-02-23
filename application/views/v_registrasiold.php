<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aplikasi HARMATFAS 2021 </title>
<link href="<?php echo base_url(); ?>assets/css/style-register.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Aplikasi Monitoring Pinjaman Luar Negeri Kemhan - TNI" />
<!--web-fonts-->
<link href='<?php echo base_url(); ?>assets/css/font1.css' rel='stylesheet' type='text/css' />
<link href='<?php echo base_url(); ?>assets/css/font2.css' rel='stylesheet' type='text/css' />
<!--web-fonts-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" type="text/javascript">
    $(document).ready(function (c) {
        $('.close').on('click', function (c) {
            $('.mail-section').fadeOut('slow', function (c) {
                $('.mail-section').remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#nip').change(function () {
            console.log("NIP : " + this.value)
            if(this.value != ''){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('login/check_nip'); ?>",
                    data: {
                        'nip': this.value
                    },
                    success: function (data) {
                        console.log("Result Json NIP : " + data)
                        if(data == 'false'){
                            console.log("Show Validas NIP");
                            $('#validasi-nip').show();
                        }else{
                            console.log("Hide Validas NIP");
                            $('#validasi-nip').hide();
                        }
                    }
                });
            }else{
                $('#validasi-nip').hide();
            }
        });

        $('#email').change(function () {
            console.log("Email : " + this.value)
            if(this.value != ''){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('login/check_email'); ?>",
                    data: {
                        'email': this.value
                    },
                    success: function (data) {
                        console.log("Result Json Email : " + data)
                        if(data == 'false'){
                            console.log("Show Validas Email");
                            $('#validasi-email').show();
                        }else{
                            console.log("Hide Validas Email");
                            $('#validasi-email').hide();
                        }
                    }
                });
            }else{
                $('#validasi-email').hide();
            }
        });
        $('#nohp').change(function () {
            console.log("No HP : " + this.value)
            if(this.value != ''){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('login/check_nohp'); ?>",
                    data: {
                        'email': this.value
                    },
                    success: function (data) {
                        console.log("Result Json No HP : " + data)
                        if(data == 'false'){
                            console.log("Show Validas No HP");
                            $('#validasi-nohp').show();
                        }else{
                            console.log("Hide Validas No HP");
                            $('#validasi-nohp').hide();
                        }
                    }
                });
            }else{
                $('#validasi-nohp').hide();
            }
        });
    });
</script>
</head>
<body>

    
       

    <!-- <div class="header">
		<h1>Aplikasi Belanja Pemeliharaan dan Perawatan<br>Materiil, Fasilitas dan Bangunan Tahun Anggaran 2021</h1>
	</div> -->
	<div class="main">
		<div class="mail-section">	
        <?php if ($this->session->flashdata('msg_failed')) { ?>	
            <div style="margin-left:50px; padding-bottom:20px; color:orange">
            <?php echo $this->session->flashdata('msg_failed') ?>
            </div>	
        <?php } ?>
            <div class="mail-image">
                <img src="<?php echo base_url(); ?>assets/images/message.png" alt="" />
                <h3>Selamat Datang</h3>
                <h2>Aplikasi HARMATFAS</h2>
            </div>
            <div class="mail-form">
                <form method="post" action="<?php echo base_url(); ?>login/prosesregistrasi">
                    <table id="Login1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                        <tr>
                            <td>
                                <input name="nip" type="text" id="nip" class="input " placeholder="NIP" required>
                                <div id="validasi-nip" style="text-align:left; display:none;">
                                    <span style="color:red">NIP sudah ada</span>
                                </div>
                                <span>&nbsp;</span>

                                <input name="nama" type="text" id="nama" class="input " placeholder="NAMA" required>
                                <span>&nbsp;</span>

                                <select class="mail-form select" name="uo" required>
                                    <option value="" > Pilih UNIT ORGANISASI</option>
                                    <?php foreach($listuo as $r){?>
                                    <option value="<?php echo $r['uo']; ?>" >
                                       <?php echo $r['uo'].' - '.$r['uraianuo']; ?>
                                    </option>
                                    <?php } ?> 
                                </select><br>
                                <span>&nbsp;</span>

                                <input name="satker" type="text" id="satker" class="input " placeholder="Satker" required>
                                <span>&nbsp;</span>


                                <input name="email" type="text" id="email" class="input " placeholder="EMAIL" >
                                <div id="validasi-email" style="text-align:left; display:none;">
                                    <span style="color:red">Email sudah ada</span>
                                </div>
                                <span>&nbsp;</span>

                                <input name="nohp" type="text" id="nohp" class="input " placeholder="NOMOR HANDPHONE" >
                                <span>&nbsp;</span>
                                <div id="validasi-nohp" style="text-align:left; display:none;">
                                    <span style="color:red">No HP sudah ada</span>
                                </div>
                                <input name="password" type="password" id="password" class="input password" placeholder="Password" required>
                                    <span id="Login1_PasswordRequired" title="Password is required." style="color:Red;visibility:hidden;">Password Masih Kosong.</span>
                                
                                <br><br>
                                <input type="submit" name="Login1$LoginButton" id="Login1_LoginButton" class="button" name="submit" value="Register" />
                                
                                <br><br><p>Sudah memiliki akun, silakan <a href="<?php echo base_url('');?>" style="color:blue">Login</a> </p>
                            </td>
                        </tr>
                    </table>
                </form>
			</div>
			<div class="clear"> </div>
		</div>
	</div>
    <div class="footer">
        <p>&copy 2020 Kementerian Pertahanan </p>
    </div>
    
</body>
</html>
