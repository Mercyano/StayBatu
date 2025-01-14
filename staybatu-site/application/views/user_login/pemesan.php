<?php
function dateDiffInDays($date1, $date2)
{
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400));
}
?>

<div id="content-wrapper">
	<h1 class="h3 mb-4 ml-3 text-gray-800"><?= $title; ?></h1>
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-table"></i>
				Tabel Pemesan Homestay</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Homestay</th>
								<th>Check-In</th>
								<th>Check-Out</th>
								<th>Total Bayar</th>
								<th>No. Telp</th>
								<th>Bukti Transfer</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;  
                    foreach($tabel as $ku): ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $ku['nama'] ?></td>
								<td><?= $ku['judul'] ?></td>
								<td><?= $ku['check_in'] ?></td>
								<td><?= $ku['check_out'] ?></td>
								<td>Rp. <?= $ku['harga'] * (dateDiffInDays($ku['check_in'], $ku['check_out'])) ?></td>
								<td><?= $ku['no_telp'] ?></td>
								<td>
									
										<embed class="image-thumbnail"
											src="data:image/jpeg;base64,<?= base64_encode($ku['bukti_transaksi']); ?>" style="min-height: 11rem;
    		max-height: 16rem;" />
								
								</td>
								<td>
									<center>
									
										<?php
										if ($ku['status'] == 0) { ?>

											<a title="Terima" style="color:#51adcf;"
											href="<?= base_url('user/terima/'). $ku['id_pemesan']?>/<?=$ku['id_homestay']; ?>/1/1">
												<i class="fas fa-calendar-check"></i>
											</a>
											<a title="Tolak" style="color:red;"
												href="<?= base_url('user/deleteTransaksi/'). $ku['id_pemesan']; ?>">
												<i class="fas fa-window-close"></i>
											</a>
										<?php
										} else if ($ku['status'] == 1) { ?>

											<a title="Check-Out" class = "btn btn-danger btn-sm" 
											href="<?= base_url('user/check_out/'). $ku['id_pemesan']?>/<?=$ku['id_homestay']; ?>/2/0">
												Check-Out
											</a>
											<a title="Tolak" style="color:red;"
												href="<?= base_url('user/deleteTransaksi/'). $ku['id_pemesan']; ?>">
												<i class="fas fa-window-close"></i>
											</a>
										<?php
										} else { ?>
											<span class="label label-sm label-success">Success</span>
											<a style="color:red;"
											href="<?= base_url('user/deleteTransaksi/'). $ku['id_pemesan']; ?>">
											<i class="fas fa-fw fa-trash"></i>
										</a>
										<?php
										}
										?>
									</center>

								</td>
								

							</tr>
							<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>
</div>