<?php
$queryGetDosen  = $this->db->query('SELECT * FROM tb_dosen');

$queryJumlahDosen   = $queryGetDosen->num_rows();

?>

  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <img src="<?php echo base_url();?>external/logo/logo.png" width=40 height=40>
      <a class="navbar-brand" href="<?php echo base_url();?>dashboard">Dashboard <br>
        <small><b>{inisialisasiKodeAkun}</b></small></a>
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
            <h1 class="display-3 text-center">Halaman Dosen</h1>
            <p align="center"> Data Dosen didapatkan dari file excel Sebaran Tahun Akademik <b>2017/2018</b> dan Data NIDN Dosen didapatkan  dari file excel data dosen Juli <b>2018</b><br><br>
                            <a href="<?php echo base_url()?>database/2017.2%20SEBARAN%20DAN%20JADWAL%20-ALLPRODI%20-%20Copy.xls" class="btn btn-primary text-white"> <i class="fas fa-download"></i> Download File Excel Sebaran</a>
                            <a href="<?php echo base_url()?>database/dosen%20per%20juli%202018.xlsx" class="btn btn-primary text-white"> <i class="fas fa-download"></i> Download File Excel Dosen</a>

                            <p class="text-center">
                              <b><?php echo $queryJumlahDosen; ?></b> Dosen yang sudah tersimpan kedalam database
                            </p>
                            <div align="center">


              <br>

            </h1>
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


             <?php echo form_open(base_url().'dashboard/akademik/manageDosen/Search');?>
              <div class="input-group">
                <div class="input-group-append">
                  <button type="button" data-toggle="modal" data-target="#add" class="btn btn-dark">
                    <i class="fas fa-plus"></i> Tambah
                  </button>
                </div>
                <input  type="text" class="form-control" placeholder="Ketik Kata Kunci Pencarian" name="keywordPOST">
                <select name="fieldPOST" class="form-control">
                  <option value="">Pencarian Berdasarkan</option>
                  <option value="nidn">NIDN</option>
                  <option value="nama_dosen">Nama Dosen</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
                </div>
              </div>
            <?php echo form_close();?>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <?php echo form_open(base_url().'dashboard/akademik/manageDosen/Add');?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><b>Form Penambahan Data Dosen</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Dosen (Lengkap Dengan Gelar Pendidikan)</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Masukkan Nama Dosen" name="nama_dosenPOST"> 
                      </div>
                      <div class="form-group">
                        <label>NIDN</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Masukkan NIDN" name="nidnPOST"> 
                      </div>
                    
      </div>


      <div class="modal-footer">
        <button type="reset" class="btn btn-info"><i class="fas fa-undo"></i> Reset</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambahkan</button>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>




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
                $this->db->get('tb_prodi');
                $query = $this->db->get('tb_dosen');

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
                                <button data-toggle="modal" data-target="#editData'.$row['id_dosen'].'" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button>

                                <button data-toggle="modal" data-target="#deleteData'.$row['id_dosen'].'" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>

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
