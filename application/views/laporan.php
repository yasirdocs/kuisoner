<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<div class="content-wrapper">
    <section class="content">
    <h2><?= $pageTitle ?></h2>
    <?php flashMessage(); ?>
        <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                    </tr>
                                    <tr>
                                        <th><input type="text" id='nama' class="form-control input-table" placeholder="Cari"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataPeserta as $key => $value) { ?>
                                <tr>
                                        <td><?= $value->nama; ?></td>
                                    <?php } ?>
                                            <a href="<?= site_url('LaporanController/laporan/'.$row['id'].'') ?>" class="btn bg-blue" title="Tampilkan">
                                                    <i class="fa fa-print"></i>
                                            </a>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

</section>
</div>
<?php $this->load->view('libJs'); ?>
<script type="text/javascript">
    $('.alertHapus').click(function(){
        if (!confirm("Apakah Kamu yakin ingin menghapus data ini?")){
             return false;
        }
    });
</script>
<?php $this->load->view('footer'); ?>