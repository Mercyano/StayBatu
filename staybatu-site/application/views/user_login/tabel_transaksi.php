     
    <div id="content-wrapper">
      <h1 class="h3 mb-4 ml-3 text-gray-800"><?= $title; ?></h1>
      <div class="container-fluid">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Tabel Homestay yang dimiliki</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Bukti Transaksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;  
                    foreach($tabel as $ku): ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td>
                        <center>
                          <embed class="img-thumbnail"
                      src="data:<?= $ku['mime']; ?>;base64,<?= base64_encode($ku['bukti_transaksi']); ?>"/>
                        </center>  
                      </td>
                      <!-- <td><a href="<?php /*echo base_url('host_login/sewakan'); ?>?id=<?= $user['id_pemilik']; */ ?>" title="Update Record" data-togglesss="tooltip"><i class="fas fa-fw fa-edit"></i></a></td> -->
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
