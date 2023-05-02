<div class="container-fluid px-4">
    <div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Barang Masuk</div>
    <h1 class="mt-1">Barang Masuk</h1>
    <div class="card mb-4 mt-4" style="min-height: 700px;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Barang Masuk
        </div>
        <div class="card-body table-responsive">
            <?= $this->session->flashdata('pesan') ?>
            <button class="px-4 float-start btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalFilter">Filter</button><br><br>
            <table id="datatables" class="display table-bordered border" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Lokasi</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang_masuk as $bm) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $bm['kode_barang'] ?></td>
                            <td><?= $bm['nama_barang'] ?></td>
                            <td><?= date("d/m/Y", strtotime($bm['tanggal_masuk'])); ?></td>
                            <td><?= $bm['lokasi'] ?></td>
                            <td><?= $bm['jumlahmasuk'] ?></td>
                            <td width="200vhw" class="text-center">
                                <a class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $bm['id_bm'] ?>">Edit</a>
                                <a class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $bm['id_bm'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Filter Modal  -->
<div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>barang_masuk/filter_bm">
                    <div class="row">
                        <div class="mb-2">
                            <label for="daritanggal">Dari tanggal : </label>
                            <input class="form-control" type="date" name="daritanggal">
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="daritanggal">Sampai tanggal : </label>
                            <input class="form-control" type="date" name="sampaitanggal">
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="daritanggal">Lokasi : </label>
                            <select name="lokasi" class="form-select" aria-label="Default select example">
                                <option value="">Semua lokasi</option>
                                <?php foreach ($tb_lokasi as $lokasi) : ?>
                                    <option value="<?= $lokasi['lokasi'] ?>"><?= $lokasi['lokasi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="daritanggal">Jenis : </label>
                            <select name="jenis" class="form-select" aria-label="Default select example">
                                <option value="">Semua Jenis</option>
                                <?php foreach ($tb_jenis as $jns) : ?>
                                    <option value="<?= $jns['jenis'] ?>"><?= $jns['jenis'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Filter  -->

<!--Modal Edit -->
<?php foreach ($barang_masuk as $bm) : ?>
    <div class="modal fade" id="modalEdit<?= $bm['id_bm']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>barang_masuk/proses_edit_masuk/<?= $bm['id_bm'] ?>">
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">ID Transaksi</label>
                            <input value="<?= $bm['id_bm'] ?>" name="id_bm" type="text" readonly="readonly" class="form-control" id="id_bm" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <select name="id_barang" class="form-select" aria-label="Default select example" required>
                                <option selected value="<?= $bm['id_barang'] ?>"><?= $bm['nama_barang'] ?></option>
                                <?php foreach ($tb_barang as $brg) : ?>
                                    <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal masuk</label>
                            <input value="<?= $bm['tanggal_masuk'] ?>" name="tanggal_masuk" type="date" class="form-control" id="tanggal_masuk" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select name="id_lokasi" class="form-select" aria-label="Default select example" required>
                                <option selected value="<?= $bm['id_lokasi'] ?>"><?= $bm['lokasi'] ?></option>
                                <?php foreach ($tb_lokasi as $lokasi) : ?>
                                    <option value="<?= $lokasi['id_lokasi'] ?>"><?= $lokasi['lokasi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jumlahmasuk" class="form-label">Jumlah</label>
                            <input value="<?= $bm['jumlahmasuk'] ?>" name="jumlahmasuk" type="number" class="form-control" id="jumlahmasuk" min="1" required>
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
<?php foreach ($barang_masuk as $bm) : ?>
    <div class="modal fade" id="modalDelete<?= $bm['id_bm']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>barang_masuk/hapusbarangmasuk/<?= $bm['id_bm'] ?>">
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