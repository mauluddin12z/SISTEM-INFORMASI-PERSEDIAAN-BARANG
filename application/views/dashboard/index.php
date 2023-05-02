<?php 
$no=1;
?>
<div class="container-fluid px-4">
	<div class="navbar-page bg-dark text-light bg-gradient"><i class="fas fa-home"></i> Dashboard</div>
    <h1 class="mt-1">Dashboard</h1>
    <div class="row gx-5">
        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card bg-primary bg-gradient text-white shadow rounded">
			<?php foreach ($jumtbrgin as $jti): ?>
                <div class="card-body px-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">
							<?php if($jti['jumlahmasuk']==null){
								echo "0";
							}else{
								echo $jti['jumlahmasuk'];
							}
							?>								
							</div>
                            <div class="card-text">Barang Masuk</div>
                        </div>
						<?php 
						if ($user_login['role']=='Admin'):
						?>
                        <a class="text-white" href="<?= base_url('Barang_masuk') ?>"><div class="icon-box"><i class="p-1 fas fa-sign-in-alt fa-3x"></i></div></a>
						<?php else : ?>
						<div class="icon-box"><i class="p-1 fas fa-sign-in-alt fa-3x"></i></div>
						<?php endif ?>
                    </div>
                </div>
				<?php endforeach ?>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card bg-warning bg-gradient text-white shadow rounded">
			<?php foreach ($jumtbrgout as $jto): ?>
                <div class="card-body px-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">
							<?php if($jto['jumlahkeluar']==null){
								echo "0";
							}else{
								echo $jto['jumlahkeluar'];
							}
							?>								
							</div>
                            <div class="card-text">Barang Keluar</div>
                        </div>
						<?php 
						if ($user_login['role']=='Admin'):
						?>
                        <a class="text-white" href="<?= base_url('Barang_masuk') ?>"><div class="icon-box"><i class="p-1 fas fa-sign-out-alt fa-3x"></i></div></a>
						<?php else : ?>
						<div class="icon-box"><i class="p-1 fas fa-sign-in-alt fa-3x"></i></div>
						<?php endif ?>
                    </div>
                </div>
				<?php endforeach ?>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card bg-danger bg-gradient text-white shadow rounded">
			<?php foreach ($jumbrg as $jb): ?>
                <div class="card-body px-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">
							<?php if($jb['cb']==null){
								echo "0";
							}else{
								echo $jb['cb'];
							}
							?>							
							</div>
                            <div class="card-text">Barang</div>
                        </div>
						<?php 
						if ($user_login['role']=='Admin'):
						?>
                        <a class="text-white" href="<?= base_url('Barang') ?>"><div class="icon-box"><i class="p-1 fas fa-table fa-3x"></i></div></a>
						<?php else : ?>
						<div class="icon-box"><i class="p-1 fas fa-sign-in-alt fa-3x"></i></div>
						<?php endif ?>
                    </div>
                </div>
				<?php endforeach ?>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card bg-success bg-gradient text-white shadow rounded">
			<?php foreach ($jumlokasi as $jt): ?>
                <div class="card-body px-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">
							<?php if($jt['ct']==null){
								echo "0";
							}else{
								echo $jt['ct'];
							}
							?>							
							</div>
                            <div class="card-text">Lokasi</div>
                        </div>
						<?php 
						if ($user_login['role']=='Admin'):
						?>
                        <a class="text-white" href="<?= base_url('Lokasi') ?>"><div class="icon-box"><i style="margin-left: 4px!important;" class="fas fa-map-marker-alt fa-3x"></i></div></a>
						<?php else : ?>
						<div class="icon-box"><i class="p-1 fas fa-sign-in-alt fa-3x"></i></div>
						<?php endif ?>
                    </div>
                </div>
				<?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="row justify-content-between">
        <div class="col-xl-6">
            <div style="height: 450px;" class="card mb-4 shadow rounded">
                <div class="card-header bg-secondary bg-gradient text-white">
                    <i class="fas fa-table me-1"></i>
                    Barang Masuk Hari ini
                </div>
                <div class="card-body table-responsive">
                    <table class="display dashtables table-bordered border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Lokasi</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach($bmtoday as $bmt):
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $bmt['kode_barang'] ?></td>
                                <td><?= $bmt['nama_barang'] ?></td>
                                <td><?= $bmt['lokasi'] ?></td>
                                <td><?= $bmt['jumlahmasuk'] ?></td>
                            </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div style="height: 450px;" class="card mb-4 shadow rounded">
                <div class="card-header bg-secondary bg-gradient text-white">
                    <i class="fas fa-table me-1"></i>
                    Barang Keluar Hari ini
                </div>
                <div class="card-body table-responsive">
                    <table class="display dashtables table-bordered border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Lokasi</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach($bktoday as $bkt):
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $bkt['kode_barang'] ?></td>
                                <td><?= $bkt['nama_barang'] ?></td>
                                <td><?= $bkt['lokasi'] ?></td>
                                <td><?= $bkt['jumlahkeluar'] ?></td>
                            </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
