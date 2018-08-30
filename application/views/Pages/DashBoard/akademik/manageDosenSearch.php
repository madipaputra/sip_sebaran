  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <img src="<?php echo base_url();?>external/logo/logo.png" width=40 height=40>
      <a class="navbar-brand" href="<?php echo base_url();?>dashboard">Dashboard <br>
        <small><b>{inisialisasiKodeAkun}<b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item text-light">
            <a class="nav-link" href="<?php echo base_url();?>dashboard/akademik/manageProdi">Prodi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo base_url();?>dashboard/akademik/manageDosen">Dosen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>dashboard/akademik/manageMatkul">Matakuliah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>dashboard/akademik/manageSebaran">Sebaran</a>
          </li>
        </ul>
        <form class="form-inline m-0">
          <a href="<?php echo base_url();?>logout" class="btn btn-danger text-light" type="submit">
            <b><i class="fas fa-sign-out-alt"></i> Logout</b>
          </a>
        </form>
      </div>
    </div>
  </nav>
  <div class="p-5 bg-secondary">
        <div class="p-3 align-self-center col-md-12">
          <div class="card">
            <a href="<?php echo(base_url())?>dashboard/akademik/manageDosen" class="btn btn-dark text-white">
            <i class="fas fa-arrow-left"></i>
            Kembali Ke Halaman Dosen</a>
            <h4 class="display-4 text-center">Hasil Pencarian '{keywordData}'</h4>
            <div class="card-block p-3">

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
<!-- <select class="form-control demoNamaSingle" >
  <option value="AL">Maulana </option>
  <option value="AL">Zihan</option>
  <option value="WY">Iqbal</option>
</select> -->


              <table class="table">
                <thead>
                  <tr align="center">
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                <?php
                
                $query  = $this->db->query("SELECT * FROM tb_dosen WHERE $fieldTable LIKE '%$keywordData%'");

                  foreach ($query->result_array() as $row)
                  {
                    if ($row['nidn']  == 0) {
                      $row['nidn']  = "Belum Ada";
                    }
                    else{
                      $row['nidn'] = '0'.$row['nidn'];
                    }
                          echo '
                            <tr>
                              <td>'.
                              $row['nidn']
                              .'</td>
                              <td>
                              '.$row['nama_dosen'].'
                              </td>
                              <td align="right">
                                <button data-toggle="modal" data-target="#editData'.$row['id_dosen'].'" class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                <button data-toggle="modal" data-target="#deleteData'.$row['id_dosen'].'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                              </td>

<!-- Modal Edit Data '.$row['nama_dosen'] .'-->
<div class="modal fade" id="editData'.$row['id_dosen'].'" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="'.base_url().'dashboard/akademik/manageDosen/Edit" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Data Dosen<br>
        <b>'.$row['nama_dosen'].'</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Dosen</label>
                        <input name="idPOST" type="hidden" value="'.$row[
                          'id_dosen'].'">
                        <input type="text" class="form-control form-control-sm" value="'.$row['nama_dosen'].'" name="nama_dosenPOST"> 
                      </div>                      

                      <div class="form-group">
                        <label>NIDN</label>
                        <input type="text" class="form-control form-control-sm" value="'.$row['nidn'].'" name="nidnPOST"> 
                      </div>
                    
      </div>

 

      <div class="modal-footer">
        <button type="reset" class="btn btn-info"><i class="fas fa-undo"></i> Reset</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Perbarui</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus Data '.$row['nama_dosen'] .'-->
<div class="modal fade" id="deleteData'.$row['id_dosen'].'" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="'.base_url().'dashboard/akademik/manageDosen/Delete" method="post">
        <input name="idPOST" type="hidden" value="'.$row['id_dosen'].'" />
        <input name="nama_dosenPOST" type="hidden" value="'.$row['nama_dosen'] .'" />
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus data Dosen <br>
        <b> '.$row['nama_dosen'].'</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p> Yakin ingin menghapus data ini?
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
                            </tr>

                          ';
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
  </div>
