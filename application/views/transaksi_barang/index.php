<?php
$no = 1;
?>
<div class="container-fluid px-4">
    <div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Transaksi Barang</div>
    <h1 class="mt-1">Transaksi Barang</h1>
    <div class="card mb-4 mt-4" style="min-height: 700px;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            TABLE TRANSAKSI
        </div>
        <div class="card-body table-responsive">
            <?= $this->session->flashdata('pesan') ?>
            <div class="d-flex justify-content-between mb-3">
                <button class="px-4 float-start btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalFilter">Filter</button>
                <button class="btn btn-success mb-2 col-md-1" data-bs-toggle="modal" data-bs-target="#modalTambahBMasuk"><i class="fas fa-plus-circle"></i> TAMBAH</button>
            </div>
            <table id="datatables" class="display table-bordered border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Lokasi</th>
                        <th>Stok</th>
                        <th>Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tb_transaksi as $transaksi) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $transaksi['kode_barang'] ?></td>
                            <td><?= $transaksi['nama_barang'] ?></td>
                            <td><?= $transaksi['jenis'] ?></td>
                            <td><?= $transaksi['lokasi'] ?></td>
                            <td><?= $transaksi['stok'] ?></td>
                            <td width="200vhw" class="text-center">
                                <a class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalMasuk<?= $transaksi['id_transaksi'] ?>"><i class="fas fa-sign-in-alt"></i> Masuk</a>
                                <a class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalKeluarkan<?= $transaksi['id_transaksi'] ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Barang Masuk -->
<div class="modal fade" id="modalTambahBMasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Barang Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>transaksi_barang/proses_masuk">
                    <div class="mb-3">
                        <label for="barang" class="form-label">Nama Barang</label>
                        <select name="id_barang" class="form-select" aria-label="Default select example" required>
                            <option selected disabled value="">Open this select menu</option>
                            <?php foreach ($tb_barang as $barang) : ?>
                                <option value="<?= $barang['id_barang'] ?>"><?= $barang['kode_barang'], str_repeat('&nbsp;', 2), " - ", str_repeat('&nbsp;', 2), $barang['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input name="tanggal_masuk" type="date" value="<?= date('Y-m-d') ?>" class="form-control" id="tanggal_masuk" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <select name="id_lokasi" class="form-select" aria-label="Default select example" required>
                            <option selected disabled value="">Open this select menu</option>
                            <?php foreach ($tb_lokasi as $lokasi) : ?>
                                <option value="<?= $lokasi['id_lokasi'] ?>"><?= $lokasi['lokasi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlahmasuk" class="form-label">Jumlah</label>
                        <input name="jumlahmasuk" type="number" class="form-control" id="jumlahmasuk" placeholder="Jumlah" min="1" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">TAMBAHKAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Barang Masuk -->
<?php foreach ($tb_transaksi as $transaksi) : ?>
    <div class="modal fade" id="modalMasuk<?= $transaksi['id_transaksi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Barang Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>transaksi_barang/proses_masuk">
                        <div class="mb-3">
                            <input value="<?= $transaksi['id_barang'] ?>" name="id_barang" type="hidden" class="form-control" id="id_barang" required>
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input readonly="readonly" value="<?= $transaksi['kode_barang'], str_repeat('&nbsp;', 2), " - ", str_repeat('&nbsp;', 2), $transaksi['nama_barang'] ?>" type="text" class="form-control" id="nama_barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input name="tanggal_masuk" type="date" value="<?= date('Y-m-d') ?>" class="form-control" id="tanggal_masuk" required>
                        </div>

                        <div class="mb-3">
                            <input value="<?= $transaksi['id_lokasi'] ?>" name="id_lokasi" type="hidden" class="form-control" id="id_lokasi" required>
                            <label for="lokasi" class="form-label">Lokasi Barang</label>
                            <input readonly="readonly" value="<?= $transaksi['lokasi'] ?>" type="text" class="form-control" id="lokasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlahmasuk" class="form-label">Jumlah</label>
                            <input name="jumlahmasuk" type="number" class="form-control" id="jumlahmasuk" placeholder="Jumlah" min="1" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">TAMBAHKAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!--End Modal Barang Masuk -->

<!-- Modal Keluarkan -->
<?php foreach ($tb_transaksi as $transaksi) : ?>
    <div class="modal fade" id="modalKeluarkan<?= $transaksi['id_transaksi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Barang Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>transaksi_barang/proses_keluar">
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input value="<?= $transaksi['id_barang'] ?>" name="id_barang" type="hidden" class="form-control" id="id_barang" required>
                            <input readonly="readonly" value="<?= $transaksi['kode_barang'], str_repeat('&nbsp;', 2), " - ", str_repeat('&nbsp;', 2), $transaksi['nama_barang'] ?>" type="text" class="form-control" id="nama_barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_keluar" class="form-label">Tanggal keluar</label>
                            <input name="tanggal_keluar" type="date" value="<?= date('Y-m-d') ?>" class="form-control" id="tanggal_keluar" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select name="id_lokasi" class="form-select" aria-label="Default select example" required>
                                <option selected disabled value="">Open this select menu</option>
                                <?php foreach ($tb_lokasi as $lokasi) : ?>
                                    <option value="<?= $lokasi['id_lokasi'] ?>"><?= $lokasi['lokasi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jumlahkeluar" class="form-label">Jumlah</label>
                            <input name="jumlahkeluar" type="number" class="form-control" id="jumlahkeluar" min="1" max="<?= $transaksi['stok'] ?>" placeholder="Jumlah" required />
                            <small class="float-start text-danger">Angka tidak boleh melebihi stok.</small><small class="float-end text-danger">Stok : <?= $transaksi['stok'] ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="penerima" class="form-label">Penerima / Pelapor</label>
                            <input name="penerima" type="text" class="form-control" id="penerima" placeholder="Penerima" required>
                        </div>
                        <div class="mb-3">
                            <label for="Kondisi" class="form-label">Kondisi</label>
                            <select id="toggle_rusakhilang" name="id_kondisi" class="form-select" aria-label="Default select example" required>
                                <option selected disabled value="">Open this select menu</option>
                                <?php foreach ($tb_kondisi as $kondisi) : ?>
                                    <option value="<?= $kondisi['id_kondisi'] ?>"><?= $kondisi['kondisi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 d-none" id="tanggal_rusakhilang">
                            <label for="tanggal_rusakhilang" class="form-label">Tanggal rusak / hilang</label>
                            <input name="tanggal_rusakhilang" value="" type="date" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">TAMBAHKAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!--End Modal Keluarkan -->

<!--Filter Modal  -->
<div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>transaksi_barang/filter_stok">
                    <div class="row">
                        <div class="mb-3">
                            <label for="lokasi">Jenis</label>
                            <select name="jenis" class="form-select" aria-label="Default select example">
                                <option value="">Semua Jenis</option>
                                <?php foreach ($tb_jenis as $jns) : ?>
                                    <option value="<?= $jns['jenis'] ?>"><?= $jns['jenis'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi">Lokasi</label>
                            <select name="lokasi" class="form-select" aria-label="Default select example">
                                <option value="">Lokasi</option>
                                <?php foreach ($tb_lokasi as $lks) : ?>
                                    <option value="<?= $lks['lokasi'] ?>"><?= $lks['lokasi'] ?></option>
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