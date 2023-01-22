<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Log in (v2)</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
        <!-- /.login-logo -->
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="card card-outline card-primary">
                
                <div class="card-header text-center">
                    <a href="<?php echo base_url('login'); ?>" class="h1"><b>PPDB</b><br/>SMP <br/>Harapan Massa</a>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('login'); ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-4">
                                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Masuk" />
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> -->
                <p class="mb-0">
                    Belum punya akun ? Silahkan <a href="<?php echo base_url('register'); ?>" class="text-center">Daftar</a>
                </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/adminlte.min.js"></script>
    </body>
</html>
