<?php 
$no=1;
?>
<div class="container-fluid px-4">
<div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Lokasi</div>
    <h1 class="mt-1">Lokasi</h1>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            TABEL LOKASI
        </div>
        <div class="card-body table-responsive">
        <?= $this->session->flashdata('pesan')?>
        <button class="btn btn-success mb-2 col-md-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> TAMBAH</button>
            <table id="datatables" class="display table-bordered border">
                <thead>
                    <tr>
                        <th width="200px">No</th>
                        <th>ID Lokasi</th>
                        <th>Lokasi</th>
												<?php if ($user_login['role_id']==1):{} ?>	
                        <th width="200vhw">Aksi</th>
												<?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($tb_lokasi as $lokasi):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $lokasi['id_lokasi'] ?></td>
                            <td><?= $lokasi['lokasi'] ?></td>
														<?php if ($user_login['role_id']==1):{} ?>	
                            <td class="text-center">
                              <a class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $lokasi['id_lokasi'] ?>">Edit</a>
                              <a class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $lokasi['id_lokasi'] ?>">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Lokasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url()?>lokasi/proses_tambah" >
          <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input name="lokasi" type="text" class="form-control" id="lokasi" placeholder="Lokasi" required>
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
<!--Edit Modal  -->
<?php foreach($tb_lokasi as $lokasi): ?>
<div class="modal fade" id="modalEdit<?=$lokasi['id_lokasi'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Lokasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?= base_url() ?>lokasi/proses_edit/<?= $lokasi['id_lokasi']?>" >
          <div class="form-group mb-3">
             <label for="ID lokasi" class="form-label">ID Lokasi</label>
             <input readonly="readonly" value="<?= $lokasi['id_lokasi'] ?>" name="id_lokasi" type="text" class="form-control" id="id_lokasi">
         </div>
          <div class="form-group mb-3">
             <label for="lokasi" class="form-label">Lokasi</label>
             <input value="<?= $lokasi['lokasi'] ?>" name="lokasi" type="text" class="form-control" id="lokasi" required>
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
<?php foreach($tb_lokasi as $lokasi): ?>
  <div class="modal fade" id="modalDelete<?=$lokasi['id_lokasi'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Lokasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>lokasi/hapus/<?= $lokasi['id_lokasi']?>" >
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
