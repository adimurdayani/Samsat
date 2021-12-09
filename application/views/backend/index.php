<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-warning">Selamat Datang di Dashboard Admin SAMSAT Palopo </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Costumer</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kostumer;?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Pajak Kendaraan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pajak;?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Antrian
              </div>
              <div class="row no-gutters align-items-center">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_antrian;?></div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Nomor Antrian</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_antrian;?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Costumer</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No. Telp</th>
                  <th>Alamat</th>
                  <th>Tanggal Buat</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($get_kostumer as $data):?>
                <tr>
                  <td><?= $data['nama']?></td>
                  <td><?= $data['email']?></td>
                  <td><?= $data['no_hp']?></td>
                  <td><?= $data['alamat']?></td>
                  <td><?= $data['created_at']?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-4 col-lg-4">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Akun Aktif</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <h6 class="text-black">Nama Akun : </h6>
            <p><i class="fa fa-user text-danger"></i> <?= $user_ses['nama']?></p>
            <hr>
            <h6 class="text-black">Email : </h6>
            <p><i class="fa fa-user text-danger"></i> <?= $user_ses['email']?></p>
            <hr>
            <h6 class="text-black">Status: </h6>
            <?php if($user_ses['user_active'] != 0):?>
            <div class="badge badge-success">
              Online
            </div>
            <?php else:?>
            <div class="badge badge-success">
              Offline
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->