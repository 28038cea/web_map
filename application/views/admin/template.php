<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maps error</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link href="<?=base_url()?>assets/css/BootSideMenu.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>assets/js/BootSideMenu.js"></script>
    <script src="<?php echo base_url('assets/tinymce/tinymce.js') ?>"></script>

    <style type="text/css">
    .user {
        padding:5px;
        margin-bottom: 5px;
    }
    #mapid { height: 480px; }
    </style>
</head>
<body>
    <!--Test -->
    <div id="test">
        <a href="<?=base_url('home')?>"><h2>LOGO</h2>
        <div class="list-group">
            <a href="#" class="list-group-item">1</a>
            <a href="#" class="list-group-item">2</a>
        </div>
    </div>
    <!--/Test -->

    <!--Normale contenuto di pagina-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Admin</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $alert = $this->session->flashdata('alert') ?>
                <?php if($alert): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $alert ?>
                    </div>
                <?php endif ?>
                <?php $this->load->view($viewPath) ?>
            </div>
        </div>
    </div>
    <!--Normale contenuto di pagina-->

    <script type="text/javascript">
    $('#test').BootSideMenu({side:"left", autoClose:false});

    var base_url="<?=base_url()?>";
    </script>
</body>
</html>