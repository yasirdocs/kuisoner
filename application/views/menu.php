<aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header"><p style="text-align:center;">Menu</p></li>
          <li class="active"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-link"></i> <span>Dashboard</span> </a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Menu</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php if($this->session->userdata('level_akses') == 1){ ?>
                <?php echo '<li><a href="kuesioner"><i class="fa fa-plus-circle"></i>Kuesioner</a></li>' ?>
                <?php echo '<li><a href="hasilkuesioner"><i class="fa fa-plus-circle"></i>Hasil Kuesioner</a></li>' ?>
              <?php }elseif($this->session->userdata('level_akses') == 4) {  ?>
                <?php echo '<li><a href="nilai"><i class="fa fa-plus-circle"></i>Nilai</a></li>' ?>
              <?php } else { ?>
                <?php echo '<li><a href="mahasiswakuesioner"><i class="fa fa-plus-circle"></i>Kuesioner</a></li>' ?>
              <?php } ?>
              </ul>
            </li>
            <li class="active"><a href="logout"><i class="fa fa-link"></i> <span>Logout</span> </a></li>
          </ul>
    </section>
</aside>


<div class="content-wrapper">