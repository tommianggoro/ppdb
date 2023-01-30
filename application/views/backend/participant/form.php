<section class="content">
    <div class="container-fluid">
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
          <div class="col-md-12">
            <div class="card card-info">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" autocomplete="off" method="post">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="name" value="<?php echo set_value('name', !empty($participantData) ? $participantData->name : ''); ?>">
                        <?php echo form_error('name'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nomor Induk Kependudukan</label>
                        <input type="text" class="form-control" placeholder="NIK" name="nik" value="<?php echo set_value('nik', !empty($participantData) ? $participantData->nik : ''); ?>">
                        <?php echo form_error('nik'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="birth_place" value="<?php echo set_value('birth_place', !empty($participantData) ? $participantData->birth_place : ''); ?>">
                        <?php echo form_error('birth_place'); ?>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" placeholder="Tanggal Lahir" id="birthDate" name="birth_date" value="<?php echo set_value('birth_date', !empty($participantData) ? $participantData->birth_date : ''); ?>">
                        <?php echo form_error('birth_date'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nama Orang Tua</label>
                        <input type="text" class="form-control" placeholder="Nama Orang Tua" name="parent_name" value="<?php echo set_value('parent_name', !empty($participantData) ? $participantData->parent_name : ''); ?>">
                        <?php echo form_error('parent_name'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="address"><?php echo set_value('address', !empty($participantData) ? $participantData->address : ''); ?></textarea>
                        <?php echo form_error('address'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>RT</label>
                        <input type="text" class="form-control" placeholder="RT" name="rt" value="<?php echo set_value('rt', !empty($participantData) ? $participantData->rt : ''); ?>">
                        <?php echo form_error('rt'); ?>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>RW</label>
                        <input type="text" class="form-control" placeholder="RW" name="rw" value="<?php echo set_value('rw', !empty($participantData) ? $participantData->rw : ''); ?>">
                        <?php echo form_error('rw'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Kelurahan</label>
                        <input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan" value="<?php echo set_value('kelurahan', !empty($participantData) ? $participantData->kelurahan : ''); ?>">
                        <?php echo form_error('kelurahan'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" value="<?php echo set_value('kecamatan', !empty($participantData) ? $participantData->kecamatan : ''); ?>">
                        <?php echo form_error('kecamatan'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Kabupaten / Kota</label>
                        <input type="text" class="form-control" placeholder="Kabupaten / Kota" name="city" value="<?php echo set_value('city', !empty($participantData) ? $participantData->city : ''); ?>">
                        <?php echo form_error('city'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" class="form-control" placeholder="No. Telepon" name="phone" value="<?php echo set_value('phone', !empty($participantData) ? $participantData->phone : ''); ?>">
                        <?php echo form_error('phone'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                <?php foreach($roles as $role): ?>
                                    <?php if($role->id == 1) continue; ?>
                                    <option value="<?php echo $role->id?>" <?php echo $role->id == $participantData->role_id ? 'selected' : ''; ?>><?php echo $role->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                  </div>

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