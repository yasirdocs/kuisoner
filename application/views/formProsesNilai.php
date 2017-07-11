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
		                            <label>Nama Peserta</label>
		                            <select id="id_peserta" name="id_peserta" class="form-control select2" placeholder="Pilih Options">
		                                <option></option>
		                                <?php foreach($get as &$value){$value = get_object_vars($value);?>
		                                    <option <?php if(isset($value['id'])){ if($value['id']==$thisDatam){ echo 'selected'; } }  ?> value="<?= $value['id'] ?>" ><?= $value['nama'] ?></option>
		                                <?php } ?>
		                            </select>
		                        </div>
		                        <div class="form-group">
		                            <label>Nilai</label>
		                            <input type="text" name="total_nilai" class="form-control" value="<?= isset($values) ? $values->total_nilai : null ?>" required>  
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