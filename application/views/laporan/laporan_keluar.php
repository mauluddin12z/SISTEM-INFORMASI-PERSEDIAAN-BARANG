<?php
$no = 1;
?>
<div class="container-fluid main-content px-4">
    <div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Laporan Barang Keluar</div>
    <h1 class="mt-1">Laporan Barang Keluar</h1>
    <div class="card mb-4 mt-4" style="min-height: 700px;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Laporan Barang Keluar
        </div>
        <div class="card-body table-responsive">
            <?= $this->session->flashdata('pesan') ?>
            <button class="px-4 btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalFilter">Filter</button><br>
            <table id="expdatatablesBk" class="display table-responsive table-bordered border" width="100%">
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
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <button class="px-4 btn-dl z-index5 btn btn-secondary float-start" data-bs-toggle="modal" data-bs-target="#modalDataLaporan">Data Laporan</button>
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
                <form method="post" action="<?= base_url() ?>laporan/filter_bk">
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
                        <input class="form-control" value="<?= $this->input->post('nip'); ?>" type="hidden" name="nip" placeholder="NIP">
                        <input class="form-control" value="<?= $this->input->post('namattd'); ?>" type="hidden" name="namattd" placeholder="Nama">
                        <input class="form-control" value="<?= $this->input->post('jabatan'); ?>" type="hidden" name="jabatan" placeholder="Jabatan">
                        <input class="form-control" value="<?= $this->input->post('tanggalttd'); ?>" type="hidden" name="tanggalttd" placeholder="tanggalttd">
                        <input class="form-control" value="<?= $this->input->post('tempat'); ?>" type="hidden" name="tempat" placeholder="Tempat">
                        <input class="form-control" value="<?= $this->input->post('periodedt'); ?>" type="hidden" name="periodedt" placeholder="periodedt">
                        <input class="form-control" value="<?= $this->input->post('periodest'); ?>" type="hidden" name="periodest" placeholder="periodedt">
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

<!--Data Laporan Modal  -->
<div class="modal fade" id="modalDataLaporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="mb-3">
                            <label for="nip">NIP : </label>
                            <input class="form-control" type="text" name="nip" placeholder="NIP">
                        </div>
                        <div class="mb-3">
                            <label for="namattd">Nama : </label>
                            <input class="form-control" type="text" name="namattd" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="Jabatan">Jabatan : </label>
                            <input class="form-control" type="text" name="jabatan" placeholder="Jabatan">
                        </div>
                        <div class="mb-3">
                            <label for="periode">Periode : </label>
                            <div class="d-flex">
                                <input class="form-control me-1" type="date" name="periodedt">
                                <div class="fs-5">s.d.</div>
                                <input class="form-control ms-1" type="date" name="periodest">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalttd">Tanggal tanda tangan : </label>
                            <input class="form-control" type="date" name="tanggalttd" placeholder="Tanggal tanda tangan">
                        </div>
                        <div class="mb-3">
                            <label for="Tempat">Tempat : </label>
                            <input class="form-control" type="text" name="tempat" placeholder="Tempat">
                            <input class="form-control" value="<?= $this->input->post('daritanggal'); ?>" type="hidden" name="daritanggal">
                            <input class="form-control" value="<?= $this->input->post('sampaitanggal'); ?>" type="hidden" name="sampaitanggal">
                            <input class="form-control" value="<?= $this->input->post('jenis'); ?>" type="hidden" name="jenis">
                            <input class="form-control" value="<?= $this->input->post('lokasi'); ?>" type="hidden" name="lokasi">
                            <input class="form-control" value="<?= $this->input->post('kondisi'); ?>" type="hidden" name="kondisi">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">OK</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Data Laporan  -->

<!-- laporan -->
<h2 style="font-size: 0px;">LAPORAN BARANG KELUAR</h2>
<?php
$tempat = $this->input->post('tempat');
$tanggalttd = $this->input->post('tanggalttd');
$datenow = date("Y-m-d");
if ($tempat != null) { ?>
    <h3 id="tempat" style="font-size: 0px;"><?= $this->input->post('tempat'); ?></h3>
<?php
} else { ?>
    <h3 id="tempat" style="font-size: 0px;">................</h3>
<?php } ?>
<h3 id="tempat" style="font-size: 0px;"><?= $this->input->post('tempat'); ?></h3>
<?php
if ($tanggalttd == null) {
    ?>
    <h3 id="tanggalttd" style="font-size: 0px;"> <?= tanggal_indo($datenow) ?></h3>
<?php
} else {
    ?>
    <h3 id="tanggalttd" style="font-size: 0px;"> <?= tanggal_indo($tanggalttd) ?></h3>
<?php
}
?>
<h3 id="namattd" style="font-size: 0px;"><?= $this->input->post('namattd'); ?></h3>
<h3 id="jabatan" style="font-size: 0px;"><?= $this->input->post('jabatan'); ?></h3>
<h3 id="nip" style="font-size: 0px;"><?= $this->input->post('nip'); ?></h3>
<?php
$periodedt = $this->input->post('periodedt');
$periodest = $this->input->post('periodest');
if ($periodedt and $periodest) { ?>
    <h6 id="periode" style="font-size: 0px;">Periode : </h6>
    <h6 id="periodedt" style="font-size: 0px;"><?= tanggal_indo($periodedt) ?> - </h6>
    <h6 id="periodest" style="font-size: 0px;"><?= tanggal_indo($periodest) ?></h6>
<?php } else { ?> <h6 id="periode" style="font-size: 0px;">Periode : </h6>
    <h6 id="periodedt" style="font-size: 0px;"></h6>
    <h6 id="periodest" style="font-size: 0px;"></h6>
<?php } ?>

<?php
function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
}
?>