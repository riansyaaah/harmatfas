<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registrasi Personil Petugas Penginput Data Kekuatan</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" \>
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" \>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all" \>
    <link href="<?php echo base_url(); ?>assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all" \>

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" media="all" \>
    
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
            console.log(validateEmail(this.value));
            if (validateEmail(email)) {
                $('#validasi-email1').hide();
            }else{
                $('#validasi-email1').show();
            }

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

        function validateEmail(email) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }


        $('#nohp').change(function () {
            console.log("No HP : " + this.value)
            if(this.value != ''){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('login/check_nohp'); ?>",
                    data: {
                        'nohp': this.value
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
        
        $('#confirm_password').change(function () {
            var password = $("#password").val(); 
            var confirm_password = $("#confirm_password").val(); 
            console.log("Password : " + password);
            console.log("Confirm Password : " + confirm_password);

            if(password != confirm_password){
                $('#validasi-password').show();
                $("#confirm_password").val(''); 
            }else{
                $('#validasi-password').hide();
            }

        });
    });
</script>
</head>

<body>
    <div class="main">
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="mail-section">	
        <?php if ($this->session->flashdata('msg_failed')) { ?>	
            <div style="margin-left:50px; padding-bottom:20px; color:orange">
            <?php echo $this->session->flashdata('msg_failed') ?>
            </div>	
        <?php } ?>
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registrasi Personil</h2>
                    
                    <form method="POST" action="<?php echo base_url(); ?>login/prosesregistrasi">
                        <table id="Login1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nama" name="nama" id="nama" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="NIP/NRP" name="nip" id="nip" required>
                            <div id="validasi-nip" style="text-align:left; display:none;">
                                    <span style="color:red">NIP SUDAH ADA</span>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search" >
                                <select name="uo" required>
                                    <option value="">Unit Organisasi</option>
                                    <?php foreach($listuo as $r){?>
                                    <option value="<?php echo $r['uo']; ?>" >
                                       <?php echo $r['uo'].' - '.$r['uraianuo']; ?>
                                    </option>
                                    <?php } ?> 
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" name="satker" type="text" id="satker" class="input " placeholder="Satker" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <input type="email" placeholder="Email" name="email" id="email" class="input--style-2 email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                                <div id="validasi-email" style="text-align:left; display:none;">
                                        <span style="color:red">EMAIL SUDAH ADA</span>
                                </div>
                                <div id="validasi-email1" style="text-align:left; display:none;">
                                        <span style="color:red">EMAIL INVALID</span>
                                </div>
                            </div>
                            <div class="col-2">
                                <input name="nohp" type="text" id="nohp" class="input--style-2" placeholder="Nomor Telepon" >
                                <span>&nbsp;</span>
                                <div id="validasi-nohp" style="text-align:left; display:none;">
                                    <span style="color:red">NOMOR TELPON SUDAH ADA</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="password" placeholder="Password" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password">
                                    <div id="validasi-password" style="text-align:left; display:none;">
                                    <span style="color:red">PASSWORD TIDAK SESUAI</span>
                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-30">
                                    <input type="submit" name="Login1$LoginButton" id="Login1_LoginButton" class="btn btn--radius btn--green" name="submit" value="Register" />
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-30">
                                    <a href="<?php echo base_url(); ?>login"><button class="btn btn--radius btn--green" type="button">Have An Account</button></a>
                                </div>
                            </div>
                        </div>
                        </table>
                    </form>
                   
                </div>
            </div>
        </div>
      </div>
    </div>
    </div>
    
    <!-- Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url(); ?>assets/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->