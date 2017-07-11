<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" type="text/css" href="<?= assetsPlugin ?>css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?= assetsPlugin ?>css/templateLogin.css"/>
</head>
<body style="background-color:#009688;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="login">
                            <img class="img-block" style="width:170px;height:150px;text-align:center;" src="<?= assetsImg ?>logo-uinsu2.png">
                            <p style="text-align:center;margin-top:20px;margin-bottom:0px;font-weight:bold;font-size:18px;">
                                Sistem Informasi Kuesioner <br> Kelompok 3 MPSI
                            </p>
                            <form class="form-signin" action="<?= current_url() ?>" method="post">
                                <p><?php flashMessage(); ?></p>
                                <select class="form-control" id="level" required="" name="level_akses">
                                    <?php foreach ($namelevel as $value) { ?>
                                    <option value='<?= $value->id ?>'> <?= $value->level_akses ?> </option>
                                    <?php } ?>
                                </select>
                                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <button type="submit" class="btn btn-default" style="float:right;">Masuk</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <p style="text-align:center;color:white;">
                    Fakultas Sains & Teknologi <br> Prodi Sistem Informasi
                </p>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('libJs'); ?>
</html>
