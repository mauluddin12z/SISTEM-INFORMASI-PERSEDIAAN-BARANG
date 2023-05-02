<?php
$no = 1;
?>
<div class="container-fluid px-4">
  <div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Manajemen User</div>
  <h1 class="mt-1">Manajemen User</h1>
  <div class="card mb-4 mt-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      TABEL USERS
    </div>
    <div class="card-body table-responsive">
      <?php if (validation_errors())
        echo validation_errors();
      ?>
      <?= $this->session->flashdata('pesan') ?>
      <button class="btn btn-success mb-2 col-md-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> TAMBAH</button>
      <table id="datatables" class="display table-bordered border">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Username</th>
            <th>Role</th>
            <th width="150vhw">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data_user as $du) :
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $du['nama'] ?></td>
              <td><?= $du['email'] ?></td>
              <td><?= $du['no_telp'] ?></td>
              <td><?= $du['username'] ?></td>
              <td><?= $du['role'] ?></td>
              <td class="text-center">
                <a class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $du['id_user'] ?>">Edit</a>
                <a class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $du['id_user'] ?>">Delete</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url() ?>data_user/proses_tambah_user">
          <div class="mb-3">
            <label for="Nama" class="form-label">Nama : </label>
            <input name="nama" type="text" class="form-control" placeholder="Nama" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email : </label>
            <input name="email" type="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon : </label>
            <input name="no_telp" type="no_telp" class="form-control" placeholder="No Telepon" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username : </label>
            <input name="username" type="username" class="form-control" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password : </label>
            <input name="password" type="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role : </label>
            <select name="role_id" class="form-select" aria-label="Default select example" required>
              <option selected disabled>Select Role</option>
              <?php foreach ($tb_role as $tr) : ?>
                <option value="<?= $tr['role_id'] ?>"><?= $tr['role'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <input name="date_created" type="hidden" value="<?= date('Y-m-d'); ?>" class="form-control" id="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">TAMBAHKAN</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--End Modal Tambah -->

<!--Delete Modal  -->
<?php foreach ($data_user as $du) : ?>
  <div class="modal fade" id="modalDelete<?= $du['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>data_user/hapususer/<?= $du['id_user'] ?>">
            <p>Apakah anda yakin ingin menghapus data ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!--End Delete Modal  -->

<!-- Modal Edit -->
<?php foreach ($data_user as $du) : ?>
  <div class="modal fade" id="modalEdit<?= $du['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>data_user/proses_edit/<?= $du['id_user'] ?>">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input value="<?= $du['nama'] ?>" name="nama" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input value="<?= $du['email'] ?>" name="email" type="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="no_telp" class="form-label">No Telepon</label>
              <input value="<?= $du['no_telp'] ?>" name="no_telp" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input readonly value="<?= $du['username'] ?>" name="username" type="username" class="form-control" required>
            </div>
            <div class="mb-4">
              <label for="role" class="form-label">Role</label>
              <select name="role_id" class="form-select" aria-label="Default select example" required>
                <option selected value="<?= $du['role_id'] ?>"><?= $du['role'] ?></option>
                <?php foreach ($tb_role as $tr) : ?>
                  <option value="<?= $tr['role_id'] ?>"><?= $tr['role'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary float-end">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php endforeach; ?>
<!--End Modal Edit -->