<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">
                            <h3>Selamat Datang, <?php echo $this->session->userdata('name'); ?></h3>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Status</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <?php $roleId = $this->session->userdata('role_id'); ?>
                    <?php if($roleId == ROLE_CANDIDATE): ?>
                      <h2>Mohon untuk dapat menunggu tahap seleksi administrasi :) </h2>
                    <?php elseif($roleId == ROLE_PASS): ?>
                      <h2>Selamat anda telah lulus :) </h2>
                    <?php elseif($roleId == ROLE_NOT_PASS): ?>
                      <h2>Mohon maaf anda tidak lulus :( </h2>
                    <?php endif; ?>
                  </div>
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>