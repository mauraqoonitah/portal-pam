<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Access Blocked</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="" style="background-color: lightblue;">
    <div class="row">
        <div class="container col-sm-6" >

            <!-- Main content -->
            <section class="content" style="margin-top: 20vh;" >
            <div class="login-logo">
            <div class="mx-auto " >
                <img alt="logo" style="width: 90px" src="<?= base_url('assets/img/pamjaya-logo.png'); ?>">
            </div>
        </div>
                <div class="error-page">
                    <h2 class="headline text-dark"> 403</h2>

                    <div class="error-content p-4" >
                        <h3 class="font-weight-bold"><i class="fas fa-exclamation-triangle text-dark "></i> Oops! Access Forbidden.</h3>

                        <p style="font-size: 18px;">                       
                        Maaf, akses ditolak karena Anda tidak memiliki permission untuk mengakses halaman ini.<br> 
                        Silakan hubungi administrator untuk mengaktifkan akun.

                            <br>
                            <i class="fa fa-arrow-left mt-3" aria-hidden="true" style="font-size: 20px;"></i>
                            <a href="<?= base_url('Admin/Admin_home'); ?>" class="ml-2" style="font-size: 20px; color: blue;"> Kembali</a>
                        </p>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/template/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/template/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/template/'); ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/template/'); ?>dist/js/demo.js"></script>
</body>

</html>