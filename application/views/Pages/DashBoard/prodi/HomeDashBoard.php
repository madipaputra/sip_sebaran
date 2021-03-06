              <?php
$queryGetProdi  = $this->db->query('SELECT * FROM tb_prodi');
$queryGetDosen  = $this->db->query('SELECT * FROM tb_dosen');
$queryGetMatkul = $this->db->query('SELECT * FROM tb_matakuliah where kd_prodi="'.$kode_prodi.'"');


$queryJumlahProdi   = $queryGetProdi->num_rows();
$queryJumlahDosen   = $queryGetDosen->num_rows();
$queryJumlahMatkul  = $queryGetMatkul->num_rows();

$querylistProdi = $this->db->query('SELECT * FROM tb_prodi where kd_prodi="'.$kode_prodi.'"');

              ?>

  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <img src="<?php echo base_url();?>external/logo/logo.png" width=40 height=40>
      <a class="navbar-brand" href="<?php echo base_url();?>dashboard"><b>Dashboard <br>
        <small>{inisialisasiKodeAkun}</b></small></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>dashboard/akademik/manageMatkul">Matakuliah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>dashboard/prodi/manageSebaran">Sebaran</a>
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
  <div class="p-5 bg-secondary" >
    <div class="container">
      <div class="row">
        <div class="p-3 align-self-center col-md-12">
          <div class="card">
            <div class="card-block p-5">
              <h1 class="text-center"><b><?php echo $queryJumlahDosen; ?></b></h1>
              <h4 class="text-center"><b>Dosen</b></h4>
              <br>
            </div>
          </div>
        </div>

        <div class="p-3 align-self-center col-md-12">
          <div class="card">
            <div class="card-block p-5">
              <h1 class="text-center"><b><?php echo $queryJumlahMatkul; ?></b></h1>
              <h4 class="text-center"><b>Matakuliah</b></h4>
              <br>
                      <table class='table'>
                        <tr>
                          <td><b>Program Studi</b></td>
                          <td align="center" ><b>Jumlah</b></td>
                          <td align="center" ><b>Disetujui</b></td>
                          <td align="right" ><b> Ditolak</b></td>
                        </tr>
                                    
              <?php

                  foreach ($querylistProdi->result_array() as $rowlistProdi)
                  {

                    $queryJumlahMatkulPerProdi = $this->db->query('SELECT * FROM tb_matakuliah where kd_prodi="'.$rowlistProdi['kd_prodi'].'"');
                    $queryJumlahMatkulPerProdiDisetujui = $this->db->query('SELECT * FROM tb_matakuliah where status="1" AND kd_prodi="'.$rowlistProdi['kd_prodi'].'"');
                    $queryJumlahMatkulPerProdiDitolak = $this->db->query('SELECT * FROM tb_matakuliah where status="0" AND kd_prodi="'.$rowlistProdi['kd_prodi'].'"');

                    $JumlahMatkulProdi  = $queryJumlahMatkulPerProdi->num_rows();
                    $JumlahMatkulProdiDisetujui  = $queryJumlahMatkulPerProdiDisetujui->num_rows();
                    $JumlahMatkulProdiDitolak  = $queryJumlahMatkulPerProdiDitolak->num_rows();

                    echo 
                    "
                        <tr>  
                          <td>
                          ".
                          $rowlistProdi['nama_prodi']
                          ."
                          </td>
                          <td align='center'>
                          ".
                          $JumlahMatkulProdi
                          ."
                          </td>
                          <td align='center'>
                          ".
                          $JumlahMatkulProdiDisetujui
                          ."
                          </td>
                          </td>
                          <td align='right'>
                          ".
                          $JumlahMatkulProdiDitolak
                          ."
                          </td>
                        </tr>
                    ";
                  }
                ?>
                        
                      </table>

              <hr>
              <a href="<?php echo base_url()?>dashboard/prodi/manageMatkul" class="btn btn-dark">Lebih Detail</a>
            </div>
          </div>
        </div>
        <div class="p-3 align-self-center col-md-12">
          <div class="card">
            <div class="card-block p-5">
              <h1 class="text-center">75 </h1>
              <h4 class="text-center">Sebaran</h4>
              <hr>
              <a href="<?php echo base_url()?>dashboard/prodi/manageSebaran" class="btn btn-dark">Lebih Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>