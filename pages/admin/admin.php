<?php
include "../header/header.php";
include "../header/config.php";


$current_page = basename(
  $_SERVER['PHP_SELF']);
?>


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Admin</h6>
            </div>
            <button class="btn btn-outline-warning btn-sm w-100">
                           Tambah Admin
                        </button>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "select * from tbl_admin");
                    foreach($query as $data): 

                    ?>
                    <div class="d-flex">
                        <?$no++?>
                    </div>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $data['Username']?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $data['Password']?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?= $data['Nama']?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $data['Alamat']?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $data['Foto']?></span>
                    </td>
                      <td class="align-middle">
                      <a href="edit_admin.php?id=<?=$data['Id_admin'] ;?>" class="text-secondary font-weight-bold text-xs" 
                            data-toggle="tooltip" 
                            data-original-title="Edit admin">
                            <button class="btn btn-primary w-100 me-3">
                              Edit
                            </button>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach?>
                  </tbody>