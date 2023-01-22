<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Dashboard 2</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="<?php echo base_url(); ?>assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php echo $this->load->view('backend/header', $this->data, true); ?>

    <?php echo $this->load->view('backend/sidebar', $this->data, true); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?php echo empty($this->data['title']) ? 'Dashboard' : $this->data['title']; ?></h1>
                    </div><!-- /.col -->

                    <?php echo $this->load->view('backend/breadcrumbs', $this->data, true); ?>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <?php echo $contents; ?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <?php echo $this->load->view('backend/footer', $this->data, true); ?>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/adminlte.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/plugins/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/chart.js/Chart.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <!-- <script src="<?php echo base_url(); ?>assets/backend/dist/js/demo.js"></script> -->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- <script src="<?php echo base_url(); ?>assets/backend/dist/js/pages/dashboard2.js"></script> -->
    </body>
</html>
