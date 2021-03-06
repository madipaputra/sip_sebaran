<?php
$queryGetProdi  = $this->db->query('SELECT * FROM tb_prodi');


$queryJumlahProdi   = $queryGetProdi->num_rows();

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
            <a class="nav-link text-white" href="<?php echo base_url();?>dashboard/akademik/manageProdi">Prodi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>dashboard/akademik/manageDosen">Dosen</a>
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
            <h1 class="display-3 text-center">Halaman Prodi</h1>
            <p align="center"> Data Prodi didapatkan dari file excel Sebaran Tahun Akademik <b>2017/2018</b><br><br>
                            <a href="<?php echo base_url()?>database/2017.2%20SEBARAN%20DAN%20JADWAL%20-ALLPRODI%20-%20Copy.xls" class="btn btn-primary text-white"> <i class="fas fa-download"></i> Download File Excel Sebaran</a>

                            <p class="text-center">
                              <b><?php echo $queryJumlahProdi; ?></b> Program Studi yang sudah tersimpan kedalam database
                            </p>
                            <div align="center">

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
             <?php echo form_open(base_url().'dashboard/akademik/manageProdi/Search');?>
              <div class="input-group">
                <div class="input-group-append">
                  <button type="button" data-toggle="modal" data-target="#add" class="btn btn-dark">
                    <i class="fas fa-plus"></i> Tambah
                  </button>
                </div>
                <input  type="text" class="form-control" placeholder="Ketik Kata Kunci Pencarian" name="keywordPOST">
                <select name="fieldPOST" class="form-control">
                  <option value="">Pencarian Berdasarkan</option>
                  <option value="kd_prodi">Kode Prodi</option>
                  <option value="nama_prodi">Nama Prodi</option>
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
    <?php echo form_open(base_url().'dashboard/akademik/manageProdi/Add');?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><b>Form Penambahan Data Prodi</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
                      <div class="form-group">
                        <label>Kode Prodi</label>
                        <input name="kd_prodiPOST" type="text" class="form-control form-control-sm" placeholder="Msukkan Kode Prodi">
                        <small class="form-text text-muted">Masukkan 3 digit huruf inisial Program Studi</small>
                      </div>
                      <div class="form-group">
                        <label>Nama Prodi</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Masukkan Nama Prodi" name="nama_prodiPOST"> </div>

                    
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
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                <?php
                $query = $this->db->get('tb_prodi');

                  foreach ($query->result_array() as $row)
                  {
                          ;
                          
                          echo '
                            <tr>
                              <td>'.$row['kd_prodi'].'</td>
                              <td>'.$row['nama_prodi'].'</td>
                              <td align="right">
                                <button data-toggle="modal" data-target="#editData'.$row['kd_prodi'].'" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button>

                                <button data-toggle="modal" data-target="#deleteData'.$row['kd_prodi'].'" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>

                              </td>

<!-- Modal Edit Data '.$row['nama_prodi'] .'-->
<div class="modal fade" id="editData'.$row['kd_prodi'].'" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="'.base_url().'dashboard/akademik/manageProdi/Edit" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Data Prodi<br>
        <b>'.$row['nama_prodi'].'</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
                      <div class="form-group">
                        <input name="idPOST" type="hidden" value="'.$row['id_prodi'].'" />
                        <label>Kode Prodi</label>
                        <input name="kd_prodiPOST" type="text" class="form-control form-control-sm" value="'.$row['kd_prodi'].'">
                        <small class="form-text text-muted">Masukkan 3 digit huruf inisial Program Studi</small>
                      </div>
                      <div class="form-group">
                        <label>Nama Prodi</label>
                        <input type="text" class="form-control form-control-sm" value="'.$row['nama_prodi'].'" name="nama_prodiPOST"> </div>

                    
      </div>

      <div class="modal-footer">
        <button type="reset" class="btn btn-info"><i class="fas fa-undo"></i> Reset</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Perbarui</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus Data '.$row['nama_prodi'] .'-->
<div class="modal fade" id="deleteData'.$row['kd_prodi'].'" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="'.base_url().'dashboard/akademik/manageProdi/Delete" method="post">
        <input name="idPOST" type="hidden" value="'.$row['id_prodi'].'" />
        <input name="nama_prodiPOST" type="hidden" value="'.$row['nama_prodi'] .'" />
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus data prodi<br>
        <b> '.$row['nama_prodi'].'</b></h5>
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

