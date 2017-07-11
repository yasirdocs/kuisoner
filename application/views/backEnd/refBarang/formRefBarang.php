<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<section class="content">
	    <div class="row">
	        <div class="col-md-6">
	        	<h4><?= $pageTitle ?> Data</h4>
	        	<br>
		            <div class="box box-primary">
		                <form action="<?=  current_url() ?>" method="post">
		                    <div class="box-body">
		                        <div class="form-group">
		                            <label>Kode Barang</label>
		                            <input type="text" name="kd_barang" class="form-control" value="<?= isset($thisData) ? $thisData->nama : null ?>" required>  
		                        </div>
		                        <div class="form-group">
		                            <label>Nama Barang</label>
		                            <input type="text" name="nm_barang" class="form-control" value="<?= isset($thisData) ? $thisData->nm_barang : null ?>" required>  
		                        </div>
		                        <div class="form-group">
		                            <label>Total Barang</label>
		                            <input type="text" name="total_barang" class="form-control" value="<?= isset($thisData) ? $thisData->total_barang : null ?>" required>  
		                        </div>
		                        
		                    </div>
		                    <div class="box-footer">
		                        <button type="submit" class="btn btn-primary">Simpan</button>
		                    </div>
		                </form>
		            </div>
		        </div>

		        <div class="col-md-6">
		        <h4>&nbsp;</h4>
		        <br>
		        	<div class="box box-primary">
		        		<div class="box-body">
		        			<div class="form-group">
	                            <label>Tanggal Masuk</label>
	                            <input type="" name="tgl_masuk" class="form-control dateTime" value="<?= isset($thisData) ? $thisData->tgl_masuk : null ?>" required>
	                        </div>
		        		</div>
		        	</div>
		        </div>
	    </div>
</section>

<?php $this->load->view('libJs'); ?>
<?php $this->load->view('footer'); ?>