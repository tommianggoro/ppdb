<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Daftar</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="register" class="register">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5 mt-lg-0">
                    <?php 
                        $success = $this->session->flashdata('success');
                        if(!empty($success)){ ?>
                            <div class="alert alert-success" role="alert">
                            <?php echo $success; ?>
                            </div>                            
                        <?php }
                    ?>
                    <form action="<?php echo base_url(); ?>register" method="post" role="form" autocomplete="off">
                        <div class="card mb-3">
                            <h3 class="card-header">
                                A. Data Pengguna
                            </h3>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" id="email" placeholder="E-Mail" name="email" required value="<?php echo set_value('email'); ?>">
                                    <?php echo form_error('email'); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required value="<?php echo set_value('password'); ?>">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <h3 class="card-header">
                                B. Data Calon Peserta Didik Baru
                            </h3>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nama Calon Peserta Didik</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Nama Lengkap" name="name" required value="<?php echo set_value('name'); ?>">
                                    <?php echo form_error('name'); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                    <input type="text" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan" name="nik" required value="<?php echo set_value('nik'); ?>">
                                    <?php echo form_error('nik'); ?>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="birthPlace" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="birthPlace" placeholder="Tempat Lahir" name="birth_place" required value="<?php echo set_value('birth_place'); ?>">
                                            <?php echo form_error('birth_place'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="birthDate" class="form-label">Tanggal Lahir</label>
                                            <input type="text" class="form-control datepicker" id="birthDate" placeholder="Tanggal Lahir" name="birth_date" readonly="readonly" required value="<?php echo set_value('birth_date'); ?>">
                                            <?php echo form_error('birth_date'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <h3 class="card-header">
                                C. Data Orang Tua / Pendaftar
                            </h3>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="parent_fullname" class="form-label">Nama Orang Tua</label>
                                    <input type="text" class="form-control" id="parent_fullname" placeholder="Nama Lengkap Orang Tua" name="parent_name" required value="<?php echo set_value('parent_name'); ?>">
                                    <?php echo form_error('parent_name'); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="address" rows="5" placeholder="Alamat Lengkap" id="address" required><?php echo set_value('address'); ?></textarea>
                                    <?php echo form_error('address'); ?>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="rt">RT</label>
                                            <input type="text" class="form-control" id="rt" placeholder="RT" name="rt" required value="<?php echo set_value('rt'); ?>">
                                            <?php echo form_error('rt'); ?>
                                        </div>
                                    </div>
                                    /
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="rw">RW</label>
                                            <input type="text" class="form-control" id="rw" placeholder="RW" name="rw" required value="<?php echo set_value('rw'); ?>">
                                            <?php echo form_error('rw'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="kelurahan" class="form-label">Kelurahan</label>
                                    <input type="text" class="form-control" id="kelurahan" placeholder="Kelurahan" name="kelurahan" required value="<?php echo set_value('kelurahan'); ?>">
                                    <?php echo form_error('kelurahan'); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan" name="kecamatan" required value="<?php echo set_value('kecamatan'); ?>">
                                    <?php echo form_error('kecamatan'); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="city" class="form-label">Kabupaten / Kota</label>
                                    <input type="text" class="form-control" id="city" placeholder="Kabupaten / Kota" name="city" required value="<?php echo set_value('city'); ?>">
                                    <?php echo form_error('city'); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">No. Telpon</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Monor Telepon" name="phone" required value="<?php echo set_value('phone'); ?>">
                                    <?php echo form_error('phone'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" value="Daftar" class="btn btn-lg btn-success"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>