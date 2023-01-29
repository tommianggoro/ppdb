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
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Tanggal Dibuat</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($allData)): ?>
                        <?php foreach($allData as $key => $value): ?>
                            <tr>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->created; ?></td>
                                <td><?php echo $value->role_name; ?></td>
                                <td>
                                    <a href="<?php echo base_url('backend/participant/edit/'.$value->id); ?>" class="btn btn-info"><i class="nav-icon fas fa-pencil-alt"></i></a>
                                    <a href="<?php echo  base_url('backend/participant/delete/'.$value->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ??')"><i class="nav-icon fas fa-trash-alt"></i></a>
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