<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="content-wrapper">
	<?php flashMessage(); ?>
	<section class="content">
	    <div class="row">
	        <div class="col-md-6">
	            <div class="box box-primary">
	                <form action="<?=  current_url() ?>" method="post">
	                    <div class="box-body">
	                        <div class="form-group">
	                            <label>Proses Dokumen</label>
	                            <input type="text" name="Nm_Proses" class="form-control" value="<?= isset($thisData) ? $thisData->Nm_Proses : null ?>" required>
	                                
	                        </div>
	                        <div class="form-group">
	                            <label>Kelompok</label>
	                            <select id="Kd_Status" name="Kd_Status" class="form-control select2" placeholder="Pilih Options">
	                                <option></option>
	                                <?php foreach ($menuArray as $key => $value) { ?>
	                                    <option <?php if(isset($thisData)){ if($thisData->Kd_Status==$key){ echo 'selected'; } }  ?> value="<?= $key ?>"><?= $value ?></option>
	                                <?php } ?>
	                            </select>
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