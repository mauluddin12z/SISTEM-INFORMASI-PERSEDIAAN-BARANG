<div class="container-fluid px-4">
    <div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Profile Settings</div>
    <h1 class="mt-1 mb-4">Profile Settings</h1>
    <div class="card shadow">
        <div class="card-header">
            <h2 class="mb-4">Profile</h2>
            <small class="float-end">dibuat sejak : <?= date("d F Y", strtotime($user_login['date_created'])); ?></small>
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('ProfileSet\index') ?>">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="<?= base_url('ProfileSet\gantipw') ?>">Ganti Password</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url() ?>ProfileSet\proses_profileset">
                <?= $this->session->flashdata('pesan') ?>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama : </label>
                    <input value="<?= $user_login['nama'] ?>" name="nama" type="text" class="form-control" id="nama">
                    <div class="form-text text-danger"><?= form_error('nama') ?></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email : </label>
                    <input value="<?= $user_login['email'] ?>" name="email" type="email" class="form-control" id="email">
                    <div class="form-text text-danger"><?= form_error('email') ?></div>
                </div>
                <div class="mb-3">
                    <label for="No_Telp" class="form-label">No Telepon : </label>
                    <input value="<?= $user_login['no_telp'] ?>" name="no_telp" type="text" class="form-control" id="no_telp">
                    <div class="form-text text-danger"><?= form_error('no_telp') ?></div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username : </label>
                    <input readonly value="<?= $user_login['username'] ?>" name="username" type="username" class="form-control" id="username">
                </div>
                <hr>
                <button type="submit" class="mt-2 float-end btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>