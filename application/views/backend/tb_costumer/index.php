<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $judul?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
    </div>
    <?=  $this->session->flashdata('msg');    ?>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Tipe User</th>
              <th>No. Telp</th>
              <th>Alamat</th>
              <th>Tanggal Buat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($get_kostumer as $data):?>
            <tr>
              <td><?= $data['nama']?></td>
              <td><?= $data['email']?></td>
              <td><?= $data['nama_grup']?></td>
              <td><?= $data['no_hp']?></td>
              <td><?= $data['alamat']?></td>
              <td><?= $data['created_at']?></td>
              <td>
                <a href="" class="badge badge-danger" data-target="#hapus-modal<?= $data['id_kostumer']?>"
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


<!-- hapus Modal-->
<?php foreach($get_kostumer as $hapus):?>
<div class="modal fade" id="hapus-modal<?= $hapus['id_kostumer']?>" tabindex="-1" role="dialog"
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
        <a href="<?= base_url('backend/costumer/hapus/'). $hapus['id_kostumer']?>" class="btn btn-danger"><i
            class="fa fa-trash"></i> Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>