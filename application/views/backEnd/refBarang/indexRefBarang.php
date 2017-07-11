<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<section class="content">
    <h2><?= $pageTitle ?></h2>
    <?php flashMessage(); ?>
        <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="<?= site_url('barangAdd') ?>" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Total Barang</th>
                                        <th>Tanggal Masuk Barang</th>
                                        <th class="col-md-2"></th>
                                    </tr>
                                    <tr>
                                        <th><input type="text" id='nama' class="form-control input-table" placeholder="Cari"></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- <?php foreach($rows as $row) { ?> -->
                                    <tr>
                                        <!-- <td><?= $row->nm_barang ?></td> -->
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                           <a href="<?= site_url('backEnd/BackEndController/update/'.$row['id'].'') ?>" class="btn bg-orange" title="Ubah">
                                                    <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?= site_url('backEnd/BackEndController/delete/'.$row['id'].'') ?>" class="btn btn-danger alertHapus" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="<?= site_url('backEnd/BackEndController/laporan/'.$row['id'].'') ?>" class="btn bg-blue" title="Tampilkan">
                                                    <i class="fa fa-print"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <!-- <?php } ?> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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