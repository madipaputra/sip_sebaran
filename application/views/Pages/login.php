  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <img src="<?php echo base_url();?>external/logo/logo.png" width=40 height=40>
      <a class="navbar-brand" href="<?php echo base_url();?>">     Sistem Informasi Pengajuan Matakuliah</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent"> </div>
    </div>
  </nav>
  <div class="py-5 text-white bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-md-7 text-md-left text-center align-self-center my-5">
          <h1 class="display-3 text-center">Selamat Datang&nbsp;</h1>
          <p class="lead text-justify text-capitalize text-light">Sistem Informasi Pengajuan Sebaran matakuliah merupakan sebuah sistem informasi yang dirancang khusus untuk digunakan oleh pihak akademik menangani proses yang berhubungan dengan sebaran matakuliah. &nbsp;<br>
            <br>
          abcd</p>
                

          <br>
          <p>

          

          </p>
        </div>
        <div class="col-md-5" style="background-color:white;">
            <?php               
              //validasi gagal
              echo validation_errors('
              <br><div class="alert alert-warning alert-dismissible fade show" role="alert">
              <i class="fas fa-exclamation-triangle"></i> ', '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              ?>
              {pesan}
          <div class="card text-white p-5" style="background-color:white;">
            <div class="card-body">
              <b>
                <h1 class="mb-4 text-center text-dark">Login form</h1>
              </b>
              <?php 
              echo form_open('Login/prosesLogin');?>
                <div class="form-group">

                  <div class="form-group">
                    <label class="text-dark">Username</label>
                    <input name="usernamePOST" type="text" class="form-control" placeholder="Masukkan Username"> </div>
                  <div class="form-group">
                    <label class="text-dark">Password</label>
                    <input name="passwordPOST" type="password" class="form-control" placeholder="Masukkan Password"> </div>
                  <div align="center">
                    <button type="submit" class="btn btn-secondary">
                    <i class="fas fa-sign-in-alt"></i> Login</button>
                    <a class="btn btn-dark" href="<?php echo base_url();?>Daftar">
                    <i class="fas fa-user-plus"></i> Daftar</a></div>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>