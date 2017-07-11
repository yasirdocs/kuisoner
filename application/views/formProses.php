<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="content-wrapper">
	<section class="content">
	    <div class="row">
	        <div class="col-md-6">
	        	<h4 style="color:green"><?= $pageTitle ?> Data</h4>
	        	<br>
		            <div class="box box-primary">
		                <form action="<?=  current_url() ?>" method="post">
		                    <div class="box-body">
		                        <div class="form-group">
		                            <label>Nama</label>
		                            <input type="text" name="nama" class="form-control" value="<?= isset($thisData) ? $thisData->nama : null ?>" required>  
		                        </div>
		                        <div class="form-group">
		                            <label>Tempat Lahir</label>
		                            <input type="text" name="tempat_lahir" class="form-control" value="<?= isset($thisData) ? $thisData->tempat_lahir : null ?>" required>  
		                        </div>
		                        <div class="form-group">
		                            <label>Tanggal Lahir</label>
		                            <input type="text" name="tanggal_lahir" class="form-control" value="<?= isset($thisData) ? $thisData->tanggal_lahir : null ?>" required>  
		                        </div>
		                        <div class="form-group">
		                            <label>Nomor Telphone</label>
		                            <input type="text" name="no_telp" class="form-control" value="<?= isset($thisData) ? $thisData->no_telp : null ?>" required>  
		                        </div>
		                        <div class="form-group">
		                            <label>Email</label>
		                            <input type="text" name="email" class="form-control" value="<?= isset($thisData) ? $thisData->email : null ?>" required>  
		                        </div>
		                        <div class="form-group">
		                            <label>Alamat</label>
		                            <input type="text" name="alamat" class="form-control" value="<?= isset($thisData) ? $thisData->alamat : null ?>" required>  
		                        </div>
		                    </div>
		                    <div class="box-footer">
		                        <button type="submit" class="btn btn-primary">Simpan</button>
		                    </div>
		                </form>
		            </div>
		        </div>
	    </div>
	</section>


</section>
</div>

<?php $this->load->view('libJs'); ?>
<?php $this->load->view('footer'); ?>