<?php include 'header.php'; ?>
<?php include '../../koneksi.php'; ?>
<?php $pk = $_GET['pk']; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Pencapaian <?= strtoupper($pk); ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Pencapaian PK</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-body table-responsive no-padding">
              <?php
              $data = mysqli_query($koneksi, "SELECT * FROM tb_capaian JOIN tb_pk JOIN tb_user WHERE tb_capaian.id_pk=tb_pk.id AND tb_pk.id_user=tb_user.id AND hak_akses = '$pk'");

              // menghitung jumlah data yang ditemukan
              $cek = mysqli_num_rows($data);

              if ($cek > 0) {
              ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>
                        <center>No</center>
                      </th>
                      <th>
                        <center>Sasaran</center>
                      </th>
                      <th>
                        <center>Target</center>
                      </th>
                      <th>
                        <center>Capaian</center>
                      </th>
                      <th>
                        <center>Permasalahan</center>
                      </th>
                      <th>
                        <center>Tindak Lanjut</center>
                      </th>
                      <th>
                        <center>Evaluasi</center>
                      </th>
                      <th>
                        <center>Tanggal</center>
                      </th>
                      <th>
                        <center>Keterangan</center>
                      </th>
                      <th>
                        <center>Aksi</center>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nomer = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM tb_capaian JOIN tb_pk JOIN tb_user WHERE tb_capaian.id_pk=tb_pk.id AND tb_pk.id_user=tb_user.id AND hak_akses = '$pk'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                      <tr>
                        <td><?php echo $nomer++; ?></td>
                        <td><?php echo $d['sasaran']; ?></td>
                        <td><?php echo $d['target']; ?></td>
                        <td><?php echo $d['capaian']; ?></td>
                        <td><?php echo $d['permasalahan']; ?></td>
                        <td><?php echo $d['tindak_lanjut']; ?></td>
                        <td><?php echo $d['evaluasi']; ?></td>
                        <td><?php echo $d['tanggal']; ?></td>
                        <td><?php echo $d['keterangan']; ?></td>
                        <td>
                          <center>
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#updateuser<?php echo $nomer; ?>"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteuser<?php echo $nomer; ?>"><i class="fa fa-trash"></i> Hapus</a>
                          </center>
                        </td>
                        <!-- modal delete -->
                        <div class="example-modal">
                          <div id="deleteuser<?php echo $nomer; ?>" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Apakah Anda Yakin Ingin Menghapus Data <?php echo $d['sasaran']; ?></h3>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                  <a href="act_cp.php?act=delete&id=<?php echo $d[0]; ?>&pk=<?= $pk ?>" class="btn btn-danger">Hapus</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                        <!-- modal update user -->
                        <div class="example-modal">
                          <div id="updateuser<?php echo $nomer; ?>" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Edit Data Pencapaian <?= $pk ?></h3>
                                </div>
                                <div class="modal-body">
                                  <form action="act_cp.php?act=update" method="post" role="form">
                                    <?php
                                    $id = $d[0];
                                    $query = "SELECT tb_capaian.id,tb_capaian.id_pk,tb_pk.sasaran,tb_capaian.capaian,tb_capaian.permasalahan,tb_capaian.tindak_lanjut,tb_capaian.evaluasi,tb_capaian.tanggal,tb_capaian.keterangan FROM tb_capaian JOIN tb_pk WHERE tb_capaian.id_pk=tb_pk.id AND tb_capaian.id=" . $id;
                                    $result = mysqli_query($koneksi, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                      <div class="form-group">
                                        <div class="row">
                                          <label class="col-sm-3 control-label text-right">Sasaran<span class="text-red">*</span></label>
                                          <div class="col-sm-8">
                                            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" class="form-control" name="pk" value="<?php echo $pk; ?>">
                                            <input type="hidden" class="form-control" name="sasaran" value="<?php echo $row['id_pk']; ?>">
                                            <input type="text" class="form-control" value="<?php echo $row['sasaran']; ?>" disabled>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="row">
                                          <label class="col-sm-3 control-label text-right">Capaian <span class="text-red">*</span></label>
                                          <div class="col-sm-8">
                                            <input type="number" class="form-control" name="capaian" value="<?php echo $row['capaian']; ?>">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="row">
                                          <label class="col-sm-3 control-label text-right">Permasalahan <span class="text-red">*</span></label>
                                          <div class="col-sm-8"><input type="text" class="form-control" name="permasalahan" value="<?php echo $row['permasalahan']; ?>"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="row">
                                          <label class="col-sm-3 control-label text-right">Tindak Lanjut<span class="text-red">*</span></label>
                                          <div class="col-sm-8"><input type="text" class="form-control" name="tindak_lanjut" value="<?php echo $row['tindak_lanjut']; ?>"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="row">
                                          <label class="col-sm-3 control-label text-right">Evaluasi <span class="text-red">*</span></label>
                                          <div class="col-sm-8"><input type="text" class="form-control" name="evaluasi" value="<?php echo $row['evaluasi']; ?>"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="row">
                                          <label class="col-sm-3 control-label text-right">Tanggal <span class="text-red">*</span></label>
                                          <div class="col-sm-8"><input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal']; ?>"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="row">
                                          <label class="col-sm-3 control-label text-right">Keterangan <span class="text-red">*</span></label>
                                          <div class="col-sm-8"><input type="text" class="form-control" name="keterangan" value="<?php echo $row['keterangan']; ?>"></div>
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
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>

              <?php } else { ?>
                <div>Belum ada data</div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<?php include 'footer.php'; ?>