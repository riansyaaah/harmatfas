<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aplikasi HARMATFAS 2021 </title>
<link href="<?php echo base_url(); ?>assets/css/style-login.css" rel="stylesheet" type="text/css" media="all"/>
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
</head>
<body>

    
       

    <div class="header">
		<h1>Aplikasi Belanja Pemeliharaan dan Perawatan<br>Materiil, Fasilitas dan Bangunan Tahun Anggaran 2021</h1>
	</div>
	<div class="main">
		<div class="mail-section">	
		<?php if ($this->session->flashdata('msg_success')) { ?>	
            <div style="margin-left:50px; padding-bottom:20px; color:#27f238; text-align:center; font-size:20px">
            <?php echo $this->session->flashdata('msg_success') ?>
            </div>	
        <?php } ?>		
				<div class="mail-image">
					<img src="<?php echo base_url(); ?>assets/images/message.png" alt="" />
						<h3>Selamat Datang</h3>
						<h2>Aplikasi HARMATFAS</h2>
				</div>
					<div class="mail-form">
					    <form method="post" action="<?php echo base_url(); ?>login/proseslogin">
                        <table id="Login1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
						
	<tr>
		<td>
						<?php if($message == 1){?>
						<span id="Login1_UserNameRequired" title="User Name is required." style="color:Red;">Username atau Password Anda Salah!</span>
						<br />
						<?php } ?>
                        <br />
						 <input name="username" type="text" id="username" class="input username" placeholder="Nama Pengguna...." onfocus="this.value=''">
                                    <span id="Login1_UserNameRequired" title="User Name is required." style="color:Red;visibility:hidden;">Nama Pengguna Masih Kosong.</span>
                                        

                                        <input name="password" type="password" id="password" class="input password" placeholder="Password" onfocus="this.value=''">
                                    <span id="Login1_PasswordRequired" title="Password is required." style="color:Red;visibility:hidden;">Password Masih Kosong.</span>
        

                        <br>
                        
                        <input type="submit" name="Login1$LoginButton" value="Log In" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;Login1$LoginButton&quot;, &quot;&quot;, true, &quot;Login1&quot;, &quot;&quot;, false, false))" id="Login1_LoginButton" class="button" name="submit" value="Login" />
                        <br />
					    
						<br><p>Belum memiliki akun, silahkan klik untuk <a href="<?php echo base_url('login/registrasi');?>" style="color:blue">Registrasi</a> </p>


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
