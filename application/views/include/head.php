<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>HARMATFAS</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url(); ?>assets/images/message.png" />

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/webadmin/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/webadmin/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/webadmin/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/webadmin/styles/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/webadmin/vendor/xeditable/bootstrap3-editable/css/bootstrap-editable.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/webadmin/vendor/select2-3.5.2/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/webadmin/vendor/select2-bootstrap/select2-bootstrap.css" />
    <!-- <link rel="stylesheet" href="<?php echo base_url().'assets/jquery.treegrid.css'?>"> -->
    <style>
        #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #23B615; /*#FF5733 RED*/
        color: white;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
        }

        #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        #snackbar_failed {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #FF5733; 
        color: white;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
        }

        #snackbar_failed.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;} 
        to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;} 
        to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
        }
    </style>
</head>