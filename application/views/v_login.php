<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Harmatfas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main2.css">
<!--===============================================================================================-->
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
	<div class="main">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url(); ?>assets/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Harmatfas 2021
					</span>
				</div>

    <div class="mail-section">
        <?php if ($this->session->flashdata('msg_success')) { ?>	
            <div style="margin-left:50px; padding-bottom:20px; color:#27f238; text-align:center; font-size:20px">
            <?php echo $this->session->flashdata('msg_success') ?>
            </div>	
        <?php } ?>
    <div class="mail-form">
				<form class="login100-form validate-form" method="post" action="<?php echo base_url(); ?>login/proseslogin">
                    <table id="Login1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                        <tr>
                            <td>
                                <?php if($message == 1){?>
						<span id="Login1_UserNameRequired" title="User Name is required." style="color:Red;">Email atau Password Anda Salah!</span>
						<br />
                                <?php } ?>
                        <br />
                   <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100"  type="text" name="username" placeholder="Enter email" id="username" onfocus="this.value=''">
                       <span class="focus-input100" id="Login1_UserNameRequired" title="User Name is required." style="color:Red;visibility:hidden;">Nama Pengguna Masih Kosong.</span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password" id="password" onfocus="this.value=''">
						<span class="focus-input100" id="Login1_PasswordRequired" title="Password is required." style="color:Red;visibility:hidden;">Password Masih Kosong.</span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<a href="<?php echo base_url('login/registrasi');?>" class="txt1">
								Daftar Personil
							</a>
						</div>

					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;Login1$LoginButton&quot;, &quot;&quot;, true, &quot;Login1&quot;, &quot;&quot;, false, false))" id="Login1_LoginButton" name="Login1$LoginButton" value="Login" >
							Login
                            
						</button>
                        
					</div>
                            </td>
                        </tr>
                    </table>
				</form>
    </div>
                </div>
			</div>
            </div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>
</html>