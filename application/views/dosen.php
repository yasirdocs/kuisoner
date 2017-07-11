<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<section class="content">
	<h2>Dosen</h2>
	<br><h4 style="color:red">Selamat datang <b><?= $this->session->username ?>.</b></h4>

	<a class="btn btn-primary" href="barang"> Barang</a>
</section>

<?php $this->load->view('libJs'); ?>
<?php $this->load->view('footer'); ?>