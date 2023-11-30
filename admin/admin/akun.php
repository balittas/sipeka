<?php include 'header.php'; ?>
<?php include '../../koneksi.php'; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Akun
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Data Akun</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="#" class="btn bg-olive margin" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-plus-square"></i> Tambah Akun</a></button>
            <h3 class="box-title"></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>
                      <center>No</center>
                    </th>
                    <th>
                      <center>Username</center>
                    </th>
                    <th>
                      <center>Password</center>
                    </th>
                    <th>
                      <center>Hak Akses</center>
                    </th>
                    <th>
                      <center>Aksi</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $data = mysqli_query($koneksi, "SELECT * FROM tb_user ORDER BY hak_akses");
                  while ($d = mysqli_fetch_array($data)) {
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['username']; ?></td>
                      <td><?php echo $d['password']; ?></td>
                      <td><?php echo $d['hak_akses']; ?></td>
                      <td>
                        <center>
                          <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#updateuser<?php echo $no; ?>"><i class="fa fa-pencil"></i> Edit</a>
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteuser<?php echo $no; ?>"><i class="fa fa-trash"></i> Hapus</a>
                        </center>
                      </td>
                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Apakah Anda Yakin Ingin Menghapus Data <?php echo $d['username']; ?></h3>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <a href="act_akun.php?act=delete&id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->


                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updateuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data Akun</h3>
                              </div>
                              <div class="modal-body">
                                <form action="act_akun.php?act=update" method="post" role="form">
                                  <?php
                                  $id = $d['id'];
                                  $query = "SELECT * FROM tb_user WHERE id='$id'";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">Username <span class="text-red">*</span></label>
                                        <div class="col-sm-8">
                                          <input type="hidden" class="form-control" name="id" placeholder="Id" value="<?php echo $row['id']; ?>">
                                          <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row['username']; ?>">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">Password <span class="text-red">*</span></label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $row['password']; ?>"></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">Hak Akses<span class="text-red">*</span></label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="hak_akses" placeholder="hak_akses" value="<?php echo $row['hak_akses']; ?>"></div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                      <input type="submit" name="submit" class="btn btn-primary" value="Edit">
                                    </div>
                                  <?php
                                  }
                                  ?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update user -->
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- MODAL tmbah -->


<div class="example-modal">
  <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Tambah Akun</h3>
        </div>
        <div class="modal-body">
          <form action="act_akun.php?act=tambah" method="post" role="form">

            <div class="form-group">
              <div class="row">
                <label class="col-sm-3 control-label text-right">Username <span class="text-red">*</span></label>
                <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Username" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-sm-3 control-label text-right">Password <span class="text-red">*</span></label>
                <div class="col-sm-8"><input type="text" class="form-control" name="password" placeholder="Password" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="col-sm-3 control-label text-right">Hak Akses<span class="text-red">*</span></label>
                <div class="col-sm-8"><input type="text" class="form-control" name="hak_akses" placeholder="hak_akses" value=""></div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              <button class="btn btn-primary" value="Simpan" type="submit" name="submit">Simpan</button>
            </div>
            <!--<div class="box-footer">
                      <a href="../user/data_user.php" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div> /.box-footer -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<?php include 'footer.php'; ?>