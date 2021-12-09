<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul;?></h1>
  </div>

  <div class="row">

    <div class="col-lg-6">

      <!-- Dropdown Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Detail Profile</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <center><img src="<?= base_url('assets/img/undraw_profile_2.svg')?>" alt="" width="30%">
          </center>
          <h4 class="text-black text-center mt-2"><?= $user_ses['nama']?></h4>
          <h6>Email :</h6>
          <p><i class="fa fa-mail-bulk text-danger"></i> <?= $user_ses['email']?></p>
          <h6>Username :</h6>
          <p><i class="fa fa-user text-danger"></i> <?= $user_ses['username']?></p>
          <div class="text-center">
            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-edit"></i>
              Edit</a>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/admin/edit')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Akun</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id" value="<?= $user_ses['id']?>">

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama lengkap"
                  value="<?= $user_ses['nama']?>">
                <?= form_error('nama', '<small class="text-danger">','</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                  value="<?= $user_ses['username']?>">
                <?= form_error('username', '<small class="text-danger">','</small>')?>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
              value="<?= $user_ses['email']?>">
            <?= form_error('email', '<small class="text-danger">','</small>')?>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                <?= form_error('password', '<small class="text-danger">','</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="konf_pass" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="konf_pass" name="konf_pass"
                  placeholder="Konfirmasi password">
                <?= form_error('konf_pass', '<small class="text-danger">','</small>')?>
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