<?php include 'header.php'; ?>
<?php include '../../koneksi.php'; ?>
<?php $pk = $_GET['pk']; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Penilaian Kinerja <?= strtoupper($pk); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Penilaian Kinerja</li>
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
                            $data = mysqli_query($koneksi, "SELECT * FROM tb_pk JOIN tb_user WHERE tb_pk.id_user=tb_user.id AND hak_akses = '$pk'");

                            // menghitung jumlah data yang ditemukan
                            $cek = mysqli_num_rows($data);

                            if ($cek > 0) { ?>
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
                                                <center>Kode</center>
                                            </th>
                                            <th>
                                                <center>Indikator Kinerja</center>
                                            </th>
                                            <th>
                                                <center>Target</center>
                                            </th>
                                            <th>
                                                <center>PIC</center>
                                            </th>
                                            <th>
                                                <center>Aksi</center>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomer = 1;
                                        $data = mysqli_query($koneksi, "SELECT tb_pk.id, tb_pk.id_user, tb_pk.sasaran, tb_pk.kode, tb_pk.indikator_kerja, tb_pk.target, tb_pk.PIC FROM tb_pk JOIN tb_user WHERE tb_pk.id_user=tb_user.id AND hak_akses = '$pk'");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $nomer++; ?></td>
                                                <td><?php echo $d['sasaran']; ?></td>
                                                <td><?php echo $d['kode']; ?></td>
                                                <td><?php echo $d['indikator_kerja']; ?></td>
                                                <td><?php echo $d['target']; ?></td>
                                                <td><?php echo $d['PIC']; ?></td>
                                                <td>
                                                    <center>
                                                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#updateuser<?php echo $nomer; ?>"><i class="fa fa-pencil"></i>Edit</a>
                                                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteuser<?php echo $nomer; ?>"><i class="fa fa-trash"></i>Hapus</a>
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
                                                                    <a href="act_pk.php?act=delete&id=<?php echo $d['id']; ?>&pk=<?= $pk ?>" class="btn btn-danger">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal delete -->


                                                <!-- modal update user -->
                                                <div class="example-modal">
                                                    <div id="updateuser<?php echo $nomer; ?>" class="modal fade" role="dialog" style="display:none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h3 class="modal-title">Edit Data PK1</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="act_pk.php?act=update" method="post" role="form">
                                                                        <?php
                                                                        $id = $d['id'];
                                                                        $query = "SELECT * FROM tb_pk WHERE id='$id'AND id_user =" . $d['id_user'];
                                                                        $result = mysqli_query($koneksi, $query);
                                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                        ?>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label text-right">Sasaran <span class="text-red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="hidden" class="form-control" name="id" placeholder="id" value="<?php echo $row['id']; ?>">
                                                                                        <input type="hidden" class="form-control" name="pk" placeholder="pk" value="<?php echo $pk; ?>">
                                                                                        <input type="text" class="form-control" name="sasaran" placeholder="Sasaran" value="<?php echo $row['sasaran']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label text-right">Kode <span class="text-red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $row['kode']; ?>"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label text-right">Indikator Kinerja <span class="text-red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="text" class="form-control" name="indikator_kerja" placeholder="indikator kerja" value="<?php echo $row['indikator_kerja']; ?>"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label text-right">Target <span class="text-red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="text" class="form-control" name="target" placeholder="target" value="<?php echo $row['target']; ?>" disabled></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-3 control-label text-right">PIC <span class="text-red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="text" class="form-control" name="PIC" placeholder="PIC" value="<?php echo $row['PIC']; ?>" disabled></div>
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
                            <?php } ?>
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