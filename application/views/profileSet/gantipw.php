<div class="container-fluid px-4">
<div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Ganti Password</div>
    <h1 class="mt-1 mb-4">Profile Settings</h1>
	<div class="card shadow">
                <div class="card-header">
					<h2 class="mb-4">Ganti Password</h2>
                    <small class="float-end">dibuat sejak : <?= date("d F Y", strtotime($user_login['date_created']));?></small>
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link text-black" href="<?= base_url('ProfileSet\index') ?>">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('ProfileSet\gantipw') ?>">Ganti Password</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url()?>ProfileSet\proses_gantipw">
					<?= $this->session->flashdata('pesan1')?>
                        <div class="mb-4">
                            <input value="<?= $user_login['username'] ?>" name="username" type="hidden" class="form-control" id="username">
                            <label for="oldpassword" class="form-label">Password lama</label>
                            <input name="oldpassword" type="password" class="form-control" id="oldpassword" placeholder="Password lama">
                            <div class="form-text text-danger"><?= form_error('oldpassword') ?></div>
                        </div>
                        <div class="mb-4">
                            <label for="newpassword" class="form-label">Password baru</label>
                            <input name="newpassword1" type="password" class="form-control" id="newpassword1" placeholder="Password baru">
                            <div class="form-text text-danger"><?= form_error('newpassword1') ?></div>
                        </div>
                        <div class="mb-4">
                            <label for="newpassword" class="form-label">Konfirmasi Password Baru</label>
                            <input name="newpassword2" type="password" class="form-control" id="newpassword2" placeholder="Password baru">
                            <div class="form-text text-danger"><?= form_error('newpassword2') ?></div>
                        </div>
                        <hr>
                        <button type="submit" class="mt-2 float-end btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
</div>
