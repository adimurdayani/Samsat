<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $judul?></h1>

  <!-- DataTales Example -->

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5>Tabel Antrian</h5>
          <a href="" class="btn btn-primary" data-target="#add-modal" data-toggle="modal"><i class="fa fa-plus"></i></a>
        </div>
        <?=  $this->session->flashdata('msg');    ?>
        <?= validation_errors('<div class="alert alert-danger d-flex align-items-center ml-3 mr-3 mt-0" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div>','
          </div>
        </div>')?>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">No. Antrian</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Tanggal Mengantri</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($get_antrian as $data):?>
                <tr <?php if($data['status'] == 1):?> hidden <?php else:?> <?php endif;?>>
                  <td>
                    <div class="badge badge-info">
                      <?=  $data['no_antrian']?>
                    </div>
                  </td>
                  <td><?=  $data['nama']?></td>
                  <td><?=  $data['email']?></td>
                  <td>
                    <?php if( $data['status'] != 0):?>
                    <div class="badge badge-success"><i class="fa fa-check"></i> Terverifikasi</div>
                    <?php else:?>
                    <a href="" class="badge badge-danger" data-target="#update-modal<?= $data['id_antrian']?>"
                      data-toggle="modal">Belum
                      Terverifikasi</a>
                    <?php endif;?>
                  </td>
                  <td><?=  $data['created_at']?></td>
                  <td>
                    <a href="" class="badge badge-danger" data-target="#hapus-modal<?= $data['id_antrian']?>"
                      data-toggle="modal">
                      Hapus</a>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5>Tabel Panggil Antrian</h5>
        </div>
        <?=  $this->session->flashdata('msg'); ?>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No. Antrian</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($get_antrian as $verifikasi):?>
                <tr <?php if($verifikasi['status'] == 0):?> hidden <?php else:?> <?php endif;?>>
                  <td>
                    <div class="badge badge-info">
                      <?=  $verifikasi['no_antrian']?>
                    </div>
                  </td>
                  <td><?=  $verifikasi['nama']?></td>
                  <td>
                    <?php if($verifikasi['panggil_antrian'] == "MENUNGGU"):?>
                    <div class="badge badge-warning">
                      <?=  $verifikasi['panggil_antrian']?>
                    </div>
                    <?php elseif($verifikasi['panggil_antrian'] == "TERPANGGIL"):?>
                    <div class="badge badge-success">
                      <?=  $verifikasi['panggil_antrian']?>
                    </div>
                    <?php endif;?>
                  </td>
                  <td>
                    <?php if($verifikasi['panggil_antrian'] == "TERPANGGIL"):?>
                    <a href="#" class="btn btn-block btn-success disabled">Selesai</a>
                    <?php elseif($verifikasi['panggil_antrian'] == "MENUNGGU"):?>
                    <a href="" class="btn btn-block btn-info"
                      data-target="#panggil-modal<?= $verifikasi['id_antrian']?>" data-toggle="modal">Panggil
                      Antrian</a>
                    <a href="" class="btn btn-block btn-danger"
                      data-target="#hapus-modal<?= $verifikasi['id_antrian']?>" data-toggle="modal">Batalkan</a>
                    <?php endif;?>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/antrian')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Antrian</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" class="form-control" id="no_antrian" name="no_antrian"
            value="<?= sprintf("%03s", $no_antrian)?>">

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Pengguna</label>
                <select name="kostumer_id" id="kostumer_id" class="form-control">
                  <option value="">No Selected</option>
                  <?php foreach($get_kostumer as $kostumer):?>
                  <option value="<?= $kostumer['id_kostumer']?>"><?= $kostumer['nama']?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- hapus Modal-->
<?php foreach($get_antrian as $hapus):?>
<div class="modal fade" id="hapus-modal<?= $hapus['id_antrian']?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Antrian/Batalkan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah anda ingin menghapus data antrian <b><?= $hapus['no_antrian']?></b>?.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('backend/antrian/hapus/'). $hapus['id_antrian']?>" class="btn btn-danger"><i
            class="fa fa-trash"></i> Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>

<!-- hapus Modal-->
<?php foreach($get_antrian as $panggil):?>
<div class="modal fade" id="panggil-modal<?= $panggil['id_antrian']?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/antrian/panggil_antrian')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Panggil Antrian <b><?= $panggil['no_antrian']?></b></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_antrian" value="<?= $panggil['id_antrian']?>">
          <input type="hidden" name="kostumer_id" value="<?= $panggil['kostumer_id']?>">
          <p>Apakah anda ingin memanggil nomor antrian?.</p>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
          <button class="btn btn-success" type="submit">Panggil</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>


<!-- update Modal-->
<?php foreach($get_antrian as $update):?>
<div class="modal fade" id="update-modal<?= $update['id_antrian']?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/antrian/update')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Status Antrian</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_antrian" value="<?= $update['id_antrian']?>">
          <input type="hidden" name="kostumer_id" value="<?= $update['kostumer_id']?>">
          <div class="form-group">
            <Label>Update Status Antrian</Label>
            <select name="status" id="status1" class="form-control">
              <option value="0" <?php if($update['status'] != "0"):?> <?php else:?> selected <?php endif;?>>Belum
                Terverifikasi</option>
              <option value="1" <?php if($update['status'] != "1"):?> <?php else:?> selected <?php endif;?>>
                Terverifikasi
              </option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>