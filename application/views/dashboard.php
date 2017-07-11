<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<section class="content">
	<h2>Dashboard</h2>
	<br><h4 style="color:red">Selamat datang <b><?= $this->session->username ?>.</b></h4>
	<div class="col-lg-12">
		<img class="img-block" style="width:370px;height:350px;text-align:center;" src="<?= assetsImg ?>logo-uinsu2.png" align="center">
	</div>
</section>

<?php $this->load->view('libJs'); ?>
<?php $this->load->view('footer'); ?>