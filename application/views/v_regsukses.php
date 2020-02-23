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
                    <h2 class="title">Registrasi Sukses</h2>
                    
                    <p>Mohon untuk menghubungi petugas Subdit Renprogar, Direktorat Renprogar, Diretorat Jenderal Rencana Pertahanan untuk memverifikasi registrasi yang telah dilakukan </p>
                    <br>
                    <p>Setelah verifikasi silahkan login pada link berikut</p>
                    
                    <div class="p-t-30">
                                    <a href="<?php echo base_url(); ?>login"><button class="btn btn--radius btn--green" type="button">Login</button></a>
                                </div>
                   
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