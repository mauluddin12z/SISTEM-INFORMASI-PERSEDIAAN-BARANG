<?php 
$no=1;
?>
<div class="container-fluid px-4">
		<div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Jenis</div>
    <h1 class="mt-1">Jenis</h1>
    <div class="card tmb-4 mt-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            TABEL JENIS
        </div>
        <div class="card-body table-responsive">
        <?= $this->session->flashdata('pesan')?>
        <button class="btn btn-success mb-2 col-xl-1 col-md-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> TAMBAH</button>
            <table id="datatables" class="display table-bordered border">
                <thead>
                    <tr>
                        <th width="200px">No</th>
                        <th width="200px">ID Jenis</th>
                        <th>Jenis</th>
												<?php if ($user_login['role_id']==1):{} ?>	
                        <th width="200px">Aksi</th>
												<?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($tb_jenis as $jns):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $jns['id_jenis'] ?></td>
                            <td><?= $jns['jenis'] ?></td>
														<?php if ($user_login['role_id']==1):{} ?>	
                            <td class="text-center">
                              <a class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $jns['id_jenis'] ?>">Edit</a>
                              <a class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $jns['id_jenis'] ?>">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>jenis/proses_tambah" >
          <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <input name="jenis" type="text" class="form-control" id="jenis" placeholder="Jenis" required>
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
<?php foreach($tb_jenis as $jenis): ?>
<div class="modal fade" id="modalEdit<?=$jenis['id_jenis'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Jenis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?= base_url() ?>jenis/proses_edit/<?= $jenis['id_jenis']?>" >
          <div class="mb-3">
            <label for="id_jenis" class="form-label">ID Jenis</label>
            <input readonly="readonly" value="<?= $jenis['id_jenis'] ?>" name="id_jenis" type="text" class="form-control" id="id_jenis">
          </div>
          <div class="form-group mb-3">
             <input value="<?= $jenis['id_jenis'] ?>" name="id_jenis" type="hidden" class="form-control" id="id_jenis">
             <label for="jenis" class="form-label">Jenis</label>
             <input value="<?= $jenis['jenis'] ?>" name="jenis" type="text" class="form-control" id="jenis" required>
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
<?php foreach($tb_jenis as $jns): ?>
  <div class="modal fade" id="modalDelete<?=$jns['id_jenis'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Jenis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>jenis/hapus/<?= $jns['id_jenis']?>" >
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
