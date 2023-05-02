<?php
$no = 1;
?>
<div class="container-fluid px-4">
    <div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Barang</div>
    <h1 class="mt-1">Data Barang</h1>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            TABEL DATA BARANG
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <?php if ($user_login['role_id'] == 1) : { } ?>
                            <th width="200vhw">Aksi</th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tb_barang as $brg) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $brg['kode_barang'] ?>

                                <?php

                                    if ($brg['kode_barang'] == null) {
                                        echo "-";
                                    }

                                    ?>
                            </td>
                            <td><?= $brg['nama_barang'] ?></td>
                            <td><?= $brg['jenis'] ?></td>
                            <?php if ($user_login['role_id'] == 1) : { } ?>
                                <td class="text-center">
                                    <a class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $brg['id_barang'] ?>">Edit</a>
                                    <a class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $brg['id_barang'] ?>">Delete</a>
                                </td>
                            <?php endif ?>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>barang/proses_tambah">
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input name="kode_barang" type="text" class="form-control" id="kode_barang" placeholder="Kode Barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input name="nama_barang" type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select name="id_jenis" class="form-select" aria-label="Default select example" required>
                            <option selected disabled value="">Open this select menu</option>
                            <?php foreach ($tb_jenis as $jns) : ?>
                                <option value="<?= $jns['id_jenis'] ?>"><?= $jns['jenis'] ?></option>
                            <?php endforeach; ?>
                        </select>
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
<!--Modal Edit -->
<?php foreach ($tb_barang as $brg) : ?>
    <div class="modal fade" id="modalEdit<?= $brg['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>barang/proses_edit/<?= $brg['id_barang'] ?>">
                        <input value="<?= $brg['id_barang'] ?>" name="id_barang" type="hidden" class="form-control" id="id_barang">
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input value="<?= $brg['kode_barang'] ?>" name="kode_barang" type="text" class="form-control" id="kode_barang" placeholder="Kode Barang" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input value="<?= $brg['nama_barang'] ?>" name="nama_barang" type="text" class="form-control" id="nama_barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="id_jenis" class="form-select" aria-label="Default select example" required>
                                <option selected value="<?= $brg['id_jenis'] ?>"><?= $brg['jenis'] ?></option>
                                <?php foreach ($tb_jenis as $jns) : ?>
                                    <option value="<?= $jns['id_jenis'] ?>"><?= $jns['jenis'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--End Edit Modal  -->

<!--Delete Modal  -->
<?php foreach ($tb_barang as $brg) : ?>
    <div class="modal fade" id="modalDelete<?= $brg['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>barang/hapus/<?= $brg['id_barang'] ?>">
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