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
                        <input type="text" class="form-control" placeholder="Nama" name="name" value="<?php echo set_value('name', !empty($roleData) ? $roleData->name : ''); ?>">
                        <?php echo form_error('name'); ?>
                      </div>
                    </div>
                  </div>
                  <?php if(!empty($roleData)): ?>
                    <input type="hidden" name="id" value="<?php echo $roleData->id?>" />
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