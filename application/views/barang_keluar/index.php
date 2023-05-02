<?php
$no = 1;
?>
<div class="container-fluid main-content px-4">
    <div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Barang Keluar</div>
    <h1 class="mt-1">Barang Keluar</h1>
    <div class="card mb-4 mt-4" style="min-height: 700px;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Barang Keluar
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
                        <th>Tanggal Keluar</th>
                        <th>Lokasi</th>
                        <th>Jumlah</th>
                        <th>Penerima</th>
                        <th>Kondisi Barang</th>
                        <th>Tanggal rusak / hilang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang_keluar as $bk) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $bk['kode_barang'] ?></td>
                            <td><?= $bk['nama_barang'] ?></td>
                            <td><?= date("d/m/Y", strtotime($bk['tanggal_keluar'])); ?></td>
                            <td><?= $bk['lokasi'] ?></td>
                            <td><?= $bk['jumlahkeluar'] ?></td>
                            <td><?= $bk['penerima'] ?></td>
                            <td><?= $bk['kondisi'] ?></td>
                            <td><?php
                                if ($bk['tanggal_rusakhilang'] == null) {
                                    echo "-";
                                } else {
                                    echo $cekrusakhilang = date("d/m/Y", strtotime($bk['tanggal_rusakhilang']));
                                } ?>
                            </td>
                            <td width="200vhw" class="text-center">
                                <a class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $bk['id_bk'] ?>">Edit</a>
                                <a class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $bk['id_bk'] ?>">Delete</a>
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
                <form method="post" action="<?= base_url() ?>barang_keluar/filter_bk">
                    <div class="row">
                        <div class="mb-2">
                            <label for="daritanggal">Dari tanggal : </label>
                            <input class="form-control" type="date" name="daritanggal">
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="sampai tanggal">Sampai tanggal : </label>
                            <input class="form-control" type="date" name="sampaitanggal">
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="lokasi">Lokasi : </label>
                            <select name="lokasi" class="form-select" aria-label="Default select example">
                                <option value="">Semua lokasi</option>
                                <?php foreach ($tb_lokasi as $lokasi) : ?>
                                    <option value="<?= $lokasi['lokasi'] ?>"><?= $lokasi['lokasi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="jenis">Jenis : </label>
                            <select name="jenis" class="form-select" aria-label="Default select example">
                                <option value="">Semua Jenis</option>
                                <?php foreach ($tb_jenis as $jns) : ?>
                                    <option value="<?= $jns['jenis'] ?>"><?= $jns['jenis'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="kondisi">Kondisi : </label>
                            <select name="kondisi" class="form-select" aria-label="Default select example">
                                <option value="">Semua Kondisi</option>
                                <?php foreach ($tb_kondisi as $kondisi) : ?>
                                    <option value="<?= $kondisi['kondisi'] ?>"><?= $kondisi['kondisi'] ?></option>
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
<!--END Filter modal  -->
<!-- Modal Edit -->
<?php foreach ($barang_keluar as $bk) : ?>
    <div class="modal fade" id="modalEdit<?= $bk['id_bk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>barang_keluar/proses_edit_keluar/<?= $bk['id_bk'] ?>">
                        <input value="<?= $bk['id_bk'] ?>" name="id_bk" type="hidden" class="form-control" id="id_bk" required>
                        <div class="form-group mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <select name="id_barang" class="form-select" aria-label="Default select example" required>
                                <option selected value="<?= $bk['id_barang'] ?>"><?= $bk['nama_barang'] ?></option>
                                <?php foreach ($tb_barang as $brg) : ?>
                                    <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_keluar" class="form-label">Tanggal keluar</label>
                            <input value="<?= $bk['tanggal_keluar'] ?>" name="tanggal_keluar" type="date" class="form-control" id="tanggal_keluar" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select name="id_lokasi" class="form-select" aria-label="Default select example" required>
                                <option selected value="<?= $bk['id_lokasi'] ?>"><?= $bk['lokasi'] ?></option>
                                <?php foreach ($tb_lokasi as $lokasi) : ?>
                                    <option value="<?= $lokasi['id_lokasi'] ?>"><?= $lokasi['lokasi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="jumlahkeluar" class="form-label">Jumlah</label>
                            <input value="<?= $bk['jumlahkeluar'] ?>" name="jumlahkeluar" type="number" class="form-control" id="jumlahkeluar" min="1" max="<?= $bk['stok'] + $bk['jumlahkeluar'] ?>" required>
                            <small class="float-start text-danger">Angka tidak boleh melebihi stok.</small><small class="float-end text-danger">Stok : <?= $bk['stok'] + $bk['jumlahkeluar'] ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="penerima" class="form-label">Penerima / Pelapor</label>
                            <input name="penerima" value="<?= $bk['penerima'] ?>" type="text" class="form-control" id="penerima" placeholder="Penerima" required>
                        </div>
                        <div class="mb-3">
                            <label for="Kondisi" class="form-label">Kondisi</label>
                            <select class="form-select" name="id_kondisi" aria-label="Default select example" required>
                                <option selected value="<?= $bk['id_kondisi'] ?>"><?= $bk['kondisi'] ?></option>
                                <?php foreach ($tb_kondisi as $kondisi) : ?>
                                    <option value="<?= $kondisi['id_kondisi'] ?>"><?= $kondisi['kondisi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_rusakhilang" class="form-label">Tanggal rusak / hilang</label>
                            <input name="tanggal_rusakhilang" value="<?= $bk['tanggal_rusakhilang'] ?>" type="date" class="form-control" id="tanggal_rusakhilang">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="subkit" class="btn btn-primary">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--End Edit Modal  -->

<!--Delete Modal  -->
<?php foreach ($barang_keluar as $bk) : ?>
    <div class="modal fade" id="modalDelete<?= $bk['id_bk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>barang_keluar/hapusbarangkeluar/<?= $bk['id_bk'] ?>">
                        <p>Apakah anda yakin ingin menghapus data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="subkit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!--End Delete Modal  -->