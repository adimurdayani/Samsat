<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $judul?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NOPOL</th>
              <th>JENIS</th>
              <th>MERK</th>
              <th>TIPE</th>
              <th>TH. BUAT</th>
              <th>PKB. POKOK</th>
              <th>PKB. DENDA</th>
              <th>JR. POKOK</th>
              <th>JR. DENDA</th>
              <th>BEAT.PLAT&STNK (PNBP)</th>
              <th>TOTAL</th>
              <th>MASA PAJAK</th>
              <th>MASA STNK</th>
              <th>STATUS</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($get_pajak as $data):?>
            <tr>
              <td><?=  $data['nopol']?></td>
              <td><?=  $data['jenis']?></td>
              <td><?=  $data['merk']?></td>
              <td><?=  $data['tipe']?></td>
              <td><?=  $data['th_buat']?></td>
              <td>Rp.<?=  number_format($data['pkb_pokok'], 0, ',', ',')?></td>
              <td>Rp.<?=  number_format($data['pkb_denda'], 0, ',', ',')?></td>
              <td>Rp.<?=  number_format($data['jr_pokok'], 0, ',' , ',')?></td>
              <td>Rp.<?= number_format($data['jr_denda'], 0, ',', ',')?></td>
              <td>Rp.<?=  number_format($data['pnbp'], 0, ',', ',')?></td>
              <td>Rp.<?=  number_format($data['total'], 0, ',', ',')?></td>
              <td><?=  $data['masa_pajak']?></td>
              <td><?=  $data['masa_stnk']?></td>
              <td><?=  $data['status']?></td>
              <td>
                <a href="" class="badge badge-warning" data-target="#edit-modal<?= $data['id_pajak']?>"
                  data-toggle="modal">
                  <i class="fa fa-edit"></i></a>
                <a href="" class="badge badge-danger" data-target="#hapus-modal<?= $data['id_pajak']?>"
                  data-toggle="modal">
                  <i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/pajak')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pajak Kendaraan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nopol" class="form-label">NOPOL Kendaraan</label>
                <input type="text" class="form-control" id="nopol" name="nopol" value="<?= set_value('nopol')?>">
                <?= form_error('nopol', '<small class="text-danger">','</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Kendaraan</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="<?= set_value('jenis')?>">
                <?= form_error('jenis', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="merk" class="form-label">Merk Kendaraan</label>
                <input type="text" class="form-control" id="merk" name="merk" value="<?= set_value('merk')?>">
                <?= form_error('merk', '<small class="text-danger">','</small>')?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Kendaraan</label>
                <input type="text" class="form-control" id="tipe" name="tipe" value="<?= set_value('tipe')?>">
                <?= form_error('tipe', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="th_buat" class="form-label">Tahun Buat</label>
            <input type="text" class="form-control" id="th_buat" name="th_buat" value="<?= set_value('th_buat')?>">
            <?= form_error('th_buat', '<small class="text-danger">','</small>')?>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="pkb_pokok" class="form-label">PKB Pokok</label>
                <input type="number" class="form-control" id="pkb_pokok" name="pkb_pokok"
                  value="<?= set_value('pkb_pokok')?>">
                <?= form_error('pkb_pokok', '<small class="text-danger">','</small>')?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="pkb_denda" class="form-label">PKB Denda</label>
                <input type="number" class="form-control" id="pkb_denda" name="pkb_denda"
                  value="<?= set_value('pkb_denda')?>">
                <?= form_error('pkb_denda', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="jr_pokok" class="form-label">JR Pokok</label>
                <input type="number" class="form-control" id="jr_pokok" name="jr_pokok"
                  value="<?= set_value('jr_pokok')?>">
                <?= form_error('jr_pokok', '<small class="text-danger">','</small>')?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="jr_denda" class="form-label">JR Denda</label>
                <input type="number" class="form-control" id="jr_denda" name="jr_denda"
                  value="<?= set_value('jr_denda')?>">
                <?= form_error('jr_denda', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="pnbp" class="form-label">Bea.Plat&STNK (PNBP)</label>
            <input type="number" class="form-control" id="pnbp" name="pnbp" value="<?= set_value('pnbp')?>">
            <?= form_error('pnbp', '<small class="text-danger">','</small>')?>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="masa_pajak" class="form-label">Masa Pajak</label>
                <input type="date" class="form-control" id="masa_pajak" name="masa_pajak"
                  value="<?= set_value('masa_pajak')?>">
                <?= form_error('masa_pajak', '<small class="text-danger">','</small>')?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="masa_stnk" class="form-label">Masa STNK</label>
                <input type="date" class="form-control" id="masa_stnk" name="masa_stnk"
                  value="<?= set_value('masa_stnk')?>">
                <?= form_error('masa_stnk', '<small class="text-danger">','</small>')?>
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
</div>
<!-- End of Main Content -->

<!-- Modal -->
<?php foreach($get_pajak as $edit):?>
<div class="modal fade" id="edit-modal<?= $edit['id_pajak']?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/pajak/edit')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Pajak Kendaraan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id_pajak" value="<?= $edit['id_pajak']?>">

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nopol" class="form-label">NOPOL Kendaraan</label>
                <input type="text" class="form-control" id="nopol" name="nopol" value="<?= $edit['nopol']?>">
                <?= form_error('nopol', '<small class="text-danger">','</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Kendaraan</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $edit['jenis']?>">
                <?= form_error('jenis', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="merk" class="form-label">Merk Kendaraan</label>
                <input type="text" class="form-control" id="merk" name="merk" value="<?= $edit['merk']?>">
                <?= form_error('merk', '<small class="text-danger">','</small>')?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Kendaraan</label>
                <input type="text" class="form-control" id="tipe" name="tipe" value="<?= $edit['tipe']?>">
                <?= form_error('tipe', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="th_buat" class="form-label">Tahun Buat</label>
            <input type="text" class="form-control" id="th_buat" name="th_buat" value="<?= $edit['th_buat']?>">
            <?= form_error('th_buat', '<small class="text-danger">','</small>')?>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="pkb_pokok" class="form-label">PKB Pokok</label>
                <input type="number" class="form-control" id="pkb_pokok" name="pkb_pokok"
                  value="<?= $edit['pkb_pokok']?>">
                <?= form_error('pkb_pokok', '<small class="text-danger">','</small>')?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="pkb_denda" class="form-label">PKB Denda</label>
                <input type="number" class="form-control" id="pkb_denda" name="pkb_denda"
                  value="<?= $edit['pkb_denda']?>">
                <?= form_error('pkb_denda', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="jr_pokok" class="form-label">JR Pokok</label>
                <input type="number" class="form-control" id="jr_pokok" name="jr_pokok" value="<?= $edit['jr_pokok']?>">
                <?= form_error('jr_pokok', '<small class="text-danger">','</small>')?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="jr_denda" class="form-label">JR Denda</label>
                <input type="number" class="form-control" id="jr_denda" name="jr_denda" value="<?= $edit['jr_denda']?>">
                <?= form_error('jr_denda', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="pnbp" class="form-label">Bea.Plat&STNK (PNBP)</label>
            <input type="number" class="form-control" id="pnbp" name="pnbp" value="<?= $edit['pnbp']?>">
            <?= form_error('pnbp', '<small class="text-danger">','</small>')?>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="masa_pajak" class="form-label">Masa Pajak</label>
                <input type="date" class="form-control" id="masa_pajak" name="masa_pajak"
                  value="<?= $edit['masa_pajak']?>">
                <?= form_error('masa_pajak', '<small class="text-danger">','</small>')?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="masa_stnk" class="form-label">Masa STNK</label>
                <input type="date" class="form-control" id="masa_stnk" name="masa_stnk"
                  value="<?= $edit['masa_stnk']?>">
                <?= form_error('masa_stnk', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>

<!-- hapus Modal-->
<?php foreach($get_pajak as $hapus):?>
<div class="modal fade" id="hapus-modal<?= $hapus['id_pajak']?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah anda ingin menghapus data admin?.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('backend/pajak/hapus/'). $hapus['id_pajak']?>" class="btn btn-danger"><i
            class="fa fa-trash"></i> Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>