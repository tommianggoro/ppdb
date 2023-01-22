<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" autocomplete="off" method="post">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="name" value="<?php echo set_value('name', !empty($userData) ? $userData->name : ''); ?>">
                        <?php echo form_error('name'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email', !empty($userData) ? $userData->email : ''); ?>">
                        <?php echo form_error('email'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <?php echo form_error('password'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Re-Type Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="retype_password">
                        <?php echo form_error('retype_password'); ?>
                      </div>
                    </div>
                  </div>
                  <?php if(!empty($userData)): ?>
                    <input type="hidden" name="user_id" value="<?php echo $userData->user_id?>" />
                  <?php endif; ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="submit" name="submit" class="btn btn-success" value="Submit"> 
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div><!--/. container-fluid -->
</section>