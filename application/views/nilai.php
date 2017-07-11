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
                    <a href="<?= site_url('backEnd/NilaiController/add') ?>" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>Nilai</th>
                                        <th class="col-md-2"></th>
                                    </tr>
                                    <tr>
                                        <th><input type="text" id='nama' class="form-control input-table" placeholder="Cari"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($rows as &$row) 
                                    { 
                                        $row = get_object_vars($row);
                                    ?>
                                    <tr>
                                        <td><?= isset($row['total_nilai']) ? $row['total_nilai'] : '-' ?></td>
                                        <td>
                                           <a href="<?= site_url('backEnd/NilaiController/update/'.$row['id'].'') ?>" class="btn bg-orange" title="Ubah">
                                                    <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?= site_url('backEnd/NilaiController/delete/'.$row['id'].'') ?>" class="btn btn-danger alertHapus" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
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