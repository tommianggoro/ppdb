<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <?php 
            $success = $this->session->flashdata('success');
            if(!empty($success)){ ?>
                <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
                </div>                            
            <?php }
        ?>
        <?php 
            $failed = $this->session->flashdata('failed');
            if(!empty($failed)){ ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $failed; ?>
                </div>                            
            <?php }
        ?>
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">
                            <a href="<?php echo base_url('backend/users/add')?>" class="btn btn-primary">Tambah User</a>
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
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Tanggal Dibuat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($allUser)): ?>
                        <?php foreach($allUser as $key => $value): ?>
                            <tr>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->created?></td>
                                <td>
                                    <a href="<?php echo base_url('backend/users/edit/'.$value->id); ?>" class="btn btn-info"><i class="nav-icon fas fa-pencil-alt"></i></a>
                                    <a href="<?php echo  base_url('backend/users/delete/'.$value->id); ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin ??')"><i class="nav-icon fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>