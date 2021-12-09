<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <img src="<?= base_url('assets/img/samsat.png');?>" alt="" width="50%">
                <h1 class="h4 text-gray-900 mb-4 mt-2">Selamat Datang!</h1>


                <?= $this->session->flashdata('message');?>
              </div>
              <form class="user" method="post" action="<?= base_url('login')?>">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail"
                    value="<?= set_value('username')?>" placeholder="Enter Username...">
                  <?= form_error('username', '<small class="text-danger">', '</small>')?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                  <?= form_error('password', '<small class="text-danger">', '</small>')?>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>