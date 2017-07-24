<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <h4><?= $pageTitle ?> Kuesioner</h4>
            <br>
            <div class="box box-primary">
                <form action="<?=  current_url() ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Pertanyaan Kuesioner</label>
                            <textarea type="text" name="Judul_Kuesioner" class="form-control" value="<?= isset($thisData) ? $thisData->Judul_Kuesioner : null ?>" required></textarea>
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
<?php $this->load->view('libJs'); ?>
<?php $this->load->view('footer'); ?>