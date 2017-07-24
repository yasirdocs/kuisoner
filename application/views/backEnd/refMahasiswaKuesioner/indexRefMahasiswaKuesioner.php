<?php $this->load->view('header'); ?>
<?php $this->load->view('menu'); ?>

<section class="content">
    <h2><?= $pageTitle ?></h2>
    <?php flashMessage(); ?>
        <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>Kode MK</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS Kuliah</th>
                                        <th class="col-md-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($rows as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['Kode_MK'] ?></td>
                                        <td><?= $value['Nm_Matkul'] ?></td>
                                        <td><?= $value['Sks_Matkul'] ?></td>
                                        <td>
                                           <a href="<?= site_url('backEnd/RefMahasiswaKuesionerController/view/'.$value['Kd_Matkul'].'') ?>" class="btn bg-blue" title="View"><i class="fa fa-book"></i>
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

<?php $this->load->view('libJs'); ?>
<script type="text/javascript">
    $('.alertHapus').click(function(){
        if (!confirm("Apakah Kamu yakin ingin menghapus data ini?")){
             return false;
        }
    });
</script>
<?php $this->load->view('footer'); ?>