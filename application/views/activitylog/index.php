<?php 
$no=1;
?>
<div class="container-fluid px-4">
	<div class="navbar-page bg-dark text-light bg-gradient"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home"></i> Dashboard </a> | Activity Log</div>
    <h1 class="mt-1">Activity Log</h1>
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            TABEL ACTIVITY LOG
        </div>
        <div class="card-body table-responsive">
        <?php if (validation_errors())
        echo validation_errors();
        ?>
        <?= $this->session->flashdata('pesan')?>
            <table id="datatables" class="display table-bordered border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                        <th>Deskripsi</th>
                        <th>Dilakukan oleh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($activity_log as $al):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $al['datetime_log'] ?></td>
                            <td class="fs-46">
															<?php 
															if ($al['aksi']=="Tambah"):{}?>
																<span class="badge bg-success"><?= $al['aksi'] ?></span>
															<?php endif ?>
															<?php 
															if ($al['aksi']=="Edit"):{}?>
																<span class="badge bg-primary"><?= $al['aksi'] ?></span>
															<?php endif ?>
															<?php 
															if ($al['aksi']=="Hapus"):{}?>
																<span class="badge bg-danger"><?= $al['aksi'] ?></span>
															<?php endif ?>
														</td>
                            <td><?= $al['deskripsi'] ?></td>
                            <td><?= $al['username'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
						<?php 
						if ($user_login['role_id']=='1'): {}?>
							<button class="float-end btn btn-danger mt-2 col-md-1" data-bs-toggle="modal" data-bs-target="#modalDelete">Hapus Semua</button><br><br>
						<?php endif ?>
        </div>
    </div>
</div>

<!--Delete Modal  -->
  <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Semua</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>activityLog/hapusAllHistory" >
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
<!--End Delete Modal  -->
