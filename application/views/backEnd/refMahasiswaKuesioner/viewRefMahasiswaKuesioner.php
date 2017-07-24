<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<section class="content">
    <h2><?= $pageTitle ?></h2>
    <?php flashMessage(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
                <form action="#" id="form">
                    <div class="form-group">
                        <label>Dosen</label>
                        <select class="form-control" name="select" id="select">
                            <?php foreach ($dosen as $key => $value) { ?>
                            <option> -- Pilih Dosen -- </option>
                            <option><?= $value['Nm_Dosen'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h4 style="margin-top:30px;margin-bottom:15px;"><b>Kuesioner</b></h4>
                    </div>
                    <div class="form-group">
                        <?php foreach ($kuesioner as $key => $value) { ?>
                        <label>Nomor <?= $key+1 ?></label>
                        <div class=".content-wrapper">
                            <div>
                                <p><?=$value['Judul_Kuesioner']?></p>
                            </div>
                            <?php } ?>
                            <?php foreach ($jawaban as $key => $value) { ?>
                            <div class="radio">
                                <label><input type="radio" value="<?=$value['Kd_Jawaban']?>" > <?= $value['Nm_Jawaban'] ?></label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php $this->load->view('libJs'); ?>
<script type="text/javascript">
    $('.alertHapus').click(function(){
        if (!confirm("Apakah Kamu yakin ingin menghapus data ini?")){
           return false;
       }
});
</script>
<?php $this->load->view('footer'); ?>