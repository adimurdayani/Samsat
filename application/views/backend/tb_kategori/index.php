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
        <table class="table table-hover" width="100%">
          <thead>
            <tr>
              <th>No. Kategori Pajak</th>
              <th>Nama Kateogri</th>
              <th>Tanggal Buat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($get_kategori as $data):?>
            <tr>
              <td> <?= $data['no_pajak']?>
              </td>
              <td> <?= $data['nama_pajak']?></td>
              <td><?= $data['created_at']?></td>
              <td>
                <a href="" class="badge badge-warning" data-target="#edit-modal<?= $data['id_kategori']?>"
                  data-toggle="modal">
                  Edit</a>
                <a href="" class="badge badge-danger" data-target="#hapus-modal<?= $data['id_kategori']?>"
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
</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/kategori')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Pajak</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="no_pajak" class="form-label">No. Kategori Pajak</label>
                <input type="text" class="form-control" id="no_pajak" name="no_pajak"
                  value="KP-<?= sprintf("%06s", $no_pajak)?>ST">
                <?= form_error('no_pajak', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nama_pajak" class="form-label">Nama Kategori Pajak</label>
                <input type="text" class="form-control" id="nama_pajak" name="nama_pajak"
                  placeholder="Enter kategori pajak" value="<?= set_value('nama_pajak')?>">
                <?= form_error('nama_pajak', '<small class="text-danger">','</small>')?>
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


<!-- Modal -->
<?php foreach($get_kategori as $edit):?>
<div class="modal fade" id="edit-modal<?= $edit['id_kategori']?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/kategori/edit')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Jadwal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id_kategori" value="<?= $edit['id_kategori']?>">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="no_pajak" class="form-label">No. Kategori Pajak</label>
                <input type="text" class="form-control" id="no_pajak" name="no_pajak" value="<?= $edit['no_pajak']?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nama_pajak" class="form-label">Nama Kategori Pajak</label>
                <input type="text" class="form-control" id="nama_pajak" name="nama_pajak"
                  placeholder="Enter kategori pajak" value="<?= $edit['nama_pajak']?>">
                <?= form_error('nama_pajak', '<small class="text-danger">','</small>')?>
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
<?php endforeach;?>

<!-- hapus Modal-->
<?php foreach($get_kategori as $hapus):?>
<div class="modal fade" id="hapus-modal<?= $hapus['id_kategori']?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah anda ingin menghapus data user?.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('backend/kategori/hapus/'). $hapus['id_kategori']?>" class="btn btn-danger"><i
            class="fa fa-trash"></i> Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>