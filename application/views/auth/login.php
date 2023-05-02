<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-site-verification" content="CasryRDukePkJW0fBTt6NEwQbjXUQxfiX0g8uz_o9sw" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIPB BMN FKIP UNSRI</title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/logota.ico') ?>" />
	<style>
	body{	
		background: url('<?= base_url('/assets/img/bg-login.svg') ?>');
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		background-attachment: fixed;
		height: 100%;width: 100%;
	}
	.card-login{
		height: 500px; 
		box-shadow: 1px 1px 12px #ffc107; 
		background: url('<?= base_url('/assets/img/card-login.svg') ?>');
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		background-color: black!important;
	}
	</style>
    <link href="<?= base_url('assets/css/myStyles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/templatesStyles.css') ?>" rel="stylesheet" />
</head>

<body class="sb-nav-fixed bg-login">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-12 col-md-9 col-lg-5 card-bglogin">
                    <div class="card card-login">
                        <div class="text-light mt-3 text-center">
						<i class="fas fa-user-circle fa-6x"></i>
						<br>
						</div>
						<h3 class="text-white text-center">LOGIN</h3>
						<div class="px-3" style="height: -30px; margin-bottom:-15px;"><?= $this->session->flashdata('pesan')?></div>
                        <div class="card-body">
                            <form action="<?= base_url('auth')?>" method="post">
                                <div class="form-floating mb-3">
                                    <input value="<?= set_value('username') ?>" name="username" class="_box-shadow form-control" id="Username" type="text" placeholder="Username" />
                                    <label for="Username"></i>Username</label>
                                    <div class="form-text text-danger"><?= form_error('username') ?></div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input value="<?= set_value('password') ?>" name="password" class="_box-shadow form-control" id="Password" type="password" placeholder="Password" />
                                    <label for="Password">Password</label>
                                    <div class="form-text text-danger"><?= form_error('password') ?></div>
                                </div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="role_id" id="inlineRadio1" value="1">
									<label class="form-check-label text-light" for="inlineRadio1">Admin</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="role_id" id="inlineRadio2" value="2">
									<label class="form-check-label text-light" for="inlineRadio2">Pegawai</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="role_id" id="inlineRadio1" value="3">
									<label class="form-check-label text-light" for="inlineRadio1">Pimpinan</label>
								</div>
								<div class="form-text text-danger"><?= form_error('role_id') ?></div>
                                <div class="mt-4 _box-shadow text-center d-grid gap-2">
                                    <button type="submit" class="btn btn-warning bg-gradient">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
	<footer id="copyright" class="py-4 bg-gradient mt-auto">
	<div class="container-fluid px-4">
		<div class="text-center small">
		<div style="align-items:center; color:black!important;" class="text-muted">Copyright &copy; SISTEM INFORMASI PERSEDIAAN BARANG MILIK NEGARA FKIP UNSRI <?= date('Y') ?></div>
		</div>
	</div>
	</footer>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
    <script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/all.min.js')?>" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>" crossorigin="anonymous"></script>

</body>

</html>
