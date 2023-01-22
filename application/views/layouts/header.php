======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto">
        <a href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class="img-fluid"/>
          SMP Harapan Massa
        </a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
       <!-- <a href="index.html" class="logo me-auto"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          
          <li><a class="<?php echo $this->uri->segment(1) == '/' || $this->uri->segment(1) == '' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>">Beranda</a></li>
          <li><a class="<?php echo $this->uri->segment(1) == 'about' ? 'active' : ''; ?>" href="<?php echo base_url('about'); ?>">Tentang Kami</a></li>
          <li><a class="<?php echo $this->uri->segment(1) == 'login' ? 'active' : ''; ?>" href="<?php echo base_url('login'); ?>">Masuk</a></li>
          <!-- <li><a href="courses.html">Courses</a></li>
          <li><a href="trainers.html">Trainers</a></li>
          <li><a href="events.html">Events</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="contact.html">Contact</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?php echo base_url(); ?>register" class="get-started-btn">Yuk Daftar</a>

    </div>
  </header><!-- End Header